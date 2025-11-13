<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,String $role): Response
    {
        echo "<h2 class='text-success'>ValidUser Middleware Called</h2>";
           
        if(!Auth::guest()){
            if(Auth::user()->role==$role){
                echo "<h3 class='text-primary'>User is valid and has role : $role </h3>";
                return $next($request);
            }else{
                
                return redirect()->route('login')->withErrors(['access_denied'=>'You do not have access to this resource.']);
            }
        }else{
            return redirect('user-login');
        }
        
    }

    public function terminate(Request $request, Response $esponse): void
    {
        echo "<h2  class='text-danger'>ValidUser Middleware Terminate Called</h2>";
    }
}
