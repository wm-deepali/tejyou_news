<div class="epaper-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light py-0">
          <a class="navbar-brand py-0"  href="">
            @if (isset($headersetting->image) && Storage::exists($headersetting->image))
            <img src="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" alt="{{ $headersetting->title ?? '' }}" alt="Tej Yug News Logo" class="img-fluid main-logo">
            @else
            <img src="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" alt="Tej Yug News Logo" class="img-fluid main-logo">
            @endif
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user-circle" style="font-size: 24px;"></i> </a>
                <div class="dropdown-menu" >
                  <a class="dropdown-item py-0" href="#">
                    <div id="loginDropdown">
                      <a class="dropdown-inner-itemone"><i class="fas fa-user-circle profile-icon"></i> मेरा प्रोफाइल</a>
                      <a href="{{ route('login') }}" class="dropdown-inner-itemtwo btn btn-warning">लॉगिन</a>
                    </div>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item py-0" href="#">
                    <div id="loginDropdown">
                      <a href="#" class="dropdown-inner-itemone">डार्क मोड</a>
                      <a href="#" class="dropdown-inner-itemtwo">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch1">
                          <label class="custom-control-label" for="customSwitch1"></label>
                        </div>
                      </a>
                    </div>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item py-0" href="#">
                    <div id="loginDropdown">
                      <a href="#" class="dropdown-inner-itemone">FAQ's</a>
                      <a href="#" class="dropdown-inner-itemtwo"><i class="far fa-comment-alt profile-icons"></i></a>
                    </div>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item py-0" href="#">
                      <div id="loginDropdown">
                        <a href="#" class="dropdown-inner-itemone">फीडबैक दें</a>
                        <a href="#" class="dropdown-inner-itemtwo"><i class="far fa-envelope profile-icons"></i></a>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>