<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

     dd('ok');

    }
}
