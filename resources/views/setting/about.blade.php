 @extends('layouts.dashboard')
 @section('judul','About Us')
 @section('content')
 <div class="container">
     <div class="row">
         <div class="col">
             <div class="card shadow">
                 <div class="card-body text-center">
                     <img class="img-fluid" width="500px" src="{{asset('assets/img/about.jpg')}}" alt="">
                     <div class="text-center mt-3">
                         <h3>Aplikasi Sistem Informasi Pelayanan Data</h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection