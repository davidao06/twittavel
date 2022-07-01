<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login() {
        if (Auth::check()) {
            return view("profile");
        }
        else
            return view("login");
    }

    public function auth(Request $request) {

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username é obrigatório',
            'password.required' => 'Password é obrigatória',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('main.page');
        }
        else {
            return back()->withErrors([
                'failedLogin' => 'As credenciais fornecidas estão incorretas.',
            ])->onlyInput('username');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('main.page');
    }


}
