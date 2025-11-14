<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InvestorImport;

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
}
