<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Bookings
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

<div class="p-6 font-montaga bg-gray-50 min-h-screen text-gray-800">

    <h1 class="text-3xl font-bold mb-6 text-gray-900">
        Bookings
    </h1>

    <div class="bg-white rounded-xl shadow-sm p-8 min-h-[500px]">
                
        <h2 class="text-2xl font-bold mb-6 text-gray-800 font-serif-custom">
            <?php if($current_filter == 'pending'): ?>
                Upcoming Bookings (Pending)
            <?php elseif($current_filter == 'canceled'): ?>
                Canceled Bookings
            <?php else: ?>
                Finished Bookings (History)
            <?php endif; ?>
        </h2>

        <!-- Search Bar Form -->
        <form action="" method="get" class="mb-6 relative">
            
            <input type="hidden" name="filter" value="<?= esc($current_filter) ?>">
            
            <button type="submit" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none">
                <i class="ph ph-magnifying-glass text-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </i>
            </button>

            <input type="text" name="search" value="<?= esc($keyword ?? '') ?>" placeholder="Search client name, email, or service..." 
                class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#C59D5F] text-gray-600">
        </form>

        <!-- FILTER BUTTONS -->
        <div class="flex gap-4 mb-6 border-b border-gray-100 pb-4 flex-wrap">
            
            <?php $searchParam = $keyword ? '&search='.esc($keyword) : ''; ?>

            <!-- PERBAIKAN: Menggunakan link relatif (?) agar otomatis tetap di halaman ini -->
            <a href="?filter=pending<?= $searchParam ?>" 
               class="px-5 py-2 rounded-md text-sm font-bold shadow-sm transition 
               <?= $current_filter == 'pending' ? 'bg-kdeux-gold text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
                Upcoming Bookings
            </a>

            <a href="?filter=completed<?= $searchParam ?>" 
               class="px-5 py-2 rounded-md text-sm font-bold shadow-sm transition 
               <?= $current_filter == 'completed' ? 'bg-kdeux-gold text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
                Finished Bookings
            </a>

            <a href="?filter=canceled<?= $searchParam ?>" 
               class="px-5 py-2 rounded-md text-sm font-bold shadow-sm transition 
               <?= $current_filter == 'canceled' ? 'bg-kdeux-gold text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?>">
                Canceled Bookings
            </a>

        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border-collapse">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100 text-xs font-bold uppercase tracking-wider">
                        <th class="py-4 px-4 pl-0">Client Name</th> 
                        <th class="py-4 px-4">Service</th>
                        <th class="py-4 px-4">Date</th>
                        <th class="py-4 px-4">Start Time</th>
                        <th class="py-4 px-4">Harga</th>
                        <th class="py-4 px-4 text-center">Status / Actions</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-gray-600">

                    <?php if(empty($bookings)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-400 italic">
                                <?php if($keyword): ?>
                                    Tidak ditemukan data untuk pencarian: "<strong><?= esc($keyword) ?></strong>" pada status <?= esc(ucfirst($current_filter)) ?>.
                                <?php else: ?>
                                    Tidak ada data booking dengan status: <strong><?= esc(ucfirst($current_filter)) ?></strong>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php else: ?>
                    
                    <?php foreach ($bookings as $b): ?>
                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition">

                        <td class="py-5 px-4 pl-0">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-300 flex-shrink-0 overflow-hidden">
                                    <svg class="w-full h-full text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-700 text-base">
                                        <?= esc($b['name']) ?>
                                    </span>
                                    <span class="text-xs text-gray-400"><?= esc($b['email']) ?></span>
                                </div>
                            </div>
                        </td>
                    
                        <td class="py-5 px-4 font-medium text-gray-500">
                            <?= esc($b['service_list']) ?>
                        </td>
                    
                        <td class="py-5 px-4 text-gray-500">
                            <?= date('d M Y', strtotime($b['created_at'])) ?>
                        </td>
                    
                        <td class="py-5 px-4 text-gray-500">
                            <?= esc($b['time']) ?>
                        </td>
                    
                        <td class="py-5 px-4 font-bold text-gray-700">
                            Rp <?= number_format($b['total_price'], 0, ',', '.') ?>
                        </td>
                    
                        <td class="py-5 px-4">
                            <div class="flex justify-center gap-2">

                                <?php 
                                    // PENTING: Susun parameter redirect agar tidak kembali ke dashboard default
                                    $redirectParams = '?filter=' . esc($current_filter);
                                    if (!empty($keyword)) {
                                        $redirectParams .= '&search=' . esc($keyword);
                                    }
                                ?>

                                <?php if($b['status'] == 'pending'): ?>
                                    <a href="<?= base_url('admin/booking/update/'.$b['booking_id'].'/completed') . $redirectParams ?>" 
                                       class="btn-soft-green px-4 py-1.5 rounded-md font-bold text-xs shadow-sm border border-green-200">
                                        Complete
                                    </a>
                                    <a href="<?= base_url('admin/booking/update/'.$b['booking_id'].'/canceled') . $redirectParams ?>" 
                                       onclick="return confirm('Yakin ingin cancel booking ini?')"
                                       class="btn-soft-red px-4 py-1.5 rounded-md font-bold text-xs shadow-sm border border-red-200">
                                        Cancel
                                    </a>
                                <?php elseif($b['status'] == 'completed'): ?>
                                    <span class="text-green-600 font-bold text-xs bg-green-50 px-3 py-1.5 rounded-md border border-green-100 flex items-center gap-1">
                                        <i class="ph-fill ph-check-circle"></i> Selesai
                                    </span>
                                <?php else: ?>
                                    <span class="text-red-500 font-bold text-xs bg-red-50 px-3 py-1.5 rounded-md border border-red-100 flex items-center gap-1">
                                        <i class="ph-fill ph-x-circle"></i> Dibatalkan
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

<?= $this->endSection() ?>