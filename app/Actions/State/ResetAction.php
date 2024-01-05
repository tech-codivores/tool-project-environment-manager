<?php

namespace App\Actions\State;

use App\Models\State;

class ResetAction
{
    public function run(): void
    {
        State::reset();
    }
}
