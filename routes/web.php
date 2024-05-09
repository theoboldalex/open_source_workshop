<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/add/{a}/{b}', [CalculatorController::class, 'add']);
