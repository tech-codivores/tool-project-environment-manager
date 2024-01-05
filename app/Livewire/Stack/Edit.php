<?php

namespace App\Livewire\Stack;

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
    public ?string $path;

    public function mount($slug = null)
    {
        if ($slug !== null) {
            $this->item = Stack::find($slug);

            if ($this->item !== null) {
                $this->name = $this->item['name'] ?? '';
                $this->path = $this->item['path'] ?? null;
            }
        }
    }

    public function submit(): void
    {
        $this->validate();

        $input = $this->only([
            'name',
            'path',
        ]);

        $input['slug'] = Str::slug($input['name']);

        if ($this->item === null) {
            if (Stack::create($input)) {
                $this->redirectRoute('stack.index');
            }
        } else {
            if (Stack::update($this->item['slug'], $input)) {
                $this->redirectRoute('stack.index');
            }
        }
    }

    public function delete(): void
    {
        if (Stack::delete($this->item['slug'])) {
            $this->redirectRoute('stack.index');
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
        return view('livewire.stack.edit', [
            'mode' => $this->item === null ? 'create' : 'update',
        ]);
    }
}
