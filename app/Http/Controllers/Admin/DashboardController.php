<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() : View
    {
        // $publishedNews = News::where(['status' => 1, 'is_approved' => 1])->count();
        // $pendingNews = News::where(['status' => 1, 'is_approved' => 0])->count();
        // $Categories = Category::count();
        // $languages = Language::count();
        // $roles = Role::count();
        // $permissions = Permission::count();
        // $socials = SocialLink::count();
        // $subscribers = Subscriber::count();

        return view('admin.dashboard.index');
    }
}
