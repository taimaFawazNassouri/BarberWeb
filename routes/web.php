<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\CustomerDetailsController; 
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


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/customer_details', [HomeController::class, 'formDetails'])->name('formDetails');
Route::get('/updateBooking', [HomeController::class, 'updateBooking'])->name('updateBooking');
Route::get('/update/{id}', [HomeController::class, 'showBooking'])->name('showBooking');
Route::get('/admin', [HomeController::class, 'login_admin'])->name('admin');
Route::match(['get', 'post'], '/signin', [HomeController::class, 'signIn'])->name('signIn');
Route::post('/fetch-data', [HomeController::class, 'fetchData'])->name('contentFetching');
Route::post('/updateStatus', [HomeController::class, 'updateStatus'])->name('updateStatus');

Route::resource('/books', BookController::class);
Route::resource('/booking',  CustomerDetailsController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
