<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Auth;
use App\Models\Member;
use App\Models\Company;
use App\Models\Passport;
use App\Models\DepositDateAmount;
use App\Models\PaymentCategoryAmount;
use App\Models\PaymentInstallmentReceived;

class MemberController extends Controller
{
    public function addMember(){
    	$companies = Company::where('status', 'active')->get();
    	return view('admin.add-member', compact('companies'));
    }
    public function memberList(){
    	$companies = Company::where('status', 'active')->get();
    	return view('admin.member-list', compact('companies'));
    }

    public function storeMember(Request $request){
    	
    	//return response()->json($request->all());

    	//try {
    		$user = Auth::user();
    		//return response()->json($user);
    		$member = new Member;
    		$member->uid 					= uniqid(time());
    		$member->company_id 			= $request->company_id;

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
    		$member->member_image 			= $request->member_image;
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

    		for ($i=0; $i < count($request->diposit_date); $i++) {
            	
            	$deposit_date_amount		= new DepositDateAmount;
            	$deposit_date_amount->uid 	= uniqid(time());
                $deposit_date_amount->diposit_date 		= $request->diposit_date[$i];
                $deposit_date_amount->deposit_amount 	= $request->deposit_amount[$i];
                $deposit_date_amount->save();

            }


    		 //Payment info
    		// multiple value added...
    		
            for ($i=0; $i < count($request->payment_category_id); $i++) {
            	
            	$payment_category_amount 		= new PaymentCategoryAmount;
            	$payment_category_amount->uid 	= uniqid(time());
                $payment_category_amount->payment_category_id 		= $request->payment_category_id[$i];
                $payment_category_amount->payment_amount 		= $request->payment_amount[$i];
                $payment_category_amount->save();

            }



    		$member->payment_total_amount 	= $request->payment_total_amount;
    		$member->payment_discount 		= $request->payment_discount;
    		$member->payment_payable 		= $request->payment_payable;

    		// multiple value added...
    		//$member->installment_date 		= $request->installment_date;
    		//$member->received_amount 		= $request->received_amount;

    		for ($i=0; $i < count($request->installment_date); $i++) {
            	
            	$payment_installment_received		= new PaymentInstallmentReceived;
            	$payment_installment_received->uid 	= uniqid(time());
                $payment_installment_received->installment_date 		= $request->installment_date[$i];
                $payment_installment_received->received_amount 		= $request->received_amount[$i];
                $payment_installment_received->save();

            }


    		$member->save();

    		// passport copy
    		// add multiple passport copy
    		$passport = new Passport;
    		if($request->hasfile('passport_copy'))
	         {
	            foreach($request->file('passport_copy') as $file)
	            {
	            	
	                $name = $request->company_id.'-'.$member->id.'-'.time().'.'.$file->extension();
	                $file->move(public_path().'/images/passport/', $name);

	                $passport->uid 				= uniqid(time());
	                $passport->company_id 		= $request->company_id;
	                $passport->user_id 			= $user->id;
	                $passport->member_id 		= $member->id;
	                $passport->passport_image 	= $name;
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


    	/*} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}*/
    }

    public function editmember($uid, $slug){

    	$member = member::where('status', 'active')->where('uid', $uid)->first();
    	return view('admin.edit-member', compact('member'));

    }

    public function updatemember($uid, Request $request){

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
    		$member = member::where('status', 'active')->where('uid', $uid)->first();

    		if(!empty($member)){
    			$member->delete();
    			return redirect()->route('member.list')->with('error', 'member deleted success.');
    		}  	
    	
    	} catch (\Exception $e) {
    		return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong.',
                
            ]);
    	}
    }

}
