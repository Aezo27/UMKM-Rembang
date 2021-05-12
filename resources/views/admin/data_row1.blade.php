<div class="col-lg-4 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-warning card-header-icon">
      <div class="card-icon">
          <i class="material-icons">timeline</i>
      </div>
    </div>
    <div class="card-content">
        <p class="category">Total View</p>
        <h3 class="card-title">{{$views}}</h3>
    </div>
    <div class="card-footer">
        <div class="stats">
            <i class="material-icons text-danger">date_range</i> Semenjak 05 Mei 2020
        </div>
    </div>
  </div>
</div>   
<div class="col-lg-4 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-success card-header-icon">
      <div class="card-icon">
          <i class="material-icons">store</i>
      </div>
    </div>
    <div class="card-content">
        <p class="category">Total UMKM</p>
        <h3 class="card-title">{{$count}}</h3>
    </div>
    <div class="card-footer">
        <div class="stats">
            <i class="material-icons text-success">add</i> <a href="{{route('add_post')}}">Tambah UMKM</a>
        </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
  <div class="card card-stats">
    <div class="card-header card-header-danger card-header-icon">
      <div class="card-icon">
          <i class="material-icons">person</i>
      </div>
    </div>
    <div class="card-content">
        <p class="category">Calon Pelanggan</p>
        <h3 class="card-title">100</h3>
        
    </div>
    <div class="card-footer">
        <div class="stats">
            <i class="material-icons">local_offer</i> Dicatat setiap tombol contact diklik
        </div>
    </div>
  </div>
</div>