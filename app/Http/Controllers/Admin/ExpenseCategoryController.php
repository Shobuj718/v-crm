<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function addCategory(){
    	return view('admin.add-expense-category');
    }
    public function categoryList(){
    	return view('admin.expense-category-list');
    }
}
