@extends('layout.app')
@section('content')
    <section class="investor-tab modTab">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inTabs wow fadeInUp">
                        <ul class="nav nav-tabs" id="in-tab" role="tablist">
                            <li class="nav-item">
                                <a href="{{ route('financial-result') }}" class="nav-link active">
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
                                <a href="{{ route('corporate-governance') }}" class="nav-link">
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
                                        <div class="col-md-4">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill selCategory">
                                                    <option value="financial" data-url="{{ route('financial-result') }}" {{ $data['active_tab'] == 'financial' ? 'selected' : '' }}>Financial
                                                        Results
                                                    </option>
                                                    <option value="annual" data-url="{{ route('annual-report') }}" {{ $data['active_tab'] == 'annual' ? 'selected' : '' }}>Annual Reports
                                                    </option>
                                                    <option value="annual-subs" data-url="{{ route('annual-report-subs') }}"
                                                        {{ $data['active_tab'] == 'annual-subs' ? 'selected' : '' }}>Annual
                                                        Reports - Subsidiaries</option>
                                                    <option value="investor" data-url="{{ route('investor-presentation') }}"
                                                        {{ $data['active_tab'] == 'investor' ? 'selected' : '' }}>Investor
                                                        Presentation</option>
                                                    <option value="annual-return" data-url="{{ route('annual-return') }}" {{ $data['active_tab'] == 'annual-return' ? 'selected' : '' }}>Annual
                                                        Return
                                                    </option>
                                                    <option value="annual-general" data-url="{{ route('annual-general') }}"
                                                        {{ $data['active_tab'] == 'annual-general' ? 'selected' : '' }}>AGM
                                                        Transcript</option>
                                                    <option value="earning" data-url="{{ route('earning-call') }}" {{ $data['active_tab'] == 'earning' ? 'selected' : '' }}>Earnings Call
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group select-box">
                                                <select id="selYear" class="form-control select-pill"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-1" id="quarterBox">
                                            <div class="form-group select-box">
                                                <select id="selQuarter" class="form-control select-pill"></select>
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
@push('modals')
    <!-- Protected PDF Modal -->
    <div class="modal fade" id="protectedPdfModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" id="protectedPdfContainer" style="height:80vh;">
                </div>
            </div>
        </div>
    </div>
@endpush
@push('scripts')
    <script>
        window.investorConfig = {
            activeTab: "{{ $data['active_tab'] ?? 'financial' }}",
            getInvestorDataUrl: "{{ route('get-investor-data') }}"
        };
    </script>
    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush