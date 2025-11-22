<?php

namespace App\Livewire\Public;

use App\Models\TeamMember;
use Livewire\Component;

class TeamShowcase extends Component
{
    public function render()
    {
        $teamMembers = TeamMember::orderBy('order')
            ->orderBy('name')
            ->get();

        return view('livewire.public.team-showcase', [
            'teamMembers' => $teamMembers,
        ]);
    }
}
