<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to the Admin Dashboard
        </h2>
    </x-slot>
    

    <div class="py-12">
        <!-- <div class="row admin-content">
            <div class="col">
                <div class="dashboard-card">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            @if ($newMembersCount > 0)
                                <div class="alert alert-info">
                                    You have {{ $newMembersCount }} new {{ Str::plural('member', $newMembersCount) }} waiting for approval.
                                    <a href="{{ route('admin.new-members') }}" class="btn btn-sm btn-primary">View New Members</a>
                                </div>
                            @else
                                <div class="alert alert-success">
                                    No new members pending approval.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row mt-5 graph-container">
            <!-- Gender Overview -->
            <div class="ccol-md-4 col-sm-4 ">
                <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">Gender Overview</h6></div>
                        <div class="card-body">
                        <canvas id="genderChart" width="220" height="160" style="float:left;"></canvas>
                        <div class="mt-4 text-center chart-details">
                            <p><strong>Male:</strong> {{ $maleMembers }}</p>
                            <p><strong>Female:</strong> {{ $femaleMembers }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Overview -->
            <div class="col-md-4 col-sm-4 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">Status Overview</h6></div>
                    <div class="card-body">
                    <canvas id="statusChart" width="220" height="160" style="float:left;"></canvas>
                    <div class="mt-4 text-center chart-details">
                            <p><strong>Active:</strong> {{ $activeMembers }}</p>
                            <p><strong>Inactive:</strong> {{ $inactiveMembers }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gender Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [{{ $maleMembers }}, {{ $femaleMembers }}],
                    backgroundColor: ['#1cc88a', '#36b9cc'],
                }]
            },
            options: {
                // responsive: true,
                responsive: false, // Disable responsiveness
                maintainAspectRatio: false, // Allow custom width and height
                plugins: {
                    legend: {
                        position: 'right',
                    },
                }
            }
        });

        // Status Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Inactive'],
                datasets: [{
                    label: 'Status Distribution',
                    data: [{{ $activeMembers }}, {{ $inactiveMembers }}],
                    backgroundColor: ['#1cc88a', '#e74a3b'],
                }]
            },
            options: {
                // responsive: true,
                responsive: false, // Disable responsiveness
                maintainAspectRatio: false, // Allow custom width and height
                plugins: {
                    legend: {
                        position: 'right',
                    },
                }
            }
        });
    </script>
</x-admin-layout>
