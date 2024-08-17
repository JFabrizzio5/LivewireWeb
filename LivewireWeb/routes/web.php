<?php

use Illuminate\Support\Facades\Route;
use App\Events\testing;

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('testing', function () {
    event(new testing);
    $data = [
        'status' => 'success',
        'message' => 'Aun asi brilla nuestro azul',
    ];
    return response()->json($data);
});
