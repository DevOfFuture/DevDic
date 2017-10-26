<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Requester extends Client
{

    public static function factory($config = [])
    {
        $default = [
            'base_uri' => env('FACEBOOK_MESSENGER_URL'),
        ];

        // Create client configuration
        $config = array_merge($config, $default);

        return ( new Client($config) );
    }

}
