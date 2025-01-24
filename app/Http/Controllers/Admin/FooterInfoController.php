<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer-info.index', compact('footerInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:3000'],
            'description' => ['required', 'max:300'],
            'copyright' => ['required', 'max:255']
        ]);
        $footerInfo = FooterInfo::first();
        $imagePath = $this->handleFileUpload($request, 'logo', !empty($footerInfo) ?$footerInfo->logo: '');
        FooterInfo::updateOrCreate(
            ['id' => 1],
            [
                'logo' => !empty($imagePath) ? $imagePath : $footerInfo->logo,
                'description' => $request->description,
                'copyright' => $request->copyright
            ]
        );
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
}
