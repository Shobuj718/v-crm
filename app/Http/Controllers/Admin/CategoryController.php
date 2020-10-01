<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(){
    	return view('admin.add-category');
    }
    public function categoryList(){
    	$categories = Category::all();
    	return view('admin.category-list', compact('categories'));
    }

    public function storeCategory(Request $request){
    	
    	//return response()->json($request->all());

    	try {

    		$category = new Category;
    		$category->uid 				= uniqid(time());
    		//$category->company_id 		= $request->company_id;
    		$category->category_name 	= $request->category_name;
    		$category->category_status 	= $request->category_status;
    		$category->slug 			= Str::slug($request->category_name);
    		$category->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Category created successfully done.',
                'category'   => $category,
                'redirect_url' => route('category.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

    public function editCategory($uid, $slug){

    	$category = Category::where('uid', $uid)->first();
    	return view('admin.edit-category', compact('category'));

    }

    public function updateCategory($uid, Request $request){

    	try {
    		$category = Category::where('uid', $uid)->first();
    		$category->category_name 	= $request->category_name;
    		$category->category_status 	= $request->category_status;
    		$category->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Category information updated.',
                'category'   => $category,
                'redirect_url' => route('category.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}

    }

    public function deleteCategory($uid){

    	try {
    		$category = Category::where('uid', $uid)->first();

    		if(!empty($category)){
    			$category->delete();
    			return redirect()->route('category.list')->with('error', 'Category deleted success.');
    		}  	
    	
    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

}
