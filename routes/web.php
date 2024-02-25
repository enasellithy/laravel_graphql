<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::group([
//    'prefix' => 'graphql',
//], function () {
//    Route::any('/', [
//        'as' => 'graphql.query',
//        'uses' => '\Rebing\GraphQL\GraphQLController@query',
//    ]);
//    Route::any('/', [
//        'as' => 'graphql.mutation',
//        'uses' => '\Rebing\GraphQL\GraphQLController@mutation',
//    ]);
//});
