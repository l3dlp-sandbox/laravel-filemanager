<?php

namespace Tests;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use UniSharp\LaravelFilemanager\Support\RequestPageResolver;

class RequestPageResolverTest extends TestCase
{
    public function testResolveReadsPageFromInput()
    {
        $request = Request::create('/unisharp/laravel-filemanager/jsonitems', 'GET', ['page' => '3']);

        $this->assertSame(3, RequestPageResolver::resolve($request));
    }

    public function testResolveDoesNotReadPageFromAttributes()
    {
        $request = Request::create('/unisharp/laravel-filemanager/jsonitems', 'GET');
        $request->attributes->set('page', 9);

        $this->assertSame(1, RequestPageResolver::resolve($request));
    }

    public function testResolveNormalizesInvalidValues()
    {
        $request = Request::create('/unisharp/laravel-filemanager/jsonitems', 'GET', ['page' => '-2']);

        $this->assertSame(1, RequestPageResolver::resolve($request));
    }
}
