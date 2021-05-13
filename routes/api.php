<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\CurrentPlayerController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EarnedController;
use App\Http\Controllers\ClassicController;
use App\Http\Controllers\OtherNameController;
use App\Http\Controllers\RetiredNumberController;
use App\Http\Controllers\HistoricPlayerController;

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

Route::middleware('api')->group(function() {
    Route::resource('teams', TeamController::class);
    Route::resource('icon_colors', IconController::class);
    Route::resource('current_players', CurrentPlayerController::class);
    Route::resource('association_colors', AssociationController::class);
    Route::resource('statement_colors', StatementController::class);
    Route::resource('city_colors', CityController::class);
    Route::resource('earned_colors', EarnedController::class);
    Route::resource('classic_colors', ClassicController::class);
    Route::resource('other_names', OtherNameController::class);
    Route::resource('retired_numbers', RetiredNumberController::class);
    Route::resource('historic_players', HistoricPlayerController::class);
});
