<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user() && $request->user()->hasRole('vendor') &&  $request->user()->vendor == null) {
            return redirect()->route('vendor.profile.create');
        }
        if($request->user() && $request->user()->status !== 'active') {
            auth()->logout();
            abort(403, 'Your account is not active');
        }
        return $next($request);
    }
}
