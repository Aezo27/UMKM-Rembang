@extends('admin.layout')
@section('judul', 'Dashboard')
@section('dashboard', 'active')
@section('navi', 'Dashboard')

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="dynamic-content">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats ph-item">
              <div class="card-header card-header-icon">
                <div class="card-icon shine">
                    <i class="material-icons">timeline</i>
                </div>
              </div>
              <div class="card-content">
                  <p class="ph-b1 shine"><span>Total View</span></p>
                  <h3 class="ph-b1 shine"><span>0</span></h3>
              </div>
              <div class="card-footer">
                  <div class="stats shine">
                      <i class="material-icons">date_range</i>
                  </div>
              </div>
            </div>
          </div> 
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats ph-item">
              <div class="card-header card-header-icon">
                <div class="card-icon shine">
                    <i class="material-icons">timeline</i>
                </div>
              </div>
              <div class="card-content">
                  <p class="ph-b1 shine"><span>Total View</span></p>
                  <h3 class="ph-b1 shine"><span>0</span></h3>
              </div>
              <div class="card-footer">
                  <div class="stats shine">
                      <i class="material-icons">date_range</i>
                  </div>
              </div>
            </div>
          </div> 
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats ph-item">
              <div class="card-header card-header-icon">
                <div class="card-icon shine">
                    <i class="material-icons">timeline</i>
                </div>
              </div>
              <div class="card-content">
                  <p class="ph-b1 shine"><span>Total View</span></p>
                  <h3 class="ph-b1 shine"><span>0</span></h3>
              </div>
              <div class="card-footer">
                  <div class="stats shine">
                      <i class="material-icons">date_range</i>
                  </div>
              </div>
            </div>
          </div> 
        </div>  
      </div>
      <div class="row">
        <div class="dynamic-content2">
          <div class="col-lg-6 col-md-12">
            <div class="card card-stats ph-item table">
              <div class="card-header card-header-icon">
                <div class="card-icon shine">
                    <i class="material-icons">timeline</i>
                </div>
              </div>
              <div class="card-content">
                  <p class="ph-b2 shine"><span>Title</span></p>
            </div>
            <div class="card-body">
              <table class="table table-loader">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
$().ready(function(){
  $.ajax({
      url: '{{route("admin.get_row1")}}',
      method: 'GET',
      success:function(data){
          $('.dynamic-content').html(data);
      }
  })
  $.ajax({
      url: '{{route("admin.get_row2")}}',
      method: 'GET',
      success:function(data){
          $('.dynamic-content2').html(data);
      }
  })
});
</script>
@endpush