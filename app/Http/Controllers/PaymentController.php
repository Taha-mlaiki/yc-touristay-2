<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmed;
use App\Mail\ReservationOwner;
use App\Models\Announcement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $amountInCents = round($request->amount * 100);

            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $request->title,
                        ],
                        'unit_amount' => $amountInCents, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);

            $announcement = Announcement::findOrFail($request->announcement_id);

            $reservation = Reservation::create([
                'user_id' => Auth::user()->id,
                'announcement_id' => $announcement->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);

            $details = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'reservation_id' => $reservation->id,
                'property_title' => $announcement->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'price' => $announcement->price,
            ];

            Mail::to(Auth::user()->email)->send(new ReservationConfirmed($details));
            Mail::to($announcement->user->email)->send(new ReservationOwner($details));

            return redirect($checkoutSession->url);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function success()
    {
        return view("stripe.success");
    }
    public function cancel()
    {
        return view("stripe.cancel");
    }
}
