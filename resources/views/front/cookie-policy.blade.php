@include('front.header')
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area"
  style="background-image: url('{{ asset('website/img/banner/breadcrumbs-banner.jpg') }}');">
  <div class="container">
    <div class="breadcrumbs-content">
      <h1>Cookie Policy</h1>
      <ul>
        <li>
          <a href="{{ url('/') }}">Home</a> -
        </li>
        <li>Cookie Policy</li>
      </ul>
    </div>
  </div>
</section>
<!-- Breadcrumb Area End Here -->
<section class="bg-body section-space-less30">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="terms-of-use">
          {!! $cookiepolicy->content ?? Null !!}
        </div>
      </div>
    </div>
  </div>
</section>
@include('front.footer')
