<?php

namespace App\Actions\Command;

use App\Models\Stack;
use Illuminate\Support\Str;

class EnvFromProjectComputeAction
{
    public function run(array $project): array
    {
        $env = [];

        if ($project['stack'] === 'standard') {
            $stack = Stack::find(($project['stack_standard'] ?? null), true);

            if ($stack !== null) {
                $env['APP_CODE_PATH_HOST'] = $project['path'];
                $env['DATA_PATH_HOST'] = Str::finish($project['path'], DIRECTORY_SEPARATOR) . '..' . DIRECTORY_SEPARATOR . 'data';
            }
        }

        return $env;
    }
}
