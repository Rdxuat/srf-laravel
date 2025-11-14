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
                                <a href="{{ route('credit-ratings') }}" class="nav-link active">
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
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill selCategory">
                                                    <option value="credit-ratings" data-url="{{ route('credit-ratings') }}" {{ $data['active_tab'] == 'credit-ratings' ? 'selected' : '' }}>Credit Ratings</option>
                                                    <option value="dematerialisation" data-url="{{ route('dematerialisation') }}" {{ $data['active_tab'] == 'dematerialisation' ? 'selected' : '' }}>Dematerialisation of Shares</option>
                                                    <option value="regulation30" data-url="{{ route('regulation30') }}" {{ $data['active_tab'] == 'regulation30' ? 'selected' : '' }}>Disclosures under Regulation 30(5) of SEBI LODR</option>
                                                    <option value="regulation46" data-url="{{ route('regulation46') }}" {{ $data['active_tab'] == 'regulation46' ? 'selected' : '' }}>Disclosures Under Regulations 46 of the LODR</option>
                                                    <option value="investor-meet" data-url="{{ route('investor-meet') }}" {{ $data['active_tab'] == 'investor-meet' ? 'selected' : '' }}>Investor Meet</option>
                                                    <option value="kyc-forms" data-url="{{ route('kyc-forms') }}" {{ $data['active_tab'] == 'kyc-forms' ? 'selected' : '' }}>KYC Forms (FAQ)</option>
                                                    <option value="nomination" data-url="{{ route('nomination') }}" {{ $data['active_tab'] == 'nomination' ? 'selected' : '' }}>Nomination Facility</option>
                                                    <option value="notices" data-url="{{ route('notices') }}" {{ $data['active_tab'] == 'notices' ? 'selected' : '' }}>
                                                        Notices</option>
                                                    <option value="odr" data-url="{{ route('odr') }}" {{ $data['active_tab'] == 'odr' ? 'selected' : '' }}>Online Dispute
                                                        Resolution</option>
                                                    <option value="registrar" data-url="{{ route('registrar') }}" {{ $data['active_tab'] == 'registrar' ? 'selected' : '' }}>Registrar & Share Transfer Agents</option>
                                                    <option value="scheme" data-url="{{ route('scheme') }}" {{ $data['active_tab'] == 'scheme' ? 'selected' : '' }}>Scheme
                                                        of Arrangements</option>
                                                    <option value="compliance-report" data-url="{{ route('compliance-report') }}" {{ $data['active_tab'] == 'compliance-report' ? 'selected' : '' }}>Secretarial Compliance Report</option>
                                                    <option value="shareholding" data-url="{{ route('shareholding') }}" {{ $data['active_tab'] == 'shareholding' ? 'selected' : '' }}>Shareholding Pattern</option>
                                                    <option value="shareholder-services" data-url="{{ route('shareholder-services') }}" {{ $data['active_tab'] == 'shareholder-services' ? 'selected' : '' }}>Shareholder Services</option>
                                                    <option value="survey-forms" data-url="{{ route('survey-forms') }}" {{ $data['active_tab'] == 'survey-forms' ? 'selected' : '' }}>Shareholder Survey Forms</option>
                                                    <option value="share-transfer-system" data-url="{{ route('share-transfer-system') }}" {{ $data['active_tab'] == 'share-transfer-system' ? 'selected' : '' }}>Share Transfer System</option>
                                                    <option value="stock-filings" data-url="{{ route('stock-filings') }}" {{ $data['active_tab'] == 'stock-filings' ? 'selected' : '' }}>Stock Exchange Filings</option>
                                                    <option value="tds-instructions" data-url="{{ route('tds-instructions') }}" {{ $data['active_tab'] == 'tds-instructions' ? 'selected' : '' }}>TDS Instructions on Dividend Distribution</option>
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
                                    <div class="row investor-content" id="credit-ratings" style="display: none">
                                        <div class="col-md-12">
                                            <div class="credit-rating">

                                                <div class="table-responsive">
                                                    <table class="credit-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Instrument</th>
                                                                <th>Rating Agency</th>
                                                                <th>Rating</th>
                                                                <th>Outlook</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Fund Based and Non-Fund Based Working Capital
                                                                    Limits</td>
                                                                <td>India Ratings</td>
                                                                <td>IND AA+/Stable/IND A1+</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Long Term Loans</td>
                                                                <td>India Ratings</td>
                                                                <td>IND AA+/Stable</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Commercial Papers</td>
                                                                <td>India Ratings</td>
                                                                <td>IND A1+</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Commercial Papers</td>
                                                                <td>CRISIL</td>
                                                                <td>CRISIL A1+</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Long Term Loans</td>
                                                                <td>CRISIL</td>
                                                                <td>CRISIL AA+/Stable</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fund Based and Non-Fund Based Working Capital
                                                                    Limits</td>
                                                                <td>CRISIL</td>
                                                                <td>CRISIL AA+/Stable/CRISIL A1+</td>
                                                                <td>Stable</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row investor-content" id="dematerialisation" style="display: none">
                                        <div class="col-md-12">
                                            <h2>tds-instructions</h2>
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
            activeTab: "{{ $data['active_tab'] ?? 'credit-ratings' }}",
            getInvestorDataUrl: "{{ route('get-investor-data') }}"
        };
    </script>
    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush