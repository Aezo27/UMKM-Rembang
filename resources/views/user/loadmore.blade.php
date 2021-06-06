@foreach ($posts as $post)   
<a href="{{route('user.product.single', ['slug' => $post->slug])}}" class="utf-job-listing utf-apply-button-item product-box"> 
    <div class="utf-job-listing-details"> 
        <div class="utf-job-listing-company-logo"> <img src="{{asset('post').'/'.$post->slug.'/'.$post->post_galeries->image_1}}" alt="{{$post->title}}"> </div>
        <div class="utf-job-listing-description">
            <span class="dashboard-status-button utf-job-status-item green">{{ucfirst($post->categories->category_name)}}</span>
            <h3 class="utf-job-listing-title">{{ucwords($post->title)}}</h3>
            <div class="utf-job-listing-footer">
            <p>{{strip_tags(strlen($post->post_details->content) > 250 ? substr($post->post_details->content,0,250).'...' : $post->post_details->content)}}</p>
            </div>
        </div>
        <span class="list-apply-button ripple-effect">Selengkapnya <i class="icon-material-outline-shopping-cart"></i></span> 
    </div>
</a>
@endforeach
{{-- @if ($post->count() > 10)
<div class="utf-centered-button margin-top-10">
<a href="javascript:void()" id="loadmore" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20 d-flex justify-content-center" style="width: 189.266px;">
    <div class="spin" style="display: none">
        <span class="iconify" id="icon_loading" data-icon="mdi-loading" data-inline="false"></span>
    </div>
    <span class="before-load margin-left-10">
    Selanjutnya... <i class="icon-feather-chevrons-right"></i>
    </span>
</a> 
</div>
@endif --}}