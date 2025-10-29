<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\LogHistory;
use Illuminate\Support\Facades\Response;

class LogController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');
        $logs = [];

        if (File::exists($logPath)) {
            $logContent = File::get($logPath);

            // Split log content into entries using timestamp pattern
            $entries = preg_split('/\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\]/', $logContent, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

            for ($i = 0; $i < count($entries) - 1; $i += 2) {
                $logs[] = [
                    'timestamp' => $entries[$i],
                    'message' => trim($entries[$i + 1]),
                ];
            }
            $logs = array_reverse($logs);
        }

        return view('admin.logs', [
            'title' => 'Laravel Logs',
            'heading' => 'Laravel Logs',
            'logs' => $logs,
        ]);
    }

    public function download()
    {
        $logPath = storage_path('logs/laravel.log');

        if (!File::exists($logPath)) {
            return redirect()->route('logs')->with('error', 'Log file not found.');
        }

        $fileName = 'laravel-' . now()->format('Y-m-d') . '.log';
        return response()->download($logPath, $fileName);
    }

    public function delete()
    {
        $logPath = storage_path('logs/laravel.log');

        if (File::exists($logPath)) {
            File::delete($logPath);
            return redirect()->route('logs')->with('success', 'Log file deleted successfully.');
        }

        return redirect()->route('logs')->with('error', 'Log file not found.');
    }
    public function loginHistory(Request $request)
    {
        $content['title'] = 'Log History';
        $content['heading'] = 'Login History';

        if ($request->ajax()) {
            $results = LogHistory::query();

            return datatables()->of($results)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.loginHistory', $content);
    }
}
