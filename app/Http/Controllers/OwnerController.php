<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function announcements()
    {
        $announcements = Auth::user()->announcements;
        $favoritedIds =   Auth::user()->favorites->pluck("id")->toArray();
        return view('owner.announcements', compact('announcements','favoritedIds'));
    }
}
