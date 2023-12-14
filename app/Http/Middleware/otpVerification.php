<?php

namespace App\Http\Middleware;

use App\Models\OtpCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Auth;

class otpVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $otp = new Otp;

        if (Auth::check()){
            if (Auth::user()->privilege == 'Nurse') {
                return $next($request);
            }
            if (Auth::user()->privilege == 'Paramedic') {
                return $next($request);
            }
        }
        if ($otp->validate(OtpCode::find($request->input('i'))->passphrase, $request->input('p'))->status) {
            return $next($request);
        }

        return abort(403);
    }
}
