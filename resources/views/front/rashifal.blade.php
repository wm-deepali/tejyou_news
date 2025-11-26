@include( 'front.header' )
<style>
  .rashifal-navigation .nav {
    display: flex;
    flex-direction: row;
  }
  .rashifal-navigation .nav-link {
    padding: 0.5rem 1rem;
    color: #000;
    font-weight: 600;
    border: none;
    border-top: 0;
    border-left: 0;
    border-radius: 0;
    border-right: 0;
    margin: 0 10px;
    background: none;
  }
  .rashifal-navigation .nav-pills .nav-link:focus {
    border: none;
  }
  .rashifal-navigation .nav-pills .nav-link.active {
    border-bottom: 2px solid #000;
  }
  .rashifal-navigation .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #000;
    background: transparent;
    border-color: #007bff;
  }
  .rashifal-navigation button:focus {
    outline: none;
  }
  .btn:focus, .btn.focus {
    outline: 0;
    box-shadow: none;
  }
  @media (max-width: 575px) {
    .rashifal-navigation .nav-link {
      font-size: 13px;
      padding: 0.5rem 0rem;
    }
    
  }
  @media (max-width: 387px) {
    .rashifal-navigation .nav-link {
      padding: 0.5rem 0rem;
    }

  }
</style>
<section class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-12 border-right">
                        <nav class="nevigation">
                            <ul class="nav mostly-customized-scrollbar">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/top-news.svg') }}" alt="" class="secondry-icon-img" /> टॉप न्यूज़</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/location.svg') }}" alt="" class="secondry-icon-img" /> राज्य-शहर</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/election.svg') }}" alt="" class="secondry-icon-img" /> चुनाव 2023</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/cricket.svg') }}" alt="" class="secondry-icon-img" /> क्रिकेट</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/war.svg') }}" alt="" class="secondry-icon-img" />इजराइल- हमास जंग</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/Tej-Yug-News-logo.png') }}" alt="" class="secondry-icon-img" />तेजयुग समाचार खास</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/original.svg') }}" alt="" class="secondry-icon-img" />DB ओरिजिनल</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/entertainment.svg') }}" alt="" class="secondry-icon-img" />बॉलीवुड</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/lifestyle.svg') }}" alt="" class="secondry-icon-img" />लाइफस्टाइल</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/edu.svg') }}" alt="" class="secondry-icon-img" />जॉब - एजुकेशन</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/women.svg') }}" alt="" class="secondry-icon-img" />वुमन</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/india.svg') }}" alt="" class="secondry-icon-img" />देश</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/videsh.svg') }}" alt="" class="secondry-icon-img" />विदेश</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/money.svg') }}" alt="" class="secondry-icon-img" />बिजनेस</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/rashifal.svg') }}" alt="" class="secondry-icon-img" />राशिफल</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/techandauto.svg') }}" alt="" class="secondry-icon-img" />टेक - ऑटो</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/jeevanmantra.svg') }}" alt="" class="secondry-icon-img" />जीवन मंत्र</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/sports.svg') }}" alt="" class="secondry-icon-img" />स्पोर्ट्स</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/no-fake-news.svg') }}" alt="" class="secondry-icon-img" />फेक न्यूज एक्सपोज़</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/opinion.svg') }}" alt="" class="secondry-icon-img" />ओपिनियन</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/magazine.svg') }}" alt="" class="secondry-icon-img" />मैगजीन</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/life-science.svg') }}" alt="" class="secondry-icon-img" />लाइफ - साइंस</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img src="{{ URL::asset('front/images/icons/utility.svg') }}" alt="" class="secondry-icon-img" />यूटिलिटी</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="card-body">
                            <p class="mb-2 d-block text-center text-muted" style="font-size:12px">Download App from</p>
                            <a href="#" class="mb-2 d-block text-center"><img src="{{ URL::asset('front/images/playstore.svg') }}" alt=""></a>
                            <a href="#" class="mb-2 d-block text-center"><img src="{{ URL::asset('front/images/playstore-ios.svg') }}" alt=""></a>
                            <div class="py-4">
                                <p class="mb-2 d-block text-center text-muted" style="font-size:12px">Download App from</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ $footersetting->facebook ?? '#' }}" class="social-icons mx-2 d-block text-center"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{ $footersetting->twitter ?? '#' }}" class="social-icons mx-2 d-block text-center"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-icons mx-2 d-block text-center"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-icons mx-2 d-block text-center"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12 border-right">
                      <div class="">
                        <div class="rashifal-modals">
                          <!-- Button trigger modal -->
                          <span class="d-flex justify-content-between py-4">
                            <span style="font-size: 1.4rem;"><b>राशिफल</b></span>
                            <span class="text-dark btn border rounded-pill py-0" style="background: lightgray;"><a href="" type="button" class="text-dark btn rounded-pill " data-toggle="modal" data-target="#rashifalmodal">राशि चुनें  <i class="fas fa-angle-down"></i></a></span>
                          </span>
                          <!-- Modal -->
                          <div class="modal fade" id="rashifalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">चंद्र राशि के अनुसार अपनी राशि चुनिए</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div class="d-flex justify-content-around mb-2">
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/1.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>मेष</b></p>
                                              <p class="rashi-word">(अ, ल, इ)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/2.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>वृष</b></p>
                                              <p class="rashi-word">(ब, व, उ, ए)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/3.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>मिथुन</b></p>
                                              <p class="rashi-word">(क, छ, घ, ह)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}"class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/4.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>सिंह</b></p>
                                              <p class="rashi-word">(म, ट)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/6.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>कन्या</b></p>
                                              <p class="rashi-word">(प, ठ, ण, ट)</p>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="d-flex justify-content-around mb-2">
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/7.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>तुला</b></p>
                                              <p class="rashi-word">(र, त)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/8.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>वृश्चिक</b></p>
                                              <p class="rashi-word">(न, य)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/9.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>धनु</b></p>
                                              <p class="rashi-word">(ये, ध, फ, भ)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/10.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>मकर</b></p>
                                              <p class="rashi-word">(भो, ज, ख, ग)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/11.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>कुंभ</b></p>
                                              <p class="rashi-word">(गु, स, श, ष, द)</p>
                                          </div>
                                      </a>
                                      <a href="{{ url('/rashifal') }}" class="mb-2 text-dark text-decoration-none">
                                          <div>
                                              <img src="{{ URL::asset('front/images/rashi/12.png') }}" alt="" class="img-fluid rashi-icon-img">
                                          </div>
                                          <div class="text-center">
                                              <p class="rashi-head"><b>मीन</b>
                                              </p><p class="rashi-word">(दि, चा, झ, थ)</p>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          </div>
                            </div>
                          </div>
                        </div>
                        <!-- contant -->
                        <div class="rashifal-navigation">
                          <ul class="nav nav-pills mb-3 justify-content-center border-bottom" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">आज का राशिफल</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">वार्षिक राशिफल <span><b>2023</b></span></button>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                              <div class="text-center">
                                <img src="{{ URL::asset('front/images/rashi/1.png') }}" alt="" class="img-fluid rashi-secondry-icon-img mb-4" />
                                <h5 class="mb-4"><b>मेष | Aries</b></h5>
                                <h6 class="text-muted mb-4"><b>(जिनका नाम अ, ल, इ से शुरू होता है)</b></h6>
                                <h6 class="mb-4"><b>मंगलवार, 19 दिसम्बर 2023</b></h6>
                                <div class="d-flex justify-content-center">
                                  <div class="">
                                    <img src="{{ URL::asset('front/images/icons//parashimg.png') }}" alt="" class="img-fluid rashi-icon-img mb-4" />
                                  </div>
                                  <div class="">
                                    <p class="mt-3 px-2"><b>डॉ. अजय भाम्बी</b></p>
                                  </div>
                                </div>
                                <h4 class="mb-4"><b>चंद्र राशि के अनुसार</b></h4>
                                <p class="text-left mb-4">
                                  <strong>मेष - पॉजिटिव -</strong> जनवरी से अप्रैल तक आपको आगे बढ़ने के मौके मिलेंगे। उनको भूना लेंगे तो बहुत फायदा होगा। मई से अगस्त तक जिस प्रोजेक्ट पर काम करेंगे वो बढ़ेगा और समय पर पूरा होगा। देश-विदेश की यात्राओं का योग बनेगा। आर्थिक स्थिति सुधरेंगी। आपका दायरा बढ़ेगा। मन प्रसन्न रहेगा। इज्जत बढ़ेगी। इस दौरान बनने वाले संबंध लंबे समय तक रहेंगे। जिनका फायदा आने वाले दिनों में मिलेगा। पारिवारिक माहौल अच्छा रहेगा। प्रॉपर्टी खरीदारी का योग बनेगा। कामकाज में मनचाहे बदलाव करने के योग बनेंगे। सितंबर, अक्टूबर और दिसंबर आपके लिए अच्छे रहेंगे।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>नेगेटिव -</strong> जनवरी से अप्रैल तक नौकरी और बिजनेस के लिए समय उतार-चढ़ाव वाला रहेगा। मई से अगस्त तक परेशानियां तो रहेंगी, लेकिन सॉल्यूशन भी मिल जाएगा। कुछ जरूरी काम अधूरे रह सकते हैं। जून और दिसंबर में दुर्घटना होने की आशंका है। विवाद और मनमुटाव वाला समय हो सकता है। नवंबर में भी थोड़ा सावधान रहना होगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>करियर -</strong> जनवरी से अप्रैल तक नौकरी और बिजनेस में आगे बढ़ने के मौके मिलेंगे। मई से अगस्त तक नौकरी में प्रमोशन के योग बनेंगे। जॉब स्वीच करना चाहते हैं तो अच्छा ऑप्शन मिलेगा। बिजनेस बढ़ेगा। मई और जून में संभलकर रहना होगा। गुस्से और जल्दबाजी से बचें। सोच-समझकर फैसले लें। सितंबर से दिसंबर तक समय अच्छा रहेगा। इन दिनों नई पार्टनरशिप हो सकती है। नए लोगों से संबंध बनेंगे। नए काम शुरू कर सकते हैं। कामकाज से जुड़ी यात्राएं होंगी। जो फायदेमंद रहेंगी।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>स्टूडेंट्स -</strong> स्टूडेंट्स के लिए ये साल अच्छा है। साल के शुरुआती चार महीनों में कॉम्पिटिशन एग्जाम देनी है तो ज्यादा मेहनत करनी पड़ सकती है। मई के बाद पढ़ाई के लिए दूर स्थानों की यात्राओं का योग बनेगा। जॉब भी मिल सकती है। इंटरव्यू या टेस्ट में सफलता मिल सकती है।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>लव लाइफ -</strong> जनवरी से अप्रैल तक लव लाइफ में संभलकर रहना होगा। कुछ बातों पर मन-मनुटाव हो सकता है। कोशिश करें छोटी बातों को तूल न दें। वर्ना अलगाव की स्थिति बन सकती है। प्रपोजल देने के लिए भी समय ठीक नहीं है। मई के बाद विवाह होने के योग बनेंगे। लिव इन रिलेशनशिप वालों के लिए समय अच्छा रहेगा। यात्राएं होंगी।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>हेल्थ -</strong> सेहत के लिए समय सामान्य है। इस साल कोई बड़ी परेशानी नहीं होगी, लेकिन मौसमी बदलावों के चलते सेहत में उतार-चढ़ाव बने रहेंगे, लेकिन मई जून और दिसंबर में सेहत को लेकर सावधान रहना होगा। चोट या छोटी दुर्घटना हो सकती है।
                                </p>
                                <div class="py-4">
                                  <h4 class="mb-3"><b>टैरो राशिफल</b></h4>
                                  <div class="d-flex justify-content-center">
                                    <div class="">
                                      <img src="{{ URL::asset('front/images/icons//pandrashi_2.png') }}" alt="" class="img-fluid rashi-icon-img mb-4" />
                                    </div>
                                    <div class="">
                                      <p class="mt-3 px-2"><b>प्रणिता देशमुख</b></p>
                                    </div>
                                  </div>
                                </div>
                                <h4><b>कार्ड - Ace of Swords</b></h4>
                                <p class="text-left">इस राशि के लिए साल की शुरुआत अच्छी रहने वाली है। आपका अपने लक्ष्य पर पूरा फोकस रहेगा। कुछ रिश्तों में बदलाव नजर आ सकता है। खुद को बेहतर बनाने की कोशिश सफल होगी। आपकी सोच सकारात्मक बनेगी। जिन लोगों के साथ रिश्ते ठीक नहीं हैं, उनके साथ रिश्ते सुधर सकते हैं। ये दोनों पक्षों के लिए फायदेमंद रहेगा। परिवार के साथ करीबी बढ़ेगी।</p>
                                <p class="text-left">परिवार की आर्थिक स्थिति सुधारने के लिए आप जो प्रयत्न कर रहे हैं, उनमें सफलता मिलेगी। पुरानी दिक्कतें दूर करना संभव हो सकता है। घर के लिए कोई बड़ी खरीदारी करना चाहते हैं तो रुकें। प्रॉपर्टी संबंधी काम में आगे बढ़ना चाहते हैं तो अनुभवी लोगों के साथ चर्चा जरूर करें।</p>
                                <p class="text-left mb-4">
                                  <strong>करियर -</strong> करियर में कोई बड़ा बदलाव नहीं आएगा। जो तरक्की आपने हासिल की है, उसे बनाए रखना आपके लिए संभव हो सकता है। लोगों के साथ विचार-विमर्श करने के बाद काम का विस्तार करने की योजना बन सकती है। नौकरी में बदलाव करना चाहते हैं तो अभी से प्रयत्न करें। अप्रैल के बाद का समय अच्छा रहेगा। जो लोग विदेश जाकर काम करना चाहते हैं या विदेश में रहना चाहते हैं, उनके लिए भी अप्रैल के बाद का समय अच्छा का रहेगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>लव -</strong> रिलेशनशिप में सुधार होने में थोड़ा वक्त लगेगा। अपनी सकारात्मक और नकारात्मक दोनों बातों को ठीक से समझें। पार्टनर के साथ संतुलन बनाए रखें। पार्टनर की बातों का ठीक से अवलोकन करें। जीवनसाथी की तकलीफों को समझें, तभी तालमेल बना रहेगा। रिलेशनशिप संबंधी जिस बात का डर है, उसे समझने की कोशिश करें। इस संबंध में अपने निर्णय टाले नहीं, रिलेशनशिप में आगे बढ़ेंगे तो आगे का समय अच्छा रहेगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>हेल्थ -</strong> इस साल शारीरिक से ज्यादा मानसिक समस्याओं का सामना करना पड़ सकता है। मानसिक रूप से खुद को मजबूत रखें। पुरानी बीमारियों को ठीक करने के लिए किसी योग्य व्यक्ति का मार्गदर्शन प्राप्त करें। कोशिशों में सतर्कता रखें। नींद संबंधी तकलीफ दूर करने की कोशिश करें। जब तक शरीर को पूरा आराम नहीं मिलेगा, तब तक सेहत संबंधी दिक्कतों को दूर कर पाना संभव नहीं होगा।
                                </p>
                                <div class="">
                                  <p class="text-left mb-4">
                                    <strong>लकी कलर -</strong> ऑरेंज
                                  </p>
                                  <p class="text-left mb-4">
                                    <strong>लकी नंबर -</strong> 8
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                              <div class="text-center">
                                <img src="{{ URL::asset('front/images/rashi/1.png') }}" alt="" class="img-fluid rashi-secondry-icon-img mb-4" />
                                <h5 class="mb-4"><b>मेष | Aries</b></h5>
                                <h6 class="text-muted mb-4"><b>(जिनका नाम अ, ल, इ से शुरू होता है)</b></h6>
                                <h6 class="mb-4"><b>वर्ष 2023</b></h6>
                                <div class="d-flex justify-content-center">
                                  <div class="">
                                    <img src="{{ URL::asset('front/images/icons//parashimg.png') }}" alt="" class="img-fluid rashi-icon-img mb-4" />
                                  </div>
                                  <div class="">
                                    <p class="mt-3 px-2"><b>डॉ. अजय भाम्बी</b></p>
                                  </div>
                                </div>
                                <h4 class="mb-4"><b>चंद्र राशि के अनुसार</b></h4>
                                <p class="text-left mb-4">
                                  <strong>मेष - पॉजिटिव -</strong> जनवरी से अप्रैल तक आपको आगे बढ़ने के मौके मिलेंगे। उनको भूना लेंगे तो बहुत फायदा होगा। मई से अगस्त तक जिस प्रोजेक्ट पर काम करेंगे वो बढ़ेगा और समय पर पूरा होगा। देश-विदेश की यात्राओं का योग बनेगा। आर्थिक स्थिति सुधरेंगी। आपका दायरा बढ़ेगा। मन प्रसन्न रहेगा। इज्जत बढ़ेगी। इस दौरान बनने वाले संबंध लंबे समय तक रहेंगे। जिनका फायदा आने वाले दिनों में मिलेगा। पारिवारिक माहौल अच्छा रहेगा। प्रॉपर्टी खरीदारी का योग बनेगा। कामकाज में मनचाहे बदलाव करने के योग बनेंगे। सितंबर, अक्टूबर और दिसंबर आपके लिए अच्छे रहेंगे।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>नेगेटिव -</strong> जनवरी से अप्रैल तक नौकरी और बिजनेस के लिए समय उतार-चढ़ाव वाला रहेगा। मई से अगस्त तक परेशानियां तो रहेंगी, लेकिन सॉल्यूशन भी मिल जाएगा। कुछ जरूरी काम अधूरे रह सकते हैं। जून और दिसंबर में दुर्घटना होने की आशंका है। विवाद और मनमुटाव वाला समय हो सकता है। नवंबर में भी थोड़ा सावधान रहना होगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>करियर -</strong> जनवरी से अप्रैल तक नौकरी और बिजनेस में आगे बढ़ने के मौके मिलेंगे। मई से अगस्त तक नौकरी में प्रमोशन के योग बनेंगे। जॉब स्वीच करना चाहते हैं तो अच्छा ऑप्शन मिलेगा। बिजनेस बढ़ेगा। मई और जून में संभलकर रहना होगा। गुस्से और जल्दबाजी से बचें। सोच-समझकर फैसले लें। सितंबर से दिसंबर तक समय अच्छा रहेगा। इन दिनों नई पार्टनरशिप हो सकती है। नए लोगों से संबंध बनेंगे। नए काम शुरू कर सकते हैं। कामकाज से जुड़ी यात्राएं होंगी। जो फायदेमंद रहेंगी।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>स्टूडेंट्स -</strong> स्टूडेंट्स के लिए ये साल अच्छा है। साल के शुरुआती चार महीनों में कॉम्पिटिशन एग्जाम देनी है तो ज्यादा मेहनत करनी पड़ सकती है। मई के बाद पढ़ाई के लिए दूर स्थानों की यात्राओं का योग बनेगा। जॉब भी मिल सकती है। इंटरव्यू या टेस्ट में सफलता मिल सकती है।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>लव लाइफ -</strong> जनवरी से अप्रैल तक लव लाइफ में संभलकर रहना होगा। कुछ बातों पर मन-मनुटाव हो सकता है। कोशिश करें छोटी बातों को तूल न दें। वर्ना अलगाव की स्थिति बन सकती है। प्रपोजल देने के लिए भी समय ठीक नहीं है। मई के बाद विवाह होने के योग बनेंगे। लिव इन रिलेशनशिप वालों के लिए समय अच्छा रहेगा। यात्राएं होंगी।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>हेल्थ -</strong> सेहत के लिए समय सामान्य है। इस साल कोई बड़ी परेशानी नहीं होगी, लेकिन मौसमी बदलावों के चलते सेहत में उतार-चढ़ाव बने रहेंगे, लेकिन मई जून और दिसंबर में सेहत को लेकर सावधान रहना होगा। चोट या छोटी दुर्घटना हो सकती है।
                                </p>
                                <div class="py-4">
                                  <h4 class="mb-3"><b>टैरो राशिफल</b></h4>
                                  <div class="d-flex justify-content-center">
                                    <div class="">
                                      <img src="{{ URL::asset('front/images/icons//pandrashi_2.png') }}" alt="" class="img-fluid rashi-icon-img mb-4" />
                                    </div>
                                    <div class="">
                                      <p class="mt-3 px-2"><b>प्रणिता देशमुख</b></p>
                                    </div>
                                  </div>
                                </div>
                                <h4><b>कार्ड - Ace of Swords</b></h4>
                                <p class="text-left">इस राशि के लिए साल की शुरुआत अच्छी रहने वाली है। आपका अपने लक्ष्य पर पूरा फोकस रहेगा। कुछ रिश्तों में बदलाव नजर आ सकता है। खुद को बेहतर बनाने की कोशिश सफल होगी। आपकी सोच सकारात्मक बनेगी। जिन लोगों के साथ रिश्ते ठीक नहीं हैं, उनके साथ रिश्ते सुधर सकते हैं। ये दोनों पक्षों के लिए फायदेमंद रहेगा। परिवार के साथ करीबी बढ़ेगी।</p>
                                <p class="text-left">परिवार की आर्थिक स्थिति सुधारने के लिए आप जो प्रयत्न कर रहे हैं, उनमें सफलता मिलेगी। पुरानी दिक्कतें दूर करना संभव हो सकता है। घर के लिए कोई बड़ी खरीदारी करना चाहते हैं तो रुकें। प्रॉपर्टी संबंधी काम में आगे बढ़ना चाहते हैं तो अनुभवी लोगों के साथ चर्चा जरूर करें।</p>
                                <p class="text-left mb-4">
                                  <strong>करियर -</strong> करियर में कोई बड़ा बदलाव नहीं आएगा। जो तरक्की आपने हासिल की है, उसे बनाए रखना आपके लिए संभव हो सकता है। लोगों के साथ विचार-विमर्श करने के बाद काम का विस्तार करने की योजना बन सकती है। नौकरी में बदलाव करना चाहते हैं तो अभी से प्रयत्न करें। अप्रैल के बाद का समय अच्छा रहेगा। जो लोग विदेश जाकर काम करना चाहते हैं या विदेश में रहना चाहते हैं, उनके लिए भी अप्रैल के बाद का समय अच्छा का रहेगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>लव -</strong> रिलेशनशिप में सुधार होने में थोड़ा वक्त लगेगा। अपनी सकारात्मक और नकारात्मक दोनों बातों को ठीक से समझें। पार्टनर के साथ संतुलन बनाए रखें। पार्टनर की बातों का ठीक से अवलोकन करें। जीवनसाथी की तकलीफों को समझें, तभी तालमेल बना रहेगा। रिलेशनशिप संबंधी जिस बात का डर है, उसे समझने की कोशिश करें। इस संबंध में अपने निर्णय टाले नहीं, रिलेशनशिप में आगे बढ़ेंगे तो आगे का समय अच्छा रहेगा।
                                </p>
                                <p class="text-left mb-4">
                                  <strong>हेल्थ -</strong> इस साल शारीरिक से ज्यादा मानसिक समस्याओं का सामना करना पड़ सकता है। मानसिक रूप से खुद को मजबूत रखें। पुरानी बीमारियों को ठीक करने के लिए किसी योग्य व्यक्ति का मार्गदर्शन प्राप्त करें। कोशिशों में सतर्कता रखें। नींद संबंधी तकलीफ दूर करने की कोशिश करें। जब तक शरीर को पूरा आराम नहीं मिलेगा, तब तक सेहत संबंधी दिक्कतों को दूर कर पाना संभव नहीं होगा।
                                </p>
                                <div class="">
                                  <p class="text-left mb-4">
                                    <strong>लकी कलर -</strong> ऑरेंज
                                  </p>
                                  <p class="text-left mb-4">
                                    <strong>लकी नंबर -</strong> 8
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="wrapper">
                            <div class="photo-article py-4">
                                <div class="inner">
                                    <img src="{{ URL::asset('front/images/bombay-high-court_1702451223.jpg') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="card-body border">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <p class="">आज का राशिफल</p>
                                    </div>
                                    <div class="">
                                        <a href="#" type="button" class="text-muted" data-toggle="modal" data-target="#exampleModal">मेष <i class="fas fa-angle-down"></i>
                                            
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">चंद्र राशि के अनुसार अपनी राशि चुनिए</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex justify-content-around mb-2">
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img  src="http://127.0.0.1:8000/front/images/rashi/1.png" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>मेष</b></p>
                                                                        <p class="rashi-word">(अ, ल, इ)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/rashi/2.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>वृष</b></p>
                                                                        <p class="rashi-word">(ब, व, उ, ए)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img  src="http://127.0.0.1:8000/front/images/rashi/3.png" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>मिथुन</b></p>
                                                                        <p class="rashi-word">(क, छ, घ, ह)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/rashi/4.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>सिंह</b></p>
                                                                        <p class="rashi-word">(म, ट)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/rashi/6.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>कन्या</b></p>
                                                                        <p class="rashi-word">(प, ठ, ण, ट)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-around mb-2">
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img  src="http://127.0.0.1:8000/front/images/rashi/7.png" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>तुला</b></p>
                                                                        <p class="rashi-word">(र, त)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/rashi/8.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>वृश्चिक</b></p>
                                                                        <p class="rashi-word">(न, य)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img  src="http://127.0.0.1:8000/front/images/rashi/9.png" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>धनु</b></p>
                                                                        <p class="rashi-word">(ये, ध, फ, भ)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/irashi10.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>मकर</b></p>
                                                                        <p class="rashi-word">(भो, ज, ख, ग)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img  src="http://127.0.0.1:8000/front/images/rashi/11.png" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>कुंभ</b></p>
                                                                        <p class="rashi-word" >(गु, स, श, ष, द)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <div>
                                                                        <img src="{{ URL::asset('front/images/irashi12.png') }}" alt="" class="img-fluid rashi-icon-img">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p class="rashi-head"><b>मीन</b></h6>
                                                                        <p class="rashi-word">(दि, चा, झ, थ)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                                <div class="">
                                    <div class="d-flex mb-2">
                                        <img src="{{ URL::asset('front/images/rashi/1.png') }}" alt="" class="img-fluid secondry-icon-img">
                                        <h6 class=""><b>मेष | Aries</b></h6>
                                    </div>
                                    <div class="">
                                        <p style="font-size: 14px;">
                                            पॉजिटिव- बीच में कोई समय से आप जिन योजनाओं को कार्य रूप देने का प्रयास कर रहे थे, आज उनके अनुकूल परिणाम मिल सकते हैं। सिर्फ भरपूर मेहनत करने की जरूरत है। युवा वर्ग अपनी पढ़ाई व करियर के प्रति गंभीरता ...
                                        </p>
                                        <a href="{{ url('/rashifal') }}" class="btn text-warning d-block text-right"><b>और पढ़ें</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex mb-2">
                                    <ul class="list-unstyled">
                                        <li class="list-items d-inline"><a href="{{ url('/advertisement') }}" class="items-links text-muted text-decoration-none">Advtisment with Us</a></li>
                                        <li class="list-items d-inline"><a href="" class="items-links text-muted text-decoration-none">| Terms & Conditions </a></li>
                                        <li class="list-items d-inline"><a href="" class="items-links text-muted text-decoration-none">| Grievance Redressal Policy</a></li>
                                        <li class="list-items d-inline"><a href="{{ route('cookie-policy') }}" class="items-links text-muted text-decoration-none">| Cookie Policy</a></li>
                                        <li class="list-items d-inline"><a href="{{ route('privacy-policy') }}" class="items-links text-muted text-decoration-none">| Privacy Policy</a></li>
                                        <li class="list-items d-inline"><a href="{{ route('contact-us') }}" class="items-links text-muted text-decoration-none">| Contact Us</a></li>
                                        <li class="list-items d-inline"><a href="{{ route('our-team') }}" class="items-links text-muted text-decoration-none">| Our Team</a></li>
                                    </ul>   
                                </div>
                                <div class="">
                                    <ul class="list-unstyled">
                                        <li class="list-items">Our Divisions</li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">DB Reporters</a></li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">Terms & Conditions</a></li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">Redressal Policy</a></li>
                                        <li class="list-items"><a href="{{ route('cookie-policy') }}" class="items-links text-decoration-none">Cookie Policy</a></li>
                                        <li class="list-items"><a href="{{ route('privacy-policy') }}" class="items-links text-decoration-none">Privacy Policy</a></li>
                                        <li class="list-items"><a href="{{ route('contact-us') }}" class="items-links text-decoration-none">Contact Us</a></li>
                                    </ul> 
                                </div>
                                <div class="">
                                    <p class="text-muted" style="font-size: 12px;">{{ $footersetting->content ?? 'Copyright © 2020 Tej Yug News. - All Right Reserved' }} </p>
                                    <p class="text-muted" style="font-size: 12px;">This website follows the <a href="#" class="text-decoration-none">DNPA Code of Ethics</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="photo-article py-4">
                            <div class="inner">
                                @if (isset($catalogueposts[0]))
                                    <div class="mr-main1">
                                        <a href="{{ route('postdetail',[$catalogueposts[0]->categories[0]->category->slug,$catalogueposts[0]->slug]) }}" class="nav-link">
                                            @if (isset($catalogueposts[0]->image) && Storage::exists($catalogueposts[0]->image))
                                            <img src="{{ URL::asset('storage/'.$catalogueposts[0]->image) }}" alt="{{ $catalogueposts[0]->title }}" class="img-fluid rounded">
                                            @else
                                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[0]->title }}" class="img-fluid">
                                            @endif
                                            <div class="overlay-content rounded">
                                                <h3>{{ $catalogueposts[0]->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


@include('front.footer')
<!-- <script>
  $("#rashifalmodal").click(function(){
    alert("called")
  })
</script> -->