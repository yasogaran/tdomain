<?php

namespace App\Livewire\Public;

use App\Models\Project;
use Livewire\Component;

class FeaturedProjects extends Component
{
    public function render()
    {
        $projects = Project::with('media')
            ->where('featured', true)
            ->where('status', 'published')
            ->orderBy('order')
            ->limit(6)
            ->get();

        return view('livewire.public.featured-projects', [
            'projects' => $projects,
        ]);
    }
}
