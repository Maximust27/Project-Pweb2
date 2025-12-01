<?= $this->extend('layout_admin/sidebar') ?>
<?= $this->section('page_title') ?>
Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<style>
    /* Paksa Font Montaga sesuai request */
    .font-montaga { font-family: 'Montaga', serif; }

    /* Warna Emas Custom */
    .bg-kdeux-gold { background-color: #B8860B; }
    .text-kdeux-gold { color: #B8860B; }
    .border-kdeux-gold { border-color: #B8860B; }

    /* Tombol Action Soft (Mirip Screenshot Rocky Gerung) */
    .btn-soft-green {
        background-color: #dcfce7; /* Hijau muda pudar */
        color: #15803d; /* Hijau tua */
        transition: all 0.2s;
    }
    .btn-soft-green:hover { background-color: #bbf7d0; transform: translateY(-1px); }

    .btn-soft-red {
        background-color: #fee2e2; /* Merah muda pudar */
        color: #b91c1c; /* Merah tua */
        transition: all 0.2s;
    }
    .btn-soft-red:hover { background-color: #fecaca; transform: translateY(-1px); }
</style>

<main class="flex-1 flex flex-col overflow-hidden">
        <!-- SCROLLABLE CONTENT -->
        <div class="flex-1 overflow-y-auto p-10">
            
            <!-- 1. STATS CARDS SECTION -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                
                <!-- Card Total Clients -->
                <div class="bg-white p-8 rounded-xl shadow-sm flex items-center justify-between h-48">
                    <div class="flex flex-col justify-between h-full">
                        <h3 class="text-[#2d3748] text-2xl font-bold font-serif-custom">Total Clients</h3>
                        <div class="mt-4">
                            <!-- Icon 3 Orang Hitam -->
                            <i class="ph-fill ph-users-three text-6xl text-black"></i>
                        </div>
                    </div>
                    <!-- Angka Besar Serif -->
                    <div class="text-8xl font-serif-custom text-[#2d3748]">
                        <?= $stats['total_clients'] ?>
                    </div>
                </div>

                <!-- Card Total Service -->
                <div class="bg-white p-8 rounded-xl shadow-sm flex items-center justify-between h-48">
                    <div class="flex flex-col justify-between h-full">
                        <h3 class="text-[#2d3748] text-2xl font-bold font-serif-custom">Total Service</h3>
                        <div class="mt-4">
                            <!-- Icon Gunting Hitam -->
                            <i class="ph-fill ph-scissors text-6xl text-black"></i>
                        </div>
                    </div>
                    <!-- Angka Besar Serif -->
                    <div class="text-8xl font-serif-custom text-[#2d3748]">
                        <?= $stats['total_services'] ?>
                    </div>
                </div>
            </div>

            <!-- 2. RECENT BOOKINGS SECTION -->
            <div class="bg-white rounded-xl shadow-sm p-8 min-h-[500px]">
                
                <h2 class="text-2xl font-bold mb-6 text-gray-800 font-serif-custom">Recent Bookings</h2>

                <!-- Search Bar Full Width -->
                <div class="mb-6 relative">
                    <i class="ph ph-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </i>
                    <input type="text" placeholder="Search" 
                        class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#C59D5F] text-gray-600">
                </div>

                <div class="flex gap-4 mb-6 border-b border-gray-100 pb-4">
                    <button class="px-5 py-2 bg-kdeux-gold text-white rounded-md text-sm font-bold shadow-md hover:opacity-90 transition">
                        Upcoming Bookings
                    </button>
                    <button class="px-5 py-2 bg-gray-100 text-gray-600 rounded-md text-sm font-bold hover:bg-gray-200 transition">
                        Canceled Bookings
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto text-left border-collapse">
                        <thead>
                            <tr class="text-gray-400 border-b border-gray-100 text-xs font-bold uppercase tracking-wider">
                                <th class="py-4 px-4 pl-0">Client Name</th> <th class="py-4 px-4">Service</th>
                                <th class="py-4 px-4">Date</th>
                                <th class="py-4 px-4">Start Time</th>
                                <th class="py-4 px-4">Harga</th>
                                <th class="py-4 px-4 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-sm text-gray-600">

                            <?php if(empty($bookings)): ?>
                                <tr><td colspan="6" class="text-center py-10 text-gray-400 italic">Belum ada data booking.</td></tr>
                            <?php else: ?>
                            
                            <?php foreach ($bookings as $b): ?>
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">

                                <td class="py-5 px-4 pl-0">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gray-300 flex-shrink-0"></div>

                                        <span class="font-bold text-gray-500 text-base">
                                            <?= esc($b['name']) ?>
                                        </span>
                                    </div>
                                </td>
                            
                                <td class="py-5 px-4 font-medium text-gray-500">
                                    <?= esc($b['service_list']) ?>
                                </td>
                            
                                <td class="py-5 px-4 text-gray-500">
                                    <?= date('Y-m-d', strtotime($b['created_at'])) ?>
                                </td>
                            
                                <td class="py-5 px-4 text-gray-500">
                                    <?= esc($b['time']) ?>
                                </td>
                            
                                <td class="py-5 px-4 font-bold text-gray-700">
                                    Rp <?= number_format($b['total_price'], 0, ',', '.') ?>
                                </td>
                            
                                <td class="py-5 px-4">
                                    <div class="flex justify-center gap-2">

                                        <?php if($b['status'] == 'pending'): ?>

                                            <a href="<?= base_url('admin/booking/update/'.$b['booking_id'].'/completed') ?>" 
                                               class="btn-soft-green px-4 py-1.5 rounded-md font-bold text-xs">
                                                Complete
                                            </a>
                                        
                                            <a href="<?= base_url('admin/booking/update/'.$b['booking_id'].'/canceled') ?>" 
                                               onclick="return confirm('Yakin ingin cancel booking ini?')"
                                               class="btn-soft-red px-4 py-1.5 rounded-md font-bold text-xs">
                                                Cancel
                                            </a>
                                        
                                        <?php elseif($b['status'] == 'completed'): ?>
                                            <span class="text-green-600 font-bold text-xs bg-green-50 px-3 py-1 rounded-full border border-green-100">
                                                Selesai
                                            </span>
                                        <?php else: ?>
                                            <span class="text-red-500 font-bold text-xs bg-red-50 px-3 py-1 rounded-full border border-red-100">
                                                Dibatalkan
                                            </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </td>
                                        
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                                        
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

<?= $this->endSection() ?>