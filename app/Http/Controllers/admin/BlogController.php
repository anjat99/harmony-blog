<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends BackendController
{

    public function index()
    {
        $this->data["posts"] = Post::with('user')->with('category')->with('image')->orderBy('published')->orderByDesc('id')->paginate(4);
        return view("admin.pages.blogs.index",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $this->data["post"] = Post::with('user')->with('category')->with('image')->find($id);
        return view("admin.pages.blogs.blog_details",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function approvePost($id){
        try {
            $post = Post::find($id);
            $post->published = 1;
            $post->save();

            return redirect()->back()->with('successPublished', 'Post successfully published!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorPublished', $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            $post->delete();

            return redirect()->back()->with('successDeletePost', 'Post from: '. $post->user->email.' deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeletePost', $ex->getMessage());
        }
    }
}
