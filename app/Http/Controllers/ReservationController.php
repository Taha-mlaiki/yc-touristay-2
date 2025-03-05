<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmed;
use App\Mail\ReservationOwner;
use App\Models\Announcement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function create(Request $req)
    {
        try {
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $reservation = Reservation::create([
                "user_id" => $user_id,
                "announcement_id" => $req->announcement_id,
                "start_date" => $req->start_date,
                "end_date" => $req->end_date
            ]);
            $property = Announcement::find($req->announcement_id);
            $details = [
                "name" => Auth::user()->name,
                "email" =>  Auth::user()->email,
                "reservation_id" => $reservation->id ,
                "property_title" => $property->title ,
                "start_date" => $req->start_date,
                "end_date" => $req->end_date,
                "price" => $property->price,
            ];
            Mail::to($user_email)->send(new ReservationConfirmed($details));
            Mail::to(Auth::user()->email)->send(new ReservationOwner($details));
            return redirect()->route("announcement_details", ["id" => $req->announcement_id])->with("success", "Reservations created");
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
