<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class RoleController extends Controller
{
    public function getAdminPage(){
    	$users = User::All();
    	return view('Admin')->withUsers($users);
    }

    public function postAssignRole(Request $request){
    	//dd($request);

    	$user = User::where('email',$request['email'])->first();
    	$user->roles()->detach();
    	
    	if($request['role_user']){
    		$user->roles()->attach(Role::where('name','User')->first());
    	}
    	
    	if($request['role_author']){
    		$user->roles()->attach(Role::where('name','Author')->first());
    	}

    	if($request['role_admin']){
    		$user->roles()->attach(Role::where('name','Admin')->first());
    	}
    	return redirect()->back();
    }
}
