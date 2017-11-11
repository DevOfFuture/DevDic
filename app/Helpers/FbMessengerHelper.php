<?php

namespace App\Helpers;

use App\Helpers\Helper;
use App\Helpers\Requester;
use App\Controllers\LanguageController;
use Illuminate\Http\Request;

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
     * Available command required we are expection from facebook
     *
     * @param  integer $id
     * @param  string  $response
     * @return array
     */
    public static function commands()
    {
      return [
        "language", "facebook", "library", "help"
      ];
    }

    /**
     * Post a message to the Facebook messenger API.
     *
     * @param  integer $id
     * @param  array  $response
     * @return array
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
     * Gets User commands and decide which endpoint it should call
     *
     * @param  array  $command
     * @return array
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
                $result = self::libraryMatcher($commands);
                break;

            case 'framework':
                $result = self::frameworkMatcher($commands);
                break;

            case 'help':
                $result = self::helpMatcher($commands);
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
     * @param  arrau  $command
     * @return array
     */
    public static function languageMatcher($commands = [])
    {
        global $app;
        
        $commands = array_splice($commands,1);

        $result = [];

        switch ( count($commands) ) {
            case 1:
                $request = Request::create("/languages/{$commands[0]}", "GET");           
                $result  = $app->dispatch($request)->getContent();
                $result  = array_get(json_decode($result, true), "data");
                $result  = ["data" => $result, "filter"=> ["summary", "description", "tutorials"] ];
                break;

            case 2:
                if( strtolower($commands[1]) == "extension" ){
                    $request = Request::create("/languages/{$commands[0]}/{$commands[1]}", "GET");          
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data"); 
                    $result  = ["data" => $result, "filter" => ["extension"] ];
                }
                else if( (strtolower($commands[1]) == "libraries") OR (strtolower($commands[1]) == "frameworks") ){
                    $request = Request::create("/languages/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter" => ["name", (strtolower($commands[1]) == "libraries") ? "libraries": "frameworks"] ];

                }
                else if( (strtolower($commands[1]) == "tutorials") OR (strtolower($commands[1]) == "articles") ){
                    $request = Request::create("/languages/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent(); 
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter"=> ["name", "tutorials"] ];
                }
                else{
                    $request = Request::create("/languages/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter" => ["summary", "description"] ];
                }
                break;

            default:
                   $request = Request::create("/languages/{$commands[0]}", "GET");    
                   $result  = array_get(json_decode($result, true), "data");       
                   $result =  $app->dispatch($request)->getContent();
                break;
        }

        return $result;
    }

    /**
     * Gets User commands and decide which route it should goto
     *
     * @param  arrau  $command
     * @return array
     */
    public static function frameworkMatcher($commands = [])
    {
        global $app;

        $commands = array_splice($commands,1);
        
        $result  = ["data" => [], "filter"=> [] ];

        switch ( count($commands) ) {
            case 1:
                    $request = Request::create("/framework/{$commands[0]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter" => ["summary", "summary", "description"] ];
                break;

            case 2:
                if( (strtolower($commands[1]) == "tutorials") OR (strtolower($commands[1]) == "articles") ){
                    $request = Request::create("/framework/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = ["data" => $result, "filter"=> ["name", "summary"] ];
                }
                else if( strtolower($commands[1]) == "language"){
                    $request = Request::create("/framework/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
   
                    $result  = ["data" => $result, "filter"=> ["name"] ];
                }
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
     * @param  array  $command
     * @return array
     */
    public static function libraryMatcher($commands = [])
    {
        global $app;
        
        $result  = ["data" => [], "filter"=> [] ];

        $commands = array_splice($commands,1);

        switch ( count($commands) ) {
            case 1:
                $request = Request::create("/library/{$commands[0]}", "GET");           
                $result  = $app->dispatch($request)->getContent();
                $result  = array_get(json_decode($result, true), "data");

                $result  = ["data" => $result, "filter" => ["summary", "summary", "description"] ];
           break;

            case 2:
                if( (strtolower($commands[1]) == "tutorials") OR (strtolower($commands[1]) == "articles") ){
                    $request = Request::create("/library/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter"=> ["name", "summary"] ];
                }
                else if( strtolower($commands[1]) == "language"){
                    $request = Request::create("/library/{$commands[0]}/{$commands[1]}", "GET");           
                    $result  = $app->dispatch($request)->getContent();
                    $result  = array_get(json_decode($result, true), "data");
                    $result  = ["data" => $result, "filter"=> ["id", "name"] ];
                }
            break;

            default:
                # code...
                break;
            }

        return $result;
    }

     /**
     * Matcher for Help command
     *
     * @param  array  $command
     * @return array
     */
    public static function helpMatcher($commands = [])
    {
        global $app;
        
        $result  = ["data" => [], "filter"=> [] ];
        
        if($commands[0] == "help"){
           
           $result  = [
                       "data" => [
                          "help"=>"
                             ```
                              Commands Available:
                                 *language*
                                    - language {language}
                                    - language {language} tutorials
                                    - language {language} frameworks
                                    - language {language} libraries
                                    - language {language} extension
                             ```
                          "
                        ], 
                       "filter"=> ["help"] 
           ];
        }

        return $result;
    }

}
