<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User|null $user */
        $user = auth()->user();

        if (!$user || !$user->isAdmin()) {
            abort(403, 'Akses ditolak. Admin only.');
        }

        return $next($request);
    }
}
