<div>
    <x-project.list :list="$projectList" :runningList="$projectRunningList" />

    <x-ui.button_link :url="route('project.edit')" :label="__('Add a project')" />
</div>
