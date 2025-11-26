@include('front.header')
<style>
.ytp-large-play-button {
  position: absolute;
  left: 64% !important;
  top: 58% !important;
  width: 40px !important;
  height: 40px !important;
}
.center-section-scroll{
    height:1200px;
    overflow-y: scroll;
}
.center-section-scroll::-webkit-scrollbar {
  display: none;
}
@media (max-width:575px) {
   
     .mobile-view{
        display:none;
    }
    .mobile-view-slider{
        margin-bottom:20px;
    }
    
}
@media (min-width:575px) {
   
     .mobile-view-slider{
        display:none;
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
                            <div class="mobile-view">
                                
                            <ul class="nav mostly-customized-scrollbar mobile-view">
                                
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
                            </div>
                            <div class="mobile-view-slider">
                                   <ul class="nav mostly-customized-scrollbar mobile-view">
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/videos') }}">होम</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/searchs') }}" class="nav-link"> खबरें हटके</a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="#" class="nav-link" target="_blank"> ताज़ा खबर</a>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="{{ route('e-paper') }}" class="nav-link" target="_blank" >देश</a>
                                    </li>
                                                                        <li class="nav-item">
                                        <a href="{{ route('e-paper') }}" class="nav-link" target="_blank" >शहर और राज्य</a>
                                    </li>
                                                                        <li class="nav-item">
                                        <a href="{{ route('e-paper') }}" class="nav-link" target="_blank" >+More...</a>
                                    </li>
                                       </ul>
                            </div>
                        </nav>
                        <div class="card-body mobile-view">
                           
                          
                          <div class="py-4">
                                <p class="mb-2 d-block text-center text-muted" style="font-size:16px;font-weight:600;">Follow the Tejyug News Channel on</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ $footersetting->facebook ?? 'https://www.facebook.com/profile.php?id=61563003873920&mibextid=JRoKGi' }}" class="social-icons mx-2 d-block text-center"><i class="fab fa-facebook-f" style="color:#4267B2"></i></a>
                                    <a href="https://www.whatsapp.com/channel/0029VafsQEAA2pL8IGvF0F06" class="social-icons mx-2 d-block text-center"><i class="fab fa-whatsapp" style="color:#075E54"></i></a>
                                    <a href="https://www.instagram.com/tejyugnews?igsh=MWJxMWdlNXExNzVjcw==" class="social-icons mx-2 d-block text-center"><i class="fab fa-instagram" style="color:#d6249f  "></i></a>
                                    <a href="https://youtube.com/@tejyugnews?si=mDkMBwKbyvURIw25" class="social-icons mx-2 d-block text-center"><i class="fab fa-youtube" style="color:#FF0000"></i></a>
                                </div>
                            </div>
                             <p class="mb-2 d-block text-center text-muted" style="font-size:16px;font-weight:600;">Download our App</p>
                            <a href="#" class="mb-2 d-block text-center"><img src="{{ URL::asset('front/images/playstore.svg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12 border-right center-section-scroll" >
                        <div class="">
                          @php
                            $colors = ['rgb(255, 0, 64)', 'rgb(4, 255, 0)', 'rgb(102, 0, 255)','rgb(255, 51, 0)'];
                            @endphp
                            @foreach($postnews as $key=>$postdata)
                            <div class="mb-3">
                                <div class="row border-bottom">
                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-md-8 mt-3 " style="padding-right:0px;">
                                                <div class="card-body " style="padding-right:0px;">
                                                    <div class="d-flex justify-content-between pb-2">
                                                        <div>
                                                            <a href="{{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}" type="button" class="btn btn-danger mr-3"><b>{{$postdata->category->name ?? ""}}</b></a>
                                                           <p style="color:{{ $colors[$key % count($colors)] }}; padding-top:10px; text-align:justify;margin-bottom:5px;">{!! $postdata->title !!}</p> 
                                                        </div>
                                                        
                                                        
                                                        <div>
                                                         
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="container p-0" style="text-align: justify;">
                                                            {!! Str::words(strip_tags($postdata->content), 20, '...') !!}
                                                            @if (strlen(strip_tags($postdata->content)) > 20)
                                                                <a href="{{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}" class="read-more">Read more</a>
                                                            @endif 
                                                        </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="embed-responsive-16by9 mt-3">
                                                        @if($postdata->video)
                                                        <img class="embed-responsive-item youtube-video" data-videoid="{{$postdata->video}}" src="https://img.youtube.com/vi/{{$postdata->video}}/0.jpg" />
                                                        @elseif($postdata->image)
                                                        <img src="{{ URL::asset('storage/'.$postdata->image) }}" alt="{{ $postdata->title }}" class="img-fluid rounded" width="100%" />
                                                       @else
                                                       <img class="embed-responsive-item" src="{{ URL::asset('front/images/Tej-Yug-News-logo.png') }}" />
                                                      
                                                        @endif
                                                    </div>
                                                                                                <div class="d-flex justify-content-around">
                                                <ul class="list-unstyled d-flex" style="margin-top:10px; text-align:center">
                                                    <li class="li">
                                                        <a href="http://www.facebook.com/sharer.php?u={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1rem;"><b><i class="fab fa-facebook-f"></i></b></a>
                                                    </li>
                                                    <li class="li">
                                                        <a href="http://twitter.com/share?text={!! $postdata->title !!} !&url={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1rem;"><b><i class="fab fa-twitter"></i></b></a>
                                                    </li>
                                                     <li class="li">
                                                        <a href="http://twitter.com/share?text={!! $postdata->title !!} !&url={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1rem;"><b><i class="fab fa-whatsapp"></i></b></a>
                                                    </li>
                                                     <li class="li">
                                                        <a href="http://twitter.com/share?text={!! $postdata->title !!} !&url={{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}"  class="mr-3 text-muted" style="font-size:1rem;"><b><i class="fab fa-instagram"></i></b></a>
                                                    </li>
                                                    <!--<li class="li">-->
                                                    <!--    <a href="javascript:void(0)" onclick="copytoclipboard('{{$slug ? url('/').'/'.$slug.'/'.$postdata->slug.'/detail' : url('/').'/'.$postdata->slug.'/detail'}}')"  class="mr-3 text-muted" style="font-size:1rem;"><b><i class="fas fa-paperclip"></i></b></a>-->
                                                    <!--</li>-->
                                                </ul>
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
                                                            <img class="embed-responsive-item youtube-video" data-videoid="{{$resultvideo1['video']}}" src="https://img.youtube.com/vi/{{$resultvideo1['video']}}/0.jpg" class="d-block w-100" />
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                         @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <img class="embed-responsive-item youtube-video" data-videoid="{{$resultvideo1['video']}}" src="https://img.youtube.com/vi/{{$resultvideo1['video']}}/0.jpg" class="d-block w-100" />
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
                                                           <img class="embed-responsive-item youtube-video" data-videoid="{{$resultvideo1['video']}}" src="https://img.youtube.com/vi/{{$resultvideo1['video']}}/0.jpg" class="d-block w-100" />
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                    <div class="d-flex justify-content-between">
                                                         @foreach($resultvideo as $resultvideo1)
                                                        <div class="mx-2">
                                                            <img class="embed-responsive-item youtube-video" data-videoid="{{$resultvideo1['video']}}" src="https://img.youtube.com/vi/{{$resultvideo1['video']}}/0.jpg" class="d-block w-100" />
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
                                <!--<div class="d-flex mb-2">-->
                                <!--    <ul class="list-unstyled">-->
                                <!--        <li class="list-items d-inline"><a href="{{ url('/advertisement') }}" class="items-links text-muted text-decoration-none">Advtisment with Us</a></li>-->
                                <!--        <li class="list-items d-inline"><a href="" class="items-links text-muted text-decoration-none">| Terms & Conditions </a></li>-->
                                <!--        <li class="list-items d-inline"><a href="" class="items-links text-muted text-decoration-none">| Grievance Redressal Policy</a></li>-->
                                <!--        <li class="list-items d-inline"><a href="{{ route('cookie-policy') }}" class="items-links text-muted text-decoration-none">| Cookie Policy</a></li>-->
                                <!--        <li class="list-items d-inline"><a href="{{ route('privacy-policy') }}" class="items-links text-muted text-decoration-none">| Privacy Policy</a></li>-->
                                <!--        <li class="list-items d-inline"><a href="{{ route('contact-us') }}" class="items-links text-muted text-decoration-none">| Contact Us</a></li>-->
                                <!--        <li class="list-items d-inline"><a href="{{ route('our-team') }}" class="items-links text-muted text-decoration-none">| Our Team</a></li>-->
                                <!--    </ul>   -->
                                <!--</div>-->
                                <div class="">
                                    <ul class="list-unstyled">
                                        <li class="list-items">Company Menu</li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">About Us</a></li>
                                        <li class="list-items"><a href="{{ route('contact-us') }}" class="items-links text-decoration-none">Contact Us</a></li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">Our Team</a></li>
                                        <li class="list-items"><a href="{{ url('/advertisement') }}" class="items-links text-decoration-none">Advertise with Us</a></li>
                                        <li class="list-items"><a href="{{ route('cookie-policy') }}" class="items-links text-decoration-none">Cookie Policy</a></li>
                                        <li class="list-items"><a href="{{ route('privacy-policy') }}" class="items-links text-decoration-none">Privacy Policy</a></li>
                                        <li class="list-items"><a href="" class="items-links text-decoration-none">Terms & Conditions</a></li>
                                    </ul> 
                                </div>
                                <div class="">
                                    <p class="text-muted" style="font-size: 12px;">{{ $footersetting->content ?? 'Copyright © 2023 Tej Yug News. - All Right Reserved' }} </p>
                                  <!--  <p class="text-muted" style="font-size: 12px;">This website follows the <a href="#" class="text-decoration-none">DNPA Code of Ethics</a></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="videoFrame" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
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
function openVideo(videoId) {
    $('#videoFrame').attr('src', 'https://www.youtube.com/embed/' + videoId+'?rel=0');
    $('#videoModal').modal('show');
}
$('.youtube-video').on('click', function() {
    openVideo($(this).data("videoid"));
});
 $(document).ready(function() {
        // $.ajax({
        //     url: "{{ route('fetchVideos') }}", // Replace with your route URL
        //     type: "GET",
        //     dataType: "json",
        //     success: function(response) {
        //         if (response.success) {
        //             var carouselInner = $('<div>', { class: 'carousel-inner' });
        //             $.each(response.videodatas, function(key1, resultvideo) {
        //                 var carouselItem = $('<div>', { class: 'carousel-item' });
        //                 if (key1 == response.key) {
        //                     carouselItem.addClass('active');
        //                 }
        //                 var dFlexContainer = $('<div>', { class: 'd-flex justify-content-between' });
        //                 $.each(resultvideo, function(_, video) {
        //                     var mx2Div = $('<div>', { class: 'mx-2' });
        //                     var iframe = $('<iframe>', {
        //                         class: 'embed-responsive-item',
        //                         src: 'https://www.youtube.com/embed/' + video.video + '?rel=0',
        //                         allowfullscreen: true
        //                     });
        //                     mx2Div.append(iframe);
        //                     dFlexContainer.append(mx2Div);
        //                 });
        //                 carouselItem.append(dFlexContainer);
        //                 carouselInner.append(carouselItem);
        //             });
        //             $('#carouselContainer').html(carouselInner);
        //             $('#carouselContainer2').html(carouselInner);
        //         } else {
        //             console.log(response.message); // Handle error
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //         console.error(xhr.responseText); // Log error
        //     }
        // });
    });
    $(document).ready(function(){       
   $('#myModal').modal('show');
    }); 
</script>

