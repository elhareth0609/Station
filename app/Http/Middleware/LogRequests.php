<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Log::create([
        //     'log_name' => 'request',
        //     'description' => 'HTTP Request',
        //     'properties' => [
        //         'method' => $request->method(),
        //         'url' => $request->url(),
        //         'parameters' => $request->all(),
        //         'status' => $response->status(),
        //     ],
        // ]);

        return $response;

    }
}
