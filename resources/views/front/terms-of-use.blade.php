@include('front.header')
<!-- Breadcrumb Area Start Here -->
<section class="breadcrumbs-area"
  style="background-image: url('{{ asset('website/img/banner/breadcrumbs-banner.jpg') }}');">
  <div class="container">
    <div class="breadcrumbs-content">
      <h1>Terms & Conditions</h1>
      <ul>
        <li>
          <a href="{{ url('/') }}">Home</a> -
        </li>
        <li>Terms & Conditions</li>
      </ul>
    </div>
  </div>
</section>
<section class="bg-body section-space-less30">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-9">
          <div class="use-of-terms-inner">
            <h3 class="mb-4">Terms Of Use</h3>
            {!! $termsofuse->content !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('front.footer')