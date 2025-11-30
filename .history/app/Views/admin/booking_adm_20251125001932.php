<?= $this->extend('layout_admin/sidebar') ?>
<?= $this->section('page_title') ?>
BOOKING
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="p-6">

    <!-- Judul Halaman -->
    <h1 class="text-3xl font-semibold mb-6" style="font-family: 'Playfair Display', serif;">
        Bookings
    </h1>

    <!-- CARD WRAPPER -->
    <div class="bg-white shadow-md rounded-xl p-6">

        <!-- TITLE -->
        <h2 class="text-2xl font-semibold mb-4" style="font-family: 'Playfair Display', serif;">
            All Bookings
        </h2>

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" placeholder="Search"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300">
        </div>

        <!-- Tabs -->
        <div class="flex gap-3 mb-6">
            <button class="px-4 py-2 bg-[#B8860B] text-white rounded-md">Upcoming Bookings</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">Canceled Bookings</button>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-3 px-2">Nama Client</th>
                        <th class="py-3 px-2">Service</th>
                        <th class="py-3 px-2">Tanggal</th>
                        <th class="py-3 px-2">Start Time</th>
                        <th class="py-3 px-2">Harga</th>
                        <th class="py-3 px-2">Actions</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                    <?php foreach ($bookings as $b): ?>
                    <tr class="border-b">
                        <td class="py-3 px-2 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-gray-300"></span>
                            <?= esc($b['client_name']) ?>
                        </td>

                        <td class="py-3 px-2"><?= esc($b['service']) ?></td>
                        <td class="py-3 px-2"><?= esc($b['tanggal']) ?></td>
                        <td class="py-3 px-2"><?= esc($b['start_time']) ?></td>

                        <!-- HARGA -->
                        <td class="py-3 px-2">
                            Rp <?= number_format($b['harga'], 0, ',', '.') ?>
                        </td>

                        <td class="py-3 px-2">
                            <?php if ($b['status'] == 'complete'): ?>
                                <span class="px-3 py-1 bg-green-200 text-green-700 rounded-full text-sm">Complete</span>
                            <?php elseif ($b['status'] == 'canceled'): ?>
                                <span class="px-3 py-1 bg-red-200 text-red-700 rounded-full text-sm">Canceled</span>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-yellow-200 text-yellow-700 rounded-full text-sm">Pending</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<?= $this->endSection() ?>