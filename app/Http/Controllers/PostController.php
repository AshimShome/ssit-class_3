<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\post;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts=post::orderBy('id','DESC')->get();
        //return view('backend.categories.manage',compact( 'category'));
        return view('backend.post.manage',compact('posts'));
        //dd($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');

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
             
            'title' =>'required|min:10|max:20|unique:posts',
            'description' =>'required|min:10',
            'image' =>'required|image ',
            'status' =>'required',

        ]);

        try {

            $image=$request->file('image');
            $imageName=date('ymdhis').rand(1111,9999).'.'.$image->getClientOriginalExtension();
            $image->storeAs('posts',$imageName);


            post::create([
                 'title' =>$request->title,
                'description' =>$request->description,
                'slug' =>slugify( $request->title),
                 'status' =>$request->status,
                'user_id' =>auth()->user()->id,


            ]);

             session()->flash('success','Post data insert success');

         }catch (Exception $exception){
             session()->flash('error','Post data insert not success');
         }
         return redirect()->back();

     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Models\post  $post
      * @return \Illuminate\Http\Response
      */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
