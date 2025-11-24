<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('content') ?>

<!-- TOP CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    <!-- Total Clients -->
    <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-semibold text-gray-600">Total Clients</h3>
            <p class="text-5xl font-bold text-gray-800 mt-2">22</p>
        </div>
        <div class="text-7xl">👥</div>
    </div>

    <!-- Total Service -->
    <div class="bg-white shadow rounded-lg p-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-semibold text-gray-600">Total Service</h3>
            <p class="text-5xl font-bold text-gray-800 mt-2">12</p>
        </div>
        <div class="text-7xl">✂️</div>
    </div>

</div>

<!-- RECENT BOOKINGS -->
<div class="bg-white shadow rounded-lg p-6">

    <h3 class="text-lg font-semibold mb-4">Recent Bookings</h3>

    <!-- Search -->
    <div class="mb-4">
        <input type="text"
               class="w-full border rounded-lg px-4 py-2"
               placeholder="Search">
    </div>

    <!-- Tabs -->
    <div class="flex gap-4 mb-4">
        <button class="px-4 py-2 bg-yellow-600 text-white rounded-lg">Upcoming Bookings</button>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">Canceled Bookings</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Client Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Service</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Start Time</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">End Time</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <!-- Example Row -->
                <tr>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        Rocky Gerung
                    </td>
                    <td class="px-6 py-4">Classic Haircut</td>
                    <td class="px-6 py-4">2025-10-01</td>
                    <td class="px-6 py-4">10:00</td>
                    <td class="px-6 py-4">10:30</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-600 text-white px-3 py-1 rounded">Complete</button>
                        <button class="bg-red-300 text-red-700 px-3 py-1 rounded ml-2">Cancel</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        Rocky Gerung
                    </td>
                    <td class="px-6 py-4">Down Perm</td>
                    <td class="px-6 py-4">2025-10-06</td>
                    <td class="px-6 py-4">11:00</td>
                    <td class="px-6 py-4">11:15</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-600 text-white px-3 py-1 rounded">Complete</button>
                        <button class="bg-red-300 text-red-700 px-3 py-1 rounded ml-2">Cancel</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
                        Rocky Gerung
                    </td>
                    <td class="px-6 py-4">Premium Cut & Style</td>
                    <td class="px-6 py-4">2025-10-17</td>
                    <td class="px-6 py-4">12:00</td>
                    <td class="px-6 py-4">13:00</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-600 text-white px-3 py-1 rounded">Complete</button>
                        <button class="bg-red-300 text-red-700 px-3 py-1 rounded ml-2">Cancel</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
