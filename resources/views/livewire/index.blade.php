<div>
    @if (!$isDockerRunning)
        <x-ui.alert :text="__('Docker is not running')" />
    @endif

    <x-project.list :list="$projectList" :runningList="$projectRunningList" :isDockerRunning="$isDockerRunning" />

    <x-ui.button_link :url="route('project.edit')" :label="__('Add a project')" />
</div>
