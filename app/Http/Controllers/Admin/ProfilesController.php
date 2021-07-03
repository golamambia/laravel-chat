<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $profiles = User::find(Auth::user()->id);    
        return view('admin.profiles.profiles',compact('profiles'));         
    }

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
        ]);

        return redirect("admin/profiles")->with('message','Record updated successfully.');
        
    }
}
