<?php

namespace UniSharp\LaravelFilemanager\Support;

use Illuminate\Http\Request;

class RequestPageResolver
{
    public static function resolve(Request $request): int
    {
        // Avoid deprecated Request::get() usage (Symfony 7.4+).
        $currentPage = (int) $request->input('page', 1);

        return $currentPage < 1 ? 1 : $currentPage;
    }
}
