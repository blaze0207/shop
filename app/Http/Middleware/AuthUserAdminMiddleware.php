<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AuthUserAdminMiddleware
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
        $is_allow = false;
        $user_id = session()->get('user_id');

        if (!is_null($user_id)) {
            $user = User::findOrFail($user_id);

            if ($user->type === 'A') {
                $is_allow = true;
            }
        }

        if (!$is_allow) {
            return redirect('/');
        }
        return $next($request);
    }
}
