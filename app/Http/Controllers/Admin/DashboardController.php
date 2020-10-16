<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
    	return view('admin.dashboard');
    }
    public function pdf(){
    	//$pdf = \PDF::loadView('user.invoice.download', ['proposal' => $this->proposal, 'project_payment' => $this->project_payment]);
    	$pdf = \PDF::loadView('admin.pdf');
    	//return $pdf->download('test.pdf');
    	return $pdf->stream();
    }
}
