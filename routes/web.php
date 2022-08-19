<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

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
    $user = User::all();
    return view('welcome', ['user' => $user]);
});



//pdf
Route::get('/getpdfuser', [PdfController::class, 'generatePDF'])->name('pdf');

//excel
Route::post('/import', [UserController::class, 'import']);
Route::get('export', [UserController::class, 'export'])->name('export');
