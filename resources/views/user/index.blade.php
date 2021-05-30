@extends('user.layout')
@section('judul', 'Home')
@section('content')
<!-- Intro Banner  --> 
<div class="intro-banner">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">
        <div class="utf-banner-headline-text-part">
          <h3>Temukan Produk UMKM Berkualitas Sekarang!</h3>
          <span>Terdapat lebih dari 50 produk umkm tersedia.</span> 
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="utf-trending-silver-item"><span class="utf-trending-black-item">Sedang Ramai:</span> Kripik,  Gorengan</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="utf-intro-banner-search-form-block margin-top-40"> 
          <div class="utf-intro-search-field-item">
            <input id="intro-keywords" type="text" placeholder="Cari Produk Terbaik...">
            <i class="icon-feather-search"></i>
          </div>
          <div class="utf-intro-search-button">
            <button class="button ripple-effect"><i class="icon-material-outline-search"></i> Cari Produk </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="background-image-container mySlides fade" style="background-image: url({{asset('assets_user/img/bg-1.jpg')}});"></div>
  <div class="background-image-container mySlides fade" style="background-image: url({{asset('assets_user/img/bg-2.jpg')}});"></div>
</div>

<!-- Jobs Category Boxes -->
<div class="section margin-top-60 margin-bottom-70">
  <div class="container">
    <div class="row"> 
      <div class="col-xl-12">
        <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
          <span>Sedang Ramai</span>
          <h3>Produk Terlaris Saat Ini</h3>
          <div class="utf-headline-display-inner-item">Sedang Ramai</div>
          <p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
      @foreach ($posts as $post)
      <div class="col-xl-3 col-md-6 col-lg-4"> 
        <a href="{{route('user.single', ['slug' => $post->slug])}}" class="photo-box photo-category-box small" data-background-image="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}">
          <div class="utf-opening-position-counter-item">{{$post->views}}x dibuka</div>	
          <div class="utf-opening-box-content-part">
            <h3>{{$post->title}}</h3>				
          </div>
        </a> 
      </div>
      @endforeach
      <div class="col-xl-12 utf-centered-button margin-top-10">
        <a href="{{route('user.product')}}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" style="width: 218.156px;">Lihat Semua Produk <i class="icon-feather-chevrons-right"></i></a> 
      </div>
    </div>
  </div>
</div>
<!-- Jobs Category Boxes / End --> 
@endsection