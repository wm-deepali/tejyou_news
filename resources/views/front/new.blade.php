<section class="bg-accent section-space-less4">
    <div class="container">
        <div class="row tab-space2">
            @foreach($videoPosts as $index => $post)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="img-overlay-70">

                        <div class="mask-content-sm">
                            <div class="topic-box-sm {{ $colors[$index % count($colors)] }} mb-20">
                                {{ $post->category->name ?? 'News' }}
                            </div>
                            <h3 class="title-medium-light">
                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                        </div>

                        <div class="text-center">
                            @if($post->video)
                                {{-- Embed YouTube or self-hosted video --}}
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                            src="{{ $post->video }}"
                                            allowfullscreen
                                            style="width: 100%; height: 250px; border: 0;">
                                    </iframe>
                                </div>
                            @else
                                <a class="play-btn" href="#">
                                    <img src="{{ asset('website') }}/img/banner/play.png" alt="play" class="img-fluid">
                                </a>
                            @endif
                        </div>

                        {{-- Fallback image --}}
                        @if(!$post->video)
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                 alt="{{ $post->title }}"
                                 class="img-fluid width-100">
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
