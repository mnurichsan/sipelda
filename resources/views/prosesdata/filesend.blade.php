@extends('layouts.dashboard')
@section('judul','Data Terkirim')
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
                                <td> @if($d->status == "Di setujui") <span class="badge badge-pill badge-success">{{$d->status}}</span> @endif</td>
                                <td>
                                    <a href="{{route('terkirim.detail',$d->id)}}" class="btn btn-warning btn-sm"><i class="far fa-eye"></i> Lihat</a>
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