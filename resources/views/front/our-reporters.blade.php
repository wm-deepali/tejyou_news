@include('front.header')

<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            @forelse($reporters as $reporter)
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="bg-accent p-20 item-shadow-1 text-center">
                        <a href="{{ route('reporter.posts', $reporter->id) }}">
                            <img src="{{ $reporter->image ? asset('storage/' . $reporter->image) : asset('website/img/author.jpg') }}"
                                alt="{{ $reporter->name }}" class="img-fluid rounded-circle mb-15" width="120">
                        </a>
                        <h4 class="mb-5">{{ $reporter->name }}</h4>
                        <p>{{ Str::limit($reporter->bio ?? 'No bio available', 80) }}</p>
                    </div>
                </div>
            @empty
                <p>No reporters found.</p>
            @endforelse
        </div>

        @php
            $start = max($reporters->currentPage() - 2, 1);
            $end = min($reporters->currentPage() + 2, $reporters->lastPage());
        @endphp

        <div class="row mt-20-r mb-30">
            <div class="col-sm-8 col-12">
                <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                    <ul>
                        {{-- Previous --}}
                        @if ($reporters->onFirstPage() == false)
                            <li>
                                <a href="{{ $reporters->previousPageUrl() }}">&laquo;</a>
                            </li>
                        @endif

                        {{-- First page + ellipsis --}}
                        @if ($start > 1)
                            <li><a href="{{ $reporters->url(1) }}">1</a></li>
                            @if ($start > 2)
                                <li><span>...</span></li>
                            @endif
                        @endif

                        {{-- Pages around current page --}}
                        @for ($i = $start; $i <= $end; $i++)
                            <li class="{{ $reporters->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $reporters->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- Last page + ellipsis --}}
                        @if ($end < $reporters->lastPage())
                            @if ($end < $reporters->lastPage() - 1)
                                <li><span>...</span></li>
                            @endif
                            <li><a href="{{ $reporters->url($reporters->lastPage()) }}">{{ $reporters->lastPage() }}</a></li>
                        @endif

                        {{-- Next --}}
                        @if ($reporters->hasMorePages())
                            <li>
                                <a href="{{ $reporters->nextPageUrl() }}">&raquo;</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-sm-4 col-12">
                <div class="pagination-result text-right pt-10 text-center--xs">
                    <p class="mb-none">
                        Page {{ $reporters->currentPage() }} of {{ $reporters->lastPage() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.footer')