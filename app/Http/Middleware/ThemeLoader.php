<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Hexadog\ThemesManager\Http\Middleware\ThemeLoader as HexadogThemeLoader;

class ThemeLoader extends HexadogThemeLoader
{
    public function handle(Request $request, Closure $next, $theme = null)
    {
        if ($request->segment(1) === "admin")
            $theme = 'eterna/dashboard';
        else
            $theme = 'eterna/blog';

        return parent::handle($request, $next, $theme);
    }
}
