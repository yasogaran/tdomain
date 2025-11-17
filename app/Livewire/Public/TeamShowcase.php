<?php

namespace App\Livewire\Public;

use App\Models\TeamMember;
use Livewire\Component;

class TeamShowcase extends Component
{
    public function render()
    {
        $teamMembers = TeamMember::orderBy('department')
            ->orderBy('order')
            ->get()
            ->groupBy('department');

        return view('livewire.public.team-showcase', [
            'departments' => $teamMembers,
        ]);
    }
}
