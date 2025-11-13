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
                                <a href="{{ route('stock-quote') }}" class="nav-link active">
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
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill selCategory ">
                                                    <option value="stock-quote" data-url="{{ route('stock-quote') }}" {{ $data['active_tab'] == 'stock-quote' ? 'selected' : '' }}>Stock Quote</option>
                                                    <option value="stock-chart" data-url="{{ route('stock-chart') }}" {{ $data['active_tab'] == 'stock-chart' ? 'selected' : '' }}>Stock Chart</option>
                                                    <option value="historical-price" data-url="{{ route('historical-price') }}" {{ $data['active_tab'] == 'historical-price' ? 'selected' : '' }}>Historical Stock Price</option>
                                                    <option value="investment-calculator" data-url="{{ route('investment-calculator') }}" {{ $data['active_tab'] == 'investment-calculator' ? 'selected' : '' }}>Investment Calculator</option>
                                                    <option value="dividend-shares" data-url="{{ route('dividend-shares') }}" {{ $data['active_tab'] == 'dividend-shares' ? 'selected' : '' }}>Dividend and Shares - Unclaimed Dividend
                                                    </option>
                                                    <option value="listing" data-url="{{ route('listing') }}" {{ $data['active_tab'] == 'listing' ? 'selected' : '' }}>Listing</option>
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
                                    <div class="row" id="dividend-shares" style="display: none">
                                        <div class="col-md-12">
                                            <div class="tranferForm">
                                                <h4>Unclaimed and Unpaid Dividends:</h4>
                                                <form id="unclaimedForm" method="post">
                                                    <input type="hidden" name="_token" value="OjiGe9Fn1huW58zFBlsMHsU7NGFXBzTEQsHqXVl8" autocomplete="off">
                                                    <div class="form-group">
                                                        <label>Select Year :</label>
                                                        <select class="form-control" name="year" id="year" required="">
                                                            <option value="2023-24 Final Div">
                                                                2023-24 Final Div
                                                            </option>
                                                            <option value="2023-24 Interim &amp; Special">
                                                                2023-24 Interim &amp; Special
                                                            </option>
                                                            <option value="2022-23 Final">
                                                                2022-23 Final
                                                            </option>
                                                            <option value="2021-22 Final">
                                                                2021-22 Final
                                                            </option>
                                                            <option value="2021-22 Interim">
                                                                2021-22 Interim
                                                            </option>
                                                            <option value="2020-21 Final">
                                                                2020-21 Final
                                                            </option>
                                                            <option value="2019-20 Interim">
                                                                2019-20 Interim
                                                            </option>
                                                            <option value="2018-19 Interim">
                                                                2018-19 Interim
                                                            </option>
                                                        </select>
                                                        <span id="yearError" style="color:red; display:none; position:absolute;bottom:-34px">Above Field is
                                                            Required</span>
                                                    </div>

                                                    <div class="form-group" style="position:relative;">
                                                        <label>Enter your DP ID / Client ID / Folio Number :</label>
                                                        <input type="text" class="form-control" name="dpid_or_folio" id="dpid_or_folio" value="" required="">
                                                        <span id="dpidError" style="color:red; display:none; position:absolute;bottom:-34px">Above Field is
                                                            Required</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="transBtns">
                                                            <button type="button" id="submitUnclaimedForm">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="submitResults" id="unclaimedDividend">
                                                    <h3>FY 2018-19 Interim</h3>
                                                    <div class="resultsThree">
                                                        <div>
                                                            <p>Name:<span>BIMLA DEVI </span></p>
                                                            <p>Father/Husband Name: <span>SH K Rao</span></p>
                                                            <p>Address: <span>lorem50</span></p>
                                                        </div>
                                                        <div>
                                                            <p>District:<span> Gurugram</span></p>
                                                            <p>State: <span> Haryana</span></p>
                                                            <p>Country: <span> India</span></p>
                                                            <p>Pin Code: <span> 122222</span></p>
                                                        </div>
                                                        <div class="orangResult">
                                                            <div class="topOrg">
                                                                <div>
                                                                    <p>Investment Type: <span>No of underlying Shares</span></p>
                                                                </div>
                                                                <div>
                                                                    <p>Amount Transfered: <span>300</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="botOrg">
                                                                <p>Proposed Date of transfer to IEPF: <span>5 Sep 2025</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="folioNo">
                                                        <div>
                                                            <p> DPid-Clid / Folio: <span>TES0000128</span></p>
                                                            <p>Warrant No:<span>2200021 </span></p>
                                                            <p>Pan No:<span> </span></p>
                                                        </div>
                                                        <div>
                                                            <p>Bank Account Number:<span>9884898989899898 </span></p>
                                                            <p>Bank Name:<span>ORIENTAL BANK OF COMMERCE </span></p>
                                                            <p>Bank Address:<span>REWARI , , , </span></p>
                                                        </div>
                                                        <div>
                                                            <p>Due date of transfer to IEPF: <span>17 Mar 2026</span></p>
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
            activeTab: "{{ $data['active_tab'] ?? 'stock-quote' }}",
            getInvestorDataUrl: "{{ route('get-investor-data') }}"
        };
    </script>
    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush