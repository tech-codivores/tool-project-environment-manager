<div class="p-3">
    <form wire:submit="submit">
        <x-ui.form.input_text name="name" label="{{ __('Name') }}" placeholder="{{ __('My New Project') }}"
            wire:model="name" />

        <x-ui.form.input_path name="path" label="{{ __('Path') }}" placeholder="{{ __('./') }}"
            wire:model="path" />

        <x-ui.form.input_select name="stack" label="{{ __('Stack') }}" :options="$typeOptionList" wire:model.live="stack" />

        @if ($stack === 'standard')
            <x-ui.form.input_select name="stack_standard" label="{{ __('Standard') }}" :options="$optionlist"
                wire:model="stack_standard" />
        @elseif ($stack === 'dedicated')
            <x-ui.form.input_path name="stack_dedicated_path" label="{{ __('Docker Compose configuration file path') }}"
                placeholder="{{ __('./') }}" wire:model="stack_dedicated_path" />
        @endif

        <x-ui.form.input_submit label="{{ __(ucfirst($mode)) }}" />

        @if ($mode === 'update')
            <x-ui.form.input_delete label="{{ __('Delete') }}" wire:click="delete" />
        @endif
    </form>
</div>
