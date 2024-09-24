<x-app-layout page_title="Dashboard">
    <x-admin.navigation>
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Revenue Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Revenue</h2>
                    <p class="mt-4 text-gray-600">$15,230</p>
                </div>

                <!-- New Users Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">New Users</h2>
                    <p class="mt-4 text-gray-600">1,200</p>
                </div>

                <!-- Performance Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Performance</h2>
                    <p class="mt-4 text-gray-600">82%</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Line Chart Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Monthly Revenue</h2>
                    <div class="relative h-64" x-data="{ expanded: false }">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>

                <!-- Bar Chart Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">User Signups</h2>
                    <div class="relative h-64">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Pie Chart and Table Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Pie Chart Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Traffic Sources</h2>
                    <div class="relative h-64">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Latest Transactions</h2>
                    <div class="overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">User</th>
                                <th class="py-2 px-4 text-left">Amount</th>
                                <th class="py-2 px-4 text-left">Status</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600">
                            <tr>
                                <td class="py-2 px-4">#1234</td>
                                <td class="py-2 px-4">John Doe</td>
                                <td class="py-2 px-4">$120</td>
                                <td class="py-2 px-4">Completed</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4">#1235</td>
                                <td class="py-2 px-4">Jane Smith</td>
                                <td class="py-2 px-4">$340</td>
                                <td class="py-2 px-4">Pending</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4">#1236</td>
                                <td class="py-2 px-4">Sam Lee</td>
                                <td class="py-2 px-4">$240</td>
                                <td class="py-2 px-4">Failed</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <script>
            // Line Chart
            const lineChart = new Chart(document.getElementById('lineChart'), {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 15000, 13000, 17000, 19000, 21000],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Bar Chart
            const barChart = new Chart(document.getElementById('barChart'), {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'New Users',
                        data: [300, 450, 320, 600, 800, 720],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Pie Chart
            const pieChart = new Chart(document.getElementById('pieChart'), {
                type: 'pie',
                data: {
                    labels: ['Organic Search', 'Social Media', 'Email Marketing', 'Referral'],
                    datasets: [{
                        label: 'Traffic Sources',
                        data: [55, 25, 10, 10],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        </script>


    </x-admin.navigation>

</x-app-layout>
