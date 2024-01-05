<?php

namespace App\Livewire;

use App\Actions\Command\DockerRunningCheckAction as CommandDockerRunningCheckAction;
use App\Models\Project;
use App\Models\State;
use Livewire\Component;

class Index extends Component
{
    public bool $isDockerRunning = false;

    public function mount(CommandDockerRunningCheckAction $commandDockerRunningCheckAction)
    {
        $this->isDockerRunning = $commandDockerRunningCheckAction->run();
    }

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
