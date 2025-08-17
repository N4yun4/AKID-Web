<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin // Ubah nama kelas
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->usertype !== 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }
        return $next($request);
    }
}