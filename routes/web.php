<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\HomeController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Route::post('/reset-password', 'PassportController@resetPassword');

Route::get('/password/reset/{token?}', function(){
    return view('short_description');
});


Route::get('/short-description', function(){
    return view('short_description');
});

Route::get('/long-description', function(){
    return view('long_description');
});


Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('/privacy', function(){
    return view('privacy');
});
Route::get('/terms', function(){
    return view('terms');
});
Route::get('/about-us', [PagesController::class, 'about'])->name('pages.about');
Route::get('/download', [PagesController::class, 'download'])->name('pages.download');
Route::post('/book-now/book', [PagesController::class, 'servicesBook'])->name('pages.services_book');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');
Route::post('/contact/send', [PagesController::class, 'contactSend'])->name('pages.contact_send');
Route::get('/pet/types', [PagesController::class, 'getPetTypes'])->name('pages.pet-types');

Route::get('/redirect', [QRCodeController::class, 'redirect']);



Route::get('/thank-you', [PagesController::class, 'thankYou'])->name('pages.thank-you');


Route::get('/blog/articles', [PagesController::class, 'blog'])->name('pages.blog');
Route::get('/blog/show/{post_id}', [PagesController::class, 'blogShow'])->name('pages.blog.show');


Route::get('/account/login', [PagesController::class, 'login'])->name('pages.login');

Route::middleware(['auth'])->group(function () {

  Route::get('/payment/checkout/{order_id}', [PagesController::class, 'payment'])->name('pages.payment');
  Route::post('/payment/{order_id}', [PagesController::class, 'stripePost'])->name('payment.post');

  Route::get('/book-now/show/single/booking/{id}', [PagesController::class, 'services'])->name('pages.services');
  Route::get('/accounts/my-account', [AccountsController::class, 'myAccount'])->name('pages.my-account');
  Route::post('/add/pet', [PagesController::class, 'addPet'])->name('pages.add_pet');
  Route::get('/remove/pet/{id}', [PagesController::class, 'removePet'])->name('pages.remove_pet');

  Route::get('/remove/single/service/{id}', [PagesController::class, 'removeService'])->name('pages.remove_service');

});



Route::middleware(['auth', 'AdminChecker'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::get('/admin/orders/accept/{order_id}', [HomeController::class, 'orderAccept'])->name('admin.orders.accept');

  Route::get('/admin/orders/delete/single/{order_id}', [HomeController::class, 'orderDelete'])->name('admin.orders.delete');

  Route::get('/admin/orders/accepted', [HomeController::class, 'accepted'])->name('admin.orders.accepted');

  Route::get('/admin/messages', [HomeController::class, 'messages'])->name('admin.messages');
  Route::get('/admin/messages/delete/{message_id}', [HomeController::class, 'messagesDelete'])->name('admin.messages.delete');

  Route::get('/admin/faq', [HomeController::class, 'faq'])->name('admin.faq');
  Route::get('/admin/faq/delete/{faq_id}', [HomeController::class, 'faqDelete'])->name('admin.faq.delete');
  Route::get('/admin/faq/create', [HomeController::class, 'faqCreate'])->name('admin.faq.create');
  Route::post('/admin/faq/store', [HomeController::class, 'faqStore'])->name('admin.faq.store');

  Route::get('/admin/services', [HomeController::class, 'services'])->name('admin.services');
  Route::get('/admin/services/delete/{service_id}', [HomeController::class, 'servicesDelete'])->name('admin.services.delete');
  Route::get('/admin/services/create', [HomeController::class, 'servicesCreate'])->name('admin.services.create');
  Route::post('/admin/services/store', [HomeController::class, 'servicesStore'])->name('admin.services.store');
  Route::get('/admin/services/{service_id}/edit', [HomeController::class, 'servicesEdit'])->name('admin.services.edit');
  Route::post('/admin/services/{service_id}/update/single', [HomeController::class, 'servicesUpdate'])->name('admin.services.update');

  Route::get('/admin/blog', [HomeController::class, 'blog'])->name('admin.blog');
  Route::get('/admin/blog/delete/{blog_id}', [HomeController::class, 'blogDelete'])->name('admin.blog.delete');
  Route::get('/admin/blog/create', [HomeController::class, 'blogCreate'])->name('admin.blog.create');
  Route::get('/admin/blog/{blog_id}/edit', [HomeController::class, 'blogEdit'])->name('admin.blog.edit');
  Route::post('/admin/blog/{blog_id}/edit/single/update', [HomeController::class, 'blogUpdate'])->name('admin.blog.update');
  Route::post('/admin/blog/store', [HomeController::class, 'blogStore'])->name('admin.blog.store');
});
