<?php

namespace App\Actions\Command;

use Illuminate\Support\Str;

class BaseAction
{
    protected function commandPrefix(): string
    {
        if (Str::lower(PHP_OS_FAMILY) === 'darwin') {
            return '/usr/local/bin/';
        }

        return '';
    }
}
