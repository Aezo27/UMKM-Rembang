@extends('user.layout')
@section('judul', 'Hubungi Kami')
@section('content')
<!-- Intro Banner  --> 
  <div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Tentang Kami</h2>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12">
              {{$about->about}}
              </ul>
            </div>
        </div>
  </div>
    <div class="section gradient_item_area padding-top-70 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Mengapa Kami</span>
                        <h3>Statistik Data</h3>
                        <div class="utf-headline-display-inner-item">Mengapa Kami</div>
                        <p class="utf-slogan-text">{{$about->text_about}}.</p>
                    </div>
                </div>
                <div class="col-xl-12 counter_inner_block">
                    <div class="utf-counters-container-aera"> 
                        <div class="col-xl-4">
                            <div class="utf-single-counter"> <i class="icon-feather-eye"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">{{$views}}</span></h3>
                                    <span class="utf-counter-title">View</span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">	
                            <div class="utf-single-counter"> <i class="icon-feather-users"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">{{$pelanggan}}</span></h3>
                                    <span class="utf-counter-title">Pelanggan</span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">	
                            <div class="utf-single-counter"> <i class="icon-feather-shopping-cart"></i>
                                <div class="utf-counter-inner-item">
                                    <h3><span class="counter">{{$count}}</span></h3>
                                    <span class="utf-counter-title">Product</span> 
                                </div>
                            </div>
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