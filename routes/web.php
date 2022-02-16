<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\FacilitieController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('scraper', [ScraperController::class,'scraper'])->name('scraper');
Route::get('scraperdetails', [ScraperController::class,'scraperdetails'])->name('scraperdetails');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::prefix("admin")->middleware(['auth'])->group(function(){    
    Route::get("/",[HomeController::class,'index'])->name('home.index'); 
    // Route::post("/home/create",[HomeController::class,'index'])->name('home.store'); 
    Route::resource("home",HomeController::class);
    Route::get("home/{id}/delete",[HomeController::class,'destroy'])->name("home.delete");

    Route::resource("image",ImageController::class);
    Route::get("image/{id}/delete",[ImageController::class,'destroy'])->name("image.delete");

    Route::resource("facilitie",FacilitieController::class);
    Route::get("facilitie/{id}/delete",[FacilitieController::class,'destroy'])->name("facilitie.delete");

    // Route::get("/ww",[HomeController::class,'index']); 

});  
require __DIR__.'/auth.php';
