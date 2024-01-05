<?php

namespace App\Actions\Command;

use App\Models\Stack;

class PathFromProjectComputeAction
{
    public function run(array $project): string | null
    {
        if ($project['stack'] === 'standard') {
            $stack = Stack::find(($project['stack_standard'] ?? null), true);

            if ($stack !== null) {
                return ($stack['path'] ?? null);
            }
        } elseif ($project['stack'] === 'dedicated') {
            return ($project['stack_dedicated_path'] ?? null);
        }

        return null;
    }
}
