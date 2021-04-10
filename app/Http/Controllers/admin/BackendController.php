<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::all();
    }

    public function index(){
        $this->data["blogs"] = Post::latestFiveNonPublishedPosts();
        $this->data["users"] = User::latestFiveRegisteredUsers();
        return view('admin.pages.dashboard', $this->data);
    }

    public function logout(Request $request) {
        $request->session()->remove("user");
        return redirect()->route("login.create")->with("success", "Admin successfully logged out.");
    }
}
