@php
    $post = App\Models\post::all();
@endphp
<div class="intro-banner">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">
        <div class="utf-banner-headline-text-part">
          <h3>Temukan Produk UMKM Berkualitas Sekarang!</h3>
          <span>Terdapat lebih dari {{$post->count()-1}} produk umkm tersedia.</span> 
        </div>
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-md-12">
        <p class="utf-trending-silver-item"><span class="utf-trending-black-item">Sedang Ramai:</span> Kripik,  Gorengan</p>
      </div>
    </div> --}}
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('user.product.search')}}" method="GET">
            <div class="utf-intro-banner-search-form-block margin-top-40"> 
                <div class="utf-intro-search-field-item">
                  <input id="intro-keywords" type="text" name="q" placeholder="Cari Produk Terbaik...">
                  <i class="icon-feather-search"></i>
                </div>
                <div class="utf-intro-search-button">
                  <button class="button ripple-effect"><i class="icon-material-outline-search"></i> Cari Produk </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="background-image-container mySlides fade" style="background-image: url({{asset('assets_user/img/bg-1.jpg')}});"></div>
  <div class="background-image-container mySlides fade" style="background-image: url({{asset('assets_user/img/bg-2.jpg')}});"></div>
</div>