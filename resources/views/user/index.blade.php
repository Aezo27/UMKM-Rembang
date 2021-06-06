@extends('user.layout')
@section('judul', 'Home')
@section('content')
<!-- Intro Banner  --> 
@include('user.intro_banner')

<!-- Jobs Category Boxes -->
<div class="section margin-top-60 margin-bottom-70">
  <div class="container">
    <div class="row"> 
      <div class="col-xl-12">
        <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
          <span>Sedang Ramai</span>
          <h3>Produk Terlaris Saat Ini</h3>
          <div class="utf-headline-display-inner-item">Sedang Ramai</div>
          <p class="utf-slogan-text">{{$about->text_home}}.</p>
        </div>
      </div>
      @foreach ($posts as $post)
      <div class="col-xl-3 col-md-6 col-lg-4"> 
        <a href="{{route('user.product.single', ['slug' => $post->slug])}}" class="photo-box photo-category-box small" data-background-image="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}">
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