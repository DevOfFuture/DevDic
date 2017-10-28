<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FbMessengerHelper;

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
       
        $data = ["data" => ["PHP", "CSS", "PYTHON", "C#"] ];

        $status = ["status" => "success"];

        return response()
                      ->json([$status, $data]);
    }

    public function languageMeaning(Request $request)
    {
        return "PHP is blablabla";
    }
    
}
