<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::post('/hello', function(Request $request) {
    return response()->json([
        'message' => 'Hello World',
        'data' => $request->all()
    ]);
});

Route::middleware('throttle:6,1')->get('/db-test', function () {
    $users = DB::table('users')->get();
    return $users;
});

Route::post('/add-user', function(Request $request) {
    // Validate input
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
    ]);

    // Insert into users table
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password'=>$request->password,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json(['message' => 'User added successfully']);
});
