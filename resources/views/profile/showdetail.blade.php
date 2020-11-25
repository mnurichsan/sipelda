 @extends('layouts.dashboard')
 @section('judul','Profile')
 @section('content')
 <div class="row mt-sm-4">
     <div class="col-12 col-md-12 col-lg-5">
         <div class="card profile-widget shadow">
             <div class="profile-widget-header">
                 <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
             </div>
             <div class="profile-widget-description">
                 <div class="profile-widget-name">{{ $user->name }}
                     <div class="text-muted d-inline font-weight-normal">
                         <div class="slash"></div> {{ $user->instansi_organisasi }}
                     </div>
                 </div>
             </div>

         </div>

     </div>
     <div class="col-12 col-md-12 col-lg-7">
         <div class="card shadow">
             <form method="post" action="" class="needs-validation" novalidate="">
                 @csrf
                 <div class="card-header">
                     <h4>Detail Profile</h4>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="form-group col-12">
                             <label>Nama Lengkap</label>
                             <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name" required="" readonly>
                             @error('name')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-7 col-12">
                             <label>Email</label>
                             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" required="" readonly>
                             @error('email')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-md-5 col-12">
                             <label>Phone</label>
                             <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->no_telp}}" readonly>
                             @error('phone')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-6">
                             <label for="ji">Jenis Identitas</label>
                             <select class="form-control selectric @error('jenis_identitas') is-invalid @enderror" name="jenis_identitas" readonly>
                                 <option value="" holder>-- PILIH --</option>
                                 <option value="KTP" @if($user->jenis_identitas == "KTP") selected @endif</option>KTP</option>
                                 <option value="SIM" @if($user->jenis_identitas == "SIM") selected @endif</option>SIM</option>
                             </select>
                             @error('jenis_identitas')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-6">
                             <label for="ni">No Identitas</label>
                             <input id="ni" type="text" class="form-control @error('no_identitas') is-invalid @enderror" name="no_identitas" value="{{$user->no_identitas}}" readonly>
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
                             <input id="io" type="text" class="form-control @error('instansi_organisasi') is-invalid @enderror" name="instansi_organisasi" value="{{$user->instansi_organisasi}}" readonly>
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
                             <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{$user->nip}}" readonly>
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
                             <input id="unit_kerja" type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" value="{{$user->unit_kerja}}" readonly>
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
                             <input id="nt" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{$user->no_telp}}" readonly>
                             @error('no_telp')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-6">
                             <label for="nwa">No Whatsapp</label>
                             <input id="nwa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{$user->no_wa}}" readonly>
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
                             <select class="form-control selectric @error('negara') is-invalid @enderror" name="negara" readonly>
                                 <option value="{{$user->negara}}">{{$user->negara}}</option>
                             </select>
                             @error('negara')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 @endsection