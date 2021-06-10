@php
    $main = App\Models\setting_web::first();
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--  Social tags      -->
    {{-- <meta name="keywords" content=""> --}}
  <meta name="description" content="{{$main->description}}">
  <title>
   @yield('judul') - {{$main->site_name}}
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('assets_user/css/bootstrap-grid.css')}}">
  <link rel="stylesheet" href="{{asset('assets_user/css/icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets_user/css/style.css')}}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('assets_user/css/custom.css')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet">
</head>
<body>
<!--Loader-->
<div class="vfx-loader">
	<div class="loader-wrapper">
		<div class="loader-content">
			<div class="loader-dot dot-1"></div>
			<div class="loader-dot dot-2"></div>
			<div class="loader-dot dot-3"></div>
			<div class="loader-dot dot-4"></div>
			<div class="loader-dot dot-5"></div>
			<div class="loader-dot dot-6"></div>
			<div class="loader-dot dot-7"></div>
			<div class="loader-dot dot-8"></div>
			<div class="loader-dot dot-center"></div>
		</div>
	</div>
</div>
<!-- Loader end -->

<!-- Wrapper -->
<div id="wrapper" style="padding-top: 82px;"> 
  <!-- Header Container -->
  <header id="utf-header-container-block" style="position: fixed;"> 
    <div id="header">
      <div class="container"> 
        <div class="utf-left-side"> 
          <div id="logo"> <a href="{{route('home')}}">
            <img src="{{asset('assets_user/img/logo.png')}}" alt="{{$main->site_name.' logo'}}"></a>
          </div>
          <nav id="navigation">
            <ul id="responsive">
              <li><a href="{{route('home')}}" class="{{ Route::currentRouteNamed('home') ? 'current' : '' }}">Home</a>
              </li>
              <li><a href="{{route('user.product')}}" class="{{ Route::currentRouteNamed('user.product') ? 'current' : '' }}">Produk</a>
              </li>
              <li><a href="{{route('user.about')}}">Tentang Kami</a>
              </li>
              <li><a href="{{route('user.contact')}}">Kontak</a>
              </li>
          </nav>                 
        </div>     
        <div class="utf-right-side">
            <form action="{{route('user.product.search')}}" method="GET">
                <div class="utf-navbar-search-form-block"> 
                    <div class="utf-intro-search-field-item">
                        <input id="intro-keywords" type="text" name="q" placeholder="Cari Produk...">
                        <i class="icon-feather-search"></i>
                    </div>
                    <div class="utf-intro-search-button">
                        <button class="button ripple-effect">Cari</button>
                    </div>
                </div> 	
            </form>
            <span class="mmenu-trigger">
            <button class="hamburger utf-hamburger-collapse-item" type="button"> 
              <span class="utf-hamburger-box-item">
                <span class="utf-hamburger-inner-item"></span> 
              </span> 
            </button>
          </span> 
        </div>
      </div>
    </div>
  </header>
  <!-- Header Container / End -->

  @yield('content')
  
  <!-- Footer -->
  <div id="footer"> 
    <div class="utf-footer-section-item-block">
      <div class="container">
        <div class="row">
		  <div class="col-xl-4 col-md-12">
			<div class="utf-footer-item-links">
				<a href="#"><img class="footer-logo" src="{{asset('assets_user/img/logo.png')}}" alt=""></a>
				<p>{{$main->description}}.</p>								
			</div>
          </div>
		  
          {{-- <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="utf-footer-item-links">
              <h3>Partner</h3>
              <ul>
                <li><a href="#"><i class="icon-feather-chevrons-right"></i> <span>Developement</span></a></li>			
              </ul>
            </div>
          </div>          --}}
          <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="utf-footer-item-links">
              <h3>Quick Link</h3>
              <ul>
                <li><a href="{{route('user.product')}}"><i class="icon-feather-chevrons-right"></i> <span>Produk</span></a></li>
                <li><a href="{{route('user.about')}}"><i class="icon-feather-chevrons-right"></i> <span>About</span></a></li>
                <li><a href="{{route('user.contact')}}"><i class="icon-feather-chevrons-right"></i> <span>Kontak</span></a></li>		
              </ul>
            </div>
          </div>         
        </div>
      </div>
    </div>
    
    <!-- Footer Copyrights -->
    <div class="utf-footer-copyright-item">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">Copyright &copy; <script>document.write(new Date().getFullYear());</script>| <a href="{{route('home')}}">Aezo27 Project</a> | All Rights Reserved.</div>
        </div>
      </div>
    </div>
    <!-- Footer Copyrights / End -->     
  </div>
  <!-- Footer / End -->   
</div>
<!-- Wrapper / End -->  



<!-- Scripts --> 
<script src="{{asset('assets_user/js/jquery-3.3.1.min.js')}}"></script> 
<script src="{{asset('assets_user/js/jquery-migrate-3.0.0.min.js')}}"></script> 
<script src="{{asset('assets_user/js/mmenu.min.js')}}"></script> 
<script src="{{asset('assets_user/js/tippy.all.min.js')}}"></script> 
<script src="{{asset('assets_user/js/simplebar.min.js')}}"></script> 
<script src="{{asset('assets_user/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('assets_user/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('assets_user/js/snackbar.js')}}"></script> 
<script src="{{asset('assets_user/js/clipboard.min.js')}}"></script> 
<script src="{{asset('assets_user/js/counterup.min.js')}}"></script> 
<script src="{{asset('assets_user/js/magnific-popup.min.js')}}"></script> 
<script src="{{asset('assets_user/js/slick.min.js')}}"></script> 
<script src="{{asset('assets_user/js/custom_jquery.js')}}"></script> 
<script src="{{asset('assets_user/js/custom.js')}}"></script> 
@stack('scripts')

<script>
if ($('.utf-intro-banner-search-form-block')[0]) {
	setTimeout(function(){ 
		$(".pac-container").prependTo(".utf-intro-search-field-item.with-autocomplete");
	}, 300);
}
</script> 


<div id="backtotop"><a href="#"></a></div>
</body>
</html>