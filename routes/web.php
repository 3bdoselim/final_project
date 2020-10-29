<?php

use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchSectionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BranchOrderController;
use App\Http\Controllers\BranchOrderDetailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeePhotoController;
use App\Models\Branch;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view("/" , "dashboard")->middleware(['auth', 'auth.admin']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view("/dashboard" , "dashboard")->middleware(['auth', 'auth.admin']);

Route::resource('products', ProductController::class)->middleware(['auth', 'auth.admin']);
Route::resource('categories', CategoryController::class)->middleware(['auth', 'auth.admin']);
Route::resource('sections', SectionController::class)->middleware(['auth', 'auth.admin']);
Route::resource('sizes', SizeController::class)->middleware(['auth', 'auth.admin']);
Route::resource('colors', ColorController::class)->middleware(['auth', 'auth.admin']);


Route::prefix("/users")->middleware(['auth','auth.admin'])->group(function(){
    Route::get("/", [UserController::class,"index"])->name("users.index");
    Route::get("/{user}/edit", [UserController::class,"edit"])->name("users.edit");
    Route::put("/{user}", [UserController::class,"update"]);
    Route::get("/create", [UserController::class,"create"])->name("users.create");
    Route::post("/create", [UserController::class,"store"]);
    Route::delete("/{user}", [UserController::class,"destroy"]);
});

Route::resource('customers', CustomerController::class)->middleware(['auth', 'auth.admin']);
Route::resource('jobs', JobController::class)->middleware(['auth', 'auth.admin']);
Route::resource('branches', BranchController::class)->middleware(['auth', 'auth.admin']);
Route::resource('employees', EmployeeController::class)->middleware(['auth', 'auth.admin']);


Route::prefix("/branchsections/{brnch}")->middleware(['auth','auth.admin'])->group(function(){
    Route::get("/", [BranchSectionController::class,"index"])->name("branchsections.index");
    Route::post("/create", [BranchSectionController::class,"store"]);
});
Route::put("/branches/{brnch}/branchsections/{branchSection}", [BranchSectionController::class,"update"])->middleware(['auth','auth.admin']);
Route::get("/branches/{brnch}/branchsections/{branchSection}/edit", [BranchSectionController::class,"edit"])->middleware(['auth','auth.admin'])->name("branchsections.edit");
Route::delete("/branches/{brnch}/branchsections/{branchSection}", [BranchSectionController::class,"destroy"])->middleware(['auth','auth.admin']);

Route::prefix("/branchorders/{brnch}")->middleware(['auth','auth.admin'])->group(function(){
    Route::get("/", [BranchOrderController::class,"index"])->name("branchorders.index");
    Route::post("/create", [BranchOrderController::class,"store"]);
});
Route::put("/branches/{brnch}/branchorders/{branchOrder}", [BranchOrderController::class,"update"])->middleware(['auth','auth.admin']);
Route::get("/branches/{brnch}/branchorders/{branchOrder}/edit", [BranchOrderController::class,"edit"])->middleware(['auth','auth.admin'])->name("branchorders.edit");
Route::delete("/branches/{brnch}/branchorders/{branchOrder}", [BranchOrderController::class,"destroy"])->middleware(['auth','auth.admin']);



Route::prefix("/branchorderdetails/{brnch}")->middleware(['auth','auth.admin'])->group(function(){
    Route::get("/", [BranchOrderDetailController::class,"index"])->name("branchorderdetails.index");
    Route::post("/create", [BranchOrderDetailController::class,"store"]);
});
Route::put("/branchorders/{brnch}/branchorderdetails/{branchOrderDetail}", [BranchOrderDetailController::class,"update"])->middleware(['auth','auth.admin']);
Route::get("/branchorders/{brnch}/branchorderdetails/{branchOrderDetail}/edit", [BranchOrderDetailController::class,"edit"])->middleware(['auth','auth.admin'])->name("branchorderdetails.edit");
Route::delete("/branchorders/{brnch}/branchorderdetails/{branchOrderDetail}", [BranchOrderDetailController::class,"destroy"])->middleware(['auth','auth.admin']);


Route::prefix("/employee/images")->middleware(['auth','auth.admin'])->group(function(){
    route::get("{employee}/manage",[EmployeePhotoController::class,"create"]);
    route::post("{employee}",[EmployeePhotoController::class,"store"]);
    route::delete("remove/{employeePhoto}",[EmployeePhotoController::class,"destroy"]);
});