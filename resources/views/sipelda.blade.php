<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/img/logosulsel.png') }}">
    <!-- Css Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets_frontend/assets/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- style default -->
    <link rel="stylesheet" href="{{asset('assets_frontend/assets/css/style-default.css')}}">

    <title>Sistem Informasi Pelayanan Data</title>
</head>

<body>
    <div class="inner-bg">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 offset-sm-2">
                    <div class="title">
                        <h1 class="text-center">SIPELDA</h1>
                        <h1 class="text-center">Sistem Informasi Pelayanan Data</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                    <div class="wrapper mt-4">
                        <div class="text-center">
                            <h3 class="text-dark">Selamat Datang</h3>
                        </div>
                        <div class="btn-link-login mt-4">
                            <a href="@if(Auth::check() ) {{  route('home') }} @else {{route('login')}} @endif" class="btn">
                                Log In/Register
                            </a>
                        </div>
                        <div class="btn-link-web">
                            <a href="https://data.sulselprov.go.id/" target="_blank" class="btn">
                                Website One Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="d-flex">
        <div class="link-info">
            <ul class="footer-nav">
                <li class="footer-item">
                    <p>Statistik Sektoral <br> Diskominfo-SP</p>
                </li>
                <li class="footer-item">
                    <span>Lokasi :</span>
                    <a href="#" class="footer-link">
                        <br>
                        <b>Pemerintah Provinsi Sulawesi Selatan</b>
                        <br>Jl. Urip Sumoharjo No. 269, Panaikang
                        Kec. Panakukkang, Kota Makassar
                        Sulawesi Selatan, 90231</a>
                </li>
            </ul>
            <p class="copyright">&copy SIPELDA 2020</p>
        </div>
        <div class="sosial-link">
            <ul>
                <li>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram-square"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-youtube-square"></i></a>
                </li>
            </ul>
        </div>
    </footer>


    <script src="{{asset('assets_frontend/assets/bootstrap/assets/js/vendor/jquery-slim.min.js')}}"></script>
    <script src="{{asset('assets_frontend/assets/bootstrap/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets_frontend/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>