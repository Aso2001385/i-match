<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\RecruitSkillController;
use App\Http\Controllers\RecruitUserController;
use App\Http\Controllers\SkillCategoryController;
use App\Http\Controllers\SkillRequestController;
use App\Http\Controllers\SKillsRequestTeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InformationCategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomUserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/ac',[UserController::class,'access']); //T

//ユーザー機能
Route::apiResource('users', UserController::class);
Route::put('/user/password',[UserController::class, 'passUpdate']); // U

Route::apiResource('user-skill', UserSkillController::class);

//スキル機能
Route::apiResource('skills', SkillController::class);

Route::apiResource('skill-category',SkillCategoryController::class);


Route::apiResource('skill-requests',SkillRequestController::class);

Route::apiResource('skill-request-teacher',SKillsRequestTeacherController::class);

//募集機能
Route::apiResource('recruits', RecruitController::class);
Route::get('recruits/other/{id}', [RecruitController::class,'otherIndex']);
Route::get('recruits/history/{id}',[RecruitController::class,'history']);

Route::get('search/skill',[RecruitController::class,'search']);
Route::post('search/skill',[RecruitController::class,'skillSearch']);

Route::apiResource('recruit-skill',RecruitSkillController::class);

Route::apiResource('recruit-user',RecruitUserController::class);

//お知らせ機能
Route::apiResource('informations',InformationController::class);

Route::apiResource('information-category',InformationCategoryController::class);

//教師機能
Route::apiResource('teachers', TeacherController::class);
Route::put('/teacher/password',[TeacherController::class,'passUpdate']);

Route::apiResource('events', EventController::class);

//チャット機能
Route::apiResource('chats',ChatController::class);

Route::apiResource('rooms',RoomController::class);

Route::apiResource('room-user',RoomUserController::class);

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/auth', [AuthController::class, 'restore']);
