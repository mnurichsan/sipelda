@extends('layouts.dashboard')
@section('judul','Dashboard')
@section('content')
<div class="container">
    @if(Auth::user()->id_role == 2)
    <div class="row justify-content-center">

        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Selamat Datang, {{Auth::user()->name}}</h4>
                    <div class="card-header-action">
                        <a href="{{route('permintaan.index')}}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Ajukan Permohonan Data
                        </a>
                    </div>
                </div>
                <div class="card-body text-center">
                    <img src="{{asset('assets/img/member.svg')}}" class="img-fluid " width="500px">
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->id_role == 1)
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-file-download"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Masuk</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataMasuk }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Di Proses</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataProses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-file-upload"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Terkirim</h4>
                    </div>
                    <div class="card-body">
                        {{ $dataTerkirim }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah User</h4>
                    </div>
                    <div class="card-body">
                        {{ $jumlahUser }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 mb-4">
            <div class="card" id="mycard-dimiss">
                <div class="card-header">
                    <h4>Tanggal, {{now()->format('d-m-Y')}}</h4>
                    <div class="card-header-action">
                        <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-danger" href="#"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                            <h2>Welcome Back, {{Auth::user()->name}}!</h2>
                            <p class="lead">This page is a place to manage data.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Jumlah Data Permohonan Berdasarkan Sektoral</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Feedback User</h4>
            </div>
            <div class="card-body">
                @foreach($feedback as $feed)
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                        <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="avatar">
                        <div class="media-body">
                            <div class="float-right text-primary">{{$feed->created_at->diffForHumans()}}</div>
                            <div class="media-title">{{$feed->userFeedback->name}}</div>
                            <span class="text-small text-muted">{!! $feed->feedback !!}</span>
                        </div>
                    </li>
                </ul>
                @endforeach
                <div class="text-center pt-1 pb-1">
                    <a href="{{route('feedback.index')}}" class="btn btn-primary btn-lg btn-round">
                        View All
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
{!! $chart->script() !!}
@endsection