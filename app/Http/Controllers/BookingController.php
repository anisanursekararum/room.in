<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Rooms;
use App\Booking;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function bookingList(Request $req)
    {
        $data = Booking::where('room_id','like',"%{$req->keyword}%")->paginate(10);
        return view('admin.pages.room.booking',['data'=>$data]);
        // return view('admin.pages.room.create');
    }
    public function create($id)
    {
        $data      = Rooms::where('id', $id)->first();
        $customer  = Auth::user();

        return view('admin.pages.user.booking', ['rc' => $data, $customer]);
    }
    public function booking(Request $req)
    {
        // \Validator::make($req->all(),[
        //             'tanggal_booking'=>'required|date',
        //             'start_booking'=>'required',
        //             'end_booking '=>'required',
        //             'keperluan '=>'required|between:3,100', 
        //         ])->validate();

        $save = Booking::insert([
            'id' => $req->input('id'),
            'user_id' => $req->input('user_id'),
            'room_id' => $req->input('room_id'),
            'status_booking' => 'pending',
            'tanggal_booking' => $req->input('tanggal_booking'),
            'start_booking' => $req->input('start_booking'),
            'end_booking' => $req->input('end_booking'),
            'keperluan' => $req->input('keperluan'),
        ]);
        
        if ($save) {
            return redirect('/booking/' . $req->input('id'))->with('result','success');
        } else {
            return back()->with('result', 'fail')->withInput();
        }
    }
    public function respon()
    {
        
    }
}
