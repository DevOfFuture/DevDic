@extends('layouts.app')

@section('title', 'Add Framework')


@section('content')
     
     <div class="jumbotron"> 
        <h3> DevDic! </h3>
        Hello, Welcome to DevDic. <br />
        DevDic is an Educational bot that helps you learn more about programming language by recommending to you important tutorials and articles.
     </div>

     <div class="jumbotron"> 
        <h3> How to use </h3>
        <ul>
            <li> Goto <a href="https://facebook.com/">facebook.com</a> and serach for <code>@devdic</code> </li>
            <li>Click on the bot - <code>@devdic</code> </li>
            <li> Start interacting with the bot! (To get available command you can user, type "help" and submit)</code> </li>
        </ul>
     </div>

     <div class="jumbotron"> 
        <h3> Want to use our API? </h3>
        <ul>
            <li> Head over <a href="/documentation" target="_blank">here!</a> </li>
        </ul>
     </div>

@endsection