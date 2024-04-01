<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Eğer giriş yapılmadıysa ve kullanıcı zaten giriş sayfasında değilse, giriş sayfasına yönlendir
            if (!$request->is('login')) {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
