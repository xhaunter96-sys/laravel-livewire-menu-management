<?php

declare(strict_types=1);

use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Core\Menus;
use App\Livewire\Core\Submenus;
use App\Livewire\Auth\Register;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)
    ->middleware('guest')
    ->name('login');

Route::get('/register', Register::class)
    ->middleware('guest')
    ->name('register');

Route::post('/logout', function (): RedirectResponse {
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect()->route('login');
})->middleware('auth')->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/admin/admindashboard', AdminDashboard::class)
        ->name('dashboard');
});
Route::middleware('auth')->group(function (): void {
    Route::get('/core/menus', Menus::class)
        ->name('menus');
    Route::get('/core/submenus', Submenus::class)
        ->name('submenus');
});
