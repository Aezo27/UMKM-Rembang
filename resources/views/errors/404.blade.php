@extends('user.layout')
@section('judul', 'Hubungi Kami')
@section('content')
<!-- Intro Banner  --> 
  <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Halaman Tidak Ditemukan</h2>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->

<div class="container">
    <div class="row">
      <div class="col-xl-12">
        <section id="utf-not-found-item" class="center margin-top-25 margin-bottom-40">
          <div class="utf-error-img"><img src="{{asset('assets_user/img/error-404.png')}}" alt=""></div>
		  <h1>Page Not Found</h1>
          <p>Oops!!!! halaman yang anda tuju sepertinya tidak ada!.</p>
		  <div class="utf-centered-button">
			<a href="{{route('home')}}" class="button ripple-effect big margin-top-10 margin-bottom-20">Beranda</a>
		  </div>
        </section>        
      </div>
    </div>
  </div>

  @endsection
  @push('scripts')
  @endpush