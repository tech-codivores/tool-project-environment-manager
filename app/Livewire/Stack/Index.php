<?php

namespace App\Livewire\Stack;

use App\Models\Stack;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.stack.index', [
            'stackList' => Stack::all(),
        ]);
    }
}
