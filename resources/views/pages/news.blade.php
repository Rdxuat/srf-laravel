@extends('layout.app')
@section('content')
    <section class="newsroom-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sitemap">
                        <a href="index.php">Home</a> /
                        <a>Newsroom</a> /
                        <a class="b-active">Press Releases</a>
                    </div>
                    <h2 class="wow fadeInUp">{{ $news->title }}</h2>
                    <div class="news-date">
                        <p class="wow fadeInUp"><span>{{ $news->date->format('M d, Y') }}</span> | <span>News</span>
                            @if (!empty($news->quarter))
                                | <span>{{ $news->quarter }}{{ $news->year }}</span>
                            @endif
                        </p>
                        <div class="news-icons wow fadeInUp">
                            <a href="javascript:void(0)" onclick="copyURL()" class="copy-link">
                                <img src="{{ asset('assets/images/newsroom/link-icon.svg') }}">
                            </a> |
                            <a href=""><img src="{{ asset('assets/images/newsroom/share-icon.svg') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="press-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {!! $news->detail !!}
                </div>
            </div>
        </div>
    </section>

    <section class="press-wrap press-wrap1 press-wrap2">
        <div class="container">
            <div class="row">
                @php
                    $related = $data['related'] ?? collect();
                @endphp

                @if ($related->isNotEmpty())
                    <div class="col-md-10 col-md-offset-1">
                        <h4 class="wow fadeInUp">Also Read</h4>
                    </div>

                    {{-- FIRST ROW: item 1 (5 col) + item 2 (7 col) --}}
                    @if ($related->count() >= 1)
                        <div class="col-md-10 col-md-offset-1">
                            <div class="news-wrap1">
                                @php
                                    $item1 = $related[0];
                                @endphp

                                <div class="col-md-5">
                                    <div class="news-text">
                                        <h6 class="wow fadeInUp">News</h6>
                                        <h3 class="wow fadeInUp">{{ $item1->title }}</h3>
                                        <p class="wow fadeInUp">{{ $item1->desc }}</p>
                                        <div class="news-footer wow fadeInUp">
                                            <h6>
                                                {{ optional($item1->date)->format('M d, Y') }} |
                                                <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                            </h6>
                                            <div class="news-arrow-icon">
                                                <a href="{{ route('news', $item1->slug) }}">
                                                    <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($related->count() >= 2)
                                    @php
                                        $item2 = $related[1];
                                    @endphp
                                    <div class="col-md-7">
                                        <div class="news-text">
                                            <h6 class="wow fadeInUp">News</h6>
                                            <h3 class="wow fadeInUp">{{ $item2->title }}</h3>
                                            <p class="wow fadeInUp">{{ $item2->desc }}</p>
                                            <div class="news-footer wow fadeInUp">
                                                <h6>
                                                    {{ optional($item2->date)->format('M d, Y') }} |
                                                    <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                </h6>
                                                <div class="news-arrow-icon">
                                                    <a href="{{ route('news', $item2->slug) }}">
                                                        <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div><!-- /.news-wrap1 -->
                        </div>
                    @endif

                    {{-- SECOND ROW: item 3 → image (7) + text (5) OR only text (12) --}}
                    @if ($related->count() >= 3)
                        @php
                            $item3 = $related[2];
                        @endphp

                        <div class="col-md-10 col-md-offset-1">
                            <div class="news-wrap news-wrap4">

                                @if (!empty($item3->image))
                                    {{-- Image left (7) + text right (5) --}}
                                    <div class="col-md-7">
                                        <div class="news-img wow zoomIn">
                                            <img class="img-responsive" src="{{ asset('storage/files/' . $item3->image) }}"
                                                alt="{{ $item3->title }}">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="news-text">
                                            <h6 class="wow fadeInUp">News</h6>
                                            <h3 class="wow fadeInUp">{{ $item3->title }}</h3>
                                            <p class="wow fadeInUp">{{ $item3->desc }}</p>
                                            <div class="news-footer wow fadeInUp">
                                                <h6>
                                                    {{ optional($item3->date)->format('M d, Y') }} |
                                                    <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                </h6>
                                                <div class="news-arrow-icon">
                                                    <a href="{{ route('news', $item3->slug) }}">
                                                        <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- No image → full-width text --}}
                                    <div class="col-md-12">
                                        <div class="news-text">
                                            <h6 class="wow fadeInUp">News</h6>
                                            <h3 class="wow fadeInUp">{{ $item3->title }}</h3>
                                            <p class="wow fadeInUp">{{ $item3->desc }}</p>
                                            <div class="news-footer wow fadeInUp">
                                                <h6>
                                                    {{ optional($item3->date)->format('M d, Y') }} |
                                                    <img src="{{ asset('assets/images/newsroom/share-icon.svg') }}">
                                                </h6>
                                                <div class="news-arrow-icon">
                                                    <a href="{{ route('news', $item3->slug) }}">
                                                        <img src="{{ asset('assets/images/newsroom/news-arrow.svg') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div><!-- /.news-wrap -->
                        </div>
                    @endif
                @else
                    <div class="col-md-10 col-md-offset-1">
                        <h4 class="wow fadeInUp">Also Read</h4>
                        <p>No related news available.</p>
                    </div>
                @endif

            </div>
        </div>
    </section>




@endsection
@push('scripts')
    <script>
        function copyURL() {
            let url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert("URL copied to clipboard!");
            }).catch(err => {
                console.error("Copy failed", err);
            });
        }
    </script>
@endpush
