<div>
    
    <div class="table-responsive">
        <table class="table table-borderless table-striped">
            <thead>
                <tr>
                    <th>{{ __('panel.general.id') }}</th>
                    <th>{{ __('panel.general.name') }}</th>
                    <th>{{ __('panel.general.email') }}</th>
                    <th>{{ __('panel.general.phone_number') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td scope="row">{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td class="text-right">
                        <x-secondary-button-link
                            route="clients.edit"
                            :routeParams="['client' => $client->id]"
                            label="panel.clients.edit_client"
                        />

                        <x-adminlte-button
                            label="{{ __('panel.clients.delete_client') }}"
                            class="btn-sm"
                            theme="danger"
                            wire:click="askIfWantToDeleteClient({{ $client->id }})"
                        />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
