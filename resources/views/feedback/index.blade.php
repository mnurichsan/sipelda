@extends('layouts.dashboard')
@section('judul','Feedback User')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Feedback User</h4>
                </div>
                <div class="card-body">
                    @foreach($feedbackAll as $feedback)
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="avatar">
                            <div class="media-body">
                                <div class="float-right text-primary">{{$feedback->created_at->diffForHumans()}}</div>
                                <div class="media-title">{{$feedback->userFeedback->name}}</div>
                                <span class="text-small text-muted">{!! $feedback->feedback !!}</span>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                    <div class="text-center pt-1 pb-1">
                        {{$feedbackAll->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection