@extends('layouts.dashboard')
@section('judul','Permohonan Data Masuk')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
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
                                <th>Permohonan Data</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dat => $d)
                            <tr>
                                <td>
                                    {{ $dat + 1 }}
                                </td>
                                <td><a href="{{route('profile.detail',$d->user->id)}}">{{$d->user->name}}</a></td>
                                <td>{{$d->title}}</td>
                                <td>{{$d->tanggal_pengajuan->format('d-m-Y')}}</td>
                                <td>{{$d->tujuan}}</td>
                                <td> @if($d->status == "Belum di tinjau") <span class="badge badge-pill badge-info">{{$d->status}}</span>@elseif($d->status == "Menunggu") <span class="badge badge-pill badge-primary">{{$d->status}}</span> @endif</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm btn-show-permohonan" data-toggle="modal" data-id="{{$d->id}}" data-name="{{$d->user->name}}" data-title="{{$d->title}}" data-tanggal="{{$d->tanggal_pengajuan->format('d-m-Y')}}" data-tujuan="{{$d->tujuan}}" data-sektoral="{{$d->sektoral->name}}" data-keterangan="{{$d->keterangan}}"><i class="far fa-eye"></i> Lihat</a>
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
<!-- modal show sektoral -->
<div class="modal fade" id="showModalPermohonan" tabindex="-1" role="dialog" aria-labelledby="sektoralModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Permohonan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td style="width: 75%">
                                            <input class="form-control" type="text" id="name" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permohonan Data</td>
                                        <td><input class="form-control" type="text" id="title" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Sektoral</td>
                                        <td><input class="form-control" type="text" id="sektoral" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Tujuan Permohonan Data</td>
                                        <td><textarea class="form-control" id="tujuan" readonly></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Tambahan</td>
                                        <td><textarea class="form-control mt-3" id="keterangan" readonly></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pengajuan</td>
                                        <td><input class="form-control" type="text" id="tanggal" readonly></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input class="form-control" type="hidden" id="id" readonly>
                    <button class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="dataDiterima"><i class="fa fa-check" aria-hidden="true"></i> Terima</button>
                    <button class="btn btn-danger" id="dataDitolak"><i class="fa fa-times" aria-hidden="true"></i> Tolak</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {

        $('.btn-show-permohonan').on('click', function() {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#title').val($(this).data('title'));
            $('#sektoral').val($(this).data('sektoral'));
            $('#tujuan').val($(this).data('tujuan'));
            $('#keterangan').val($(this).data('keterangan'));
            $('#tanggal').val($(this).data('tanggal'));
            $('#showModalPermohonan').modal('show');
        });

        $('#dataDiterima').on('click', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "data-diterima/" + id,
                success: function(response) {
                    console.log(response);
                    $('#showModalPermohonan').modal('hide')
                    swal("success", "Data di terima", "success");
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    alert('data not saved');
                }
            });

        });

        $('#dataDitolak').on('click', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "data-ditolak/" + id,
                success: function(response) {
                    console.log(response);
                    $('#showModalPermohonan').modal('hide')
                    swal("success", "Data di tolak", "success");
                    location.reload();
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