<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $page = Page::where('slug', 'about-us')->firstOrFail();

        return view('pages.about', compact('page'));
    }

    public function services(): View
    {
        return view('pages.services');
    }

    public function serviceDetail(string $slug): View
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        // Get projects related to this service
        $relatedProjects = Project::with('media')
            ->where('status', 'published')
            ->where('service_type', 'like', '%' . $page->title . '%')
            ->limit(6)
            ->get();

        return view('pages.service-detail', compact('page', 'relatedProjects'));
    }
}
