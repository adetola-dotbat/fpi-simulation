<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 
        
        if(Auth::attempt($request->only('email','password'))){
                return redirect('admin');
                // return redirect('/');
        }
        return redirect('login')->withError('Login details are not valid');

    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // validate 
     $request->validate([
        'fullname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'password' => 'required'
     ]);

        // save in users table 
        
        User::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password)
        ]);

        // login user here 
    
        
        // if(Auth::attempt($request->only('email','password'))){
        //     $usertype = Auth::user()->usertype;
        //     // dd($usertype);
        //     if($usertype == '1'){
        //         return redirect('admin');
        //     }
        //     else{
        //         return redirect('/mowin');
        //     }
        // }
        if(Auth::attempt($request->only('email','password'))){
            return redirect('admin');
            // return redirect('/');
    }
        return redirect('register')->withError('Error');
    }

    public function admin_log(){
        // $category = Category::all();
        // $data_book = Book::all()->sortByDesc('id')->take(5);
        // $data_book_total = Book::all()->sortByDesc('id')->take(5);
        // $orders = Order::all()->sortByDesc('id')->take(5);
        // return view('lms-admin.index', compact('category', 'data_book', 'data_book_total', 'orders'));
        return view('fastrans.index');
    }

    public function user_log(){
        $category = Category::all();
        return view('home.index', compact('category'));
    }

    public function checkpack(){
        return view('fastrans.parking');
    }

     public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}