@extends('admin.layout')
@section('judul', 'Dashboard')
@section('dashboard', 'active')
@section('navi', 'Dashboard')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">timeline</i>
            </div>
            <div class="card-content">
                <p class="category">Total View</p>
                <h3 class="card-title">1000</h3>
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
            <div class="card-header" data-background-color="green">
                <i class="material-icons">store</i>
            </div>
            <div class="card-content">
                <p class="category">Total UMKM</p>
                <h3 class="card-title">30</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">add</i> <a href="">Tambah UMKM</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <i class="material-icons">person</i>
            </div>
            <div class="card-content">
                <p class="category">Calon Pelanggan</p>
                <h3 class="card-title">100</h3>
                
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
            <div class="card-header card-header-icon" data-background-color="rose">
              <i class="material-icons">library_books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Simple Table</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>No</th>
                            <th>Nama UMKM</th>
                            <th>Status</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Aezo Kripix</td>
                            <td>Aktif</td>
                            <td class="text-primary">10000</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection