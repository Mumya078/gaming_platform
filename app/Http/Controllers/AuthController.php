<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;


class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function signup(){
        return view("auth.register");
    }
    public function profile(){
        return view("page.front.profile");
    }

    public function update_profile(Request $request){
        $data = Auth::user();
        $data->email = $request->email;
        $data->name = $request->name;


        $data->save();
        return redirect('/profile');
    }
}
