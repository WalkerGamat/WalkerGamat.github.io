<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    
    public function showLoginForm(){
        return view('auth/loginAdmin');
    }

    public function login(Request $request){
        //Validate the form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
 if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember))
    {
     //if successful then redirect to main page 
     return redirect()->intended(route('admin.dashboard'));
    }
    //else redirect back to the login with the previous form
    return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
