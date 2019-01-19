<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use SSO\SSO;

class MemberCheck
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
        }
        $user = SSO::getUser();
        //dd($user);
        if ($user['rolesid'] != 3){
            //return redirect()->back();
            return redirect('/');
        } 

        return $next($request);

        
    }
}
