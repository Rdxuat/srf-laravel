@extends('layout.app') @section('content') <section class="inside-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sitemap"> <a href="index.php">Home</a> / <a>Media & Updates</a> / <a class="b-active">Press
                            Releases</a> </div>
                </div>
            </div>
        </div>
    </section>
    <section class="press-wrap press-wrap1">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="inner-mhead wow fadeInUp">Press Releases</h2>
                    <h5 class="wow fadeInUp">Latest from the world of SRF</h5>
                    <div class="award-select press-select">
                        <form method="GET" class="award-select press-select">
                            <p>Sort by</p> 
                            <select name="month" onchange="this.form.submit()">
                                <option value="">Month</option>
                                @foreach ($data['months'] as $m)
                                    <option value="{{ $m->month }}"
                                        {{ request('month') == $m->month ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m->month, 1)) }} </option>
                                @endforeach
                            </select> 
                            <select name="year" onchange="this.form.submit()">
                                <option value="">Year</option>
                                @foreach ($data['years'] as $y)
                                    <option value="{{ $y->year }}" {{ request('year') == $y->year ? 'selected' : '' }}>
                                        {{ $y->year }} </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
