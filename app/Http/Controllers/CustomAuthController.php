<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\department;
use App\Models\Doctor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{
   public function login(){
    return view('auth.login');
   }

   public function loginUser(Request $request){
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5|max:12',
    ]);

    $user = User::where('email', '=', $request->email)->first();
    if($user){
        if (hash::check($request->password, $user->password) && $user->usertype == '0') {
            $request->session()->put('loginId', $user->id);
            return redirect('nichinto');
        }elseif(hash::check($request->password, $user->password) && $user->usertype == '1') {
            $request->session()->put('loginId', $user->id);
            return redirect('/admin');
        }else{
            return back()->with('fail', 'Password or Email not matches.');
            
        }
    }else{
        return back()->with('fail', 'This email is not registered');
    }
   }

   public function registration(){
    return view('auth.register');
   }
   public function registerUser(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'phone'=>'required',
        'password'=>'required|min:5|max:12',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);
    $res = $user->save();
    if($res){
        return back()->with('success', 'You have registered successfully');
    }
    else{
        return back()->with('fail', 'not successfully');

    }
   }

   public function dashboard(){
        $departments = department::all();
        $doctors = Doctor::all();
        return view('customer.index', compact('departments', 'doctors'));
   }

   public function admin(){
    return view('clinic-admin.index');
   }

   public function logout(){
    if(Session::has('loginId')){
        Session::pull('loginId');
        return redirect('login');
    }
   }
}