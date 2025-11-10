<div>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8 animate-fade-in">
        <x-dashboard.stat-card
            icon="clipboard"
            title="Total Enrollments"
            :value="$totalEnrollments"
            trend="up"
            trendValue="12%" />

        <x-dashboard.stat-card
            icon="mail"
            title="Total Inquiries"
            :value="$totalInquiries"
            trend="up"
            trendValue="8%" />

        <x-dashboard.stat-card
            icon="images"
            title="Gallery Images"
            :value="$totalGalleryImages"
            trend="up"
            trendValue="5%" />

        <x-dashboard.stat-card
            icon="users"
            title="New Today"
            :value="$newEnrollmentsToday"
            trend="up"
            trendValue="0%" />
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Enrollments Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Enrollments Overview</h3>
            <div class="h-64 flex items-center justify-center text-gray-500 dark:text-gray-400">
                <canvas id="enrollmentsChart"></canvas>
            </div>
        </div>

        <!-- Inquiry Status Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Inquiry Status</h3>
            <div class="h-64 flex items-center justify-center text-gray-500 dark:text-gray-400">
                <canvas id="inquiryStatusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Enrollments -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Enrollments</h3>
                <a href="{{ route('admin.enrollments') }}" class="text-sm font-medium text-primary hover:text-primary/80">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Student</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Program</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($recentEnrollments as $enrollment)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $enrollment->student_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $enrollment->program_type }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $enrollment->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                No enrollments yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-premium border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Inquiries</h3>
                <a href="{{ route('admin.inquiries') }}" class="text-sm font-medium text-primary hover:text-primary/80">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($recentInquiries as $inquiry)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $inquiry->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-dashboard.status-badge :status="$inquiry->status" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $inquiry->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                No inquiries yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Enrollments Line Chart
        const enrollmentsCtx = document.getElementById('enrollmentsChart');
        new Chart(enrollmentsCtx, {
            type: 'line',
            data: {
                labels: @json($enrollmentsByMonth - > pluck('month')),
                datasets: [{
                    label: 'Enrollments',
                    data: @json($enrollmentsByMonth - > pluck('count')),
                    borderColor: 'hsl(217, 85%, 52%)',
                    backgroundColor: 'hsla(217, 85%, 52%, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Inquiry Status Pie Chart
        const inquiryStatusCtx = document.getElementById('inquiryStatusChart');
        new Chart(inquiryStatusCtx, {
            type: 'pie',
            data: {
                labels: @json($inquiryStatusCounts - > pluck('status')),
                datasets: [{
                    data: @json($inquiryStatusCounts - > pluck('count')),
                    backgroundColor: [
                        'hsl(217, 85%, 52%)',
                        'hsl(24, 90%, 50%)',
                        'hsl(142, 71%, 45%)',
                        'hsl(0, 84%, 60%)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    @endpush
</div>