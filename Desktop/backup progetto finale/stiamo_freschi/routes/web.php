<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
route::resource('announcement', AnnouncementController::class);
route::resource('categories', CategoryController::class);


Route::get('/create', [PageController::class, 'announcementCreate'])->name('announcement.create')->middleware('auth');
Route::get('/category/{id}', [AnnouncementController::class, 'indexByCategory'])->name('announcement.category');

Route::get('/test', [PageController::class, 'test'])->name('test');

Route::get('/ricerca/annuncio', [AnnouncementController::class, 'searchAnnouncements'])->name('announcements.search');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
// zona revisore


// index revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
// Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
// Rifiuta annuncio
Route::patch('/accetta/rifiuta/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
// Richiedi di diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// Rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/passwordDimenticata', [PageController::class, 'passwordDimenticata']);

Route::post('/lingua/{lang}', [LanguageController::class, 'setLanguage'])->name('set_language_locale');
// Accetta cookies
Route::get('/accetta-cookies', [PageController::class, 'accettaCookies'])->name('accetta-cookies');
// Rifiuta cookies
Route::get('/rifiuta-cookies', [PageController::class, 'rifiutaCookies'])->name('rifiuta-cookies');


// Google Auth Socialite
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// Profile

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'goToEdit'])->name('profile.edit')->middleware('auth');
// profile update
Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


//edit announcement

Route::get('/edit/{announcement}', [PageController::class, 'announcementEdit'])->name('announcement.edit')->middleware('auth');

 Route::get('/vaiAlReset', [PageController::class, 'GoToResetPassword']);