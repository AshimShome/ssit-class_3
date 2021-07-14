<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class sideController extends Controller
{
    public function index(){
        return view('frontend.home');
    }

    public function signUp(){
        return view('auth.signUp');
    }

    public function register(Request $request){



        $request->validate([
            'firstName' =>'required',
            'lastName' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);

          User::create([

              'firstName' =>$request->firstName,
              'lastName' =>$request->lastName,
              'email' =>$request->email,
              'password' =>Hash::make($request->password)

          ]);
          return redirect()->back();

    }
}
