@extends('layouts.app')

@section('title', 'Add Framework')


@section('content')
     
     <div class="jumbotron"> 
        <h3> DevDic! </h3>
        Hello, Welcome to DevDic. <br />
        DevDic is an Educational bot that helps you learn more about programming language by recommending to you important tutorials and articles.
     </div>

     <div class="jumbotron"> 
        <h2> How to use </h3>

        <h3>Use case 1: </h3>
            <ul>
                 <li>Head to the bot messenger page <a href="https://www.messenger.com/t/devdic"> devdic </a> and start interacting with the bot.</li>
            </ul>

        <h3>Use case 2:</h3>
           <ul>
            <li>First, go to facebook and search for <code>devdic</code>(devdic is the name of the bot). Once located, click on it. </li>
                <ul>
                - There are number of commands you can use to interact with the bot (example): 
                    <li> <code>language php</code> </li>
                     <li>This command will show details about PHP and will bring out a number of good links to learn about PHP.</li>
                     <li> <code>language php extension</code> </li>
                   This command will show PHP extension - <code>.php</code>
     
                   To find out more about other commands, you can use to interact with the bot, type <code>help</code> and submit.
                </ul>
           </ul>

     </div>

     <div class="jumbotron"> 
        <h3> Want to use our API? </h3>
        <ul>
            <li> Head over <a href="/documentation" target="_blank">here!</a> </li>
        </ul>
     </div>

@endsection