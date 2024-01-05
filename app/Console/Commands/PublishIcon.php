<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PublishIcon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:publish:icon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy project icon to NativePHP build directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pathFrom = storage_path('assets/icon.png');
        $pathTo = base_path('vendor/nativephp/electron/resources/js/build/icon.png');

        $this->info('Copy icon');
        $this->info('    from ' . $pathFrom);
        $this->info('    to ' . $pathTo);

        if (!copy(
            $pathFrom,
            $pathTo
        )) {
            $this->error('an error occured...');
        }
    }
}
