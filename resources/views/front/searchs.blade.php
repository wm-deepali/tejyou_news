@include( 'front.header' )

<style>
  .form-control-lg {
    height: calc(1.5em + 1rem + 2px);
    padding: 0.5rem 1rem 0.5rem 5rem;
    font-size: 1.5rem;
    font-weight: 900;
    line-height: 1.5;
    border-radius: 0.3rem;
  }
  .items-links {
    border: 1px solid lightgray;
    border-radius: 5px;
    padding: 10px 20px;
    margin-right: 10px;
    font-weight: 600;
    font-size: 1.2rem !important;
    display: inline-block;
    margin-bottom: 20px;
  }

</style>

<section class="search-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="py-4">
          <form class="form">
            <label class="position-relative" style="width: 100%;">
              <span class="search-section-inner"><i class="fas fa-search"></i></span>
              <input class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0" id="searchInput" type="search" placeholder="अपनी रूचि या शहर खोजें" aria-label="Search">
            </label>
          </form>
          <div class="pt-4">
            <div class="card-body">
              <div class=" mb-2">
                <div class="list-unstyled" id="searchcontent">
                    @php $tags = \App\Tag::where('status','active')->get(); @endphp
                    @foreach($tags as $tag)
                    <a href="{{url(''.'/search?tag='.$tag->slug)}}" class="items-links text-decoration-none">{{$tag->name}}</a>
                    @endforeach
               {{--   <a href="" class="items-links text-decoration-none">Advtisment with Us</a>
                  <a href="" class="items-links text-decoration-none">DB Reporters</a>
                  <a href="" class="items-links text-decoration-none">Terms &amp; Conditions and Redressal Policy</a>
                  <a href="" class="items-links text-decoration-none">Contact Us</a>
                  <a href="" class="items-links text-decoration-none">RSS</a>
                  <a href="" class="items-links text-decoration-none">Terms of Use</a>
                  <a href="" class="items-links text-decoration-none">Cookie Policy</a>
                  <a href="" class="items-links text-decoration-none">Privacy Policy</a>
                  <a href="" class="items-links text-decoration-none">Advtisment with Us</a>
                  <a href="" class="items-links text-decoration-none">DB Reporters</a>
                  <a href="" class="items-links text-decoration-none">Terms &amp; Conditions and Redressal Policy</a>
                  <a href="" class="items-links text-decoration-none">Contact Us</a>
                  <a href="" class="items-links text-decoration-none">RSS</a>
                  <a href="" class="items-links text-decoration-none">Terms of Use</a>
                  <a href="" class="items-links text-decoration-none">Cookie Policy</a>
                  <a href="" class="items-links text-decoration-none">Privacy Policy</a>
                  <a href="" class="items-links text-decoration-none">Advtisment with Us</a>
                  <a href="" class="items-links text-decoration-none">DB Reporters</a>
                  <a href="" class="items-links text-decoration-none">Terms &amp; Conditions and Redressal Policy</a>
                  <a href="" class="items-links text-decoration-none">Contact Us</a>
                  <a href="" class="items-links text-decoration-none">RSS</a>
                  <a href="" class="items-links text-decoration-none">Terms of Use</a>
                  <a href="" class="items-links text-decoration-none">Cookie Policy</a>
                  <a href="" class="items-links text-decoration-none">Privacy Policy</a>
                  <a href="" class="items-links text-decoration-none">Advtisment with Us</a>
                  <a href="" class="items-links text-decoration-none">DB Reporters</a>
                  <a href="" class="items-links text-decoration-none">Terms &amp; Conditions and Redressal Policy</a>
                  <a href="" class="items-links text-decoration-none">Contact Us</a>
                  <a href="" class="items-links text-decoration-none">RSS</a>
                  <a href="" class="items-links text-decoration-none">Terms of Use</a>
                  <a href="" class="items-links text-decoration-none">Cookie Policy</a>
                  <a href="" class="items-links text-decoration-none">Privacy Policy</a> --}}
                </div>   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script>
        $(document).ready(function () {
            $('#searchInput').on('input', function () {
                var query = $(this).val();

                if (query.length >= 0) {
                    $.ajax({
                        url: "{{url('searchpost')}}",
                        method: 'GET',
                        data: { query: query },
                        success: function (data) {
                            displayResults(data);
                        }
                    });
                } else {
                    $('#searchcontent').empty();
                }
            });

            function displayResults(results) {
                var resultsContainer = $('#searchcontent');
                resultsContainer.empty();

                if (results.length > 0) {
                    

                    results.forEach(function (result) {
                        resultsContainer.append(`<a href="{{ url('/search?tag=') }}${result.slug}" class="items-links text-decoration-none">${result.name}</a>`);

                       
                    });

                    
                } else {
                    resultsContainer.append("<div style='margin-left:200px;margin-top:70px'><h2>परिणाम नहीं मिला</h2><h3>कोई रूचि जैसे मनोरंजन, स्पोर्ट्स, इत्यादि या शहर खोज</h3></div>");
                }
            }
        });
    </script>
</section>