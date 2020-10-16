<?php

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

//use Analytics;
use Spatie\Analytics\Period;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){

	//fetch the most visited pages for today and the past week
	$data = \Analytics::fetchMostVisitedPages(Period::days(7));



	//fetch visitors and page views for the past week
	\Analytics::fetchVisitorsAndPageViews(Period::days(7));

	$analyticsData = \Analytics::fetchVisitorsAndPageViews(Period::months(6));
	dd($analyticsData);

	//retrieve sessions and pageviews with yearMonth dimension since 1 year ago 
	$analyticsData = \Analytics::performQuery(
	    Period::years(1),
	    'ga:sessions',
	    [
	        'metrics' => 'ga:sessions, ga:pageviews',
	        'dimensions' => 'ga:yearMonth'
	    ]
	);

	//$startDate = \Carbon::now()->subYear();
	//$endDate = \Carbon::now();

	//$year_data = Period::create($startDate, $endDate);
	dd($analyticsData);


});
