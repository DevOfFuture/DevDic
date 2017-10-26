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
    public static function EreplyMessage($payload = [], $endpoint="messages?access_token="){
       
        $endpoint .= env('FACEBOOK_APP_TOKEN');

        $requester = Requester::factory();

        // if( empty($data['recipient']['id']) ) { return "Receiver Id missing"; }
        // some other check should come in...

        $headers = [ "Content-Type" => "application/json" ];
        $body = [
            "recipient" => ["id"   => $payload['id'] ],
            "message"   => ["text" => $payload['message'] ]
        ];
        
        $response = $requester->request('POST', $endpoint, $headers, $body);
        dd($response);
        return $response;

    }

    /**
     * Post a message to the Facebook messenger API.
     *
     * @param  integer $id
     * @param  string  $response
     * @return bool
     */
    public static function replyMessage($id, $response)
    {
        $access_token = env('FACEBOOK_APP_TOKEN');
        $url = "https://graph.facebook.com/v2.6/me/messages?access_token={$access_token}";

        $data = json_encode([
            'recipient' => ['id' => $id],
            'message'   => ['text' => $response]
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}
