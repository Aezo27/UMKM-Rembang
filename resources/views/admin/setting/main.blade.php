@extends('admin.layout')
@section('judul', 'Edit Detail Web')
@section('collapse_setting', 'active')
@section('collapse_setting_collasepsed', 'in')
@section('main_set', 'active')
@section('navi', 'Main Setting')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Edit Detail Situs</h4>
                </div>
              </div>
            </div>
            <div class="card-content">   
                <form method="post" id="TypeValidation" class="form-horizontal"action="{{route('setting.save_main')}}" method="" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Nama Situs</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" value="{{$main->site_name}}" name="site_name" required="true" aria-required="true">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Deskripsi</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="description" required="true" aria-required="true">{{$main->description}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Tentang</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="about" required="true" aria-required="true">{{$main->about}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Text About</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="text_about" required="true" aria-required="true">{{$main->text_about}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Text Home</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="text_home" required="true" aria-required="true">{{$main->text_home}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-next btn-fill btn-success btn-wd" name="next" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Edit Gambar Situs</h4>
                </div>
              </div>
            </div>
            <div class="card-content">   
                <form method="post" class="form-horizontal"action="{{route('setting.save_img')}}" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <legend>Background 1</legend>
                            <div class="fileinput 'fileinput-exists' text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail">
                                    <img src="{{asset('assets_user/img/bg-1.jpg')}}" alt="">
                                </div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="bg1">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <legend>Background 2</legend>
                            <div class="fileinput 'fileinput-exists' text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail">
                                    <img src="{{asset('assets_user/img/bg-2.jpg')}}" alt="">
                                </div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="bg2">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <legend>Background 3</legend>
                            <div class="fileinput 'fileinput-exists' text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail">
                                    <img src="{{asset('assets_user/img/bg-3.jpg')}}" alt="">
                                </div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="bg3">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <legend>Logo</legend>
                            <div class="fileinput 'fileinput-exists' text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail">
                                    <img src="{{asset('assets_user/img/logo.png')}}" alt="">
                                </div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="logo">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <legend>Favicon</legend>
                            <div class="fileinput 'fileinput-exists' text-center" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail">
                                    <img src="{{asset('assets/img/favicon.png')}}" alt="">
                                </div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="favicon">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-next btn-fill btn-success btn-wd" name="next" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
     <script type="text/javascript">
        function setFormValidation(id) {
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).parent('div').addClass('has-error');
                }
            });
        }

        $(document).ready(function() {
            setFormValidation('#TypeValidation');
        });
    </script>
@endpush