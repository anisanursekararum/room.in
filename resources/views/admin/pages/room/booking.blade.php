@extends('admin.main')
@section('title','Booking | ')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mb-3">
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{route('admin.booking')}}" method="get">
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
    </div>
    <div class="row-md-12 mt-5">
        <div class="col-md-12">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-3">List Booking</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">Room Id</th>
                    <th scope="col">Tanggal Booking</th>
                    <th scope="col">Start Booking</th>
                    <th scope="col">End Booking</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        <tr>
                            <td>{{$dt->user_id}}</td>
                            <td>{{$dt->room_id}}</td>
                            <td>{{$dt->tanggal_booking}}</td>
                            <td>{{$dt->start_booking}}</td>
                            <td>{{$dt->end_booking}}</td>
                            <td>{{$dt->keperluan}}</td>
                            <td>{{$dt->status_booking}}</td>
                            <td>
                              <a href="{{route('admin.rooms.update',['id'=>$dt->id])}}" 
                                class="btn btn-success btn-sm">
                                    <i class="fa fa-w fa-edit"></i>
                                </a>
                                {{-- edit gambar --}}
                                <a href="#" 
                                class="btn btn-info btn-sm">
                                    <i class="fa fa-w fa-edit"></i>
                                </a>
                                @if( $dt->id != Auth::id() )
                                <button class="btn btn-danger btn-sm btn-trash"
                                data-id="{{ $dt->id }}" 
                                type="button">
                                    <i class="fa fa-w fa-trash"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach        
                </tbody>
              </table>
              <div class="col-md-12">
              <tfoot>
                    {{
                        $data->appends( request()->only('keyword') )
                        ->links('vendor.pagination.bootstrap-4')
                    }} 
            </tfoot>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection