<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // cek apakah user sudah login
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return $next($request);
            }


            if (Auth::user()->role == $userType) {
                return $next($request);
            }
        }
        //jika user tidak memiliki access, kirim pesan error
        return response()->json([
            'error' => 'You do not have permission to access for this page.',
            'userType' => $userType
        ]);
    }
}
