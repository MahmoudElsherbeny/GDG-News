<?php

namespace App\Http\Middleware\frontend;

use Closure;
use Auth;
use Redirect;

class isUserLoged
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
        if(Auth::check()) {
            return Redirect::to('/');
        }
        
        return $next($request);
    }
}
