<?php

use Illuminate\Support\Facades\Route;
use App\Events\testing;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('testing/{message}', function ($message) {
    event(new Testing($message));

    $data = [
        'status' => 'success',
        'message' => $message,
    ];

    return response()->json($data);
});
