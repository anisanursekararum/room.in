<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;

class RoomsController extends Controller
{
    public function create(Request $req)
    {
        $data = Rooms::where('title_rooms','like',"%{$req->keyword}%")->paginate(10);
        return view('admin.pages.room.create',['data'=>$data]);
        // return view('admin.pages.room.create');
    }
    public function add()
    {
        return view('admin.pages.room.add');
    }
    public function save(Request $req)
    {
        \Validator::make($req->all(),[
            'title_rooms'=>'required|between:3,100',
            'description_room'=>'required|between:3,100',
            'picture_rooms'=>'required|image', 
        ])->validate();

        $filename = rand(1,999).'_'.str_replace(' ', '', $req->picture_rooms->getClientOriginalName());

        $req->file('picture_rooms')->storeAs('public/picture_rooms', $filename);

        $result = new Rooms;
        $result->title_rooms = $req->title_rooms;
        $result->description_room = $req->description_room;
        $result->picture_rooms = $filename;

        if($result->save()){
            return redirect()->route('admin.rooms')->with('result','success');
        } else {
            return back()->with('result','fail')->withInput();
        }
    }
    public function edit($id)
    {
        $data = Rooms::find($id);
        return view('admin.pages.room.edit', ['rc'=>$data]);
    }
    public function update(Request $req, $id)
    {
        \Validator::make($req->all(),[
            'title_rooms'=>'required|between:3,100',
            'description_room'=>'required|between:3,100',
            'picture_rooms'=>'required|image', 
        ])->validate();

        $filename = rand(1,999).'_'.str_replace(' ', '', $req->picture_rooms->getClientOriginalName());

        $req->file('picture_rooms')->storeAs('public/picture_rooms', $filename);

        if(!empty($req)){
            $field = [
                'title_rooms'=>$req->title_rooms,
                'description_room'=>$req->description_room,
                'picture_rooms'=>$filename,
            ];
        } else {
            $field = [
                'title_rooms'=>$req->title_rooms,
                'description_room'=>$req->description_room,
                'picture_rooms'=>$filename,
            ];
        }
        $result = Rooms::where('id', $req->id)->update($field);
        if($result){
            return redirect()->route('admin.rooms')->with('result','update');
        } else {
            return back()->with('result','fail');
        }
    }
    public function delete(Request $req)
    {
        $result = Rooms::find($req->id);
        if($result->delete()){
            return back()->with('result','delete');
        } else {
            return back()->with('result','fail-delete');
        }
    }
}
