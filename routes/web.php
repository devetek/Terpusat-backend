<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to("https://www.terpusat.com/", 302);
});

Route::get('/tanah-bogor', function () {
    return Redirect::to("https://docs.google.com/spreadsheets/d/1foZGfn66UXWxRdYj4e-qY6CfuIXfGq-PJ-lRCfEIWak/edit?usp=sharing", 302);
});
