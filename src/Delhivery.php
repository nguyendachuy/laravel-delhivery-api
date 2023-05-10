<?php

namespace NguyenHuy\Delhivery;

use Illuminate\Support\Facades\Facade;

/**
 * @see NguyenHuy\Delhivery\DelhiveryApi
 */

class Delhivery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'delhivery';
    }
}
