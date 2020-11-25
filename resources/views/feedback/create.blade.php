@extends('layouts.dashboard')
@section('judul','Feedback')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body text-center">
                    <img class="img-fluid" width="500px" src="{{asset('assets/img/feedback.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Feedback</h4>
            </div>
            <form action="{{route('feedback.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tuliskan Masukkan anda</label>
                        <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror" id="feedback"></textarea>
                        @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="footer">
                    <button class="btn btn-primary float-right">Kirim</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
@endsection
@section('js')
<script>
    CKEDITOR.replace('feedback');
</script>
@endsection