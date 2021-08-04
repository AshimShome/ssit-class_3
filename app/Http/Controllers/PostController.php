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
        $category= categories::select('id','name')->get();

        return view('backend.post.create',compact('category'));

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
             'category' =>'required',
             'title' =>'required|min:10|unique:posts',
            'description' =>'required|min:10',
            'image' =>'required|image',
            'status' =>'required',

        ]);

        try {

            $image=$request->file('image');
            $imageName=date('ymdhis').rand(1111,9999).'.'.$image->getClientOriginalExtension();


            $post=post::create([
                'user_id' =>auth()->user()->id,
                'category_id'=>$request->category,
                 'title' =>$request->title,
                'description' =>$request->description,
                'image' =>$imageName,
                'status' =>$request->status,

                'slug' =>slugify( $request->title),


            ]);
            if($post){
                $image->storeAs('posts',$imageName);

            }

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
        $category= categories::select('id','name')->get();

        return view('backend.post.edit',compact('category','post'));
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

        $request->validate([
            'category' =>'required',
            'title' =>'required|min:10|unique:posts,title,'.$post->id,
            'description' =>'required|min:10',
            'status' =>'required',

        ]);

        try {

            $post->user_id =auth()->user()->id;
              $post->category_id=$request->category;
               $post->title=$request->title;
             $post->description =$request->description;
               $post->status=$request->status;

               $post->slug=slugify( $request->title);
            if($request->file('image')){
                if(file_exists( public_path("/uploads/posts/".$post->image))) {

                    unlink(public_path("/uploads/posts/".$post->image));

                }
                $image=$request->file('image');
                $imageName=date('ymdhis').rand(1111,9999).'.'.$image->getClientOriginalExtension();
                $post->image=$imageName;
                if($post){
                    $image->storeAs('posts',$imageName);

                }

            }

   @$post->update();


            session()->flash('success','Post data update success');

        }catch (Exception $exception){
            session()->flash('error','Post data update not success');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if(file_exists( public_path("/uploads/posts/".$post->image))) {
            if($post->image !=='demo.png'){
          unlink(public_path("/uploads/posts/".$post->image));
            }
        }
        $post->delete();


  session()->flash('success','Post delete success');

        return redirect()->back();
    }
}
