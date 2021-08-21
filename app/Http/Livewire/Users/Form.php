<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public $model;
    public $user = [
        'name'      => '',
        'last_name' => '',
        'email'     => '',
        'password'  => '',
    ];
    public $role;

    public function saveUser()
    {
        $this->validate();

        if (!$this->model) {
            $user_data = $this->user;
            $user_data['password'] = bcrypt($this->user['password']);
            $user = User::create($user_data);
            $user->attachRole($this->role);
        } else {
            $user_data = [
                'name' => $this->user['name'],
                'last_name' => $this->user['last_name'],
                'email' => $this->user['email'],
            ];
            if ($this->user['password']) {
                $user_data['password'] = bcrypt($this->user['password']);
            }
            $this->model->detachRoles($this->model->roles);
            $this->model->update($user_data);
            $this->model->attachRole($this->role);
        }

        $this->flash('success', __('panel.users.user_saved'));
        redirect()->route('users.home');
    }

    protected function rules()
    {
        $rules = [
            'user.name'     => 'required',
            'user.email'    => 'required|email',
            'role'          => 'required',
        ];

        if (!$this->model) {
            $rules['password'] = 'required';
        }

        return $rules;
    }

    public function mount()
    {
        $this->user['name']      = $this->model->name;
        $this->user['last_name'] = $this->model->last_name;
        $this->user['email']     = $this->model->email;
        $role = $this->model->roles->first();
        if ($role) {
            $this->role = $role->name;
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        $roles = Role::all();

        return view('livewire.users.form', [
            'roles' => $roles,
        ]);
    }
}
