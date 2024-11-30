<?php

// app/Http/Middleware/Admin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user terautentikasi dan memiliki role admin
        if (Auth::check() && Auth::user()->role != 'admin') {
            return redirect('dashboard'); // Mengarahkan jika bukan admin
        }

        // Lanjutkan request jika user adalah admin
        return $next($request);
    }
}
