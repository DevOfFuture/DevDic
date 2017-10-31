<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FbMessengerHelper;
use App\Framework;

class FrameworkController extends Controller
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
       
        return "Programming languages...";
    }

    public function allFrameworks(Request $request)
    {
        $query = $request->get('query');

        // if(!$query) { return "Invalid request"; } #TODO

        $limit = array_get($query, 'limit', 10);
        $skip  = array_get($query, 'skip', 0);

        $languages = Framework::where('is_active', 1)->take($limit)->skip($skip)->get()->toArray();

        return response()->json([ "status"=> "success", "data" => $languages]);
    }

    public function detail($framework)
    {

        $detail = Framework::where('is_active', 1)
                          ->where('name', $framework)
                          ->first(["name", "description", "summary"])->toArray();

        return response()->json(["status" => "success", "data" => $detail]);
    }

    public function tutorials($framework)
    {
        
        $language_id = Framework::where('is_active', 1)->where('name', $framework)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Framework::find($language_id->id)
                          ->tutorials()->get(["language_id", "tutorial_link"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }
    
    public function articles($framework)
    {

        $language_id = Framework::where('is_active', 1)->where('name', $framework)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Framework::find($language_id->id)
                          ->articles()->get(["language_id", "article_link"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }

    public function langauge($framework)
    {

        $language_id = Framework::where('is_active', 1)->where('name', $framework)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Framework::find($language_id->id)
                          ->frameworks()->get(["language_id", "name", "summary", "description"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }

}
