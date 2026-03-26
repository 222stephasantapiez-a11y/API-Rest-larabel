<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ProductController;
use App\Http\controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consultar', function (){
    $user = new App\Models\User();
    return dd($user->all());
});

Route::get('/insertar', function (){
    $user = new App\Models\User();
    $user->email = 'email@gmail.com';
    $user->name = 'Ejemplo 2';
    $user->password = "mypassword";
    $user->save();
    return dd($user);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productos', [App\Http\Controllers\ProductController::class, "index"])->name('products.list');

Route::get('/checkout', function(){
    return view('checkout');
    return view('checkout', compact('products'));
});

Route::post("/checkout", [OrderController::class,"store"]);

