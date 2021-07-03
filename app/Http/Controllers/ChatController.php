<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Chat_msg;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use PDF;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($receiver_id)
    {   
        $receiverInfo = User::where("id",$receiver_id)->first(); 
        $sender_id = Auth::user()->id;
        
        DB::select("UPDATE `chat_msg` SET `msg_read`='1' WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."')");

        $msgs = DB::select("SELECT * FROM chat_msg WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."') OR (sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."') ORDER BY id desc");
        $msgs = array_reverse($msgs,true);

        return view('front.chat_list',compact("msgs","receiverInfo","receiver_id"));
    }

    public static function saveMsg(Request $request){
        if(count((array)Auth::user()) <= 0){
            return view('chat');
        }
        DB::select("UPDATE `chat_msg` SET `msg_read`='1' WHERE (sender_id = '".$request['receiver_id']."' AND receiver_id = '".Auth::user()->id."')");
        if($request['msg'] != ""){
            $Chat_msg = Chat_msg::create([
                'sender_id' => Auth::user()->id,
                'receiver_id' => $request['receiver_id'],
                'msg' => $request['msg'],
            ]);
            $last_msg_id = $Chat_msg->id;
            $msgs = DB::select("SELECT * FROM chat_msg WHERE id = $last_msg_id");
            return json_encode(array("data" =>  $msgs));
            
        }else{
            return json_encode(array("data" =>  []));
        
        }
        
    }

    public function getLatestMsg(Request $request){
        if(count((array)Auth::user()) <= 0){
            return view('chat');
        }
        
        $sender_id = Auth::user()->id;
        $receiver_id = $request->receiver_id;
        $last_msg_id = $request->last_msg_id;
        // echo "SELECT * FROM chat_msg WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."') AND id > $last_msg_id";
        $msgs = DB::select("SELECT * FROM chat_msg WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."') AND id > $last_msg_id");
        return json_encode(array("data" =>  $msgs));
    }

    public function showOldMsg(Request $request){
        if(count((array)Auth::user()) <= 0){
            return '';
        }else{
            $sender_id = Auth::user()->id;
            $receiver_id = $request->receiver_id;
            $start_msg_id = $request->start_msg_id;
            $msgs = DB::select("SELECT * FROM chat_msg WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."' AND id < $start_msg_id) OR (sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."' AND id < $start_msg_id)  ORDER BY id desc LIMIT 10");
            $msgs = array_reverse($msgs,true);

            $html ='';
            foreach($msgs as $msg){
                
                if(Auth::user()->id != $msg->receiver_id){
                    $html .='<div class="incoming_msg" '.$msg->id.'>
                        <div class="message_box">
                            <div class="message-content">
                            <p>'.$msg->msg.'</p>
                            <span class="time_date">'. date('h:i | d M', strtotime($msg->created_at)) .'</span>
                            </div>
                        </div>
                    </div>';
                }else{
                    $html .='<div class="outgoing_msg" '.$msg->id.'>
                        <div class="message_box">
                        <div class="message-content">
                            <p>'.$msg->msg.'</p>
                            <span class="time_date">'. date('h:i | d M', strtotime($msg->created_at)) .'</span> 
                        </div>  
                        </div>
                    </div>';
                }   
            }
            return json_encode(array("data" => $msgs,"html" => $html));
        }
    }

    public function show_active_msg(){
        if(count((array)Auth::user()) <= 0){
            return '';
        }else{
            $sender_id = Auth::user()->id;
            $msgs = DB::select("SELECT * FROM chat_msg WHERE receiver_id = '".$sender_id."' AND msg_read='0' ");
            return  (count($msgs) > 0)  ? 'chat_active|'.$msgs[0]->sender_id : '';
        }
    }

    public function saveAttchment(Request $request){
        if(count((array)Auth::user()) <= 0){
            return '';
        }else{
            
            $file = $request['chat_attachment'];
        
            if($file)
            {
                $name = rand(1, 1000000000).'_'.str_replace(" ","_",$file->getClientOriginalName());
                $path = public_path()."/upload/chat_attachments/";
                $file->move($path, $name);
                $attachment = "upload/chat_attachments/".$name;
                
                $Chat_msg = Chat_msg::create([
                    'sender_id' => Auth::user()->id,
                    'receiver_id' => $request->receiver_id,
                    'attachment' => $attachment,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientOriginalExtension()
                ]);
                $last_msg_id = $Chat_msg->id;
                $msgs = DB::select("SELECT * FROM chat_msg WHERE id = $last_msg_id");
                
                return json_encode(array("data" =>  $msgs, "path" => $attachment,'file_type' => $file->getClientOriginalExtension()));
            }else{
                return '';
            }
            
        }
        
    }

    public function downloadChat(Request $request){
        if(count((array)Auth::user()) <= 0){
            return '';
        }else{
            $receiver_id = $request['receiverID'];
            $sender_id = $request['senderID'];
            $action = $request['action'];

            $msgs = DB::select("SELECT * FROM chat_msg WHERE (sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."') OR (sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."') ORDER BY id desc");
            $msgs = array_reverse($msgs,true);
        
            
            if($action == 'text'){
            
                $FileName = "/upload/chat_msg/chat_history_".date("Y_m_d").".txt";
                $path = $_SERVER['DOCUMENT_ROOT'] . $FileName;
                if(file_exists($path)){ unlink($path); }
                foreach($msgs as $key => $msg){
                    $senderName = User::find($msg->sender_id)->name;
                    $chat = '';

                    if($msg->msg != '' ){
                        $chat = ucwords($senderName).': '.$msg->msg;
                        createFile($path,$chat);
                    }
                    else{
                        $chat = ucwords($senderName).': Send the file - '.URL::to('/').'/'.$msg->attachment;
                        createFile($path,$chat);
                    }
                
                }
                return json_encode(array("path" => $FileName));
            }

            if($action == 'pdf'){
                $FileName = "/upload/chat_msg/chat_history_".date("Y_m_d").".pdf";
                $path = $_SERVER['DOCUMENT_ROOT'] . $FileName;
                if(file_exists($path)){ unlink($path); }

                $pdf = \App::make('dompdf.wrapper');
                $chat = '<ul>';
                foreach($msgs as $key => $msg){
                    $senderName = User::find($msg->sender_id)->name;
                    if($msg->msg != '' ){
                        $chat .= '<li>'.ucwords($senderName).': '.$msg->msg .'</li>';
                    }else{
                        if(in_array($msg->file_type,['jpg','jpeg','png'])){
                            $chat .= '<li>'.ucwords($senderName).': <img src="'.$msg->attachment.'" width="150" height="100" style="border: 2px solid;" />'.'</li>';
                        }else{
                            $chat .= '<li>'.ucwords($senderName).': Send the file - '.URL::to('/').'/'.$msg->attachment .'</li>';
                        }
                    }
                }
                $chat .= '</ul>';
                $pdf->loadHTML($chat);
                $pdf->save($path);
                return json_encode(array("path" => $FileName));
            }
        }
    }

    function deleteChat(Request $request){
        if(count((array)Auth::user()) <= 0){
            return '';
        }else{

            Chat_msg::destroy($request->id);
            return '';
        }
    }
}
