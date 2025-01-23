<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:categories,name'],
            'show_at_nav' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category Created Successfull');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:categories,name'],
            'show_at_nav' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.index')->with('info', 'Category Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $category = Category::findOrFail($id);
            // $news = News::where('category_id', $category->id)->get();
            // foreach ($news as $item) {
            //     $item->tags()->delete();
            // }
            $category->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Someting went wrong!']);
        }
    }
}
