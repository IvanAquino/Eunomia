<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;

class Form extends Component
{

    public $model;
    public $client = [
        'name' => '',
        'email' => '',
        'phone_number' => '',
    ];

    protected function rules()
    {
        $rules = [
            'client.name' => 'required',
        ];
        if ($this->client['email']) {
            $rules['client.email'] = 'email';
        }

        return $rules;
    }

    public function mount()
    {
        if ($this->model) {
            $this->client = [
                'name'         => $this->model->name,
                'email'        => $this->model->email,
                'phone_number' => $this->model->phone_number,
            ];
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function saveClient()
    {
        $this->validate();

        if (!$this->model) {
            Client::create($this->client);
        } else {
            $this->model->update($this->client);
        }

        $this->flash('success', __('panel.clients.client_saved'));
        redirect()->route('clients.home');
    }

    public function render()
    {
        return view('livewire.clients.form');
    }
}
