<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ad = Advertisement::first();
        return view('admin.advertisement.index', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'home_top_bar_ad' => ['nullable', 'image', 'max:3000'],
            'home_middle_ad' => ['nullable', 'image', 'max:3000'],
            'view_page_ad' => ['nullable', 'image', 'max:3000'],
            'news_page_ad' => ['nullable', 'image', 'max:3000'],
            'side_bar_ad' => ['nullable', 'image', 'max:3000'],
            'home_top_bar_ad_url' => ['nullable', 'url'],
            'home_middle_ad_url' => ['nullable', 'url'],
            'view_page_ad_url' => ['nullable', 'url'],
            'news_page_ad_url' => ['nullable', 'url'],
            'side_bar_ad_url' => ['nullable', 'url'],
        ]);
        $home_top_bar_ad = $this->handleFileUpload($request, 'home_top_bar_ad');
        $home_middle_ad = $this->handleFileUpload($request, 'home_middle_ad');
        $view_page_ad = $this->handleFileUpload($request, 'view_page_ad');
        $news_page_ad = $this->handleFileUpload($request, 'news_page_ad');
        $side_bar_ad = $this->handleFileUpload($request, 'side_bar_ad');
        $ad = Advertisement::first();
        Advertisement::updateOrCreate(
            ['id' => $id],
            [
                'home_top_bar_ad' => !empty($home_top_bar_ad) ? $home_top_bar_ad : $ad->home_top_bar_ad,
                'home_middle_ad' => !empty($home_middle_ad) ? $home_middle_ad : $ad->home_middle_ad,'view_page_ad' => !empty($view_page_ad) ? $view_page_ad : $ad->view_page_ad,'news_page_ad' => !empty($news_page_ad) ? $news_page_ad : $ad->news_page_ad,'side_bar_ad' => !empty($side_bar_ad) ? $side_bar_ad : $ad->side_bar_ad,
                'home_top_bar_ad_status' => $request->home_top_bar_ad_status == 1 ? 1 : 0,
                'home_middle_ad_status' => $request->home_middle_ad_status == 1 ? 1 : 0,
                'view_page_ad_status' => $request->view_page_ad_status == 1 ? 1 : 0,
                'news_page_ad_status' => $request->news_page_ad_status == 1 ? 1 : 0,
                'side_bar_ad_status' => $request->side_bar_ad_status == 1 ? 1 : 0,
                'home_top_bar_ad_url' => $request->home_top_bar_ad_url,
                'home_middle_ad_url' => $request->home_middle_ad_url,
                'view_page_ad_url' => $request->view_page_ad_url,
                'news_page_ad_url' => $request->news_page_ad_url,
                'side_bar_ad_url' => $request->side_bar_ad_url,
            ]
        );
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
}
