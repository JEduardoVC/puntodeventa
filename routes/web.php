<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("categories",CategoryController::class)->names("categories");
Route::resource("clients",ClientController::class)->names("clients");
Route::resource("products",ProductController::class)->names("products");
Route::resource("providers",ProviderController::class)->names("providers");
Route::resource("purchases",PurchaseController::class)->names("purchases");
Route::resource("sales",SaleController::class)->names("sales");

Route::get("/prueba",function() {
    return view("prueba");
});
