<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  'App\Http\Controllers\DevController@index')->name('dev');

