<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
// use Dotenv\Regex\Result;

class RoomController extends Controller
{
    public function create(Request $req)
    {
        $data = Room::where('title_room','like',"%{$req->keyword}%")->paginate(10);
        return view('admin.pages.room.create',['data'=>$data]);
    }
    public function add()
    {
        return view('admin.pages.room.add');
    }
    public function save(Request $req)
    {
        \Validator::make($req->all(),[
            'title_room'=>'required|between:3,100',
            'description'=>'required|between:3,255',
            'image_room'=>'required|image',
        ])->validate();

        $result = new User;
        $result->name = $req->name;
        $result->email = $req->email;
        $result->password = bcrypt($req->password);
        $result->akses = $req->akses;

        if($result->save()){
            return redirect()->route('admin.user')->with('result','success');
        }else {
            return back()->with('result','fail')->withInput();
        }

        $filename = rand(1,999).'_'.str_replace(' ','',$req->image_room->getClientOriginalName());

        $req->file('image_room')->storeAs('public/image_room',$filename);

        $result = new Room;
        $result->title_room = $req->title_room;
        $result->description = $req->description;
        $result->image_room = $filename;

        if($result){
            return redirect()->route('admin.room')->with('result','success');
        } else {
            return back()->with('result','fail')->withInput();
        }        
    }
}
