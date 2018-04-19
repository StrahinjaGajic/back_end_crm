<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct() {

        $this->middleware('guest:admin',['except' => ['logout']]); // ako zelim da je u mogucnosti user da se loguje kao admin i admin kao user ostavim kako sad trenutno jeste u suprotnom samo napisem quest

    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        //attempt proverava da li korisnik postoji i loguje ga.vraca true/false i hashuje sifru provea dali je to ta sifra
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.property-list'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
