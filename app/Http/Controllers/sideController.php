<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class sideController extends Controller
{
    public function index(){
        $category= categories::select('id','name','slug')->orderBy('id','DESC')->get();

        return view('frontend.home',compact('category'));
    }
    public function category_post($slug){
   //dd($slug);
   $categories=categories::where('slug', $slug)->pluck('id')->first();


        $posts=categories::with('posts')->find($categories);
      return $posts;
  }


    public function signUp(){
        $category= categories::select('id','name','slug')->orderBy('id','DESC')->get();

        return view('auth.signUp',compact('category'));
    }

    public function login_form(){
    $category= categories::select('id','name','slug')->orderBy('id','DESC')->get();

    return view('auth.sign_in',compact('category'));
}

    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $creatensial= $request->only('email','password');
        if(Auth()->attempt( $creatensial)){

            return redirect('/admin');
        }else{
            dd('Wrong');
        }

      return redirect()->back();
    }



    public function register(Request $request){


        $request->validate([
            'firstName' =>'required',
            'lastName' =>'required',
            'email' =>'required',
            'password' =>'required|min:6|max:20',
        ]);

        try {

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
    public  function logout(){
    auth()->logout();
    return redirect()->route('login');
    }
}
