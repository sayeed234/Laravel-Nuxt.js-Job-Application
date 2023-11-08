<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//--------------AUTH------------------------------
Route::group(['middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Api',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me',
        'AuthController@me'
    );
});


//Auth Not----------
Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {  
      Route::post('resume_upload', 'ApplicationController@resume_upload');    
      Route::get('application', 'ApplicationController@application');    
});