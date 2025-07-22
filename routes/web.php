<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});









 //Staff

use App\Http\Controllers\Staff\Auth\StaffAuthController;
use App\Http\Controllers\Staff\StaffDashboardController;

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
|
| All routes for staff authentication, verification, and protected areas
|
*/

// ========================
// Public Authentication Routes
// ========================
Route::prefix('staff')->name('staff.')->group(function () {
    // Login Routes
    Route::get('/login', [StaffAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StaffAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [StaffAuthController::class, 'logout'])->name('logout');

    // Password Reset Routes (for guests only)
    Route::middleware(['guest:staff'])->group(function() {
        // Forgot Password Routes
        Route::get('/forgot-password', [StaffAuthController::class, 'showForgotPasswordForm'])
            ->name('password.request');
        Route::post('/forgot-password', [StaffAuthController::class, 'sendResetLinkEmail'])
            ->name('password.email');

        // Verification Code Routes
        Route::get('/verify-password', [StaffAuthController::class, 'showVerifyPasswordForm'])
            ->name('password.verify');
        Route::post('/verify-password', [StaffAuthController::class, 'verifyPasswordReset'])
            ->name('password.verify.submit');

        // Password Reset Routes
        Route::get('/reset-password', [StaffAuthController::class, 'showResetPasswordForm'])
            ->name('password.reset');
        Route::post('/reset-password', [StaffAuthController::class, 'resetPassword'])
            ->name('password.update');
    });

    // Authenticated Routes
    Route::middleware(['auth:staff', \App\Http\Middleware\StaffVerified::class])->group(function() {
        // Dashboard Route
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])
            ->name('dashboard');
    });

    // Routes that need auth but don't need verification
    Route::middleware(['auth:staff'])->group(function() {
        // Password Change
        Route::get('/password/change', [StaffAuthController::class, 'showChangePasswordForm'])
            ->name('password.change');
        Route::post('/password/change', [StaffAuthController::class, 'changePassword'])
            ->name('password.change.submit');

        // Email Verification
        Route::get('/verify', [StaffAuthController::class, 'showVerifyForm'])
            ->name('verify');
        Route::post('/verify', [StaffAuthController::class, 'verifyEmail'])
            ->name('verify.submit');
        Route::post('/verify/resend', [StaffAuthController::class, 'resendVerification'])
            ->name('verify.resend');
    });
});














//Admin


use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TextSummarizationController;
use App\Http\Controllers\Admin\FarmController;
use App\Http\Controllers\Admin\CropController;
use App\Http\Controllers\Admin\LivestockController;
use App\Http\Controllers\Admin\FinancialRecordController;
use App\Http\Controllers\Admin\MarketLinkageController;
use App\Http\Controllers\Admin\AdvisoryController;
use App\Http\Controllers\Admin\FarmActivityController;


// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Guest Routes (Not Authenticated)
    Route::middleware(['guest:admin'])->group(function () {  // Changed from 'guest:admin'
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Authenticated Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Department Management
        Route::prefix('departments')->middleware('permission:department.view')->group(function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('admin.departments.index');
            Route::get('/create', [DepartmentController::class, 'create'])->name('admin.departments.create')
                ->middleware('permission:department.create');
            Route::post('/', [DepartmentController::class, 'store'])->name('admin.departments.store')
                ->middleware('permission:department.create');
            Route::get('/{department}', [DepartmentController::class, 'show'])->name('admin.departments.show');
            Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.departments.edit')
                ->middleware('permission:department.edit');
            Route::put('/{department}', [DepartmentController::class, 'update'])->name('admin.departments.update')
                ->middleware('permission:department.edit');
            Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('admin.departments.destroy')
                ->middleware('permission:department.delete');
            Route::post('/status', [DepartmentController::class, 'updateStatus'])->name('admin.departments.status')
                ->middleware('permission:department.edit');
        });

        // Staff Management Routes
        Route::prefix('staff')->middleware('permission:staff.view')->group(function () {
            // Single Staff Creation
            Route::get('/', [StaffController::class, 'index'])->name('admin.staff.index');
            Route::get('/create', [StaffController::class, 'create'])->name('admin.staff.create')
                ->middleware('permission:staff.create');
            Route::post('/', [StaffController::class, 'store'])->name('admin.staff.store')
                ->middleware('permission:staff.create');

            // Bulk Staff Upload
            Route::get('/bulk-create', [StaffController::class, 'bulkCreate'])->name('admin.staff.bulk-create')
                ->middleware('permission:staff.create');
            Route::post('/bulk-store', [StaffController::class, 'bulkStore'])->name('admin.staff.bulk-store')
                ->middleware('permission:staff.create');

            // Staff Profile Management
            Route::get('/{staff}', [StaffController::class, 'show'])->name('admin.staff.show');
            Route::get('/{staff}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit')
                ->middleware('permission:staff.edit');
            Route::put('/{staff}', [StaffController::class, 'update'])->name('admin.staff.update')
                ->middleware('permission:staff.edit');
            Route::delete('/{staff}', [StaffController::class, 'destroy'])->name('admin.staff.destroy')
                ->middleware('permission:staff.delete');
        });

        // Role Management
        Route::prefix('roles')->middleware('permission:role.view')->group(function() {
            Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.roles.create')
                ->middleware('permission:role.create');
            Route::post('/', [RoleController::class, 'store'])->name('admin.roles.store')
                ->middleware('permission:role.create');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')
                ->middleware('permission:role.edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('admin.roles.update')
                ->middleware('permission:role.edit');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')
                ->middleware('permission:role.delete');
        });

        // User Management
         Route::prefix('users')->middleware('permission:user.view')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create')
                ->middleware('permission:user.create');
            Route::post('/', [UserController::class, 'store'])->name('admin.users.store')
                ->middleware('permission:user.create');

            // Changed {user} to {admin} to match the Admin model parameter
            Route::get('/{admin}/edit', [UserController::class, 'edit'])->name('admin.users.edit')
                ->middleware('permission:user.edit');
            Route::put('/{admin}', [UserController::class, 'update'])->name('admin.users.update')
                ->middleware('permission:user.edit');
            Route::delete('/{admin}', [UserController::class, 'destroy'])->name('admin.users.destroy')
                ->middleware('permission:user.delete');

            // Add the reset password route if needed
            Route::post('/{admin}/reset-password', [UserController::class, 'resetPassword'])
                ->name('admin.users.reset-password')
                ->middleware('permission:user.edit');
        });



// Farm Management Routes
Route::prefix('farms')->group(function () {
    // Main farm routes with permissions
    Route::middleware('permission:farm.view')->group(function () {
        Route::get('/', [FarmController::class, 'index'])->name('admin.farms.index');
        Route::get('/create', [FarmController::class, 'create'])->name('admin.farms.create')
            ->middleware('permission:farm.create');
        Route::post('/', [FarmController::class, 'store'])->name('admin.farms.store')
            ->middleware('permission:farm.create');
        Route::get('/{farm}', [FarmController::class, 'show'])->name('admin.farms.show');
        Route::get('/{farm}/edit', [FarmController::class, 'edit'])->name('admin.farms.edit')
            ->middleware('permission:farm.edit');
        Route::put('/{farm}', [FarmController::class, 'update'])->name('admin.farms.update')
            ->middleware('permission:farm.edit');
        Route::delete('/{farm}', [FarmController::class, 'destroy'])->name('admin.farms.destroy')
            ->middleware('permission:farm.delete');
    });

    // API endpoint without permission middleware
  //  Route::get('/get-staff-by-designation', [FarmController::class, 'getStaffByDesignation'])
     //   ->name('admin.farms.get-staff-by-designation');
});


Route::get('admin/farms/get-staff-by-designation', [FarmController::class, 'getStaffByDesignation'])
    ->name('admin.farms.get-staff-by-designation');


// Crop Management Routes
Route::prefix('crops')->middleware('permission:crop.view')->group(function () {
    Route::get('/', [CropController::class, 'index'])->name('admin.crops.index');
    Route::get('/create', [CropController::class, 'create'])->name('admin.crops.create')
        ->middleware('permission:crop.create');
    Route::post('/', [CropController::class, 'store'])->name('admin.crops.store')
        ->middleware('permission:crop.create');
    Route::get('/{crop}', [CropController::class, 'show'])->name('admin.crops.show');
    Route::get('/{crop}/edit', [CropController::class, 'edit'])->name('admin.crops.edit')
        ->middleware('permission:crop.edit');
    Route::put('/{crop}', [CropController::class, 'update'])->name('admin.crops.update')
        ->middleware('permission:crop.edit');
    Route::delete('/{crop}', [CropController::class, 'destroy'])->name('admin.crops.destroy')
        ->middleware('permission:crop.delete');
});

// Livestock Management Routes
Route::prefix('livestocks')->middleware('permission:livestock.view')->group(function () {
    Route::get('/', [LivestockController::class, 'index'])->name('admin.livestocks.index');
    Route::get('/create', [LivestockController::class, 'create'])->name('admin.livestocks.create')
        ->middleware('permission:livestock.create');
    Route::post('/', [LivestockController::class, 'store'])->name('admin.livestocks.store')
        ->middleware('permission:livestock.create');
    Route::get('/{livestock}', [LivestockController::class, 'show'])->name('admin.livestocks.show');
    Route::get('/{livestock}/edit', [LivestockController::class, 'edit'])->name('admin.livestocks.edit')
        ->middleware('permission:livestock.edit');
    Route::put('/{livestock}', [LivestockController::class, 'update'])->name('admin.livestocks.update')
        ->middleware('permission:livestock.edit');
    Route::delete('/{livestock}', [LivestockController::class, 'destroy'])->name('admin.livestocks.destroy')
        ->middleware('permission:livestock.delete');
});

// Financial Records Routes
Route::prefix('financial-records')->middleware('permission:financial.view')->group(function () {
    Route::get('/', [FinancialRecordController::class, 'index'])->name('admin.financial-records.index');
    Route::get('/create', [FinancialRecordController::class, 'create'])->name('admin.financial-records.create')
        ->middleware('permission:financial.create');
    Route::post('/', [FinancialRecordController::class, 'store'])->name('admin.financial-records.store')
        ->middleware('permission:financial.create');
    Route::get('/{financial_record}', [FinancialRecordController::class, 'show'])->name('admin.financial-records.show');
    Route::get('/{financial_record}/edit', [FinancialRecordController::class, 'edit'])->name('admin.financial-records.edit')
        ->middleware('permission:financial.edit');
    Route::put('/{financial_record}', [FinancialRecordController::class, 'update'])->name('admin.financial-records.update')
        ->middleware('permission:financial.edit');
    Route::delete('/{financial_record}', [FinancialRecordController::class, 'destroy'])->name('admin.financial-records.destroy')
        ->middleware('permission:financial.delete');
});

// Market Linkages Routes
Route::prefix('market-linkages')->middleware('permission:market.view')->group(function () {
    Route::get('/', [MarketLinkageController::class, 'index'])->name('admin.market-linkages.index');
    Route::get('/create', [MarketLinkageController::class, 'create'])->name('admin.market-linkages.create')
        ->middleware('permission:market.create');
    Route::post('/', [MarketLinkageController::class, 'store'])->name('admin.market-linkages.store')
        ->middleware('permission:market.create');
    Route::get('/{market_linkage}', [MarketLinkageController::class, 'show'])->name('admin.market-linkages.show');
    Route::get('/{market_linkage}/edit', [MarketLinkageController::class, 'edit'])->name('admin.market-linkages.edit')
        ->middleware('permission:market.edit');
    Route::put('/{market_linkage}', [MarketLinkageController::class, 'update'])->name('admin.market-linkages.update')
        ->middleware('permission:market.edit');
    Route::delete('/{market_linkage}', [MarketLinkageController::class, 'destroy'])->name('admin.market-linkages.destroy')
        ->middleware('permission:market.delete');
});


// Advisories Routes
Route::prefix('advisories')->middleware('permission:advisory.view')->group(function () {
    Route::get('/', [AdvisoryController::class, 'index'])->name('admin.advisories.index');
    Route::get('/create', [AdvisoryController::class, 'create'])->name('admin.advisories.create')
        ->middleware('permission:advisory.create');
    Route::post('/', [AdvisoryController::class, 'store'])->name('admin.advisories.store')
        ->middleware('permission:advisory.create');
    Route::get('/{advisory}', [AdvisoryController::class, 'show'])->name('admin.advisories.show');
    Route::get('/{advisory}/edit', [AdvisoryController::class, 'edit'])->name('admin.advisories.edit')
        ->middleware('permission:advisory.edit');
    Route::put('/{advisory}', [AdvisoryController::class, 'update'])->name('admin.advisories.update')
        ->middleware('permission:advisory.edit');
    Route::delete('/{advisory}', [AdvisoryController::class, 'destroy'])->name('admin.advisories.destroy')
        ->middleware('permission:advisory.delete');
});

// Farm Activities Routes
Route::prefix('farm-activities')->middleware('permission:activity.view')->group(function () {
    Route::get('/', [FarmActivityController::class, 'index'])->name('admin.farm-activities.index');
    Route::get('/create', [FarmActivityController::class, 'create'])->name('admin.farm-activities.create')
        ->middleware('permission:activity.create');
    Route::post('/', [FarmActivityController::class, 'store'])->name('admin.farm-activities.store')
        ->middleware('permission:activity.create');
    Route::get('/{farm_activity}', [FarmActivityController::class, 'show'])->name('admin.farm-activities.show');
    Route::get('/{farm_activity}/edit', [FarmActivityController::class, 'edit'])->name('admin.farm-activities.edit')
        ->middleware('permission:activity.edit');
    Route::put('/{farm_activity}', [FarmActivityController::class, 'update'])->name('admin.farm-activities.update')
        ->middleware('permission:activity.edit');
    Route::delete('/{farm_activity}', [FarmActivityController::class, 'destroy'])->name('admin.farm-activities.destroy')
        ->middleware('permission:activity.delete');

// AJAX route for getting related items
Route::get('/get-related-items', [FarmActivityController::class, 'getRelatedItems'])->name('admin.get-related-items');
    });



    });
});


