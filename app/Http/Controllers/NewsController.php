<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $data['meta_title'] = 'News';
        $data['meta_desc']  = 'News Desc';
        $data['meta_image'] = '';
        $data['news'] = News::orderBy('date', 'desc')->get();
        return view('pages.in-the-news',compact('data'));
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