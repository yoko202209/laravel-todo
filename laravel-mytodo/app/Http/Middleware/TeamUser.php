<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamUser
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
        $user = $request->user();
        $teams = $user->teams;
        //dd($request,$next,$teams,$user);
        foreach ($teams as $team) {
            if ($team && $user->teams->contains($team)) {
                return $next($request);
            }
        }
    
        abort(403, 'You are not authorized to access this page.');
    }
}
