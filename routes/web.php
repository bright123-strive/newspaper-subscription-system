<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Billing;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserManagement;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Admin\Publications\Index as PubIndex;
use App\Http\Livewire\Admin\Publications\Add as PubAdd;
use App\Http\Livewire\Admin\Publications\Edit  as PubEdit;
use App\Http\Livewire\Admin\Subscribers\MySubScriptions as MySubs;
use App\Http\Livewire\Admin\Subscribers\ViewSubScription as ViewSub;
use App\Http\Livewire\Admin\SubscriptionMgt\Index as SubIndex;

use App\Http\Livewire\Admin\Roles\Index  as RolesIndex;
use App\Http\Livewire\Admin\Roles\Create   as RolesCreate;
use App\Http\Livewire\Admin\Roles\Edit   as RolesEdit;

use App\Http\Livewire\Admin\Users\Index  as UserIndex;
use App\Http\Livewire\Admin\Users\Create   as UserCreate;
use App\Http\Livewire\Admin\Users\Edit  as UserEdit;
use App\Http\Livewire\Admin\Reports\ActiveSubscribers as ActvSub;
use App\Http\Livewire\Admin\Reports\ExpiredSubscribers as ExpSub;
use App\Http\Livewire\Admin\Reports\SubscriptionByRegion  as SubByRegion;


use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\RTL;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
use App\Http\Controllers\Home\Index;
use App\Http\Controllers\Subscription\Subscribe;
use App\Http\Controllers\Subscription\Receipt;
use App\Http\Controllers\Reports\SubscriptionByRegion;
use App\Http\Livewire\VirtualReality;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::get('/', function () {
    return redirect('homepage');
});

Route::get('homepage', [Index::class, 'index'])->name('homepage');

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
// Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');




Route::group(['middleware' => 'auth'], function () {
/*
|--------------------------------------------------------------------------
| User administration routes
|--------------------------------------------------------------------------
*/
Route::get('receipt', [Receipt::class, 'index'])->name('receipt');
Route::get('/export-to-pdf', [Subscribe::class, 'exportPdf'])->name('export-to-pdf');

Route::post('/subscribing', [Subscribe::class, 'store']);
Route::post('/subscribing', [Subscribe::class, 'store']);
Route::get('subscription', [Subscribe::class, 'index'])->name('subscribe');

Route::get('publications', PubIndex::class)->name('manage-publications');
Route::get('add-new-publication', PubAdd::class)->name('add-publication');
Route::get('edit-publication/{id}', PubEdit::class)->name('edit-publication');

Route::get('mysubscriptions', MySubs::class)->name('mysubscriptions');
Route::get('view-subscription/{id}', ViewSub::class)->name('view-subscription');

Route::get('all-subscriptions', SubIndex::class)->name('all-subscriptions');

Route::get('role-management', RolesIndex::class)->name('role-management');
Route::get('role-management/{id}', RolesEdit::class)->name('edit-role');
 Route::get('new-role', RolesCreate::class)->name('new-role');

 Route::get('user-management', UserIndex::class)->name('user-management');
Route::get('user-management/{id}', UserEdit::class)->name('edit-user');
 Route::get('new-user', UserCreate::class)->name('new-user');

 Route::get('active-subscribers', ActvSub::class)->name('active-subscribers');
 Route::get('expired-subscribers', ExpSub::class)->name('expired-subscribers');
 Route::get('subscriber-by-region', SubByRegion::class)->name('sub-by-region');
 Route::post('get-region-report', [SubscriptionByRegion::class, 'getUserData']);

 Route::get('reports', [SubscriptionByRegion::class, 'index'])->name('report-region');
 Route::get('pdf-region', [SubscriptionByRegion::class, 'exportPdf'])->name('region-pdf');

//  Route::get('active-subscribers-report', ActvSub::class,'exportPdf')->name('convert-pdf');
 Route::get('active-subscribers-report', [ActvSub::class, 'exportPdf'])->name('convert-pdf');

Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('billing', Billing::class)->name('billing');
Route::get('profile', Profile::class)->name('profile');
Route::get('tables', Tables::class)->name('tables');
Route::get('notifications', Notifications::class)->name("notifications");
Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
Route::get('rtl', RTL::class)->name('rtl');
});

