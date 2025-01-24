<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterGridThree;
use App\Models\FooterTitle;
use Illuminate\Http\Request;

class FooterGridThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerTitle = FooterTitle::where('key' , 'grid_three_title')->first();
        $footer = FooterGridThree::all();
        return view('admin.footer-grid-three.index', compact('footer', 'footerTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-grid-three.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'url' => ['required'],
            'status' => ['required']
        ]);
        $footer = new FooterGridThree();
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        return redirect()->route('admin.footer-grid-three.index')->with('success', 'Created Successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footer = FooterGridThree::findOrFail($id);
        return view('admin.footer-grid-three.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'url' => ['required'],
            'status' => ['required']
        ]);
        $footer = FooterGridThree::findOrFail($id);
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        return redirect()->route('admin.footer-grid-three.index')->with('info', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridThree::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function handleTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255']
        ]);
        FooterTitle::updateOrCreate(
            [
                'key' => 'grid_three_title',
            ],
            [
                'value' => $request->title
            ]
        );
        return redirect()->back()->with('info', 'Updated Successfully!');

    }
}
