<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-file', 'Admin\TestController@testFile');

Route::group(['namespace' => 'Admin'], function(){

	Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

	//company all route
	Route::get('/add-company', 'CompanyController@addCompany')->name('add.company');
	Route::post('/add-company', 'CompanyController@storeCompany')->name('store.company');
	Route::get('/company-list', 'CompanyController@companyList')->name('company.list');
	Route::get('/edit-company/{uid}/{slug}', 'CompanyController@editCompany')->name('edit.company');
	Route::post('/update-company/{uid}', 'CompanyController@updateCompany')->name('update.company');
	Route::get('/delete-company/{uid}', 'CompanyController@deleteCompany')->name('delete.company');


	//member all route
	Route::get('/add-member', 'MemberController@addMember')->name('add.member');
	Route::post('/add-member', 'MemberController@storeMember')->name('store.member');
	Route::get('/member-list', 'MemberController@memberList')->name('member.list');
	Route::get('/edit-member/{uid}/{slug}', 'MemberController@editMember')->name('edit.member');
	Route::post('/update-member/{uid}', 'MemberController@updateMember')->name('update.member');
	Route::get('/delete-member/{uid}', 'MemberController@deleteMember')->name('delete.member');
	Route::get('/single-member-details/{uid}', 'MemberController@singleMemberDetails')->name('single.member.details');

	//user all route
	Route::get('/add-user', 'UserController@addUser')->name('add.user');
	Route::post('/store-user', 'UserController@storeUser')->name('store.user');
	Route::get('/user-list', 'UserController@userList')->name('user.list');
	Route::get('/edit-user/{uid}', 'UserController@editUser')->name('edit.user');
	Route::post('/update-user/{uid}', 'UserController@updateUser')->name('update.user');
	Route::get('/delete-user/{uid}', 'UserController@deleteUser')->name('delete.user');

	//category all route
	Route::get('/add-category', 'CategoryController@addCategory')->name('add.category');
	Route::post('/add-category', 'CategoryController@storeCategory')->name('store.category');
	Route::get('/category-list', 'CategoryController@categoryList')->name('category.list');
	Route::get('/edit-category/{uid}/{slug}', 'CategoryController@editCategory')->name('edit.category');
	Route::post('/update-category/{uid}', 'CategoryController@updateCategory')->name('update.category');
	Route::get('/delete-category/{uid}', 'CategoryController@deleteCategory')->name('deleted.category');

	//category all route
	Route::get('/add-expense-category', 'ExpenseCategoryController@addExpenseCategory')->name('expense.category.add');
	Route::post('/add-expense-category', 'ExpenseCategoryController@storeExpense')->name('expense.category.store');
	Route::get('/expense-category-list', 'ExpenseCategoryController@expenseCategoryList')->name('expense.category.list');
	Route::get('/edit-expense/{uid}/{slug}', 'ExpenseCategoryController@editExpense')->name('edit.expense');
	Route::post('/update-expense/{uid}', 'ExpenseCategoryController@updateExpense')->name('expense.category.update');
	Route::get('/delete-category/{uid}', 'ExpenseCategoryController@deleteExpense')->name('delete.expense');


	//all report route
	Route::get('/income-report', 'ReportController@incomeReport')->name('income.report');
	Route::get('/expense-report', 'ReportController@expenseReport')->name('expense.report');
	Route::get('/income-expense-report', 'ReportController@incomeExpenseReport')->name('income.expense.report');
	Route::get('/due-installment', 'ReportController@dueInstallment')->name('due.installment');
	Route::get('/passport-expired', 'ReportController@passportExpired')->name('passport.expired');
	Route::get('/visa-expired', 'ReportController@visaExpired')->name('visa.expired');
	Route::get('/cidb-report', 'ReportController@cidbReport')->name('cidb.report');

});

