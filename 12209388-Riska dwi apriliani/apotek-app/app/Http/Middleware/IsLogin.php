<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            //kl auth sdh mendeteksi ada riwayat login, akses boleh masuk
        return $next($request);
        } else {
            //kalau g ad d arhkn k hlmn login blk
            return redirect()->route('login')->with('failed', 'Anda bukan admin, halaman tersebut hanya untuk admin');
        }
    }
}
