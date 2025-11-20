<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class Users extends Component
{
    use WithPagination;

    public string $search = '';
    public string $roleFilter = 'all';

    protected $queryString = ['search', 'roleFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }

    public function deleteUser(int $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'User deleted successfully!',
            ]);
        }
    }

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            });
        }

        if ($this->roleFilter !== 'all') {
            $query->where('role', $this->roleFilter);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();

        return view('livewire.admin.users', [
            'users' => $users,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
        ]);
    }
}
