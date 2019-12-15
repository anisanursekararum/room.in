@extends('admin.main')
@section('title','Edit Room |')
@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('admin.rooms.update',['id'=>$rc->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="card">
        <div class="card-header">
            Edit Room
        </div>
        <div class="card-body">
            {{-- <div class="form-group form-label-group">
                <img src="{{url('storage/picture_rooms/'.$rc->picture_rooms)}}" width="100">
                <a href="#" class="btn btn-info">
                    <i class="fa fa-image">Ubah gambar</i>
                </a>
            </div> --}}
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
                class="form-control {{ $errors->has('description')?'is-invalid':'' }}"
                value="{{old('description_room',$rc->description_room)}}"
                id="iDescription" placeholder="Description of room" requiredcols="30" rows="10">
                @if ($errors->has('description'))
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iPicture">Image</label>
                <br>
                        <img src="{{url('storage/picture_rooms/'.$rc->picture_rooms)}}" width="100">
                        {{-- <a href="#" class="btn btn-info">
                            <i class="fa fa-image">Ubah gambar</i>
                        </a> --}}
                        <input type="file" name="picture_rooms" 
                class="form-control {{ $errors->has('picture_rooms')?'is-invalid':'' }}"
                value="{{old('picture_rooms')}}"
                accept="image/*"
                id="iPicture" placeholder="Image of room" required>
                @if ($errors->has('picture_rooms'))
                    <div class="invalid-feedback">{{$errors->first('picture_rooms')}}</div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary col-md-12">Update</button>
            </div>
        </div>
    </div>   
    </form>    
</div>
@endsection