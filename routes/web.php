<?php


use App\Http\Controllers\Backend\Faq\FaqController;
use App\Http\Controllers\Backend\MyProfile\MyProfileController;
use App\Http\Controllers\Backend\Portfolio\CategoryController;
use App\Http\Controllers\Backend\Portfolio\ProjectController;
use App\Http\Controllers\Backend\Pricing\PricingController;
use App\Http\Controllers\Backend\Resume\EducationController;
use App\Http\Controllers\Backend\Resume\ExperienceController;


use App\Http\Controllers\Backend\Service\ServiceDetailsController;
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

    Route::prefix('resume/')->name('resume.')->group(function () {

        // education routes
        Route::get('education', [EducationController::class, 'Education'])->name('education');
        Route::post('education/store', [EducationController::class, 'store'])->name('education.store');
        Route::put('education/update/{id}', [EducationController::class, 'update'])->name('education.update');
        Route::delete('education/delete/{id}', [EducationController::class, 'destroy'])->name('education.delete');

        // experience routes
        Route::get('experience', [ExperienceController::class, 'Experience'])->name('experience');
        Route::post('experience/store', [ExperienceController::class, 'store'])->name('experience.store');
        Route::put('experience/update/{id}', [ExperienceController::class, 'update'])->name('experience.update');
        Route::delete('experience/delete/{id}', [ExperienceController::class, 'destroy'])->name('experience.delete');
    });

    // Portfolio routes
    Route::prefix('portfolio/')->name('portfolio.')->group(function () {

        // Category routes
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

        // Project routes
        Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('projects/store', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('projects/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('projects/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('projects/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.delete');
    });

    // pricing routes
    Route::prefix('pricing/')->name('pricing.')->group(function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::get('create', [PricingController::class, 'create'])->name('create');
        Route::post('store', [PricingController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PricingController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [PricingController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [PricingController::class, 'destroy'])->name('delete');
    });

    // FAQ routes can be added here in the future
    Route::prefix('faq/')->name('faq.')->group(function () {
        Route::get('/', [FaqController::class, 'faqList'])->name('list.faq');
        Route::get('faq-create', [FaqController::class, 'create'])->name('create.faq');
        Route::post('faq-store', [FaqController::class, 'faqStore'])->name('store.faq');
        Route::get('faq-edit/{id}', [FaqController::class, 'faqEdit'])->name('edit.faq');
        Route::get('faq-delete/{id}', [FaqController::class, 'faqDelete'])->name('delete.faq');
        Route::put('faq-update/{id}', [FaqController::class, 'faqUpdate'])->name('update.faq');
    });

    // service routes can be added here in the future

    Route::prefix('service/')->name('service.')->group(function () {
        // Define service-related routes here
        Route::get('/', [ServiceDetailsController::class, 'index'])->name('index');
        Route::get('/create-service', [ServiceDetailsController::class, 'serviceCreate'])->name('service.create');
        Route::post('/store-service', [ServiceDetailsController::class, 'serviceStore'])->name('service.store');
        Route::get('/edit-service/{id}', [ServiceDetailsController::class, 'serviceEdit'])->name('service.edit');
        Route::put('/update-service/{id}', [ServiceDetailsController::class, 'serviceUpdate'])->name('service.update');
        Route::get('/delete-service/{id}', [ServiceDetailsController::class, 'serviceDelete'])->name('service.delete');
    });

});

// frontend routes

Route::name('frontend.')->group(function () {
    // Additional frontend routes can be defined here
    Route::get('/projects', action: [IndexController::class, 'all'])->name('projects.all');
    Route::get('/service_details/{slug}', action: [IndexController::class, 'serviceDetails'])->name('service.details');

});


require __DIR__ . '/auth.php';
