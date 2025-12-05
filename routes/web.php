<?php

use App\Http\Controllers\Backend\MyProfile\MyProfileController;
use App\Http\Controllers\Backend\Skills\FrameworkController;
use App\Http\Controllers\Backend\Skills\SkillsController;
use App\Http\Controllers\Frontend\Index\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;






Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// backend route
Route::prefix('dashboard/')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    // My profile routes
    Route::get('my-profile', [MyProfileController::class, 'profileView'])->name('my.profile');
    Route::get('profile-edit', [MyProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('profile-info', [MyProfileController::class, 'profileInfo'])->name('profile.info');
    Route::post('/profile/password-update', [MyProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    // skills routes
    Route::prefix('skills/')->name('skills.')->group(function () {

        // coding_skill
        Route::get('coding-skill', [SkillsController::class, 'codingSkill'])->name('coding.skill');
        Route::post('/skills', [SkillsController::class, 'store'])->name('skills.store');
        Route::put('/skills/{id}', [SkillsController::class, 'update'])->name('skills.update');
        Route::delete('/skills/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');

        // framework
        Route::get('framework-skill', [FrameworkController::class, 'frameworkSkill'])->name('framework.skill');
        Route::post('/framework-skills', [FrameworkController::class, 'store'])->name('framework-skills.store');
        Route::put('/framework-skills/{id}', [FrameworkController::class, 'update'])->name('framework-skills.update');
        Route::delete('/framework-skills/{id}', [FrameworkController::class, 'destroy'])->name('framework-skills.destroy');
    });

});
// frontend routes
require __DIR__ . '/auth.php';