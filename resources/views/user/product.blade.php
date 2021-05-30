@extends('user.layout')
@section('judul', 'Daftar Produk')
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

  <!-- Features Jobs -->
  <div class="section padding-top-60 padding-bottom-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-12"> 
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
            <span>Daftar Produk</span>
            <h3>Daftar Produk UMKM</h3>
            <div class="utf-headline-display-inner-item">Daftar Produk</div>
            <p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
          </div>
          <div class="utf-listings-container-part compact-list-layout margin-top-35"> 
            @foreach ($posts as $post)   
			      <a href="{{route('user.single', ['slug' => $post->slug])}}" class="utf-job-listing utf-apply-button-item"> 
              <div class="utf-job-listing-details"> 
                <div class="utf-job-listing-company-logo"> <img src="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}" alt="{{$post->title}}"> </div>
                <div class="utf-job-listing-description">
                  <span class="dashboard-status-button utf-job-status-item green">{{ucfirst($post->categories->category_name)}}</span>
                  <h3 class="utf-job-listing-title">{{ucwords($post->title)}}</h3>
                  <div class="utf-job-listing-footer">
                    <p>{{strip_tags(strlen($post->post_details->content) > 250 ? substr($post->post_details->content,0,250).'...' : $post->post_details->content)}}</p>
                  </div>
                </div>
                <span class="list-apply-button ripple-effect">Selengkapnya <i class="icon-material-outline-shopping-cart"></i></span> 
              </div>
              <span class="bookmark-icon"></span>
            </a>
            @endforeach
		      </div>
          <div class="utf-centered-button margin-top-10">
          <a href="javascript:void()" id="loadmore" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20 d-flex justify-content-center" style="width: 189.266px;">
            <div class="spin" style="display: none">
                <span class="iconify" id="icon_loading" data-icon="mdi-loading" data-inline="false"></span>
            </div>
            <span class="before-load margin-left-10">
              Selanjutnya... <i class="icon-feather-chevrons-right"></i>
            </span>
          </a> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Features Jobs / End --> 
  @endsection
  @push('scripts')
  <script>
      $(document).ready(function(){
        $(document).on('click','#loadmore',function(){
          $(".spin").show();
          $(".before-load").html('Loading...');
        });
      })
  </script>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
@endpush