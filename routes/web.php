<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get('/home', function () {
        $announcements = Announcement::with("images")->where("isActive",true)->latest()->take(3)->get();
        return view("home", compact('announcements'));
    })->name("home");

    Route::get('/owner/dashbaord', function () {
        return view("owner.dashboard");
    })->name("owner.dashboard");

    Route::get('/owner/announcements', [OwnerController::class, "announcements"])->name("owner.announcements");

    Route::get('/admin/dashbaord', [AdminController::class, 'dashboard'])->name("admin.dashboard");

    Route::get('/announcements', [AnnouncementController::class, "index"])->name("announcements");
    Route::delete('/announcements', [AnnouncementController::class, "disable"])->name("announcement_disable");

    Route::post('/announcements', [AnnouncementController::class, "create"])->name("announcements.create");
    Route::get('/announcements/{id}', [AnnouncementController::class, "details"])->name("announcement_details");
    Route::get('/announcement/update/{id}', [AnnouncementController::class, "showUpdate"])->name("announcement_edit");
    Route::put('/announcement/update', [AnnouncementController::class, "update"])->name("announcement_update");
    Route::post('/announcements/delete', [AnnouncementController::class, "delete"])->name("announcements.delete");
    Route::post("/reservation",[ReservationController::class, "create"])->name("create_reservation");


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
