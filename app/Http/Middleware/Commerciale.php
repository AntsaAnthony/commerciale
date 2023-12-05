<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Commerciale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->profil==env('COMM_PROFIL')){
                return $next($request);
            }
            else{
                return to_route('fournisseur.index')->withErrors([
                    'error'=>'Accès non autorisé'
                ]);
            }
        }
        else{
            return redirect()->route('auth.login');
        }
    }
}
