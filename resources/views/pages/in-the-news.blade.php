@extends('layout.app')
@section('content')
    <section class="inside-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sitemap">
                        <a href="index.php">Home</a> /
                        <a>Media & Updates</a> /
                        <a class="b-active">In the News</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="press-wrap press-wrap1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="inner-mhead wow fadeInUp">In the News</h2>
                    <h5 class="wow fadeInUp">Latest from the world of SRF</h5>
                    <div class="award-select press-select">
                        <form method="GET" class="award-select press-select">
                            <p>Sort by</p>

                            {{-- Month filter --}}
                            <select name="month" onchange="this.form.submit()">
                                <option value="">Month</option>
                                @foreach ($data['months'] as $m)
                                    <option value="{{ $m->month }}"
                                        {{ request('month') == $m->month ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m->month, 1)) }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Year filter --}}
                            <select name="year" onchange="this.form.submit()">
                                <option value="">Year</option>
                                @foreach ($data['years'] as $y)
                                    <option value="{{ $y->year }}" {{ request('year') == $y->year ? 'selected' : '' }}>
                                        {{ $y->year }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                @if (count($data['blocks']) > 0)
                    @foreach ($data['blocks'] as $block)
                        <div class="col-md-10 col-md-offset-1">
                            @if ($block['type'] === 'image')
                                @php
                                    $item = $block['items'][0];
                                    $reverse = $block['reverse'] ?? false;
                                    $wrapperClass = $reverse ? 'news-wrap news-wrap4' : 'news-wrap';
                                @endphp

                                <div class="{{ $wrapperClass }}">
                                    @if (!$reverse)
                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                                <p class="wow fadeInUp">{{ $item->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($item->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $item->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="news-img wow zoomIn">
                                                <img class="img-responsive"
                                                    src="{{ asset('storage/files/' . $item->image) }}"
                                                    alt="{{ $item->title }}">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-7">
                                            <div class="news-img wow zoomIn">
                                                <img class="img-responsive"
                                                    src="{{ asset('storage/files/' . $item->image) }}"
                                                    alt="{{ $item->title }}">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                                <p class="wow fadeInUp">{{ $item->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($item->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $item->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @elseif ($block['type'] === 'text-pair')
                                @php
                                    $first = $block['items'][0];
                                    $second = $block['items'][1];
                                    $reverse = $block['reverse'] ?? false;
                                @endphp

                                <div class="news-wrap1">
                                    @if (!$reverse)
                                        <div class="col-md-7">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $first->title }}</h3>
                                                <p class="wow fadeInUp">{{ $first->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($first->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $first->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $second->title }}</h3>
                                                <p class="wow fadeInUp">{{ $second->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($second->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $second->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $first->title }}</h3>
                                                <p class="wow fadeInUp">{{ $first->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($first->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $first->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $second->title }}</h3>
                                                <p class="wow fadeInUp">{{ $second->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($second->date)->format('M d, Y') }} |
                                                        <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                    </h6>
                                                    <div class="news-arrow-icon">
                                                        <a href="{{ route('news', $second->slug) }}">
                                                            <img
                                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @elseif ($block['type'] === 'single')
                                @php $item = $block['items'][0]; @endphp

                                <div class="news-wrap">
                                    <div class="col-md-12">
                                        <div class="news-text">
                                            <h6 class="wow fadeInUp">News</h6>
                                            <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                            <p class="wow fadeInUp">{{ $item->desc }}</p>
                                            <div class="news-footer wow fadeInUp">
                                                <h6>
                                                    {{ optional($item->date)->format('M d, Y') }} |
                                                    <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                </h6>
                                                <div class="news-arrow-icon">
                                                    <a href="{{ route('news', $item->slug) }}">
                                                        <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                @else
                    <div class="col-md-10 text-center py-5">
                        <h3>No News Available</h3>
                    </div>
                @endif


            </div>
        </div>

    </section>
@endsection
