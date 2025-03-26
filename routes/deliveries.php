<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deliveries\LpdController;
use App\Http\Controllers\Deliveries\SpiController;

Route::prefix('deliveries')->group(function () {
    Route::prefix('lpds')->group(function () {
        Route::get('all', [LpdController::class, 'all'])->name('lpds.all');
        Route::get('check-duplication', [LpdController::class, 'checkDuplication'])->name('lpds.checkDuplication');
        Route::get('data', [LpdController::class, 'data'])->name('lpds.data');
        Route::get('ready-to-send', [LpdController::class, 'readyToSendData'])->name('lpds.readyToSendData');
        Route::get('/', [LpdController::class, 'search'])->name('lpds.search');
        Route::post('/', [LpdController::class, 'store'])->name('lpds.store');
        Route::get('/{id}', [LpdController::class, 'getById'])->name('lpds.getById');
        Route::put('/{id}', [LpdController::class, 'update'])->name('lpds.update');
        Route::delete('/{id}', [LpdController::class, 'destroy'])->name('lpds.destroy');
        Route::get('print/{id}', [LpdController::class, 'print'])->name('lpds.print');
        
        // Additional routes for document management within LPDs
        Route::get('/{id}/documents', [LpdController::class, 'getAdditionalDocuments'])->name('lpds.getAdditionalDocuments');
        Route::post('/{id}/documents', [LpdController::class, 'addAdditionalDocuments'])->name('lpds.addAdditionalDocuments');
        Route::delete('/{id}/documents/{document_id}', [LpdController::class, 'removeAdditionalDocument'])->name('lpds.removeAdditionalDocument');
    });

    Route::prefix('spis')->group(function () {
        Route::get('all', [SpiController::class, 'all'])->name('spis.all');
        Route::get('check-duplication', [SpiController::class, 'checkDuplication'])->name('spis.checkDuplication');
        Route::get('data', [SpiController::class, 'data'])->name('spis.data');
        Route::get('/', [SpiController::class, 'search'])->name('spis.search');
        Route::post('/', [SpiController::class, 'store'])->name('spis.store');
        Route::get('/{id}', [SpiController::class, 'getById'])->name('spis.getById');
        Route::put('/{id}', [SpiController::class, 'update'])->name('spis.update');
        Route::delete('/{id}', [SpiController::class, 'destroy'])->name('spis.destroy');
        Route::get('print/{id}', [SpiController::class, 'print'])->name('spis.print');
        
        // Additional routes for invoice management within SPIs
        Route::get('/{id}/invoices', [SpiController::class, 'getInvoices'])->name('spis.getInvoices');
        Route::post('/{id}/invoices', [SpiController::class, 'addInvoices'])->name('spis.addInvoices');
        Route::delete('/{id}/invoices/{invoice_id}', [SpiController::class, 'removeInvoice'])->name('spis.removeInvoice');
    });
});