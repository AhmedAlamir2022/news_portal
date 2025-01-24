<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('category')
            ->where('auther_id', auth()->guard('admin')->user()->id)
            ->where('is_approved', 1)
            ->orderByDesc('id')->get();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => ['required'],
            'image' => ['required', 'max:3000', 'image'],
            'title' => ['required', 'max:255', 'unique:news,title'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'tags' => ['required'],
            'is_breaking_news' => ['boolean'],
            'show_at_slider' => ['boolean'],
            'show_at_popular' => ['boolean'],
            'status' => ['boolean'],
        ]);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $news = new News();
        $news->category_id = $request->category_id;
        $news->auther_id = Auth::guard('admin')->user()->id;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->slug = \Str::slug($request->title);
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->is_approved =  1;
        $news->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->save();
            $tagIds[] = $item->id;
        }
        $news ->tags()->attach($tagIds);
        // $news->tags()->attach($tagIds);
        return redirect()->route('admin.news.index')->with('success', 'Created Successfull');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => ['required'],
            'image' => ['required', 'max:3000', 'image'],
            'title' => ['required', 'max:255', 'unique:news,title'],
            'content' => ['required'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'tags' => ['required'],
            'is_breaking_news' => ['boolean'],
            'show_at_slider' => ['boolean'],
            'show_at_popular' => ['boolean'],
            'status' => ['boolean'],
        ]);

        $news = News::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $news->category_id = $request->category_id;
        $news->image = !empty($imagePath) ? $imagePath : $news->image;
        $news->title = $request->title;
        $news->slug = \Str::slug($request->title);
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        /** Delete previos tags */
        $news->tags()->delete();

        /** detach tags form pivot table */
        $news->tags()->detach($news->tags);

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->save();
            $tagIds[] = $item->id;
        }
        $news->tags()->attach($tagIds);
        return redirect()->route('admin.news.index')->with('info', 'Updated Successfull'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->tags()->delete();
        $news->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    /**
     * Copy news
     */
    public function copyNews(string $id)
    {
        $news = News::findOrFail($id);
        $copyNews = $news->replicate();
        $copyNews->save();
        return redirect()->back()->with('success', 'Copied Successfully!');
    }

    /**
     * Change toggle status of news
     */
    public function toggleNewsStatus(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => 'Updated successfully!']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function pendingNews(): View
    {
        $news = News::with('category')
                    ->where('is_approved', 0)
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.pending-news.index', compact('news'));
    }

    function approveNews(Request $request): Response
    {
        $news = News::findOrFail($request->id);
        $news->is_approved = $request->is_approve;
        $news->save();
        return response(['status' => 'success', 'message' => 'Updated Successfully']);
    }
}
