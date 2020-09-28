<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
    	return view('admin.add-category');
    }
    public function categoryList(){
    	return view('admin.category-list');
    }
}
