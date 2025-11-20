<?php

namespace App\Livewire\Admin;

use App\Models\ContactInquiry;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class Inquiries extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = 'all';

    protected $queryString = ['search', 'statusFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function markAsRead(int $id)
    {
        $inquiry = ContactInquiry::find($id);
        if ($inquiry && $inquiry->status === ContactInquiry::STATUS_NEW) {
            $inquiry->markAsViewed();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Marked as read!',
            ]);
        }
    }

    public function markAsResponded(int $id)
    {
        $inquiry = ContactInquiry::find($id);
        if ($inquiry) {
            $inquiry->markAsResponded();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Marked as responded!',
            ]);
        }
    }

    public function deleteInquiry(int $id)
    {
        $inquiry = ContactInquiry::find($id);
        if ($inquiry) {
            $inquiry->delete();
            $this->dispatchBrowserEvent('toast', [
                'type' => 'success',
                'message' => 'Inquiry deleted successfully!',
            ]);
        }
    }

    public function render()
    {
        $query = ContactInquiry::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('full_name', 'like', "%{$this->search}%")
                    ->orWhere('subject', 'like', "%{$this->search}%");
            });
        }

        if ($this->statusFilter !== 'all') {
            if ($this->statusFilter === 'new') {
                $query->where('status', ContactInquiry::STATUS_NEW);
            } elseif ($this->statusFilter === 'read') {
                $query->where('status', ContactInquiry::STATUS_VIEWED);
            } elseif ($this->statusFilter === 'responded') {
                $query->where('status', ContactInquiry::STATUS_RESPONDED);
            }
        }

        $inquiries = $query->orderBy('created_at', 'desc')->paginate(10);
        $totalInquiries = ContactInquiry::count();
        $newInquiries = ContactInquiry::where('status', ContactInquiry::STATUS_NEW)->count();
        $respondedInquiries = ContactInquiry::where('status', ContactInquiry::STATUS_RESPONDED)->count();

        return view('livewire.admin.inquiries', [
            'inquiries' => $inquiries,
            'totalInquiries' => $totalInquiries,
            'newInquiries' => $newInquiries,
            'respondedInquiries' => $respondedInquiries,
        ]);
    }
}
