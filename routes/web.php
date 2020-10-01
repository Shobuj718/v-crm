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
	Route::get('/member-list', 'MemberController@memberList')->name('member.list');

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
	Route::get('/delete-category/{uid}', 'CategoryController@deleteCategory')->name('delete.category');

	//category all route
	Route::get('/add-expense-category', 'ExpenseCategoryController@addCategory')->name('expense.category.add');
	Route::get('/expense-category-list', 'ExpenseCategoryController@categoryList')->name('expense.category.list');

});

