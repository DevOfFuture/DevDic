<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FbMessengerHelper;
use App\Language;

class LanguageController extends Controller
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

    public function allLanguages(Request $request)
    {
        $query = $request->get('query');

        // if(!$query) { return "Invalid request"; }

        $limit = array_get($query, 'limit', 10);
        $skip  = array_get($query, 'skip', 0);

        $languages = Language::where('is_active', 1)->take($limit)->skip($skip)->get()->toArray();

        return response()
                      ->json([ "status"=> "success", "data" => $languages]);
    }

    public function detail($language)
    {

        $detail = Language::where('is_active', 1)
                          ->where('name', $language)
                          ->first(["name", "description", "summary"])->toArray();

        return response()
                      ->json(["status" => "success", "data" => $detail]);
    }

    public function tutorials($language)
    {
        
        $language_id = Language::where('is_active', 1)->where('name', $language)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json

        $detail = Language::find($language_id->id)
                          ->tutorials()->get(["language_id", "tutorial_link"])->toArray();

        return response()
                      ->json(["status" => "success", "data"=> $detail]);
    }
    
    public function articles($language)
    {

        $detail = Language::where('is_active', 1)
                          ->where('name', $language)
                          ->get(["name", "description", "summary"])->toArray();

        return response()
                      ->json([ "status" => "success", "data" => $detail]);
    }

    public function libraries($language)
    {

        $detail = Language::where('is_active', 1)
                          ->where('name', $language)
                          ->get(["name", "description", "summary"])->toArray();

        $data = ["data" => $detail ];

        $status = ["status" => "success"];

        return response()
                      ->json([$status, $data]);
    }

    public function frameworks($language)
    {

        $detail = Language::where('is_active', 1)
                          ->where('name', $language)
                          ->get(["name", "description", "summary"])->toArray();

        $data = ["data" => $detail ];

        $status = ["status" => "success"];

        return response()
                      ->json([$status, $data]);
    }

}
