<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TranslationTagController;
use App\Http\Controllers\TranslationController;

Route::get('/test', function () {
    return 'API route works!';
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('languages', LanguageController::class);
    
    Route::apiResource('translation-tags', TranslationTagController::class);
    Route::apiResource('translations', TranslationController::class);

    // Extra routes for search & export on translations
    Route::get('translations/search', [TranslationController::class, 'search']);
    Route::get('translations/test', [TranslationController::class, 'test']);
    Route::get('translations/export/json', [TranslationController::class, 'exportJson']);
    Route::get('translations/search/data', [TranslationController::class, 'search']);
});
