<?php

use App\Http\Controllers\admin\adminmaincontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\admin\productattributecontroller;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\admin\productdiscountattributecontroller;
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\usermaincontroller;
use App\Http\Controllers\vendor\storecontroller;
use App\Http\Controllers\vendor\vendormaincontroller;
use App\Http\Controllers\vendor\vendorproductcontroller;
use App\Http\Controllers\vendor\vendorstorecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



//admin routes
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
  Route::prefix('admin')->group(function(){
      Route::controller(adminmaincontroller::class)->group(function(){
          Route::get('/dashboard','index')->name('admin');
          Route::get('/settings','settings')->name('admin.settings');
          Route::get('/manage/users','manage_user')->name('admin.manage.user');
          Route::get('/manage/stores','manage_stores')->name('admin.manage.store');
          Route::get('/cart/history','cart_history')->name('admin.cart.history');
          Route::get('/order/history','order_history')->name('admin.order.history');
      });

      Route::controller(categorycontroller::class)->group(function(){
          Route::get('/category/create','index')->name('category.create');
          Route::get('/category/manage','manage')->name('category.manage');
          
      });

       Route::controller(subcategorycontroller::class)->group(function(){
          Route::get('/subcategory/create','index')->name('subcategory.create');
          Route::get('/subcategory/manage','manage')->name('subcategory.manage');
      
      });

      Route::controller(productcontroller::class)->group(function(){
          Route::get('/product/manage','index')->name('product.manage');
          Route::get('/product/review/manage','review_manage')->name('product.review.manage');
      
      });
      
      Route::controller(productattributecontroller::class)->group(function(){
          Route::get('/productattribute/create','index')->name('productattribute.create');
          Route::get('/productattribute/manage','manage')->name('productattribute.manage');
      
      });

      Route::controller(productdiscountattributecontroller::class)->group(function(){
          Route::get('/discount/create','index')->name('discount.create');
          Route::get('/discount/manage','manage')->name('discount.manage');
      
      });
  });
});


//vendor routes
Route::middleware(['auth', 'verified','rolemanager:vendor'])->group(function () {
   Route::prefix('vendor')->group(function () {
    Route::controller(vendormaincontroller::class)->group(function () {
      Route::get('/dashboard','index')->name('vendor.');
      Route::get('/order/history','orderhistory')->name('vendor.order.history');

      });
    Route::controller(vendorstorecontroller::class)->group(function () {
      Route::get('/store/create','index')->name('vendor.store');
      Route::get('/store/manage','manage')->name('vendor.store.manage');

      });
    Route::controller(vendorproductcontroller::class)->group(function () {
      Route::get('/product/create','index')->name('vendor.product');
      Route::get('/product/manage','manage')->name('vendor.product.manage');

      });    
   });
});


//user routes
Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
   Route::prefix('user')->group(function () {
    Route::controller(usermaincontroller::class)->group(function () {
      Route::get('/dashboard','index')->name('dashboard');
      Route::get('/order/history','history')->name('user.history');
      Route::get('/setting/payment','payment')->name('user.payment');
      Route::get('/affiliate','affiliate')->name('user.affiliate');
     

      });
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
