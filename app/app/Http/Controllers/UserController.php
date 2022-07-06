<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('main.page');
    }

    public function showChangePass()
    {
        return view('change_password');
    }

    public function changePass(Request $request)
    {

        $this->validate($request,[
            'oldPass' => 'required',
            'newPass' => 'required'
        ]);

        if (!(Hash::check($request->get('oldPass'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('oldPass'), $request->get('newPass')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        if(strcmp($request->get('newPass'), $request->get('confPass')) != 0) {
            return redirect()->back()->with("error","New and Confirmed Password are different.");
        }


        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('newPass'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function showRegister()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        if(strcmp($request->get('password'), $request->get('confPass')) != 0){
            return redirect()->back()->with("error","New and Confirmed Password are different.");
        }

        if (User::where('username',$request->username)->exists()) {
            return redirect()->back()->with("error","Username already taken");
        };

        return redirect()->route('main.page')->with("success","User sucessfully created!");
    }
}
