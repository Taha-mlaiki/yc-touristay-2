<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $req){
        try {
            $user_id = Auth::user()->id ;
            Reservation::create([
                "user_id" => $user_id,
                "announcement_id" => $req->announcement_id,
                "start_date" => $req->start_date,
                "end_date" => $req->end_date
            ]);
            return redirect()->route("announcement_details",$req->announcement_id)->with("success","Reservations created");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
