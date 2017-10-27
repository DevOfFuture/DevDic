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
       
        return "PHP, Python, C, C++";
    }

    public function languageMeaning(Request $request)
    {
        return "PHP is blablabla";
    }
    
}
