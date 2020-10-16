<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use DB;
use Auth;
use App\Models\Visa;
use App\Models\Cidb;
use App\Models\Document;
use App\Models\Levi;
use App\Models\Icard;
use App\Models\Other;

use App\Models\Member;
use App\Models\Company;
use App\Models\Passport;
use App\Models\ExpenseCategory;
use App\Models\DepositDateAmount;
use App\Models\PaymentCategoryAmount;
use App\Models\PaymentInstallmentReceived;

class MemberController extends Controller
{
    public function addMember(){
        $companies = Company::where('status', 'active')->get();
    	$expense_categories = ExpenseCategory::all();
    	return view('admin.add-member', compact('companies', 'expense_categories'));
    }
    public function memberList2(Request $request){
      
        if(request()->ajax()){

            if(!empty($request->company_id)){
               $members = Member::where('company_id', $request->company_id)
                 ->where('deleted_at', NULL)
                 //->whereDate('visa_expire_date', '>', date('Y-m-d H:i:s'))                 
                 ->get();
              }
              else
              {
               $members = Member::
                 //->whereDate('visa_expire_date', '>', date('Y-m-d H:i:s'))
                  where('deleted_at', NULL)
                 ->get();
              }
              return datatables()->of($members)

              ->order(function ($query) {
                    if (request()->has('id')) {
                        $query->orderBy('id', 'desc');
                    }

                })

              ->addColumn('action', function ($member) {
                return '<div class="dropdown btn btn-info" style="background-color:#;"><a style="background-color:#;color:#fff" class="dropdown-toggle" data-toggle="dropdown" href="#">Action</a>
                        <ul class="dropdown-menu"  role="menu" aria-labelledby="dropdownMenu">
                            <li> <a class="dropdown-item" href="'.route('single.member.details',$member->uid).'")>Show</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="'.route('sendSms',$member->uid).'">SMS Passport</a></li>
                            <li><a class="dropdown-item" href="'.route('sendSms',$member->uid).'">SMS Visa</a></li>
                            <li><a class="dropdown-item" href="'.route('sendSms',$member->uid).'">SMS Visa Collect</a></li>
                            <li><a class="dropdown-item" href="'.route('delete.member',$member->uid).'">Remove</a></li>
                        </ul>
                      </div>';
                })
                ->setRowClass(function ($member) {
                    return $member->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                })

                ->editColumn('passport_expire', function ($member) {
                    return $member->passport_expire ? with(new \Carbon\Carbon($member->passport_expire))->format('d/M/Y') : '';
                })
                ->editColumn('company_name', function ($member) {
                    return $member->company->company_name;
                })
                ->editColumn('company_name', function ($member) {
                    return $member->company->company_name;
                })
                ->addColumn('paid', function ($member){
                    return $member->paymentInstallmentReceived->sum('received_amount');
                })

                ->editColumn('visa_expire_date', function ($member) {
                    return $member->visa_expire_date ? with(new \Carbon\Carbon($member->visa_expire_date))->format('d/M/Y') : '';
                })

                
              /*->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                })*/
              ->make(true);
         }
         
        $companies = Company::where('status', 'active')->get();
        
        return view('admin.member-list', compact('companies'));
    }

    public function memberList(){
        //dd(date('Y-m-d H:i:s'));
        $members = Member::orderBy('id', 'asc')->whereDate('visa_expire_date', '>', date('Y-m-d H:i:s'))->get();
        $companies = Company::where('status', 'active')->get();
    	
    	return view('admin.member-list2', compact('members', 'companies'));
    }

    public function storeMember(Request $request){
    	
         
        //return response()->json($request->all());          	

    	try {

            $company = Company::where('id', $request->company_id)->first();
    		
            $user = Auth::user();
    		//return response()->json($user);
    		$member = new Member;
    		$member->uid 					= uniqid(time());
            $member->user_id                = $user->id;
            $member->company_id             = $request->company_id;
    		$member->company_name 			= $company->company_name;

    		//passport info
    		$member->passport_no 			= $request->passport_no;
    		$member->passport_surname 		= $request->passport_surname;
    		$member->passport_givename 		= $request->passport_givename;
    		$member->group_name 			= $request->group_name;

            

    		$member->passport_expire 		= $request->passport_expire;
    		$member->passport_sub_date 		= $request->passport_sub_date;

    		//visa copy
    		// add visa multiple copy

            

    		$member->visa_expire_date 		= $request->visa_expire_date;
    		$member->visa_status 			= $request->visa_status;
    		$member->visa_sub_date 			= $request->visa_sub_date;
    		$member->medical_status 		= $request->medical_status;
    		$member->medical_date 			= $request->medical_date;

    		
			// levi copy
    		// add multiple levi copy
    		// add multiple I-Card copy
    		// add multiple Others copy


    		//personal info
    		$member->birth_date 			= $request->birth_date;
    		$member->phone 					= $request->phone;
    		$member->phone_bd 				= $request->phone_bd;
    		$member->phone_emergency 		= $request->phone_emergency;
    		$member->email 					= $request->email;
    		//$member->member_image 			= $request->member_image;
    		$member->present_address 		= $request->present_address;
    		$member->parmanent_address 		= $request->parmanent_address;

    		//other info
    		$member->letter_bank 			= $request->letter_bank;
    		$member->home_country 			= $request->home_country;
    		$member->out_station 			= $request->out_station;
    		$member->current_status 		= $request->current_status;
			

    		//Document file
    		//add Document file here

    		$member->special_note 			= $request->special_note;
    		$member->file_close 			= $request->file_close;
    		$member->passport_status 		= $request->passport_status;

    		//cidb info
    		$member->cidb_subbmision_date 	= $request->cidb_subbmision_date;
    		$member->cidb_delivery_date 	= $request->cidb_delivery_date;
    		$member->cidb_status 			= $request->cidb_status;

    		//CIDB Copy
    		// add CIDB Copy file here

    		 //Depposit info
    		$member->total_deposit 			= $request->total_deposit;
    		$member->diposit_discount 		= $request->diposit_discount;
    		$member->permanent_diposit 		= $request->permanent_diposit;
    		$member->deposit_refund_amount 	= $request->deposit_refund_amount;
    		$member->deposit_refund_date 	= $request->deposit_refund_date;

    		// multiple value added...
    		//$member->diposit_date 			= $request->diposit_date;
    		//$member->deposit_amount 		= $request->deposit_amount;

    		



    		//$member->payment_total_amount 	= $request->payment_total_amount;
    		//$member->payment_discount 		= $request->payment_discount;
    		//$member->payment_payable 		= $request->payment_payable;

    		// multiple value added...
    		//$member->installment_date 		= $request->installment_date;
    		//$member->received_amount 		= $request->received_amount;
 		
    		$member->save();

            $received_amount = 0;

            for ($i=0; $i < count($request->installment_date); $i++) {
                
                $received_amount += $request->received_amount[$i];

                $payment_installment_received       = new PaymentInstallmentReceived;
                $payment_installment_received->uid  = uniqid(time());
                $payment_installment_received->installment_date         = $request->installment_date[$i];
                $payment_installment_received->received_amount      = $request->received_amount[$i];
                $payment_installment_received->company_id       = $request->company_id;
                $payment_installment_received->user_id          = $user->id;
                $payment_installment_received->member_id        = $member->id;
                $payment_installment_received->save();

            }

            //$member->installment_date       = $request->installment_date;
            $member->received_amount = $received_amount;            
            $member->save();

            for ($i=0; $i < count($request->diposit_date); $i++) {
                
                $deposit_date_amount        = new DepositDateAmount;
                $deposit_date_amount->uid   = uniqid(time());
                $deposit_date_amount->diposit_date      = $request->diposit_date[$i];
                $deposit_date_amount->deposit_amount    = $request->deposit_amount[$i];
                $deposit_date_amount->company_id       = $request->company_id;
                $deposit_date_amount->user_id          = $user->id;
                $deposit_date_amount->member_id        = $member->id;
                $deposit_date_amount->save();

            }


             //Payment info
            // multiple value added...
            
            $payment_total_amount = 0;

            for ($i=0; $i < count($request->payment_category_id); $i++) {
                
                $payment_total_amount += $request->payment_amount[$i];

                $payment_category_amount        = new PaymentCategoryAmount;
                $payment_category_amount->uid   = uniqid(time());
                $payment_category_amount->payment_category_id       = $request->payment_category_id[$i];
                $payment_category_amount->payment_amount        = $request->payment_amount[$i];
                $payment_category_amount->company_id       = $request->company_id;
                $payment_category_amount->user_id          = $user->id;
                $payment_category_amount->member_id        = $member->id;
                $payment_category_amount->save();

            }

            $member->payment_total_amount     = $payment_total_amount;
            $member->payment_discount       = $request->payment_discount;
            $member->payment_payable      = $payment_total_amount - $request->payment_discount;
            $member->save();

            //$member->due_amount = $member->payment_payable  - $received_amount;
            $member->due_amount = $request->due_amount;
            $member->save();
    		
            if($request->hasfile('passport_copy'))
             {
                foreach($request->file('passport_copy') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/passport/', $name);

                    $passport = new Passport;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->passport_image   = $name;
                    $passport->save();
                }
             }

            if($request->hasfile('visa_copy'))
             {
                foreach($request->file('visa_copy') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/visa_copy/', $name);

                    $passport = new Visa;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->visa_image      = $name;
                    $passport->save();
                }
             }

            if($request->hasfile('levi_file'))
             {
                foreach($request->file('levi_file') as $file)
                {
                    $visa_name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/levi_file/', $visa_name);

                    $passport = new Levi;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->levi_image       = $visa_name;
                    $passport->save();
                }
             }
	         
             //i-card
            if($request->hasfile('icard_file'))
             {
                foreach($request->file('icard_file') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/icard_file/', $name);

                    $icard = new Icard;
                    $icard->uid              = uniqid(time());
                    $icard->company_id       = $request->company_id;
                    $icard->user_id          = $user->id;
                    $icard->member_id        = $member->id;
                    $icard->icard_image      = $name;
                    $icard->save();
                }
             }


            if($request->hasfile('other_file'))
            {
                foreach($request->file('other_file') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/other_file/', $name);

                    $passport = new Other;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->other_image      = $name;
                    $passport->save();
                }
             }

             if($request->hasFile('member_image')){
                $image              = $request->file('member_image');
                $image_origin_name  = $image->getClientOriginalName();
                $file_name          = pathinfo($image_origin_name, PATHINFO_FILENAME); // file
                $new_name           = $file_name.rand() . '.' . $image->getClientOriginalExtension();
                
                $image->move(public_path('images/member_image/'), $new_name);
    
                $member->member_image   = $name;
                $member->save();
            }

            if($request->hasfile('document'))
             {
                foreach($request->file('document') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/document/', $name);

                    $passport = new Document;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->document_image      = $name;
                    $passport->save();
                }
             }

            if($request->hasfile('cidb_file'))
             {
                foreach($request->file('cidb_file') as $file)
                {
                    $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
                    $file->move(public_path().'/images/cidb_file/', $name);

                    $passport = new Cidb;
                    $passport->uid              = uniqid(time());
                    $passport->company_id       = $request->company_id;
                    $passport->user_id          = $user->id;
                    $passport->member_id        = $member->id;
                    $passport->cidb_image      = $name;
                    $passport->save();
                }
             }

            
    		return response()->json([
                'status'    => 'success',
                'message'   => 'Member created successfully done.',
                'data'   => $request->all(),
                'member'   => $member,
                'redirect_url' => route('member.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong. Please try after sometime!!!',
                
            ]);
    	}
    }

    public function editmember($uid, $slug){

    	$member = member::where('status', 'active')->where('uid', $uid)->first();
    	return view('admin.edit-member', compact('member'));

    }

    public function updatemember($uid, Request $request){
        return response()->json($request->all());
    	try {
    		$member = member::where('status', 'active')->where('uid', $uid)->first();
    		$member->member_name 		= $request->member_name;
    		$member->member_address 	= $request->member_address;
    		$member->slug 				= Str::slug($request->member_name);
    		$member->save();

    		return response()->json([
                'status'    => 'success',
                'message'   => 'member information updated.',
                'member'   => $member,
                'redirect_url' => route('member.list')
                
            ]);


    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}

    }

    public function deletemember($uid){

    	try {
    		$member = Member::where('uid', $uid)->first();
    		if(!empty($member)){
    			$member->delete();
    			return redirect()->route('membersearch.index')->with('error', 'Member deleted successfully done !!!');
    		}  	
    	
    	} catch (\Exception $e) {
    		return redirect()->route('membersearch.index')->with('error', 'Something went wrong, please try again');
    	}
    }

    public function singleMemberDetails($member_uid){
        $member = Member::where('uid', $member_uid)->first();
        //dd($member);
        return view('admin.single-member-details', compact('member'));
    }

    public function printMemberDetails($member_uid){
        $member = Member::where('uid', $member_uid)->first();
        //dd($member);
        return view('print.single-member-prints', compact('member'));
    }
    public function singleMemberDetailsDownload($member_uid){
        //$pdf = \PDF::loadView('admin.single-member-details', ['proposal' => $this->proposal, 'project_payment' => $this->project_payment]);
        $member = Member::where('uid', $member_uid)->first();
        $pdf = \PDF::loadView('download.single-member-details-download', ['member' => $member]);
        //return $pdf->download('test.pdf');
        return $pdf->stream();
    }

}
