<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    file_put_contents("checking.txt", env('FACEBOOK_APP_TOKEN') );
    return "Welcome to DevDic! :)";
});


//===
// Routes to every request concerning facebook
//===

$router->group(['prefix' => 'fbwebhook'], function () use ($router) {

    // $router->get('/', 'FbDevDictController@verify');

    $router->post('/', 'FbDevDictController@handleQuery');

});