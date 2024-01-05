<div class="p-3">
    <form wire:submit="submit">
        <x-ui.form.input_text name="name" label="{{ __('Name') }}" placeholder="{{ __('My New Stack') }}"
            wire:model="name" />

        <x-ui.form.input_path name="path" label="{{ __('Docker Compose configuration file path') }}"
            placeholder="{{ __('./') }}" wire:model="path" />

        <x-ui.form.input_submit label="{{ __(ucfirst($mode)) }}" />

        @if ($mode === 'update')
            <x-ui.form.input_delete label="{{ __('Delete') }}" wire:click="delete" />
        @endif
    </form>
</div>
