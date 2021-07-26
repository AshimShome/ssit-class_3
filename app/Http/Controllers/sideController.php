<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class sideController extends Controller
{
    public function index(){
        $categories= categories::select('id','name','slug')->orderBy('id','DESC')->get();

        return view('frontend.home',compact('categories'));
    }

    public function signUp(){
        return view('auth.signUp');
    }

    public function register(Request $request){

        try {

            $request->validate([
                'firstName' =>'required',
                'lastName' =>'required',
                'email' =>'required',
                'password' =>'required|min:6|max:20',
            ]);

            User::create([

                'firstName' =>$request->firstName,
                'lastName' =>$request->lastName,
                'email' =>$request->email,
                'password' =>Hash::make($request->password)

            ]);

            session()->flash('success','User data save success');

        }catch (Exception $exception){
            dd($exception);
        }
        return redirect()->back();


    }
}
