<?php 

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('student',[StudentController::class,'index']);
Route::post('student',[StudentController::class,'store']);
// Route::get('student',function (){
//     return 'hello this is a cate';
// });
//Route::apiResource('/api/task',TaskController::class);
