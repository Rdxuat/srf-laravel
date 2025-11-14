$(document).ready(function () {
    // --- Configuration ---
    const quarterCategories = ['financial', 'investor', 'annual-general','earning'];
    const staticCategories = ['credit-ratings', 'dematerialisation', 'overview', 'bod','dividend-shares'];
    const noYearCategories = ['policy', 'kyc-forms', 'other','tds-instructions'];

    const activeCategoryDefault = window.investorConfig.activeTab;
    const getInvestorDataUrl = window.investorConfig.getInvestorDataUrl;

    let activeCategory = activeCategoryDefault;
    let selectedYear = null;
    let selectedQuarter = null;

    // --- Init ---
    handleStaticSections(activeCategory);

    if (!staticCategories.includes(activeCategory)) {
        if (noYearCategories.includes(activeCategory)) {
            loadResults(); // direct
        } else {
            loadAllData(); // load all at once (years + quarters + results)
        }
    }

    // --- Events ---
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
            loadAllData();
        }
    });

    $('#selYear').on('change', function () {
        selectedYear = $(this).val();
        loadAllData();
    });

    $('#selQuarter').on('change', function () {
        selectedQuarter = $(this).val();
        loadResults();
    });

    // --- Functions ---

    function handleStaticSections(category) {
        $('#credit-ratings, #dematerialisation, #overview, #bod ,#dividend-shares').hide();

        if (staticCategories.includes(category)) {
            $('#resultContainer').hide();
            $('#selYear').closest('.col-md-3').hide();
            $('#quarterBox').hide();

            if (category === 'credit-ratings') $('#credit-ratings').show();
            if (category === 'dematerialisation') $('#dematerialisation').show();
            if (category === 'overview') $('#overview').show();
            if (category === 'bod') $('#bod').show();
            if (category === 'dividend-shares') $('#dividend-shares').show();
        } else if (noYearCategories.includes(category)) {
            $('#selYear').closest('.col-md-3').hide();
            $('#quarterBox').hide();
            $('#resultContainer').show();
        } else {
            $('#selYear').closest('.col-md-3').show();
            $('#quarterBox').show();
            $('#resultContainer').show();
        }
    }

    function loadResults() {
        $('#resultContainer').html('<div class="text-center">Loading data...</div>');

        $.ajax({
            url: getInvestorDataUrl,
            data: {
                category: activeCategory,
                year: selectedYear,
                // only send quarter for categories that actually use it
                quarter: quarterCategories.includes(activeCategory) ? selectedQuarter : null
            },
            success: function (data) {
                renderResults(data);
            },
            error: function () {
                $('#resultContainer').html('<p>Error loading data. Please try again.</p>');
            }
        });
    }

    // 🧠 Load years, quarters & data together
    function loadAllData() {
        $('#resultContainer').html('<div class="text-center">Loading data...</div>');

        $.ajax({
            url: getInvestorDataUrl,
            data: { category: activeCategory },
            success: function (allData) {
                if (!allData || !allData.length) {
                    $('#resultContainer').html('<p>No data found.</p>');
                    return;
                }

                // 🔹 Extract all available years
                const years = [...new Set(allData.map(d => d.year))].filter(Boolean).sort((a, b) => b - a);
                const latestYear = years[0];
                selectedYear = selectedYear || latestYear;

                // Populate year dropdown instantly
                const yearOptions = years.map(y => `<option value="${y}">${y}</option>`).join('');
                $('#selYear').html(yearOptions).val(selectedYear);

                // 🔹 Extract quarters for that year
                // const quarters = [...new Set(allData.filter(d => d.year == selectedYear).map(d => d.quarter))].filter(Boolean).reverse();
                // if (quarters.length) {
                //     selectedQuarter = selectedQuarter || quarters[0];
                //     const quarterOptions = quarters.map(q => `<option value="${q}">${q.toUpperCase()}</option>`).join('');
                //     $('#selQuarter').html(quarterOptions).val(selectedQuarter);
                //     $('#quarterBox').show();
                // } else {
                //     $('#quarterBox').hide();
                //     selectedQuarter = null;
                // }
                let quarters = [...new Set(
                    allData.filter(d => d.year == selectedYear).map(d => d.quarter)
                )]
                    .filter(Boolean)
                    .sort()        
                    .reverse();   

                if (quarters.length) {
                    selectedQuarter = quarters[0]; 

                    const quarterOptions = quarters
                        .map(q => `<option value="${q}">${q.toUpperCase()}</option>`)
                        .join('');

                    // ⬇️ THIS IS IMPORTANT
                    $('#selQuarter').html(quarterOptions);
                    $('#selQuarter').val(selectedQuarter);
                    $('#selQuarter').trigger('change'); // refresh results

                    $('#quarterBox').show();
                } else {
                    $('#quarterBox').hide();
                    selectedQuarter = null;
                }
                // 🔹 Filter visible data for selected year + quarter
                const filtered = allData.filter(d => {
                    if (selectedYear && d.year != selectedYear) return false;
                    if (quarterCategories.includes(activeCategory) && selectedQuarter && d.quarter != selectedQuarter) return false;
                    return true;
                });

                renderResults(filtered);
            },
            error: function () {
                $('#resultContainer').html('<p>Error loading data. Please try again.</p>');
            }
        });
    }

    // Render results (same as before)
    function renderResults(data) {
        if (!data || !data.length) {
            if (activeCategory === 'earning' || activeCategory === 'investor-meet') {
                renderEarningsTable([]);
                return;
            }
            $('#resultContainer').html('<p>No data found for this selection.</p>');
            return;
        }

        if (activeCategory === 'earning' || activeCategory === 'investor-meet') {
            renderEarningsTable(data);
            return;
        }

        let html = '<div class="row mb-3">';

        data.forEach(item => {
            const id = `${activeCategory}-${item.id}`;
            let htmlSegment = '';

            // 🧾 Annual report layout
            if (activeCategory === 'annual') {
                const pdfLink = item.file
                    ? `<a href="${base_url}/storage/files/${item.file}" target="_blank">Download PDF</a>`
                    : '';
                const imgTag = item.image
                    ? `<img src="${base_url}/storage/files/${item.image}" alt="${item.title}" class="img-fluid">`
                    : '';
                const webLink = item.web_link
                    ? `<a href="${item.web_link}" target="_blank">Visit Website</a>`
                    : '';

                htmlSegment = `
                <div class="col-md-4" id="${id}">
                    <div class="annual-web">
                            ${imgTag}
                        <h6>${item.title}</h6>
                        <div class="web-pdf">${pdfLink} ${webLink}</div>
                    </div>
                </div>`;
            } else {
                const filePath = `${base_url}/storage/files/${item.file}`;

                // 🖼 Choose icon based on category
                let iconPath = `${base_url}/assets/images/invest/pdf-icon.svg`; // default icon

                if (activeCategory === 'annual-general') {
                    iconPath = `${base_url}/assets/images/invest/audio-recording-icon.svg`; // your new icon
                }

                htmlSegment = `
            <div class="col-md-4 investorsAll" id="${id}">
                <a href="${filePath}" target="_blank">
                    <div class="earning">
                        <div class="leftData">
                            <p>${item.title}</p>
                            <div class="pdfIcon">
                                <img src="${iconPath}" class="img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            </div>`;
            }

            html += htmlSegment;
        });
        html += '</div>';
        $('#resultContainer').html(html);
    }
    function renderEarningsTable(data) {
        const columns = [
            'Notification',
            'Presentation',
            'Transcript (Audio)',
            'Transcript (PDF)'
        ];

        // category → db record mapping
        const byCategory = {};
        data.forEach(item => {
            if (item.category) byCategory[item.category] = item;
        });

        let html = `
        <div class="table-responsive earning-call-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Notification</th>
                        <th>Presentation</th>
                        <th>Transcript (Audio)</th>
                        <th>Transcript (PDF)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
    `;
        columns.forEach(col => {
            const item = byCategory[col];

            // ICON SELECTOR
            let iconFile = 'pdf-icon.svg'; // default
            if (col === 'Transcript (Audio)') {
                iconFile = 'audio-recording-icon.svg';
            }

            const iconUrl = `${base_url}/assets/images/invest/${iconFile}`;

            if (item && item.file) {
                const href = `${base_url}/storage/files/${item.file}`;
                const text = item.title || col;

                html += `
                <td>
                    <a href="${href}" target="_blank" class="earn-link">
                        <span class="text">${text}</span>
                        <img src="${iconUrl}" class="type-icon" alt="">
                    </a>
                </td>
            `;
            } else {
                html += `
                <td>
                    <span class="empty-cell">-</span>
                </td>
            `;
            }
        });

        html += `
                    </tr>
                </tbody>
            </table>
        </div>
        `;

        $('#resultContainer').html(html);
    }
});
