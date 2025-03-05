<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get('/home', function () {
        $announcements = Announcement::with("images")->where("isActive", true)->latest()->take(3)->get();
        return view("home", compact('announcements'));
    })->name("home");

    Route::post('/process', [PaymentController::class, "process"])->name("payment.process");
    Route::get('/success', [PaymentController::class, "success"])->name("payment.success");
    Route::get('/cancel', [PaymentController::class, "cancel"])->name("payment.cancel");

    Route::get('/owner/dashbaord', function () {
        return view("owner.dashboard");
    })->name("owner.dashboard");

    Route::get('/owner/announcements', [OwnerController::class, "announcements"])->name("owner.announcements");
    Route::get('/owner/reservations', [OwnerController::class, "reservations"])->name("owner.reservations");

    Route::get('/admin/dashbaord', [AdminController::class, 'dashboard'])->name("admin.dashboard");
    Route::get('/admin/reservations', [AdminController::class, "reservations"])->name("admin.reservations");


    Route::get('/announcements', [AnnouncementController::class, "index"])->name("announcements");
    Route::delete('/announcements', [AnnouncementController::class, "disable"])->name("announcement_disable");

    Route::post('/announcements', [AnnouncementController::class, "create"])->name("announcements.create");
    Route::get('/announcements/{id}', [AnnouncementController::class, "details"])->name("announcement_details");
    Route::get('/announcement/update/{id}', [AnnouncementController::class, "showUpdate"])->name("announcement_edit");
    Route::put('/announcement/update', [AnnouncementController::class, "update"])->name("announcement_update");
    Route::post('/announcements/delete', [AnnouncementController::class, "delete"])->name("announcements.delete");


    Route::get('/favorites', [FavoritController::class, "index"])->name("favorites");

    Route::post('/favorites/add', [FavoritController::class, "create"])->name("favorites.create");
    Route::post('/favorites/remove', [FavoritController::class, "delete"])->name("favorites.delete");
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
