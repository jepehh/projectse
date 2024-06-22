<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdditionalInfoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutPlanController;


Route::get('/', function () {
    return view('login.index');
})->name('home');

Route::get('/landing-page', function(){
    return view('login.landing-page');
})->name('landing-page');

Route::get('/login-verify', function(){
    return view('login.login_verify');
})->name('login-verify');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register-submit', [RegisterController::class, 'register'])->name('register.submit');

Route::post('/login-submit', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register-details/{id}', function ($id) {
    return view('auth.register-details', ['id' => $id]);
})->name('register.details');

Route::post('/register-details/{id}', [AdditionalInfoController::class, 'store'])->name('register.details.submit');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Ini untuk main component penting
Route::get('/article', function () {
    return view('main.article');
})->name('article');

Route::get('/community', function () {
    return view('main.community');
})->name('community');

Route::get('/training', function () {
    return view('main.training');
})->name('training');

Route::get('/diet-plan', function () {
    return view('main.diet-plan');
})->name('diet-plan');

Route::get('/shop', function () {
    return view('main.shop');
})->name('shop');

//Ini untuk di training

Route::get('/lower-body', function () {
    return view('training_prog.lower-body');
})->name('lower-body');

Route::get('/full-body', function () {
    return view('training_prog.full-body');
})->name('full-body');

Route::get('/beginner', function () {
    return view('training_prog.beginner');
})->name('beginner');

//Untuk Upper-Body
Route::get('/upper-body', [WorkoutController::class, 'showUpperBodyWorkouts'])->name('upper-body');

Route::prefix('workout')->name('workout.')->group(function() {
    Route::post('/add-to-plan', [WorkoutPlanController::class, 'addToWorkoutPlan'])->name('add.to.plan');
    Route::post('/finalize-plan', [WorkoutPlanController::class, 'finalizeWorkoutPlan'])->name('finalize.plan');
    Route::get('/current-plan', [WorkoutPlanController::class, 'showCurrentWorkoutPlan'])->name('current.plan');
    Route::post('/remove-from-plan', [WorkoutPlanController::class, 'removeFromWorkoutPlan'])->name('remove.from.plan');
    Route::post('/publish-plan', [WorkoutPlanController::class, 'publishWorkoutPlan'])->name('publish.plan');
    Route::get('/plans', [WorkoutPlanController::class, 'listWorkoutPlans'])->name('plans');
    Route::get('/view-plan/{id}', [WorkoutPlanController::class, 'viewWorkoutPlan'])->name('view.plan');
});

Route::post('/workout/remove-from-finalized-plan', [WorkoutPlanController::class, 'removeFromFinalizedWorkoutPlan'])->name('workout.remove.from.finalized.plan');

Route::get('/dashboard-eatprog', function () {
    return view('main.diet-plan.dashboard-eatprog');
})->name('dashboard-eatprog');
