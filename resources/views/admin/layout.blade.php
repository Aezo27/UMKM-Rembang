@php
    $main = App\Models\setting_web::first();
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--  Social tags      -->
    {{-- <meta name="keywords" content=""> --}}
    <meta name="description" content="{{$main->description}}">
  <title>
   @yield('judul') - {{$main->site_name}}
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- Bootstrap core CSS     -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
   <!--  Custom CSS     -->
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/google-roboto-300-700.css')}}" rel="stylesheet" />
  <!-- Select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('assets/img/sidebar-4.jpg')}}">
      <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
          {{$main->site_name}}
        </a>
      </div>
      <div class="logo logo-mini">
          <a href="{{route('home')}}" class="simple-text">
              {{substr($main->site_name,0,2)}}
          </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item @yield('dashboard')">
              <a href="{{route('admin')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
              </a>
          </li>
          </li>
          <li class="nav-item @yield('collapse_post')">
            <a data-toggle="collapse" href="#post">
                <i class="material-icons">library_books</i>
                <p>Post
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse @yield('collapse_post_collasepsed')" id="post">
                <ul class="nav">
                    <li class="@yield('post')">
                        <a href="{{route('post')}}">Post List</a>
                    </li>
                    <li class="@yield('post_review')">
                        <a href="{{route('post_review')}}">Post Review</a>
                    </li>
                </ul>
            </div>
          </li>
          <li class="nav-item @yield('collapse_setting')">
            <a data-toggle="collapse" href="#setting">
                <i class="material-icons">settings</i>
                <p>Setting Web
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse @yield('collapse_setting_collasepsed')" id="setting">
                <ul class="nav">
                    <li class="@yield('main_set')">
                        <a href="{{route('setting.main')}}">Main</a>
                    </li>
                    <li class="@yield('home_set')">
                        <a href="">Home</a>
                    </li>
                    <li class="@yield('contact_set')">
                        <a href="{{route('setting.contact')}}">Contact</a>
                    </li>
                    <li class="@yield('tags_set')">
                        <a href="{{route('setting.tags')}}">Tags</a>
                    </li>
                    <li class="@yield('category_set')">
                        <a href="{{route('setting.cate')}}">Category</a>
                    </li>
                </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/logout">
              <i style="color: red" class="material-icons">power_settings_new</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">  @yield('navi') </a>
                    </div>
                </div>
            </nav>
      <!-- End Navbar -->
      @yield('content')
      <!-- Modal Delete -->
      <div class="modal fade" id="delete_confirmation" tabindex="-1" role="dialog" aria-labelledby="delete_confirmation" aria-hidden="true">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="fa fa-times"></i>
                        </div>						
                        <h4 class="modal-title w-100">Apakah Anda Yakin?</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.</p>
                    </div>
                    <form action="@yield('delete')" id="delete-form" method="post">
                        @csrf
                        <input type=hidden id="id_delete" value="" name="id">
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{asset('assets/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('assets/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="{{asset('assets/js/jquery.select-bootstrap.js')}}"></script>-->
<!-- Select Plugin -->
<script src="{{asset('assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.3/dist/sweetalert2.all.min.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>
<!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
<script src="{{asset('assets/js/custom.js')}}"></script>
@if (session('notif'))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: "{{session('alert')}}",
                title: "{{session('notif')}}"
            })
        });
    </script>
  @endif
@if ($errors->any()))
    <script>
        $(document).ready(function(){
            Toast.fire({
                icon: "error",
                title: "Harap lengkapi form terlebih dahulu"
            })
        });
    </script>
  @endif
@stack('scripts')
<script>
  $("#delete-form").on('submit', function(event){
    event.preventDefault();
    $values = $(this).serialize();
    $id = $('#id_delete').val();
    $table = $('#datatables').DataTable();
    $form = $(this);
    $form.find('button[type="submit"]').attr('disabled', true);
    $.ajax({
        url: $('#delete-form').attr('action'),
        type: "post",
        data: $values,
        success: function (response) {
            Toast.fire({
                icon: response['alert'],
                title: response['notif']
            });
            $('#delete_confirmation').modal('hide');
            if (response['alert'] == 'success') {
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
  });
</script>
</body>

</html>