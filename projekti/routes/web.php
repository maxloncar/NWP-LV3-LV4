<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectController;

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
    return view('layout');
});
//login ruta
Route::get('login', [AuthController::class, 'login'])->name('login');
//post login ruta nakon logiranja unutar koje se provjeravaju kredencijali
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
//registration ruta
Route::get('registration', [AuthController::class, 'registration'])->name('register');
//post registration ruta nakon registriranja unutar koje se takoder provjeravaju kredencijali
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
//logout ruta za odjavu
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//projects ruta unutar koje se nalaze popisi projekata
Route::resource('/projects', ProjectController::class);
