<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeSectionSetting;
use Illuminate\Http\Request;

class HomeSectionSettingController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $homeSectionSetting = HomeSectionSetting::first();
        return view('admin.home-section-setting.index', compact('categories', 'homeSectionSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_section_one' => ['required', 'string'],
            'category_section_two' => ['required', 'string'],
            'category_section_three' => ['required', 'string'],
            'category_section_four' => ['required', 'string'],
        ]);
        HomeSectionSetting::updateOrCreate(
            ['id' => 1],
            [
                'category_section_one' => $request->category_section_one,
                'category_section_two' => $request->category_section_two,
                'category_section_three' => $request->category_section_three,
                'category_section_four' => $request->category_section_four,
            ]
        );
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
}
