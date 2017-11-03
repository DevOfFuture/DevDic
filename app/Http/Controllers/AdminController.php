<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class AdminController extends Controller
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
        
        return "fisher please go away";
    }

    public function create(Request $request)
    {
        $data = $request->all();
        
        return view("admin.add_language", []);
    }

    public function store(Request $request)
    {
        $status = "";

        if( $request->isMethod('post') ){
        
            if( ! Language::where('name', $request->input('name'))->count() ){

                $result = Language::create( $request->all() );

                $status = "Profile updated!";
            }

            return view("admin.add_language", ["status" =>  ($status) ? $status : 'Error Occured']);
        }
    }

    public function show(Request $request)
    {
        $data = $request->all();
        
        return view("admin.add_language", []);
    }

    
    public function show_all()
    {
        $data = Language::all();
  
        return view("admin.all_language", ["data" => $data] );
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        
        return "fisher please go away";
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        return "fisher please go away";
    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        
        return "fisher please go away";
    }
}
