<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
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
    	//$members = Member::orderBy('created_at', 'asc')->paginate(5);

        $members = Member::where('user_id', Auth::user()->id)
                 ->whereDate('passport_expire', '<', date('Y-m-d H:i:s'))
                 ->orderBy('id', 'asc')->paginate(10);
                 //->get();
                 //->paginate(5);
        //dd($members);

        $companies = Company::where('status', 'active')->get();
    	return view('admin.passport-expired', compact('members', 'companies'));
    }


    public function visaExpired(Request $request){

       if(request()->ajax()){

            
            if(!empty($request->company_id) && !empty($request->start_date) && !empty($request->end_date)){
               $members = DB::table('members')
                 ->where('company_id', $request->company_id)
                 ->whereDate('visa_expire_date', '<', date('Y-m-d H:i:s'))
                 ->whereBetween('visa_expire_date', [$request->start_date, $request->end_date])
                 ->get();
            }

            elseif(!empty($request->start_date) && !empty($request->end_date)){
               $members = DB::table('members')
                 ->where('company_id', $request->company_id)
                 ->whereDate('visa_expire_date', '<', date('Y-m-d H:i:s'))
                 ->whereBetween('visa_expire_date', [$request->start_date, $request->end_date])
                 ->get();
            }
            elseif(!empty($request->company_id)){
               $members = DB::table('members')
                 ->where('company_id', $request->company_id)
                 ->whereDate('visa_expire_date', '<', date('Y-m-d H:i:s'))
                 ->get();
            }
            else{
               $members = DB::table('members')->orderBy('id', 'asc')
                 ->whereDate('visa_expire_date', '<', date('Y-m-d H:i:s'))
                 ->get();
            }
            return datatables()->of($members)

              

              ->addColumn('action', function ($member) {
                 return '<a href="'.route('sendSms',$member->uid).'") class="btn btn-xs btn-primary"><i class="fas fa-sms"></i> SMS</a>';
                })
                ->setRowClass(function ($member) {
                    return $member->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                })

                ->editColumn('passport_expire', function ($member) {
                    return $member->passport_expire ? with(new \Carbon\Carbon($member->passport_expire))->format('d/M/Y') : '';
                })

                ->editColumn('visa_expire_date', function ($member) {
                    return $member->visa_expire_date ? with(new \Carbon\Carbon($member->visa_expire_date))->format('d/M/Y') : '';
                })
                
              ->make(true);
         }
         
        $companies = Company::where('status', 'active')->get();
        
        return view('admin.visa-expired', compact('companies'));
    }
    /*public function visaExpired(){
        //$members = Member::orderBy('created_at', 'asc')->paginate(5);

        $members = Member::where('user_id', Auth::user()->id)
                 ->whereDate('visa_expire_date', '<', date('Y-m-d H:i:s'))
                 ->orderBy('id', 'asc')->paginate(10);
                 //->get();
        //dd($members);
        $companies = Company::where('status', 'active')->get();
        return view('admin.visa-expired', compact('members', 'companies'));
    }*/
    public function cidbReport(){
    	$members = Member::orderBy('created_at', 'desc')->paginate(5);
        $companies = Company::where('status', 'active')->get();
        return view('admin.cidb-report', compact('members', 'companies'));
    }
}
