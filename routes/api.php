<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user_profile', [AuthController::class, 'userProfile']);       
});

Route::group(['middleware'=>'auth:api'], function() {
    Route::post('save_user_info', [AuthController::class, 'saveUserInfo']); 

    Route::resource('movie', 'MovieController');
    Route::get('/movie/restore/{id}',['uses' => 'MovieController@restore', 'as' => 'movie.restore']);
    Route::post('/movie/actor_role',['uses' => 'MovieController@addActorRole', 'as' => 'movie.addActorRole']);

    Route::resource('actor', 'ActorController');
    Route::get('/actor/restore/{id}',['uses' => 'ActorController@restore', 'as' => 'actor.restore']);

    Route::resource('producer', 'ProducerController');
    Route::get('/producer/restore/{id}',['uses' => 'ProducerController@restore', 'as' => 'producer.restore']);
    
    Route::resource('genre', 'GenreController');
    
    Route::resource('certificate', 'CertificateController');
    
    Route::resource('role', 'RoleController');
});



