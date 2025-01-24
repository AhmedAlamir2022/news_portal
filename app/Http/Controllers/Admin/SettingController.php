<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
        return view('admin.setting.index');
    }


    function updateGeneralSetting(Request $request) : RedirectResponse {
        $request->validate([
            'site_name' => ['required', 'max:255'],
            'site_logo' => ['nullable', 'image', 'max:3000'],
            'site_favicon' => ['nullable', 'image', 'max:1000'],
        ]);
        $logoPath = $this->handleFileUpload($request, 'site_logo');
        $faviconPath = $this->handleFileUpload($request, 'site_favicon');
        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );
        if(!empty($logoPath)){
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath]
            );
        }
        if(!empty($faviconPath)){
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath]
            );
        }
        return redirect()->back()->with('info', 'Updated Successfully!');
    }


    function updateSeoSetting(Request $request) : RedirectResponse {
        $request->validate([
            'site_seo_title' => ['required', 'max:60'],
            'site_seo_description' => ['required', 'max:160'],
            'site_seo_keywords' => ['required'],
        ]);
        Setting::updateOrCreate(
            ['key' => 'site_seo_title'],
            ['value' => $request->site_seo_title]
        );
        Setting::updateOrCreate(
            ['key' => 'site_seo_description'],
            ['value' => $request->site_seo_description]
        );
        Setting::updateOrCreate(
            ['key' => 'site_seo_keywords'],
            ['value' => $request->site_seo_keywords]
        );
        return redirect()->back()->with('info', 'Updated Successfully!');
    }

    function updateAppearanceSetting(Request $request): RedirectResponse {
        $request->validate([
            'site_color' => ['required', 'max:200']
        ]);
        Setting::updateOrCreate(
            ['key' => 'site_color'],
            ['value' => $request->site_color]
        );
        return redirect()->back()->with('info', 'Updated Successfully!');
    }

    function updateMicrosoftApiSetting(Request $request) : RedirectResponse {

        $request->validate([
            'site_microsoft_api_host' => ['required'],
            'site_microsoft_api_key' => ['required'],
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_microsoft_api_host'],
            ['value' => $request->site_microsoft_api_host]
        );

        Setting::updateOrCreate(
            ['key' => 'site_microsoft_api_key'],
            ['value' => $request->site_microsoft_api_key]
        );

        toast(__('admin.Updated Successfully!'), 'success');

        return redirect()->back();
    }
}
