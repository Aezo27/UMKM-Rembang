@extends('user.layout')
@section('judul', 'Hubungi Kami')
@section('content')
<!-- Intro Banner  --> 
  <!-- Titlebar -->
  <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Hubungi Kami</h2>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="utf-contact-location-info-aera margin-bottom-50">
          <div id="utf-single-job-map-container-item">
            {!!$contact->maps!!}
          </div>
        </div>
      </div>      
	  <div class="col-xl-4 col-lg-4">
		<div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-feather-map-pin"></i> Kontak Kami</h3>
        </div>
		<div class="utf-contact-location-info-aera margin-bottom-50">
			<div class="contact-address">
				<ul>
				  <li><strong>Phone:</strong> {{$contact->phone}}</li>
				  <li><strong>Whatsapp:</strong> <a href="http://wa.me/{{$contact->phone}}">{{$contact->whatsapp}}</a></li>
				  <li><strong>E-Mail:</strong> <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>              
				  <li><strong>Address:</strong> {{$contact->address}}.</li>
				</ul>
			</div>
		</div>		
	  </div>
	  <div class="col-xl-8 col-lg-8">
        <section id="contact" class="margin-bottom-50">
          <div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-material-outline-description"></i> Informasi</h3>
          </div>
		  <div class="utf-contact-form-item">
            <div class="container margin-left-10 margin-right-10">
                <div class="row">
                    <p>{{$contact->text_1}}</p>
                </div>
                <div class="row">
                    <blockquote class="margin-top-20 margin-bottom-20">{{$contact->text_1}}</blockquote>
                </div>
            </div>
		  </div>
        </section>
      </div>
    </div>
  </div>

  <!-- Features Jobs / End --> 
  @endsection
  @push('scripts')
  @endpush