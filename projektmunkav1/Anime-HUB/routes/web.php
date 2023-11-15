<?php

use Illuminate\Support\Facades\Route;
// web.php vagy routes/web.php

use App\Http\Controllers\YourController;

Route::get('/redirectToAnotherPage', [YourController::class, 'redirectToPage']);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/Animes', function () {
    return view('Animes');
});
Route::get('/latest', function () {
    return view('latest');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    return view('logout');
});
Route::get('/mylist', function () {
    return view('mylist');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/account', function () {
    return view('account');
});
Route::get('/anime_page', function () {
    return view('anime_page');
});