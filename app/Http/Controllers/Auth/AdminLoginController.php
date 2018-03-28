<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin'); // ako zelim da je u mogucnosti user da se loguje kao admin i admin kao user ostavim kako sad trenutno jeste u suprotnom samo napisem quest
    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }
    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
