<?php

namespace App\Livewire\Public;

use App\Models\Partner;
use Livewire\Component;

class PartnerLogos extends Component
{
    public function render()
    {
        $partners = Partner::where('status', 'active')
            ->orderBy('order')
            ->get();

        return view('livewire.public.partner-logos', [
            'partners' => $partners,
        ]);
    }
}
