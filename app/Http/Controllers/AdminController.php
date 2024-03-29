<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('page.back.home');
    }

    public function approve_game(){
        return view('page.back.games.approve');
    }

    public function add_cat(){
        return view('page.back.category.add');
    }

    public function upload_cat(Request $request){
        $data = new Category();
        $data->name = $request->catTitle;
        $data->save();

        return redirect('/admin/addcat');
    }
}
