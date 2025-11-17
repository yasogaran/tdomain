<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProjects = Project::with('media')
            ->where('featured', true)
            ->where('status', 'published')
            ->orderBy('order')
            ->limit(6)
            ->get();

        $partners = Partner::where('status', 'active')
            ->orderBy('order')
            ->get();

        return view('pages.home', compact('featuredProjects', 'partners'));
    }
}
