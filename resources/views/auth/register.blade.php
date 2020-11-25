<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Sipelda</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logosulsel.png') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <h1 class="text">SIPELDA</h1>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="name">Nama Lengkap</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" autofocus>
                                            @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                                        @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrengt @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password">
                                            @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation">
                                            @error('password-confirm')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-divider">
                                        Data
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="ji">Jenis Identitas</label>
                                            <select class="form-control selectric @error('jenis_identitas') is-invalid @enderror" name="jenis_identitas">
                                                <option value="" holder>-- PILIH --</option>
                                                <option>KTP</option>
                                                <option>SIM</option>
                                                <option>PASSPORT</option>
                                                <option>KARTU MAHASISWA</option>
                                            </select>
                                            @error('jenis_identitas')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="ni">No Identitas</label>
                                            <input id="ni" type="text" class="form-control @error('no_identitas') is-invalid @enderror" name="no_identitas" value="{{old('no_identitas')}}">
                                            @error('no_identitas')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="io">Instansi Atau Organisasi</label>
                                            <input id="io" type="text" class="form-control @error('instansi_organisasi') is-invalid @enderror" name="instansi_organisasi" value="{{old('instansi_organisasi')}}">
                                            @error('instansi_organisasi')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="nip">NIP</label>
                                            <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{old('nip')}}">
                                            @error('nip')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="unit_kerja">Unit Kerja</label>
                                            <input id="unit_kerja" type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" value="{{old('unit_kerja')}}">
                                        </div>
                                        @error('unit_kerja')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nt">No Telp</label>
                                            <input id="nt" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{old('no_telp')}}">
                                            @error('no_telp')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nwa">No Whatsapp</label>
                                            <input id="nwa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{old('no_wa')}}">
                                            @error('no_wa')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Negara</label>
                                            <select class="form-control selectric @error('negara') is-invalid @enderror" name="negara">
                                                <option value="" holder>-- PILIH --</option>
                                                @foreach($negara as $n)
                                                <option value="{{$n['name']}}">{{$n['name']}}</option>
                                                @endforeach
                                            </select>
                                            @error('negara')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input @error('agree') is-invalid @enderror" id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                            @error('agree')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; SIPELDA 2020
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js') }}">
    </script>
    <script src="{{asset('assets/modules/popper.js') }}"></script>
    <script src="{{asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
    <script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('assets/js/page/auth-register.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>