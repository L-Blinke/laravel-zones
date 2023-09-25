<?php

namespace App\Http\Middleware;

use App\Models\OtpCode;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Ichtrojan\Otp\Otp;

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

        foreach(OtpCode::where('zone_id', '=', $request->input('z'))->pluck('passphrase')->toArray() as $pass){
            if ($otp->validate($pass, $request->input('p'))->status) {
                return $next($request);
            }
        }

        return abort(404);
    }
}
