@include('front.header')
<section class="cookies-policy py-5">
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
