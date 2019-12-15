@extends('admin.main')
@section('title','User |')
@section('content')
<div class="container-fluid">
    @if (session('result')=='success')
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Saved!</strong> User berhasil ditambahkan.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @endif
     @if (session('result')=='delete')
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Deleted!</strong> User berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @endif
    @if (session('result')=='fail-delete')
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Failed!</strong> User gagal dihapus.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @endif
    @if (session('result')=='update')
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Updated!</strong> User berhasil diupdate.
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
    </div>        
    @endif
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{route('admin.user.add')}}" class="btn btn-info">[+] Tambah</a>
        </div>
        <div class="col-md-6 mb-3">
            <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{route('admin.user')}}" method="GET">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
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
    <div class="row mt-5">
            <div class="col">
              <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                  <h3 class="text-white mb-0">List User</h3>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Akses</th>
                        <th scope="col">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->akses}}</td>
                                <td>
                                    <a href="{{route('admin.user.edit',['id'=>$dt->id])}}" 
                                    class="btn btn-success btn-sm">
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
@push('modal')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapusnya?
                    <form action="{{route('admin.user')}}" method="post" id="form-delete">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" name="id" id="input-id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary btn-delete" type="button">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('js')
<script type="text/javascript">
    $(function(){
        $('.btn-trash').click(function(){
            id = $(this).attr('data-id');
            $('#input-id').val(id);
            $('#deleteModal').modal('show');
        });
        $('.btn-delete').click(function(){
            $('#form-delete').submit();
        });
    })
</script>    
@endpush