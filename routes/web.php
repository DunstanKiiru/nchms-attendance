<?php

use Livewire\Volt\Volt;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserShow;
use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserCreate;
use Illuminate\Support\Facades\Route;
use App\Livewire\Employees\EmployeesEdit;
use App\Livewire\Employees\EmployeesShow;
use App\Livewire\Employees\EmployeesIndex;
use App\Livewire\Employees\EmployeesCreate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');



 //User Management CRUD operations route
    Route::get("users", UserIndex::class)->name("users.index");
    Route::get("users/create", UserCreate::class)->name("users.create");
    Route::get("users/{id}/edit", UserEdit::class)->name("users.edit");
    Route::get("users/{id}", UserShow::class)->name("users.show");

    //Employee Management CRUD operations route
    Route::get("employees", EmployeesIndex::class)->name("employees.index");
    Route::get("employees/create", EmployeesCreate::class)->name("employees.create");
    Route::get("employees/{id}/edit", EmployeesEdit::class)->name("employees.edit");
    Route::get("employees/{id}", EmployeesShow::class)->name("employees.show");

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
