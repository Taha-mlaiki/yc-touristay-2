<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    public function index(){
        $favorites = Announcement::whereHas("favoritedByUsers", function($query) {
            $query->where("user_id", Auth::user()->id);
        })->with("favoritedByUsers")->get();
        return view("favorites", compact("favorites"));
    }
    public function create(Request $req){
        try {
            $user_id = Auth::user()->id ;
            Favorit::create([
                'announcement_id' => $req->announcement_id ,
                'user_id' => $user_id  
            ]);
            return redirect()->back() ;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function delete(Request $req){
        try {
            $user_id = Auth::user()->id ;
            Favorit::where("user_id", $user_id)->where("announcement_id", $req->announcement_id)->delete();
            return redirect()->back() ;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
