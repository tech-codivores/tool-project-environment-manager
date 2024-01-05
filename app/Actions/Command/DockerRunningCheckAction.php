<?php

namespace App\Actions\Command;

use Illuminate\Support\Facades\Process;

class DockerRunningCheckAction extends BaseAction
{
    public function run(): bool
    {
        $result = Process::run($this->commandPrefix() . 'docker info');

        return $result->successful();
    }
}
