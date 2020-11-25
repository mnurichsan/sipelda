@extends('layouts.dashboard')
@section('judul','Show Detail Permohonan Data')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="{{route('data.proses')}}" class="btn btn-sm btn-success mr-5">Back</a><br>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$data->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Permohonan Data</td>
                                    <td>: {{$data->title}}</td>
                                </tr>
                                <tr>
                                    <td>Sektoral</td>
                                    <td>: {{$data->sektoral->name}}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan Permohonan Data</td>
                                    <td>: {{$data->tujuan}}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan Tambahan</td>
                                    <td>: @if($data->keterangan == "") - @else {{ $data->keterangan }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengajuan</td>
                                    <td>: {{$data->tanggal_pengajuan->format('d-m-Y')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <h6 class="mt-2 ml-2">Masukkan File Yang Ingin Di Kirim</h6>
            <div class="card-header">
                <a href="#" class="btn btn-primary btn-add-file" data-toggle="modal" data-target="#addfileModal"><i class="fas fa-plus"></i> Tambah file</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">Nama File</th>
                                <th scope="col">File</th>
                                <th scope="col">Show at</th>
                                <th scope="col">End at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($fileData != null)
                            @foreach($fileData as $f)
                            <tr>
                                <td>{{Str::words($f->permintaanData->title, $words = 3, $end = '...')}}</td>
                                <td><a href="{{asset('uploads/'.$f->data) }}">{{Str::words($f->data, $words = 3, $end = '...')}}</a></td>
                                <td>{{$f->show_at->format('d-m-Y')}}</td>
                                <td>{{$f->end_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-edit-file" data-toggle="modal" data-target="#editfileModal" data-permintaan="{{$data->id}}" data-id="{{$f->id}}" data-file="{{$f->data}}" data-show="{{$f->show_at->format('Y-m-d')}}" data-end="{{$f->end_at->format('Y-m-d')}}"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{route('data.didelete',[$data->id,$f->id])}}" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                @if($fileData->isNotEmpty())
                <a href="{{route('data.dikirim',$data->id)}}" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</a>
                @endif
                <a href="{{route('data.ditolak',$data->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Di Batalkan</a>
            </div>

        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- modal add file !-->
<div class="modal fade" id="addfileModal" tabindex="-1" role="dialog" aria-labelledby="addfileModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('data.disetujui',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="data" type="file" multiple />
                    </div>

                    <div class="form-group">
                        <label>Di Tampilkan Pada</label>
                        <input type="text" class="form-control datepicker" name="show_at">
                    </div>

                    <div class="form-group">
                        <label>Di Hentikan Pada</label>
                        <input type="text" class="form-control datepicker" name="end_at">
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-warning">Batal Upload</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                    <a href="" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Di Batalkan</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit data !-->
<div class="modal fade" id="editfileModal" tabindex="-1" role="dialog" aria-labelledby="editfileModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="fileEdit" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" id="permintaan" name="permintaan" type="hidden" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="id" name="id" type="hidden" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="file" name="data" type="file" multiple />
                        <p id="datap"></p>
                    </div>

                    <div class="form-group">
                        <label>Di Tampilkan Pada</label>
                        <input type="text" class="form-control datepicker" id="show_at" name="show_at">
                    </div>

                    <div class="form-group">
                        <label>Di Hentikan Pada</label>
                        <input type="text" class="form-control datepicker" id="end_at" name="end_at">
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-warning">Batal Upload</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {


        $('.btn-edit-file').on('click', function() {
            $('#permintaan').val($(this).data('permintaan'));
            $('#id').val($(this).data('id'));
            var id = $(this).data('file');
            $('#datap').text(id);
            $('#show_at').val($(this).data('show'));
            $('#end_at').val($(this).data('end'));
            $('#editfileModal').modal('show');
        });

        // $('#fileEdit').on('submit', function(e) {
        //     e.preventDefault();
        //     var id = $('#id').val();
        //     var dataId = $('#permintaan').val();
        //     $.ajax({
        //         type: "POST",
        //         contentType: false,
        //         enctype: 'multipart/form-data',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "/dashboard/data/data-diupdate/" + dataId + "/file/" + id,
        //         data: $('#fileEdit').serialize(),
        //         success: function(response) {
        //             console.log(response);
        //             $('#editfileModal').modal('hide')
        //             location.reload();
        //             swal("success", "Data di update", "success");
        //         },
        //         error: function(error) {
        //             console.log(error);
        //             alert('data not saved');
        //         }
        //     });

        // });
    });
</script>
@endsection