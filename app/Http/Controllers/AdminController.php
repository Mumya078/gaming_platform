<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('page.back.home');
    }

    public function add_game(){
        return view('page.back.games.add');
    }
}
