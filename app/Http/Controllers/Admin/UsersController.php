<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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

        $users = User::where('is_admin','!=' , "0")->get();    
        
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        
        $imageName = "";
        $file = $data['avatar'];
        if($file)
        {
            $data->validate([                
                'avatar' => ['image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);
            $name = rand(1, 1000000000).'_'.str_replace(" ","_",$file->getClientOriginalName());
            $file->move(public_path()."/images/users/", $name);
            $imageName .=  $name;
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $imageName,
            'chat_color' => $data['chat_color'],
        ]);

        return redirect("admin/users")->with('message','Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);    
        return view('admin.users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $file = $request['avatar'];
        
        if($file)
        {
            $request->validate([                
                'avatar' => ['required', 'image'],
            ]);
            $name = rand(1, 1000000000).'_'.str_replace(" ","_",$file->getClientOriginalName());
            $file->move(public_path()."/images/users/", $name);
            $imageName =  $name;
            if($request['action']){
                User::where('id',$request['action'])->update([
                    'avatar' => $imageName
                ]);
            }
        }
        
        User::where('id',$request['action'])->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'is_active' => $request['is_active'],
            'chat_color' => $request['chat_color'],
        ]);

        return redirect("admin/users")->with('message','Record updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect("admin/users")->with('message','Record deleted successfully.');
    }

    public static function getTableData(Request $request)
    {
        $columns =  ['id','is_admin','name','email','is_active'];
        $where = '';
        
        return getCommonTableData($request, 'App\User','users', 'id',  $columns,'','',$where, '','');
    }
}
