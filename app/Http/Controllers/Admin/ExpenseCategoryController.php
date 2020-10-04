<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function addExpenseCategory(){
    	return view('admin.add-expense-category');
    }
    public function expenseCategoryList(){
    	$expese_categories = ExpenseCategory::all();
    	return view('admin.expense-category-list', compact('expese_categories'));
    }

    public function storeExpense(Request $request){
    	
    	//return response()->json($request->all());

    	try {

    		$expense = new ExpenseCategory;
    		$expense->uid 						= uniqid(time());
    		$expense->expense_category_name 	= $request->expense_category_name;
    		$expense->expense_category_status 	= $request->expense_category_status;
    		$expense->slug 						= Str::slug($request->expense_category_name);
    		$expense->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Expense Category created successfully done.',
                'expense'   => $expense,
                'redirect_url' => route('expense.category.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

    public function editExpense($uid, $slug){
    	$expense = ExpenseCategory::where('uid', $uid)->first();
    	return view('admin.edit-expense-category', compact('expense'));

    }

    public function updateExpense($uid, Request $request){

    	try {
    		$expense = ExpenseCategory::where('uid', $uid)->first();
    		$expense->expense_category_name 	= $request->expense_category_name;
    		$expense->expense_category_status 	= $request->expense_category_status;
    		$expense->slug 						= Str::slug($request->expense_category_name);
    		$expense->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'Expense Category information updated.',
                'expense'   => $expense,
                'redirect_url' => route('expense.category.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}

    }

    public function deleteExpense($uid){

    	try {
    		$expense = ExpenseCategory::where('uid', $uid)->first();

    		if(!empty($expense)){
    			$expense->delete();
    			return redirect()->route('expense.category.list')->with('error', 'Expense Category deleted success.');
    		}  	
    	
    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

}
