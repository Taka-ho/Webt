<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ReturnResultController;
use App\Http\Controllers\AuthController;

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


Route::get('/exam/workBook', [DownloadController::class, 'download']);

Route::get('/auth/github', [AuthController::class, 'redirectToGithub'])->name('github.redirect');
Route::get('/auth/github/callback', [AuthController::class, 'handleGithubCallback'])->name('github.callback');

Route::get('/auth/discord', [AuthController::class, 'redirectToDiscord'])->name('discord.redirect');
Route::get('/auth/discord/callback', [AuthController::class, 'handleDiscordCallback'])->name('discord.callback');

Route::get('/', function () {
    return view('top');
});


Route::get('/exam/explain', function () {
    return view('explainOfExam');
});
