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
                  <li>{{ucwords($post->post_contacts->address)}} <img class="flag" src="./single_files/af.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Afghanistan"></li>				  
                </ul>
                <h3>{{ucwords($post->title)}} <span class="utf-verified-badge" data-tippy-placement="top" data-tippy="" data-original-title="Verified"></span></h3>
                @foreach ($post->tags as $tag)
                  <h5> {{ucfirst($tag->tag_name)}}</h5>
                @endforeach
				        <div class="utf-star-rating" data-rating="5"></div>                
              </div>
            </div>
            <div class="utf-right-side">
              <div class="salary-box">
                <a target="_blank" rel="noopener noreferrer" href="{{$post->post_contacts->whatsapp != null ? 'https://wa.me/'.$post->post_contacts->whatsapp.'?text=Halo+admin%2C+saya+ingi+memesan+'.urlencode($post->title) : 'tel:'.$post->post_contacts->phone}}" class="button save-job-btn">Beli Sekarang <i class="icon-material-outline-add-shopping-cart"></i></a> 		  
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
              <a target="_blank" rel="noopener noreferrer" href="{{$post->post_contacts->whatsapp != null ? 'https://wa.me/'.$post->post_contacts->whatsapp.'?text=Halo+admin%2C+saya+ingi+memesan+'.urlencode($post->title) : 'tel:'.$post->post_contacts->phone}}" class="button save-job-btn">Beli Sekarang <i class="icon-material-outline-add-shopping-cart"></i></a>
            </div>
          </div>
          <div class="utf-detail-social-sharing margin-top-25">
            <span><strong>Social Sharing:</strong></span>
            <ul class="margin-top-15">
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Facebook"><i class="icon-brand-facebook-f"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Twitter"><i class="icon-brand-twitter"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="LinkedIn"><i class="icon-brand-linkedin-in"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Google Plus"><i class="icon-brand-google-plus-g"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Whatsapp"><i class="icon-brand-whatsapp"></i></a></li>
              <li><a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Pinterest"><i class="icon-brand-pinterest-p"></i></a></li>
            </ul>
          </div>
        </div>
		
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-line-awesome-file-picture-o"></i> Galeri</h3>
          </div>
           <div id="utf-job-deatails-content-item">
             <div class="row">
              @foreach ($galeries->toArray() as $col => $img)
              @if ($img != null)   
              <div class="col-xl-3 col-lg-3">
                <img src="{{asset('post').'/'.$post->slug.'/'.$img}}" alt="">
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
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-phone"></i> Contact</h3>
          </div>
          <ul class="utf-job-deatails-content-item margin-bottom-30">
          <li><i class="icon-feather-arrow-right"></i> Morbi mattis ullamcorper velit. Phasellus gravida semper nisi nullam vel sem.</li>
          </ul>
        </div>
		
        <div class="utf-single-page-section-aera">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-map"></i> Maps</h3>
          </div>
          <div id="utf-single-job-map-container-item">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15820.92509291101!2d110.75605972707521!3d-7.549740912882008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1460c4a12f27%3A0x5027a76e356b3a0!2sGonilan%2C%20Kec.%20Kartasura%2C%20Kabupaten%20Sukoharjo%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1622368791302!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
		
		    <div class="utf-boxed-list-item margin-bottom-60">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-list"></i> Produk Lainnya</h3>
          </div>
          <div class="utf-listings-container-part compact-list-layout"> 
            @foreach ($post_all as $ps)    
            <a href="{{route('user.single', ['slug' => $ps->slug])}}" class="utf-job-listing utf-apply-button-item"> 
              <div class="utf-job-listing-details"> 
                <div class="utf-job-listing-company-logo"> <img src="{{asset('post').'/'.$ps->slug.'/'.$post->post_galeries->image_1}}" alt="{{$ps->title}}"> </div>
                <div class="utf-job-listing-description">
                  <span class="dashboard-status-button utf-job-status-item green">{{ucfirst($ps->categories->category_name)}}</span>
                  <h3 class="utf-job-listing-title">{{ucwords($ps->title)}}</h3>
                  <div class="utf-job-listing-footer">
                  </div>
                </div>
              </div>
              <span class="bookmark-icon"></span>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="utf-sidebar-container-aera"> 
          <div class="utf-sidebar-widget-item">
            <div class="utf-detail-banner-add-section">
            <a href="#"><img src="{{asset('assets_user/img/banner-add-2.jpg')}}" alt="banner-add-2"></a>
            </div>
          </div>		
          
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
@endpush