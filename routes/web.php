<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Models\User;


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']], function(){
    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login', [AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

//admin route
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('admin.change.password');

//admin brand all route 
Route::prefix('brand')->group(function()
{
   Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
   Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
   Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
   Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
   Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

//admin category all routes 
Route::prefix('category')->group(function()
{
   Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
   Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
   Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
   Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
   Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

   //admin sub category routes

   Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
   Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
   Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
   Route::post('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
   Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

});

//user all route
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');
