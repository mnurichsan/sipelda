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
                 <div class="profile-widget-name">{{ Auth::user()->name }}
                     <div class="text-muted d-inline font-weight-normal">
                         <div class="slash"></div> {{ Auth::user()->instansi_organisasi }}
                     </div>
                 </div>
             </div>

         </div>
         <div class="card shadow">
             <div class="card-header">
                 <h4>Ubah Password</h4>
             </div>
             <form action="{{route('password.update',Auth::user()->id)}}" method="POST" action="">
                 @csrf
                 <div class="card-body">
                     <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" name="password">
                     </div>
                     <div class="form-group">
                         <label>Konfirmasi Password</label>
                         <input type="password" class="form-control" name="kpassword">
                     </div>
                 </div>
                 <div class="card-footer float-right">
                     <button class="btn btn-primary" type="submit">Ubah Password</button>
                 </div>
             </form>
         </div>
     </div>
     <div class="col-12 col-md-12 col-lg-7">
         <div class="card shadow">
             <form method="post" action="{{route('profile.update',Auth::user()->id)}}" class="needs-validation" novalidate="">
                 @csrf
                 <div class="card-header">
                     <h4>Edit Profile</h4>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="form-group col-12">
                             <label>Nama Lengkap</label>
                             <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}" name="name" required="">
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
                             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" required="">
                             @error('email')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-md-5 col-12">
                             <label>Phone</label>
                             <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{Auth::user()->no_telp}}">
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
                             <select class="form-control selectric @error('jenis_identitas') is-invalid @enderror" name="jenis_identitas">
                                 <option value="" holder>-- PILIH --</option>
                                 <option value="KTP" @if(Auth::user()->jenis_identitas == "KTP") selected @endif</option>KTP</option>
                                 <option value="SIM" @if(Auth::user()->jenis_identitas == "SIM") selected @endif</option>SIM</option>
                                 <option value="PASSPORT" @if(Auth::user()->jenis_identitas == "PASSPORT") selected @endif>PASSPORT</option>
                                 <option value="KARTU MAHASISWA" @if(Auth::user()->jenis_identitas == "KARTU MAHASISWA") selected @endif>KARTU MAHASISWA</option>
                             </select>
                             @error('jenis_identitas')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-6">
                             <label for="ni">No Identitas</label>
                             <input id="ni" type="text" class="form-control @error('no_identitas') is-invalid @enderror" name="no_identitas" value="{{Auth::user()->no_identitas}}">
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
                             <input id="io" type="text" class="form-control @error('instansi_organisasi') is-invalid @enderror" name="instansi_organisasi" value="{{Auth::user()->instansi_organisasi}}">
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
                             <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{Auth::user()->nip}}">
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
                             <input id="unit_kerja" type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" value="{{Auth::user()->unit_kerja}}">
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
                             <input id="nt" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{Auth::user()->no_telp}}">
                             @error('no_telp')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                         <div class="form-group col-6">
                             <label for="nwa">No Whatsapp</label>
                             <input id="nwa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{Auth::user()->no_wa}}">
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
                                 <option value="{{$n['name']}}" @if($n['name']==Auth::user()->negara) selected @endif >{{$n['name']}}</option>
                                 @endforeach
                             </select>
                             @error('negara')
                             <div class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </div>
                             @enderror
                         </div>
                     </div>
                 </div>
                 <div class="card-footer text-right">
                     <button class="btn btn-primary" type="submit">Update </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 @endsection