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
                @if ($data['news']->isNotEmpty())
                    @foreach ($data['news'] as $n)
                        <div class="col-md-10 col-md-offset-1">
                            <div class="news-wrap">
                                <div class="col-md-5">
                                    <div class="news-text">
                                        <h6 class="wow fadeInUp">News</h6>
                                        <h3 class="wow fadeInUp">{{ $n->title }}</h3>
                                        <p class="wow fadeInUp">{{ $n->desc }}</p>
                                        <div class="news-footer wow fadeInUp">
                                            <h6>{{ $n->date->format('M d, Y') }} | <img
                                                    src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></h6>
                                            <div class="news-arrow-icon"><a href="{{ route('news', $n->slug) }}"><img
                                                        src="{{ asset('assets/images/newsroom/news-arrow.svg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--news-wrap-->
                        </div>
                    @endforeach
                @else
                    <p>No news available.</p>
                @endif
                {{-- <div class="col-md-10 col-md-offset-1">
                    <div class="news-wrap">
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Posts Impressive Q1FY26 Results, Driven by Chemicals
                                    Business Momentum</h3>
                                <p class="wow fadeInUp">SRF Limited, a chemical-based multi-business entity engaged in the
                                    manufacturing of industrial and specialty intermediates, today announced its
                                    consolidated financial results for the first quarter ended June 30, 2025.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Aug 19, 2025 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="news-img wow zoomIn"><img class="img-responsive"
                                    src="images/newsroom/press-releases-img1.webp"></div>
                        </div>
                    </div><!--news-wrap-->
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="news-wrap1">
                        <div class="col-md-7">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Reports 21% Revenue Growth, 60% PBT Increase in Q4FY25
                                </h3>
                                <p class="wow fadeInUp">SRF Limited, a chemical based multi-business entity engaged in the
                                    manufacturing of industrial and specialty intermediates today announced its consolidated
                                    financial results for the fourth quarter and year ended March 31, 2025.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>May 12, 2025 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Posts 14% Revenue Growth, 7% PAT Rise in Q3FY25</h3>
                                <p class="wow fadeInUp">SRF Limited, a chemical based multi-business entity engaged in the
                                    manufacturing of industrial and specialty intermediates today announced its consolidated
                                    financial results for the third quarter and nine months ended December 31, 2024.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Jan 29, 2025 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}""></a></div>
                                </div>
                            </div>
                        </div>
                    </div><!--news-wrap-->
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="news-wrap1">
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Announces Q3 and 9M FY24 Financial Results</h3>
                                <p class="wow fadeInUp">SRF Limited, a chemical based multi-business entity engaged in the
                                    manufacturing of industrial and specialty intermediates today announced its consolidated
                                    financial results for the third quarter and nine months ended December 31, 2023.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Jan 30, 2024 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Announces Q2 and H1 FY24 Financial Results</h3>
                                <p class="wow fadeInUp">Gurugram, October 27, 2023: SRF Limited, a chemical based
                                    multi-business entity engaged in the manufacturing of industrial and specialty
                                    intermediates today announced its consolidated financial results for the second quarter
                                    and half year ended September 30, 2023.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Jan 29, 2025 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                    </h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}""></a></div>
                                </div>
                            </div>
                        </div>
                    </div><!--news-wrap-->
                </div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="news-wrap news-wrap4">
                        <div class="col-md-7">
                            <div class="news-img wow zoomIn"><img class="img-responsive"
                                    src="images/newsroom/press-releases-img2.webp"></div>
                        </div>
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Posts 14% Revenue Growth, 7% PAT Rise in Q3FY25</h3>
                                <p class="wow fadeInUp">Gurugram, January 29, 2025: SRF Limited, a chemical based
                                    multi-business entity engaged in the manufacturing of industrial and specialty
                                    intermediates today announced its consolidated financial results for the third quarter
                                    and nine months ended December 31, 2024.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Jan 29, 2025 | <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                    </h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="{{ asset('assets/images/newsroom/news-arrow.svg') }}""></a></div>
                                </div>
                            </div>
                        </div>

                    </div><!--news-wrap-->
                </div> --}}

            </div>
        </div>

    </section>
@endsection
