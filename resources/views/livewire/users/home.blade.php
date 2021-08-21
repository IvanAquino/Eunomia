<div>

    <div class="table-responsive">
        <table class="table table-borderless table-striped">
            <thead>
                <tr>
                    <th>{{ __('panel.general.id') }}</th>
                    <th>{{ __('panel.general.name') }}</th>
                    <th>{{ __('panel.general.last_name') }}</th>
                    <th>{{ __('panel.general.email') }}</th>
                    <th>{{ __('panel.roles.role') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->first()->display_name }}</td>
                    <td class="text-right">
                        <x-secondary-button-link
                            route="users.edit"
                            :routeParams="['user' => $user->id]"
                            label="panel.users.edit_user"
                        />
                        <x-adminlte-button
                            label="{{ __('panel.users.delete_user') }}"
                            class="btn-sm"
                            theme="danger"
                            wire:click="askIfWantToDeleteUser({{ $user->id }})"
                        />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $users->links() !!}

</div>
