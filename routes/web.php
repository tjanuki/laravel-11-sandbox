<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    User::where('id', 1)->toSql();
    return view('welcome');
});
