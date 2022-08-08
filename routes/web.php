<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Livewire\User\GradLivewire;
use App\Http\Livewire\User\UserLivewire;
use App\Http\Livewire\Auth\SigninLivewire;
use App\Http\Livewire\Campus\CampusLivewire;
use App\Http\Livewire\Post\NewsfeedLivewire;
use App\Http\Livewire\User\UserFormLivewire;
use App\Http\Livewire\College\CollegeLivewire;
use App\Http\Livewire\Program\ProgramLivewire;
use App\Http\Livewire\User\AlumProgramLivewire;
use App\Http\Livewire\Employer\EmployerLivewire;
use App\Http\Livewire\AlumniTracer\TracerLivewire;
use App\Http\Livewire\Dashboard\DashboardLivewire;
use App\Http\Controllers\File\UniversityController;
use App\Http\Livewire\User\AlumProgramFormLivewire;
use App\Http\Livewire\University\UniversityLivewire;
use App\Http\Livewire\Designation\DesignationLivewire;
use App\Http\Livewire\AlumniProfile\EditProfileLivewire;
use App\Http\Livewire\AlumniProfile\AlumniProfileLivewire;
use App\Http\Livewire\AlumniSection\AlumniSectionLivewire;
use App\Http\Livewire\User\UserDesignationAllumniLivewire;
use App\Http\Livewire\AlumniRegister\AlumniRegisterLivewire;
use App\Http\Livewire\User\Page\UserDesignationCampusLivewire;
use App\Http\Livewire\User\Designation\UserDesignationLivewire;
use App\Http\Livewire\User\Page\UserDesignationCollegeLivewire;
use App\Http\Livewire\User\Page\UserDesignationProgramLivewire;
use App\Http\Livewire\RegisteredAlumni\RegisteredAlumniLivewire;
use App\Http\Livewire\User\Page\UserDesignationGraduateLivewire;
use App\Http\Livewire\User\Page\UserDesignationUniversityLivewire;
use App\Http\Livewire\RegisteredAlumni\RegisteredAlumniFormLivewire;
use App\Http\Livewire\AdminDashboard\AdminDashboardLivewire;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    
    Route::get('/', SigninLivewire::class)->name('signin');

});

Route::get('/register', AlumniRegisterLivewire::class)->name('register');

Route::middleware(['user'])->group(function () {
    
    Route::get('/dashboard', DashboardLivewire::class)->name('dashboard');

    Route::get('/campus', CampusLivewire::class)->name('campus');
    
    Route::get('/college', CollegeLivewire::class)->name('college');
    
    Route::get('/program', ProgramLivewire::class)->name('program');
    
    Route::get('/university', UniversityLivewire::class)->name('university');

    Route::get('/designation', DesignationLivewire::class)->name('designation');

    Route::get('/section', AlumniSectionLivewire::class)->name('section');
    
    Route::get('/employer', EmployerLivewire::class)->name('employer');
    
    Route::get('/newsfeed', NewsfeedLivewire::class)->name('newsfeed');

    Route::get('/dash', AdminDashboardLivewire::class)->name('dash');

    Route::get('/profile', AlumniProfileLivewire::class)->name('profile');

    Route::get('/editprofile', EditProfileLivewire::class)->name('/editprofile');

    Route::prefix('/user')->group(function () {
        
        Route::get('/', UserLivewire::class)->name('user.management');
        
        Route::get('/form/{user?}', UserFormLivewire::class)->name('user.form');

        Route::get('/alumni', GradLivewire::class)->name('user.alumni');
        
        Route::get('/alumni/{user}/program', AlumProgramFormLivewire::class)->name('user.alumni.program');

        Route::get('/alumni/{user}/alumprogram', AlumProgramLivewire::class)->name('user.alumni.alumprogram');
        
        Route::get('/{user}/designation', UserDesignationLivewire::class)->name('user.designation');

        Route::get('/designation/{designation}/university', UserDesignationUniversityLivewire::class)->name('user.university');

        Route::get('/designation/{designation}/campus', UserDesignationCampusLivewire::class)->name('user.campus');

        Route::get('/designation/{designation}/college', UserDesignationCollegeLivewire::class)->name('user.college');

        Route::get('/designation/{designation}/program', UserDesignationProgramLivewire::class)->name('user.program'); 
        
    });

    Route::prefix('/alumni')->group(function () {
    
        Route::get('/tracer', TracerLivewire::class)->name('alumni.tracer');

        Route::get('/registeredalumni', RegisteredAlumniLivewire::class)->name('alumni.registeredalumni');

        Route::get('/registeredalumni/{alumni}/registered', RegisteredAlumniFormLivewire::class)->name('alumni.registeredalumni.registered');
    
    });

    Route::prefix('/file')->group(function () {
    
        Route::get('/university/logo', [UniversityController::class, 'logo'])->name('file.university.logo');
    
    });

    Route::get('logout', function () { Auth::logout(); return redirect()->route('signin'); })->name('signout');
    
});

// to be deleted
Route::get('/test', [TestController::class, 'index'])->name('test');
