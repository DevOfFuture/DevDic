<?php

namespace App\Helpers;

use App\Helpers\Helper;
use App\Helpers\Requester;
use App\Controllers\LanguageController;
use Illuminate\Http\Request;

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request AS GRequest;

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
        global $app;
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

    /**
     * Gets User commands and decide which route it should goto
     *
     * @param  string  $command
     * @return bool
     */
    public static function commandMatcher($command)
    {
        $commands = trim(preg_replace('/\s+/', ' ', $command));
        $commands = explode(' ', $commands);
        
        if( count($commands) < 1 ) { return "empty command"; }

        $result = "";

        switch ( strtolower($commands[0]) ) {
            case 'language':
                $result = self::languageMatcher($commands);
                break;

            case 'library':
                # code...
                break;

            case 'framework':
                # code...
                break;

            case 'extension':
                # code...
                break;

            default:
                # code...
                break;
        }

        return $result;
    }

    /**
     * Gets User commands and decide which route it should goto
     *
     * @param  string  $command
     * @return bool
     */
    public static function languageMatcher($commands = [])
    {
        global $app;
        
        $commands = array_splice($commands,1,1);
        
        $result = [];

        switch ( count($commands) ) {
            case 1:
                $request = Request::create("/languages/{$commands[0]}", "GET");           
                $result  = $app->dispatch($request)->getContent();
                break;

            case 2:
                $request = Request::create("/languages/{$commands[0]}/{$commands[1]}", "GET");           
                $result  = $app->dispatch($request)->getContent();
                break;

            default:
                $request = Request::create("/languages/{$commands[0]}", "GET");           
                $result =  $app->dispatch($request)->getContent();
                break;
        }

        return $result;
    }

    /**
     * Gets User commands and decide which route it should goto
     *
     * @param  string  $command
     * @return bool
     */
    public static function frameworkMatcher($command)
    {
        $commands = trim(preg_replace('/\s+/', ' ', $command));
        $commands = explode(' ', $commands);
        
        if( count($commands) < 1 ) { return "empty command"; }

        switch ( strtolower($commands[0]) ) {
            case 'language':
                # code...
                break;

            case 'library':
                # code...
                break;

            case 'framework':
                # code...
                break;

            case 'extension':
                # code...
                break;

            default:
                # code...
                break;
        }

        return $result;
    }

    /**
     * Gets User commands and decide which route it should goto
     *
     * @param  string  $command
     * @return bool
     */
    public static function libraryMatcher($command)
    {
        $commands = trim(preg_replace('/\s+/', ' ', $command));
        $commands = explode(' ', $commands);
        
        if( count($commands) < 1 ) { return "empty command"; }

        switch ( strtolower($commands[0]) ) {
            case 'language':
                # code...
                break;

            case 'library':
                # code...
                break;

            case 'framework':
                # code...
                break;

            case 'extension':
                # code...
                break;

            default:
                # code...
                break;
        }

        return $result;
    }

}
