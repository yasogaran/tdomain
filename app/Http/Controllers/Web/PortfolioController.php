<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('pages.portfolio');
    }

    public function show(string $slug): View
    {
        $project = Project::with(['media' => function ($query) {
            $query->orderBy('order');
        }])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Get 3 related projects (same industry or service_type)
        $relatedProjects = Project::with('media')
            ->where('id', '!=', $project->id)
            ->where('status', 'published')
            ->where(function ($q) use ($project) {
                $q->where('industry', $project->industry)
                    ->orWhere('service_type', $project->service_type);
            })
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('pages.portfolio-detail', compact('project', 'relatedProjects'));
    }
}
