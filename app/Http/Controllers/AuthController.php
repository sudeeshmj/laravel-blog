<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;

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
         
            if (Auth::user()->status == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
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
      
            $bloglist = Blog::where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('users.dashboard',compact('bloglist'));
       
}
public function adminDashboard(){
      
    $bloglist = Blog::latest()->get();
    return view('admin.admindashboard',compact('bloglist'));

}

    public function logout(){
       
        Auth::logout();
    
        return redirect()->route("blogs");
    }
}
