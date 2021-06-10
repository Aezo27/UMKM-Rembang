@extends('user.layout')
@section('judul', 'Daftar Produk')
@section('content')
<!-- Intro Banner  --> 
  <!-- Titlebar -->
  <div class="single-page-header" data-background-image="{{asset('assets_user/img/bg-3.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="utf-single-page-header-inner-aera">
            <div class="utf-left-side">
              <div class="utf-header-image"><a href="h#"><img src="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}" alt="{{$post->title}}"></div>
              <div class="utf-header-details">
                <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i> {{ucfirst($post->categories->category_name)}}</span>
                <ul>
                  <li>{{ucwords($post->post_contacts->address)}}</li>				  
                </ul>
                <h3>{{ucwords($post->title)}}</span></h3>
                @foreach ($post->tags as $tag)
                  <h5> {{ucfirst($tag->tag_name)}}</h5>
                @endforeach
				        {{-- <div class="utf-star-rating" data-rating="5"></div>                 --}}
              </div>
            </div>
            <div class="utf-right-side">
              <div class="salary-box">
                <a target="_blank" rel="noopener noreferrer" onclick="incCount()" href="{{$post->post_contacts->whatsapp != null ? 'https://wa.me/'.$post->post_contacts->whatsapp.'?text=Halo+admin%2C+saya+ingi+memesan+'.urlencode($post->title) : 'tel:'.$post->post_contacts->phone}}" class="button save-job-btn">Beli Sekarang <i class="icon-material-outline-add-shopping-cart"></i></a> 		  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->
  <div class="container">
    <div class="row"> 
      <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
        <div class="utf-single-page-section-aera">
          <div class="job-description-image-aera d-flex justify-content-center">
            <img src="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}" alt="">
          </div>	
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-description"></i> Tentang Produk</h3>
          </div>
          {!! $post->post_details->content !!}
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12">
              <a target="_blank" rel="noopener noreferrer" onclick="incCount()" href="{{$post->post_contacts->whatsapp != null ? 'https://wa.me/'.$post->post_contacts->whatsapp.'?text=Halo+admin%2C+saya+ingi+memesan+'.urlencode($post->title) : 'tel:'.$post->post_contacts->phone}}" class="button save-job-btn">Beli Sekarang <i class="icon-material-outline-add-shopping-cart"></i></a>
            </div>
          </div>
          {{-- <div class="utf-detail-social-sharing margin-top-25">
            <span><strong>Social Sharing:</strong></span>
            <ul class="margin-top-15">
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Facebook"><i class="icon-brand-facebook-f"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Twitter"><i class="icon-brand-twitter"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Whatsapp"><i class="icon-brand-whatsapp"></i></a></li>
            </ul>
          </div> --}}
        </div>
		
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-line-awesome-file-picture-o"></i> Galeri</h3>
          </div>
           <div id="utf-job-deatails-content-item">
             <div class="row img-gallery-magnific">
              @foreach ($galeries->toArray() as $col => $img)
              @if ($img != null)   
              <div class="col-xl-3 col-lg-3 col-sm-3">
                <div class="magnific-img">
                    <a class="image-popup-vertical-fit" href="{{asset('post').'/'.$post->slug.'/'.$img}}" title="{{$img}}">
                        <img src="{{asset('post').'/'.$post->slug.'/'.$img}}" alt="">
                    </a>
                </div>
              </div>
              @endif
              @endforeach
            </div>
           </div>
        </div>
        @if ($post->post_galeries->youtube_video != null)  
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-brand-youtube"></i> Youtube Video</h3>
          </div>
          {!!$post->post_galeries->youtube_video!!}         
        </div>
        @endif

        @if ($post->post_reviews->count() != 0)  
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-user"></i> Review Pelanggan</h3>
          </div>
          <div class="utf-carousel-container-block">
                <div class="utf-testimonial-carousel-block testimonials">
                    @foreach ($post->post_reviews as $review)
                    <div class="utf-carousel-review-item">
                        <div class="utf-testimonial-box">
                            <div class="utf-testimonial-avatar-photo"> <img src="{{asset('post').'/'.$post->slug.'/'.$review->review_avatar}}" alt=""> </div>
                            <div class="utf-testimonial-author-utf-detail-item">
                                <h4>{{$review->reviewer_name}}</h4>
                            </div>
                            {{$review->review_text}}
                        </div>
                    </div>
                    @endforeach
                </div>
          </div>
        </div>       
        @endif

        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-phone"></i> Contact</h3>
          </div>
          <ul class="utf-job-deatails-content-item margin-bottom-30">
          <li><i class="icon-feather-arrow-right"></i> Telfon: <span><a href="tel:{{$post->post_contacts->phone}}" onclick="incCount()" target="_blank" rel="noopener noreferrer">{{$post->post_contacts->phone}}</a></span></li>
          <li><i class="icon-feather-arrow-right"></i> Whatsapp: <span><a href="https://wa.me/{{$post->post_contacts->whatsapp}}" onclick="incCount()" target="_blank" rel="noopener noreferrer">{{$post->post_contacts->whatsapp}}</a></span></li>
          <li><i class="icon-feather-arrow-right"></i> Instagram: <span><a href="{{$post->post_contacts->instagram}}" onclick="incCount()" target="_blank" rel="noopener noreferrer">{{$post->post_contacts->instagram}}</a></span></li>
          <li><i class="icon-feather-arrow-right"></i> Alamat: {{$post->post_contacts->address}}</li>
          </ul>
        </div>
		
        @if ($post->post_contacts->map != null) 
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-map"></i> Maps</h3>
          </div>
          <div id="utf-single-job-map-container-item">
            {!!$post->post_contacts->map!!}
          </div>
        </div>
        @endif
		
		    <div class="utf-boxed-list-item margin-bottom-60">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-list"></i> Produk Lainnya</h3>
          </div>
          <div class="utf-listings-container-part compact-list-layout"> 
            @foreach ($post_all as $ps)    
            <a href="{{route('user.product.single', ['slug' => $ps->slug])}}" class="utf-job-listing utf-apply-button-item"> 
              <div class="utf-job-listing-details"> 
                <div class="utf-job-listing-company-logo"> <img src="{{asset('post').'/'.$ps->slug.'/'.$ps->post_galeries->image_1}}" alt="{{$ps->title}}"> </div>
                <div class="utf-job-listing-description">
                  <span class="dashboard-status-button utf-job-status-item green">{{ucfirst($ps->categories->category_name)}}</span>
                  <h3 class="utf-job-listing-title">{{ucwords($ps->title)}}</h3>
                  <div class="utf-job-listing-footer">
                  </div>
                </div>
              </div>
              {{-- <span class="bookmark-icon"></span> --}}
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        {{-- <div class="utf-sidebar-container-aera"> 
          <div class="utf-sidebar-widget-item">
            <div class="utf-detail-banner-add-section">
            <a href="#"><img src="{{asset('assets_user/img/banner-add-2.jpg')}}" alt="banner-add-2"></a>
            </div>
          </div>		 --}}
          
          <div class="utf-sidebar-widget-item">
            <h3>Tag</h3>
            <div class="task-tags"> 
              @foreach ($tags as $tag)
              <a href="#"><span>{{$tag->tag_name}}</span></a>  
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Features Jobs / End --> 
  @endsection
  @push('scripts')
  <script>
        function incCount() {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:"{{route('user.product.inccount')}}",
                type:'POST',
                dataType : 'html',
                data:{
                    slug:"{{$post->slug}}"
                },
                success:function(response){
                    console.log('calon pelanggan bertambah');
                }
            });
        }
  </script>
  <script>
      $(document).ready(function() {
        // $('.image-popup-vertical-fit').on('click',function {
        //     overflow: hidden
        // });
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', 
            gallery:{
                enabled:true
            },
            zoom: {
                enabled: true, 

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function(openerElement) {

                return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    });
  </script>
  @endpush