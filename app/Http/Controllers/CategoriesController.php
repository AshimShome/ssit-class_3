<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use Faker\Extension\Helper;
use Illuminate\Http\Request;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return Helpers::something();
        //return test();
        $category= categories::select('id','name','slug')->orderBy('id','DESC')->get();
        return view('backend.categories.manage',compact( 'category'));

       //return categories::all();
        //return  categories::find(4);
        //return  categories::findorFail(14);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|min:3|max:20',
            'status' =>'required',

        ]);
        try {

            categories::create([
                'user_id' =>1,
                'name' =>$request->name,
                'slug' =>slugify($request->name),
                'status' =>$request->status,

            ]);

            session()->flash('success','User data insert success');

        }catch (Exception $exception){
            dd($exception);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
       // dd('ok');
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        $category->delete();
        session()->flash('success','category delete success');

        return redirect()->back();
       // dd( $category);

    }
}
