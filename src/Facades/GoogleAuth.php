<?php

namespace Tazz\GoogleAuthManager\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleAuth extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'google-auth';
    }
} 