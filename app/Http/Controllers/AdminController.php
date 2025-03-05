<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $announcementCount = Announcement::where("isActive", true)->count();
        $announcements = Announcement::where("isActive",true)->get();
        $usersCount = User::count();
        $AverageRentingPrice = Announcement::where("type", "For Rent")->avg("price");
        $AverageSellingPrice = Announcement::where("type", "For Sale")->avg("price");
        return view("admin.dashboard", compact("announcementCount", "usersCount", "AverageRentingPrice", "AverageSellingPrice",'announcements'));
    }
    public function reservations()
    {
        $reservations = Reservation::with(["announcement", "user"])->get();
        return view("admin.reservations", compact("reservations"));
    }
}
