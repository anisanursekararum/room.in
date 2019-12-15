@extends('admin.main')
@section('title','Booking Room |')
@section('content')
 @if (session('result')=='success')
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Requested!</strong> Room berhasil dipesan.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @endif
<div class="container-fluid">
    <form method="post" action="{{ route('user.booking',['id'=>$rc->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="card">
        <div class="card-header">
            Booking Room
        </div>
        <div class="card-body">
        {{-- <input type="hidden" name="id" value="{{old('id',$rc->id)}}"> --}}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="room_id" value="{{$rc->id}}">
            <div class="form-group form-label-group">
                <label for="iTitle">Title</label>
                <input type="text" name="title_rooms" 
                class="form-control {{ $errors->has('title_rooms')?'is-invalid':'' }}"
                value="{{old('title_rooms',$rc->title_rooms)}}"
                id="iTitle" placeholder="Title of room" required>
                @if ($errors->has('title_rooms'))
                    <div class="invalid-feedback">{{$errors->first('title_rooms')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iDescription">Description</label>
                <input type="text" name="description_room"  
                class="form-control {{ $errors->has('description_room')?'is-invalid':'' }}"
                value="{{old('description_room',$rc->description_room)}}"
                id="iDescription" placeholder="Description of room">
                @if ($errors->has('description_room'))
                    <div class="invalid-feedback">{{$errors->first('description_room')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iStatusRoom">Status Room</label>
                <input type="text" name="status_room"  
                class="form-control {{ $errors->has('status_room')?'is-invalid':'' }}"
                value="{{old('status_room',$rc->status_room)}}"
                id="iStatusRoom">
                @if ($errors->has('status_room'))
                    <div class="invalid-feedback">{{$errors->first('status_room')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iTanggal">Date Booking</label>
                <input type="date" name="tanggal_booking" 
                class="form-control {{ $errors->has('tanggal_booking')?'is-invalid':'' }}"
                value="{{old('tanggal_booking')}}"
                id="iTanggal">
                @if ($errors->has('tanggal_booking'))
                    <div class="invalid-feedback">{{$errors->first('tanggal_booking')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iStart">Start Booking</label>
                <input type="time" name="start_booking" 
                class="form-control {{ $errors->has('start_booking')?'is-invalid':'' }}"
                value="{{old('start_booking')}}"
                id="iStart">
                @if ($errors->has('start_booking'))
                    <div class="invalid-feedback">{{$errors->first('start_booking')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iEnd">End Booking</label>
                <input type="time" name="end_booking" 
                class="form-control"
                value="{{old('end_booking')}}"
                id="iEnd">
                @if ($errors->has('end_booking'))
                    <div class="invalid-feedback">{{$errors->first('end_booking')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iKeperluan">Keperluan</label>
                <input type="text" name="keperluan" 
                class="form-control {{ $errors->has('keperluan')?'is-invalid':'' }}"
                value="{{old('keperluan')}}"
                id="iKeperluan" placeholder="Keperluan ruangan...">
                @if ($errors->has('keperluan'))
                    <div class="invalid-feedback">{{$errors->first('keperluan')}}</div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary col-md-12">Booking Room</button>
            </div>
        </div>
    </div>   
    </form>    
</div>
@endsection