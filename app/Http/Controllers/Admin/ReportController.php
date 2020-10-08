<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Visa;
use App\Models\Cidb;
use App\Models\Document;
use App\Models\Levi;
use App\Models\Other;

use App\Models\Member;
use App\Models\Company;
use App\Models\Passport;
use App\Models\ExpenseCategory;
use App\Models\DepositDateAmount;
use App\Models\PaymentCategoryAmount;
use App\Models\PaymentInstallmentReceived;

class ReportController extends Controller
{
    public function incomeReport(){
        $members = Member::orderBy('created_at', 'desc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
        $paymentInstallmentReceived = PaymentInstallmentReceived::orderBy('created_at', 'asc')->paginate(15);
        //dd($paymentInstallmentReceived);
        return view('admin.income-report', compact('members', 'companies', 'paymentInstallmentReceived'));
    }
    public function expenseReport(){
        $members = Member::orderBy('created_at', 'desc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
        return view('admin.expense-report', compact('members', 'companies'));
    }
    public function incomeExpenseReport(){
    	$members = Member::orderBy('created_at', 'desc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
    	return view('admin.income-expense-report', compact('members', 'companies'));
    }
    public function dueInstallment(){
    	$members = Member::orderBy('created_at', 'asc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
    	return view('admin.due-installment', compact('members', 'companies'));
    }
    public function passportExpired(){
    	$members = Member::orderBy('created_at', 'asc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
    	return view('admin.passport-expired', compact('members', 'companies'));
    }
    public function visaExpired(){
        $members = Member::orderBy('created_at', 'asc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
        return view('admin.visa-expired', compact('members', 'companies'));
    }
    public function cidbReport(){
    	$members = Member::orderBy('created_at', 'desc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
        return view('admin.cidb-report', compact('members', 'companies'));
    }
}
