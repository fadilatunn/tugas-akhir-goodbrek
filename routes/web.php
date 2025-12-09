<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use App\Http\Controllers\UlasanController;
use App\Models\Ulasan;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $menus = Menu::all();
    $ulasans = Ulasan::latest()->get(); // ⬅ tambahan

    return view('home', compact('menus', 'ulasans'));
})->name('home');

Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

Route::resource('menus', MenuController::class)->except(['show']);



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
