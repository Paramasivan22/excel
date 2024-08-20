<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

require __DIR__.'/auth.php';

// Group routes under the admin middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::get('/students/upload', [StudentController::class, 'showUploadForm'])->name('students.upload');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
    Route::get('/students', [StudentController::class, 'list'])->name('students.list');
    Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('influencers/upload', [InfluencerController::class, 'showUploadForm'])->name('influencers.upload');
    Route::post('influencers/import', [InfluencerController::class, 'import'])->name('influencers.import');
    Route::get('influencers', [InfluencerController::class, 'index'])->name('influencers.index');
    Route::get('/influencer/search', [InfluencerController::class, 'search'])->name('influencer.search');
    Route::get('/influencers/create', [InfluencerController::class, 'create'])->name('influencer.create');
    Route::post('/influencers', [InfluencerController::class, 'store'])->name('influencer.store');
    Route::get('import-excel', [PeopleController::class, 'import_excel']);
    Route::post('import-excel', [PeopleController::class, 'import_excel_post'])->name('import_excel_post');
    Route::get('users', [PeopleController::class, 'index'])->name('users');
    Route::get('/search', [PeopleController::class, 'search'])->name('user.search');
    Route::get('/users/create', [PeopleController::class, 'create'])->name('users.create');
    Route::post('/users', [PeopleController::class, 'store'])->name('users.store');
});

