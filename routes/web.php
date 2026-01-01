<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\UserController  ;
use App\Http\Controllers\AuthController  ;

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard') ;
    Route::patch('/users/{user}/change-status', [AdminController::class, 'changeUserStatus'])->name('admin.users.changeStatus') ;
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy') ;
    Route::post('/create-admin', [AuthController::class, 'createAdmin'])->name('create.admin');
});

Route::prefix('user')->middleware(['auth','isUser'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard') ;
});

Route::get('/', function () {
    $user = auth()->user();

    if ($user && $user->isAdmin() ) {
        return redirect()->route('admin.dashboard');
    }

    if ($user &&  $user->isUser() ) {
        return redirect()->route('user.dashboard');
    }

    return redirect()->route('signin');
})->name('dashboard');


Route::get('/signin' , function(){
    return view('signin');
})->name('signin')->middleware('guest') ;

Route::get('/signup' , function(){
    return view('signup');
})->name('signup')->middleware('guest') ;

Route::post('/signin' ,[AuthController::class , 'signin']) ;
Route::post('/signup' ,[AuthController::class , 'signup']) ;
Route::post('/signout' ,[AuthController::class , 'signout'])->name('signout')->middleware('auth') ;


