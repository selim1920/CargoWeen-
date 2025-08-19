<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$role): Response
    {
        if ($request->user()->role !==$role){

            if($request->user()->role ==='Transitaire'){

                  return redirect('TransitaireDashboard');
                }

            elseif($request->user()->role ==='CompagnieAerienne'){

                    return redirect('CompagnieDashboard');
                }

            elseif($request->user()->role ==='Admin'){

                    return redirect('AdminDashboard');
                }

        }

        return $next($request);
    }
}
