@include('front.header')
<style>
.ytp-large-play-button {
  position: absolute;
  left: 64% !important;
  top: 58% !important;
  width: 40px !important;
  height: 40px !important;
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
                                @if (isset($headercategorieswithoutsubcategories) && count($headercategorieswithoutsubcategories)>0)
                                 @foreach ($headercategorieswithoutsubcategories as $headercategorieswithoutsubcategory)
                                <li class="nav-item active">
                                    <a class="nav-link @if($headercategorieswithoutsubcategory->slug == $slug) active @endif" href="{{ route('homecategory',$headercategorieswithoutsubcategory->slug) }}"> @if($headercategorieswithoutsubcategory->image) <img src="{{ URL::asset('storage/'.$headercategorieswithoutsubcategory->image) }}"  alt="" class="secondry-icon-img" /> @endif {{$headercategorieswithoutsubcategory->name}}</a>
                                </li>
                                @endforeach
                                @endif
                              {{--  <li class="nav-item">
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
                                </li> --}}
                            </ul>
                        </nav>
                        <div class="card-body">
                            <p class="mb-2 d-block text-center text-muted" style="font-size:12px">Download App from</p>
                            <a href="#" class="mb-2 d-block text-center"><img src="{{ URL::asset('front/images/playstore.svg') }}" alt=""></a>
                           <!-- <a href="#" class="mb-2 d-block text-center"><img src="{{ URL::asset('front/images/playstore-ios.svg') }}" alt=""></a> -->
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
                            <!-- 1 -->
                            <!--<div class="mb-3">-->
                            <!--    <div class="row border-bottom">-->
                            <!--        <div class="col-md-12">-->
                            <!--            <div class="py-4">-->
                            <!--                <div class="d-flex">-->
                            <!--                    <div>-->
                            <!--                        <a href="#" type="button" class="btn btn-danger mr-3"><b>LIVE</b></a>-->
                            <!--                    </div>-->
                            <!--                    <div>-->
                            <!--                        <span class="card-title pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड:</b></span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="">-->
                            <!--                <div class="photo-article">-->
                            <!--                    @if (isset($catalogueposts[2]))-->
                            <!--                    <div class="mr-main">-->
                            <!--                        <a href="{{ route('postdetail',[$catalogueposts[2]->categories[0]->category->slug,$catalogueposts[2]->slug]) }}" class="">-->
                            <!--                            @if (isset($catalogueposts[2]->image) && Storage::exists($catalogueposts[2]->image))-->
                            <!--                            <img src="{{ URL::asset('storage/'.$catalogueposts[2]->image) }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid rounded" width="100%" />-->
                            <!--                            @else-->
                            <!--                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid rounded" width="100%" />-->
                            <!--                            @endif-->
                            <!--                            <div class="overlay-content rounded">-->
                            <!--                                <h3>{{ $catalogueposts[2]->title }}</h3>-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                    </div>-->
                            <!--                    @endif-->
                            <!--                </div>-->
                            <!--                <div class="d-flex justify-content-between py-4">-->
                            <!--                    <div class="">-->
                            <!--                        <a href="" class="text-muted"><b>देश</b></a>-->
                            <!--                    </div>-->
                            <!--                    <div class="d-flex justify-content-around">-->
                            <!--                        <a href="#"  class="mr-3 text-muted"><b><i class="fab fa-facebook-f"></i></b></a>-->
                            <!--                        <a href="#"  class="mr-3 text-muted"><b><i class="fab fa-twitter"></i></b></a>-->
                            <!--                        <a href="#"  class="mr-3 text-muted"><b><i class="fas fa-paperclip"></i></b></a>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- 2 -->
                            @foreach($postnews as $key=>$postdata)
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between pb-4">
                                                        <div>
                                                            <a href="{{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}" type="button" class="btn btn-danger mr-3"><b>{!! $postdata->title !!}</b></a>
                                                        </div>
                                                        <div>
                                                            <!--<a href="{{url('').$postdata->slug}}" class="btn btn-danger mr-3">>{!! $postdata->content !!}</a>-->
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        @if($postdata->video)
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$postdata->video}}?rel=0" allowfullscreen></iframe>
                                                        @elseif($postdata->image)
                                                        <img src="{{ URL::asset('storage/'.$postdata->image) }}" alt="{{ $postdata->title }}" class="img-fluid rounded" width="100%" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                @if (isset($postdata->tags) && count($postdata->tags)>0)
                                                @foreach ($postdata->tags as $tag)
                                                <a href="{{url(''.'/search?tag='.$tag->slug)}}" class="text-muted"><b>{{$tag->name ?? ""}}</b></a>
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="http://www.facebook.com/sharer.php?u={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="http://twitter.com/share?text={!! $postdata->title !!} !&url={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="javascript:void(0)" onclick="copytoclipboard('{{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}')"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function copytoclipboard(text){
                              console.time('time1');
                            	var temp = $("<input>");
                              $("body").append(temp);
                             temp.val(text).select();
                              document.execCommand("copy");
                              alert("Copied Successfully!")
                              temp.remove();
                                console.timeEnd('time1');
                            }
                            </script>
                           @if($key%3 == 0)
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between py-3">
                                            <div class="">
                                                <h5 class="mt-2"><b>आज के टॉप वीडियो</b></h5>
                                            </div>
                                         
                                            
                                            <div class="">
                                                <a href="{{url('videos')}}" type="button" class="btn btn-outline-warning"><b>सभी देखें</b></a>
                                            </div>
                                        </div>
                                        <div id="carouselExampleControls" class="carousel slide pb-4" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($videodatas as $key1=>$resultvideo)
                                                @if($key1 == $key)
                                                <div class="carousel-item active">
                                                    <div class="d-flex justify-content-between">
                                                        @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$resultvideo1['video']}}?rel=0" class="d-block w-100" allowfullscreen></iframe>
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                         @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$resultvideo1['video']}}?rel=0" class="d-block w-100" allowfullscreen></iframe>
                                                        </div>
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($key%5 == 0)
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between py-3">
                                            <div class="">
                                                <h5 class="mt-2"><b>बॉलीवुड REEL</b></h5>
                                            </div>
                                            <div class="">
                                                <a href="{{url('videos')}}" type="button" class="btn btn-outline-warning"><b>सभी देखें</b></a>
                                            </div>
                                        </div>
                                        <div id="carouselExampleControlsTwo" class="carousel slide pb-4" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($videodatas as $key1=>$resultvideo)
                                                @if($key1 == $key)
                                                <div class="carousel-item active">
                                                    <div class="d-flex justify-content-between">
                                                        @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$resultvideo1['video']}}?rel=0" class="d-block w-100" allowfullscreen></iframe>
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                         @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$resultvideo1['video']}}?rel=0" class="d-block w-100" allowfullscreen></iframe>
                                                        </div>
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsTwo" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsTwo" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endif
                            @endforeach
                        </div>
                    </div>
                   {{-- <div class="col-lg-6 col-md-8 col-sm-12 border-right">
                        <div class="">
                            <!-- 1 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-md-12">
                                        <div class="py-4">
                                            <div class="d-flex">
                                                <div>
                                                    <a href="#" type="button" class="btn btn-danger mr-3"><b>LIVE</b></a>
                                                </div>
                                                <div>
                                                    <span class="card-title pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड:</b></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="photo-article">
                                                @if (isset($catalogueposts[2]))
                                                <div class="mr-main">
                                                    <a href="{{ route('postdetail',[$catalogueposts[2]->categories[0]->category->slug,$catalogueposts[2]->slug]) }}" class="">
                                                        @if (isset($catalogueposts[2]->image) && Storage::exists($catalogueposts[2]->image))
                                                        <img src="{{ URL::asset('storage/'.$catalogueposts[2]->image) }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid rounded" width="100%" />
                                                        @else
                                                        <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid rounded" width="100%" />
                                                        @endif
                                                        <div class="overlay-content rounded">
                                                            <h3>{{ $catalogueposts[2]->title }}</h3>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between py-4">
                                                <div class="">
                                                    <a href="" class="text-muted"><b>देश</b></a>
                                                </div>
                                                <div class="d-flex justify-content-around">
                                                    <a href="#"  class="mr-3 text-muted"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    <a href="#"  class="mr-3 text-muted"><b><i class="fab fa-twitter"></i></b></a>
                                                    <a href="#"  class="mr-3 text-muted"><b><i class="fas fa-paperclip"></i></b></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between pb-4">
                                                        <div>
                                                            <a href="#" type="button" class="btn btn-danger mr-3"><b>LIVE</b></a>
                                                        </div>
                                                        <div>
                                                            <span class="card-title text-primary pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between pb-4">
                                                        <div>
                                                            <!-- <a href="#" type="button" class="btn btn-danger mr-3"><b>LIVE</b></a> -->
                                                        </div>
                                                        <div>
                                                            <span class="card-title text-warning pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <!-- 5 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between py-3">
                                            <div class="">
                                                <h5 class="mt-2"><b>आज के टॉप वीडियो</b></h5>
                                            </div>
                                            <div class="">
                                                <a href="#" type="button" class="btn btn-outline-warning"><b>सभी देखें</b></a>
                                            </div>
                                        </div>
                                        <div id="carouselExampleControls" class="carousel slide pb-4" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ads.gif') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/1001666043679384095.jpg') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.mp4" type="video/mp4">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.ogg" type="video/ogg">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.mp4" type="video/mp4">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.ogg" type="video/ogg">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ads.gif') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/1001666043679384095.jpg') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-success pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between py-3">
                                            <div class="">
                                                <h5 class="mt-2"><b>बॉलीवुड REEL</b></h5>
                                            </div>
                                            <div class="">
                                                <a href="#" type="button" class="btn btn-outline-warning"><b>सभी देखें</b></a>
                                            </div>
                                        </div>
                                        <div id="carouselExampleControlsTwo" class="carousel slide pb-4" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ads.gif') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/1001666043679384095.jpg') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.mp4" type="video/mp4">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.ogg" type="video/ogg">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.mp4" type="video/mp4">
                                                            </video>
                                                        </div>
                                                        <div class="mx-2">
                                                            <video width="150" height="269" controls>
                                                                <source src="movie.ogg" type="video/ogg">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ads.gif') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/1001666043679384095.jpg') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="mx-2">
                                                            <img src="{{ URL::asset('front/images/ad5.png') }}" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsTwo" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsTwo" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 7 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 8 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                                <img src="http://127.0.0.1:8000/front/images/icons/money.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>बिजनेस</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 9 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/lifestyle.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>लाइफस्टाइल</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 10 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/edu.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>जॉब - एजुकेशन</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 11 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/india.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>देश</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 12 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/videsh.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>विदेश</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 13 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/techandauto.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>टेक - ऑटो</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 14 -->
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                            <img src="http://127.0.0.1:8000/front/images/icons/sports.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>स्पोर्ट्स</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 15 -->
                            <div class="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="py-3">
                                            <div class="d-flex">
                                                <img src="http://127.0.0.1:8000/front/images/icons/life-science.svg" alt="" class="img-fluid secondry-icon-img">
                                                <h5 class="mt-2"><b>लाइफ - साइंस</b></h5>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <dssiv class="card-body">
                                                    <div class="pb-4">
                                                        <div>
                                                            <span class="card-title text-danger pt-2"><b>लोकसभा घुसपैठ केस में 8 सुरक्षाकर्मी सस्पेंड: <span class="text-dark">आरोपियों की पटियाला हाउस कोर्ट में पेशी, संसद की सुरक्षा बढ़ी; जूता उतरवाकर चेकिंग</span></b></span>
                                                        </div>
                                                    </div>
                                                </dssiv>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="" class="text-muted"><b>देश</b></a>
                                            </div>
                                            <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-right: 40px;">
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="#"  class="mr-3 text-muted" style="font-size:1.4rem;"><b><i class="fas fa-paperclip"></i></b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                                            <!-- Modal -->
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
                                    <p class="text-muted" style="font-size: 12px;">{{ $footersetting->content ?? 'Copyright © 2023 Tej Yug News. - All Right Reserved' }} </p>
                                  <!--  <p class="text-muted" style="font-size: 12px;">This website follows the <a href="#" class="text-decoration-none">DNPA Code of Ethics</a></p> -->
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
<!-- Main Content -->
<!-- <main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="photo-article">
                    @if (isset($catalogueposts) && count($catalogueposts)>0)
                    <div class="row">
                        <div class="col-sm-6">
                            @if (isset($catalogueposts[2]))
                            <div class="mr-main">
                                <a href="{{ route('postdetail',[$catalogueposts[2]->categories[0]->category->slug,$catalogueposts[2]->slug]) }}">
                                    @if (isset($catalogueposts[2]->image) && Storage::exists($catalogueposts[2]->image))
                                    <img src="{{ URL::asset('storage/'.$catalogueposts[2]->image) }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[2]->title }}" class="img-fluid">
                                    @endif
                                    <div class="overlay-content">
                                        <h3>{{ $catalogueposts[2]->title }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if (isset($catalogueposts[0]))
                            <div class="mr-main1">
                                <a href="{{ route('postdetail',[$catalogueposts[0]->categories[0]->category->slug,$catalogueposts[0]->slug]) }}">
                                    @if (isset($catalogueposts[0]->image) && Storage::exists($catalogueposts[0]->image))
                                    <img src="{{ URL::asset('storage/'.$catalogueposts[0]->image) }}" alt="{{ $catalogueposts[0]->title }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[0]->title }}" class="img-fluid">
                                    @endif
                                    <div class="overlay-content">
                                        <h3>{{ $catalogueposts[0]->title }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if (isset($catalogueposts[1]))
                            <div class="mr-main1">
                                <a href="{{ route('postdetail',[$catalogueposts[1]->categories[0]->category->slug,$catalogueposts[1]->slug]) }}">
                                    @if (isset($catalogueposts[1]->image) && Storage::exists($catalogueposts[1]->image))
                                    <img src="{{ URL::asset('storage/'.$catalogueposts[1]->image) }}" alt="{{ $catalogueposts[1]->title }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[1]->title }}" class="img-fluid">
                                    @endif
                                    <div class="overlay-content">
                                        <h3>{{ $catalogueposts[1]->title }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            @if (isset($catalogueposts[3]))
                            <div class="mr-main1">
                                <a href="{{ route('postdetail',[$catalogueposts[3]->categories[0]->category->slug,$catalogueposts[3]->slug]) }}">
                                    @if (isset($catalogueposts[3]->image) && Storage::exists($catalogueposts[3]->image))
                                    <img src="{{ URL::asset('storage/'.$catalogueposts[3]->image) }}" alt="{{ $catalogueposts[3]->title }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[3]->title }}" class="img-fluid">
                                    @endif
                                    <div class="overlay-content">
                                        <h3>{{ $catalogueposts[3]->title }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @if (isset($catalogueposts[4]))
                            <div class="mr-main1">
                                <a href="{{ route('postdetail',[$catalogueposts[4]->categories[0]->category->slug,$catalogueposts[4]->slug]) }}">
                                    @if (isset($catalogueposts[4]->image) && Storage::exists($catalogueposts[4]->image))
                                    <img src="{{ URL::asset('storage/'.$catalogueposts[4]->image) }}" alt="{{ $catalogueposts[4]->title }}" class="img-fluid">
                                    @else
                                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $catalogueposts[4]->title }}" class="img-fluid">
                                    @endif
                                    <div class="overlay-content">
                                        <h3>{{ $catalogueposts[4]->title }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-9 col-md-8 col-lg-9">
            <div class="trending-articles">
        <div class="section-title">
            <h3 class="block_title"><span>Trending Articles</span></h3>
        </div>
        <div class="row">
            @if (isset($trendingposts) && count($trendingposts)>0)
            @foreach ($trendingposts->chunk(3) as $trending)
            <div class="col-sm-4">
                <ul>
                    @foreach ($trending as $post)
                    <li> <a href="{{ route('postdetail',[$post->categories[0]->category->slug,$post->slug]) }}">{{ $post->title }}</a> </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
            @endif
        </div>
        </div>
        <div class="google-ad text-center">
            
            <div id="Ad1" class="carousel slide pb-4" data-ride="carousel"  data-interval="{{ $adsetting->homepageupperbanner728x90time*1000 }}">
                <ol class="carousel-indicators">
                    @if (isset($upperbanner728x90) && count($upperbanner728x90)>0)
                    @foreach ($upperbanner728x90 as $upperbanner)
                    @if($upperbanner->type=='custom')
                    <li data-target="#Ad1" data-slide-to="{{ $loop->index }}" @if ($loop->index=='0')
                        class="active"
                    @endif></li>
                    @endif
                    @endforeach
                    @endif
                </ol>

                <div class="carousel-inner">
                @if (isset($upperbanner728x90) && count($upperbanner728x90)>0)
                    @foreach ($upperbanner728x90 as $upperbanner)
                        @if($upperbanner->type=='custom')
                            @if ($loop->index=='0')
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif
                            @if (isset($upperbanner->image) && Storage::exists($upperbanner->image))
                                <a href="{{ $upperbanner->link }}"><img src="{{ URL::asset('storage/'.$upperbanner->image) }}" class="img-fluid"></a>
                            @else
                                <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                            @endif
                            </div>
                        @else
                        {!! $upperbanner->code !!}
                        @endif
                    @endforeach
                @else
                    <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                @endif
                </div>
            </div>
            
        </div>
            <div class="recent-post-bycat">
        <div class="row">
            @if (isset($center1posts) && count($center1posts)>0)
            <div class="col-sm-4">
                <div class="main-postbycat">
                    <a href="{{ route('postdetail',[$center1category->slug,$center1posts[0]->slug]) }}">
                        <div class="postbycat-img">
                            @if (isset($center1posts[0]->image) && Storage::exists($center1posts[0]->image))
                            <img src="{{ URL::asset('storage/'.$center1posts[0]->image) }}" alt="{{ $center1posts[0]->title }}" class="img-fluid">
                            @else
                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $center1posts[0]->title }}" class="img-fluid">
                            @endif
                            <span>{{ $center1category->name }}</span>
                        </div>
                        <h3>{{ $center1posts[0]->title }}</h3>
                    </a>
                    <ul class="bullet-list">
                        @foreach ($center1posts as $center1post)
                        <li><a href="{{ route('postdetail',[$center1category->slug,$center1post->slug]) }}">{{ $center1post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if (isset($center2posts) && count($center2posts)>0)
            <div class="col-sm-4">
                <div class="main-postbycat">
                    <a href="{{ route('postdetail',[$center2category->slug,$center2posts[0]->slug]) }}">
                        <div class="postbycat-img">
                            @if (isset($center2posts[0]->image) && Storage::exists($center2posts[0]->image))
                            <img src="{{ URL::asset('storage/'.$center2posts[0]->image) }}" alt="{{ $center2posts[0]->title }}" class="img-fluid">
                            @else
                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $center2posts[0]->title }}" class="img-fluid">
                            @endif
                            <span>{{ $center2category->name }}</span>
                        </div>
                        <h3>{{ $center2posts[0]->title }}</h3>
                    </a>
                    <ul class="bullet-list">
                        @foreach ($center2posts as $center2post)
                        <li><a href="{{ route('postdetail',[$center2category->slug,$center2post->slug]) }}">{{ $center2post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if (isset($center3posts) && count($center3posts)>0)
            <div class="col-sm-4">
                <div class="main-postbycat">
                    <a href="{{ route('postdetail',[$center3category->slug,$center3posts[0]->slug]) }}">
                        <div class="postbycat-img">
                            @if (isset($center3posts[0]->image) && Storage::exists($center3posts[0]->image))
                            <img src="{{ URL::asset('storage/'.$center3posts[0]->image) }}" alt="{{ $center3posts[0]->title }}" class="img-fluid">
                            @else
                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $center3posts[0]->title }}" class="img-fluid">
                            @endif
                            <span>{{ $center3category->name }}</span>
                        </div>
                        <h3>{{ $center3posts[0]->title }}</h3>
                    </a>
                    <ul class="bullet-list">
                        @foreach ($center3posts as $center3post)
                        <li><a href="{{ route('postdetail',[$center3category->slug,$center3post->slug]) }}">{{ $center3post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
        </div>
        <div class="new-eightbyfour">
        <div class="row">
            <div class="col-sm-12">
                <div class="news-block">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="block-main">
                                <h3><a href="{{ route('postbycategory',$uppertab1category->slug) }}">{{ $uppertab1category->name }}<i class="fas fa-chevron-right"></i></a></h3>
                                <ul>
                                    @if (isset($uppertab1posts) && count($uppertab1posts)>0)
                                    @foreach ($uppertab1posts as $uppertab1post)
                                    <li><a href="{{ route('postdetail',[$uppertab1category->slug,$uppertab1post->slug]) }}">{{ $uppertab1post->title }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="block-main">
                                <h3><a href="{{ route('postbycategory',$uppertab2category->slug) }}">{{ $uppertab2category->name }}<i class="fas fa-chevron-right"></i></a></h3>
                                <ul>
                                    @if (isset($uppertab2posts) && count($uppertab2posts)>0)
                                    @foreach ($uppertab2posts as $uppertab2post)
                                    <li><a href="{{ route('postdetail',[$uppertab2category->slug,$uppertab2post->slug]) }}">{{ $uppertab2post->title }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="block-main">
                                <h3><a href="{{ route('postbycategory',$uppertab3category->slug) }}">{{ $uppertab3category->name }}<i class="fas fa-chevron-right"></i></a></h3>
                                <ul>
                                    @if (isset($uppertab3posts) && count($uppertab3posts)>0)
                                    @foreach ($uppertab3posts as $uppertab3post)
                                    <li><a href="{{ route('postdetail',[$uppertab3category->slug,$uppertab3post->slug]) }}">{{ $uppertab3post->title }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="block-main">
                                <h3><a href="{{ route('postbycategory',$uppertab4category->slug) }}">{{ $uppertab4category->name }}<i class="fas fa-chevron-right"></i></a></h3>
                                <ul>
                                    @if (isset($uppertab4posts) && count($uppertab4posts)>0)
                                    @foreach ($uppertab4posts as $uppertab4post)
                                    <li><a href="{{ route('postdetail',[$uppertab4category->slug,$uppertab4post->slug]) }}">{{ $uppertab4post->title }}</a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="google-ad text-center">
            
            <div id="Ad2" class="carousel slide pb-4" data-ride="carousel"  data-interval="{{ $adsetting->homepagemiddlebanner728x90time*1000 }}">
                <ol class="carousel-indicators">
                    @if (isset($middlebanner728x90) && count($middlebanner728x90)>0)
                        @foreach ($middlebanner728x90 as $middlebanner)
                            @if($middlebanner->type=='custom')
                                <li data-target="#Ad2" data-slide-to="{{ $loop->index }}" @if ($loop->index=='0')
                                class="active"
                                @endif></li>      
                            @endif
                        @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (isset($middlebanner728x90) && count($middlebanner728x90)>0)
                        @foreach ($middlebanner728x90 as $middlebanner)
                            @if($middlebanner->type=='custom')
                                @if ($loop->index=='0')
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                @if (isset($middlebanner->image) && Storage::exists($middlebanner->image))
                                    <a href="{{ $middlebanner->link }}"><img src="{{ URL::asset('storage/'.$middlebanner->image) }}" class="img-fluid"></a>
                                @else
                                    <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                                @endif
                                </div>
                            @else
                            {!! $middlebanner->code !!}
                            @endif
                        @endforeach
                    @else
                        <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                    @endif
                </div>
            </div>
            
        </div>
        <div class="slider-section">
        <div id="slider" class="carousel slide pb-4" data-ride="carousel">

            <ul class="carousel-indicators">
            @if (isset($sliderposts) && count($sliderposts)>0)
            @foreach ($sliderposts as $sliderpost)
            <li data-target="#slider" data-slide-to="{{ $loop->index }}" @if ($loop->index=='0')
                class="active"
            @endif></li>
            @endforeach
            @endif
            </ul>

            <div class="carousel-inner">
                @if (isset($sliderposts) && count($sliderposts)>0)
                @foreach ($sliderposts as $sliderpost)
                @if ($loop->index=='0')
                <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                    @if (isset($sliderpost->image) && Storage::exists($sliderpost->image))
                    <img src="{{ URL::asset('storage/'.$sliderpost->image) }}" alt="{{ $sliderpost->title }}" class="img-fluid">
                    @else
                    <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $sliderpost->title }}" class="img-fluid">
                    @endif
                    <div class="carousel-caption">
                        <h3>
                            @if(isset($sliderpost->categories) && count($sliderpost->categories)>0)
                            <a href="{{ route('postdetail',[$sliderpost->categories->first()->category->slug,$sliderpost->slug]) }}">
                                {{ $sliderpost->title }}
                            </a>
                            @else
                                {{ $sliderpost->title }}
                            @endif
                        </h3>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <a class="carousel-control-prev" href="#slider" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#slider" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> </div>
        </div>
        <div class="google-ad text-center">
            
                <div id="Ad3" class="carousel slide pb-4" data-ride="carousel"  data-interval="{{ $adsetting->homepagelowerbanner728x90time*1000 }}">
                <ol class="carousel-indicators">
                    @if (isset($lowerbanner728x90) && count($lowerbanner728x90)>0)
                    @foreach ($lowerbanner728x90 as $lowerbanner)
                    @if($lowerbanner->type=='custom')
                    <li data-target="#Ad3" data-slide-to="{{ $loop->index }}" @if ($loop->index=='0')
                        class="active"
                    @endif></li>      
                    @endif
                    @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (isset($lowerbanner728x90) && count($lowerbanner728x90)>0)
                        @foreach ($lowerbanner728x90 as $lowerbanner)
                            @if($lowerbanner->type=='custom')
                                @if ($loop->index=='0')
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                @if (isset($lowerbanner->image) && Storage::exists($lowerbanner->image))
                                    <a href="{{ $lowerbanner->link }}"><img src="{{ URL::asset('storage/'.$lowerbanner->image) }}" class="img-fluid"></a>
                                @else
                                    <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                                @endif
                                </div>
                            @else
                                {!! $lowerbanner->code !!}
                            @endif
                        @endforeach
                    @else
                        <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                    @endif
                </div>
            </div>
            
        </div>

        <div class="video-article">
        <div class="section-title">
            <h3 class="block_title"><span>Videos</span></h3>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @if (isset($videocategories) && count($videocategories)>0)
            @foreach ($videocategories as $videocategory)
            <li class="nav-item">
                <a @if ($loop->index=='0')
                    class="nav-link active"
                    @else
                    class="nav-link"
                @endif id="{{ $videocategory->slug }}-tab" data-toggle="tab" href="#{{ $videocategory->slug }}" role="tab" aria-controls="{{ $videocategory->slug }}" aria-selected="false">{{ $videocategory->name }}</a>
                </li>
            @endforeach
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            @if (isset($videocategories) && count($videocategories)>0)
            @foreach ($videocategories as $videocategory)
            <div
            @if ($loop->index=='0')
            class="tab-pane fade show active"
            @else
            class="tab-pane fade"
            @endif
                id="{{ $videocategory->slug }}" role="tabpanel" aria-labelledby="{{ $videocategory->slug }}-tab">
            <div class="row">
                @if (isset($videocategory->videoposts) && count($videocategory->videoposts)>0)
                @foreach ($videocategory->videoposts as $video)
                <div class="col-sm-4">
                    <div class="video-tabs-m">
                        <a href="{{ route('postdetail',[$videocategory->slug,$video->slug]) }}" title="{{ $video->title }}">
                            @if (isset($video->image) && Storage::exists($video->image))
                            <img src="{{ URL::asset('storage/'.$video->image) }}" alt="{{ $video->title }}" class="img-fluid">
                            @else
                            <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $video->title }}" class="img-fluid">
                            @endif
                            <p>{{ $video->title }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="more-videos"><a href="javascript:void(0)">More Videos <i class="fas fa-chevron-right"></i></a> </div>
        </div>

        {{-- <div class="most-read">
        <div class="row">
            <div class="col-sm-12">
            <div class="section-title">
                <h3 class="block_title"><span>Most Read</span></h3>
            </div>
            </div>
        </div>
        <div class="row">
            <?php for($i=0;$i<4;$i++){?>
            <div class="col-sm-3">
            <div class="mr-main"> <a href="#"> <img src="{{ URL::asset('front/images/sports.jpg') }}" class="img-fluid">
                <h3>JEFF BEZOS BETS BIG ON INDIA AT AMAZON</h3>
                </a> </div>
            </div>
            <?php }?>
        </div>
        </div> --}}

        <div class="health-article">
        <div class="section-title">
            <h3 class="block_title"><span>{{ $otherwidgetcategory->name }}</span></h3>
        </div>
        <div class="row">
            @if (isset($otherwidgetposts) && count($otherwidgetposts)>0)
            @foreach ($otherwidgetposts as $otherwidgetpost)
            <div class="col-sm-3">
                <div class="mr-main">
                    <a href="{{ route('postdetail',[$otherwidgetcategory->slug,$otherwidgetpost->slug]) }}">
                        @if (isset($otherwidgetpost->image) && Storage::exists($otherwidgetpost->image))
                        <img src="{{ URL::asset('storage/'.$otherwidgetpost->image) }}" alt="{{ $otherwidgetpost->title }}" class="img-fluid">
                        @else
                        <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $otherwidgetpost->title }}" class="img-fluid">
                        @endif
                        <h3>{{ $otherwidgetpost->title }}</h3>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        </div>
        <div class="google-ad text-center">
            
            <div id="Ad8" class="carousel slide pb-4" data-ride="carousel"  data-interval="{{ $adsetting->homepagelowestbanner728x90time*1000 }}">
                <ol class="carousel-indicators">
                    @if (isset($lowestbanner728x90) && count($lowestbanner728x90)>0)
                    @foreach ($lowestbanner728x90 as $lowestbanner)
                    @if($lowestbanner->type=='custom')
                    <li data-target="#Ad8" data-slide-to="{{ $loop->index }}" @if ($loop->index=='0')
                        class="active"
                    @endif></li>      
                    @endif
                    @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @if (isset($lowestbanner728x90) && count($lowestbanner728x90)>0)
                        @foreach ($lowestbanner728x90 as $lowestbanner)
                            @if($lowestbanner->type=='custom')
                                @if ($loop->index=='0')
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                @if (isset($lowestbanner->image) && Storage::exists($lowestbanner->image))
                                    <a href="{{ $lowestbanner->link }}"><img src="{{ URL::asset('storage/'.$lowestbanner->image) }}" class="img-fluid"></a>
                                @else
                                    <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                                @endif
                                </div>
                            @else
                                {!! $lowestbanner->code !!}
                            @endif
                        @endforeach
                    @else
                        <img src="{{ URL::asset('front/images/728x90.jpg') }}" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
        </div>
    @include('front.sidebar')
    </div>
    <div class="row">
        <div class="col-sm-12">
        <div class="youmay-article">
        <div class="section-title">
            <h3 class="block_title"><span>You May Like</span></h3>
        </div>
        <div class="row">
            @if (isset($youmaylikeposts) && count($youmaylikeposts)>0)
            @foreach ($youmaylikeposts as $youmaylikepost)
            <div class="col-sm-3">
                <div class="mr-main">
                    <a href="{{ route('postdetail',[$youmaylikecategory->slug,$youmaylikepost->slug]) }}">
                        @if (isset($youmaylikepost->image) && Storage::exists($youmaylikepost->image))
                        <img src="{{ URL::asset('storage/'.$youmaylikepost->image) }}" alt="{{ $youmaylikepost->title }}" class="img-fluid">
                        @else
                        <img src="{{ URL::asset('front/images/icons/') }}" alt="{{ $youmaylikepost->title }}" class="img-fluid">
                        @endif
                        <h3>{{ $youmaylikepost->title }}</h3>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        </div>
        </div>
    </div>
</main> -->
@include('front.footer')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$( document ).ajaxStart(function() {
		$("#loader").modal('show');
	});
	$( document ). ajaxComplete(function() {
		$("#loader").modal('hide');
	});
	$(document).ready(function(){
		$(document).on('click','.add-poll-btn',function(event){
			$('#option-err').html('');
			$.ajax({
				url:"{{ URL::to('submit-poll') }}",
				type:'POST',
				dataType:'json',
				data:$('#poll-form').serialize(),
				success:function(result){
					if(result.msgCode === '200') {
						toastr.success(result.msgText);
						window.location = "{{ URL::to('/') }}";
					} else if (result.msgCode === '401') {
						if(result.errors.option) {
							$('#option-err').html(result.errors.option[0]);
						}
					} else {
						toastr.error('error encountered '+result.msgText);
					}
					$("#loader").modal('hide');
				},
				error:function(error){
					toastr.error('error encountered '+error.statusText);
					$("#loader").modal('hide');
				}
			});
		});
	});
</script>

<script>
    $(document).ready(function(){       
   $('#myModal').modal('show');
    }); 
</script>

