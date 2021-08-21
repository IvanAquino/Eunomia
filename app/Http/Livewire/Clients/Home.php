<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deleteClientsConfirmed',
        'deleteClientsCancelled',
    ];

    public $client_id;

    public function askIfWantToDeleteClient($id)
    {
        $this->client_id = $id;
        $this->confirm(__('panel.clients.ask_delete_client'), [
            'onConfirmed' => 'deleteClientsConfirmed',
            'onCancelled' => 'deleteClientsCancelled',
        ]);
    }
    
    public function deleteClientsConfirmed() {
        $client = Client::find($this->client_id);
        if ($client) {
            $client->delete();
            $this->alert('success', __('panel.clients.client_deleted_success'));
        }
        $this->client_id = null;
        $this->resetPage();
    }

    public function deleteClientsCancelled() {
        $this->client_id = null;
    }

    public function render()
    {
        $clients = Client::paginate(15);

        return view('livewire.clients.home', [
            'clients' => $clients,
        ]);
    }
}
