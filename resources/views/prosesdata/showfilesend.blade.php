@extends('layouts.dashboard')
@section('judul','Show Detail Permohonan Data')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <a href="@if(Auth::user()->id_role == 1){{route('data.terkirim')}} @else {{route('permintaan.index')}} @endif" class="btn btn-sm btn-success mr-5">Back</a><br>
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
                                @if(Auth::user()->id_role == 2)
                                <tr>
                                    <td>Status</td>
                                    <td>: {{$data->status}}</td>
                                </tr>
                                @endif
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
            <div class="card-header">
                <h6>File Data</h6>
            </div>
            <div class="card-body">
                @if($data->status == "Di setujui" )
                @if(Auth::user()->id_role == 2)
                <div class="text-left text-danger">
                    <strong>Keterangan : File dapat di download dalam {{ \Carbon\Carbon::parse( $data->data->show_at )->diffInDays( $data->data->end_at ) }} Hari atau berakhir pada tanggal {{$data->data->end_at->format('d-m-Y')}}</strong>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped mt-2" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">Nama File</th>
                                <th scope="col">File</th>
                                @if(Auth::user()->id_role == 2)
                                <th scope="col">Download</th>
                                @endif
                                @if(Auth::user()->id_role == 1)
                                <th scope="col">Di kirim pada</th>
                                <th scope="col">Di hentikan pada</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($file as $f)
                            <tr>
                                <td>{{$f->permintaanData->title}}</td>
                                <td>{{ $f->data}}</td>
                                @if(Auth::user()->id_role == 2)
                                <td>@if($f->end_at <= now())<h6 class="text-danger">Expired!!</h6>@else<a class="btn btn-success" href="{{asset('uploads/'.$data->data->data) }}">Download</a>@endif</td>
                                @endif
                                @if(Auth::user()->id_role == 1)
                                <td>{{$f->show_at->format('d-m-Y')}}</td>
                                <td>{{$f->end_at->format('d-m-Y')}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            @if($data->status == "Belum di tinjau")
            <strong>Permohonan data belum di tinjau</strong>
            @elseif($data->status == "Menunggu")
            <strong>Menunggu...</strong>
            <p>File sedang di proses</p>
            @else
            <strong class="text-danger">Maaf.. permohonan data di tolak</strong>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection