<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KDEUX</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Montaga font -->
  <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Montaga', serif;
    }
  </style>
</head>
<body class="bg-gray-100">
      <!-- HERO SECTION -->
  <section class="relative">
    <img src="/img/Hero.png" alt="Hero Image" class="w-full h-[600px] object-cover">
    <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-start px-10 md:px-20">
      <h1 class="text-white text-4xl md:text-5xl font-bold leading-tight">
        We Know Your<br>
        <span class="text-yellow-400">Style Better</span>
      </h1>
      <p class="text-gray-200 mt-3 max-w-md">Temukan potongan rambut terbaik dari barber profesional kami dan rasakan pengalaman perawatan terbaik untuk penampilan maksimal.</p>
      <a href="login">
        <button class="mt-6 bg-black text-white border border-white px-5 py-2 hover:bg-white hover:text-black transition">
          Login →
        </button>
      </a>
    </div>
  </section>

  <!-- FAVORITE ORDER -->
  <section class="bg-[#111] text-white py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center">Favorite Order</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service Item 1 -->
                <div class="bg-[#1a1a1a] rounded-xl p-6 transition-all duration-300 hover:bg-[#222] hover:shadow-lg hover:shadow-yellow-500/10">
                    <div class="flex justify-center mb-5">
                        <div class="bg-[#2a2a2a] w-16 h-16 rounded-full flex items-center justify-center">
                            <svg viewBox="0 0 512 512" class="text-yellow-400 w-10 h-10" fill="currentColor">
                                <style>.st0{fill:#B8860B;}</style>
                                <path class="st0" d="M143.155,241.403c-5.379,0.154-11.094-0.285-14.076-2.271c-2.983-1.979-6.578-7.847-10.202-12.571 c-16.96-22.075-47.036-31.308-74.281-20.702c-33.079,12.87-49.447,50.13-36.57,83.201c12.877,33.079,50.122,49.454,83.201,36.577 c16.354-6.369,28.612-18.703,35.281-33.546c1.122-2.508,1.742-3.916,3.644-5.783c1.909-1.868,5.79-3.053,8.899-3.694 c18.257-3.77,33.594-3.902,46.429-1.958l2.258-6.104c0.725-2.028,5.15-14.473,11.686-32.785 C184.268,241.919,162.443,240.846,143.155,241.403z M80.511,298.125c-17.874,6.954-38.012-1.895-44.974-19.776 c-6.954-17.88,1.896-38.012,19.769-44.973c17.881-6.968,38.012,1.889,44.981,19.762C107.241,271.018,98.391,291.157,80.511,298.125 z"></path>
                                <path class="st0" d="M507.47,169.171c-3.777-9.714-15.386-10.788-44.151-3.31c-15.581,4.049-87.598,25.706-150.424,44.73 c-6.195,32.221-11.79,61.139-15.066,78.03c63.886-30.674,161.908-77.884,179.342-87.145 C503.429,187.525,511.261,178.884,507.47,169.171z"></path>
                                <path class="st0" d="M303.649,392.949c-5.073-3.114-11.282-6.076-13.568-8.836c-2.278-2.767-3.31-8.404-3.714-13.77 c-1.993-26.298-7.526-57.056-6.836-69.473c0,0,44.179-227.416,48.618-256.808c4.438-29.4,2.16-40.827-7.888-43.58 c-10.055-2.745-17.832,5.938-28.974,33.497c-11.135,27.567-88.824,245.812-88.824,245.812s51.175,20.298,43.336,98.929 c-0.314,3.15-1.087,7.136-2.746,9.226c-1.658,2.098-2.989,2.857-5.365,4.237c-14.069,8.167-25.058,21.651-29.685,38.583 c-9.365,34.235,10.801,69.578,45.029,78.944c34.242,9.358,69.585-10.808,78.943-45.043 C339.688,436.466,327.368,407.513,303.649,392.949z M243.749,280.28c-6.481-1.77-10.299-8.452-8.522-14.933 c1.77-6.48,8.452-10.299,14.933-8.529c6.481,1.777,10.292,8.466,8.522,14.94C256.912,278.238,250.223,282.049,243.749,280.28z M303.495,456.876c-5.059,18.507-24.166,29.406-42.674,24.347c-18.508-5.059-29.406-24.166-24.347-42.674 c5.059-18.508,24.173-29.406,42.674-24.34C297.656,419.262,308.554,438.375,303.495,456.876z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl mb-2 text-center">Potong Rambut</h3>
                    <p class="text-sm text-gray-400 text-center">Layanan potong rambut klasik oleh profesional terbaik kami.</p>
                </div>
                
                <!-- Service Item 2 - Fixed shaver icon with transparent fill -->
                <div class="bg-[#1a1a1a] rounded-xl p-6 transition-all duration-300 hover:bg-[#222] hover:shadow-lg hover:shadow-yellow-500/10">
                    <div class="flex justify-center mb-5">
                        <div class="bg-[#2a2a2a] w-16 h-16 rounded-full flex items-center justify-center">
                            <svg viewBox="0 0 48 48" class="text-yellow-400 w-10 h-10" fill="none">
                                <path d="M36 14H12V6.02055L16.4737 4L20.7193 6.02055L24.193 4L27.6667 6.02055L31.9123 4L36 6.02055V14Z" fill="none" stroke="#B8860B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12.0001 14C12.0001 14 11.9999 18 12.0001 33C12.0002 48 36.0001 48 36.0001 33C36.0001 18 36.0001 14 36.0001 14" stroke="#B8860B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M20 35L28 35" stroke="#B8860B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                <circle cx="24" cy="25" r="4" stroke="#B8860B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></circle>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl mb-2 text-center">Cukur Rapi</h3>
                    <p class="text-sm text-gray-400 text-center">Cukur rapi dan modern dengan hasil maksimal.</p>
                </div>
                
                <!-- Service Item 3 -->
                <div class="bg-[#1a1a1a] rounded-xl p-6 transition-all duration-300 hover:bg-[#222] hover:shadow-lg hover:shadow-yellow-500/10">
                    <div class="flex justify-center mb-5">
                        <div class="bg-[#2a2a2a] w-16 h-16 rounded-full flex items-center justify-center">
                            <svg viewBox="0 0 64 64" class="text-yellow-400 w-10 h-10" fill="none">
                                <defs>
                                    <style>.cls-1{fill:none;stroke:#B8860B;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style>
                                </defs>
                                <path class="cls-1" d="M24.53,27.56a6.6,6.6,0,1,1-.39-13.19h.39L48.89,16V26L31.56,27.1l-3.37.17"></path>
                                <path class="cls-1" d="M31.75,30.55l.39,7.19a3.6,3.6,0,1,1-7.2,0V27.53"></path>
                                <line class="cls-1" x1="24.94" y1="31.97" x2="23.14" y2="31.97"></line>
                                <circle class="cls-1" cx="24.3" cy="20.97" r="3"></circle>
                                <path class="cls-1" d="M28.54,41.34s-.91,3,.38,5.1-2,3.33-2,3.21"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl mb-2 text-center">Styling</h3>
                    <p class="text-sm text-gray-400 text-center">Penataan rambut sesuai tren terkini.</p>
                </div>
                
                <!-- Service Item 4 -->
                <div class="bg-[#1a1a1a] rounded-xl p-6 transition-all duration-300 hover:bg-[#222] hover:shadow-lg hover:shadow-yellow-500/10">
                    <div class="flex justify-center mb-5">
                        <div class="bg-[#2a2a2a] w-16 h-16 rounded-full flex items-center justify-center">
                            <svg viewBox="0 0 24 24" class="text-yellow-400 w-10 h-10" fill="none">
                                <path d="M20 14c-.092.064-2 2.083-2 3.5 0 1.494.949 2.448 2 2.5.906.044 2-.891 2-2.5 0-1.5-1.908-3.436-2-3.5zM9.586 20c.378.378.88.586 1.414.586s1.036-.208 1.414-.586l7-7-.707-.707L11 4.586 8.707 2.293 7.293 3.707 9.586 6 4 11.586c-.378.378-.586.88-.586 1.414s.208 1.036.586 1.414L9.586 20zM11 7.414 16.586 13H5.414L11 7.414z" stroke="#B8860B" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl mb-2 text-center">Perawatan</h3>
                    <p class="text-sm text-gray-400 text-center">Perawatan rambut premium untuk tampilan segar.</p>
                </div>
            </div>
        </div>
    </section>

  <!-- TENTANG KAMI -->
  <section class="py-16 bg-white flex flex-col md:flex-row items-center gap-10 px-6 md:px-20" id="about">
    <img src="/img/about.png" alt="Tentang Kami" class="rounded-lg shadow-lg w-full md:w-1/2 object-cover">
    <div class="md:w-1/2">
      <h1 class="text-3xl md:text-4xl font-bold mb-4">Tentang kami</h1>
      <p class="text-gray-600 mb-4">
        Dengan pengalaman lebih dari 15 tahun, kami telah melayani ribuan pelanggan dengan dedikasi tinggi untuk memberikan hasil terbaik.
      </p>
      <ul class="list-disc pl-5 text-gray-700 space-y-2">
        <li>Barber berpengalaman dan tersertifikasi</li>
        <li>Peralatan modern dan steril</li>
        <li>Produk premium berkualitas tinggi</li>
      </ul>
    </div>
  </section>

  <!-- EXPERT HAIRSTYLIST -->
  <section class="bg-[#111] text-white py-16 text-center">
    <h2 class="text-4xl font-bold mb-3">Expert Hairstylist</h2>
    <p class="text-gray-300 mb-12">Pilih pencukur terbaikmu</p>

    <div class="flex flex-col md:flex-row justify-center gap-10 px-6 md:px-20">

      <!-- Hairstylist 1 -->
      <div class="relative group border border-yellow-500 p-1 rounded-sm bg-[#111] w-[230px] mx-auto">
        <img src="<?= base_url('img/tisna.jpg') ?>" alt="Tisna" class="object-cover w-full h-[300px]">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-90 text-center py-3">
          <h3 class="text-lg font-semibold">Ahnaf</h3>
          <p class="text-gray-300 text-sm">master banget</p>
        </div>
      </div>

      <!-- Hairstylist 2 -->
      <div class="relative group border border-yellow-500 p-1 rounded-sm bg-[#111] w-[230px] mx-auto">
        <img src="<?= base_url('img/tisna.jpg') ?>" alt="Tisna" class="object-cover w-full h-[300px]">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-90 text-center py-3">
          <h3 class="text-lg font-semibold">Tisna</h3>
          <p class="text-gray-300 text-sm">master banget</p>
        </div>
      </div>

      <!-- Hairstylist 3 -->
      <div class="relative group border border-yellow-500 p-1 rounded-sm bg-[#111] w-[230px] mx-auto">
        <img src="<?= base_url('img/pinnki.jpg') ?>" alt="Pinnki" class="object-cover w-full h-[300px]">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-90 text-center py-3">
          <h3 class="text-lg font-semibold">Pinnki</h3>
          <p class="text-gray-300 text-sm">master banget</p>
        </div>
      </div>

    </div>
  </section>

  <!-- LOKASI KAMI -->
  <section class="py-20 bg-white flex flex-col md:flex-row items-center justify-between gap-12 px-6 md:px-20">
    <!-- Kolom Kiri: Teks Alamat -->
    <div class="md:w-1/2 text-left">
      <h2 class="text-4xl font-bold mb-6 text-gray-900">Lokasi Kami</h2>
      <p class="text-lg text-gray-700 leading-relaxed">
        Jl. Kamisan No.1, Kandangsari, Sidomukti, Kec. Ciledug Tengah,<br>
        Kabupaten Cilacap, Jawa Tengah 53132
      </p>
    </div>

    <!-- Kolom Kanan: Peta -->
    <div class="md:w-[45%] w-full">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.2084018650858!2d109.0087746496695!3d-7.7259756439223315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65129af5f51683%3A0xd355ec177dda8923!2sSAMSAT%20Cilacap!5e0!3m2!1sid!2sid!4v1763050727766!5m2!1sid!2sid"
        width="100%"
        height="360"
        class="rounded-xl shadow-md"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </section>
  <footer class="bg-[#1a1a1a] text-white">
        <div class="max-w-7xl mx-auto px-10 py-14">
            <!-- Footer Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 pb-8 border-b border-[#2a2a2a]">
                
                <!-- Brand Section -->
                <div>
                    <div class="flex items-center gap-2 mb-5">
                        <svg viewBox="0 0 512 512" width="26" fill="#B8860B" style="transform: rotate(90deg);">
                            <path d="M424.994 126.551c30.029-30.029 30.018-78.738 0-108.766l-1.468-1.457L269.463 170.391l55.852 55.851L424.994 126.551z"/>
                            <path d="M480.503 312.156c-20.898-20.932-48.609-31.531-76.01-31.498-14.518-.011-29.101 3.036-42.747 8.954L88.464 16.317l-1.469 1.469c-30.018 30.028-30.028 78.736 0 108.766L200.155 239.7l-49.912 49.911c-13.645-5.906-28.218-8.965-42.735-8.942-27.402-.044-55.123 10.554-76.021 31.487C10.554 333.054-.044 360.775 0 388.177c-.044 27.39 10.554 55.112 31.476 76.021 20.92 20.931 48.641 31.519 76.032 31.485 27.412.034 55.112-10.564 76.01-31.475 20.911-20.91 31.509-48.62 31.475-76.021.023-14.506-3.035-29.08-8.931-42.703l49.911-49.922 49.912 49.901c-5.896 13.634-8.954 28.207-8.932 42.725-.033 27.401 10.566 55.112 31.498 76.01 20.898 20.921 48.598 31.53 76.01 31.496 27.401.034 55.111-10.564 76.021-31.496 20.932-20.898 31.531-48.62 31.497-76.01-.045-27.39-10.643-55.101-31.576-75.999zM135.582 416.229c-7.839 7.805-17.808 11.581-28.075 11.625-10.278-.044-20.226-3.82-28.064-11.625-7.805-7.828-11.581-17.785-11.614-28.052.033-10.278 3.809-20.226 11.614-28.064 7.828-7.805 17.786-11.581 28.064-11.614 10.277.044 20.224 3.809 28.064 11.614 7.805 7.828 11.569 17.786 11.613 28.064-.044 10.267-3.808 20.224-11.624 28.063zM256.006 260.156c-9.417 0-17.046-7.628-17.046-17.045 0-9.417 7.629-17.046 17.046-17.046 9.417 0 17.046 7.628 17.046 17.046 0 9.417-7.628 17.045-17.046 17.045zm176.54 156.061c-7.838 7.816-17.796 11.592-28.063 11.626-10.256-.034-20.214-3.81-28.053-11.626-7.805-7.828-11.581-17.796-11.625-28.041.044-10.278 3.808-20.226 11.625-28.064 7.839-7.816 17.786-11.581 28.064-11.625 10.256.034 20.214 3.808 28.052 11.625 7.805 7.839 11.581 17.797 11.625 28.064-.044 10.232-3.808 20.178-11.625 28.041z"/>
                        </svg>
                        <h3 class="text-3xl font-normal">Kdeux</h3>
                    </div>
                    <p class="text-[#b8b8b8] leading-relaxed text-[15px]">
                        Barbershop terpercaya dengan layanan professional sejak 2008
                    </p>
                </div>

                <!-- Services Section -->
                <div>
                    <h3 class="text-xl font-normal mb-6">Layanan</h3>
                    <ul class="space-y-2 text-[#b8b8b8] text-[15px]">
                        <li>Potong Rambut</li>
                        <li>Cukur Jenggot</li>
                        <li>Hair Styling</li>
                        <li>Perawatan Rambut</li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div>
                    <h3 class="text-xl font-normal mb-6">Kontak</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3 text-[#b8b8b8] text-[15px]">
                            <span class="text-lg mt-0.5">📞</span>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-start gap-3 text-[#b8b8b8] text-[15px]">
                            <span class="text-lg mt-0.5">✉</span>
                            <span>info@barbershop.com</span>
                        </div>
                        <div class="flex items-start gap-3 text-[#b8b8b8] text-[15px]">
                            <span class="text-lg mt-0.5">📍</span>
                            <span>Jl. Raya No. 123, Jakarta</span>
                        </div>
                    </div>
                </div>

                <!-- Hours Section -->
                <div>
                    <h3 class="text-xl font-normal mb-6">Jam Buka</h3>
                    <ul class="space-y-2 text-[#b8b8b8] text-[15px]">
                        <li>Senin - Jumat: 09:00 - 20:00</li>
                        <li>Sabtu: 09:00 - 18:00</li>
                        <li>Minggu: 10:00 - 16:00</li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="pt-7 text-center">
                <p class="text-[#ffffff] text-sm">
                    © 2024 BarberShop. All rights reserved.
                </p>
            </div>
        </div>
    </footer>