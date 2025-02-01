<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\LoginController;

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/'); // Or point to any other valid route
})->name('home');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin routes with middleware applied directly
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/members', [AdminController::class, 'viewMembers'])->name('admin.members');
});

Route::get('/admin/new-members', [AdminController::class, 'newMembers'])->name('admin.new-members');
Route::patch('/admin/approve-member/{id}', [AdminController::class, 'approveMember'])->name('admin.approve-member');

//Route::get('/admin/edit-member/{id}', [AdminController::class, 'editMember'])->name('admin.edit-member');
Route::get('/admin/members/{id}/edit', [AdminController::class, 'editMember'])->name('admin.edit-member');

Route::patch('/admin/update-member/{id}', [AdminController::class, 'updateMember'])->name('admin.update-member');

Route::delete('/admin/delete-member/{id}', [AdminController::class, 'deleteMember'])->name('admin.delete-member');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/user/preview/{id}', [RegisteredUserController::class, 'preview'])->name('user.preview');


//Route::patch('/admin/members/{id}/approve', [AdminController::class, 'approveMember'])->name('admin.members.approve');
Route::patch('/admin/members/{id}', [AdminController::class, 'updateMember'])->name('admin.update-member');


Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/member/profile', [MemberController::class, 'show'])->name('member.profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//Route::post('/profile/changepassword', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
// Route::middleware('auth')->group(function () {
//     Route::put('/profile/changepassword', [PasswordController::class, 'update'])->name('password.update');
// });


Route::match(['PUT', 'PATCH'], '/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::match(['PUT', 'PATCH'], '/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::put('admin/inactivate-member/{id}', [AdminController::class, 'inactivateMember'])->name('admin.inactivate-member');
Route::put('/admin/mark-as-active/{id}', [AdminController::class, 'markAsActive'])->name('admin.mark-as-active');



// Add this route for verification
Route::get('/verify-email/{token}', [VerificationController::class, 'verifyEmail'])->name('email.verify');



Route::post('/admin/approve-member/{id}', function ($id) {
    $user = User::findOrFail($id);

    // Update the status to approved
    $user->update(['status' => 'Active']);

    // Send email for verification
    $user->sendEmailVerificationNotification();

    return back()->with('success', 'Member approved and verification email sent.');
})->name('admin.approve_member');



// Email verification

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard'); // Or any desired page
})->middleware(['auth', 'signed'])->name('verification.verify');


require __DIR__.'/auth.php';

