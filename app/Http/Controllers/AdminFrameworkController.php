<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;

class AdminFrameworkController extends Controller
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
        
        return view("admin.framework.add_framework", []);
    }

    public function store(Request $request)
    {
        $status = "";

        if( $request->isMethod('post') ){
        
            if( ! Framework::where('name', $request->input('name'))->count() ){

                $result = Framework::create( $request->all() );

                $status = "Language Created!";
            }

            return view("admin.framework.add_framework", ["status" =>  ($status) ? $status : 'Error Occured']);
        }
    }

    public function show(Request $request)
    {
        $data = $request->all();
        
        return view("admin.framework.add_framework", []);
    }

    
    public function show_all()
    {
        $data = Framework::all();
  
        return view("admin.framework.all_framework", ["data" => $data] );
    }

    public function edit($id)
    {
        $language = Framework::where('id', $id)->first();

        return view("admin.framework.edit_framework", ["data" => $language] );
    }

    public function update(Request $request)
    {
        $status = "";

        if( $request->isMethod('post') ){
           
            if( Framework::where('id', $request->input('id'))->update( $request->all() ) ){

                $status = "Language updated!";
            }

            $language = Framework::where('id', $request->input('id') )->first();

            return view("admin.framework.edit_framework", ["status" =>  ($status) ? $status : 'Error Occured', "data" => $language ]);
        }

    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        
        return "fisher please go away";
    }
}
