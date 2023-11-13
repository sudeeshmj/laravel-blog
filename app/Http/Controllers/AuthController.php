<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');

    }
    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }
        return redirect()->route('login')->with('message','Login details are not valid');
    }

    public function registration(){
        return view('auth.registration');
    }
    public function doRegistration(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
          ]);
          return redirect("login");
    }

    public function userDashboard(){
        return view('users.dashboard');

    }
    public function logout(){
       
        Auth::logout();
    
        return redirect()->route("blogs");
    }
}
