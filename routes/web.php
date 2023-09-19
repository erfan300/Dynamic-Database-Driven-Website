<?php

use App\Http\Controllers\CreateProjectController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/login', function () {
    return view('login', ['title' => 'Login']);
})->name('login');

// Register routes
Route::get('/register', function () {
    return view('register', ['title' => 'Register']);
})->name('register');

Route::post('/register', [RegisterController::class, 'DataInsert'])->name('register');

Route::post('/login', [LoginController::class,'login'])->name('login');

Route::get('/redirect', function () {
    return view('redirect');
})->name('redirect');

Route::get('/view',[CreateProjectController::class,'show'])->name('view');

Route::get('/project/{title}',[CreateProjectController::class,'display'])->name('project');


Route::group(['middleware'=>"web"],function(){
    Route::get('/create', function () {
        return view('create');
    })->name('create');
    
    Route::post('/create', [CreateProjectController::class, 'DataInsert']);
});

Route::get('/search', [CreateProjectController::class, 'search'])->name('search');

Route::get('/update/{pid}', [CreateProjectController::class, 'update'])->name('update');

Route::post('/update/{pid}', [CreateProjectController::class, 'updateProject'])->name('update');


Route::group(['middleware'=>"web"],function(){
    Route::get('/logout', function(){
        if(session()->has('user_id'))
        {
         session()->pull('user_id');
        }
        return view('home');
     });
});


