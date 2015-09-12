<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\User;

class RouteAdmin
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
		if ( $user = Auth::user() ) {
			if ( $user->name == 'admin') {
				return $next($request);
			}
		}
		
		return redirect('/');
	}
}
