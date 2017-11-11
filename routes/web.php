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
    return "Welcome to DevDic! :)";
});


//===
// Routes to Admin
//===

$router->group(['prefix' => 'admin'], function () use ($router) {
    
    $router->get('/', 'AdminController@index');
    $router->get('/languages', 'AdminController@showLanguages');
    $router->get('/add_language', 'AdminController@show');
    $router->get('/list_languages', 'AdminController@show_all');
    $router->post('/add_language', 'AdminController@store');

    $router->get('/edit_language/{id}', 'AdminController@edit');
    $router->post('/edit_language', 'AdminController@update');
});


//===
// Routes to every request concerning facebook
//===

$router->group(['prefix' => 'fbwebhook'], function () use ($router) {

    $router->get('/', 'FbDevDictController@verify');

    $router->post('/', 'FbDevDictController@handleQuery');

});


//===
// Routes to programming languages
//===

$router->group(['prefix' => 'languages'], function () use ($router) {
    
    $router->get('/', 'LanguageController@allLanguages');
    $router->get('/{language}', 'LanguageController@detail');
    $router->get('/{language}/tutorials', 'LanguageController@tutorials');
    $router->get('/{language}/articles', 'LanguageController@articles');
    $router->get('/{language}/libraries', 'LanguageController@libraries');
    $router->get('/{language}/frameworks', 'LanguageController@frameworks');
    $router->get('/{language}/extension', 'LanguageController@extension');

    $router->post('/', 'LanguageController@add');
    $router->post('/{language}/update', 'LanguageController@update');
    $router->post('/{language}/delete', 'LanguageController@delete');

    $router->post('/{language}/libraries/{library}', 'LibraryController@add');
    $router->post('/{language}/libraries/{library}/update','LibraryController@update');
    $router->post('/{language}/libraries/{library}/delete', 'LibraryController@delete');


    $router->post('/{language}/frameworks/{framework}',      'FrameworkController@add');
    $router->post('/{language}/frameworks/{framework}/update','FrameworkController@update');
    $router->post('/{language}/frameworks/{framework}/delete', 'FrameworkController@delete');

    $router->post('/{language}/library/tutorial', 'LanguageController@languageMeaning');
    $router->post('/{language}/framework/tutorial', 'LanguageController@languageMeaning');
});


//===
// Routes to framework
//===

$router->group(['prefix' => 'framework'], function () use ($router) {
    
    $router->get('/', 'FrameworkController@allFrameworks');
    $router->get('/{framework}', 'FrameworkController@detail');
    $router->get('/{framework}/tutorials', 'FrameworkController@tutorials');
    $router->get('/{framework}/articles', 'FrameworkController@articles');
    $router->get('/{framework}/language', 'FrameworkController@language');
});


//===
// Routes to libraries
//===

$router->group(['prefix' => 'library'], function () use ($router) {
    
    $router->get('/', 'LibraryController@allLibraries');
    $router->get('/{library}', 'LibraryController@detail');
    $router->get('/{library}/tutorials', 'LibraryController@detail');
    $router->get('/{library}/articles', 'LibraryController@detail');
    $router->get('/{library}/language', 'LibraryController@language');
});

