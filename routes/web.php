<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'redirect']);


Route::get('/redirect',[AdminController::class,'redirect']);

Route::get('/add_task',[AdminController::class,'add_task']);

Route::post('/create_task',[AdminController::class,'create_task']);

Route::get('/view_tasks',[AdminController::class,'view_tasks']);

Route::get('/edit_task/{id}',[AdminController::class,'edit_task']);

Route::post('/update_task/{id}',[AdminController::class,'update_task']);

Route::get('/delete_task/{id}',[AdminController::class,'delete_task']);

Route::get('/sorted_tasks',[AdminController::class,'sorted_tasks']);

Route::get('/projects',[AdminController::class,'projects']);

Route::post('/create_project',[AdminController::class,'create_project']);

Route::get('/view_projects',[AdminController::class,'view_projects']);


Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/reorder', [TaskController::class, 'reorder']);
