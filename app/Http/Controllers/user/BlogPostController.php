<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\user\StorePostRequest;
use App\Http\Requests\user\UpdatePostRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends FrontendController
{

    public function index()
    {
        return view("frontend.pages.blogs.index",$this->data);
    }

    public function create()
    {
        $this->data["categories"] = Category::all();
        return view("frontend.pages.blogs.create_blog", $this->data);
    }


    public function store(StorePostRequest $request)
    {
        DB::beginTransaction();
        try{
            $post = new Post();
            $post->title = $request->get('title');
            $post->description = $request->get('description');
            $post->published = 0;
            $post->category_id = $request->get('category');
            $post->user_id = session('user')->id;

            $image = new Image();
            $image->path = Post::uploadImage($request->image);
            $image->save();

            $imgId = $image->id;
            $post->image_id = $imgId;

            if($request->has('quote')){
                $post->quote = $request->get('quote');
            }

            $post->save();

            $user = User::find($post->user_id);
            session()->put('user',$user);

            DB::commit();

            return redirect()->route('blogs.index', $post->id)->with('successInsertPost', 'Post inserted successfully!');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('blogs.create', $post->id)->with('errorInsertPost', $e->getMessage());
        }
    }

    public function show($id)
    {
        $this->data["post"] = Post::with('user')->with('category')->with('image')->find($id);
        return view("frontend.pages.blogs.show_details",$this->data);
    }

    public function edit($id)
    {
        $this->data["categories"] = Category::all();
        $this->data["post"] = Post::getBlogs()->find($id);
        $this->data["selectedCategory"] = Post::first()->category_id;

        return view('frontend.pages.blogs.edit_blog', $this->data);
    }


    public function update(UpdatePostRequest $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $post = Post::find($id);
            $post->title = $request->get('title');
            $post->category_id = $request->get('category');
            $post->description = $request->get('description');
//            $post->published = 0;


            if($request->has('image')){
                $image = new Image();
                $image->path = Post::uploadImage($request->image);
                Post::deleteImage($post->image_id);
                $newImage = new Image();
                $newImage->path = Post::uploadImage($request->image);
                $newImage->save();
                $post->image_id = $newImage->id;
                $post->save();
            }
            if($request->has('quote')){
                $post->quote = $request->get('quote');
                $post->save();
            }

            $post->save();

            $user = User::find($post->user_id);
            session()->put('user',$user);

            DB::commit();

            return redirect()->route('blogs.index', $post->id)->with('successUpdatePost', 'Post edited successfully!');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('blogs.edit', $post->id)->with('errorUpdatePost', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            $user = User::find($post->user_id);

            $post->delete();
            session()->put('user',$user);

            return redirect()->back()->with('successDeletePost', 'Post from: '. $post->user->email.' deleted successfully!');

        }catch (\Exception $ex) {
            return redirect()->back()->with('errorDeletePost', $ex->getMessage());
        }
    }
}
