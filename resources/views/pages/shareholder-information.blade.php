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
                                        <div class="col-md-5">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill selCategory">
                                                    <option value="credit-ratings" data-url="{{ route('credit-ratings') }}"
                                                        {{ $data['active_tab'] == 'credit-ratings' ? 'selected' : '' }}>
                                                        Credit Ratings</option>
                                                    <option value="dematerialisation"
                                                        data-url="{{ route('dematerialisation') }}"
                                                        {{ $data['active_tab'] == 'dematerialisation' ? 'selected' : '' }}>
                                                        Dematerialisation of Shares</option>
                                                    <option value="regulation30" data-url="{{ route('regulation30') }}"
                                                        {{ $data['active_tab'] == 'regulation30' ? 'selected' : '' }}>
                                                        Disclosures under Regulation 30(5) of SEBI LODR</option>
                                                    <option value="regulation46" data-url="{{ route('regulation46') }}"
                                                        {{ $data['active_tab'] == 'regulation46' ? 'selected' : '' }}>
                                                        Disclosures Under Regulations 46 of the LODR</option>
                                                    <option value="investor-meet" data-url="{{ route('investor-meet') }}"
                                                        {{ $data['active_tab'] == 'investor-meet' ? 'selected' : '' }}>
                                                        Investor Meet</option>
                                                    <option value="kyc-forms" data-url="{{ route('kyc-forms') }}"
                                                        {{ $data['active_tab'] == 'kyc-forms' ? 'selected' : '' }}>KYC
                                                        Forms (FAQ)</option>
                                                    <option value="nomination" data-url="{{ route('nomination') }}"
                                                        {{ $data['active_tab'] == 'nomination' ? 'selected' : '' }}>
                                                        Nomination Facility</option>
                                                    <option value="notices" data-url="{{ route('notices') }}"
                                                        {{ $data['active_tab'] == 'notices' ? 'selected' : '' }}>
                                                        Notices</option>
                                                    <option value="odr" data-url="{{ route('odr') }}"
                                                        {{ $data['active_tab'] == 'odr' ? 'selected' : '' }}>Online Dispute
                                                        Resolution</option>
                                                    <option value="registrar" data-url="{{ route('registrar') }}"
                                                        {{ $data['active_tab'] == 'registrar' ? 'selected' : '' }}>
                                                        Registrar & Share Transfer Agents</option>
                                                    <option value="scheme" data-url="{{ route('scheme') }}"
                                                        {{ $data['active_tab'] == 'scheme' ? 'selected' : '' }}>Scheme
                                                        of Arrangements</option>
                                                    <option value="compliance-report"
                                                        data-url="{{ route('compliance-report') }}"
                                                        {{ $data['active_tab'] == 'compliance-report' ? 'selected' : '' }}>
                                                        Secretarial Compliance Report</option>
                                                    <option value="shareholding" data-url="{{ route('shareholding') }}"
                                                        {{ $data['active_tab'] == 'shareholding' ? 'selected' : '' }}>
                                                        Shareholding Pattern</option>
                                                    <option value="shareholder-services"
                                                        data-url="{{ route('shareholder-services') }}"
                                                        {{ $data['active_tab'] == 'shareholder-services' ? 'selected' : '' }}>
                                                        Shareholder Services</option>
                                                    <option value="survey-forms" data-url="{{ route('survey-forms') }}"
                                                        {{ $data['active_tab'] == 'survey-forms' ? 'selected' : '' }}>
                                                        Shareholder Survey Forms</option>
                                                    <option value="share-transfer-system"
                                                        data-url="{{ route('share-transfer-system') }}"
                                                        {{ $data['active_tab'] == 'share-transfer-system' ? 'selected' : '' }}>
                                                        Share Transfer System</option>
                                                    <option value="stock-filings" data-url="{{ route('stock-filings') }}"
                                                        {{ $data['active_tab'] == 'stock-filings' ? 'selected' : '' }}>
                                                        Stock Exchange Filings</option>
                                                    <option value="tds-instructions"
                                                        data-url="{{ route('tds-instructions') }}"
                                                        {{ $data['active_tab'] == 'tds-instructions' ? 'selected' : '' }}>
                                                        TDS Instructions on Dividend Distribution</option>
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
                                    <div class="investor-content" id="regulation46" style="display:none">
                                        <!--  -->
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr style="background: antiquewhite;">
                                                        <th scope="col">Name</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span>Details of its business;</span></td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Memorandum of Association and Articles of
                                                                Association;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Letter%20of%20Appointment-Independent%20Directors.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Brief profile of board of directors including
                                                                directorship and full-time positions in body
                                                                corporates;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/corporate-governance?q=bod-of-directors">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Terms and conditions of appointment of independent
                                                                directors;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Code%20of%20Conduct.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Composition of various committees of board of
                                                                directors;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Whistle%20Blower%20Policy.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Code of conduct of board of directors and senior
                                                                management personnel;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Revised%20Related%20Party%20Transactions%20Policy.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Details of establishment of vigil mechanism/
                                                                Whistle Blower policy;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Policy%20on%20Material%20Subsidiary.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>Criteria of making payments to non-executive
                                                                directors, if the same has not been disclosed in
                                                                annual report;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Familiarisation%20Programme%20for%20Directors.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Policy on dealing with related party
                                                                transactions;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>Policy for determining ‘material’
                                                                subsidiaries;</span>
                                                            <ol type="i">
                                                                <li>details of familiarization programmes imparted
                                                                    to independent directors
                                                                </li>
                                                            </ol>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>The email address for grievance redressal and
                                                                other relevant details;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt=""></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Contact information of the designated officials of
                                                                the listed entity who are responsible for assisting
                                                                and handling investor grievances;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span>Financial information including:</span>
                                                            <ol type="i">
                                                                <li>notice of meeting of the board of directors
                                                                    where financial results shall be discussed;
                                                                </li>
                                                                <li>financial results, on conclusion of the meeting
                                                                    of the board of directors where the financial
                                                                    results were approved;
                                                                </li>
                                                                <li>complete copy of the annual report including
                                                                    balance sheet, profit and loss account,
                                                                    directors report, corporate governance report
                                                                    etc;
                                                                </li>
                                                            </ol>
                                                        </td>
                                                        <td><span>Not Applicable</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Shareholding pattern;</span></td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Details of agreements entered into with the media
                                                                companies and/or their associates, etc;</span>
                                                        </td>
                                                        <td><span>Not Applicable</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Schedule of analysts or institutional investors
                                                                meet</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt=""></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span> Presentations prepared by the listed entity for
                                                                analysts or institutional investors meet, post
                                                                earnings or quarterly calls prior to beginning of
                                                                such events </span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt=""></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Audio recordings, video recordings, if any, and
                                                                transcripts of post earnings or quarterly calls, by
                                                                whatever name called, conducted physically or
                                                                through digital means, in the following
                                                                manner</span><br>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>New name and the old name of the listed entity for
                                                                a continuous period of one year, from the date of
                                                                the last name change;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt=""></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Items in sub-regulation (1) of regulation
                                                                47.</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Policy%20for%20Determination%20of%20Materiality%20of%20Events%20or%20Information.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Terms and conditions of appointment of independent directors"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Terms and conditions of appointment of independent directors"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>All credit ratings obtained by the entity for all
                                                                its outstanding instruments, updated immediately as
                                                                and when there is any revision in any of the
                                                                ratings.</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Separate audited financial statements of each
                                                                subsidiary of the listed entity in respect of a
                                                                relevant financial year, </span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt=""></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Secretarial compliance report as per
                                                                sub-regulation (2) of regulation 24A of these
                                                                regulations;</span>
                                                        </td>
                                                        <td><span>Not Applicable</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Disclosure of the policy for determination of
                                                                materiality of events or information required under
                                                                clause (ii), sub-regulation (4) of regulation 30 of
                                                                these regulations;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/files/policies/Dividend%20Distribution%20Policy.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Disclosure of contact details of key managerial
                                                                personnel who are authorized for the purpose of
                                                                determining materiality of an event or information
                                                                and for the purpose of making disclosures to stock
                                                                exchange(s) as required under sub-regulation (5) of
                                                                regulation 30;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Disclosures under sub-regulation (8) of regulation
                                                                30 of these regulations;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="/storage/pdf/Memorandum-and-Articles-of-Association.pdf"
                                                                    target="_blank">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/report-pdf-icon.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/report-pdf-icon.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/report-pdf-icon.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Statements of deviation(s) or variation(s) as
                                                                specified in regulation 32 of these
                                                                regulations;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Dividend distribution policy by listed entities
                                                                based on market capitalization as specified in
                                                                sub-regulation (1) of regulation 43A;</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Annual return as provided under section 92 of the
                                                                Companies Act, 2013 and the rules made
                                                                thereunder</span>
                                                        </td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="#">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><span>Employee Benefit Scheme Documents,</span></td>
                                                        <td>
                                                            <span class="imgIcon wid-50px">
                                                                <a href="">
                                                                    <img width="35" height="47"
                                                                        src="/storage/images/web-ver-icon-2.webp"
                                                                        alt="Details of business"
                                                                        data-lazy-src="/storage/images/web-ver-icon-2.webp"
                                                                        data-ll-status="loaded"
                                                                        class="entered lazyloaded">
                                                                    <noscript><img width="35" height="47"
                                                                            src="/storage/images/web-ver-icon-2.webp"
                                                                            alt="Details of business"></noscript>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--</div>-->
                                        </div>
                                        <!--  -->
                                    </div>
                                    <div class="investor-content" id="nomination" style="display:none">
                                        <!--  -->
                                        <div class="faq-accordion" id="faqAccordion">

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button" type="button" data-bs-target="#faq1">
                                                        What is nomination facility?
                                                    </button>
                                                </h2>
                                                <div id="faq1" class="faq-collapse collapse show"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        Section 109A of the Companies Act, 1956 provides the
                                                        facility of nomination to shareholders. This facility is
                                                        mainly useful for individuals holding shares in single/sole
                                                        name. Nomination would help the nominee(s) to get the shares
                                                        transmitted in his/their favour without any hassles.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq2">
                                                        Who can appoint a Nominee and who can be appointed as a
                                                        Nominee?
                                                    </button>
                                                </h2>
                                                <div id="faq2" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        Individual shareholders holding the shares in single or
                                                        joint names can appoint a nominee. In case of joint holding,
                                                        all the joint holders together have to appoint the nominee.
                                                        Only an individual can be appointed as a nominee. A trust,
                                                        society, body corporate, partnership firm, karta of HUF or a
                                                        power of attorney holder cannot be appointed as a
                                                        nominee(s).
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq3">
                                                        What is the procedure for appointing a Nominee?
                                                    </button>
                                                </h2>
                                                <div id="faq3" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        The individual shareholders can avail of the nomination
                                                        facility by submitting the prescribed Form 2B to the
                                                        Company’s RTA duly completed in all respects. Form 2B may be
                                                        downloaded from the Company’s website, srf.com
                                                        under the Section “Investor”.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="accH">
                                            <h2 class="wow fadeInUP">Miscellaneous</h2>
                                        </div>
                                        <div class="faq-accordion" id="faqAccordion">

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button" type="button" data-bs-target="#faq4">
                                                        What is the mode of payment of dividend?
                                                    </button>
                                                </h2>
                                                <div id="faq4" class="faq-collapse collapse show"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        Dividend is paid under two modes viz.
                                                        <ul class="elec">
                                                            <li>National Electronic Clearing Services (NECS)</li>
                                                            <li>Physical dispatch of dividend warrant/DD</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq5">
                                                        What are the benefits of NECS?
                                                    </button>
                                                </h2>
                                                <div id="faq5" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        This would facilitate prompt and direct credit of dividend
                                                        to the bank account of the shareholders through electronic
                                                        clearing and avoid postal delays, loss in transit and
                                                        fraudulent encashment of warrants.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq6">
                                                        How to avail of NECS Facility?
                                                    </button>
                                                </h2>
                                                <div id="faq6" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> Shareholders holding shares in physical form may send
                                                            their NECS Mandate Form, duly filled in, to the Company.
                                                            The form may be downloaded from the Company’s website <a
                                                                href="">www.srf.com</a>
                                                            under the section "Investor".</p>
                                                        <p>However, if the shares are held in dematerialized form,
                                                            NECS mandate has to be sent to the concerned DP
                                                            directly, in the format prescribed by the DP.</p>
                                                        <p>Shareholders are requested to furnish the new bank
                                                            account number allotted by the banks post implementation
                                                            of Core Banking Solutions (CBS), along with a copy of
                                                            cheque pertaining to the concerned account, to the
                                                            Company in case the shareholders hold shares in physical
                                                            form and to the concerned DP in case the shareholders
                                                            hold shares in demat form.</p>
                                                        <p>In the case the shareholders do not provide their new
                                                            account number allotted after implementation of CBS,
                                                            please note that NECS to the shareholders’ old account
                                                            may either be rejected or returned.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq7">
                                                        Register E-mail address
                                                    </button>
                                                </h2>
                                                <div id="faq7" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> In order to receive all documents, notices, including
                                                            Annual Reports and other communications of the Company
                                                            promptly and to support the ‘Green Initiative’ in the
                                                            Corporate Governance undertaken by the Ministry of
                                                            Corporate Affairs to contribute towards greener
                                                            environment, shareholders should register their e-mail
                                                            addresses with the Company/RTA, if shares are held in
                                                            physical mode or with their DP, if the shares are held
                                                            in demat form.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--  -->
                                    </div>
                                    <div class="row" id="registrar" style="display:none">
                                        <div class="col-md-12">
                                            <div class="iepf-txt-inner">
                                                <h4>KFIN TECHNOLOGIES LIMITED</h4>
                                                <p><strong>Address:</strong> Selenium, Tower B, <span>Plot 31&amp; 32,
                                                        Financial District,</span> <span>Nanakramguda, Serilingampally
                                                        Mandal,</span> <span>Hyderabad, Telangana - 500 032</span>
                                                    <span>Telugana State, India</span>
                                                </p>
                                                <p><strong>Tel. No.:</strong> <a href="tel:040-6716 1585">040-6716
                                                        1585</a></p>
                                                <p><strong>Fax. No.:</strong> 040-6716 1680</p>

                                                <p><strong>Toll Free No.:</strong> 1800-345-4001</p>
                                                <p><strong>Investor Grievance Email:</strong><a
                                                        href="mailto:einward.ris@kfintech.com">
                                                        einward.ris@kfintech.com</a></p>
                                                <p><strong>Website:</strong> <a href="https://www.kfintech.com/"
                                                        target="_blank">www.kfintech.com</a></p>
                                            </div>
                                            <div class="iepf-txt-inner">
                                                <p><b>Rajat Lakhanpal</b>
                                                    <span>Sr. Vice President (Corporate Compliance) & Company
                                                        Secretary</span>
                                                    <span>Address: SRF Limited</span>
                                                    <span>Block-C, Sector – 45, Gurugram,</span>
                                                    <span>Haryana – 122003</span>

                                                </p>
                                                <p><strong> Email id:</strong><a href="mailto:cs@srf.com">
                                                        cs@srf.com</a></p>

                                                <p><strong>Tel. No.:</strong> <a href="tel:0124 – 4354782">0124 –
                                                        4354782</a></p>
                                                <p><strong>Fax. No.:</strong> 0124-4354500</p>
                                            </div>
                                        </div>
                                        <div class="auth">
                                            <div class="col-md-12">
                                                <h3>KMPs authorized for the purpose of determining Materiality:</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="iepf-txt-inner">
                                                    <p><b>Rahul Jain</b><span>President & Chief Financial Officer</span>
                                                        <span>Address: SRF Limited</span>
                                                        <span>Block-C, Sector – 45, Gurugram,</span><span>Haryana –
                                                            122003</span>
                                                    </p>
                                                    <p> <strong>Tel. No.:</strong> <a href="tel:0124 – 4354726">0124
                                                            – 4354726</a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="iepf-txt-inner">
                                                    <p><b>Rajat Lakhanpal</b>
                                                        <span>Sr. Vice President (Corporate Compliance) & Company
                                                            Secretary</span>
                                                        <span>Address: SRF Limited</span>
                                                        <span>Block – C, Sector – 45, Gurugram,</span>
                                                        <span>Haryana – 122003</span>
                                                    </p>
                                                    <p><strong>Tel. No.:</strong> <a
                                                            href="tel:0124-4354589">0124-4354589</a></p>
                                                    <p><strong>Fax No.:</strong> <a
                                                            href="tel:0124-4354589">0124-4354500</a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="iepf-txt-inner">
                                                    <p><b>Ashish Bharat Ram</b>
                                                        <span>Chairman & Managing Director</span>
                                                        <span>Address: SRF Limited</span>
                                                        <span>Block-C, Sector – 45, Gurugram,</span>
                                                        <span>Haryana – 122003</span>
                                                    </p>
                                                    <p><strong>Tel. No.:</strong> <a
                                                            href="tel:0124-4354591">0124-4354591</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="investor-content" id="share-transfer-system" style="display:none">
                                        <div class="faq-accordion" id="faqAccordion">

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button" type="button" data-bs-target="#faq8">
                                                        What is the procedure for transfer of physical shares in
                                                        favour of Transferee (Purchaser)?
                                                    </button>
                                                </h2>
                                                <div id="faq8" class="faq-collapse collapse show"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p>Transferee(s) needs to send share certificate(s) along
                                                            with share transfer deed in the prescribed Form 7B, duly
                                                            filled in, executed and affixed with requisite share
                                                            transfer stamps, to the Company's RTA.</p>
                                                        <p>The shares sent for physical transfer are registered and
                                                            returned to the Transferee(s) within a period of 7–10
                                                            days from the date of receipt, if the documents are
                                                            complete in all respects.</p>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq9">
                                                        What is the procedure for transmission of shares in favour
                                                        of legal heirs, in the event of death of an individual
                                                        shareholder holding shares in his single/sole name?
                                                    </button>
                                                </h2>
                                                <div id="faq9" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p>The legal heir(s) should obtain a Succession Certificate
                                                            or Letter of Administration from the competent court
                                                            with respect to the shares and send a true copy of the
                                                            same, duly attested, along with a request letter,
                                                            transmission form, and the share certificate(s) in
                                                            original, to the Company’s RTA for transmission of the
                                                            shares in his/their name(s).</p>
                                                        <p>However, if the deceased shareholder had registered his
                                                            nomination with the Company/RTA, in such case the legal
                                                            heir(s) should send an attested copy of the death
                                                            certificate issued by the competent authority along with
                                                            a request letter, transmission form, and the share
                                                            certificate(s) in original, to the Company’s RTA for
                                                            transmission of the shares in his/their name(s).</p>
                                                        <p>For shares held in demat form, investors are advised to
                                                            approach their DP concerned for transmission of the
                                                            shares.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq10">
                                                        What is the procedure for getting shares in the name of
                                                        surviving shareholder(s), in case of joint holding, in the
                                                        event of death of one of the shareholders?
                                                    </button>
                                                </h2>
                                                <div id="faq10" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> The surviving shareholder(s) will have to submit a
                                                            request letter supported by an attested copy of the
                                                            death certificate of the deceased shareholder and
                                                            accompanied by the relevant share certificate(s). The
                                                            Company’s RTA, on receipt of the said documents and
                                                            after due scrutiny, will delete the name of the deceased
                                                            shareholder from its records and return the share
                                                            certificate(s) to the surviving shareholder(s) with
                                                            necessary endorsement.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq11">
                                                        How to get transposition of shares effected (change in order
                                                        of names)?
                                                    </button>
                                                </h2>
                                                <div id="faq11" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> Share certificates along with a request letter duly
                                                            signed by all the joint holders may be sent to the
                                                            Company’s RTA for change in order of names, known as
                                                            ‘transposition’. Transposition can be done only for the
                                                            entire holdings under a folio and therefore request for
                                                            transposition of part holding cannot be accepted by the
                                                            Company/RTA. For shares held in demat form, investors
                                                            are advised to approach their DP concerned for
                                                            transposition of the shares.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq12">
                                                        What is the procedure for obtaining duplicate share
                                                        certificate(s) in case of loss/misplacement of original
                                                        share certificate(s)?
                                                    </button>
                                                </h2>
                                                <div id="faq12" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> Shareholders who have lost/misplaced share
                                                            certificate(s) should inform the Company’s RTA
                                                            immediately about the loss of share certificate(s),
                                                            quoting their folio number and details of share
                                                            certificate(s).</p>
                                                        <p>The RTA shall immediately mark a ‘stop transfer’ on the
                                                            folio to prevent any further transfer of shares in
                                                            question, if already not effected. It is recommended
                                                            that the shareholder(s) should lodge an FIR with the
                                                            police regarding loss of share certificate(s). They
                                                            should send their request for duplicate share
                                                            certificate(s) to the Company’s RTA and submit documents
                                                            as required by the RTA.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq12">
                                                        What is the procedure for consolidation of various share
                                                        certificates into a single certificate?
                                                    </button>
                                                </h2>
                                                <div id="faq12" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> Consolidation of share certificates helps in saving
                                                            costs in the event of dematerialization of shares and
                                                            also provides convenience in holding the shares
                                                            physically. Shareholders having certificates in various
                                                            denominations under the same folio should write to the
                                                            Company’s RTA enclosing all the certificates for
                                                            consolidation of all the shares into a single
                                                            certificate.</p>
                                                        <p>If the shares are held under multiple folios, but have
                                                            the same order of names, the shareholders should write
                                                            to the Company’s RTA for the prescribed form for
                                                            consolidation of folios. This will help the shareholders
                                                            to efficiently monitor the holding and the corporate
                                                            benefits receivable thereon.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="faq-item">
                                                <h2 class="faq-header">
                                                    <button class="faq-button collapsed" type="button"
                                                        data-bs-target="#faq13">
                                                        What is the procedure for splitting of a share certificate
                                                        into small lots?
                                                    </button>
                                                </h2>
                                                <div id="faq13" class="faq-collapse collapse"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="faq-body">
                                                        <p> Shareholders may write to the Company’s RTA enclosing
                                                            the relevant share certificate for splitting into
                                                            smaller lots. The share certificates, after splitting,
                                                            will be sent by the Company’s RTA to the shareholders at
                                                            their registered address.</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="investor-content" id="shareholder-services" style="display:none">
                                        <div class="iepf-txt-inner max">
                                            <b>SRF</b>
                                            <p>Investors can get their share/dividend related grievances
                                                redressed at the following address:-</p>
                                            <p><b>For Shareholders and Compliance matters</b></p>
                                            <p><br>
                                                <strong>Rajat Lakhanpal</strong>
                                                <br>
                                                Sr. Vice President (Corporate Compliance) &amp; Company
                                                Secretary
                                                <br>
                                                Address: SRF Limited
                                                <br>
                                                Block-C, Sector – 45, Gurugram,
                                                <br>
                                                Haryana – 122003
                                                <br>
                                                Email ID: <a href="mailto:cs@srf.com">cs@srf.com</a>
                                                <br>
                                                Phone No.: <a href="tel:0124 – 4354782">0124 – 4354782</a>
                                                <br>
                                                Fax. No.: 0124-4354500
                                                <br>

                                            </p>

                                        </div>
                                        <div class="contact-form">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Your Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Name of your company">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="*Email">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Mobile">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Street Address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*City, State">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Zip/Postal Code">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Country">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6"></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="6" placeholder="*Description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="capTa">

                                                </div>
                                                <div class="survey-form-inner">
                                                    <button type="submit" name="action" value="shareholding-service"
                                                        class="btn-survey hvr-sweep-to-right">Submit</button>
                                                    <button type="button" id="rst-share1"
                                                        class="btn-survey hvr-sweep-to-right">Reset</button>
                                                </div>

                                            </form>

                                        </div>

                                    </div>
                                    <div class="row investor-content" id="survey-forms" style="display:none">
                                        <div class="container shareform kind">
                                            <form>

                                                <!-- Row 1 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Name of sole/First holder">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Street Address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Section Title -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="section-title">Enter either Folio Number or DP
                                                            Number, Client ID</h4>
                                                    </div>
                                                </div>

                                                <!-- Row 2 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Folio Number">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*DP Number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Row 3 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Client ID">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Mobile">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Row 4 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="*Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label class="radio-inline">1.1 Transfer/Demat of
                                                            Shares:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="transfer" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="transfer" value="good">
                                                                Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="transfer" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Response to Queries/Complaints -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>1.2 Response to queries/complaints:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="queries" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="queries" value="good">
                                                                Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="queries" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Interaction with Company/R&T Agent Personnel -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>1.3 Interaction with Company/R&T Agent
                                                            Personnel:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="interaction" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="interaction" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="interaction" value="needs-improvement">
                                                                Needs Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Promptness in confirming demat/remat requests -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>1.4 Promptness in confirming demat/remat
                                                            requests:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="promptness" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="promptness" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="promptness" value="needs-improvement">
                                                                Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Timely receipt of dividend -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>1.5 Timely receipt of dividend:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="dividend" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="dividend" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="dividend" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Overall rating -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>1.6 Please give your overall rating of our investor
                                                            service:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="overall" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="overall" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="overall" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Presentation of information on Company's website -->
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>2. Presentation of information on Company's website
                                                            and its Investor Relations Section:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>2.1 Investor Presentations/brief:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row survey-question">
                                                    <div class="col-md-6">
                                                        <label>3. Quality and Contents of Annual Report:</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mainL">
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="excellent">
                                                                Excellent</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="good"> Good</label>
                                                            <label class="radio-inline"><input type="radio"
                                                                    name="website" value="needs-improvement"> Needs
                                                                Improvement</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row nrow">
                                                    <h3>4. Your suggestions and comments for improvement in our
                                                        services:</h3>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="6" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="survey-form-inner">
                                                        <button type="submit" name="action"
                                                            value="shareholding-service"
                                                            class="btn-survey hvr-sweep-to-right">Submit</button>
                                                        <button type="button" id="rst-share1"
                                                            class="btn-survey hvr-sweep-to-right">Reset</button>
                                                    </div>
                                                </div>

                                            </form>
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
    <script>
        document.addEventListener("click", function(e) {
            const btn = e.target.closest("#faqAccordion .faq-button");
            if (!btn) return;

            const target = document.querySelector(btn.getAttribute("data-bs-target"));
            if (!target) return;

            const parent = target.getAttribute("data-bs-parent");
            const isOpen = target.classList.contains("show");

            if (parent) {
                document.querySelectorAll(parent + " .faq-collapse.show")
                    .forEach((el) => {
                        if (el !== target) {
                            toggle(el, false);

                            // FIX: update icon state for other closing buttons
                            const otherBtn = document.querySelector(
                                `[data-bs-target="#${el.id}"]`
                            );
                            if (otherBtn) {
                                otherBtn.classList.add("collapsed");
                                otherBtn.setAttribute("aria-expanded", "false");
                            }
                        }
                    });
            }

            toggle(target, !isOpen, btn);
        });

        function toggle(el, open, btn) {
            let start, end;

            if (open) {
                el.classList.add("collapse", "show");
                const fullHeight = el.scrollHeight;
                el.classList.remove("show");

                start = 0;
                end = fullHeight;
            } else {
                start = el.scrollHeight;
                end = 0;
            }

            el.style.height = start + "px";
            el.classList.add("collapsing");
            el.classList.remove("collapse", "show");

            requestAnimationFrame(() => {
                el.style.height = end + "px";
            });

            el.addEventListener("transitionend", function handler() {
                el.classList.remove("collapsing");
                el.classList.add("collapse");
                if (open) el.classList.add("show");
                el.style.height = "";
                el.removeEventListener("transitionend", handler);
            });

            if (btn) {
                btn.classList.toggle("collapsed", !open);
                btn.setAttribute("aria-expanded", open);
            }
        }
    </script>

    <script src="{{ asset('assets/js/investor.js') }}" type="text/javascript"></script>
@endpush
@push('modals')
    <div class="modal fade" id="protectedPdfModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body" id="protectedPdfContainer" style="height:80vh;">
                </div>
            </div>
        </div>
    </div>
@endpush
