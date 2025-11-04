<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kdeux Barbershop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap');
        
        body {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-900">
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
                <p class="text-[#666666] text-sm">
                    © 2024 BarberShop. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>