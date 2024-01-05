<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Stack;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Native\Laravel\Dialog;
use Native\Laravel\Facades\MenuBar;

class Edit extends Component
{
    public ?array $item = null;

    #[Rule(['required', 'string', 'min:2'])]
    public string $name;

    #[Rule(['required', 'string', 'min:2'])]
    public string $stack = 'dedicated';

    #[Rule(['required', 'string', 'min:2'])]
    public ?string $path;

    #[Rule(['required_if:stack,standard'])]
    public ?string $stack_standard = null;

    #[Rule(['required_if:stack,dedicated'])]
    public ?string $stack_dedicated_path = null;

    public function mount($slug = null)
    {
        if ($slug !== null) {
            $this->item = Project::find($slug);

            if ($this->item !== null) {
                $this->name = $this->item['name'] ?? '';
                $this->stack = $this->item['stack'] ?? '';
                $this->path = $this->item['path'] ?? null;
                $this->stack_standard = $this->item['stack_standard'] ?? null;
                $this->stack_dedicated_path = $this->item['stack_dedicated_path'] ?? null;
            }
        }
    }

    public function submit(): void
    {
        $this->validate();

        $input = $this->only([
            'name',
            'stack',
            'path',

            'stack_standard',
            'stack_dedicated_path',
        ]);

        $input['slug'] = Str::slug($input['name']);

        if ($this->item === null) {
            if (Project::create($input)) {
                $this->redirectRoute('index');
            }
        } else {
            if (Project::update($this->item['slug'], $input)) {
                $this->redirectRoute('index');
            }
        }
    }

    public function delete(): void
    {
        if (Project::delete($this->item['slug'])) {
            $this->redirectRoute('index');
        }
    }

    public function onPathClick(string $attribute)
    {
        $this->$attribute = Dialog::new()
            ->folders()
            ->withHiddenFiles()
            ->dontResolveSymlinks()
            ->open();

        // sleep(1);
        usleep(300000);
        MenuBar::show();
    }

    public function render()
    {
        return view('livewire.project.edit', [
            'mode' => $this->item === null ? 'create' : 'update',
            'typeOptionList' => Stack::typeOptionList(),
            'optionlist' => Stack::optionlist(with_empty_value: true),
        ]);
    }
}
