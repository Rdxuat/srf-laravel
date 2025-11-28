<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $data['meta_title'] = 'News';
        $data['meta_desc']  = 'News Desc';
        $data['meta_image'] = '';

        $news = News::orderBy('date', 'desc')->get();

        $blocks = [];
        $i = 0;
        $count = $news->count();

        $imageIndex    = 0; 
        $textPairIndex = 0; 

        while ($i < $count) {
            $item = $news[$i];
            if (!empty($item->image)) {
                $imageIndex++;

                $blocks[] = [
                    'type'    => 'image',      
                    'items'   => [$item],
                    'reverse' => $imageIndex % 2 === 0, 
                ];
                $i++;
            } else {
                $next = ($i + 1 < $count && empty($news[$i + 1]->image))
                    ? $news[$i + 1]
                    : null;

                if ($next) {
                    $textPairIndex++;

                    $blocks[] = [
                        'type'    => 'text-pair',  
                        'items'   => [$item, $next],
                        'reverse' => $textPairIndex % 2 === 0, 
                    ];
                    $i += 2;
                } else {
                    $blocks[] = [
                        'type'  => 'single',
                        'items' => [$item],
                    ];
                    $i++;
                }
            }
        }

        $data['blocks'] = $blocks;

        return view('pages.in-the-news', compact('data'));
    }


    public function news($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        $data['meta_title'] = $news->title;
        $data['meta_desc']  = $news->title;
        $data['meta_image'] = '';
        $data['related'] = News::where('slug', '!=', $slug)
                                ->orderBy('date', 'desc')
                                ->limit(3)
                                ->get();

        return view('pages.news', compact('data', 'news'));
    }

}