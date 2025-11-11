<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

    // AJAX Loader
   public function getInvestorData(Request $request)
    {
        $category = $request->get('category', 'financial');
        $year = $request->get('year');
        $quarter = $request->get('quarter');
        $load = $request->get('load'); // "years" or "quarters"

        $modelMap = [
            'financial' => \App\Models\FinResult::class,
            'annual' => \App\Models\AnnualReport::class,
            'investor' => \App\Models\InvestorPress::class,
            'annual-subs' => \App\Models\AnnualReportSub::class,
            // 'annual-return' => \App\Models\AnnualReturn::class,
            // 'annual-general' => \App\Models\AgmTranscript::class,
            // 'earning' => \App\Models\EarningCall::class,
        ];

        if (!isset($modelMap[$category])) {
            return response()->json([]);
        }

        $model = $modelMap[$category];
        if ($load === 'years') {
            $years = $model::where('status', 1)
                ->select('year')
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year');
            return response()->json(['years' => $years]);
        }
        if ($load === 'quarters' && $year) {
            $quarters = $model::where('status', 1)
                ->where('year', $year)
                ->select('quarter')
                ->distinct()
                ->pluck('quarter');
            return response()->json(['quarters' => $quarters]);
        }
        $query = $model::where('status', 1);
        if ($year) $query->where('year', $year);
        if ($quarter && in_array($category, ['financial', 'earning','investor'])) {
            $query->where('quarter', $quarter);
        }

        $data = $query->orderBy('year', 'desc')->get();
        return response()->json($data);
    }


    public function stockInformationIndex()
    {
        $data['meta_title'] = "Srf - Investor Relations";
        $data['meta_desc'] = "";
        $data['meta_image'] = "";
        return view('pages.stock-information',compact('data'));    
    }
}