<?php
namespace Modules\YipEcommerce\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Simple admin check — you can improve later with roles
        if (auth()->check() && auth()->user()->email === 'admin@yiponline.com') {
            return $next($request);
        }

        abort(403, 'Unauthorized. Admin access only.');
    }
}