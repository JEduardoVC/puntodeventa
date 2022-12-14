<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BussinessController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');


});
Route::resource("categories",CategoryController::class)->names("categories");
Route::resource("clients",ClientController::class)->names("clients");
Route::resource("products",ProductController::class)->names("products");
Route::resource("providers",ProviderController::class)->names("providers");
Route::resource("purchases",PurchaseController::class)->names("purchases")->except(['edit', 'update', 'destroy']);
Route::resource("sales",SaleController::class)->names("sales")->except(['edit', 'update', 'destroy']);
Route::resource("bussinesses",BussinessController::class)->names("bussinesses")->only(["index","update"]);
Route::resource("printers",PrinterController::class)->names("printers")->only(["index","update"]);

Route::resource("users",UserController::class)->names("users");
Route::resource("roles",RoleController::class)->names("roles");

Route::get("purchases/pdf/{purchase}",[PurchaseController::class,"pdf"])->name("purchases.pdf");
Route::get("sales/pdf/{sale}",[SaleController::class,"pdf"])->name("sales.pdf");

Route::get("purchases/upload/{purchase}", [PurchaseController::class,"upload"])->name("upload.purchases");
Route::get("change_status/products/{product}",[ProductController::class,"change_status"])->name("change.status.products");
Route::get("change_status/purchases/{purchase}",[PurchaseController::class,"change_status"])->name("change.status.purchases");
Route::get("change_status/sales/{sale}",[SaleController::class,"change_status"])->name("change.status.sales");

Route::get("get_products_by_barcode",[ProductController::class,"get_products_by_barcode"])->name("get_products_by_barcode");
Route::get("get_products_by_id",[ProductController::class,"get_products_by_id"])->name("get_products_by_id");

Route::get("sales/reports_day",[SaleController::class,"reports_day"])->name("reports.day");
Route::get("sales/reports_date",[SaleController::class,"reports_date"])->name("reports.date");

Route::post("sales/reports_day",[SaleController::class,"report_results"])->name("report.results");

require __DIR__.'/auth.php';
