<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TestEditorCredentials
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
          $class = $user->class;
          if($class === 'editor' || $class === 'admin'){
            return $next($request);
          }
        }
        throw new \Exception("NO sos editor papu");
    }
}
