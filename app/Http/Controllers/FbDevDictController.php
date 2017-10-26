<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FbMessengerHelper;

class FbDevDictController extends Controller
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

    public function index(Request $request)
    {
        $data = $request->all();
        
        // If there is no data received, don't bother :)
        if( empty($data) OR ($data == NULL) OR ($data == "") ){
           
            return "Fisher go away please";
        }
        
        return $data;
    }
    
    public function verify(Request $request)
    {
       // TODO: make sure request is comming from facebook
       
       if( $request->get('hub_mode') == 'subscribe' ){
          
            $hub_challenge = $request->get('hub_challenge');

            return response($hub_challenge, 200);
       }

       return response('Something went wrong', 400);

    }

    public function handleQuery(Request $request)
    {

       $entry = $request->get('entry');

       $sender_id = array_get($entry, '0.messaging.0.sender.id');

       $message = array_get($entry, '0.messaging.0.message.text');

       // TODO: act on the message and reply...

       $result = FbMessengerHelper::replyMessage($sender_id, "You said  ". $message . '?');

       return response($result, 200);

    }
}