<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$teams)
    {
        //TODO:動かないので調査修正が必要
        $user = $request->user();
        foreach ($teams as $teamSlug) {
            $team = Team::where('id', $teamSlug)->first();

            if ($team && $user->teams->contains($team)) {
                return $next($request);
            }
        }
    
        abort(403, 'You are not authorized to access this page.');
    }
}
