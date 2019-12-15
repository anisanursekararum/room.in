<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Rooms;
use App\Bookings;
use Auth;

class BookingsController extends Controller
{
    // public function bookingList(Request $req)
    // {
    //     $data = Bookings::where('room_id','like',"%{$req->keyword}%")->paginate(10);
    //     return view('admin.pages.room.booking',['data'=>$data]);
    //     // return view('admin.pages.room.create');
    // }
    // public function create($id)
    // {
    //     $data      = Rooms::where('id', $id)->first();
    //     $customer  = Auth::user();

    //     return view('admin.pages.user.booking', ['rc' => $data, $customer]);
    // }
    // public function booking(Request $req)
    // {
    //     \Validator::make($req->all(),[
    //                 'tanggal_booking'=>'required|date',
    //                 'start_booking'=>'required',
    //                 'end_booking '=>'required',
    //                 'keperluan '=>'required|between:3,100', 
    //             ])->validate();

    //     $save = Bookings::insert([
    //         'id' => $req->input('id'),
    //         'user_id' => $req->input('user_id'),
    //         'room_id' => $req->input('room_id'),
    //         'status_booking' => 'pending',
    //         'tanggal_booking' => $req->input('tanggal_booking'),
    //         'start_booking' => $req->input('start_booking'),
    //         'end_booking' => $req->input('end_booking'),
    //         'keperluan' => $req->input('keperluan'),
    //     ]);
        
    //     if ($save) {
    //         return response()->route('user.browse.book')->with('result','success');
    //     } else {
    //         return back()->with('result', 'fail')->withInput();
    //     }
    // }
}
