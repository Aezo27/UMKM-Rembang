@extends('admin.layout')
@section('judul', 'Post List')
{{-- nav --}}
@section('collapse_post', 'active')
@section('collapse_post_collasepsed', 'in')
@section('post', 'active')
@section('delete', route('del_post'))
@section('navi', 'Post List')

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
                  <a href="{{route('add_post')}}"><button class="btn btn-success" id="add_umkm"><i class="material-icons">add</i> Tambah UMKM</button></a>
                </div>
              </div>
            </div>
            <div class="card-content">   
              <div class="material-datatables">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover table-loader" cellspacing="0" width="100%" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama UMKM</th>
                             <th>Jenis</th>
                             <th>Status</th>
                             <th class="disabled-sorting text-right">Actions</th>
                         </tr>
                     </thead>
                     <tfoot>
                         <tr>
                             <th>No</th>
                             <th>Nama UMKM</th>
                             <th>Jenis</th>
                             <th>Status</th>
                             <th class="text-right">Action</th>
                         </tr>
                     </tfoot>
                     <tbody>
                       {{-- @foreach ($post as $key => $p) 
                        <tr baris="{{$p->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->categories->category_name}}</td>
                            <td>{{$p->status}}</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-simple btn-info btn-icon like" data-toggle="modal" data-target="#info"><i class="material-icons">info</i></a>
                                <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">edit</i></a>
                                <a href="javascript:void()" id="{{$p->id}}" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                            </td>
                          </tr>
                        @endforeach --}}
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
            url: "{{ route('post.get_post') }}",
            },
            columns: [
            { 'data': null,'orderable': false, 
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }  
            },
            {
              data: 'title',
              name: 'title'
            },
            {
              data: 'jenis',
              name: 'jenis'
            },
            {
              data: 'status',
              name: 'status',
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