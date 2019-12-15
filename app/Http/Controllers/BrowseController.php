<?php

namespace App\Http\Controllers;

use App\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class BrowseController extends Controller
{
    public function browse(Request $req)
    {
        $rooms = Rooms::where('title_rooms','like',"%{$req->keyword}%")->paginate(3);
    	return view('admin.pages.user.browse', compact('rooms'));
    }
}
