<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TestAdminCredentials
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
        $user = Auth::user();
        if(!empty($user)){
          if($user->class === 'admin'){
            return $next($request);
          }
        }
        throw new \Exception("NO sos admin papu");
    }
}
