<?php

use App\Http\Controllers\Dashboard\ChildController;
use App\Http\Controllers\Dashboard\DoseController;
use App\Http\Controllers\Dashboard\VaccinationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {

    Route::resource('/Vaccination',VaccinationController::class);
    
    Route::resource('/Childrens',ChildController::class);

    Route::get('/check-dose',[ChildController::class, 'checkDose']);
});



require __DIR__.'/auth.php';
