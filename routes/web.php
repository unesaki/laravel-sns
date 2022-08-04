<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', [TimelineController::class, 'index'])->name('index');
Route::get('/timeline', [TimelineController::class, 'showTimelinePage'])->name('timeline');
Route::post('/timeline', [TimelineController::class, 'postTweet'])->name('timeline');
Route::post('/timeline/delete', [TimelineController::class, 'delete'])->name('timeline.delete');