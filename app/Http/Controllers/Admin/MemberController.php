<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function addMember(){
    	return view('admin.add-member');
    }
    public function memberList(){
    	return view('admin.add-member');
    }
}
