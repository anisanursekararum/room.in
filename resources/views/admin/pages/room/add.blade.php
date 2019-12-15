@extends('admin.main')
@section('title','Create Room |')
@section('content')
<div class="container-fluid">
    <form method="post" action="{{ route('admin.rooms.save') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="card">
        <div class="card-header">
            Add Room
        </div>
        <div class="card-body">
            <div class="form-group form-label-group">
                <label for="iTitle">Title</label>
                <input type="text" name="title_rooms" 
                class="form-control {{ $errors->has('title_rooms')?'is-invalid':'' }}"
                value="{{old('title_rooms')}}"
                id="iTitle" placeholder="Title of room" required>
                @if ($errors->has('title_rooms'))
                    <div class="invalid-feedback">{{$errors->first('title_rooms')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iDescription">Description</label>
                <textarea type="text" name="description_room" 
                class="form-control {{ $errors->has('description')?'is-invalid':'' }}"
                value="{{old('description')}}"
                id="iDescription" placeholder="Description of room" requiredcols="30" rows="10"></textarea>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="form-group form-label-group">
                <label for="iPicture">Image</label>
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
                <button type="submit" class="btn btn-primary col-md-12">Save</button>
            </div>
        </div>
    </div>   
    </form>    
</div>
@endsection
@push('js')
<script type="text/javascript">
    function filePreview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#iPicture + img').remove();
                $('#iPicture').after('<img src="'+e.target.result+'" width="100" class="mt-3"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function(){
        $('#iPicture').change(function(){
            filePreview(this);
        })
    })
</script>    
@endpush