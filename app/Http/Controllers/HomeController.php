<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $games = Games::all();

        return view("page.front.home",[
            'games'=>$games,
        ]);
    }
}
