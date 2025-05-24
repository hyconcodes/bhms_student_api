<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/matric/{matric}', [StudentController::class, 'getByMatric']);
Route::get('/students/email/{email}', [StudentController::class, 'getByEmail']);
Route::get('/students/department/{department}', [StudentController::class, 'getByDepartment']);
Route::get('/students/level/{level}', [StudentController::class, 'getByLevel']);
Route::get('/students/year-of-study/{year_of_study}', [StudentController::class, 'getByYearOfStudy']);
Route::post('/students', [StudentController::class, 'store']);
