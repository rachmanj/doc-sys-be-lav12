<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Documents\InvoiceController;
use App\Http\Controllers\Documents\AdditionalDocumentController;
use App\Http\Controllers\Documents\InvoiceAttachmentController;

Route::prefix('documents')->name('documents.')->group(function () {
    Route::prefix('invoices')->name('invoices.')->group(function () {
        Route::get('search', [InvoiceController::class, 'search'])->name('search');
        Route::get('all', [InvoiceController::class, 'all'])->name('all');
        Route::get('check-duplication', [InvoiceController::class, 'checkDuplication'])->name('checkDuplication');
        Route::get('/get-by-id', [InvoiceController::class, 'getById'])->name('getById');
        Route::post('store', [InvoiceController::class, 'store'])->name('store');
        Route::put('update/{id}', [InvoiceController::class, 'update'])->name('update');
        Route::delete('{id}', [InvoiceController::class, 'destroy'])->name('destroy');

        // Attachment routes
        Route::post('{invoice}/upload-attachments', [InvoiceAttachmentController::class, 'uploadAttachments'])
            ->name('upload-attachments');

        Route::get('{invoice}/attachments', [InvoiceAttachmentController::class, 'getAttachments'])
            ->name('get-attachments');

        Route::delete('attachments/{attachment}', [InvoiceAttachmentController::class, 'deleteAttachment'])
            ->name('delete-attachment');
    });

    Route::prefix('additional-documents')->name('additional-documents.')->group(function () {
        Route::get('check-duplication', [AdditionalDocumentController::class, 'checkDuplication'])->name('checkDuplication');
        Route::get('get-by-po', [AdditionalDocumentController::class, 'getByPo'])->name('getByPo');
        Route::get('search', [AdditionalDocumentController::class, 'search'])->name('search');
        Route::get('by-ids', [AdditionalDocumentController::class, 'getByIds'])->name('getByIds');
        Route::get('all', [AdditionalDocumentController::class, 'all'])->name('all');
        Route::get('get-by-invoice', [AdditionalDocumentController::class, 'getByInvoice'])->name('getByInvoice');
        Route::get('{id}', [AdditionalDocumentController::class, 'getById'])->name('getById');
        Route::put('{id}', [AdditionalDocumentController::class, 'update'])->name('update');
        Route::delete('{id}', [AdditionalDocumentController::class, 'destroy'])->name('destroy');
        Route::post('store', [AdditionalDocumentController::class, 'store'])->name('store');
    });
});