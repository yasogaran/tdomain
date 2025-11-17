<?php

namespace App\Livewire\Public;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectPortfolio extends Component
{
    use WithPagination;

    public $search = '';
    public $industry = '';
    public $serviceType = '';
    public $technology = '';
    public $perPage = 12;

    protected $queryString = [
        'search' => ['except' => ''],
        'industry' => ['except' => ''],
        'serviceType' => ['except' => ''],
        'technology' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingIndustry()
    {
        $this->resetPage();
    }

    public function updatingServiceType()
    {
        $this->resetPage();
    }

    public function updatingTechnology()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'industry', 'serviceType', 'technology']);
        $this->resetPage();
    }

    public function getIndustriesProperty()
    {
        return Project::where('status', 'published')
            ->distinct()
            ->pluck('industry')
            ->filter()
            ->sort()
            ->values();
    }

    public function getServiceTypesProperty()
    {
        return Project::where('status', 'published')
            ->distinct()
            ->pluck('service_type')
            ->filter()
            ->sort()
            ->values();
    }

    public function render()
    {
        $query = Project::with('media')
            ->where('status', 'published');

        // Apply search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('client_name', 'like', '%' . $this->search . '%')
                    ->orWhere('challenge', 'like', '%' . $this->search . '%')
                    ->orWhere('solution', 'like', '%' . $this->search . '%');
            });
        }

        // Apply filters
        if ($this->industry) {
            $query->where('industry', $this->industry);
        }

        if ($this->serviceType) {
            $query->where('service_type', $this->serviceType);
        }

        if ($this->technology) {
            $query->where('technology_stack', 'like', '%' . $this->technology . '%');
        }

        $projects = $query->orderBy('order')->paginate($this->perPage);

        return view('livewire.public.project-portfolio', [
            'projects' => $projects,
        ]);
    }
}
