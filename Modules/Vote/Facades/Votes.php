<?php

namespace Modules\Vote\Facades;

use Illuminate\Support\Facades\Facade;

class Votes extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'votes';
    }
}