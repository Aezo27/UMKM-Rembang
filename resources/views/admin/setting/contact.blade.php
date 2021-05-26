@extends('admin.layout')
@section('judul', 'Edit Kontak Web')
@section('collapse_setting', 'active')
@section('collapse_setting_collasepsed', 'in')
@section('contact_set', 'active')
@section('navi', 'Contact Setting')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4 class="card-title">Edit Kontak Situs</h4>
                </div>
              </div>
            </div>
            <div class="card-content">   
                <form method="post" id="TypeValidation" class="form-horizontal"action="{{route('setting.save_contact')}}" method="" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Text 1</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="text1" required="true" aria-required="true">{{$contact->text_1}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Text 2</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="text2" required="true" aria-required="true">{{$contact->text_2}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Telfon</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="phone" required="true" value="{{$contact->phone}}" aria-required="true">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Alamat</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="address" required="true" aria-required="true">{{$contact->address}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Maps</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="maps" required="true" aria-required="true">{{$contact->maps}}</textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Whatsapp</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="whatsapp" required="true" value="{{$contact->whatsapp}}" aria-required="true">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row form-horizontal-custom">
                        <label class="col-sm-2 label-on-left">Email</label>
                        <div class="col-sm-9">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="email" required="true" value="{{$contact->email}}" aria-required="true">
                            <span class="material-input"></span></div>
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