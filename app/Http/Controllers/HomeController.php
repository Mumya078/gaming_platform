<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gamecat;
use App\Models\Games;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $games = Games::where('approved', true)->get();
        $category = Category::all();

        return view("page.front.home",[
            'games'=>$games,
            'category'=>$category
        ]);
    }

    public function category($cat){
        $category = Category::all();
        $gamecat = Gamecat::where('category_id',$cat)->get();
        $games= array();

        foreach ($gamecat as $rs){
            $game = Games::find($rs->game_id);
            if ($game){
                $games[] = $game;
            }
        }
        return view("page.front.home",[
            'category'=>$category,
            'games'=>$games
        ]);
    }
}
