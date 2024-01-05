<div>
    <x-stack.list :list="$stackList" />

    <x-ui.button_link :url="route('stack.edit')" :label="__('Add a stack')" />
</div>
