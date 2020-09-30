<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;
use App\Models\Company;

class CompanyController extends Controller
{
    public function addCompany(){
    	return view('admin.company-add');
    }
    public function companyList(){
    	$companies = Company::where('status', 'active')->get();
    	return view('admin.company-list', compact('companies'));
    }

    public function storeCompany(Request $request){
    	
    	//return response()->json($request->all());

    	try {

    		$company = new Company;
    		$company->uid 				= uniqid(time());
    		$company->company_name 		= $request->company_name;
    		$company->company_address 	= $request->company_address;
    		$company->slug 				= Str::slug($request->company_name);
    		$company->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Company created successfully done.',
                'company'   => $company,
                'redirect_url' => route('company.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

    public function editCompany($uid, $slug){

    	$company = Company::where('status', 'active')->where('uid', $uid)->first();
    	return view('admin.edit-company', compact('company'));

    }

    public function updateCompany($uid, Request $request){

    	try {
    		$company = Company::where('status', 'active')->where('uid', $uid)->first();
    		$company->company_name 		= $request->company_name;
    		$company->company_address 	= $request->company_address;
    		$company->slug 				= Str::slug($request->company_name);
    		$company->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Company information updated.',
                'company'   => $company,
                'redirect_url' => route('company.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}

    }

    public function deleteCompany($uid){

    	try {
    		$company = Company::where('status', 'active')->where('uid', $uid)->first();

    		if(!empty($company)){
    			$company->delete();
    			return redirect()->route('company.list')->with('error', 'Company deleted success.');
    		}  	
    	
    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

}
