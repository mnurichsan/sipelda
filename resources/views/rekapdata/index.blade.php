@extends('layouts.dashboard')
@section('judul','Rekap data permohonan')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="#" class="btn btn-warning btn-refresh">
                    Refresh
                </a>
                <!-- <a href="#" class="btn btn-success ml-2"><i class="fas fa-file-excel"></i> Export Excel</a>
                <a href="#" class="btn btn-danger ml-2"><i class="fas fa-file-pdf"></i> Export Pdf</a> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Nama Pemohon</th>
                                <th>Permohonan Data</th>
                                <th>Sektoral</th>
                                <th>Tujuan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permintaanData as $per => $p)
                            <tr>
                                <td>
                                    {{$per + 1}}
                                </td>
                                <td>
                                    {{ $p->user->name}}
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
                                    @if($p->status == "Belum di tinjau") <span class="badge badge-pill badge-info">{{$p->status}}</span>@elseif($p->status == "Menunggu") <span class="badge badge-pill badge-primary">{{$p->status}}</span>@elseif($p->status == "Di setujui") <span class="badge badge-pill badge-success">{{$p->status}}</span> @elseif("Di Tolak") <span class="badge badge-pill badge-danger">{{$p->status}} @endif
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