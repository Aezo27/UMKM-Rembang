@extends('admin.layout')
@section('judul', 'Post Review')
{{-- nav --}}
@section('collapse_post', 'active')
@section('collapse_post_collasepsed', 'in')
@section('post_review', 'active')
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
                 <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
                         <tr>
                             <td>1</td>
                             <td>Rama Sullivan</td>
                             <td>Aezo Kripix</td>
                             <td class="text-right">
                                 <a href="#" class="btn btn-simple btn-info btn-icon like" data-toggle="modal" data-target="#info"><i class="material-icons">info</i></a>
                                 <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#info"><i class="material-icons">edit</i></a>
                                 <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                             </td>
                         </tr>
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
                        <div class="modal-body">                         
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"  role="document">
                <div class="modal-content">
                    <div class="modal-header header_new">
                        <h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="modal-body">                         
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
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $('#delete_confirmation').modal('show');
            // $tr = $(this).closest('tr');
            // table.row($tr).remove().draw();
            e.preventDefault();
        });


        $('.card .material-datatables label').addClass('form-group');
    });
</script>
@endpush