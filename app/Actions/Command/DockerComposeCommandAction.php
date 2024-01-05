<?php

namespace App\Actions\Command;

class DockerComposeCommandAction extends BaseAction
{
    public function run(string $action = null): string
    {
        return $this->commandPrefix()
            . 'docker compose'
            . match ($action) {
                'start' => ' up -d',
                'stop' => ' down',
                default => '',
            };
    }
}
