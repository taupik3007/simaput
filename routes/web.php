<?php
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/master',function(){
    return view('staff.profile.pembayaran');
});





Route::get('/staff/major',[MajorController::class, 'index'])->name('staff.major');
Route::get('/staff/major/create',[MajorController::class, 'create'])->name('staff.major.create');
Route::post('/staff/major/create',[MajorController::class, 'store'])->name('staff.major.store');
Route::get('/staff/major/{id}/edit',[MajorController::class, 'edit'])->name('staff.major.store');
Route::post('/staff/major/{id}/edit',[MajorController::class, 'update'])->name('staff.major.update');
Route::delete('/staff/major/{id}/destroy',[MajorController::class, 'destroy'])->name('staff.major.destroy');

