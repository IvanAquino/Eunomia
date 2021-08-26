<div>

    <div class="table-responsive">
        <table class="table table-borderless table-striped">
            <thead>
                <tr>
                    <th>{{ __('panel.general.id') }}</th>
                    <th>{{ __('panel.general.code') }}</th>
                    <th>{{ __('panel.general.name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td scope="row">{{ $project->id }}</td>
                    <td>{{ $project->code }}</td>
                    <td>{{ $project->name }}</td>
                    <td class="text-right">
                        <x-secondary-button-link
                            route="projects.details"
                            :routeParams="['project' => $project->id]"
                            label="panel.general.backlog"
                        />

                        <x-secondary-button-link
                            route="projects.edit"
                            :routeParams="['project' => $project->id]"
                            label="panel.projects.edit_project"
                        />

                        <x-adminlte-button
                            label="{{ __('panel.projects.delete_project') }}"
                            class="btn-sm"
                            theme="danger"
                            wire:click="askIfWantToDeleteProject({{ $project->id }})"
                        />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $projects->links() !!}

</div>
