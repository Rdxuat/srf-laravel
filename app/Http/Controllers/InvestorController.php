<?php

namespace App\Http\Controllers;
use App\Models\CopGovReport;
use App\Models\DisclosureThirty;
use App\Models\KycForm;
use App\Models\Notice;
use App\Models\OtherDisclosure;
use App\Models\Policy;
use App\Models\SecretarialCompilanceReport;
use App\Models\ShareholdingPattern;
use App\Models\StockExchangeFilings;
use App\Models\TdsInstruction;
use Illuminate\Http\Request;
use App\Models\FinResult;
use App\Models\AnnualReport;
use App\Models\InvestorPress;
use App\Models\AnnualReportSub;
use App\Models\AnnualReturn;
use App\Models\AgmTranscript;
use App\Models\EarningsCall;
use App\Models\BoardOfDirectors;


class InvestorController extends Controller
{
    public function financialResultIndex()
    {
        $data['active_tab'] = 'financial';
        $data['meta_title'] = "SRF - Investor Relations | Financial Results";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function annualReportIndex()
    {
        $data['active_tab'] = 'annual';
        $data['meta_title'] = "SRF - Investor Relations | Annual Reports";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function annualReportSubsIndex()
    {
        $data['active_tab'] = 'annual-subs';
        $data['meta_title'] = "SRF - Investor Relations | Annual Reports - Subsidiaries";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function investorPresentationIndex()
    {
        $data['active_tab'] = 'investor';
        $data['meta_title'] = "SRF - Investor Relations | Investor Presentation";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function annualReturnIndex()
    {
        $data['active_tab'] = 'annual-return';
        $data['meta_title'] = "SRF - Investor Relations | Annual Return";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function agmTranscriptIndex()
    {
        $data['active_tab'] = 'annual-general';
        $data['meta_title'] = "SRF - Investor Relations | AGM Transcript";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function earningCallIndex()
    {
        $data['active_tab'] = 'earning';
        $data['meta_title'] = "SRF - Investor Relations | Earnings Call";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.financial-results', compact('data'));
    }

    public function stockQuoteIndex()
    {
        $data['active_tab'] = 'stock-quote';
        $data['meta_title'] = "SRF - Investor Relations | Stock Quote";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function stockChartIndex()
    {
        $data['active_tab'] = 'stock-chart';
        $data['meta_title'] = "SRF - Investor Relations | Stock Chart";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function historicalPriceIndex()
    {
        $data['active_tab'] = 'historical-price';
        $data['meta_title'] = "SRF - Investor Relations | Historical Stock Price";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function investmentCalculatorIndex()
    {
        $data['active_tab'] = 'investment-calculator';
        $data['meta_title'] = "SRF - Investor Relations | Investment Calculator";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function dividendSharesIndex()
    {
        $data['active_tab'] = 'dividend-shares';
        $data['meta_title'] = "SRF - Investor Relations | Dividend and Shares";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function listingIndex()
    {
        $data['active_tab'] = 'listing';
        $data['meta_title'] = "SRF - Investor Relations | Listing";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information', compact('data'));
    }

    public function creditRatingsIndex()
    {
        $data['active_tab'] = 'credit-ratings';
        $data['meta_title'] = "SRF - Investor Relations | Credit Ratings";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function dematerialisationIndex()
    {
        $data['active_tab'] = 'dematerialisation';
        $data['meta_title'] = "SRF - Investor Relations | Dematerialisation of Shares";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function regulation30Index()
    {
        $data['active_tab'] = 'regulation30';
        $data['meta_title'] = "SRF - Investor Relations | Regulation 30 Disclosures";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function regulation46Index()
    {
        $data['active_tab'] = 'regulation46';
        $data['meta_title'] = "SRF - Investor Relations | Regulation 46 Disclosures";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function kycFormsIndex()
    {
        $data['active_tab'] = 'kyc-forms';
        $data['meta_title'] = "SRF - Investor Relations | KYC Forms (FAQ)";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function nominationIndex()
    {
        $data['active_tab'] = 'nomination';
        $data['meta_title'] = "SRF - Investor Relations | Nomination Facility";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function noticesIndex()
    {
        $data['active_tab'] = 'notices';
        $data['meta_title'] = "SRF - Investor Relations | Notices";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function odrIndex()
    {
        $data['active_tab'] = 'odr';
        $data['meta_title'] = "SRF - Investor Relations | Online Dispute Resolution";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function registrarIndex()
    {
        $data['active_tab'] = 'registrar';
        $data['meta_title'] = "SRF - Investor Relations | Registrar & Share Transfer Agents";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function schemeIndex()
    {
        $data['active_tab'] = 'scheme';
        $data['meta_title'] = "SRF - Investor Relations | Scheme of Arrangements";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function complianceReportIndex()
    {
        $data['active_tab'] = 'compliance-report';
        $data['meta_title'] = "SRF - Investor Relations | Secretarial Compliance Report";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function shareholdingIndex()
    {
        $data['active_tab'] = 'shareholding';
        $data['meta_title'] = "SRF - Investor Relations | Shareholding Pattern";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function shareholderServicesIndex()
    {
        $data['active_tab'] = 'shareholder-services';
        $data['meta_title'] = "SRF - Investor Relations | Shareholder Services";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function surveyFormsIndex()
    {
        $data['active_tab'] = 'survey-forms';
        $data['meta_title'] = "SRF - Investor Relations | Shareholder Survey Forms";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function stockFilingsIndex()
    {
        $data['active_tab'] = 'stock-filings';
        $data['meta_title'] = "SRF - Investor Relations | Stock Exchange Filings";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function tdsInstructionsIndex()
    {
        $data['active_tab'] = 'tds-instructions';
        $data['meta_title'] = "SRF - Investor Relations | TDS Instructions on Dividend Distribution";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.shareholder-information', compact('data'));
    }

    public function corporateGovernanceIndex()
    {
        $data['active_tab'] = 'overview';
        $data['meta_title'] = "SRF - Investor Relations | Corporate Governance";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.corporate-governance', compact('data'));
    }
   
    public function bodIndex()
    {
        $data['active_tab'] = 'bod';
        $data['meta_title'] = "SRF - Investor Relations | Board of Directors and Committees";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        $data['directors'] = BoardOfDirectors::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.corporate-governance', compact('data'));
    }
   
    public function policyIndex()
    {
        $data['active_tab'] = 'policy';
        $data['meta_title'] = "SRF - Investor Relations | Policy";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.corporate-governance', compact('data'));
    }
   
    public function corporateGovReportIndex()
    {
        $data['active_tab'] = 'corporate';
        $data['meta_title'] = "SRF - Investor Relations | Corporate Governance Report";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.corporate-governance', compact('data'));
    }
    
    public function otherDisclosuereIndex()
    {
        $data['active_tab'] = 'other';
        $data['meta_title'] = "SRF - Investor Relations | Corporate Governance Report";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.corporate-governance', compact('data'));
    }

    

    // AJAX Loader
    public function getInvestorData(Request $request)
    {
        $category = $request->get('category', 'financial');
        $year = $request->get('year');
        $quarter = $request->get('quarter');
        $modelMap = [
            'financial' => FinResult::class,
            'annual' => AnnualReport::class,
            'investor' => InvestorPress::class,
            'annual-subs' => AnnualReportSub::class,
            'annual-return' => AnnualReturn::class,
            'annual-general' => AgmTranscript::class,
            'earning' => EarningsCall::class,
            'policy' => Policy::class,
            'corporate' => CopGovReport::class,
            'regulation30' => DisclosureThirty::class,
            'kyc-forms' => KycForm::class,
            'notices' => Notice::class,
            'other' => OtherDisclosure::class,
            'compliance-report' => SecretarialCompilanceReport::class,
            'shareholding' => ShareholdingPattern::class,
            'stock-filings' => StockExchangeFilings::class,
            'tds-instructions' => TdsInstruction::class,
        ];

        if (!isset($modelMap[$category])) {
            return response()->json([]);
        }

        $model = $modelMap[$category];
        $noYearCategories = ['policy', 'corporate', 'other','kyc-forms','tds-instructions'];
        $quarterCategories = ['financial', 'investor', 'annual-general','earning'];
        $query = $model::where('status', 1);
        if (!in_array($category, $noYearCategories)) {
            if ($year) {
                $query->where('year', $year);
            }
            if ($quarter && in_array($category, $quarterCategories)) {
                $query->where('quarter', $quarter);
            }
        }

        $data = $query->orderBy('id', 'desc')->get();

        return response()->json($data);
    }

}