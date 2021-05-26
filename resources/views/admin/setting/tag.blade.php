@extends('admin.layout')
@section('judul', 'Daftar Tag')
{{-- nav --}}
@section('collapse_setting', 'active')
@section('collapse_setting_collasepsed', 'in')
@section('tags_set', 'active')
@section('delete', route('setting.del_tags'))
@section('navi', 'Tags List')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Daftar Tag</h4>
                  <p class="card-category">Lihat dan delete tag</p>
                </div>
              </div>
            </div>
            <div class="card-content">   
              <div class="material-datatables">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover table-loader" cellspacing="0" width="100%" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Tag</th>
                             <th>Jumlah Post</th>
                             <th class="disabled-sorting text-right">Actions</th>
                         </tr>
                     </thead>
                     <tfoot>
                         <tr>
                             <th>No</th>
                             <th>Tag</th>
                             <th>Jumlah Post</th>
                             <th class="text-right">Actions</th>
                         </tr>
                     </tfoot>
                     <tbody>
                         
                     </tbody>
                 </table>
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
            url: "{{ route('setting.get_tags') }}",
            },
            columns: [
            { 'data': null,'orderable': false, 
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }  
            },
            {
              data: 'tag_name',
              name: 'tag_name'
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
@endpush