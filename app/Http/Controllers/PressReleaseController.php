<?php 
namespace App\Http\Controllers; 
use App\Models\PressRelease;
use Illuminate\Http\Request;
class PressReleaseController extends Controller 
{ 
    public function index(Request $request) 
    {
        $data['meta_title'] = 'Press Release'; 
        $data['meta_desc'] = 'Press Release Desc'; 
        $data['meta_image'] = '';  
        $month = $request->month; $year = $request->year;  
        $query = PressRelease::query()->where('status', 1);
        if (!empty($month)) { 
            $query->whereMonth('date', $month); 
        } 
        if (!empty($year)) { 
            $query->whereYear('date', $year); 
        } 
        $data['pressReleases'] = $query->orderBy('date', 'desc')->get(); 
        $data['years'] = PressRelease::selectRaw('YEAR(date) as year')
                        ->where('status', 1)
                        ->distinct()
                        ->orderBy('year','desc')
                        ->get(); 
        $data['months'] = PressRelease::selectRaw('MONTH(date) as month')
                        ->where('status', 1)
                        ->distinct()
                        ->orderBy('month','asc')
                        ->get(); 
        return view('pages.press-releases', compact('data')); 
    } 
}