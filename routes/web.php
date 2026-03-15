<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeSupplyController;

Route::get('/', function () {
    return redirect()->route('CoffeeSupplys.index');
});

Route::resource('CoffeeSupplys', CoffeeSupplyController::class);
