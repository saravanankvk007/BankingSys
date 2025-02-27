<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userAccountDetail;
use App\Models\FundTransfer;
use Illuminate\Support\Facades\DB;
use Validator;
use Exception;

class UserFundTransferController extends Controller
{
    //
	public function __construct()
	{
		//
	}
	
	
	/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
		return view('user/home',["msg"=>"Hello! I am user"]);
    }
	
	/**
     * Display a listing of Fund Transfer History.
     */
    public function fundhistory()
    {
        //
		$id = Auth::user()->id;
		$users = User::with(['UserDetails'])->where('id','=',$id)->get();		
		$userDetails = userAccountDetail::where('user_id', $id)->first();

		if ($users) {
			$fundTransfers = $userDetails->allTransfers();
			//print_r($fundTransfers);
		} 
		$receivedAmount = 0;
		$sentAmount = 0;
		$FinalBalanceRec = $users[0]->UserDetails->final_balance;
		$FinalBalance = $users[0]->UserDetails->final_balance;
		//$FinalBalance = 0;
		foreach ($userDetails->receivedTransfers as $key=>$value){
			$receivedAmount += $value->trf_amount;
		}
		foreach ($userDetails->sentTransfers as $key=>$value){
				$sentAmount += $value->trf_amount;
		}
		$FinalBalanceCrt = $receivedAmount; 
		$FinalBalanceDpt = $sentAmount; 


		return view('user/fundhistory',compact('users','userDetails','FinalBalanceCrt','FinalBalanceDpt','FinalBalanceRec'));
    }
	
	/**
     * Make Fund Transfer.
     */
    public function makefundtransfer()
    {
        //
		$id = Auth::user()->id;
		$users = User::with(['UserDetails'])->where('id','=',$id)->get();		
		$currency_list = config('app.CURRENCY_CODE_LIST');
		$currency_list = explode(',',$currency_list);

		return view('user/makefund_transfer',compact('users','currency_list'));
    }
	
	public function domakefundtransfer(Request $request){
		
		$validator = Validator::make($request->all(), [
						'recipient_accnum' => 'required|numeric',
						'currencytype' => 'required|not_in:Select Curreny Type',
						'transfer_amount' => 'required|numeric',
					]);
					
		if ($validator->fails()) {
			return  redirect()->back()->withInput()->withErrors($validator);
		}else{
			
			$id = Auth::user()->id;
		    $currency_list = config('app.CURRENCY_CODE_LIST');
			$currency_list = explode(',',$currency_list);
			$useAccDetails = userAccountDetail::where('account_number', $request->sender_accnum)->get();
			$useAccDetailsRecip = userAccountDetail::where('account_number', $request->recipient_accnum)->get();
			
			$final_balance = $useAccDetails[0]->final_balance;
			$final_balanceRcpt = $useAccDetailsRecip[0]->final_balance;
			//print_r($request->recipient_accnum);
			
			//print_r($request->currency_convertion_amount);
			//print_r($request->currencytype);
			//exit;
			$insert = [
					'trf_frm_accountnumber' => $request->sender_accnum,
					'trf_to_accountnumber' => $request->recipient_accnum,
					'trf_amount' => $request->currency_convertion_amount,
					'trf_currency_code' => $request->currencytype,
					'trf_frm_currency_code' => $request->sender_currencycode,
					'trf_to_currency_code' => $request->currencytype,
					'trf_status' => 1,
					'trf_date' => date('Y-m-d'),
				];
				
				
			if( $final_balance > 10 ){
				
				$fundTransfer = FundTransfer::create($insert);
				
				$finalBalanceSender = $final_balance - $request->transfer_amount;
				$finalBalanceRecipit = $final_balanceRcpt + $request->currency_convertion_amount;
				
				$updateSender = userAccountDetail::where('account_number', $request->sender_accnum)->update(['final_balance' => $finalBalanceSender]);
				$updateRecpt = userAccountDetail::where('account_number', $request->recipient_accnum)->update(['final_balance' => $finalBalanceRecipit]);
				session()->flash('status', 'Fund Transfer Successsfully');
				return redirect()->route('user.home')->with('status','Fund Transfer Successsfully');
			}
			
		}
		
	}
	
	public function getcurrenyConvert($rid, $sid,$tamount)
    {
		
        // Fetch data based on selected value
        
		$currency_list = config('app.CURRENCY_CODE_LIST');
		$currency_list = explode(',',$currency_list);
		
		$sendCrCode = $sid;
		$rictCrCode = $rid;
		$tamount = $tamount;
		$apiurl = "https://api.exchangeratesapi.io/v1/latest?access_key=";
		$apiKey = "aefeee0670f29ca2c43bd12c2687d770";
		$apiVar = "&symbols=USD,AUD,CAD,PLN,MXN,EUR,GBP&format=1";
		
		$mainApiUrl = $apiurl.$apiKey.$apiVar;
		$response = file_get_contents($mainApiUrl);
		//print_r($response);
		$response = json_decode($response, true);
		if(isset($response['rates'])){
			$apiResult = $response['rates'];
			
		}else {
			$apiResult = '{"success":true,
						  "timestamp":1740629404,
						  "base":"EUR",
						  "date":"2025-02-27",
						  "rates":{
							"USD":1.04672,
							"AUD":1.663309,
							"CAD":1.50297,
							"PLN":4.139901,
							"MXN":21.392032,
							"EUR":1,
							"GBP":0.826715
						  }
						}';
			$apiResult = json_decode($apiResult, true);
			$apiResult = $apiResult['rates'];
		}


	$apiResultRates = $apiResult; 

		$exchangeRates = [];
		$exchangeRates2 = [];
		foreach($currency_list as $key => $val){			
			foreach($apiResultRates as $currency => $rate){
					//echo "$val != $currency"."<br/>";
				if(!is_null($currency) && $val !== $currency){
					$exchangeRates2[$currency]= $rate;
				}
				$exchangeRates[$val] = $exchangeRates2;
			}
		}

		// If the same currency, return the original amount
		if ($sendCrCode === $rictCrCode) {
			return response()->json([$tamount]);
		}

		// Check if conversion rate exists
		if (!isset($exchangeRates[$sendCrCode][$rictCrCode])) {
			return response()->json(["Error"=>"Exchange rate for $sendCrCode to $rictCrCode not available. Please choose any other option"]);
		}
 

		// Get the base exchange rate
		$baseRate = $exchangeRates[$sendCrCode][$rictCrCode];

		// Apply the 1% spread
		$spread = 0.01;
		$finalRate = $baseRate * (1 + $spread); // Increase the rate by 1%

		// Convert amount
		$examount =  round($tamount * $finalRate, 2);
		

       return response()->json([$examount]);
    }
	
}
