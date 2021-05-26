@extends('admin.layout')
@section('judul', 'Daftar Kategori')
{{-- nav --}}
@section('collapse_setting', 'active')
@section('collapse_setting_collasepsed', 'in')
@section('category_set', 'active')
@section('delete', route('setting.del_cate'))
@section('navi', 'Category List')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Daftar Kategori</h4>
                  <p class="card-category">Tambah dan delete kategori</p>
                </div>
                <div class="col-lg-6 col-md-6 text-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#add" id="add_umkm"><i class="material-icons">add</i> Tambah Kategori</button>
                </div>
              </div>
            </div>
            <div class="card-content">   
              <div class="material-datatables">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover table-loader" cellspacing="0" width="100%" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Kategori</th>
                             <th>Jumlah Post</th>
                             <th class="disabled-sorting text-right">Actions</th>
                         </tr>
                     </thead>
                     <tfoot>
                         <tr>
                             <th>No</th>
                             <th>Kategory</th>
                             <th>Jumlah Post</th>
                             <th class="text-right">Actions</th>
                         </tr>
                     </tfoot>
                     <tbody>
                         
                     </tbody>
                 </table>
               </div>
            </div>
            <div class="modal fade" id="add" role="dialog" aria-labelledby="info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md"  role="document">
              <div class="modal-content">
                <div class="modal-header header_new">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{route('setting.add_cate')}}" enctype="multipart/form-data" class="TypeValidation" id="tambahKategori" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="card wizard-card min-card" style="box-shadow: none !important;" data-color="rose" id="wizardProfile">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">library_books</i>
                            </span>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Nama Kategori
                                    <small>(required)</small>
                                </label>
                                <input name="category_name" type="text" aria-required="true" required class="form-control">
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>                     
                  </div>
                  <div class="modal-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-next btn-fill btn-success btn-wd">Simpan</button>
                    </div>  
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
@push('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            // processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('setting.get_cate') }}",
            },
            columns: [
            { 'data': null,'orderable': false, 
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }  
            },
            {
              data: 'category_name',
              name: 'category_name'
            },
            {
              data: 'post_count',
              name: 'post_count'
            },
            {
              data: 'action',
              name: 'action',
              className: 'text-right',
              orderable: false
            }
            ],
            pagingType: 'full_numbers',
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            responsive: true,
            language: {
                search: '_INPUT_',
                searchPlaceholder: 'Search records',
            }
        });

        var table = $('#datatables').DataTable();

        // Delete a record
        table.on('click', '.remove', function(e) {
            $('#delete_confirmation').modal('show');
            $('#id_delete').val($(this).attr('id'))
            e.preventDefault();
        });

        $('.card .material-datatables label').addClass('form-group');
    });
  </script>
    <script type="text/javascript">
        function setFormValidation(id) {
          if (id=='#tambahKategori') {      
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).parent('div').addClass('has-error');
                },
                submitHandler: function(form) {
                  $table = $('#datatables').DataTable();
                  $formData = new FormData(form);
                  $form = $('#tambahKategori');
                  $form.find('button[type="submit"]').attr('disabled', true);
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "{{route('setting.add_cate')}}",
                      type: 'POST',
                      data: $formData,
                      cache : false,
                      processData: false,
                      contentType: false,
                      success: function (response) {
                          Toast.fire({
                              icon: response['alert'],
                              title: response['notif']
                          });
                          if (response['alert'] == 'success') {
                            $('#add').modal('hide');
                            resetForm();
                            $("#datatables").addClass('table-loader').show();
                            $table.ajax.reload(function(){
                              $("#datatables").removeClass('table-loader').show();
                            });
                          }
                          $form.find('button[type="submit"]').removeAttr('disabled');
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                          console.log(textStatus, errorThrown);
                      }
                  });
                }
            });
          } else {
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).parent('div').addClass('has-error');
                },
                submitHandler: function(form) {
                  $table = $('#datatables').DataTable();
                  $formData = new FormData(form);
                  $form = $('#editReview');
                  $form.find('button[type="submit"]').attr('disabled', true);
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "{{route('edit_post', ['id' =>"+formData.id+"])}}",
                      type: 'POST',
                      data: $formData,
                      cache : false,
                      processData: false,
                      contentType: false,
                      success: function (response) {
                          Toast.fire({
                              icon: response['alert'],
                              title: response['notif']
                          });
                          if (response['alert'] == 'success') {
                            $('#add').modal('hide');
                            resetForm();
                            $("#datatables").addClass('table-loader').show();
                            $table.ajax.reload(function(){
                              $("#datatables").removeClass('table-loader').show();
                            });
                          }
                          $form.find('button[type="submit"]').removeAttr('disabled');
                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                          console.log(textStatus, errorThrown);
                      }
                  });
                }
            });
          }
        }

        $(document).ready(function() {
            setFormValidation('#tambahKategori');
            // setFormValidation('#editReview');
        });
        function resetForm() {
          $('input[name="category_name"]').val('');
        }
  </script>
@endpush