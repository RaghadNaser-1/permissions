<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    if ($request->has('locale')) {
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
    } else {
        $locale = session()->get('locale', config('app.locale'));
        App::setLocale($locale);
    }

    return $next($request);
}
}
