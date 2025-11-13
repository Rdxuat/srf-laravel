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
                                                    @if(isset($data['directors']) && count($data['directors']) > 0)
                                                        @foreach ($data['directors'] as $director)
                                                                <div class="col-md-4">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#bod{{ $director->id }}">
                                                                    <div class="bod-box">
                                                                        <div class="light-bluebg">
                                                                            <div class="bod-img"><img class="img-responsive" src="{{ asset('storage/uploads/bod/' . $director->image) }}" alt="{{ $director->name }}"></div>
                                                                        </div>
                                                                        <div class="bod-text">
                                                                            <h4>{{ $director->name }} <span>{{ $director->designation }}</span></h4>
                                                                        </div>
                                                                        @php
        $dotColors = [
            1 => 'blue',
            2 => 'green',
            3 => 'yellow',
            4 => 'Ltblue',
            5 => 'Litblue',
        ];
        $committees = $director->committe
            ? array_map('trim', explode(',', $director->committe))
            : [];
                                                                        @endphp
                                                                        @if(!empty($committees))
                                                                            <div class="dot-wrapper">
                                                                                @foreach($committees as $c)
                                                                                    @if(isset($dotColors[$c]))
                                                                                        <span class="dot {{ $dotColors[$c] }}"></span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif
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
    <script>
    document.addEventListener('show.bs.modal', (event) => {
        document.documentElement.classList.add('modal-open');
        document.body.classList.add('modal-open');
    });
    document.addEventListener('hidden.bs.modal', (event) => {
        if (document.querySelectorAll('.modal.show').length === 0) {
            document.documentElement.classList.remove('modal-open');
            document.body.classList.remove('modal-open');
        }
    });
    </script>
@endpush
@push('modals')
    @if(isset($data['directors']) && count($data['directors']) > 0)
        @foreach ($data['directors'] as $director)
            <div class="modal fade" id="bod{{ $director->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <img src="{{ asset('assets/images/bod/close-arrow.svg') }}" alt="Close"> Close
                            </button>
                        </div>
                        <div class="modal-body bodpop-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="scl-icons">
                                            <a href="#"><img src="{{ asset('assets/images/bod/linkedin.svg') }}"></a>
                                            <a href="#"><img src="{{ asset('assets/images/bod/tw.svg') }}"></a>
                                            <a href="#"><img src="{{ asset('assets/images/bod/shares.svg') }}"></a>
                                            <a href="#"><img src="{{ asset('assets/images/bod/link.svg') }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="pop-img">
                                            <img class="img-responsive" src="{{ asset('storage/uploads/bod/' . $director->modal_image) }}" alt="{{ $director->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>{{ $director->name }}</h4>
                                        <h6>{{ $director->designation }}</h6>
                                        @if(!empty($director->intro))
                                            <h5>{{ $director->intro }}</h5>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        {!! $director->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endpush