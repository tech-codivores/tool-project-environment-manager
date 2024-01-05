<?php

namespace App\Actions\Command;

class DockerComposeCommandAction
{
    public function run(string $action = null): string
    {
        return 'docker compose'
            . match ($action) {
                'start' => ' up -d',
                'stop' => ' down',
                default => '',
            };
    }
}
