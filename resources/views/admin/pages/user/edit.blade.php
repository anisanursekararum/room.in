@extends('admin.main')
@section('title','Edit User |')
@section('content')
<div class="container-fluid">
   @if (session('result')=='fail')
   <div class="alert alert-success alert-dismissible fade show">
        <strong>Failed!</strong> User gagal diupdate.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>           
   @endif   
   <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('admin.user.edit',['id'=>$us->id])}}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group form-label-group">
                                <label for="iName">Name</label>
                                <input type="text" name="name" 
                                class="form-control {{ $errors->has('name')?'is-invalid':'' }}"
                                value="{{old('name',$us->name)}}"
                                id="iName" placeholder="Your name" required>
                                @if ($errors->has('name'))
                                <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group form-label-group">
                                <label for="iEmail">Email</label>
                                <input type="email" name="email" 
                                class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                value="{{old('email',$us->email)}}"
                                id="iEmail" placeholder="Your email" required>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="form-group form-label-group">
                                <label for="iPassword">Password</label>
                                <input type="password" name="password" 
                                class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                                id="iPassword" placeholder="Your password">
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @endif
                                <div class="form-text text-muted">
                                    <small>**Kosongkan password apabila tidak diubah</small>
                                </div>
                            </div>
                            <div class="form-group form-label-group">
                                <label for="iRePassword">Re Password</label>
                                <input type="password" name="repassword" 
                                class="form-control  {{ $errors->has('repassword')?'is-invalid':'' }}"
                                id="iRePassword" placeholder="Your password">
                                @if ($errors->has('repassword'))
                                <div class="invalid-feedback">{{$errors->first('repassword')}}</div>
                                @endif
                            </div>
                            <div class="form-group form-label-group">
                                <?php
                                    $val = old('akses',$us->akses);
                                ?>
                                <select name="akses" class="form-control {{ $errors->has('akses')?'is-invalid':'' }}" id="">
                                    <option value="" {{ $val==""?'selected':''}}>Pilih Akses Sebagai : </option>
                                    <option value="admin" {{ $val=="admin"?'selected':''}}>Admin</option>
                                    <option value="user" {{ $val=="user"?'selected':''}}>User</option>
                                </select>
                                @if ($errors->has('akses'))
                                    <div class="invalid-feddback">{{$errors->first('akses')}}</div>
                                @endif
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
</div>
@endsection