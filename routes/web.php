<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/admin/login',[\App\Http\Controllers\DGAadmin\HomeController::class,'login'])->name('adminlogin');
Route::post('admin/logincheck',[\App\Http\Controllers\DGAadmin\HomeController::class,'logincheck'])->name('logincheck');
Route::get('logout',[\App\Http\Controllers\DGAadmin\HomeController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function (){

Route::get('/admin',[\App\Http\Controllers\DGAadmin\HomeController::class,'index'])->name('admin');
Route::get('/admin/dgahunter',[\App\Http\Controllers\DGAadmin\HomeController::class,'dgahunter'])->name('dgahunter');




Route::get('/admin/data',[\App\Http\Controllers\DGAadmin\ScraperController::class,'deneme'])->name('data');
Route::get('/admin/scantable',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scantable'])->name('scantable');


Route::get('/admin/newscan',[\App\Http\Controllers\DGAadmin\ScraperController::class,'newscan'])->name('newscan');
Route::post('/admin/newscan/scanning',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scanning'])->name('scanning');
// spiderfoot  / dizini (root)
Route::get('/admin/scans/',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scans'])->name('scans');
Route::post('/admin/groupedlink/',[\App\Http\Controllers\DGAadmin\ScraperController::class,'groupedlink'])->name('groupedlink');
Route::get('/admin/scandetail/{scanid}/{type}/{scanname}',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scandetail'])->name('scandetail');
Route::post('/admin/scandetaillist/',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scandetaillist'])->name('scandetaillist');
Route::get('/admin/scandetailresults/{scanid}/{eventType}',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scandetailresults'])->name('scandetailresults');


Route::get('/admin/scanstop/{scanid}',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scanstop'])->name('scanstop');
Route::get('/admin/scandelete/{scanid}',[\App\Http\Controllers\DGAadmin\ScraperController::class,'scandelete'])->name('scandelete');
Route::get('/admin/rerun/{scanid}',[\App\Http\Controllers\DGAadmin\ScraperController::class,'rerun'])->name('rerun');


Route::get('/admin/summary',[\App\Http\Controllers\DGAadmin\ScraperController::class,'summary'])->name('summary');

});
