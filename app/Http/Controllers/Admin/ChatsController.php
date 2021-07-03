<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Chat_msg;
use App\User;

class ChatsController extends Controller
{
    function __construct()
    {
         $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Chat_msg::all();
        foreach($results as $key => $val){
            $results[$key]['sender_name'] = User::find($val->sender_id)->name;
            $results[$key]['receiver_name'] = User::find($val->receiver_id)->name;
        }
        return view('admin.chats.index',compact('results'));
    }

    public function edit($id)
    {
        $results = Chat_msg::find($id);    
        return view('admin.chats.view',compact('results'));
    }

    public function destroy($id)
    {
        Chat_msg::destroy($id);
        return redirect("admin/chats")->with('message','Record deleted successfully.');
    }

    public static function getTableData(Request $request)
    {
        $columns =  ['id','msg','sender_id','receiver_id'];
        $where = '';
        
        return getCommonTableData($request, 'App\Model\Chat_msg','chats', 'id',  $columns,'','',$where, '','');
    }
}
