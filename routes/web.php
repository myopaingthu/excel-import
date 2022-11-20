<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImportController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::controller(ExcelImportController::class)->group(function () {
    Route::get('/',  'showImportView')->name('import.view');
    Route::post('/',  'uploadExcelFile')->name('import.upload');
    Route::get('/report',  'showReport')->name('import.report');
});