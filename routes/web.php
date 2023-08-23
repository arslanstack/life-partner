<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembersController;/*
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
    return view('welcome');
});


Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    // These routes are only accessible for authenticated users
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/profileSettings', [App\Http\Controllers\HomeController::class, 'profileSettings'])->name('profileSettings');
    Route::post('/editProfile', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('editProfile');
    Route::get('/securitySettings', [App\Http\Controllers\HomeController::class, 'security'])->name('securitySettings');
    Route::post('/changePassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changePassword');
    Route::get('/privacySettings', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacySettings');
    Route::post('/changePrivacy', [App\Http\Controllers\HomeController::class, 'changePrivacy'])->name('changePrivacy');
    Route::get('/preferencesSettings', [App\Http\Controllers\HomeController::class, 'preferences'])->name('preferencesSettings');
    Route::post('/changePreferences', [App\Http\Controllers\HomeController::class, 'changePreferences'])->name('changePreferences');
    Route::get('/subscriptionSettings', [App\Http\Controllers\HomeController::class, 'subscription'])->name('subscriptionSettings');
    Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members');
    Route::get('/membersLatestActive', [App\Http\Controllers\MembersController::class, 'sortActive'])->name('membersLatestActive');
    Route::get('/membersNew', [App\Http\Controllers\MembersController::class, 'sortNew'])->name('membersNew');
    Route::post('/advancedSearch', [App\Http\Controllers\MembersController::class, 'search'])->name('advancedSearch');

    Route::get('/member/{username}', [App\Http\Controllers\MembersController::class, 'getMember'])->name('user.getMember');
});



Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::middleware(['guest:admin'])->group(function () {
        // These routes are only accessible for non-authenticated users (guests)
        Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('home', function () {
            return view('admin.home');
        })->name('admin.home');
        Route::get('profile', function () {
            return view('admin.profile');
        })->name('admin.profile');
        Route::get('userManagement', [AdminController::class, 'userManagement'])->name('admin.userManagement');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::post('unblockUser', [AdminController::class, 'unblockUser'])->name('admin.unblockUser');
        Route::post('blockUser', [AdminController::class, 'blockUser'])->name('admin.blockUser');
        Route::post('deleteUser', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
        Route::get('approvals', [AdminController::class, 'approvals'])->name('admin.approvals');
        Route::post('approveChange', [AdminController::class, 'approveChange'])->name('admin.approveChange');
        Route::post('rejectChange', [AdminController::class, 'rejectChange'])->name('admin.rejectChange');


        Route::get('/approval_details/{userId}', [AdminController::class, 'getApprovalDetails'])->name('admin.approval_details');
        Route::get('/user-details/{userId}', [AdminController::class, 'getUserDetails'])->name('user.details');
    });
});
