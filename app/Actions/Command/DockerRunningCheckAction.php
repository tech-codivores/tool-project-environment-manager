<?php

namespace App\Actions\Command;

use Illuminate\Support\Facades\Process;

class DockerRunningCheckAction
{
    public function run(): bool
    {
        $result = Process::run('docker info');

        return $result->successful();
    }
}
