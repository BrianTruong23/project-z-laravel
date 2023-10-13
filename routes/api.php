<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
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



// Route::post('/projects', [ProjectController::class, 'store']);

# Public Routes 
// Route::resource('projects', ProjectController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('projects/search/{name}', [ProjectController::class, 'search']);
Route::get('projects/search/{id}', [ProjectController::class, 'show']);

// Testing purposes of deleting all
Route::delete('projects/deleteall}', [ProjectController::class, 'destroy_all']);


 # Protected Routes 
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




// Route::post('/projects', function(){
//     return Project::create([
//         'name' => 'Bitcoin',
//         'description' => 'Bitcoin is cool',
//         'skill_required' => 'advanced',
//         'location' => 'Austin',

//     ]);
// });