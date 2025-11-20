<?php

namespace App\Livewire\Admin;

use App\Models\Enrollment;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class Enrollments extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = 'all';
    public string $sortBy = 'created_at';
    public string $sortDirection = 'desc';

    protected $queryString = ['search', 'statusFilter', 'sortBy', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function setSortBy(string $column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function approveEnrollment(int $id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->approve();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Enrollment approved successfully!',
            ]);
        }
    }

    public function rejectEnrollment(int $id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->reject();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Enrollment rejected successfully!',
            ]);
        }
    }

    public function deleteEnrollment(int $id)
    {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->delete();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Enrollment deleted successfully!',
            ]);
        }
    }

    public function render()
    {
        $query = Enrollment::query();

        // Search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('surname', 'like', "%{$this->search}%");
            });
        }

        // Status filter
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        // Sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $enrollments = $query->paginate(10);
        $totalEnrollments = Enrollment::count();
        $pendingEnrollments = Enrollment::where('status', 'pending')->count();
        $approvedEnrollments = Enrollment::where('status', 'approved')->count();

        return view('livewire.admin.enrollments', [
            'enrollments' => $enrollments,
            'totalEnrollments' => $totalEnrollments,
            'pendingEnrollments' => $pendingEnrollments,
            'approvedEnrollments' => $approvedEnrollments,
        ]);
    }
}
