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
                                                    <div class="form-group">
                                                        <label>Select Year :</label>
                                                        <select class="form-control" name="year" id="year" required>
                                                            <option value="">Select Year</option>
                                                            @if(isset($data['years']) && count($data['years']) > 0)
                                                                @foreach($data['years'] as $year)
                                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                                @endforeach
                                                            @endif
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
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row phirZ" id="listing" style="display:none">
                                        <div class="col-md-12">
                                            <div class="listing-table invest-bg">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name and Address of Stock Exchange</th>
                                                            <th>Stock Code</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BSE Limited Phiroze Jeejeebhoy Towers, Dalal Street,
                                                                Mumbai-400 001.</td>
                                                            <td><a href="https://www.bseindia.com/stock-share-price/srf-ltd/srf/503806/"
                                                                    target="blank">503806</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>National Stock Exchange of India Ltd. 'Exchange
                                                                Plaza',
                                                                Bandra-Kurla Complex, Bandra (E), Mumbai-400 051
                                                            </td>
                                                            <td><a href="https://www.nseindia.com/get-quotes/equity?symbol=SRF"
                                                                    target="blank">NIFTY - SRF</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
    <script>
        $('#submitUnclaimedForm').click(function() {
            
            let year = $('#year').val();
            let folio = $('#dpid_or_folio').val();
            $("#yearError").hide();
            $("#dpidError").hide();

            let hasError = false;

            if (!year) {
                $("#yearError").css("display", "block");
                hasError = true;
            }

            if (!folio) {
                $("#dpidError").css("display", "block");
                hasError = true;
            }

            if (hasError) return; // stop form

            $.ajax({
                url: "{{ route('search.unclaimed') }}",
                type: "POST",
                data: {
                    year: year,
                    dpid_or_folio: folio,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (!response.status) {
                        $("#unclaimedDividend").html('<p style="color:red">No records found.</p>');
                        return;
                    }

                    let d = response.data;

                    let html = `
                        <h3>${d.financial_year}</h3>
                        <div class="resultsThree">
                            <div>
                                <p>Name:<span> ${d.investor_first_name} ${d.investor_middle_name ?? ''} ${d.investor_last_name} </span></p>
                                <p>Father/Husband Name: <span>${d.husband_first_name} ${d.husband_middle_name ?? ''} ${d.husband_last_name}</span></p>
                                <p>Address: <span>${d.address}</span></p>
                            </div>
                            <div>
                                <p>District:<span> ${d.district}</span></p>
                                <p>State: <span> ${d.state}</span></p>
                                <p>Country: <span> ${d.country}</span></p>
                                <p>Pin Code: <span> ${d.pin_code}</span></p>
                            </div>
                            <div class="orangResult">
                                <div class="topOrg">
                                    <div>
                                        <p>Investment Type: <span>${d.investment_type}</span></p>
                                    </div>
                                    <div>
                                        <p>Amount Transferred: <span>${d.ammount_transferred}</span></p>
                                    </div>
                                </div>
                                <div class="botOrg">
                                    <p>Proposed Date of transfer to IEPF: <span>${d.proposed_date}</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="folioNo">
                            <div>
                                <p>DPid-Clid / Folio: <span>${d.dp_id_client_id ?? d.folio_number}</span></p>
                                <p>PAN No:<span>${d.pan}</span></p>
                                <p>Aadhar:<span>${d.aadhar_number}</span></p>
                            </div>
                            <div>
                                <p>Nominee:<span>${d.nominee_name}</span></p>
                                <p>Joint Holder:<span>${d.joint_holder_name}</span></p>
                            </div>
                            <div>
                                <p>Remarks:<span>${d.remarks}</span></p>
                            </div>
                        </div>
                    `;

                    $("#unclaimedDividend").html(html);
                }
            });
        });
    </script>

    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush