@include('front.header')
<style>
  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
  }
  .btn {
    font-size: 1.2rem;
    color: #000;
    font-weight: 600;
  }
  i {
    font-size: 1.6rem;
    color: #999;
  }
</style>
<section class="faq py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="privacy-policy-inner">
          <h3 class="mb-4 text-center">FAQ - अक्सर पूछे जाने वाले सवाल</h3>
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <div class="d-flex">
                    <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      तेजयुग प्रीमियम मेंबरशिप लेने के क्या फायदे हैं?
                    </button>
                    <span><i class="fas fa-angle-down"></i></span>
                  </div>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="">
                    <h6 class="pl-3"><b>तेजयुग प्रीमियम मेंबरशिप आपको देता है:</b></h6>
                    <ul>
                      <li>11 राज्यों के 270+ शहरों के ई-पेपर</li>
                      <li>हर हफ्ते अलग-अलग विषयों पर 5 मैगजीन,</li>
                      <li>मोबाइल और डेस्कटॉप किसी पर भी पढ़ सकते हैं,</li>
                      <li>और पाएं सभी पुराने अखबार और मैगजीन सिर्फ एक क्लिक पर</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <div class="d-flex">
                    <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      तेजयुग प्रीमियम मेंबरशिप लेने के क्या फायदे हैं?
                    </button>
                    <span><i class="fas fa-angle-down"></i></span>
                  </div>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="">
                    <h6 class="pl-3"><b>तेजयुग प्रीमियम मेंबरशिप आपको देता है:</b></h6>
                    <ul>
                      <li>11 राज्यों के 270+ शहरों के ई-पेपर</li>
                      <li>हर हफ्ते अलग-अलग विषयों पर 5 मैगजीन,</li>
                      <li>मोबाइल और डेस्कटॉप किसी पर भी पढ़ सकते हैं,</li>
                      <li>और पाएं सभी पुराने अखबार और मैगजीन सिर्फ एक क्लिक पर</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <div class="d-flex">
                    <button class="btn btn-link btn-block text-left collapsed text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      तेजयुग प्रीमियम मेंबरशिप लेने के क्या फायदे हैं?
                    </button>
                    <span><i class="fas fa-angle-down"></i></span>
                  </div>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="">
                    <h6 class="pl-3"><b>तेजयुग प्रीमियम मेंबरशिप आपको देता है:</b></h6>
                    <ul>
                      <li>11 राज्यों के 270+ शहरों के ई-पेपर</li>
                      <li>हर हफ्ते अलग-अलग विषयों पर 5 मैगजीन,</li>
                      <li>मोबाइल और डेस्कटॉप किसी पर भी पढ़ सकते हैं,</li>
                      <li>और पाएं सभी पुराने अखबार और मैगजीन सिर्फ एक क्लिक पर</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('front.footer')
