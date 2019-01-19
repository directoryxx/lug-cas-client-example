<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use SSO\SSO;

class CheckCas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {        
        if(!SSO::check()){
            SSO::authenticate();
            $user = SSO::getUser();
            Auth::login($user);
        }
        


        return $next($request);
    }
}
