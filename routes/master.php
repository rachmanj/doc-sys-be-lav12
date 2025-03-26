<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\SupplierController;
use App\Http\Controllers\Master\AdditionalDocumentTypeController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\ItoController;
use App\Http\Controllers\Master\ProjectController;
use App\Http\Controllers\Master\InvoiceTypeController;

Route::prefix('master')->name('master.')->group(function () {
    // SUPPPLIERS ROUTES
    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        Route::get('/cek-target', [SupplierController::class, 'cek_target'])->name('cek');
        Route::get('/import', [SupplierController::class, 'import'])->name('import');
        Route::get('/search', [SupplierController::class, 'search'])->name('search');
        Route::get('/all', [SupplierController::class, 'all'])->name('all');
        // Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::post('/', [SupplierController::class, 'store'])->name('store');
        // Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show');
        Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update');
        Route::delete('/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');
        Route::get('/get-payment-project', [SupplierController::class, 'getPaymentProject'])->name('get-payment-project');
    });

    // ADDITIONAL DOCUMENT TYPES ROUTES
    Route::prefix('document-types')->name('document-types.')->group(function () {
        Route::get('/all', [AdditionalDocumentTypeController::class, 'all'])->name('all');
        Route::post('/', [AdditionalDocumentTypeController::class, 'store'])->name('store');
        Route::get('/search', [AdditionalDocumentTypeController::class, 'search'])->name('search');
        Route::get('/{additionalDocumentType}', [AdditionalDocumentTypeController::class, 'show'])->name('show');
        Route::put('/{additionalDocumentType}', [AdditionalDocumentTypeController::class, 'update'])->name('update');
        Route::delete('/{additionalDocumentType}', [AdditionalDocumentTypeController::class, 'destroy'])->name('destroy');
    });

    // ITO Routes
    Route::prefix('ito')->name('ito.')->group(function () {
        Route::post('/import', [ItoController::class, 'import'])->name('import');
        Route::post('/import-check', [ItoController::class, 'checkImport'])->name('import.check');
    });

    // DEPARTMENTS ROUTES
    Route::prefix('departments')->group(function () {
        Route::get('/search', [DepartmentController::class, 'search']);
        Route::get('/all', [DepartmentController::class, 'all']);
        Route::post('/', [DepartmentController::class, 'store']);
        Route::put('/{department}', [DepartmentController::class, 'update']);
        Route::delete('/{department}', [DepartmentController::class, 'destroy']);

        Route::get('/cur-locs', [DepartmentController::class, 'getCurLocs']);
    });

    // PROJECTS ROUTES
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/search', [ProjectController::class, 'search'])->name('search');
        Route::get('/all', [ProjectController::class, 'all'])->name('all');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
    });

    // INVOICE TYPES ROUTES
    Route::prefix('invoice-types')->name('invoice-types.')->group(function () {
        Route::get('/search', [InvoiceTypeController::class, 'search'])->name('search');
        Route::get('/all', [InvoiceTypeController::class, 'all'])->name('all');
        Route::post('/', [InvoiceTypeController::class, 'store'])->name('store');
        Route::put('/{invoiceType}', [InvoiceTypeController::class, 'update'])->name('update');
        Route::delete('/{invoiceType}', [InvoiceTypeController::class, 'destroy'])->name('destroy');
    });
});