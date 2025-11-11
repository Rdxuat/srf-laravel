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
                                <a href="{{ route('stock-information') }}" class="nav-link">
                                    Stock Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('shareholder-information') }}" class="nav-link">
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
                                                <select id="selCategory" class="form-control select-pill">
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
                                    {{-- <div class="row" id="financial-2024-q1">
                                        <div class="col-md-4">
                                            <a href="">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Financial Result</p>
                                                        <div class="pdfIcon">
                                                            <img src="{{asset('assets/images/invest/pdf-icon.svg')}}"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row" id="annual">
                                    </div> --}}
                                    <div id="resultContainer" class="mt-4">
                                        <div class="text-center">Loading data...</div>
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
        $(document).ready(function () {
            // === Configuration ===
            const quarterCategories = ['financial', 'earning', 'investor'];
            let activeCategory = "{{ $data['active_tab'] }}";
            let selectedYear = null, selectedQuarter = null;

            // === Init on load ===
            loadYears(true);

            // === Category Change (redirect & refresh) ===
            $('#selCategory').on('change', function () {
                const newCategory = $(this).val();
                const url = $(this).find(':selected').data('url');

                // Update active category
                activeCategory = newCategory;

                // If you want a full page reload (you use routes), do that
                if (url) {
                    window.location.href = url;
                    return;
                }

                // Otherwise reload via AJAX
                loadYears(true);
            });

            // === Load Years ===
            function loadYears(autoSelect = false) {
                $.ajax({
                    url: "{{ route('get-investor-data') }}",
                    data: { category: activeCategory, load: 'years' },
                    success: function (response) {
                        const years = response.years || [];
                        let yearOptions = '';
                        years.forEach(y => yearOptions += `<option value="${y}">${y}-${parseInt(y) + 1}</option>`);
                        $('#selYear').html(yearOptions);

                        // Show/hide quarter filter
                        if (quarterCategories.includes(activeCategory)) {
                            $('#quarterBox').show();
                        } else {
                            $('#quarterBox').hide();
                        }

                        // Auto-select latest year (first item) and load corresponding data
                        if (autoSelect && years.length > 0) {
                            selectedYear = years[0];
                            $('#selYear').val(selectedYear);

                            if (quarterCategories.includes(activeCategory)) {
                                loadQuarters(true); // will auto-select quarter and load results
                            } else {
                                loadResults();
                            }
                        }
                    }
                });
            }

            // === Year Change ===
            $('#selYear').on('change', function () {
                selectedYear = $(this).val();
                if (!selectedYear) return;

                if (quarterCategories.includes(activeCategory)) {
                    // Load quarters for the new year and auto-select latest quarter + results
                    loadQuarters(false);
                } else {
                    loadResults();
                }
            });

            // === Load Quarters ===
            // autoSelect: when true -> treat this as initial auto-load (select latest quarter)
            // when false -> user changed year; we still auto-select latest quarter and load results
            function loadQuarters(autoSelect = false) {
                $.ajax({
                    url: "{{ route('get-investor-data') }}",
                    data: { category: activeCategory, year: selectedYear, load: 'quarters' },
                    success: function (response) {
                        const quarters = response.quarters || [];

                        if (quarters.length === 0) {
                            // No quarters for this year -> hide box and load year-only results
                            $('#quarterBox').hide();
                            selectedQuarter = null;
                            $('#selQuarter').html('');
                            loadResults();
                            return;
                        }

                        // Populate quarter select (only real quarters, no placeholders)
                        $('#quarterBox').show();
                        let qOptions = '';
                        quarters.forEach(q => qOptions += `<option value="${q}">${q.toUpperCase()}</option>`);
                        $('#selQuarter').html(qOptions);

                        // ALWAYS auto-select the latest quarter (first item) when quarters are loaded
                        // This covers both initial autoSelect and user changing year.
                        selectedQuarter = quarters[0];
                        $('#selQuarter').val(selectedQuarter);

                        // Load results for selectedYear + selectedQuarter
                        loadResults();
                    },
                    error: function () {
                        // On error, hide quarter and try loading results for year-only
                        $('#quarterBox').hide();
                        loadResults();
                    }
                });
            }

            // === Quarter Change (manual by user) ===
            $('#selQuarter').on('change', function () {
                selectedQuarter = $(this).val();
                loadResults();
            });

            // === Load Results ===
            function loadResults() {
                const year = $('#selYear').val();
                const quarter = $('#selQuarter').val();

                $('#resultContainer').html('<div class="text-center">Loading data...</div>');

                $.ajax({
                    url: "{{ route('get-investor-data') }}",
                    data: { category: activeCategory, year, quarter },
                    success: function (data) {
                        if (!data || !data.length) {
                            $('#resultContainer').html('<p>No data found for this selection.</p>');
                            return;
                        }

                        let html = '';
                        data.forEach(item => {
                            const id = `${activeCategory}-${item.year}${item.quarter ? '-' + item.quarter : ''}`;

                            if (activeCategory === 'annual') {
                                html += `
                                <div class="row mb-3" id="${id}">
                                    <div class="col-md-4">
                                        <a href="/uploads/annual/${item.pdf}" target="_blank">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>${item.txt}</p>
                                                    <div class="pdfIcon">
                                                        <img src="{{ asset('assets/images/invest/pdf-icon.svg') }}" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>`;
                            } else {
                                html += `
                                <div class="row mb-3" id="${id}">
                                    <div class="col-md-4">
                                        <a href="/uploads/${activeCategory}/${item.file}" target="_blank">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>${item.title}</p>
                                                    <div class="pdfIcon">
                                                        <img src="{{ asset('assets/images/invest/pdf-icon.svg') }}" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>`;
                            }
                        });
                        $('#resultContainer').html(html);
                    },
                    error: function () {
                        $('#resultContainer').html('<p>Error loading data. Please try again.</p>');
                    }
                });
            }
        });
    </script>

@endpush