<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gamecat;
use App\Models\Games;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class GameController extends Controller
{
    public function indexfront(){
        $category = Category::all();
        return view("page.front.uploadgames",[
            'category'=>$category
        ]);
    }

    public function tempUpload(Request $request){
        if ($request->hasFile('filepond')) {
            $files = $request->file('filepond');
                $file_name = $files->getClientOriginalName();
                if (strpos($file_name,'data.unityweb') !== false){
                    session(['data_unityweb'=>$file_name]);
                }
                if (strpos($file_name,'js.unityweb') !== false){
                    session(['js_unityweb'=>$file_name]);
                }
                if (strpos($file_name,'wasm.unityweb') !== false){
                    session(['wasm_unityweb'=>$file_name]);
                }
                if (strpos($file_name,'loader.js') !== false){
                    session(['loader_js'=>$file_name]);
                }
                if (strpos($file_name, '.png') !== false
                    || strpos($file_name, '.jpg') !== false
                    || strpos($file_name, '.jpeg') !== false) {
                    session(['image' => $file_name]);
                }

            $files ->storeAs('/public/tmp/',$file_name);
                $data = new TemporaryFile();
                $data->folder = '/public/tmp/';
                $data->file = $file_name;
                $data->save();
        }
    }
    public function tempDelete(Request $request){

    }

    public function uploadGame(Request $request){
        $folderName = $request->gameTitle; // Oluşturulacak klasörün adı
        $wasm = session('wasm_unityweb');
        $dataunity = session('data_unityweb');
        $js = session('js_unityweb');
        $loader = session('loader_js');
        $image = session('image');

        $data = new Games();
        $data->name = $folderName;
      //  $data->category = $request->category;
        $data->data_unityweb_name = $dataunity;
        $data->js_unityweb_name = $js;
        $data->wasm_unityweb_name = $wasm;
        $data->loader_name = $loader;
        $data->user_id = Auth::user()->id;
        $data->image = $image;
        $data->save();
        foreach ($request->category as $categoryId){
            $gamecat = new Gamecat();
            $gamecat->category_id = $categoryId;
            $gamecat->game_id = $data->id;
            $gamecat->save();
        }
        $kaynak = "storage/";
        $hedef = "games/";
        rename($kaynak . 'tmp' , $hedef . $folderName);

        DB::table('temporary_files')->truncate();

        return redirect('/');
    }

    public function index($id){
        $game = Games::find($id);

        return view("page.front.games.index",[
            'game'=>$game,
        ]);
    }
}
