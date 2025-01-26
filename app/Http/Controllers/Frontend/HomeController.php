<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $breakingNews = News::where(['is_breaking_news' => 1,])
        //     ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();
        // $heroSlider = News::with(['category', 'auther'])
        //     ->where('show_at_slider', 1)
        //     ->activeEntries()
        //     ->withLocalize()
        //     ->orderBy('id', 'DESC')->take(7)
        //     ->get();

        // $recentNews = News::with(['category', 'auther'])->activeEntries()->withLocalize()
        //     ->orderBy('id', 'DESC')->take(6)->get();
        // $popularNews = News::with(['category'])->where('show_at_popular', 1)
        //     ->activeEntries()->withLocalize()
        //     ->orderBy('updated_at', 'DESC')->take(4)->get();

        // $HomeSectionSetting = HomeSectionSetting::first();

        // if($HomeSectionSetting){
        //     $categorySectionOne = News::where('category_id', $HomeSectionSetting->category_section_one)
        //         ->activeEntries()->withLocalize()
        //         ->orderBy('id', 'DESC')
        //         ->take(8)
        //         ->get();

        // $categorySectionTwo = News::where('category_id', $HomeSectionSetting->category_section_two)
        //     ->activeEntries()->withLocalize()
        //     ->orderBy('id', 'DESC')
        //     ->take(8)
        //     ->get();

        // $categorySectionThree = News::where('category_id', $HomeSectionSetting->category_section_three)
        //     ->activeEntries()->withLocalize()
        //     ->orderBy('id', 'DESC')
        //     ->take(6)
        //     ->get();

        // $categorySectionFour = News::where('category_id', $HomeSectionSetting->category_section_four)
        //     ->activeEntries()->withLocalize()
        //     ->orderBy('id', 'DESC')
        //     ->take(4)
        //     ->get();
        // }else {
        //     $categorySectionOne = collect();
        //     $categorySectionTwo = collect();
        //     $categorySectionThree = collect();
        //     $categorySectionFour = collect();
        // }


        // $mostViewedPosts = News::activeEntries()->withLocalize()
        //     ->orderBy('views', 'DESC')
        //     ->take(3)
        //     ->get();

        // $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        // $mostCommonTags = $this->mostCommonTags();

        // $ad = Ad::first();
        return view('welcome');

        // return view('frontend.home', compact(
        //     'breakingNews',
        //     'heroSlider',
        //     'recentNews',
        //     'popularNews',
        //     'categorySectionOne',
        //     'categorySectionTwo',
        //     'categorySectionThree',
        //     'categorySectionFour',
        //     'mostViewedPosts',
        //     'socialCounts',
        //     'mostCommonTags',
        //     'ad'
        // ));
    }
}
