<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Zamanları kaydetmek için bir model


class TimeController
{

    public function updateDiamond(Request $request, $id)
    {
        $game = Games::find($id);
        $realUser =  User::find($game->user_id);
        $user = Auth::user(); // Giriş yapmış kullanıcıyı al
        if ($user) {
            $deltaTime = $request->input('deltaTime');
            // diamond sütununu güncelle (ekleme veya overwrite yapabilirsiniz, örneğin burada ekleme yapılıyor)
            $realUser->diamond = $realUser->diamond + $deltaTime;
            $realUser->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 401);
    }
}
