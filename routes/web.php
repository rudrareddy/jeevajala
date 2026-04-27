<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\CreditRequestController;
use App\Http\Controllers\Admin\CreditRequest\CreditRequestController as AdminCreditController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome-success', function () {
    return view('welcome');
})->name('welcome.success');

Route::get('/dashboard', function () {
    if(Auth::user()->hasRole('admin')){
     //return "hi";
     return redirect('admin/dashboard');
  }
 return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
   // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::patch('/profile-account', [ProfileController::class, 'bank_update']);
    Route::patch('/documents-upload', [ProfileController::class, 'profile_documents']);

    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('my-teams',[ProfileController::class,'my_teams']);
    Route::get('credit-requests',[CreditRequestController::class,'index']);
    Route::get('transactions',[CreditRequestController::class,'transactions']);
});

require __DIR__.'/auth.php';

Route::group(['prefix' =>'admin','middleware'=>['role:admin','auth']],function($role){
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::resource('roles',RoleController::class);
    Route::get('pending-credit-requests',[AdminCreditController::class,'pendingCreditRequests']);
    Route::get('approved-credit-requests',[AdminCreditController::class,'approvedCreditRequests']);
    Route::get('rejected-credit-requests',[AdminCreditController::class,'rejectedCreditRequests']);
    Route::get('credit-requests/{request_id}/approve',[AdminCreditController::class,'approve']);
    Route::get('credit-requests/{request_id}/reject',[AdminCreditController::class,'reject']);

    //transactions
    Route::get('transactions',[DashboardController::class,'transactions']);
    //users 
    Route::get('customers',[DashboardController::class,'customers']);
    Route::get('customer/{user_id}',[DashboardController::class,'customer_detail']);
    Route::get('refferals/{user}', [DashboardController::class, 'referralsList']);
});
