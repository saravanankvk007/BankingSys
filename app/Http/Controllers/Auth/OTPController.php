<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FAQRCode\Google2FA;

class OTPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // limit to 60 trials per minute, to avoid brute force
        $this->middleware('throttle:60,1');
    }

    public function show()
    {
        return view('auth.otp');
    }

    public function check(Request $request)
    {
        $google2fa = new Google2FA();
        $secret = Auth::user()->google2fa_secret;
        if ($google2fa->verify($request->input('otp'), $secret)) {
            session(["2fa_checked" => true]);
            session(["twofa_auth_done" => 1]);
			if (isset(Auth::user()->role) && Auth::user()->role == 'admin') 
            {
				return redirect()->route('admin.home');
            }
            else if (isset(Auth::user()->role) && Auth::user()->role == 'user') 
            {
               return redirect()->route('user.home');
            }
			
        }else{
		}

        throw ValidationException::withMessages([
            'otp' => 'Incorrect value. Please try again...'
        ]);
    }
	
	public function twofaactive()
    {
		$user = Auth::user();
        $google2fa = new Google2FA();
		
		$google2fa = app('pragmarx.google2fa');

        //$registration_data = $request->all();

        $secret1 = $google2fa->generateSecretKey();
        //$request->session()->flash('registration_data', $registration_data);

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret1
        );
       // $user = Auth::user();
        $google2fa = new Google2FA();

        // generate a secret
        $secret = $google2fa->generateSecretKey();

        // generate the QR code, indicating the address 
        $qr_code = $google2fa->getQRCodeInline(
            "cylab.be",
            $user->email,
            $secret
        );
//print_r($qr_code);
        
        session([ "2fa_secret" => $secret]);

        return view('auth.2fa', ["qr_code" => $qr_code,"QR_Image" => $QR_Image]);
    }
	
	
		
	public function dotwoauth(Request $request)
    {
        $google2fa = new Google2FA();

        // retrieve secret from the session
        $secret = session("2fa_secret");
		$secret11 = $google2fa->getCurrentOtp($secret);
        $user = Auth::user();
		
		print_r($request->input('otp'));
		$otpone = $request->input('otp');
		
		$valid = $google2fa->verify($secret11, $secret);
		
		//echo "----".$google2fa->getCurrentOtp($secret);
		//exit;
        if ($google2fa->verify($request->input('otp'), $secret)) {
            
            $user->google2fa_secret = $secret;
            $user->save();

            // avoid double OTP check
            session(["2fa_checked" => true]);
			if (isset(Auth::user()->role) && Auth::user()->role == 'admin') 
            {
				
				return redirect()->route('admin.home');
            }
            else if (isset(Auth::user()->role) && Auth::user()->role == 'user') 
            {
               return redirect()->route('user.home');
               //return redirect()->route('login.twofaauth');
            }
			
            return redirect();
        }

        throw ValidationException::withMessages([
            'otp' => 'Incorrect value. Please try again...']);
    }
	
}