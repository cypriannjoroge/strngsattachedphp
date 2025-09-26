<?php

use App\Livewire\HomepageComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\user\usermaincontroller;
use App\Http\Controllers\admin\categorycontroller;
use App\Http\Controllers\mastercategorycontroller;
use App\Http\Controllers\admin\adminmaincontroller;
use App\Http\Controllers\admin\subcategorycontroller;
use App\Http\Controllers\Mastersubcategorycontroller;
use App\Http\Controllers\vendor\vendormaincontroller;
use App\Http\Controllers\vendor\vendorstorecontroller;
use App\Http\Controllers\vendor\vendorproductcontroller;
use App\Http\Controllers\admin\productattributecontroller;
use App\Http\Controllers\admin\productdiscountattributecontroller;

Route::get('/', HomepageComponent::class)->name('homepage');

// Flash Sale / Products Page
Route::get('/products', function () {
    return view('products.index'); // resources/views/products/index.blade.php
})->name('products.index');



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
          Route::post('/defaultattribute/create','createattribute')->name('attribute.create');
          Route::get('/defaultattribute/{id}','showattribute')->name('show.attribute');
          Route::put('/defaultattribute/update/{id}','updateattribute')->name('update.attribute');
          Route::delete('/defaultattribute/delete/{id}','deleteattribute')->name('delete.attribute');
      
      });

      Route::controller(productdiscountattributecontroller::class)->group(function(){
          Route::get('/discount/create','index')->name('discount.create');
          Route::get('/discount/manage','manage')->name('discount.manage');
      
      });

      Route::controller(mastercategorycontroller::class)->group(function(){
          Route::post('/store/category','storecat')->name('store.cat');
          Route::get('/category/{id}','showcat')->name('show.cat');
          Route::put('/category/update/{id}','updatecat')->name('update.cat');
          Route::delete('/category/delete/{id}','deletecat')->name('delete.cat');
      });

      Route::controller(Mastersubcategorycontroller::class)->group(function(){
        Route::post('/store/subcategory','storesubcat')->name('store.subcat');
        Route::get('/subcategory/{id}','showsubcat')->name('show.subcat');
        Route::put('/subcategory/update/{id}','updatesubcat')->name('update.subcat');
        Route::delete('/subcategory/delete/{id}','deletesubcat')->name('delete.subcat');
    });
  });
});


//vendor routes
Route::middleware(['auth', 'verified','rolemanager:vendor'])->group(function () {
   Route::prefix('vendor')->group(function () {
    Route::controller(vendormaincontroller::class)->group(function () {
      Route::get('/dashboard','index')->name('vendor.dashboard');
      Route::get('/order/history','orderhistory')->name('vendor.order.history');

      });
    Route::controller(vendorstorecontroller::class)->group(function () {
      Route::get('/store/create','index')->name('vendor.store');
      Route::get('/store/manage','manage')->name('vendor.store.manage');
      Route::post('/store/publish','store')->name('create.store');
      Route::put('/store/update/{id}','updatestore')->name('update.store');
      Route::delete('/store/delete/{id}','deletestore')->name('delete.store');
      });
      
    Route::controller(vendorproductcontroller::class)->group(function () {
      Route::get('/product/create','index')->name('vendor.product');
      Route::get('/product/manage','manage')->name('vendor.product.manage');
      Route::post('/product/store','storeproduct')->name('vendor.product.store');
      Route::delete('/product/delete/{id}','deleteproduct')->name('vendor.delete.product');
      });    
   });
});


//user routes
Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
   Route::prefix('user')->group(function () {
    Route::controller(usermaincontroller::class)->group(function () {
      Route::get('/dashboard','index')->name('user.dashboard');
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
