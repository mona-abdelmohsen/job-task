<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        if ($request->route()->getName() === 'logout') {
            return $next($request);
        }

        $userAge = Auth::user()->age;

        if ($userAge < 18 && $request->route()->getName() !== 'not.allowed') {
            return redirect()->route('not.allowed');
        }
    }

    return $next($request);
}

}
