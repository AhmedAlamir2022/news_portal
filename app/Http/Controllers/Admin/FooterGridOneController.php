<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterGridOne;
use App\Models\FooterTitle;
use Illuminate\Http\Request;

class FooterGridOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerTitle = FooterTitle::where('key' , 'grid_one_title')->first();
        $footer = FooterGridOne::all();
        return view('admin.footer-grid-one.index', compact('footer', 'footerTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-grid-one.create');
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
        $footer = new FooterGridOne();
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        return redirect()->route('admin.footer-grid-one.index')->with('success', 'Created Successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footer = FooterGridOne::findOrFail($id);
        return view('admin.footer-grid-one.edit', compact('footer'));
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
        $footer = FooterGridOne::findOrFail($id);
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        return redirect()->route('admin.footer-grid-one.index')->with('info', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridOne::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function handleTitle(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255']
        ]);
        FooterTitle::updateOrCreate(
            [
                'key' => 'grid_one_title',
            ],
            [
                'value' => $request->title
            ]
        );
        return redirect()->back()->with('info', 'Updated Successfully!');

    }
}
