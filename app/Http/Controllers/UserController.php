<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;

class UserController extends Controller
{
    public function update_avatar(Request $request){
        if ($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/assets/images/user_avatars'.$filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return view("page.front.profile");
    }
}
