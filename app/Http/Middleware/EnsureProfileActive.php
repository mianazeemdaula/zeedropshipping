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
        if($request->user()){
            $user = $request->user();
            if($user->status !== 'active') {
                if($user->status === 'under-review') {
                    auth()->logout();
                    return abort(403,"You account is under verification pelase wait or check your email for status");
                }
                return abort(403, 'Your account is not active');
            }else if($user->hasRole('dropshipper') &&  $user->vendor == null) {
                return redirect()->route('vendor.profile.create');
            }
        }
        return $next($request);
    }
}
