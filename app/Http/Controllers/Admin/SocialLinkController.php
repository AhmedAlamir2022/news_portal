<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social-link.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'url' => ['url', 'required'],
            'icon' => ['required']
        ]);
        $social = new SocialLink();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();
        return redirect()->route('admin.social-link.index')->with('success', 'Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        return view('admin.social-link.edit', compact('socialLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'url' => ['url', 'required'],
            'icon' => ['required']
        ]);
        $social = SocialLink::findOrFail($id);
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();
        return redirect()->route('admin.social-link.index')->with('info', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SocialLink::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
