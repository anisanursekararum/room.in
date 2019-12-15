@extends('admin.main')
@section('title','Browse Booking |')
@section('content')
@if (session('result')=='success')
<div class="alert alert-success alert-dismissible fade show">
    <strong>Requested!</strong> Ruangan berhasil dipesan.
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
</div>        
@endif
<div class="container-fluid">
        <div class="col-md-6 mb-3">
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{route('user.browse')}}" method="get">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                                </div>
                                <input class="form-control" name="keyword" 
                                id="" value="{{request('keyword')}}" placeholder="Search.." type="text">
                            </div>
                        </div>
                    </form>
                </div>
        <div clas="row">
            @foreach ($rooms as $dt)
            <div class="col-md-4 col-lg-3" style="margin-bottom: 20px">
            <div class="card">
              <img src="{{url('storage/picture_rooms/'.$dt->picture_rooms)}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$dt->title_rooms}}</h5>
                <p class="card-text">{{$dt->description_room}}</p>
                <a href="{{route('user.browse.book',['id'=>$dt->id])}}" class="btn btn-primary"><input type="button" value="{{old('status_room',$dt->status_room)}}" <?php if ($dt['status_room'] == 'booked'){ ?> disabled <?php   } ?> onclick="addtocart(<?php echo $dt['id'] ?>)" /></a>
              </div>
            </div>
            </div>       
            @endforeach
            <div class="col-md-12">
                          {{
                              $rooms->appends( request()->only('keyword') )
                              ->links('vendor.pagination.bootstrap-4')
                          }} 
                          {{-- {{ $rooms->links() }} --}}
                    </div>
            </div>
</div>
@endsection