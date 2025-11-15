<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InvestorImport;
use App\Models\DividendAndShare;

class InvestorUploadController extends Controller
{
    public function index()
    {
        return view('investors.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt'
        ]);
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        Excel::import(new InvestorImport, $request->file('file'));

        return back()->with('success', 'Excel imported successfully!');
    }

    public function search(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'dpid_or_folio' => 'required'
        ]);

        $year = $request->year;
        $folio = $request->dpid_or_folio;

        $data = DividendAndShare::where('financial_year', $year)
                ->where(function ($q) use ($folio) {
                    $q->where('folio_number', $folio)
                    ->orWhere('dp_id_client_id', $folio);
                })
                ->first();

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Record not found']);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

}
