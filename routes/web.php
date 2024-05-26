<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TutionApplicationController;
use App\Http\Controllers\admin\AdminTutionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\TutionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/tuitions',[TutionsController::class,'index'])->name('jobs');
Route::get('/tuitions/detail/{id}',[TutionsController::class,'detail'])->name('jobDetail');
Route::post('/apply-tuition',[TutionsController::class,'applyJob'])->name('applyJob');
Route::post('/save-tuition',[TutionsController::class,'saveJob'])->name('saveJob');

Route::get('/forgot-password',[AccountController::class,'forgotPassword'])->name('account.forgotPassword');
Route::post('/process-forgot-password',[AccountController::class,'processForgotPassword'])->name('account.processForgotPassword');
Route::get('/reset-password/{token}',[AccountController::class,'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password',[AccountController::class,'processResetPassword'])->name('account.processResetPassword');


Route::group(['prefix' => 'admin','middleware' => 'checkRole'], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/users',[UserController::class,'index'])->name('admin.users');
    Route::get('/users/{id}',[UserController::class,'edit'])->name('admin.users.edit');
    Route::put('/users/{id}',[UserController::class,'update'])->name('admin.users.update');
    Route::delete('/users',[UserController::class,'destroy'])->name('admin.users.destroy');
    Route::get('/tuition',[AdminTutionController::class,'index'])->name('admin.jobs');
    Route::get('/tuition/edit/{id}',[AdminTutionController::class,'edit'])->name('admin.jobs.edit');
    Route::put('/tuition/{id}',[AdminTutionController::class,'update'])->name('admin.jobs.update');
    Route::delete('/tuition',[AdminTutionController::class,'destroy'])->name('admin.jobs.destroy');
    Route::get('/tuition-applications',[TutionApplicationController::class,'index'])->name('admin.jobApplications');
    Route::delete('/tuition-applications',[TutionApplicationController::class,'destroy'])->name('admin.jobApplications.destroy');




    //add class
        
    Route::get('/clsssub', [CategoryController::class, 'index'])->name('clsssub.index');
    Route::get('/clsssub/create', [CategoryController::class, 'create'])->name('clsssub.create');
    Route::post('/clsssub/store', [CategoryController::class, 'store'])->name('clsssub.store');
    Route::get('/clsssub/{category}', [CategoryController::class, 'show'])->name('clsssub.show');
    Route::get('/clsssub/{category}/edit', [CategoryController::class, 'edit'])->name('clsssub.edit');
    Route::put('/clsssub/{category}', [CategoryController::class, 'update'])->name('clsssub.update');
    Route::delete('/clsssub/{category}', [CategoryController::class, 'destroy'])->name('clsssub.destroy');


    //subject section
        
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{jobType}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/subjects/{jobType}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{jobType}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{jobType}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

});

Route::group(['prefix' => 'account'], function(){

    // Guest Route
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/register',[AccountController::class,'registration'])->name('account.registration');
        Route::post('/process-register',[AccountController::class,'processRegistration'])->name('account.processRegistration');
        Route::get('/login',[AccountController::class,'login'])->name('account.login');
        Route::post('/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
    });

    // Authenticated Routes
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile',[AccountController::class,'profile'])->name('account.profile');
        Route::put('/update-profile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
        Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');   
        Route::post('/update-profile-pic',[AccountController::class,'updateProfilePic'])->name('account.updateProfilePic');     
        Route::get('/create-tuition',[AccountController::class,'createJob'])->name('account.createJob');   
        Route::post('/save-tuition',[AccountController::class,'saveJob'])->name('account.saveJob');   
        Route::get('/my-tuitions',[AccountController::class,'myJobs'])->name('account.myJobs');  
        Route::get('/my-tuitions/edit/{jobId}',[AccountController::class,'editJob'])->name('account.editJob');  
        Route::post('/update-tuition/{jobId}',[AccountController::class,'updateJob'])->name('account.updateJob');   
        Route::post('/delete-tuition',[AccountController::class,'deleteJob'])->name('account.deleteJob');   
        Route::get('/my-tuition-applications',[AccountController::class,'myJobApplications'])->name('account.myJobApplications');  

        Route::post('/remove-tuition-application',[AccountController::class,'removeJobs'])->name('account.removeJobs');   
        Route::get('/saved-tuition',[AccountController::class,'savedJobs'])->name('account.savedJobs');  
        Route::post('/remove-saved-tuition',[AccountController::class,'removeSavedJob'])->name('account.removeSavedJob');   
        Route::post('/update-password',[AccountController::class,'updatePassword'])->name('account.updatePassword');   

    });

});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2/{id}', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('payment');

Route::post('/pay/{id}', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


