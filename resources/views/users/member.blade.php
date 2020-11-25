@extends('layouts.dashboard')
@section('judul','User Members')
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
                                <th>Email</th>
                                <th>Di buat pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $mem => $m)
                            <tr>
                                <td>
                                    {{ $mem + 1 }}
                                </td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->email}}</td>
                                <td>{{$m->created_at}}</td>
                                <td>
                                    <a href="{{route('profile.detail',$m->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>

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