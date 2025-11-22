<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projects Management
    Route::resource('projects', ProjectController::class);
    Route::post('projects/{project}/media', [ProjectController::class, 'uploadMedia'])->name('projects.media.upload');
    Route::delete('projects/media/{media}', [ProjectController::class, 'deleteMedia'])->name('projects.media.delete');
    Route::put('projects/media/{media}/caption', [ProjectController::class, 'updateMediaCaption'])->name('projects.media.caption');
    Route::post('projects/media/reorder', [ProjectController::class, 'reorderMedia'])->name('projects.media.reorder');

    // Partners Management
    Route::resource('partners', PartnerController::class);
    Route::post('partners/reorder', [PartnerController::class, 'reorder'])->name('partners.reorder');

    // Team Management
    Route::resource('team', TeamController::class);
    Route::post('team/reorder', [TeamController::class, 'reorder'])->name('team.reorder');

    // Pages Management (no create/destroy - fixed pages only)
    Route::resource('pages', PageController::class)->except(['create', 'store', 'destroy']);

    // Quotations Management
    Route::resource('quotations', QuotationController::class)->only(['index', 'show', 'update']);
    Route::get('quotations/export', [QuotationController::class, 'export'])->name('quotations.export');

    // Admin-Only Routes
    Route::middleware('can:admin')->group(function () {
        // User Management
        Route::resource('users', UserController::class);

        // Delete Quotations (admin only)
        Route::delete('quotations/{quotation}', [QuotationController::class, 'destroy'])->name('quotations.destroy');
    });
});
