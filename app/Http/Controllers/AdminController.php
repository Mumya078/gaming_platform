<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function home(){
        return view('page.back.home');
    }

    public function approve_games(){
        $games = Games::where('approved', false)->get();
        return view('page.back.games.approve',[
            'games' =>$games,
        ]);
    }

    public function deny_game($id){
        $game = Games::find($id);
        $gamename = $game->name;
        $filepath = public_path('games/');

        if (!$game){
            return redirect('/admin')->with('error','Öğe Bulunamadı');
        }
        else{
            $game->delete();

            if (is_dir($filepath.$gamename)) {
                $objects = scandir($filepath.$gamename);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (filetype($filepath.$gamename."/".$object) == "dir")
                            rrmdir($filepath.$gamename."/".$object);
                        else unlink   ($filepath.$gamename."/".$object);
                    }
                }
                reset($objects);
                rmdir($filepath.$gamename);
            }
            return redirect('/admin')->with('success','Öğe Silindi');
        }
    }
    public function approve_game($id){
        $game = Games::find($id);

        if (!$game){
            return redirect('/admin')->with('error','Öğe Bulunamadı');
        }
        else{
            $game->approved = true;
            $game->save();
            return redirect('/admin')->with('success','Approved');

        }
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
