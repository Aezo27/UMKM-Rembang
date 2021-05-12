@extends('admin.layout')
@section('judul', 'Tambah Post')
@section('collapse_post', 'active')
@section('collapse_post_collasepsed', 'in')
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
                  <h4 class="card-title">Tambah Halaman UMKM Baru</h4>
                </div>
              </div>
            </div>
            <div class="card-content">   
                <form method="post" id="TypeValidation" class="form-horizontal" action="#" method="" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Nama UMKM</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="required" required="true" aria-required="true">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                    </div>
                    <div style="margin-top: 20px" id="opsi">
                        <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-col-purple custom_panel">
                                <div class="panel-heading" role="tab" id="headingOne_17">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17" class="">
                                            <i class="material-icons">filter_1</i> Galery
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 1</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 2</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 3</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 4</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 5</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <legend>Galery 6</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="{{asset('assets/img/image_placeholder.jpg')}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="..." />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left"><i class="fa fa-youtube-play fa-2x"></i></label>
                                            <div class="col-sm-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" aria-required="true">
                                                    <span class="help-block">Embed Youtube</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-col-green custom_panel">
                                <div class="panel-heading" role="tab" id="headingTwo_17">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false" aria-controls="collapseTwo_17">
                                            <i class="material-icons">filter_2</i> Contact
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17" aria-expanded="false">
                                    <div class="panel-body">
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left"><i class="fa fa-whatsapp fa-2x"></i></label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" aria-required="true">
                                                    <span class="help-block">No whatsapp +62.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left"><i class="fa fa-phone fa-2x"></i></label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" aria-required="true">
                                                    <span class="help-block">Nomor telfon selain WA.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left"><i class="fa fa-map-o fa-2x"></i></label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" aria-required="true">
                                                    <span class="help-block">Googlemaps embed iframe.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left"><i class="fa fa-instagram fa-2x"></i></label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" aria-required="true">
                                                    <span class="help-block">Akun Instagram (link).</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left">Alamat</label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" required aria-required="true">
                                                    <span class="help-block">Alamat Lengkap.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal-custom">
                                            <label class="col-sm-1 label-on-left">Pemilik</i></label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" required aria-required="true">
                                                    <span class="help-block">Nama Pemilik</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-col-red custom_panel">
                                <div class="panel-heading" role="tab" id="headingThree_17">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false" aria-controls="collapseTwo_17">
                                            <i class="material-icons">filter_3</i> Opsi Lain
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17" aria-expanded="false">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <legend>Status</legend>
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" id="stts" checked><span id="switch">Aktif</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <legend>Tags</legend>
                                                <input type="text" class="form-control" value="" class="tagsinput" data-role="tagsinput" data-color="rose" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script src="{{asset('assets/plugin/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
             $('#stts').on('change', function () {
                var checked = $(this).is(':checked');
                $(this).parent().find('#switch').text(checked ? 'Aktif' : 'Pasif');
            });
        });
    </script>
@endpush