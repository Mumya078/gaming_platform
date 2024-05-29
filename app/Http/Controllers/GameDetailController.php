<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameDetailController extends Controller
{
    public function uploadComment($id,Request $request){
        $data = new Comment();
        $data->game_id = $id;
        $data->user_id = Auth::user()->id;
        $data->text = $request->comment;
        $data->rate = $request->rate;
        $data->save();

        $game = Games::find($id);

        $comments = comment::where('game_id',$id)->get();
        $comments_count = comment::where('game_id',$id)->count();
        $toplam = 0;
        foreach ($comments as $rs){
            $toplam = $toplam +$rs->rate;
        }
        $game->rate = $toplam / $comments_count;
        $game->save();
        return redirect()->route('game_index',['id'=>$id]);
    }
}
