<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Backend\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


//<----------------webSite---------------->
Route::get('/', [WebsiteController::class, 'webSiteView'])->name('web.home');

//<----------------Admin---------------->
Route::prefix('admin')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('admin.dashboard');
        Route::get('/blank','blank')->name('admin.blank');
        Route::get('/formdesign', 'formDesign')->name('admin.formdesign');
    });
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
