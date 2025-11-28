@extends('layout.app')
@section('content')
    <section class="abt-banner newsroom-banner hero-zoom-out wow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sitemap">
                        <a href="index.php">Home</a> /
                        <a>Media & Updates</a> /
                        <a class="b-active">Newsroom Overview</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="wow fadeInUp">SRF | <span>NEWSROOM</span></h2>
                    <p class="wow fadeInUp">Your destination for SRF’s latest <span>news, insights, and achievements.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="press-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="inner-mhead wow fadeInUp">In the News</h2>
                    <h5 class="wow fadeInUp">Latest from the world of SRF</h5>
                </div>
                @php
                    $items = $data['news'] ?? collect();
                    $first = $items->get(0);
                    $second = $items->get(1);
                    $third = $items->get(2);
                    $fourth = $items->get(3);
                @endphp

                {{-- ========== 1st block: with image (left text, right image, col-md-10) ========== --}}
                @if ($first)
                    <div class="col-md-10 col-md-offset-1">
                        <div class="news-wrap">
                            {{-- Left: content --}}
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
                                                <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Right: image (only if present) --}}
                            @if (!empty($first->image))
                                <div class="col-md-7">
                                    <div class="news-img wow zoomIn">
                                        <img class="img-responsive" src="{{ asset('storage/files/' . $first->image) }}"
                                            alt="{{ $first->title }}">
                                    </div>
                                </div>
                            @endif
                        </div><!--news-wrap-->
                    </div>
                @endif

                {{-- ========== 2nd block: two text items in 7–5 cols (no images) ========== --}}
                @if ($second || $third)
                    <div class="col-md-10 col-md-offset-1">
                        <div class="news-wrap1">

                            @if ($second)
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
                                                    <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($third)
                                <div class="col-md-5">
                                    <div class="news-text">
                                        <h6 class="wow fadeInUp">News</h6>
                                        <h3 class="wow fadeInUp">{{ $third->title }}</h3>
                                        <p class="wow fadeInUp">{{ $third->desc }}</p>
                                        <div class="news-footer wow fadeInUp">
                                            <h6>
                                                {{ optional($third->date)->format('M d, Y') }} |
                                                <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                            </h6>
                                            <div class="news-arrow-icon">
                                                <a href="{{ route('news', $third->slug) }}">
                                                    <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div><!--news-wrap1-->
                    </div>
                @endif

                {{-- ========== 3rd block: last news in col-md-9 + View All in col-md-3 ========== --}}
                @if ($fourth)
                    <div class="col-md-10 col-md-offset-1">
                        <div class="news-wrap2">
                            <div class="col-md-9">
                                <div class="news-text">
                                    <h6 class="wow fadeInUp">News</h6>
                                    <h3 class="wow fadeInUp">{{ $fourth->title }}</h3>
                                    <p class="wow fadeInUp">{{ $fourth->desc }}</p>
                                    <div class="news-footer wow fadeInUp">
                                        <h6>
                                            {{ optional($fourth->date)->format('M d, Y') }} |
                                            <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                        </h6>
                                        <div class="news-arrow-icon">
                                            <a href="{{ route('news', $fourth->slug) }}">
                                                <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 wow fadeInUp">
                                <div class="read-btn-wrap chem-btn chem-btn1">
                                    <a href="{{ route('in-the-news') }}" class="read-btn">
                                        <span class="b-arrow-text">View All</span>
                                        <span class="banner-arrow">
                                            <img src="{{ asset('assets/images/story/white-arrow.svg') }}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div><!--news-wrap2-->
                    </div>
                @endif

            </div>
        </div>

        <div class="media-icons">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 wow fadeInUp">
                        <img src="{{ asset('assets/images/newsroom/media-resources-icon.svg') }}">
                        <h4>Media Resources</h4>
                    </div>
                    <div class="col-md-4 wow fadeInUp">
                        <img src="{{ asset('assets/images/newsroom/media-contact-icon.svg') }}">
                        <h4>Media Contact</h4>
                    </div>
                    <div class="col-md-4 wow fadeInUp">
                        <img src="{{ asset('assets/images/newsroom/subscribe-icon.svg') }}">
                        <h4>Subscribe</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="inner-mhead news-head wow fadeInUp">Press Releases</h2>
                    <div class="news-pdf-wrap">
                        @if ($data['pressReleases']->isNotEmpty())
                            @foreach ($data['pressReleases'] as $press)
                                <div class="news-pdf wow fadeInUp">
                                    <h4>{{ $press->title }}</h4>
                                    @if (!empty($press->file))
                                        <a href="{{ asset('storage/files/' . $press->file) }}" target="_blank"> <img
                                                src="{{ asset('assets/images/newsroom/pdf-icon.svg') }}"> </a>
                                    @else
                                        <span>No file available</span>
                                    @endif
                                </div>
                                <h6 class="wow fadeInUp"> {{ $press->date->format('M d, Y') }} | <img
                                        src="{{ asset('assets/images/newsroom/share-icon.svg') }}"> </h6>
                            @endforeach
                        @else
                            <p>No press release available.</p>
                        @endif
                        <div class="read-btn-wrap chem-btn chem-btn1 wow fadeInUp">
                            <a href="{{ route('press-releases') }}" class="read-btn"><span class="b-arrow-text">View
                                    All</span>
                                <span class="banner-arrow">
                                    <img src="{{ asset('assets/images/story/white-arrow.svg') }}">
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
