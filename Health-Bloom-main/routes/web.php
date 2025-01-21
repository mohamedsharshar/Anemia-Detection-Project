<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceUserController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackBackendController;
use App\Http\Controllers\CategoryFeedbackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CategorycenterController;
use App\Mail\contactMail;
use App\Http\Controllers\CenterUserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\AppointmentController;
use App\Http\Livewire\CenterRatings;
use App\Http\Controllers\AnemiaCheckerController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/service', ServiceUserController::class);

Route::get('/center/serviceAdmin/archive/{id}', [ServiceController::class,'archive']);

Route::get('/center/serviceAdmin/active/{id}', [ServiceController::class,'active']);

Route::get('/centerUser/service/like/{id}', [ServiceUserController::class,'like']);

Route::get('/centerUser/service/dislike/{id}', [ServiceUserController::class,'dislike']);

Route::resource('/serviceAdmin', ServiceController::class);

Route::resource('/serviceAdmin/material', MaterialController::class);

Route::get('/center/serviceAdmin/{id}/create', [ServiceController::class,'create']);

Route::get('/center/serviceAdmin/{id}', [ServiceController::class,'index']);

Route::get('/center/serviceAdmin/{id}/show', [ServiceController::class,'show']);

Route::get('/center/serviceAdmin/{id}/edit', [ServiceController::class,'edit']);

Route::get('/centerUser/service/{id}', [ServiceUserController::class,'index']);

Route::get('/center/serviceAdmin/material/{id}', [MaterialController::class,'index']);

Route::get('/center/serviceAdmin/material/{id}/create', [MaterialController::class,'create']);

Route::get('/center/serviceAdmin/material/archive/{id}', [MaterialController::class,'archive']);

Route::get('/center/serviceAdmin/material/active/{id}', [MaterialController::class,'active']);

Route::get('/center/serviceAdmin/material/{id}/show', [MaterialController::class,'show']);

Route::get('/center/serviceAdmin/material/{id}/edit', [MaterialController::class,'edit']);

Route::get('/report',function(){
 Mail::to('nourelhouda.mohsni@esprit.tn')
 ->send(new contactMail());
 return redirect('/centerUser');
});

Route::get('/sendSMS',[App\Http\Controllers\TwilioSMSController::class,'index']);

// Route::get('/feedback/{id}/edit', [FeedbackController::class, 'showRating']);

Route::resource('feedback', FeedbackController::class);
Route::resource('feedbackAdmin', FeedbackBackendController::class);
Route::resource('category', CategoryFeedbackController::class);
Route::get('/feedback/{id}', [FeedbackController::class, 'show']);
Route::resource('/create', FeedbackController::class);
Route::resource("comments", CommentController::class);
// Route::post('/review-store',[FeedbackController::class, 'reviewstore'])->name('review.store');
// Route::post('store', 'CommentController@store')->name("comments.store");
//Route::get('/rating',CenterRatings::class, 'rate');
//Route::get('feedbackAdmin/download/{id}', FeedbackBackendController::class);
Route::get('/check', [AnemiaCheckerController::class, 'index']);
Route::post('/check-symptoms', [AnemiaCheckerController::class, 'checkSymptoms']);

Route::resource('/categorycenter',CategorycenterController::class);
Route::resource('/center',CenterController::class);
Route::resource('/centerUser',CenterUserController::class);

Route::get('generatepdf', [CenterController::class, 'generatepdf'])->name('center.pdf');


Route::get('/search', [CenterController::class, 'search']);

Route::get('/specialists', [SpecialistController::class, 'specialists']);

Route::get('/add_specialist_view', [SpecialistController::class, 'addview']);

Route::get('/show_specialist_view', [SpecialistController::class, 'showview']);

Route::post('/upload_specialist', [SpecialistController::class, 'upload']);

Route::get('/deletespecialist/{id}', [SpecialistController::class, 'deletespecialist']);

Route::get('/editspecialist/{id}', [SpecialistController::class, 'editspecialist']);

Route::post('/updatespecialist/{id}', [SpecialistController::class, 'updatespecialist']);

Route::post('/appointment', [AppointmentController::class, 'appointment']);

Route::get('/myappointment', [AppointmentController::class, 'myappointment']);

Route::get('/cancel_appointment/{id}', [AppointmentController::class, 'cancel_appointment']);

Route::get('/showappointment', [AppointmentController::class, 'showappointment']);

Route::get('/approved/{id}', [AppointmentController::class, 'approved']);

Route::get('/canceled/{id}', [AppointmentController::class, 'canceled']);

Route::get('/emailview/{id}', [AppointmentController::class, 'emailview']);

Route::post('/sendemail/{id}', [AppointmentController::class, 'sendemail']);

