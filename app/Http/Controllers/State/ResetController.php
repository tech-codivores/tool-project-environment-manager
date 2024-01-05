<?php

namespace App\Http\Controllers\State;

use App\Actions\State\ResetAction as StateResetAction;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\RedirectResponse;

class ResetController extends BaseController
{
    public function __invoke(StateResetAction $stateResetAction): RedirectResponse
    {
        $stateResetAction->run();

        return redirect()
            ->route('index');
    }
}
