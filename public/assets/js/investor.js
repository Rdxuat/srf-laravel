$(document).ready(function () {
    // --- Configuration ---
    const quarterCategories = ['financial', 'earning', 'investor','corporate']; // require year + quarter
    const staticCategories = ['credit-ratings', 'dematerialisation', 'overview', 'bod']; // purely static
    const noYearCategories = ['policy']; // dynamic but no year/quarter filters

    const activeCategoryDefault = window.investorConfig.activeTab;
    const getInvestorDataUrl = window.investorConfig.getInvestorDataUrl;

    let activeCategory = activeCategoryDefault;
    let selectedYear = null;
    let selectedQuarter = null;

    // --- Initialization ---
    handleStaticSections(activeCategory);
    if (!staticCategories.includes(activeCategory)) {
        if (noYearCategories.includes(activeCategory)) {
            loadResults(); // directly load data
        } else {
            loadYears(true);
        }
    }

    // --- Event Listeners ---
    $('.selCategory').on('change', function () {
        const newCategory = $(this).val();
        const url = $(this).find(':selected').data('url');
        activeCategory = newCategory;

        if (url) {
            window.location.href = url;
            return;
        }

        handleStaticSections(activeCategory);

        if (staticCategories.includes(activeCategory)) return;

        if (noYearCategories.includes(activeCategory)) {
            loadResults();
        } else {
            loadYears(true);
        }
    });

    $('#selYear').on('change', function () {
        selectedYear = $(this).val();
        if (!selectedYear) return;
        quarterCategories.includes(activeCategory) ? loadQuarters(false) : loadResults();
    });

    $('#selQuarter').on('change', function () {
        selectedQuarter = $(this).val();
        loadResults();
    });

    // --- Functions ---

    // Handle which section to show
    function handleStaticSections(category) {
        // Hide all static sections first
        $('#credit-ratings, #dematerialisation, #overview, #bod').hide();

        if (staticCategories.includes(category)) {
            $('#resultContainer').hide();
            $('#selYear').closest('.col-md-3').hide();
            $('#quarterBox').hide();

            if (category === 'credit-ratings') $('#credit-ratings').show();
            if (category === 'dematerialisation') $('#dematerialisation').show();
            if (category === 'overview') $('#overview').show();
            if (category === 'bod') $('#bod').show();
        } else if (noYearCategories.includes(category)) {
            // Hide year/quarter for categories without filters
            $('#selYear').closest('.col-md-3').hide();
            $('#quarterBox').hide();
            $('#resultContainer').show();
        } else {
            // Show dynamic sections with year/quarter
            $('#selYear').closest('.col-md-3').show();
            $('#quarterBox').show();
            $('#resultContainer').show();
        }
    }

    // Load available years (for dynamic categories with year)
    function loadYears(autoSelect = false) {
        $.ajax({
            url: getInvestorDataUrl,
            data: { category: activeCategory, load: 'years' },
            success: function (response) {
                const years = response.years || [];
                if (!years.length) {
                    $('#selYear').html('');
                    loadResults();
                    return;
                }

                const options = years.map(y => `<option value="${y}">${y}-${parseInt(y) + 1}</option>`).join('');
                $('#selYear').html(options);

                if (quarterCategories.includes(activeCategory)) {
                    $('#quarterBox').show();
                } else {
                    $('#quarterBox').hide();
                }

                if (autoSelect) {
                    selectedYear = years[0];
                    $('#selYear').val(selectedYear);
                    quarterCategories.includes(activeCategory)
                        ? loadQuarters(true)
                        : loadResults();
                }
            },
            error: function () {
                console.error("Error loading years");
            }
        });
    }

    // Load quarters for specific year (only for financial/earning/investor)
    function loadQuarters(autoSelect = false) {
        $.ajax({
            url: `${base_url}/investor-relations/get-investor-data`,
            data: { category: activeCategory, year: selectedYear, load: 'quarters' },
            success: function (response) {
                const quarters = response.quarters || [];

                if (!quarters.length) {
                    $('#quarterBox').hide();
                    selectedQuarter = null;
                    $('#selQuarter').html('');
                    loadResults();
                    return;
                }

                $('#quarterBox').show();
                const options = quarters.map(q => `<option value="${q}">${q.toUpperCase()}</option>`).join('');
                $('#selQuarter').html(options);

                if (autoSelect) selectedQuarter = quarters[0];
                $('#selQuarter').val(selectedQuarter);
                loadResults();
            },
            error: function () {
                $('#quarterBox').hide();
                loadResults();
            }
        });
    }

    // Load data results (for both year-based and no-year categories)
    function loadResults() {
        const year = $('#selYear').val();
        const quarter = $('#selQuarter').val();

        $('#resultContainer').html('<div class="text-center">Loading data...</div>');

        $.ajax({
            url: `${base_url}/investor-relations/get-investor-data`,
            data: { category: activeCategory, year, quarter },
            success: function (data) {
                if (!data || !data.length) {
                    $('#resultContainer').html('<p>No data found for this selection.</p>');
                    return;
                }

                let html = '<div class="row mb-3">';

                data.forEach(item => {
                    const id = `${activeCategory}-${item.year}${item.quarter ? '-' + item.quarter : ''}`;
                    let htmlSegment = '';

                    if (activeCategory === 'annual') {
                        const pdfLink = item.pdf
                            ? `<a href="${base_url}/storage/uploads/annual/${item.pdf}" target="_blank">Download PDF</a>`
                            : '';
                        const imgTag = item.img
                            ? `<img src="${base_url}/storage/uploads/annual/${item.img}" alt="${item.title}" class="img-fluid">`
                            : '';
                        const webLink = item.web_link
                            ? `<a href="${item.web_link}" target="_blank">Visit Website</a>`
                            : '';

                        htmlSegment = `
                            <div class="col-md-4 mb-4" id="${id}">
                                <div class="annual-report-card">
                                    ${imgTag}
                                    <h5>${item.title}</h5>
                                    <div class="links">
                                        ${pdfLink}
                                        ${webLink}
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        const filePath = `${base_url}/storage/uploads/${activeCategory}/${item.file}`;

                        htmlSegment = `
                            <div class="col-md-4 mb-4" id="${id}">
                                <a href="${filePath}" target="_blank">
                                    <div class="earning">
                                        <div class="leftData">
                                            <p>${item.title}</p>
                                            <div class="pdfIcon">
                                                <img src="${base_url}/assets/images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                    }

                    html += htmlSegment;
                });

                html += '</div>';
                $('#resultContainer').html(html);
            },
            error: function () {
                $('#resultContainer').html('<p>Error loading data. Please try again.</p>');
            }
        });
    }
});
