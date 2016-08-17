<?php

namespace App\Http\Middleware;

use Closure;

class Clients
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
        // Statement set to verify if user have been previous client
        if (!$request->user()->hasBeenClient()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            return redirect()->route('home');
        }

        return $next($request);
    }
}
