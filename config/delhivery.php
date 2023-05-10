<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Delhivery Mode
    |--------------------------------------------------------------------------
    |
    | Here you can set the mode for delhivery. (staging or live)
    | default is staging
    */

    'mode' => env('DELHIVERY_MODE', 'staging'),


    /*
    |--------------------------------------------------------------------------
    | Delhivery Token
    |--------------------------------------------------------------------------
    |
    | Here you can set the token delhivery.
    | 
    */

    'token' => env('DELHIVERY_TOKEN', null),


    /*
    |--------------------------------------------------------------------------
    | Default output response type
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the output response you need.
    | 
    | Supported: "collection" , "object", "array"
    | 
    */

    'responseType' => env('DELHIVERY_RESPONSE_TYPE', 'collection'),
];