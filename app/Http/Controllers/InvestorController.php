<?php

namespace App\Http\Controllers;
use App\Models\CopGovReport;
use App\Models\DematerialisationOfShares;
use App\Models\DisclosureThirty;
use App\Models\InvestorMeet;
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
use App\Models\DividendAndShare;


class InvestorController extends Controller
{
    public function render(Request $request)
    {
        $routeName = $request->route()->getName();

        $config = config("investor.$routeName");

        if (!$config) {
            abort(404);
        }

        $data['active_tab'] = $config['tab_key'];
        $data['meta_title'] = $config['meta_title'] ?? '';
        $data['meta_desc']  = $config['meta_desc'] ?? '';
        $data['meta_image'] = '';

        if (!empty($config['load_years'])) {
            $data['years'] = DividendAndShare::select('financial_year')
                ->distinct()
                ->orderBy('financial_year', 'DESC')
                ->pluck('financial_year');
        }

        if (!empty($config['load_directors'])) {
            $data['directors'] = BoardOfDirectors::where('status', 1)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view($config['view'], compact('data'));
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
            'investor-meet' => InvestorMeet::class,
            'dematerialisation' => DematerialisationOfShares::class,
        ];

        if (!isset($modelMap[$category])) {
            return response()->json([]);
        }

        $model = $modelMap[$category];
        $noYearCategories = ['policy', 'other','kyc-forms','tds-instructions','dematerialisation'];
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