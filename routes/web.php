<?php

use App\Livewire\Project\Edit as ProjectEdit;
use App\Livewire\Stack\Edit as StackEdit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('project')
    ->name('project.')
    ->group(function () {
        Route::get('edit/{slug?}', ProjectEdit::class)->name('edit');

    });

Route::prefix('stack')
    ->name('stack.')
    ->group(function () {
        Route::get('edit/{slug?}', StackEdit::class)->name('edit');
    });
