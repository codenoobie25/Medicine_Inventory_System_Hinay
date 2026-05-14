<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('medicines', MedicineController::class);

    Route::get('/export-excel', function () {
        $users = User::all();
        return (new FastExcel($users))->download('user.xlsx');
    });
});

require __DIR__ . '/auth.php';
