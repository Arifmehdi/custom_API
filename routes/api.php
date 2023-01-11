<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//method get api for fetch category

Route::get('/categories/view/{id?}',[ApiController::class,'showcategory']);

//method post api for add category
Route::post('/categories/add',[ApiController::class,'addcategory']);

//method post api for add multiple category
Route::post('/categories/add/mutiple',[ApiController::class,'addMultipleCategory']);

//method put api for update category details
Route::put('/categories/update/{id}',[ApiController::class,'updateCategoryDetails']);

//method patch api for update single field or record details

// remind that put method update like delete and replace but patch replace only desire column field |
// on the other hand put  sysytem right all field but patch sysytem need wrtite desire fields....
Route::patch('/categories/single-record-update/{id}',[ApiController::class,'updateSingleCategoryDetails']);


//method delete api for delete category details
Route::delete('/categories/delete/{id}',[ApiController::class,'deleteCategory']);

//method delete api for with json delete category details
Route::delete('/categories/json',[ApiController::class,'jsonDeleteCategory']);

//method delete api for delete multiple category details with param 
Route::delete('/categories/delete/multiple/{ids}',[ApiController::class,'deleteMultipleCategory']);

//method delete api for delete multiple category details with json 
Route::delete('/categories/deleteMultipleJson',[ApiController::class,'jsonDeleteMultipleCategory']);




// ============================================secure process with jwt=============================

//method delete api for delete multiple category details with json 
Route::delete('/categories/deleteMultipleJsonWithJWT',[ApiController::class,'jsonDeleteMultipleCategoryWithJWT']);