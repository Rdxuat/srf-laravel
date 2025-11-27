$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });
    const quarterCategories = ['financial', 'investor', 'annual-general', 'earning'];
    const staticCategories = ['credit-ratings', 'overview', 'bod', 'dividend-shares', 'listing', 'regulation46', 'nomination', 'registrar', 'shareholder-services', 'survey-forms', 'share-transfer-system'];
    const noYearCategories = ['policy', 'kyc-forms', 'other', 'tds-instructions', 'dematerialisation'];

    const activeCategoryDefault = window.investorConfig.activeTab;
    const getInvestorDataUrl = window.investorConfig.getInvestorDataUrl;

    let activeCategory = activeCategoryDefault;
    let selectedYear = null;
    let selectedQuarter = null;

    handleStaticSections(activeCategory);

    if (!staticCategories.includes(activeCategory)) {
        if (noYearCategories.includes(activeCategory)) {
            loadResults(); 
        } else {
            loadAllData(); 
        }
    }

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


    function handleStaticSections(category) {
        $('#credit-ratings, #dematerialisation, #overview, #bod ,#dividend-shares', '#listing', '#regulation46', '#nomination', '#registrar', '#shareholder-services', '#survey-forms', '#share-transfer-system').hide();

        if (staticCategories.includes(category)) {
            $('#resultContainer').hide();
            $('#selYear').closest('.col-md-2').hide();
            $('#quarterBox').hide();

            if (category === 'credit-ratings') $('#credit-ratings').show();
            if (category === 'dematerialisation') $('#dematerialisation').show();
            if (category === 'overview') $('#overview').show();
            if (category === 'bod') $('#bod').show();
            if (category === 'dividend-shares') $('#dividend-shares').show();
            if (category === 'listing') $('#listing').show();
            if (category === 'regulation46') $('#regulation46').show();
            if (category === 'nomination') $('#nomination').show();
            if (category === 'registrar') $('#registrar').show();
            if (category === 'shareholder-services') $('#shareholder-services').show();
            if (category === 'survey-forms') $('#survey-forms').show();
            if (category === 'share-transfer-system') $('#share-transfer-system').show();
        } else if (noYearCategories.includes(category)) {
            $('#selYear').closest('.col-md-2').hide();
            $('#quarterBox').hide();
            $('#resultContainer').show();
        } else {
            $('#selYear').closest('.col-md-2').show();
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
                const years = [...new Set(allData.map(d => d.year))].filter(Boolean).sort((a, b) => b - a);
                const latestYear = years[0];
                selectedYear = selectedYear || latestYear;
                const yearOptions = years.map(y => `<option value="${y}">${y}</option>`).join('');
                $('#selYear').html(yearOptions).val(selectedYear);
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
                    $('#selQuarter').html(quarterOptions);
                    $('#selQuarter').val(selectedQuarter);
                    $('#selQuarter').trigger('change');

                    $('#quarterBox').show();
                } else {
                    $('#quarterBox').hide();
                    selectedQuarter = null;
                }
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
    function renderResults(data) {
        if (!data || !data.length) {
            if (activeCategory === 'earning' || activeCategory === 'investor-meet') {
                renderEarningsTable([]);
                return;
            }
            if (activeCategory === 'investor-meet') {
                renderInvestorMeetTable([]);
                return;
            }
            $('#resultContainer').html('<p>No data found for this selection.</p>');
            return;
        }

        if (activeCategory === 'earning') {
            renderEarningsTable(data);
            return;
        }
        if (activeCategory === 'investor-meet') {
            renderInvestorMeetTable(data);
            return;
        }

        let html = '<div class="row mb-3">';

        data.forEach(item => {
            const id = `${activeCategory}-${item.id}`;
            let htmlSegment = '';
            const filePath = `${base_url}/storage/files/${item.file}`;
            const protectedIframe = `
        <div class="open-protected" data-file="${filePath}">
            <div class="earning">
                <div class="leftData">
                    <p>${item.title}</p>
                    <div class="pdfIcon">
                        <img src="${base_url}/assets/images/invest/pdf-icon.svg" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    `;
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
                    </div>
                `;

            } else {
                let iconPath = `${base_url}/assets/images/invest/pdf-icon.svg`;
                if (activeCategory === 'annual-general') {
                    iconPath = `${base_url}/assets/images/invest/audio-recording-icon.svg`;
                }
                let directLink = filePath;
                if (item.link_type == 1) {
                    iconPath = `${base_url}/assets/images/invest/web-ver-icon-2.webp`;
                    directLink = item.file;
                }
                const pdfContent = (item.is_protected == 1)
                    ? protectedIframe
                    : `
                    <a href="${directLink}" target="_blank">
                        <div class="earning">
                            <div class="leftData">
                                <p>${item.title}</p>
                                <div class="pdfIcon">
                                    <img src="${iconPath}" class="img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                `;
                htmlSegment = `
                    <div class="col-md-4 investorsAll" id="${id}">
                        ${pdfContent}
                    </div>
                `;
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

            let iconFile = 'pdf-icon.svg';
            if (col === 'Transcript (Audio)') {
                iconFile = 'audio-recording-icon.svg';
            }
            const iconUrl = `${base_url}/assets/images/invest/${iconFile}`;

            if (item && item.file) {
                const fileUrl = `${base_url}/storage/files/${item.file}`;
                const text = item.title || col;

                let cellInnerHtml = '';
                if (item.is_protected == 1) {
                    cellInnerHtml = `
                    <div class="earn-link open-protected" data-file="${fileUrl}">
                        <span class="text">${text}</span>
                        <img src="${iconUrl}" class="type-icon" alt="">
                    </div>
                `;
                } else {
                    cellInnerHtml = `
                    <a href="${fileUrl}" target="_blank" class="earn-link">
                        <span class="text">${text}</span>
                        <img src="${iconUrl}" class="type-icon" alt="">
                    </a>
                `;
                }

                html += `<td>${cellInnerHtml}</td>`;
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


    function renderInvestorMeetTable(data) {
        const columns = [
            'Notification',
            'Presentation',
            'Transcript (Audio)',
            'Transcript (PDF)'
        ];
        const byCategory = {};
        data.forEach(item => {
            if (!byCategory[item.category]) {
                byCategory[item.category] = [];
            }
            byCategory[item.category].push(item);
        });

        const maxRowCount = Math.max(...Object.values(byCategory).map(arr => arr.length), 0);

        let html = `
            <div class="table-responsive earning-call-table investorMeet">
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
             `;

        for (let row = 0; row < maxRowCount; row++) {
            html += `<tr>`;
            columns.forEach(col => {
                const items = byCategory[col] || [];

                let iconFile = 'pdf-icon.svg';
                if (col === 'Transcript (Audio)') {
                    iconFile = 'audio-recording-icon.svg';
                }
                const iconUrl = `${base_url}/assets/images/invest/${iconFile}`;

                const item = items[row];

                if (!item || !item.file) {
                    html += `<td><span class="empty-cell">-</span></td>`;
                } else {
                    const fileUrl = `${base_url}/storage/files/${item.file}`;
                    const text = item.title || col;

                    let cellInnerHtml = '';
                    if (item.is_protected == 1) {
                        cellInnerHtml = `
                        <div class="earn-link-row">
                            <div class="earn-link open-protected" data-file="${fileUrl}">
                                <span class="text">${text}</span>
                                <img src="${iconUrl}" class="type-icon" alt="">
                            </div>
                        </div>
                    `;
                    } else {
                        cellInnerHtml = `
                        <div class="earn-link-row">
                            <a href="${fileUrl}" target="_blank" class="earn-link">
                                <span class="text">${text}</span>
                                <img src="${iconUrl}" class="type-icon" alt="">
                            </a>
                        </div>
                    `;
                    }

                    html += `<td>${cellInnerHtml}</td>`;
                }
            });
            html += `</tr>`;
        }

        html += `
                </tbody>
            </table>
        </div>
    `;

        $('#resultContainer').html(html);
    }


    $(document).on("click", ".open-protected", function () {
        let file = $(this).data("file");
        let iframe = `
        <iframe 
            src="${file}#toolbar=0&navpanes=0&scrollbar=0"
            style="width:100%; height:100%; border:none;">
        </iframe>
    `;

        $("#protectedPdfContainer").html(iframe);
        $("#protectedPdfModal").modal("show");
    });

    $(document).on('show.bs.modal', function () {
        $('html').addClass('modal-open');
        $('body').addClass('modal-open');
    });

    $(document).on('hidden.bs.modal', function () {
        if ($('.modal.show').length === 0) {
            $('html').removeClass('modal-open');
            $('body').removeClass('modal-open');
        }
    });

    $('#submitUnclaimedForm').click(function () {

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

        if (hasError) return;
        $.ajax({
            url: searchUnclaimedUrl,
            type: "POST",
            data: {
                year: year,
                dpid_or_folio: folio
            },
            success: function (response) {
                if (!response.status) {
                    $("#unclaimedDividend").html('<p style="color:red">No records found.</p>');
                    return;
                }

                let d = response.data;
                Object.keys(d).forEach(key => {
                    if (d[key] === null) d[key] = "";
                });

                let investorName = [d.investor_first_name, d.investor_middle_name, d.investor_last_name]
                    .filter(n => n && n.trim() !== "")
                    .join(" ");

                let husbandName = [d.husband_first_name, d.husband_middle_name, d.husband_last_name]
                    .filter(n => n && n.trim() !== "")
                    .join(" ");

                let html = `
                        <h3>${d.financial_year}</h3>
                        <div class="resultsThree">
                            <div>
                                <p>Name:<span> ${investorName}</span></p>
                                <p>Father/Husband Name: <span>${husbandName}</span></p>
                                <p>Address: <span>${d.address}</span></p>
                            </div>
                            <div>
                                <p>District: <span> ${d.district}</span></p>
                                <p>State: <span>${d.state}</span></p>
                                <p>Country: <span>${d.country}</span></p>
                                <p>Pin Code: <span>${d.pin_code}</span></p>
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
                                <p>DPid-Clid / Folio: <span>${d.dp_id_client_id || d.folio_number}</span></p>
                                <p>PAN No: <span>${d.pan}</span></p>
                                <p>Aadhar: <span>${d.aadhar_number}</span></p>
                            </div>
                            <div>
                                <p>Nominee: <span>${d.nominee_name}</span></p>
                                <p>Joint Holder: <span>${d.joint_holder_name}</span></p>
                            </div>
                            <div>
                                <p>Remarks: <span>${d.remarks}</span></p>
                            </div>
                        </div>
                    `;

                $("#unclaimedDividend").html(html);
            }
        });
    });
});