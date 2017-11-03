<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FbMessengerHelper;
use App\Language;
use App\LanguageTutorial;

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

        // if(!$query) { return "Invalid request"; } #TODO

        $limit = array_get($query, 'limit', 10);
        $skip  = array_get($query, 'skip', 0);

        $languages = Language::where('is_active', 1)->take($limit)->skip($skip)->get()->toArray();

        return response()->json([ "status"=> "success", "data" => $languages]);
    }

    public function detail($language)
    {

        $detail = Language::where('is_active', 1)
                          ->where('name', $language)
                          ->first(["id", "name", "description", "summary"])->toArray();
                          
        if( $detail['id'] ){
            $tutorials = Language::find($detail['id'])->tutorials()->take(2)->get()->toArray();
            $pre_tutorial = "Tutorials:
            
            ";
            foreach ($tutorials as $key => $value) {
                $pre_tutorial .= $value['name'] . '-' .$value['tutorial_link'] . ",

                ";
            }
        }

        $detail['tutorials'] = substr($pre_tutorial, 0, -1);
        return response()->json(["status" => "success", "data" => $detail]);
    }

    public function tutorials($language)
    {
        
        $language_id = Language::where('is_active', 1)->where('name', $language)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Language::find($language_id->id)
                          ->tutorials()->get(["language_id", "tutorial_link"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }
    
    public function articles($language)
    {

        $language_id = Language::where('is_active', 1)->where('name', $language)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Language::find($language_id->id)
                          ->articles()->get(["language_id", "article_link"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }

    public function libraries(Request $request, $language)
    {
        
        $language_id = Language::where('is_active', 1)->where('name', $language)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Language::find($language_id->id)
                          ->libraries()->get(["language_id", "name", "summary", "description"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }

    public function frameworks($language)
    {

        $language_id = Language::where('is_active', 1)->where('name', $language)->first(['id']);
        
        if( ! $language_id ) { return ""; } //fix this later, should return a json #TODO

        $detail = Language::find($language_id->id)
                          ->frameworks()->get(["language_id", "name", "summary", "description"])->toArray();

        return response()->json(["status" => "success", "data"=> $detail]);
    }

}
