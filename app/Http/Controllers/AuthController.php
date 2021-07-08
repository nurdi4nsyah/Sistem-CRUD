<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Validator;
use Session;
use App\Models\User;
 


class AuthController extends Controller
{
    public function getLogin()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        
        $rules = [
            'email'=> 'required|email', 
            'password'=> 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all()); 
        }
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        Auth::attempt($data);
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            Session::flash('errors', 'email atau password salah');
            return redirect()->route('login');
        }
    }

    public function getRegister()
    {
        return view('auth.registrasi');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'email'=> 'required|email|unique:users', 
            'password'=> 'required|min:6|confirmed',
            

        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            Session::flash('Success', 'Register berhasil!');
            return redirect()->route('login');
        }else{
            Session::flash('Errors', 'Register gagal!');
            return redirect()->route('register');
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
