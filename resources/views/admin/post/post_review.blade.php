@extends('admin.layout')
@section('judul', 'Post Review')
{{-- nav --}}
@section('collapse_post', 'active')
@section('collapse_post_collasepsed', 'in')
@section('post_review', 'active')
@section('delete', route('del_review'))
@section('navi', 'Post Review')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Daftar Review UMKM</h4>
                  <p class="card-category">Tambah, edit dan delete review</p>
                </div>
                <div class="col-lg-6 col-md-6 text-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#add" id="add_umkm"><i class="material-icons">add</i> Tambah Review</button>
                </div>
              </div>
            </div>
            <div class="card-content">   
              <div class="material-datatables">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover table-loader" cellspacing="0" width="100%" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Reviewer</th>
                             <th>Nama UMKM</th>
                             <th class="disabled-sorting text-right">Actions</th>
                         </tr>
                     </thead>
                     <tfoot>
                         <tr>
                             <th>No</th>
                             <th>Nama Reviewer</th>
                             <th>Nama UMKM</th>
                             <th class="text-right">Actions</th>
                         </tr>
                     </tfoot>
                     <tbody>
                         
                     </tbody>
                 </table>
               </div>
            </div>
          
          <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
                <div class="modal-content">
                    <div class="modal-header header_new">
                        <h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="" method="post">
                        @csrf
                    </form>
                </div>
            </div>
          </div>
          <div class="modal fade" id="add" role="dialog" aria-labelledby="info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
              <div class="modal-content">
                <div class="modal-header header_new">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{route('review.add_review')}}" enctype="multipart/form-data" class="TypeValidation" id="tambahReview" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="card wizard-card" style="box-shadow: none !important;" data-color="rose" id="wizardProfile">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{(asset('assets/img/default-avatar.png'))}}" class="picture-src" id="wizardPicturePreview" title="" />
                                    <input type="file" name="avatar" id="wizard-picture">
                                </div>
                                <h6>Choose Picture</h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <div class="form-group label-floating">
                                <label class="control-label">Nama Reviewer
                                    <small>(required)</small>
                                </label>
                                <input name="nama" type="text" aria-required="true" required class="form-control">
                            </div>
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">record_voice_over</i>
                              </span>
                              <div class="form-group label-floating">
                                  <label class="control-label">Text Review
                                      <small>(required)</small>
                                  </label>
                                  <textarea name="text" aria-required="true" required class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">library_books</i>
                              </span>
                              <div class="form-group label-floating">
                                  <label class="control-label">UMKM
                                      <small>(required)</small>
                                  </label>
                                  <select class="cari" name="post" aria-required="true" title="Pilih UMKM" required>
                                  </select>
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
          <div class="modal fade" id="edit" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
              <div class="modal-content">
                <div class="modal-header header_new">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{route('review.add_review')}}" enctype="multipart/form-data" class="TypeValidation" id="editReview" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="card wizard-card" style="box-shadow: none !important;" data-color="rose" id="wizardProfile">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{(asset('assets/img/default-avatar.png'))}}" class="picture-src img_edit" id="wizardPicturePreview" title="" />
                                    <input type="file" name="avatar" id="wizard-picture">
                                </div>
                                <h6>Choose Picture</h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <div class="form-group label-floating is-not-empty">
                                <label class="control-label">Nama Reviewer
                                    <small>(required)</small>
                                </label>
                                <input name="nama" type="text" aria-required="true" required class="form-control">
                            </div>
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">record_voice_over</i>
                              </span>
                              <div class="form-group label-floating is-not-empty">
                                  <label class="control-label">Text Review
                                      <small>(required)</small>
                                  </label>
                                  <textarea name="text" aria-required="true" required class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">library_books</i>
                              </span>
                              <div class="form-group label-floating">
                                  <label class="control-label">UMKM
                                      <small>(required)</small>
                                  </label>
                                  <select class="cari" name="post" aria-required="true" title="Pilih UMKM" required>
                                  </select>
                              </div>
                          </div>
                        </div>
                      </div> 
                    </div>                     
                  </div>
                  <div class="modal-footer">
                    <div class="pull-right">
                      <input type="hidden" name="id" value="">
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
            url: "{{ route('review.get_data') }}",
            },
            columns: [
            { 'data': null,'orderable': false, 
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }  
            },
            {
              data: 'reviewer_name',
              name: 'reviewer_name'
            },
            {
              data: 'umkm',
              name: 'umkm'
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
      // edit record
        table.on('click', '.edit', function(e) {
          $asset = '{{asset('post')}}';
            $.ajax({
              url: "{{route('review.get_data_edit')}}",
              cache: false,
              type: 'GET',
              data: {id : $(this).attr('id')},
              success: function(data){
                console.log(data);
               $("#editReview input[name='nama']").val(data['reviewer_name'])
               $("#editReview textarea[name='text']").html(data['review_text'])
               var $newOption = $("<option selected='selected'></option>").val(data['id_post']).text(data['title'])
               $(".img_edit").attr("src",$asset+'/'+data['slug']+'/'+data['review_avatar']);
               $(".cari").append($newOption).trigger('change');
               $("#editReview .form-group").removeClass("is-empty")
               $('#edit').modal('show');
              }
            });
            e.preventDefault();
        });

        $('.card .material-datatables label').addClass('form-group');
    });
  </script>
  <script type="text/javascript">
        function setFormValidation(id) {
          console.log(id);
          if (id=='#tambahReview') {      
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).parent('div').addClass('has-error');
                },
                submitHandler: function(form) {
                  $table = $('#datatables').DataTable();
                  $formData = new FormData(form);
                  $form = $('#tambahReview');
                  $form.find('button[type="submit"]').attr('disabled', true);
                  $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: "{{route('review.add_review')}}",
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
            setFormValidation('#tambahReview');
            // setFormValidation('#editReview');
        });
        function resetForm() {
          $('input[name="nama"]').val('');
          $('textarea[name="text"]').val('');
          $('input[name="avatar"]').val('');
          $(".cari").empty().trigger('change')
          $('#wizardPicturePreview').attr('src', "{{(asset('assets/img/default-avatar.png'))}}").fadeIn('slow');
        }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.cari').select2({ 
        width: '100%', 
        placeholder: 'Cari...',
        minimumInputLength: 3,
        allowClear: true,
        ajax: {
          url: "{{route('review.select2')}}",
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (val) {
                return {
                  text: val.title,
                  id: val.id
                }
              })
            };
          },
          cache: true
        }
      });
    });
  </script>
@endpush