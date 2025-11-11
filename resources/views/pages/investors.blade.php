@extends('layout.app')
@section('content')
    <section class="investor-tab modTab">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inTabs wow fadeInUp">
                        <ul class="nav nav-tabs" id="in-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="in-tab-1" data-bs-toggle="tab" data-bs-target="#in-tab-a"
                                    type="button" role="tab" aria-controls="in-tab-a" aria-selected="true">
                                    Financial Reports & Results
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="in-tab-2" data-bs-toggle="tab" data-bs-target="#in-tab-b"
                                    type="button" role="tab" aria-controls="in-tab-b" aria-selected="false">
                                    Stock Information
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="in-tab-3" data-bs-toggle="tab" data-bs-target="#in-tab-c"
                                    type="button" role="tab" aria-controls="in-tab-c" aria-selected="false">
                                    Shareholder Information
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="in-tab-4" data-bs-toggle="tab" data-bs-target="#in-tab-d"
                                    type="button" role="tab" aria-controls="in-tab-d" aria-selected="false">
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
                        <!-- <option value="4">Other Business Revenue</option> -->
                    </select>

                    <div class="tab-content in-tabcontent" id="inTabContent">
                        <div class="tab-pane fade show active" id="in-tab-a" role="tabpanel" aria-labelledby="in-tab-1">
                            <div class="stakeTabBody">
                                <div class="invest-bg newBg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selCategory" class="form-control select-pill">
                                                    <option value="financial">Financial Results</option>
                                                    <option value="annual">Annual Reports</option>
                                                    <option value="annual-subs">Annual Reports - Subsidiaries</option>
                                                    <option value="investor">Investor Presentation</option>
                                                    <option value="annual-return">Annual Return</option>
                                                    <option value="annual-general">Annual General Meeting Transcript
                                                    </option>

                                                    <option value="earning">Earnings Call </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group select-box">
                                                <select id="selYear" class="form-control select-pill">
                                                    <option value="2024">2024-2025</option>
                                                    <option value="2023">2023-2024</option>
                                                    <option value="2022">2022-2023</option>
                                                    <option value="2021">2021-2022</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group select-box">
                                                <select id="selQuarter" class="form-control select-pill">
                                                    <option value="q1">Q1</option>
                                                    <option value="q2">Q2</option>
                                                    <option value="q3">Q3</option>
                                                    <option value="q4">Q4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="financial-2024-q1">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Financial Result</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="annual">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="in-tab-b" role="tabpanel" aria-labelledby="in-tab-2">
                            <div class="stakeTabBody">
                                <div class="invest-bg newBg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selStock" class="form-control select-pill">

                                                    <option value="stock-quote" selected>Stock Quote</option>
                                                    <option value="stock-chart">Stock Chart</option>
                                                    <option value="historical-price">Historical Stock Price</option>
                                                    <option value="investment-calculator">Investment Calculator</option>
                                                    <option value="dividend-shares">Dividend and Shares - Unclaimed
                                                        Dividend</option>
                                                    <option value="listing">Listing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row stock-section" id="stock-quote">
                                    </div>
                                    <div class="row stock-section" id="stock-chart">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="in-tab-c" role="tabpanel" aria-labelledby="in-tab-3">
                            <div class="stakeTabBody">
                                <div class="invest-bg newBg">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group select-box">
                                                <select id="selInvestorCategory" class="form-control select-pill">
                                                    <option value="creditRatings">Credit Ratings</option>
                                                    <option value="dematerialisation">Dematerialisation of Shares
                                                    </option>
                                                    <option value="regulation30">Disclosures under Regulation 30(5) of
                                                        SEBI LODR</option>
                                                    <option value="regulation46">Disclosures Under Regulations 46 of the
                                                        LODR</option>
                                                    <option value="kycForms">KYC Forms (FAQ)</option>
                                                    <option value="nomination">Nomination Facility</option>
                                                    <option value="notices">Notices</option>
                                                    <option value="odr">Online Dispute Resolution</option>
                                                    <option value="registrar">Registrar & Share Transfer Agents</option>
                                                    <option value="scheme">Scheme of Arrangements</option>
                                                    <option value="complianceReport">Secretarial Compliance Report
                                                    </option>
                                                    <option value="shareholding">Shareholding Pattern</option>
                                                    <option value="shareholderServices">Shareholder Services</option>
                                                    <option value="surveyForms">Shareholder Survey Forms</option>
                                                    <option value="stockFilings">Stock Exchange Filings</option>
                                                    <option value="tdsInstructions">TDS Instructions on Dividend
                                                        Distribution</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group select-box">
                                                <select id="selYear" class="form-control select-pill">
                                                    <option value="2024">2024-2025</option>
                                                    <option value="2023">2023-2024</option>
                                                    <option value="2022">2022-2023</option>
                                                    <option value="2021">2021-2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="creditRatings">
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
                                    <div class="row investor-content" id="dematerialisation">

                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="regulation30">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="regulation46">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="kycForms">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="nomination">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="notices">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="registrar">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="scheme">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="complianceReport">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="shareholding">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="shareholderServices">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="surveyForms">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="stockFilings">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row investor-content" id="tdsInstructions">
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Earnings Conference Call Transcrip</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Audio Recording of the Earnings Conference Call Q1 FY 26</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/audio-recording-icon.svg"
                                                            class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="earning">
                                                <div class="leftData">
                                                    <p>Investor Presentation</p>
                                                    <div class="pdfIcon">
                                                        <img src="images/invest/pdf-icon.svg" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="in-tab-d" role="tabpanel" aria-labelledby="in-tab-4">
                            <div class="stakeTabBody">
                                <div class="invest-bg newBg inst">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-select-wrapper">
                                                <select id="officeSelect" class="custom-select">
                                                    <option value="overview">Overview</option>
                                                    <option value="bod">Board of Directors and Committees</option>
                                                    <option value="policy">Policies</option>
                                                    <option value="corporate">Corporate Governance Reports</option>
                                                    <option value="other">Other Disclosures</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Content sections -->
                                        <div class="col-md-12">
                                            <div class="office-content" id="overview" style="display:block;">
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
                                                            <img src="images/invest/audit-committee-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Audit Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="images/invest/stakeholders-relationship-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Stakeholders Relationship Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="images/invest/nomination-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Nomination and Remuneration Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="images/invest/corporate-social-responsibility-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Corporate Social Responsibility Committee</p>
                                                    </div>
                                                    <div class="subAudit">
                                                        <div class="iconImg">
                                                            <img src="images/invest/risk-management-committee-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                        <p>Risk Management Committee</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="office-content" id="bod" style="display:none;">
                                            <div class="myBod">
                                                <div class="col-md-12">
                                                    <div class="bodSec">
                                                        <h2>Board of Directors</h2>
                                                    </div>
                                                </div>
                                                <div class="childSec">
                                                    <div class="new">
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img1.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Ashish Bharat Ram <span>Chairman &amp;
                                                                                Managing
                                                                                Director</span></h4>
                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot blue"></span>
                                                                        <span class="dot yellow"></span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img2.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Kartik Bharat Ram<span>Joint Managing
                                                                                Director</span></h4>

                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot yellow"></span>
                                                                        <span class="dot blue"></span>
                                                                        <span class="dot green"></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="new">
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img3.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Vellayan Subbiah<span>Non-Executive,
                                                                                Non-Independent Director</span></h4>
                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img4.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Vineet Agarwal<span>Independent
                                                                                Director</span></h4>

                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot Ltblue"></span>

                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod5">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img5.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Ira Gupta<span>Independent Director</span>
                                                                        </h4>

                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot Ltblue"></span>
                                                                        <span class="dot green"></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="new">
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img6.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Bharti Gupta Ramola<span>Independent
                                                                                Director</span></h4>
                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot Litblue"></span>
                                                                        <span class="dot blue"></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img7.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Puneet Yadu Dalmia<span>Independent
                                                                                Director</span></h4>

                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot Ltblue"></span>

                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod5">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img8.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Yash Gupta<span>Independent Director</span>
                                                                        </h4>

                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot Litblue"></span>
                                                                        <span class="dot green"></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="new">
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod1">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img9.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Raj Kumar Jain<span>Independent
                                                                                Director</span></h4>
                                                                    </div>
                                                                    <div class="dot-wrapper">
                                                                        <span class="dot yellow"></span>
                                                                        <span class="dot Litblue"></span>

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#bod2">
                                                                <div class="bod-box">
                                                                    <div class="light-bluebg">
                                                                        <div class="bod-img"><img class="img-responsive"
                                                                                src="images/bod/bod-img10.webp"></div>
                                                                    </div>
                                                                    <div class="bod-text">
                                                                        <h4>Pramod Gopaldas Gujarathi<span>Independent
                                                                                Director</span></h4>

                                                                    </div>


                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="committee-box">
                                                        <div class="committee-title">Committees</div>
                                                        <div class="committee-list">
                                                            <div class="committee-item"><span class="dot audit"></span>Audit
                                                                Committee</div>
                                                            <div class="committee-item"><span
                                                                    class="dot stakeholder"></span>Stakeholder
                                                                Relationship Committee</div>
                                                            <div class="committee-item"><span
                                                                    class="dot nomination"></span>Nomination and
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

                                        <div class="office-content" id="policy" style="display:none;">

                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Policy on Materiality of Related Party Transaction
                                                        </p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Cyber Security Policy</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Public and Regulatory Policy</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="office-content" id="corporate" style="display:none;">

                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Earnings Conference Call Transcrip
                                                        </p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Audio Recording of the Earnings Conference Call Q1 FY
                                                            26</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/audio-recording-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Investor Presentation</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="office-content" id="other" style="display:none;">

                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Earnings Conference Call Transcrip
                                                        </p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Audio Recording of the Earnings Conference Call Q1 FY
                                                            26</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/audio-recording-icon.svg"
                                                                class="img-responsive" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="earning">
                                                    <div class="leftData">
                                                        <p>Investor Presentation</p>
                                                        <div class="pdfIcon">
                                                            <img src="images/invest/pdf-icon.svg" class="img-responsive"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="in-tab-e" role="tabpanel" aria-labelledby="in-tab-5">
                            <div class="stakeTabBody">

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
        const slider = new Swiper('.brandStoriesSlider .swiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: '.brandStoriesSlider .swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.brandStoriesSlider .swiper-button-next',
                prevEl: '.brandStoriesSlider .swiper-button-prev'
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 14
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    </script>
    <script>
        document.getElementById('officeSelect').addEventListener('change', function () {
            const selected = this.value;
            document.querySelectorAll('.office-content').forEach(div => {
                div.style.display = 'none';
            });
            document.getElementById(selected).style.display = 'block';
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selCategory = document.getElementById('selCategory');
            const selYear = document.getElementById('selYear');
            const selQuarter = document.getElementById('selQuarter');

            function updateContent() {
                // Get selected values
                const category = selCategory.value;
                const year = selYear.value;
                const quarter = selQuarter.value;

                // Hide all content sections
                document.querySelectorAll('.stakeTabBody .row[id]').forEach(row => {
                    row.style.display = 'none';
                });

                // Create target ID based on dropdowns
                const targetId = `${category}-${year}-${quarter}`;
                const target = document.getElementById(targetId);

                // Show matching section (if it exists)
                if (target) {
                    target.style.display = 'flex';
                } else {
                    // If no exact match, show the category section alone (like "annual")
                    const categorySection = document.getElementById(category);
                    if (categorySection) {
                        categorySection.style.display = 'flex';
                    }
                }
            }

            // Event listeners
            selCategory.addEventListener('change', updateContent);
            selYear.addEventListener('change', updateContent);
            selQuarter.addEventListener('change', updateContent);

            // Show all by default on page load
            document.querySelectorAll('.stakeTabBody .row[id]').forEach(row => {
                row.style.display = 'flex';
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selStock = document.getElementById('selStock');
            const sections = document.querySelectorAll('.stock-section');

            // Function to show the section matching selected value
            function showSection(selectedId) {
                sections.forEach(section => {
                    if (section.id === selectedId) {
                        section.style.display = 'flex'; // show selected one
                    } else {
                        section.style.display = 'none'; // hide others
                    }
                });
            }

            // Hide all sections first
            sections.forEach(section => section.style.display = 'none');

            // Show default section based on selected option
            showSection(selStock.value);

            // Change event for dropdown
            selStock.addEventListener('change', function () {
                showSection(this.value);
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sel = document.getElementById("selInvestorCategory");
            const contents = document.querySelectorAll(".investor-content");

            function showSection(id) {
                contents.forEach(content => content.style.display = "none");
                const selected = document.getElementById(id);
                if (selected) selected.style.display = "block";
            }

            // Show the default selected section when page loads
            showSection(sel.value);

            // Change section when dropdown changes
            sel.addEventListener("change", function () {
                showSection(this.value);
            });
        });
    </script>
@endpush