@extends('layout.app')
@section('content')
    <section class="investor-tab modTab">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inTabs wow fadeInUp">
                        <ul class="nav nav-tabs" id="in-tab" role="tablist">
                            <li class="nav-item">
                                <a href="{{ route('financial-result') }}" class="nav-link">
                                    Financial Reports & Results
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('stock-quote') }}" class="nav-link">
                                    Stock Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('credit-ratings') }}" class="nav-link">
                                    Shareholder Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('corporate-governance') }}" class="nav-link active">
                                    Corporate Governance
                                </a>
                            </li>

                        </ul>
                    </div>

                    <select class="l-tab-mbl" id="tab_selector">
                        <option value="0">Financial Reports & Results</option>
                        <option value="1">Stock Information</option>
                        <option value="2">Shareholder Information</option>
                        <option value="3"> Corporate Governance</option>
                    </select>

                    <div class="tab-content in-tabcontent" id="inTabContent">
                        <div class="tab-pane fade show active" id="in-tab-a" role="tabpanel" aria-labelledby="in-tab-1">
                            <div class="stakeTabBody">
                                <div class="invest-bg newBg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill selCategory">
                                                    <option value="overview" data-url="{{ route('corporate-governance') }}" {{ $data['active_tab'] == 'overview' ? 'selected' : '' }}>
                                                        Overview</option>
                                                    <option value="bod" data-url="{{ route('bod') }}" {{ $data['active_tab'] == 'bod' ? 'selected' : '' }}>Board of
                                                        Directors and Committees</option>
                                                    <option value="policy" data-url="{{ route('policy') }}" {{ $data['active_tab'] == 'policy' ? 'selected' : '' }}>
                                                        Policies</option>
                                                    <option value="corporate" data-url="{{ route('corporate-gov-report') }}" {{ $data['active_tab'] == 'corporate' ? 'selected' : '' }}>Corporate Governance Reports</option>
                                                    <option value="other" data-url="{{ route('other-disclosure') }}" {{ $data['active_tab'] == 'other' ? 'selected' : '' }}>Other
                                                        Disclosures</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group select-box">
                                                <select id="selYear" class="form-control select-pill"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-3" id="quarterBox">
                                            <div class="form-group select-box">
                                                <select id="selQuarter" class="form-control select-pill"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="overview" style="display: none">
                                        <div class="col-md-12">
                                            <div class="office-content">
                                                <p>The Company is of the belief that sound Corporate Governance is vital
                                                    to enhance and retain stakeholders trust. The Company is committed
                                                    to the adoption of best governance practices and its adherence in
                                                    the true spirit at all times and envisages the attainment of a high
                                                    level of transparency and accountability in the functioning and
                                                    conduct of its business internally and externally.</p>
                                                <p>The Company is in compliance with the requirements of the guidelines
                                                    on Corporate Governance stipulated in the Listing Agreement with the
                                                    Stock Exchanges, especially with respect to broad basing of the
                                                    board, constituting the committees such as the Audit Committee and
                                                    the Investors' Grievance Committee.</p>
                                                <p>SRF has carved out the following committees of its Board of Directors
                                                    for institutionalizing compliance with corporate governance
                                                    requirements:</p>
                                                <div class="mainAudit">
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="{{ asset('assets/images/invest/audit-committee-icon.svg')}}" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                        <p>Audit Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="{{ asset('assets/images/invest/stakeholders-relationship-icon.svg')}}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Stakeholders Relationship Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="{{ asset('assets/images/invest/nomination-icon.svg')}}" class="img-responsive" alt="">
                                                        </div>
                                                        <p>Nomination and Remuneration Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="{{ asset('assets/images/invest/corporate-social-responsibility-icon.svg')}}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Corporate Social Responsibility Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="{{ asset('assets/images/invest/risk-management-committee-icon.svg')}}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Risk Management Committee</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row office-content" id="bod" style="display:none;">
                                        <div class="myBod">
                                            <div class="col-md-12">
                                                <div class="bodSec">
                                                    <h2>Board of Directors</h2>
                                                </div>
                                            </div>
                                            <div class="childSec">
                                                <div class="new">
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img1.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Ashish Bharat Ram <span>Chairman &amp;
                                                                            Managing
                                                                            Director</span></h4>
                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot blue"></span>
                                                                    <span class="dot yellow"></span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img2.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Kartik Bharat Ram<span>Joint Managing
                                                                            Director</span></h4>

                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot yellow"></span>
                                                                    <span class="dot blue"></span>
                                                                    <span class="dot green"></span>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="new">
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img3.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Vellayan Subbiah<span>Non-Executive,
                                                                            Non-Independent Director</span></h4>
                                                                </div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img4.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Vineet Agarwal<span>Independent
                                                                            Director</span></h4>

                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot Ltblue"></span>

                                                                </div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod5">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img5.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Ira Gupta<span>Independent Director</span>
                                                                    </h4>

                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot Ltblue"></span>
                                                                    <span class="dot green"></span>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="new">
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img6.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Bharti Gupta Ramola<span>Independent
                                                                            Director</span></h4>
                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot Litblue"></span>
                                                                    <span class="dot blue"></span>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img7.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Puneet Yadu Dalmia<span>Independent
                                                                            Director</span></h4>

                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot Ltblue"></span>

                                                                </div>

                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod5">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img8.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Yash Gupta<span>Independent Director</span>
                                                                    </h4>

                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot Litblue"></span>
                                                                    <span class="dot green"></span>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="new">
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img9.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Raj Kumar Jain<span>Independent
                                                                            Director</span></h4>
                                                                </div>
                                                                <div class="dot-wrapper">
                                                                    <span class="dot yellow"></span>
                                                                    <span class="dot Litblue"></span>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                            <div class="bod-box">
                                                                <div class="light-bluebg">
                                                                    <div class="bod-img"><img class="img-responsive" src="{{asset('assets/images/bod/bod-img10.webp')}}"></div>
                                                                </div>
                                                                <div class="bod-text">
                                                                    <h4>Pramod Gopaldas Gujarathi<span>Independent
                                                                            Director</span></h4>

                                                                </div>


                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="committee-box">
                                                    <div class="committee-title">Committees</div>
                                                    <div class="committee-list">
                                                        <div class="committee-item"><span class="dot audit"></span>Audit
                                                            Committee</div>
                                                        <div class="committee-item"><span class="dot stakeholder"></span>Stakeholder
                                                            Relationship Committee</div>
                                                        <div class="committee-item"><span class="dot nomination"></span>Nomination and
                                                            Remuneration Committee</div>
                                                        <div class="committee-item"><span class="dot csr"></span>CSR
                                                            Committee</div>
                                                        <div class="committee-item"><span class="dot risk"></span>Risk
                                                            Management Committee
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="resultContainer" class="mt-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--vc-tabcontent-->
                </div>
            </div>
        </div>



    </section>
@endsection
@push('scripts')
    <script>
        window.investorConfig = {
            activeTab: "{{ $data['active_tab'] ?? 'overview' }}",
            getInvestorDataUrl: "{{ route('get-investor-data') }}"
        };
    </script>
    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush