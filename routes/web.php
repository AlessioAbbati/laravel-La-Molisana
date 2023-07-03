<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\PastaController;



Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// rotte della risorsa pasta

// route::get('/pastas', [PastaController::class, 'index'])->name('pastas.index');
// route::get('/pastas/{pasta}', [PastaController::class, 'show'])->name('pastas.show');
// route::get('/pastas/create', [PastaController::class, 'create'])->name('create.store');
// route::get('/pastas/{pasta}edit', [PastaController::class, 'edit'])->name('pastas.edit');
// route::post('/pastas', [PastaController::class, 'store'])->name('pastas.store');
// route::put('/pastas/{pasta}', [PastaController::class, 'update'])->name('pastas.update');
// route::delete('/pastas/{pasta}', [PastaController::class, 'destroy'])->name('pastas.destroy');


route::get('/pastas/trashed', [PastaController::class, 'trashed'])->name('pastas.trashed');

route::resource('pastas', PastaController::class);
route::delete('/pastas/{pasta}/hardDelete', [PastaController::class, 'hardDelete'])->name('pastas.hardDelete');
route::post('/pastas/{pasta}/restore', [PastaController::class, 'restore'])->name('pastas.restore');
