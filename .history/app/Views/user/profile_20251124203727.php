<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Playfair Display', serif !important;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- Header -->
  <?= $this->include('layout_user/header'); ?>

  <!-- Layout -->
  <div class="flex-1 flex flex-col">

    <!-- Arrow keluar -->
    <div class="bg-white flex items-center justify-start px-20 py-16 w-full relative">
      <a href="<?= base_url('/'); ?>" class="absolute top-6 left-6 text-gray-700 text-3xl hover:text-yellow-600">
        <svg width="" height="30" viewBox="0 0 177 112" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M176.026 59.2917H21.0335L88.875 105.722L81.1168 111.032L0 55.5159L81.1168 0L88.875 5.3097L21.0335 51.7401H98.5297H176.026V59.2917Z" fill="black"/>
</svg>

      </a>

      <!-- Foto profil -->
      <div class="relative w-64 h-64 rounded-full overflow-hidden bg-gray-800 flex items-center justify-center mr-16">
        <img id="previewImage" src="" alt="Profile"
             class="w-full h-full object-cover rounded-full transition-all duration-300">

        <!-- Tombol tambah foto -->
        <label for="uploadPhoto" 
               class="absolute bottom-5 left-1/2 transform -translate-x-1/2 bg-[#1A1A1A] text-white w-10 h-10 flex items-center justify-center rounded-full text-2xl cursor-pointer hover:bg-gray-700 transition">
          +
        </label>
        <input type="file" id="uploadPhoto" class="hidden" accept="image/*">
      </div>

      <!-- Info profil -->
      <div class="text-left">
        <div class="space-y-2 text-xl">
          <div><span class="font-semibold">Nama:</span>  <?= $user['name'] ?></div>
          <div><span class="font-semibold">Email:</span> <?= $user['email'] ?></div>
          <div><span class="font-semibold">Telpon Number:</span>  <?= $user['telephone'] ?></div>
        </div>
      </div>
    </div>

    <!-- Pesanan Saat Ini -->
    <div class="bg-[#1A1A1A] text-white px-20 py-10 w-full">
      <h2 class="text-green-400 text-xl font-semibold mb-4 flex items-center gap-2">
        <i class="fas fa-calendar-check"></i> Pesanan saat ini
      </h2>
      <div class="bg-white text-black rounded-xl p-6 overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead class="text-gray-800 font-semibold border-b">
            <tr>
              <th class="p-3">Nama</th>
              <th class="p-3">Booked served</th>
              <th class="p-3">Waktu</th>
              <th class="p-3">Tanggal</th>
              <th class="p-3">Manage</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>

    <!-- Riwayat Pesanan -->
    <div class="bg-[#1A1A1A] text-white px-20 py-10 w-full flex-1">
      <h2 class="text-red-400 text-xl font-semibold mb-4 flex items-center gap-2">
        <i class="fas fa-history"></i> Riwayat pesanan
      </h2>
      <div class="bg-white text-black rounded-xl p-6 overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead class="text-gray-800 font-semibold border-b">
            <tr>
              <th class="p-3">Nama</th>
              <th class="p-3">Booked served</th>
              <th class="p-3">Waktu</th>
              <th class="p-3">Tanggal</th>
              <th class="p-3">Manage</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <?= $this->include('layout_user/footer'); ?>

  <script>
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
