<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(){
    	return view('admin.add-user');
    }
    public function userList(){
    	return view('admin.user-list');
    }
}
