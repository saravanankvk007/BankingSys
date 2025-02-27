<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userAccountDetail;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    
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
		return view('admin/home',["msg"=>"Hello! I am user"]);
    }
	
	
	/**
     * Display a listing of users.
     */
    public function manageusers(Request $request)
    {
		
		
        //User::with('UserDetails')->where('role','=','1')->get()
//		$users = User::with('UserDetails')->where('role','=','1')->paginate(3);
		//print_r($users);
		
		$query = User::with('UserDetails')->where('role', '=', '1');

		// Filter by Name
		if ($request->filled('name')) {
			$query->whereHas('UserDetails', function ($q) use ($request) {
				$q->where('first_name', $request->name);
				$q->orwhere('last_name', $request->name);
			});
		}

		// Filter by Account Number
		if ($request->filled('account_number')) {
			$query->whereHas('UserDetails', function ($q) use ($request) {
				$q->where('account_number', $request->account_number);
			});
		}
		
		// Filter by Balance
		if ($request->filled('balance')) {
			$query->whereHas('UserDetails', function ($q) use ($request) {
				$q->where('final_balance', '>=', $request->balance); // Change condition as needed
				$q->orwhere('open_balance', '>=', $request->balance); // Change condition as needed
			});
		}
		
		$users = $query->paginate(10);
		
		return view('admin/user_list',compact('users'));
    }
	
	
	/**
     * Display a listing of users.
     */
    public function showuserFullDetails($id,$accnum)
    {
        //
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

		return view('admin/user_details_view',compact('users','userDetails','FinalBalanceCrt','FinalBalanceDpt','FinalBalanceRec'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		$currency_list = config('app.CURRENCY_CODE_LIST');
		$currency_list = explode(',',$currency_list);
		return view('admin/add_users', compact('currency_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
		$currency_list = config('app.CURRENCY_CODE_LIST');
		$currency_list = explode(',',$currency_list);
		//echo "<pre>";
		$rules = ["addmore.*" => "required" ];
		 
        foreach($request->addmore as $key => $value) {
            $rules["addmore.{$key}.first_name"] = 'required|min:3|max:30';
            $rules["addmore.{$key}.last_name"] = 'required|min:1|max:30';
            $rules["addmore.{$key}.email"] = 'required|email|unique:users,email';
            $rules["addmore.{$key}.date_of_birth"] = 'required';
            $rules["addmore.{$key}.CrCode"] = 'required|not_in:Select Curreny Type';
            
            
        }
		$messages = [
		  'required'  => 'The :attribute field is required.',
		  'unique'    => ':attribute is already used'
		];
		if ($request->validate($rules,$messages)) {
			//print_r($request->addmore);
			
			$data = $request->addmore;
			//print_r($data);
			//exit;
			
			$DEFAULT_PASSWORD = config('app.DEFAULT_PASSWORD');
			$CURRENCY_CODE = config('app.CURRENCY_CODE');
			$INITIAL_BALALNCE = config('app.INITIAL_BALALNCE');
			$isFirstUser = User::count() == 0;
			$isFirstUser = $isFirstUser ? '0' : '1';
			//echo "<pre>";
			foreach($data as $key=>$value){
				
				$unique_accountnumber =  time() . rand(100, 999);
				
				$userdata = [
					'email' => $value['email'],
					'password' => bcrypt($DEFAULT_PASSWORD),
					'role' => $isFirstUser,  // Assign 'admin'=1, 'user'=2 if it's the first user
				];
				//print_r($userdata);
				$user = User::create($userdata);
				//echo $user->id;
				
				$userAccount = [
					'user_id' => $user->id,
					'account_number' => $unique_accountnumber,
					'first_name' => $value['first_name'],
					'last_name' => $value['last_name'],
					'dob' => $value['date_of_birth'],
					'address' => $value['address'],
					'open_balance' => $INITIAL_BALALNCE,
					'final_balance' => $INITIAL_BALALNCE,
					'currency_code' => (isset($value['CrCode']) ? $value['CrCode'] : $CURRENCY_CODE),
					'role' => ($isFirstUser),  // Assign 'admin'=1, 'user'=2 if it's the first user
				];
				$userdetails = userAccountDetail::create($userAccount);
			}
			
			return redirect()->route('admin.userlist')->with('success','User\'s Register Successsfully');
		}
		
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
