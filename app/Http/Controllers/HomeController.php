<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    const POST_LIMIT = 6;
    private $blogModel;

    public function __construct()
    {
        parent::__construct();
        $this->blogModel = new Post();
    }

    public function index(Request $request)
    {
        $this->data['categories'] = Category::all();
        $this->data["posts"] = Post::getFilterSearchAndPage($request)->orderBy('id')->paginate(self::POST_LIMIT);
        $this->data['latestPosts'] = Post::getRandomPosts();
         return view("frontend.pages.main.home",$this->data);
    }

    public function show($id)
    {
        $data = Post::getBlog($id);
        $this->data["post"] = $data['blog'];

        $previous = Post::where('id', '<', $data['blog']['id'])->where('published','=',1)->max('id');
        $next = Post::where('id', '>', $data['blog']['id'])->where('published','=',1)->min('id');

        return view('frontend.partials.blog_details', $this->data)->with('previous', $previous)->with('next', $next);
    }
}
