<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db-check', function () {
    $default = config('database.default');
    $connection = config("database.connections.$default");
    return response()->json([
        'default_connection' => $default,
        'connection_details' => $connection,
    ]);
});

Route::get('/hash', function () {
    $plainPassword = 'abc123';
    $hashedPassword = Hash::make($plainPassword);

    return response()->json(['hash' => $hashedPassword]);
});