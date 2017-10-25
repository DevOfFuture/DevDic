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
    
    public function handleQuery(Request $request)
    {
       
       $entry = $request->get('entry');

       $sender_id = array_get($entry, '0.messaging.0.sender');

       // $recipient_id = array_get($entry, '0.messaging.0.recipient');

       $message = array_get($entry, '0.messaging.0.message.text');

       // TODO: act on the message and reply...

       FbMessengerHelper::replyMessage([
           "id"      => $sender_id,
           "message" => $message
       ]);

       return response('', 200);

    }
}
