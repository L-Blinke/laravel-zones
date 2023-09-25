<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Privileges
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() || str_contains($request->route()->getPrefix(),'admin')){
            switch (Auth::user()->privilege) {
                case 'Receptionist':
                    if (str_contains($request->route()->getPrefix(),'admin')) {
                        return redirect('dashboard');
                    }else{
                        return $next($request);
                    }
                case 'Accountant':
                    if (str_contains($request->route()->getPrefix(),'admin') || str_contains($request->route()->getPrefix(),'internal')) {
                        return $next($request);
                    }else{
                        return redirect('/admin/');
                    }
                default:
                    return $next($request);
            }
        }else{
            return $next($request);
        }
    }
}
