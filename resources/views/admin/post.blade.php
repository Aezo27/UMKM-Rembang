@extends('admin.layout')
@section('judul', 'Post')
@section('post', 'active')
@section('navi', 'Post')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Daftar Halaman UMKM</h4>
                  <p class="card-category">Tambah, edit dan delete halaman</p>
                </div>
                <div class="col-lg-6 col-md-6 text-right">
                  <button class="btn btn-success" id="add_umkm" data-toggle="modal" data-target="#tambah_data"><i class="material-icons">add</i> Tambah UMKM</button>
                </div>
              </div>
            </div>
           <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama UMKM</th>
                    <th>Pemilik</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th width="10%" data-orderable="false">Aksi</th>
                  </tr>
                </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama UMKM</th>
                      <th>Pemilik</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td style="vertical-align: middle;">1</td>
                      <td style="vertical-align: middle;">Aezo Kripix</td>
                      <td style="vertical-align: middle;">Rama Sullivan</td>
                      <td style="vertical-align: middle;">Makanan</td>
                      <td style="vertical-align: middle;">Aktif</td>
                      <td class="text-right d-flex" style="vertical-align: middle;">
                        <button class="btn btn-info btn-sm mr-2" id="detail" data-id="1"><i class="material-icons">info</i> Detail</button>
                        <button class="btn btn-primary btn-sm mr-2" id="edit" data-id="1"><i class="material-icons">edit</i></i> Edit</button>
                        <button class="btn btn-danger btn-sm" id="delete" data-toggle="modal" data-target="#delete_confirmation" data-id="1"><i class="material-icons">delete</i> Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
          <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="tambah_umkm" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="modal-body">                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection