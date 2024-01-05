<?php

namespace App\Actions\State\Running;

use App\Models\State;

class ProjectUpdatedAction
{
    public function run(string $action, string $projectSlug): void
    {
        $stateRunning = State::get('running');

        if ($stateRunning === null) {
            $stateRunning = [];
        }

        if ($action === 'start') {
            $stateRunning[] = [
                'project' => $projectSlug,
                'launched_at' => now(),
            ];
        } elseif ($action === 'stop') {
            $stateRunning = collect($stateRunning)
                ->filter(function ($projectRunning) use ($projectSlug) {
                    return ($projectRunning['project'] ?? '') !== $projectSlug;
                })
                ->values()
                ->toArray();
        }

        State::set('running', $stateRunning);
    }
}
