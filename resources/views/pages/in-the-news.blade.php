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
                        <p>Sort by</p>
                        <select id="monthselect">
                            <option value="2025">Month</option>
                        </select>
                        <select id="Yearselect">
                            <option value="2025">Year</option>
                        </select>
                    </div>
                </div>
                @if(count($data['blocks']) > 0)
                    @foreach ($data['blocks'] as $block)
                        <div class="col-md-10 col-md-offset-1">
                            @if ($block['type'] === 'image')
                                @php
                                    $item = $block['items'][0];
                                    $reverse = $block['reverse'] ?? false;
                                @endphp

                                <div class="newsClass">
                                    @if (!$reverse)
                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                                <p class="wow fadeInUp">{{ $item->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($item->date)->format('M d, Y') }}
                                                        |
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
                                        <div class="col-md-7">
                                            <div class="news-img wow zoomIn">
                                                <img class="img-responsive" src="{{ asset('storage/files/' . $item->image) }}"
                                                    alt="{{ $item->title }}">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-7">
                                            <div class="news-img wow zoomIn">
                                                <img class="img-responsive" src="{{ asset('storage/files/' . $item->image) }}"
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
                                                        {{ optional($item->date)->format('M d, Y') }}
                                                        |
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
                                    @endif
                                </div>
                            @elseif($block['type'] === 'text-pair')
                                @php
                                    $first = $block['items'][0];
                                    $second = $block['items'][1];
                                    $reverse = $block['reverse'] ?? false; 
                                @endphp

                                <div class="newsClass">
                                    @if (!$reverse)
                                        <div class="col-md-7">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $first->title }}</h3>
                                                <p class="wow fadeInUp">{{ $first->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($first->date)->format('M d, Y') }}
                                                        |
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

                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $second->title }}</h3>
                                                <p class="wow fadeInUp">{{ $second->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($second->date)->format('M d, Y') }}
                                                        |
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
                                    @else
                                        {{-- 5 / 7 --}}
                                        <div class="col-md-5">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $first->title }}</h3>
                                                <p class="wow fadeInUp">{{ $first->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($first->date)->format('M d, Y') }}
                                                        |
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

                                        <div class="col-md-7">
                                            <div class="news-text">
                                                <h6 class="wow fadeInUp">News</h6>
                                                <h3 class="wow fadeInUp">{{ $second->title }}</h3>
                                                <p class="wow fadeInUp">{{ $second->desc }}</p>
                                                <div class="news-footer wow fadeInUp">
                                                    <h6>
                                                        {{ optional($second->date)->format('M d, Y') }}
                                                        |
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
                                </div>
                            @elseif($block['type'] === 'single')
                                @php
                                    $item = $block['items'][0];
                                @endphp

                                <div class="newsClass">
                                    <div class="col-md-12">
                                        <div class="news-text">
                                            <h6 class="wow fadeInUp">News</h6>
                                            <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                            <p class="wow fadeInUp">{{ $item->desc }}</p>
                                            <div class="news-footer wow fadeInUp">
                                                <h6>
                                                    {{ optional($item->date)->format('M d, Y') }}
                                                    |
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
