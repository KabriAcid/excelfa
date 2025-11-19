<?php

namespace App\Livewire\Admin;

use App\Models\Enrollment;
use App\Models\ContactInquiry;
use App\Models\GalleryImage;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Carbon\Carbon;

#[Layout('layouts.dashboard')]
class DashboardHome extends Component
{
    public function render()
    {
        // Get stats
        $totalEnrollments = Enrollment::count();
        $totalInquiries = ContactInquiry::count();
        $totalGalleryImages = GalleryImage::count();
        $newEnrollmentsToday = Enrollment::whereDate('created_at', Carbon::today())->count();

        // Get recent enrollments
        $recentEnrollments = Enrollment::latest()
            ->take(5)
            ->get();

        // Get recent inquiries
        $recentInquiries = ContactInquiry::latest()
            ->take(5)
            ->get();

        // Get enrollments by month for chart (last 6 months)
        $enrollmentsByMonth = Enrollment::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Get inquiry status counts for pie chart
        $inquiryStatusCounts = ContactInquiry::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        return view('livewire.admin.dashboard-home', [
            'totalEnrollments' => $totalEnrollments,
            'totalInquiries' => $totalInquiries,
            'totalGalleryImages' => $totalGalleryImages,
            'newEnrollmentsToday' => $newEnrollmentsToday,
            'recentEnrollments' => $recentEnrollments,
            'recentInquiries' => $recentInquiries,
            'enrollmentsByMonth' => $enrollmentsByMonth,
            'inquiryStatusCounts' => $inquiryStatusCounts,
        ]);
    }
}
