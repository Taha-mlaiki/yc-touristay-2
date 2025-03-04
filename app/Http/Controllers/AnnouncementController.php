<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Favorit;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    //
    public function index(Request $req)
    {
        // Get the authenticated user
        $user = Auth::user();

        $favoritedIds = $user->favorites->pluck('id')->toArray();

        $city = $req->input('city', ''); // City filter
        $date = $req->input('date', null); // Date filter
        $num = $req->input('slots', 4); // Number of results per page

        // Build the query
        $announcements = Announcement::with('images')
            ->when($city, function ($query, $city) {
                $query->where('city', 'LIKE', "%{$city}%"); // Search by city
            })
            ->where("isActive",true)
            ->when($date, function ($query, $date) {
                // Ensure the date is within the announcement's start_date and end_date range
                $query->whereDate('start_date', '<=', $date)
                    ->whereDate('end_date', '>=', $date);
            })
            ->paginate($num)
            ->appends($req->query()); // Preserve query parameters in pagination links

        // Pass data to the view
        return view('announcements', compact('announcements', 'favoritedIds'));
    }
    public function create(Request $req)
    {
        try {
            //code...
            $user_id = Auth::user()->id;
            $validated = $req->validate([
                'title' => ['required', 'string', 'max:100'],
                'description' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'images' => ['required', 'array', 'min:1'],
                'images.*' => ['file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'beds' => ['required', 'integer', 'min:1'],
                'baths' => ['required', 'integer', 'min:1'],
                'sqft' => ['required', 'integer', 'min:1'],
                'type' => ['required', 'in:For Sale,For Rent'],
                'price' => ['required', 'numeric'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'city' => ['required', 'string'],
            ]);
            $announcement = Announcement::create([
                'title' => $validated['title'],
                'user_id' => $user_id,
                'description' => $validated['description'],
                'address' => $validated['address'],
                'Beds' => $validated['beds'],
                'Baths' => $validated['baths'],
                'sqft' => $validated['sqft'],
                'type' => $validated['type'],
                'price' => $validated['price'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'city' => $validated['city'],
            ]);

            if ($req->hasFile('images')) {
                foreach ($req->file('images') as $image) {
                    $path = $image->store('uploads', 'public');
                    Image::create([
                        'announcement_id' => $announcement->id,
                        'path' => str_replace('public/', 'storage/', $path),
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Announcement created successfully!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function details($announcement_id)
    {
        $user_id = Auth::user()->id;
        $announcement = Announcement::with(['images', 'reservations'])->find($announcement_id);
        return view("announcement_details", compact("announcement"));
    }
    public function showUpdate($announcement_id)
    {
        $user_id = Auth::user()->id;
        $announcement = Announcement::with("images")->findOrFail($announcement_id);
        $title = ($announcement->title);
        return view("owner.announcement_edit", compact("announcement", "title"));
    }
    public function update(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'Beds' => 'required|numeric',
            'Baths' => 'required|numeric',
            'sqft' => 'required|numeric',
            'type' => 'required|in:For Sale,For Rent',
            'price' => 'required|numeric',
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'city' => ['required', 'string'],
        ]);
        try {
            $announcement = Announcement::where('id', $req->announcement_id)->firstOrFail();
            $announcement->update([
                'title' => $req->title,
                'description' => $validated['description'],
                'address' => $validated['address'],
                'Beds' => $validated['Beds'],
                'Baths' => $validated['Baths'],
                'sqft' => $validated['sqft'],
                'type' => $validated['type'],
                'price' => $validated['price'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'city' => $validated['city'],
            ]);
            if ($req->hasFile('images')) {
                foreach ($req->file('images') as $image) {
                    $path = $image->store('uploads', 'public');
                    Image::create([
                        'announcement_id' => $announcement->id,
                        'path' => str_replace('public/', 'storage/', $path),
                    ]);
                }
            }
            return redirect()->route("announcement_edit", $req->announcement_id)->with('success', 'Announcement updated successfully!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function delete(Request $req)
    {
        try {
            $announcement = Announcement::where('id', $req->announcement_id)->firstOrFail();
            $announcement->delete();
            return redirect()->route('announcements');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function disable(Request $req)
    {
        try {
            $announcement_id = $req->announcement_id;
            $announcement = Announcement::findOrFail($announcement_id);
            $announcement->isActive = false;
            $announcement->save();
            return redirect()->back()->with("success", "Announcement archived successfully!");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Failed to archive announcement.");
        }
    }
}
