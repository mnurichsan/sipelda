@extends('layouts.dashboard')
@section('judul','Permohonan Data')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Profil</h4>
                <div class="card-header-action">
                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                </div>
            </div>
            <div class="collapse show" id="mycard-collapse">
                <div class="card-body">
                    <div class="card author-box card-primary">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{Auth::user()->name}}</a>
                                </div>
                                <div class="author-box-job">{{ Auth::user()->instansi_organisasi }}</div>
                                <div class="author-box float-center mt-5">
                                    <p>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Negara</td>
                                                    <td> <input type="text" class="form-control" value="{{Auth::user()->negara}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Identitas</td>
                                                    <td> <input type="text" class="form-control" value="{{Auth::user()->jenis_identitas}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>No Identitas</td>
                                                    <td><input type="text" class="form-control" value="{{Auth::user()->no_identitas}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>Unit Kerja</td>
                                                    <td><input type="text" class="form-control" value="{{Auth::user()->unit_kerja}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>NIP</td>
                                                    <td><input type="text" class="form-control" value="{{Auth::user()->nip}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>No Telp</td>
                                                    <td><input type="text" class="form-control" value="{{Auth::user()->no_telp}}" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>No Whatsapp</td>
                                                    <td><input type="text" class="form-control" value="{{Auth::user()->no_wa}}" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Tambah Permintaan Data</h4>
            </div>
            <form action="{{route('permintaan.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Permohonan Data</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sektoral</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('sektoral') is-invalid @enderror" name="sektoral">
                                <option value="" holder>-- PILIH --</option>
                                @foreach($sektorals as $sektoral)
                                <option value="{{$sektoral->id}}">{{$sektoral->name}}</option>
                                @endforeach
                            </select>
                            @error('sektoral')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tujuan Penggunaan Data</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('tujuan') is-invalid @enderror" name="tujuan"></textarea>
                            @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"></textarea>
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center ">
                        <div class="card shadow-sm">
                            <div class=" card-header">
                                <div class="text-danger">
                                    <h5>Penting !!</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                Perjanjian Penggunaan Data Penerima data menyetujui bahwa pemakaian data akan mengikuti syarat-syarat yang ditentukan oleh Diskominfo yaitu:
                                <ol>
                                    <li>Penerima data tidak akan membuat salinan dari rekaman tersebut untuk keperluan orang lain atau organisasi lain..</li>
                                    <li>Penerima data akan memakai rekaman tersebut hanya untuk keperluan penelitian dan analisia dengan tujuan utama memperdalam pengertian tentang keadaan Indonesia.</li>
                                    <li>Penggunaan rekaman untuk keperluan lain yang menyimpang dari syarat-syarat di atas perlu mendapat persetujuan teknis terlebih dahulu .</li>
                                    <li>Penerima data diharapkan menyerahkan hasil penelitiannya kepada Diskominfo</li>
                                </ol>
                            </div>
                            <div class="card-footer">
                                <div class="form-check">
                                    <input type="checkbox" name="checkbox" class="form-check-input @error('checkbox') is-invalid @enderror" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Saya telah membaca dan setuju dengan ketentuan berlaku</label>
                                    @error('checkbox')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4 float-right">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 ">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
                                <th>Permohonan Data</th>
                                <th>Sektoral</th>
                                <th>Tujuan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permintaanData as $per => $p)
                            <tr>
                                <td>
                                    {{$per + 1}}
                                </td>
                                <td>
                                    {{$p->title}}
                                </td>
                                <td>
                                    {{$p->sektoral->name}}
                                </td>
                                <td>
                                    {{$p->tujuan}}
                                </td>
                                <td>
                                    {{$p->tanggal_pengajuan->format('d-m-Y')}}
                                </td>
                                <td>
                                    @if($p->status == "Belum di tinjau") <span class="badge badge-pill badge-info">{{$p->status}}</span>@elseif($p->status == "Menunggu") <span class="badge badge-pill badge-primary">{{$p->status}}</span>@elseif($p->status == "Di setujui") <span class="badge badge-pill badge-success">{{$p->status}} @elseif("Di Tolak") <span class="badge badge-pill badge-danger">{{$p->status}} </span> @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="{{route('terkirim.detail',$p->id)}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                            @if($p->status == "Belum di tinjau")
                                            <a href="#" class="dropdown-item has-icon edit-btn-permintaan" data-toggle="modal" data-target="#permintaanModalEdit" data-id="{{$p->id}}" data-title="{{$p->title}}" data-sektoral="{{$p->id_sektoral}}" data-tujuan="{{$p->tujuan}}" data-keterangan="{{$p->keterangan}}"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('permintaan.delete',$p->id)}}" class="dropdown-item has-icon text-danger btn-hapus"><i class="far fa-trash-alt"></i> Delete</a>
                                            @endif
                                        </div>
                                    </div>
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
<!-- modal edit sektoral -->
<div class="modal fade" id="permintaanModalEdit" tabindex="-1" role="dialog" aria-labelledby="sektoralModalEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="permintaanEdit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="id" readonly>
                        </div>
                        <label>Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" required>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Sektoral</label>
                        <select class="form-control selectric @error('sektoral') is-invalid @enderror" id="sektoral" name="sektoral">
                            <option value="" holder>-- PILIH --</option>
                            @foreach($sektorals as $sektoral)
                            <option value="{{$sektoral->id}}">{{$sektoral->name}}</option>
                            @endforeach
                        </select>
                        @error('sektoral')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tujuan Penggunaan Data</label>
                        <textarea class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan"></textarea>
                        @error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"></textarea>
                        @error('keterangan')
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
        $('.edit-btn-permintaan').on('click', function() {
            $('#id').val($(this).data('id'));
            $('#title').val($(this).data('title'));
            $('#sektoral').val($(this).data('sektoral')).change();
            $('#tujuan').val($(this).data('tujuan'));
            $('#keterangan').val($(this).data('keterangan'));
            $('#permintaanModalEdit').modal('show');
        });

        $('#permintaanEdit').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: "POST",
                url: "/dashboard/permintaan-data/" + id + "/update",
                data: $('#permintaanEdit').serialize(),
                success: function(response) {
                    console.log(response);
                    $('#permintaanModalEdit').modal('hide')
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