<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\State;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $projectRunningList = State::get('running') ?? [];

        return view('livewire.index', [
            'projectList' => Project::all(),
            'projectRunningList' => array_map(
                fn ($projectRunning) =>
                $projectRunning['project'] ?? null,
                $projectRunningList
            ),
        ]);
    }
}
