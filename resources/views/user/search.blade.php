@extends('user.layout')
@section('judul', 'Pencarian '.app('request')->input('q'))
@section('content')
<!-- Intro Banner  --> 
@include('user.intro_banner')

  <!-- Features Jobs -->
  <div class="section padding-top-60 padding-bottom-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-12"> 
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
            <span>Pencarian Produk</span>
            <h3>{{ucwords(app('request')->input('q'))}}</h3>
            <div class="utf-headline-display-inner-item">Pencarian Produk</div>
            <p class="utf-slogan-text">Ditemukan {{ $count }} produk dengan kata kunci "{{app('request')->input('q')}}".</p>
          </div>
          <div class="utf-listings-container-part compact-list-layout margin-top-35"> 
            @foreach ($posts as $post)   
			      <a href="{{route('user.product.single', ['slug' => $post->slug])}}" class="utf-job-listing utf-apply-button-item product-box"> 
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
              {{-- <span class="bookmark-icon"></span> --}}
            </a>
            @endforeach
		      </div>
          @if ($count > 10)
          <div class="utf-centered-button margin-top-10 loadmore_box">
            <a href="javascript:void(0)" id="loadmore" data-totalResult="{{ $count }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20 d-flex justify-content-center" style="width: 189.266px;">
              <div class="spin" style="display: none">
                  <span class="iconify" id="icon_loading" data-icon="mdi-loading" data-inline="false"></span>
              </div>
              <span class="before-load margin-left-10">
                Selanjutnya... <i class="icon-feather-chevrons-right"></i>
              </span>
            </a> 
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- Features Jobs / End --> 
  @endsection
  @push('scripts')
  <script>
      $(document).ready(function(){
        $(document).on('click','#loadmore', function(){
            var _totalCurrentResult=$('.product-box').length;
            // Ajax Reuqest
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:"{{route('user.product.loadmore')}}",
                type:'POST',
                dataType : 'html',
                data:{
                    skip:_totalCurrentResult,
                    q:"{{app('request')->input('q')}}"
                },
                beforeSend:function(){
                   $(".spin").show();
                   $(".before-load").html('Loading...');
                },
                success:function(response){
                    $(".utf-listings-container-part").append(response);
                    var _totalCurrentResult=$(".product-box").length;
                    var _totalResult=parseInt($("#loadmore").attr('data-totalResult'));
                    if(_totalCurrentResult==_totalResult){
                        $(".loadmore_box").remove();
                    }else{
                      $(".spin").hide();
                      $(".before-load").html('Selanjutnya...');
                    }
                }
            });
        });
      });
  </script>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
@endpush