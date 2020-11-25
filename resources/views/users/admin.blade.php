@extends('layouts.dashboard')
@section('judul','User Admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#adminModal">
                    Tambah Admin
                </a>
                <a href="#" class="btn btn-warning btn-refresh ml-2">
                    Refresh
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Di buat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $adm => $a)
                            <tr>
                                <td>
                                    {{ $adm + 1 }}
                                </td>
                                <td>{{$a->name}}</td>
                                <td>{{$a->email}}</td>
                                <td>{{$a->created_at}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning edit-btn-users-admin" data-toggle="modal" data-id="{{$a->id}}" data-name="{{$a->name}}" data-email="{{$a->email}}"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{route('admin.destroy',$a->id)}}" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

<!-- modal add Users Admin -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit Users Admin -->
<div class="modal fade" id="adminModalEdit" tabindex="-1" role="dialog" aria-labelledby="adminModalEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="adminEdit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" id="id" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {


        $('.edit-btn-users-admin').on('click', function() {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#email').val($(this).data('email'));
            $('#adminModalEdit').modal('show');
        });

        $('#adminEdit').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: "POST",
                url: "/dashboard/users/admin/" + id + "/update",
                data: $('#adminEdit').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#adminModalEdit').modal('hide')
                    location.reload();
                    swal("success", "Data di update", "success");
                },
                error: function(error) {
                    console.log(error);
                    alert('data not saved');
                }
            });

        });
    });
</script>
@endsection