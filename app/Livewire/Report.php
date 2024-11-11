<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sale;

class Report extends Component
{
    public function render()
    {
        $saleAll = Sale::where('status', 'done')->get();
        return view('livewire.report')->with([
            'saleAll' => $saleAll
        ]);
    }
}
