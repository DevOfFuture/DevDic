<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FbDevDictController extends Controllser
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

}
