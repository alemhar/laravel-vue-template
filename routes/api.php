<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AppointmentStatusController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardStatController;
use App\Http\Controllers\Admin\ProfileController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('guest')->group(
    function () {
        $limiter = config('fortify.limiters.login');
        Route::post('/auth/token', [AuthTokenController::class, 'store'])->middleware(
            array_filter([$limiter ? 'throttle:' . $limiter : null])
        );
    }
);


// Route::middleware('auth:sanctum')->group(
//     function () {

//         // Route::delete('/auth/token', [AuthTokenController::class, 'destroy']);

//         // Route::get('/me', [UserController::class, 'me']);
//         // Route::get('/user/sessions', [OtherBrowserSessionsController::class, 'index']);
//         // Route::post('/user/sessions/purge', [OtherBrowserSessionsController::class, 'destroy']);

//         // Route::get('/tickets', [TicketController::class, 'index']);
//     }
// );

    Route::get('/heartbeat', function () {
        return response()->json(['status' => 'alive']);
    });

    

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/me', [UserController::class, 'me']);
        
        Route::get('/api/stats/appointments', [DashboardStatController::class, 'appointments']);
        Route::get('/api/stats/users', [DashboardStatController::class, 'users']);

        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::patch('/users/{user}/change-role', [UserController::class, 'changeRole']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destory']);
        Route::delete('/users', [UserController::class, 'bulkDelete']);

        Route::get('/api/clients', [ClientController::class, 'index']);

        Route::get('/api/settings', [SettingController::class, 'index']);
        Route::post('/api/settings', [SettingController::class, 'update']);

        Route::get('/api/profile', [ProfileController::class, 'index']);
        Route::put('/api/profile', [ProfileController::class, 'update']);
        Route::post('/api/upload-profile-image', [ProfileController::class, 'uploadImage']);
        Route::post('/api/change-user-password', [ProfileController::class, 'changePassword']);
    });

    