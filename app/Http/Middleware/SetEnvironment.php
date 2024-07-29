<?php

namespace App\Http\Middleware;

use App\Models\Environment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetEnvironment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $request->server('HTTP_HOST');
        $environment = Environment::where('domain', 'like', '%' . $domain . '%')->first();

        if (!empty($environment)) {
            config(['app.environment.id' => $environment->id]);
            config(['app.environment.name' => $environment->name]);
        } else {
            config(['app.environment.id' => '1']);
            config(['app.environment.name' => 'default']);
        }
        config(['app.environment.domain' => $domain]);

        return $next($request);
    }
}
