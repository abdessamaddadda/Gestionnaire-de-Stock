<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function show(){
        return view('login.show');
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email'=>$email, 'password'=>$password];
        if(Auth::attempt($credentials)){
            return redirect('/home')->with('success', 'Connected Successfully' );
        }else{
            return redirect()->back()->withErrors(['email' => 'Email or password incorrect'])->onlyInput('email');
        }
    }
    public function register(){
        return view('login.register');
    }
    public function registernew(Request $request){
        $email = $request->email;
        $password = $request->password;
        DB::table('users')->insert([
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        return redirect()->route('login.show');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.show');
     }
}
