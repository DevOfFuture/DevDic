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
       
        $data = ["data" => $languages ];

        $status = ["status" => "success"];

        return response()
                      ->json([$status, $data]);
    }

    public function languageMeaning(Request $request)
    {
        return "PHP is blablabla";
    }

    public function detail($language)
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
