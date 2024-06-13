<?php

use App\Http\Controllers\ManageController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\SurveyController::class, 'index'])->name('home');
    Route::get('/ongoing', [App\Http\Controllers\SurveyController::class, 'going'])->name('going');
    Route::post('/finish', [App\Http\Controllers\SurveyController::class, 'finish'])->name('submit');
    Route::get('/finish', [App\Http\Controllers\SurveyController::class, 'finished'])->name('finish');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/manage', [ManageController::class, 'index'])->name('manage.read');
        Route::get('/manage/create', [ManageController::class, 'create'])->name('manage.create');
        Route::post('/manage/create', [ManageController::class, 'store'])->name('manage.store');
        Route::get('/manage/edit/{id}', [ManageController::class, 'edit'])->name('manage.edit');
        Route::post('/manage/edit/{id}', [ManageController::class, 'update'])->name('manage.update');
        Route::delete('/manage/delete/{id}', [ManageController::class, 'destroy'])->name('manage.delete');
    
        Route::get('/response', [ResponseController::class, 'index'])->name('responses.index');
    Route::get('/response/{userId}', [ResponseController::class, 'show'])->name('responses.show');
    });
});