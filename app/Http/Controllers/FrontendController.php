<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Menu;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::all();
        $this->data["socialMedias"] = SocialMedia::all();
    }

    public function showRegisterForm()
    {
        return view("frontend.pages.main.register", $this->data);
    }

    public function register(RegistrationRequest $request){

        try {
            $user = new User();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = md5($request->password);
            $user->role_id = 2;
            $user->created_at = date("Y-m-d h:i:s");
            $user->updated_at = date("Y-m-d h:i:s");

            $user->save();

            return  redirect()->route("login.create")->with("success", "User successfully registered.");
        } catch(\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect()->back()->with("error", "An error has occurred, please try again later.");
        }
    }

    public function showLoginForm()
    {
        return view("frontend.pages.main.login", $this->data);
    }

    public function login(LoginRequest $request) {

        try {

//            dd($request->all());
            $user = User::with('role')->with('posts')->with('posts.image')->where([
                'email' => $request->email,
                'password' => md5($request->password)
            ])->first();

            if ($user) {
                $request->session()->put('user', $user);

                return $user->role_id === 1 ? redirect(route("admin"))->with("success", "Admin successfully login.") : redirect(route("home"))->with("success", "User successfully logged in .");

            } else {
                return redirect()->back()->with("warning", "Wrong username or password.");
            }

        } catch (\Exception $e) {

            return redirect()->back()->with("error", $e->getMessage());
        }

    }

    public function logout(Request $request)
    {
        $request->session()->remove("user");
        return redirect()->route("login.create")->with("success", "User successfully logged out.");
    }
}
