<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:landlord'); 
    }
    
    public function showLoginForm()
    {
        return view('auth.owner-login');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email','password'=>'required|min:8'
        ]);

        if(Auth::guard('landlord')->attempt(['email'=>$request->email, 'password' =>$request->password],$request->remember))
        {
            return redirect()->intended(route('owner.index'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
