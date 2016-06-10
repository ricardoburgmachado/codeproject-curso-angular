<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});


Route::post('oauth/access_token', function (){

    return \Illuminate\Support\Facades\Response::json(\LucaDegasperi\OAuth2Server\Facades\Authorizer::issueAccessToken());
});



Route::get('client', 'ClientController@index');

Route::post('client', 'ClientController@store');

Route::get('client/{id}', 'ClientController@show');

Route::delete('client/{id}', 'ClientController@destroy');


//Route::group(['middleware' => 'CheckProjectOwner'], function (){

    Route::get('project', 'ProjectController@index');
    Route::post('project', 'ProjectController@store');
    Route::get('project/{id}', 'ProjectController@show');
    Route::delete('project/{id}', 'ProjectController@destroy');


    //Route::post('project/{id}/file', 'ProjectFileController@store');

    Route::Post('project_file_send', ['as'=>'project_file_send', 'uses'=>'ProjectFileController@store']);




    Route::get('send_file_test', function (){
        return view('send_file');
    });


    Route::get('project/{id}/note', 'ProjectController@index');

    Route::post('project/{id}/note/note', 'ProjectController@store');

    Route::get('project/{id}/note/{noteId}', 'ProjectController@show');

    Route::put('project/{id}/note/{noteId}', 'ProjectController@update');

    Route::delete('project/{id}/note/{noteId}', 'ProjectController@destroy');


//});





