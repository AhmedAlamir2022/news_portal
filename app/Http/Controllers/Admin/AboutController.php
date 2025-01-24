<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about-page.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);
        About::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );
        return redirect()->back()->with('success', 'Updated Successfully!');
    }
}
