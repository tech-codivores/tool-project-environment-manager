<?php

namespace App\Livewire\Command;

use App\Actions\Command\DockerComposeCommandAction as CommandDockerComposeCommandAction;
use App\Actions\Command\EnvFromProjectComputeAction as CommandEnvFromProjectComputeAction;
use App\Actions\Command\PathFromProjectComputeAction as CommandPathFromProjectComputeAction;
use App\Actions\State\Running\ProjectUpdatedAction as StateRunningProjectUpdatedAction;
use App\Integrations\AnsiToHtml\Theme;
use App\Models\Project;
use Illuminate\Support\Facades\Process;
use Livewire\Attributes\On;
use Livewire\Component;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;

class ProjectProcess extends Component
{
    public $output = '';
    public $content = '';
    public $show = false;

    #[On('command-execute')]
    public function execute($action, $slug = null)
    {
        $project = Project::find($slug);

        abort_if($project === null, 404);

        $path = (new CommandPathFromProjectComputeAction())->run($project);
        $env = (new CommandEnvFromProjectComputeAction())->run($project);

        if ($path === null) {
            return redirect()
                ->route('index');
        }

        $this->show = true;

        $result = Process::path($path)
            ->env($env)
            ->run(
                (new CommandDockerComposeCommandAction())->run($action),
                function (string $type, string $output) {
                    $this->dispatch('command-output-content', output: $output);
                }
            );

        if ($result->successful()) {
            (new StateRunningProjectUpdatedAction())->run($action, $slug);
        }
    }

    #[On('command-output-content')]
    public function handleOutput($output = null)
    {
        if ($output !== null) {
            $this->output .= $output;
            $this->content = (new AnsiToHtmlConverter(new Theme()))->convert($this->output);
        }
    }

    #[On('command-output-close')]
    public function close()
    {
        $this->output = '';
        $this->content = '';
        $this->show = false;

        return redirect()
            ->route('index');
    }

    public function render()
    {
        return view('livewire.command.project_process');
    }
}
