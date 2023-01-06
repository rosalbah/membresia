<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmpleoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ModoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('modos', ModoController::class)->except('show')->names('admin.modos');

Route::resource('empleos', EmpleoController::class)->except('show')->names('admin.empleos');