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
        
        return view("admin.language.add_language", []);
    }

    public function store(Request $request)
    {
        $status = "";

        if( $request->isMethod('post') ){
        
            if( ! Language::where('name', $request->input('name'))->count() ){

                $result = Language::create( $request->all() );

                $status = "Language Created!";
            }

            return view("admin.language.add_language", ["status" =>  ($status) ? $status : 'Error Occured']);
        }
    }

    public function show(Request $request)
    {
        $data = $request->all();
        
        return view("admin.language.add_language", []);
    }

    
    public function show_all()
    {
        $data = Language::all();
  
        return view("admin.language.all_language", ["data" => $data] );
    }

    public function edit($id)
    {
        $language = Language::where('id', $id)->first();

        return view("admin.language.edit_language", ["data" => $language] );
    }

    public function update(Request $request)
    {
        $status = "";

        if( $request->isMethod('post') ){
           
            if( Language::where('id', $request->input('id'))->update( $request->all() ) ){

                $status = "Language updated!";
            }

            $language = Language::where('id', $request->input('id') )->first();

            return view("admin.language.edit_language", ["status" =>  ($status) ? $status : 'Error Occured', "data" => $language ]);
        }

    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        
        return "fisher please go away";
    }
}
