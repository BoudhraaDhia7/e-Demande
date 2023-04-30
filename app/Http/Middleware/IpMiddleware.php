<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $whitelist = config('access.whitelist');

        $ipAddresses = explode(';', $whitelist);

        if (!in_array($request->ip(), $ipAddresses)) {

            \Log::error('IP address is not whitelisted', ['ip address', $request->ip()]);

            return response()->json(['error' => 'IP adress : ' . $request->ip() . ' is not Whitelisted'], 403);
        }

        return $next($request);
    }
}
