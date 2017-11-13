<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin');
	}
    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }
    public function login(Request $request)
    {
    	$this->validate($request,[
    		'email'=> 'required|email',
    		'password' => 'required|min:6'
    	]);
    	if(Auth::guard('admin')->attempt(['email' => $request->email,'password' =>$request->password],$request->remember))
    	{
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	return $this->sendFailedLoginResponse($request);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username()
    {
        return 'email';
    }
}
