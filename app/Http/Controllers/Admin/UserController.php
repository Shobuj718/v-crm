<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use App\Models\User;

use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users');
    }

    public function addUser(){
    	return view('admin.add-user');
    }
    public function userList(){
    	$users = User::all();
    	return view('admin.user-list', compact('users'));
    }

    public function storeUser(Request $request){
    	
    	//return response()->json($request->all());

    	try {

    		$user_exist = User::where('email', $request->email)->first();

    		if(!empty($user_exist)){
    			return response()->json([
	                'status'    => 'error',
	                'message'   => 'Email already exist.Please choose another.',
	                
	            ]);
    		}

    		$user = new User;
    		$user->uid 					= uniqid(time());
    		$user->username 			= $request->username;
    		$user->email 				= $request->email;
    		$user->password 			= Hash::make($request->password);
    		$user->original_password 	= $request->password;
    		$user->role 				= $request->role;
    		$user->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'User created successfully done.',
                'user'   => $user,
                'redirect_url' => route('user.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

    public function editUser($uid){

    	$user = User::where('uid', $uid)->first();
    	return view('admin.edit-user', compact('user'));

    }

    public function updateUser($uid, Request $request){

    	try {
    		$user = User::where('uid', $uid)->first();
    		$user->username 			= $request->username;
    		$user->email 				= $request->email;
    		$user->password 			= Hash::make($request->password);
    		$user->original_password 	= $request->password;
    		$user->role 				= $request->role;
    		$user->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'User information updated.',
                'user'   	=> $user,
                'redirect_url' => route('user.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}

    }

    public function deleteUser($uid){

    	try {
    		$user = User::where('uid', $uid)->first();

    		if(!empty($user)){
    			$user->delete();
    			return redirect()->route('user.list')->with('error', 'User deleted success.');
    		}  	
    	
    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

}
