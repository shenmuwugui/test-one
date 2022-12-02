<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//登录页面
Route::get('/',[\App\Http\Controllers\admin\LoginController::class,'index'])->name('login');
//登录
Route::post('login',[\App\Http\Controllers\admin\LoginController::class,'login'])->name('Login');

Route::middleware(['auth'])->group(function(){
    //添加页面
    Route::get('novel',[\App\Http\Controllers\admin\novelController::class,'novel']);
    //添加
    Route::post('add',[\App\Http\Controllers\admin\novelController::class,'add']);
    //展示
    Route::get('index',[\App\Http\Controllers\admin\novelController::class,'index']);
    //删除
    Route::get('del',[\App\Http\Controllers\admin\novelController::class,'del']);
    //修改前查询
    Route::get('upd',[\App\Http\Controllers\admin\novelController::class,'upd']);
    //修改
    Route::post('update',[\App\Http\Controllers\admin\novelController::class,'update']);
    //详情
    Route::get('lists',[\App\Http\Controllers\admin\novelController::class,'lists']);
});
