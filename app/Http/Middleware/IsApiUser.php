<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\JsonResponse;
class IsApiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('access_taken')) {
            if ($request->access_taken !== null) {
                $user = User::where('access_taken', '=', $request->access_taken);
                if ($user !== null) {
                    return $next($request);
                }else{
                    return response()->json("access taken is not correct");
                }
            }else{
                return response()->json("there is no accesss token ");
            }
        } else { 
            return response()->json("there is n access token");
        }
    }
}
