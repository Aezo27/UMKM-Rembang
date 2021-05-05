@extends('layout')
@section('judul', 'Dashboard')
@section('dashboard', 'active')

@yield('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">timeline</i>
              </div>
              <p class="card-category">Total View</p>
              <h3 class="card-title">1000
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i> Semenjak 05 Mei 2020
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
              <p class="card-category">Jumlah UMKM</p>
              <h3 class="card-title">30</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">article</i> 
                <a href="javascript:;">Tambah UMKM</a>
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
              <p class="card-category">Calon Pelanggan</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Dicatat setiap klik WA
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Page View</h4>
              <p class="card-category">Ranking Page V`+iew Semenjam 05 Mei 2021</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>No</th>
                  <th>UMKM</th>
                  <th>Status</th>
                  <th>Views</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>UMKM Sukses</td>
                    <td>Aktif</td>
                    <td>1200</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection