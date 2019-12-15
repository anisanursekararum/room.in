@extends('admin.main')
@section('title','User Setting')
@section('content')
<div class="container-fluid">
    @if(session('result') == 'success')
    <div class="alert alert-success alert-dismissiable fade show col-md-12">
        <strong>Updated!</strong> Data Berhasil di Update
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @elseif(session('result') == 'fail')
    <div class="alert alert-danger alert-dismissiable fade show col-md-12">
        <strong>Failed!</strong> Data Gagal di Update
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>
    @endif  
  <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">My account</h3>
            </div>
          </div>
        </div>
        <form method="post" action="{{route('admin.user.setting')}}">
        <div class="card-body">
            <h6 class="heading-small text-muted mb-4">User information</h6>
          {{ csrf_field() }}
          <div class="form-group form-label-group">
              <label for="iName">Name</label>
              <input type="text" name="name" 
              class="form-control {{$errors->has('name')?'is-invalid':''}}" 
              value="{{old('name',$dt->name)}}" id="iName" placeholder="name" required>
              @if($errors->has('name'))
              <div class="invalid-feedback">{{$errors->first('name')}}</div>
              @endif
          </div>
          <div class="form-group form-label-group">
              <label for="iEmail">Email</label>
              <input type="text" name="email" 
              class="form-control {{$errors->has('email')?'is-invalid':''}}" 
              value="{{old('email',$dt->email)}}" id="iEmail" placeholder="Email" required>
              @if ($errors->has('email'))
              <div class="invalid-feedback">{{$errors->first('email')}}</div>
              @endif
          </div>
          <div class="form-group form-label-group">
              <label for="iPassword">Password</label>
              <input type="password" name="password" 
              class="form-control {{$errors->has('password')?'is-invalid':''}}" 
              id="iPassword" placeholder="Password">
              <div class="form-text text-muted">
                  <small>Kosongkan password apabila tidak diubah</small>
              </div>
          </div>
          <div class="form-group form-label-group">
              <label for="iRePassword">Re Password</label>
              <input type="password" name="repassword" 
              class="form-control {{$errors->has('repassword')?'is-invalid':''}}" 
              id="iRePassword" placeholder="Re Password">
          </div>
          <div class="card-footer">
              <button type="submit" class="btn btn-primary shadow-sm col-md-12">Update</button>
          </div>
      </div>
    </form>
      </div>
    </div>
  </div>
  </div>
@endsection