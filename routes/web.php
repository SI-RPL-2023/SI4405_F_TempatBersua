<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestoController;
use App\Models\User;
use App\Models\resto;
use App\Charts\RestoChart;
use Illuminate\Support\Facades\Http;

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
    return view('homepage');
});

Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'store']);
Route::get('/login',[UserController::class,'loginPage']);
Route::post('/login',[UserController::class,'login']);
Route::post('/kuesioner',[UserController::class,'kuesioner']);
Route::put('/logout/{id}', [UserController::class, 'logout']);
Route::get('/profile',[UserController::class,'profile']);
Route::put('/update/{id}', [UserController::class, 'update']);

// Admin
Route::get('/admin', function (RestoChart $chart) {
    $user = User::where('status', 'logged in')->get();
    $resto = resto::where('status', 'approved')->get();
    $restoBayar = resto::where('status', 'approved')->where('category','berbayar')->get();
    $waiting = Resto::where('status', 'waiting')->get();
    $url = "https://kanglerian.github.io/api-wilayah-indonesia/api/districts/3273.json";
    $data = json_decode(file_get_contents($url), true);

    return view('adminPage',compact('user','data','resto','waiting','restoBayar'), ['chart' => $chart->build()]);
});
Route::post('/addAdmin',[UserController::class,'storeAdmin']);


// Iklan
Route::post('/iklanAdmin',[RestoController::class,'store']);
Route::post('/updateResto/{id}',[RestoController::class,'update']);
Route::get('/foryou',[RestoController::class, 'index']);
Route::get('/foryou/{district}',[RestoController::class, 'indexDistrict']);
Route::get('/formIklan',[RestoController::class, 'formIklan']);
Route::post('/userIklan',[RestoController::class, 'storeUser']);
Route::post('/ubahStatusPost/{id}', [RestoController::class,'ubahStatusPost']);
Route::post('/ubahStatusDecline/{id}', [RestoController::class,'ubahStatusDecline']);
Route::delete('/deleteResto/{id}',[RestoController::class,'deleteResto']);

// Rsto
Route::get('/detail/{id}', [RestoController::class, 'showDetail']);
Route::get('/explore', [RestoController::class, 'show']);
Route::get('/like', [RestoController::class, 'showLike']);
Route::post('/liked/{id}',[RestoController::class, 'like']);
Route::delete('/unliked/{id}',[RestoController::class, 'unlike']);
Route::post('/detail/review/{id}',[RestoController::class, 'addReview']);
Route::post('/kunjungan/{id}',[RestoController::class, 'total_klik']);





