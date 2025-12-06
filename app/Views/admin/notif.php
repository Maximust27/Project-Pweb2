<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Notifikasi
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-white p-6 shadow rounded-lg max-w-5xl mx-auto mt-6">
    <div class="mb-6">
        <h1 class="text-2xl font-serif text-gray-800">Pesanan Baru</h1>
    </div>

    <!-- Container List -->
    <div class="flex flex-col">
        <?php if (!empty($recentBookings) && is_array($recentBookings)) : ?>
            <?php foreach ($recentBookings as $booking) : ?>
                <!-- Item Notifikasi: Zebra Striping (Ganjil: Abu, Genap: Putih) -->
                <div class="flex items-center justify-between px-6 py-4 odd:bg-gray-200 even:bg-white transition hover:bg-gray-100">
                    
                    <div class="flex items-center gap-4">
                        <!-- Icon User (Warna Emas/Coklat) -->
                        <div class="text-[#B8860B]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Text Content Satu Baris -->
                        <p class="text-gray-900 text-lg">
                            <?= esc($booking['client_name'] ?? $booking['name'] ?? 'Pelanggan') ?> memesan <?= esc($booking['service'] ?? 'Layanan') ?> ke anda
                        </p>
                    </div>
                    
                    <!-- Badge Notification (Merah) -->
                    <div class="flex-shrink-0 ml-4">
                        <span class="flex items-center justify-center w-8 h-8 bg-[#B91C1C] text-white font-medium rounded-full shadow-sm">
                            1
                        </span>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-10 bg-gray-50">
                <p class="text-gray-500 text-lg">Belum ada pesanan baru.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>