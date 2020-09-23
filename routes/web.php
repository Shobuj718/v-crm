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
	Route::get('/company-list', 'CompanyController@companyList')->name('company.list');


	//member all route
	Route::get('/add-member', 'MemberController@addMember')->name('add.member');
	Route::get('/member-list', 'MemberController@memberList')->name('member.list');

});

