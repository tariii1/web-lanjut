<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DocumentationFileController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/Profile', [ProfileController::class, 'Profile']);
Route::get('/Kontak', [KontakController::class, 'Kontak']);
Route::get('/Donasi', [DonasiController::class, 'Donasi']);
Route::get('/Donasi/create', [DonasiController::class, 'create'])->name('donation.create');
Route::post('/donation', [DonasiController::class, 'store'])->name('donation.store');
Route::resource('campaign', CampaignController::class);

Route::get('/documentations', [DocumentationFileController::class, 'index']);
Route::post('/documentations', [DocumentationFileController::class, 'store']);


