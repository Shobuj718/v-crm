<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function addCompany(){
    	return view('admin.company-add');
    }
    public function companyList(){
    	return view('admin.company-list');
    }
}
