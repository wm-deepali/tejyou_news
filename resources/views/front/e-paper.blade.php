@include('front.header')

<!-- ========== E-Paper / Newspaper PDF Collection Section ========== -->
<section class="epaper-section section-padding">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="main-heading">ई-पेपर संग्रह</h2>
            <p class="sub-text">आज का अखबार और पुराने संस्करण एक क्लिक में</p>
        </div>

        <div class="row g-4">
            @forelse($epapers as $epaper)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-5">
                    <div class="epaper-card">
                        <a href="{{ asset('storage/' . $epaper['file']) }}" target="_blank">
                            <div class="epaper-thumb">
                                <img src="{{ asset('storage/' . $epaper['image']) ?? 'https://tejyug.com/public/front/images/Tej-Yug-News-logo.png'}}" alt="{{ $epaper['title'] }}">
                                <div class="overlay">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="epaper-info">
                                <h4 class="epaper-title">{{ $epaper['title'] }}</h4>
                                <div class="epaper-meta">
                                    <span
                                        class="date">{{ \Carbon\Carbon::parse($epaper['date'])->translatedFormat('d F Y') }}</span>
                                    <span
                                        class="time">{{ \Carbon\Carbon::parse($epaper['created_at'])->format('h:i A') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>कोई ई-पेपर उपलब्ध नहीं है।</p>
                </div>
            @endforelse
        </div>
        <div class="pagination-wrapper mt-5 d-flex justify-content-center">
            {{ $epapers->links() }}
        </div>

        <!-- /.row -->
    </div>
</section>

@include('front.footer')