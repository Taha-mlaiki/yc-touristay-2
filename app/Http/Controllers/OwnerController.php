<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function announcements()
    {
        $announcements = Auth::user()->announcements;
        $favoritedIds =   Auth::user()->favorites->pluck("id")->toArray();
        return view('owner.announcements', compact('announcements', 'favoritedIds'));
    }
    public function reservations()
    {
        $reservations = Reservation::with(["announcement", "user"])
            ->whereHas("announcement", function ($q) {
                $q->where("user_id", Auth::id());
            })
            ->get();
        return view("owner.reservations", compact("reservations"));
    }
}
