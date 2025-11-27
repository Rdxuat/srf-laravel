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
                            @if(!empty($news->quarter))
                            | <span>{{ $news->quarter }}{{ $news->year }}</span>
                            @endif</p>
                        <div class="news-icons wow fadeInUp">
                            <a href=""><img src="{{ asset('assets/images/newsroom/link-icon.svg') }}"></a> |
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
                    {{-- <p class="wow fadeInUp"><b>Gurugram, July 23, 2025:</b> SRF Limited, a chemical-based multi-business
                        entity engaged in the manufacturing of industrial and specialty intermediates, today announced its
                        consolidated financial results for the first quarter ended June 30, 2025. The company’s unaudited
                        results were reviewed and approved by the Board of Directors at a meeting held earlier today.</p>
                    <h5 class="wow fadeInUp">Consolidated Q1FY26 Financials</h5>
                    <p class="wow fadeInUp">The consolidated revenue of the company increased 10% from ₹3,464 crore to
                        ₹3,819 crore in Q1FY26 when compared with Corresponding Period Last Year (CPLY). The company’s
                        Earnings before Interest and Tax (EBIT) increased 43% from ₹484 crore to ₹694 crore in Q1FY26 when
                        compared with CPLY. The company’s Profit after Tax (PAT) increased 71% from ₹252 crore to ₹432 crore
                        in Q1FY26 when compared with CPLY.</p>
                    <p class="wow fadeInUp">Commenting on the results, Chairman and Managing Director, Ashish Bharat Ram
                        said, “In spite of a weak summer and prevailing global uncertainties, we have had a good start to
                        the year. We remain cautiously optimistic for the rest of the year. Our capital expenditure plans
                        continue to be robust, as reflected in the latest announcements.”</p>
                    <div class="row p-mt">
                        <div class="col-md-5">
                            <h5 class="wow fadeInUp">Consolidated Q1FY26 Segment Results</h5>
                            <p class="wow fadeInUp">The Chemicals Business reported an increase of 24% in its revenue from
                                ₹1,482 crore to ₹1,839 crore during Q1FY26 over CPLY. The operating profit of the Chemicals
                                Business increased 64% from ₹306 crore to ₹503 crore in Q1FY26 over CPLY.</p>
                            <p class="wow fadeInUp">The Specialty Chemicals Business continued to witness demand uptick for
                                key agrochemical intermediates. Strategic pricing initiatives and solid performance in
                                export markets contributed to the segment’s revenue growth.</p>
                            <p class="wow fadeInUp">The Fluorochemicals Business delivered robust performance, driven by
                                higher refrigerant gas pricing. Despite a weak domestic market, the Business was able to
                                find countermeasures by enhancing its exports.</p>
                            <p class="wow fadeInUp">The Performance Films & Foil Business reported an increase of 6% in its
                                revenue from ₹1,336 crore to ₹1,418 crore during Q1FY26 when compared with CPLY. The
                                operating profit of the Performance Films & Foil Business increased 62% from ₹87 crore to
                                ₹140 crore in Q1FY26 over CPLY.</p>
                            <p class="wow fadeInUp">During Q1FY26, the Performance Films & Foil Business achieved its
                                highest-ever packed production, reflecting enhanced operational efficiency and capacity
                                utilization. The Business remained focused on profitability by commercializing new
                                Value-Added Products (VAPs) and accelerating sales of high-impact VAPs. Aluminium Foil
                                registered its highest quarterly sales to date, reflecting encouraging market demand and
                                effective execution of strategic initiatives.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="press-img1 wow zoomIn"><img class="img-responsive"
                                    src="images/newsroom/newsroom-img1.webp"></div>
                        </div>
                    </div><!--row-->
                    <p class="wow fadeInUp">The Technical Textiles Business reported a decrease of 11% in its segment
                        revenue from ₹525 crore to ₹467 crore during Q1FY26 over CPLY. The operating profit of the Technical
                        Textiles Business decreased 44% from ₹68 crore to ₹38 crore in Q1FY26 over CPLY.</p>
                    <p class="wow fadeInUp">In Q1FY26, domestic demand for Nylon Tyre Cord Fabric witnessed a decline. The
                        Belting Fabrics Business segment faced increased pricing pressures due to persistent dumping from
                        China. Nonetheless, the quarter saw stable performance in other areas, with Nylon and Polyester
                        Industrial Yarn showing improved sales.</p>
                    <p class="wow fadeInUp">The Other Businesses reported a decrease of 25% in its segment revenue from ₹126
                        crore to ₹95 crore in Q1FY26 when compared with CPLY. The operating profit of the Other Businesses
                        decreased 43% from ₹24 crore to ₹13 crore in Q1FY26 over CPLY. The performance of the Coated and
                        Laminated Fabrics Businesses remained muted during the quarter, reflecting subdued market conditions
                        and demand softness in key segments.</p>
                    <h5 class="wow fadeInUp">Capex</h5>
                    <h4 class="wow fadeInUp">Chemicals Business</h4>
                    <p class="wow fadeInUp">The Board has approved the establishment of a dedicated facility at Dahej to
                        produce 12,000 MT per annum of an agrochemical intermediate, with an estimated investment of ₹250
                        crore, to address projected future demand.</p>
                    <h4 class="wow fadeInUp">Performance Films & Foil Business</h4>
                    <p class="wow fadeInUp">The Board has approved a ₹490 crore investment to set up a BOPP film
                        manufacturing facility in Indore, featuring state-of-the-art 10.4m wide Bruckner film line and a
                        metallizer. The project is expected to be completed in 24 months.</p>
                    <h5 class="wow fadeInUp">Interim Dividend</h5>
                    <p class="wow fadeInUp">In today’s meeting of the board of directors, an interim dividend amounting to
                        ₹4 per share was approved.</p>
                    <h5 class="wow fadeInUp">Innovation and Intellectual Property</h5>
                    <p class="wow fadeInUp">As of June 30, 2025, the company has applied for a total of four hundred and
                        ninety-four patents. Till date, the company has been granted one hundred and fifty-three patents
                        globally.</p>
                    <h5 class="wow fadeInUp">Awards and Recognition</h5>
                    <p class="wow fadeInUp">1. SRF’s Fluorochemicals Business received the ZERO PPM Award from Toyota
                        Kirloskar Motor Pvt Ltd. for quality and defect-free performance. 2. SRF Foundation received the
                        ‘CSR Times Award 2025 (Gold)’ for its Rural Education Program in Mewat.</p> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="press-wrap press-wrap1 press-wrap2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h4 class="wow fadeInUp">Also Read</h4>
                    <div class="news-wrap1">
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">SRF Limited Announces Q3 and 9M FY24 Financial Results</h3>
                                <p class="wow fadeInUp">SRF Limited, a chemical based multi-business entity engaged in the
                                    manufacturing of industrial and specialty intermediates today announced its consolidated
                                    financial results for the third quarter and nine months ended December 31, 2023.</p>
                                <div class="news-footer wow fadeInUp">
                                    <h6>Jan 30, 2024 | <img src="images/newsroom/share-icon.svg"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="images/newsroom/news-arrow.svg"></a></div>
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
                                    <h6>Jan 29, 2025 | <img src="images/newsroom/share-icon.svg"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="images/newsroom/news-arrow.svg"></a></div>
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
                                    <h6>Jan 29, 2025 | <img src="images/newsroom/share-icon.svg"></h6>
                                    <div class="news-arrow-icon"><a href=""><img
                                                src="images/newsroom/news-arrow.svg"></a></div>
                                </div>
                            </div>
                        </div>

                    </div><!--news-wrap-->
                </div>

            </div>
        </div>

    </section> --}}
    <section class="press-wrap press-wrap1 press-wrap2">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h4 class="wow fadeInUp">Also Read</h4>

                @foreach($data['related'] as $item)
                    <div class="news-wrap1">
                        <div class="col-md-5">
                            <div class="news-text">
                                <h6 class="wow fadeInUp">News</h6>
                                <h3 class="wow fadeInUp">{{ $item->title }}</h3>
                                <p class="wow fadeInUp">{{ $item->desc }}</p>

                                <div class="news-footer wow fadeInUp">
                                    <h6>{{ $item->date->format('M d, Y') }} | 
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

                        @if($item->image)
                            <div class="col-md-7">
                                <div class="news-img wow zoomIn">
                                    <img class="img-responsive" src="{{ asset('storage/'.$item->image) }}">
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection
