
<div class="col-lg-6 col-md-12">
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">library_books</i>
      </div>
    </div>
    <div class="card-content">
        <h4 class="card-title">Peringkat Views UMKM</h4>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table">
                  <thead class="text-primary">
                      <th>No</th>
                      <th>Nama UMKM</th>
                      <th>Status</th>
                      <th>View</th>
                  </thead>
                  <tbody>
                    @foreach ($post as $key => $item)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$item->title}}</td>
                      <td>{{$item->status}}</td>
                      <td class="text-primary">{{$item->views}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              @if ($post->count() < 1)
              <div style="padding-top: 10px; text-align: center;">
                <span>Belum ada UMKM Terdaftar</span>
              </div>
              @endif
          </div>
        </div>
    </div>
  </div>
</div>
