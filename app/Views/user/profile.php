<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - Pesanan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Playfair Display', serif;
    }
    /* Custom scrollbar untuk tabel agar rapi */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
  </style>
</head>

<body class="bg-[#1A1A1A] min-h-screen flex flex-col">

  <!-- Header (Asumsi header transparan/putih, kita sesuaikan wrapper) -->
  <div class="bg-white">
      <?= $this->include('user/header-user'); ?>
  </div>

  <!-- BAGIAN 1: PROFIL (Background Putih) -->
  <div class="bg-white w-full px-6 py-12 md:px-20 lg:py-16">
    <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16 max-w-6xl mx-auto">
        
        <!-- Tombol Back (Arrow) -->
        <a href="<?= base_url('/'); ?>" class="absolute top-24 left-6 md:top-32 md:left-10 text-gray-700 hover:text-[#B8860B] transition">
            <i class="fas fa-arrow-left text-2xl"></i>
        </a>

        <!-- Foto Profil (Bulat Besar) -->
        <div class="relative w-48 h-48 md:w-64 md:h-64 flex-shrink-0">
            <div class="w-full h-full rounded-full overflow-hidden bg-[#2C3E50] border-4 border-white shadow-xl">
                 <img id="previewImage" src="<?= isset($user['photo']) && $user['photo'] ? base_url('uploads/' . $user['photo']) : 'https://via.placeholder.com/150?text=No+Photo' ?>" 
                      class="w-full h-full object-cover">
            </div>
            <!-- Tombol Edit Foto (Hidden input) -->
            <label for="uploadPhoto" class="absolute bottom-4 right-4 bg-white text-gray-800 p-2 rounded-full shadow-lg cursor-pointer hover:bg-gray-100 transition">
                <i class="fas fa-camera"></i>
            </label>
            <input type="file" id="uploadPhoto" class="hidden" accept="image/*">
        </div>

        <!-- Info Profil Text -->
        <div class="flex-1 text-center md:text-left space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold text-[#B8860B] mb-6">Profile</h1>
            
            <div class="text-lg md:text-xl text-gray-800 space-y-3">
                <p>
                    <span class="inline-block w-32 md:w-40 font-medium">Nama :</span> 
                    <?= esc($user['name'] ?? '-') ?>
                </p>
                <p>
                    <span class="inline-block w-32 md:w-40 font-medium">Email :</span> 
                    <?= esc($user['email'] ?? '-') ?>
                </p>
                <p>
                    <span class="inline-block w-32 md:w-40 font-medium">Telpon Number :</span> 
                    <?= esc($user['telephone'] ?? '-') ?>
                </p>
            </div>
        </div>
    </div>
  </div>

  <!-- BAGIAN 2: DAFTAR PESANAN (Background Hitam/Gelap) -->
  <div class="flex-1 w-full px-6 py-10 md:px-20 bg-[#1A1A1A] text-white">
    <div class="max-w-6xl mx-auto space-y-12">

        <!-- A. PESANAN SAAT INI -->
        <div>
            <h2 class="text-xl font-medium mb-6 flex items-center gap-3">
                <i class="far fa-calendar-alt text-[#4ADE80]"></i> <!-- Icon Hijau -->
                Pesanan saat ini
            </h2>

            <!-- Card Putih Rounded -->
            <div class="bg-white text-black rounded-[30px] p-8 shadow-2xl overflow-hidden">
                <div class="overflow-x-auto scrollbar-hide">
                    <table class="w-full text-left min-w-[700px]">
                        <thead class="border-b border-[#F3E5AB]"> <!-- Garis bawah emas tipis -->
                            <tr class="text-xl font-bold font-serif">
                                <th class="pb-4 pl-4 w-1/5">Nama</th>
                                <th class="pb-4 w-1/4">Booked served</th>
                                <th class="pb-4 w-1/6">Waktu</th>
                                <th class="pb-4 w-1/6">Tanggal</th>
                                <th class="pb-4 text-right pr-6">Manage</th>
                            </tr>
                        </thead>
                        <tbody class="text-lg">
                             <?php if (!empty($currentBookings) && is_array($currentBookings)) : ?>
                                <?php foreach ($currentBookings as $row) : ?>
                                <tr class="border-b border-gray-100 last:border-0 group hover:bg-gray-50 transition">
                                    <!-- Nama -->
                                    <td class="py-5 pl-4 font-medium"><?= esc($user['name']) ?></td>
                                    
                                    <!-- Booked Served (Stylist/Service) -->
                                    <td class="py-5 font-medium"><?= esc($row['service_name'] ?? $row['stylist'] ?? '-') ?></td>
                                    
                                    <!-- Waktu -->
                                    <td class="py-5 font-bold text-gray-800">
                                        <?= esc(substr($row['time'], 0, 5)) ?> <span class="text-[#B8860B]">WIB</span>
                                    </td>
                                    
                                    <!-- Tanggal -->
                                    <td class="py-5 font-bold text-gray-800">
                                        <?= date('d-m-Y', strtotime($row['created_at'])) ?>
                                    </td>
                                    
                                    <!-- Manage (Status Text) -->
                                    <td class="py-5 text-right pr-6">
                                        <?php 
                                            $status = strtolower($row['status']);
                                            if ($status == 'on progres' || $status == 'pending' || $status == 'konfirmasi') : 
                                        ?>
                                            <span class="text-[#4ADE80] font-bold">On progres</span>
                                        <?php elseif ($status == 'dibatalkan' || $status == 'batal') : ?>
                                            <span class="text-red-500 font-bold">Dibatalkan</span>
                                        <?php else : ?>
                                            <span class="text-[#B8860B] font-bold"><?= ucfirst($row['status']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400 italic">Tidak ada pesanan aktif saat ini.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- B. RIWAYAT PESANAN -->
        <div>
            <h2 class="text-xl font-medium mb-6 flex items-center gap-3">
                <i class="fas fa-history text-red-500"></i> <!-- Icon Merah -->
                Riwayat pesanan
            </h2>

            <!-- Card Putih Rounded -->
            <div class="bg-white text-black rounded-[30px] p-8 shadow-2xl overflow-hidden">
                <div class="overflow-x-auto scrollbar-hide">
                    <table class="w-full text-left min-w-[700px]">
                        <thead class="border-b border-[#F3E5AB]">
                            <tr class="text-xl font-bold font-serif">
                                <th class="pb-4 pl-4 w-1/5">Nama</th>
                                <th class="pb-4 w-1/4">Booked served</th>
                                <th class="pb-4 w-1/6">Waktu</th>
                                <th class="pb-4 w-1/6">Tanggal</th>
                                <th class="pb-4 text-right pr-6">Manage</th>
                            </tr>
                        </thead>
                        <tbody class="text-lg">
                            <?php if (!empty($historyBookings) && is_array($historyBookings)) : ?>
                                <?php foreach ($historyBookings as $hist) : ?>
                                <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition">
                                    <!-- Nama -->
                                    <td class="py-5 pl-4 font-medium"><?= esc($user['name']) ?></td>
                                    
                                    <!-- Booked Served -->
                                    <td class="py-5 font-medium"><?= esc($hist['service_name'] ?? $hist['stylist'] ?? '-') ?></td>
                                    
                                    <!-- Waktu -->
                                    <td class="py-5 font-bold text-gray-800">
                                        <?= esc(substr($hist['time'], 0, 5)) ?> <span class="text-[#B8860B]">WIB</span>
                                    </td>
                                    
                                    <!-- Tanggal -->
                                    <td class="py-5 font-bold text-gray-800">
                                        <?= date('d-m-Y', strtotime($hist['created_at'])) ?>
                                    </td>
                                    
                                    <!-- Status Akhir -->
                                    <td class="py-5 text-right pr-6">
                                        <?php if(in_array(strtolower($hist['status']), ['completed', 'selesai'])): ?>
                                            <span class="text-[#B8860B] font-bold">Selesai</span>
                                        <?php else: ?>
                                            <span class="text-red-500 font-bold">Dibatalkan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400 italic">Belum ada riwayat pesanan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
  </div>

  <!-- Footer -->
  <?= $this->include('layout_user/footer'); ?>

  <script>
    // Preview Image Logic (Visual Only)
    document.getElementById('uploadPhoto').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>
</html>