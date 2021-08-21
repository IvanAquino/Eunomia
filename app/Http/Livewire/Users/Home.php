<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deleteUsersConfirmed',
        'deleteUsersCancelled',
    ];
    
    public $user_id;

    public function askIfWantToDeleteUser($id)
    {
        $this->user_id = $id;
        $this->confirm(__('panel.users.ask_delete_user'), [
            'onConfirmed' => 'deleteUsersConfirmed',
            'onCancelled' => 'deleteUsersCancelled',
        ]);
    }
    public function deleteUsersConfirmed()
    {
        $user = User::find($this->user_id);
        if ($user) {
            $user->detachRoles($user->roles);
            $user->delete();
            $this->alert('success', __('panel.users.user_deleted_success'));
        }

        $this->user_id = null;
        $this->resetPage();
    }
    public function deleteUsersCancelled()
    {
        $this->user_id = null;
    }

    public function render()
    {
        $users = User::paginate(15);

        return view('livewire.users.home', [
            'users' => $users,
        ]);
    }
}
