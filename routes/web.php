<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicantAuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HR\ApplicationManagementController;
use App\Http\Controllers\HR\ResumeScreeningController;
use App\Http\Controllers\ReportController;

// Main page
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'hr') {
            return redirect()->route('dashboard');
        }

        if (auth()->user()->role === 'applicant') {
            return redirect()->route('applicant.dashboard');
        }

        auth()->logout();
    }

    return redirect()->route('login');
});

// Shared login page
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:5,1');

    // Applicant registration
    Route::get('/applicant/register', [ApplicantAuthController::class, 'showRegister'])
        ->name('applicant.register');

    Route::post('/applicant/register', [ApplicantAuthController::class, 'register'])
        ->name('applicant.register.store');
});

// HR protected pages
Route::middleware(['auth', 'role:hr'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/reports', [ReportController::class, 'index'])
    ->name('hr.reports.index');

    Route::resource('job-positions', JobPositionController::class)
        ->except(['show']);

    Route::get('/applications', [ApplicationManagementController::class, 'index'])
        ->name('hr.applications.index');

    Route::get(
        '/applications/{application}/resume',
        [ApplicationManagementController::class, 'downloadResume']
    )->name('hr.applications.resume.download');

    Route::patch(
        '/applications/{application}/status',
        [ApplicationManagementController::class, 'updateStatus']
    )->name('hr.applications.status.update');

    
Route::get(
    '/applications/{application}/schedule',
    [ApplicationManagementController::class, 'createSchedule']
)->name('hr.applications.schedule.create');

Route::post(
    '/applications/{application}/schedule',
    [ApplicationManagementController::class, 'storeSchedule']
)->name('hr.applications.schedule.store');

Route::get('/resume-screening', [ResumeScreeningController::class, 'index'])
    ->name('hr.resume-screening.index');


    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});

// Applicant protected pages
Route::middleware(['auth', 'role:applicant'])->prefix('applicant')->group(function () {

    Route::get('/dashboard', [ApplicantAuthController::class, 'dashboard'])
        ->name('applicant.dashboard');

    Route::post('/logout', [ApplicantAuthController::class, 'logout'])
        ->name('applicant.logout');

    Route::get('/jobs/{jobPosition}/apply', [ApplicationController::class, 'create'])
    ->name('applicant.apply');

    Route::post('/jobs/{jobPosition}/apply', [ApplicationController::class, 'store'])
        ->name('applicant.apply.store');
});


Route::get('/python-diagnostic', function () {

    $python = config('services.python.path');

    $process = new \Symfony\Component\Process\Process([
        $python,
        '-c',
        'import os; print("HOME:", os.path.expanduser("~")); from sentence_transformers import SentenceTransformer; model = SentenceTransformer("sentence-transformers/all-MiniLM-L6-v2"); print("MODEL LOAD OK")'
    ]);

    $process->setEnv([
        'USERPROFILE' => 'C:\\Users\\admin',
        'HOME' => 'C:\\Users\\admin',
        'HOMEDRIVE' => 'C:',
        'HOMEPATH' => '\\Users\\admin',
        'HF_HOME' => 'C:\\Users\\admin\\.cache\\huggingface',
    ]);

    $process->setTimeout(180);
    $process->run();

    return response()->json([
        'exit_code' => $process->getExitCode(),
        'output' => $process->getOutput(),
        'error' => $process->getErrorOutput(),
    ]);
});
