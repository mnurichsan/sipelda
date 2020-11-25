@extends('layouts.dashboard')
@section('judul','List Sektoral')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sektoralModal">
                    Tambah Data
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
                                <th>Created at</th>
                                <th>Update At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sektoral as $sek => $s)
                            <tr>
                                <td>
                                    {{ $sek + 1 }}
                                </td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->created_at}}</td>
                                <td>{{$s->updated_at}}</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-warning edit-btn-sektoral" data-toggle="modal" data-target="#sektoralModalEdit" data-id="{{$s->id}}" data-name="{{$s->name}}"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{route('sektoral.delete',$s->id)}}" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i> Delete</a>
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

<!-- modal add sektoral -->
<div class="modal fade" id="sektoralModal" tabindex="-1" role="dialog" aria-labelledby="sektoralModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('sektoral.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
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

<!-- modal edit sektoral -->
<div class="modal fade" id="sektoralModalEdit" tabindex="-1" role="dialog" aria-labelledby="sektoralModalEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="sektoralEdit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="id" readonly>
                        </div>
                        <label>Nama</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
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


        $('.edit-btn-sektoral').on('click', function() {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#sektoralModalEdit').modal('show');
        });

        $('#sektoralEdit').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: "POST",
                url: "/dashboard/sektoral/" + id + "/update",
                data: $('#sektoralEdit').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#sektoralModalEdit').modal('hide')
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