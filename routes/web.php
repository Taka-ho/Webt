<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ReturnResultController;

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
    return view('top');
});

Route::get('/exam', function () {
    return view('exam');
});

Route::get('/exam/workBook', [DownloadController::class, 'download']);

Route::post('/exam/workBook/returnResult', [ReturnResultController::class, 'upload']);