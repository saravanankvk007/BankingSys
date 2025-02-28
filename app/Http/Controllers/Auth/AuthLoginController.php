<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\userAccountDetail;
use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\Session;

use Validator;

class AuthLoginController extends Controller
{
    //
	// use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	// User Register
	
	public function registerView()
    {
        return view("auth/register");
    }
	public function doRegister(Request $request)
    {   
        $input = $request->all();
		$INITIAL_BALALNCE = config('app.INITIAL_BALALNCE');

     
        $validator = Validator::make($request->all(), [
						'first_name' => 'required|min:3|max:30',
						'last_name' => 'required|min:1|max:30',
						'email' => 'required|email|unique:users,email',
						'date_of_birth' => 'required',
						'password' => 'required|min:6|confirmed',
						'password_confirmation' => 'required|min:6|same:password',
					]);
		
		
		if ($validator->fails()) {
			return  redirect()->route('register')->withInput()->withErrors($validator);
		}else{
			//print_r($request->input());
		
			$CURRENCY_CODE = config('app.CURRENCY_CODE');
			$unique_accountnumber =  time() . rand(100, 999);
			$isFirstUser = User::count() == 0;
			$isFirstUser = $isFirstUser ? '0' : '1';
			$user = User::create([
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'role' => $isFirstUser,  // Assign 'admin'=1, 'user'=2 if it's the first user
			]);
			//echo $user->id;
			$userdetails = userAccountDetail::create([
				'user_id' => $user->id,
				'account_number' => $unique_accountnumber,
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'dob' => $request->date_of_birth,
				'address' => $request->address,
				'open_balance' => $INITIAL_BALALNCE,
				'final_balance' => $INITIAL_BALALNCE,
				'currency_code' => $CURRENCY_CODE,
				'role' => ($isFirstUser),  // Assign 'admin'=1, 'user'=2 if it's the first user
			]);
			return redirect()->route('login')->with('success','User Register Successsfully');
		}
		
    
	}
	
	//User Login
	public function loginView()
    {
        return view("auth/login");
    }


    public function doLogin(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     //print_r($request->input());
	
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
			
			if(isset(auth()->user()->google2fa_secret) && auth()->user()->google2fa_secret != ''){
				
				return redirect()->route('login.twofaotp');
			}else{
				return redirect()->route('login.twofaauth');
			}
        }
        else
        {
            return redirect('login')->with('error','Incorrect email or password!.');
        }
    }
	
	// logout method to clear the sesson of logged in user
    function logout()
    {
        \Auth::logout();
		Session::forget('2fa_checked');
		Session::forget('twofa_auth_done');
		Session::forget('username');
        return redirect("login")->with('success', 'Logout successfully');;
    }
	
}
