<?php

namespace App\Helpers;

use App\Helpers\Helper;
use App\Helpers\Requester;

class FbMessengerHelper extends Helper
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //==
    // Sends message to user
    //==
    public static function replyMessage($payload = [], $endpoint="messages?access_token="){
       
        $endpoint .= env('FACEBOOK_APP_TOKEN');

        $requester = Requester::factory();

        // if( empty($data['recipient']['id']) ) { return "Receiver Id missing"; }
        // some other check should come in...

        $headers = [ "Content-Type" => "application/json" ];
        $body = json_encode([
            "recipient" => [ "id" => $payload['id'] ],
            "message" => ["text" => $payload['message'] ]
        ]);
        
        $response = $requester->request('POST', $endpoint, $headers, $body);

        return $response;

    }


}
