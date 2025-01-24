<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class SocialCountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialCounts = SocialCount::all();
        return view('admin.social-count.index', compact('socialCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-count.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required'],
            'fan_count' => ['required', 'max:255'],
            'fan_type' => ['required', 'max:255'],
            'button_text' => ['required', 'max:255'],
            'color' => ['required', 'max:255'],
            'url' => ['required'],
        ]);
        $socialCount = new SocialCount();
        $socialCount->icon = $request->icon;
        $socialCount->url = $request->url;
        $socialCount->fan_count = $request->fan_count;
        $socialCount->fan_type = $request->fan_type;
        $socialCount->button_text = $request->button_text;
        $socialCount->color = $request->color;
        $socialCount->status = $request->status;
        $socialCount->save();
        return redirect()->route('admin.social-count.index')->with('success', 'Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        return view('admin.social-count.edit', compact('socialCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required'],
            'fan_count' => ['required', 'max:255'],
            'fan_type' => ['required', 'max:255'],
            'button_text' => ['required', 'max:255'],
            'color' => ['required', 'max:255'],
            'url' => ['required'],
        ]);
        $socialCount = SocialCount::findOrFail($id);
        $socialCount->icon = $request->icon;
        $socialCount->url = $request->url;
        $socialCount->fan_count = $request->fan_count;
        $socialCount->fan_type = $request->fan_type;
        $socialCount->button_text = $request->button_text;
        $socialCount->color = $request->color;
        $socialCount->status = $request->status;
        $socialCount->save();
        return redirect()->route('admin.social-count.index')->with('info', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        $socialCount->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
