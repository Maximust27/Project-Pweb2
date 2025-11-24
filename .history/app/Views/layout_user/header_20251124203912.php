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

  <!-- Navbar -->
  <nav class="bg-[#1a1a1a] px-6 md:px-10 py-4 shadow-md">
    <div class="flex items-center justify-between">

      <!-- Logo -->
      <div class="flex items-center space-x-2 text-[#b88a00] font-semibold text-xl tracking-widest">
        <svg viewBox="0 0 512 512" width="26" fill="#B8860B" style="transform: rotate(90deg);">
          <path d="M424.994 126.551c30.029-30.029 30.018-78.738 0-108.766l-1.468-1.457L269.463 170.391l55.852 55.851L424.994 126.551z"/>
          <path d="M480.503 312.156c-20.898-20.932-48.609-31.531-76.01-31.498-14.518-.011-29.101 3.036-42.747 8.954L88.464 16.317l-1.469 1.469c-30.018 30.028-30.028 78.736 0 108.766L200.155 239.7l-49.912 49.911c-13.645-5.906-28.218-8.965-42.735-8.942-27.402-.044-55.123 10.554-76.021 31.487C10.554 333.054-.044 360.775 0 388.177c-.044 27.39 10.554 55.112 31.476 76.021 20.92 20.931 48.641 31.519 76.032 31.485 27.412.034 55.112-10.564 76.01-31.475 20.911-20.91 31.509-48.62 31.475-76.021.023-14.506-3.035-29.08-8.931-42.703l49.911-49.922 49.912 49.901c-5.896 13.634-8.954 28.207-8.932 42.725-.033 27.401 10.566 55.112 31.498 76.01 20.898 20.921 48.598 31.53 76.01 31.496 27.401.034 55.111-10.564 76.021-31.496 20.932-20.898 31.531-48.62 31.497-76.01-.045-27.39-10.643-55.101-31.576-75.999zM135.582 416.229c-7.839 7.805-17.808 11.581-28.075 11.625-10.278-.044-20.226-3.82-28.064-11.625-7.805-7.828-11.581-17.785-11.614-28.052.033-10.278 3.809-20.226 11.614-28.064 7.828-7.805 17.786-11.581 28.064-11.614 10.277.044 20.224 3.809 28.064 11.614 7.805 7.828 11.569 17.786 11.613 28.064-.044 10.267-3.808 20.224-11.624 28.063zM256.006 260.156c-9.417 0-17.046-7.628-17.046-17.045 0-9.417 7.629-17.046 17.046-17.046 9.417 0 17.046 7.628 17.046 17.046 0 9.417-7.628 17.045-17.046 17.045zm176.54 156.061c-7.838 7.816-17.796 11.592-28.063 11.626-10.256-.034-20.214-3.81-28.053-11.626-7.805-7.828-11.581-17.796-11.625-28.041.044-10.278 3.808-20.226 11.625-28.064 7.839-7.816 17.786-11.581 28.064-11.625 10.256.034 20.214 3.808 28.052 11.625 7.805 7.839 11.581 17.797 11.625 28.064-.044 10.232-3.808 20.178-11.625 28.041z"/>
        </svg>
        <span class="tracking-widest text-xl font-bold">KDEUX</span>
      </div>

      <!-- Burger Button (mobile) -->
      <button id="menu-btn" class="text-[#b88a00] md:hidden focus:outline-none" onclick="toggleMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>

      <!-- Menu -->
      <div id="menu" class="hidden md:flex items-center space-x-10">
        <!-- Center Menu -->
        <div class="flex flex-col md:flex-row md:space-x-8 text-white text-[16px] space-y-4 md:space-y-0 mt-4 md:mt-0">
          <a href="<?= base_url('/') ?>" class="hover:text-[#b88a00] transition">Home</a>
          <a href="<?= base_url('') ?>#about" class="hover:text-[#b88a00] transition">About</a>
          <a href="<?= base_url('booking') ?>" class="hover:text-[#b88a00] transition">Booking</a>
        </div>

        <!-- Profile -->
        <button onclick="window.location.href='<?= base_url('login') ?>'" class="flex items-center gap-2 bg-[#b88a00] text-white text-[15px] font-medium px-5 py-1.5 rounded-full hover:bg-[#c49c20] transition">
          <svg viewBox="0 0 24 24" width="26" fill="#e9e2e2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z"/>
          </svg>
          <span>Login</span>
        </button>
      </div>
    </div>

    <!-- Mobile Dropdown -->
    <div id="mobile-menu" class="hidden flex-col md:hidden mt-4 space-y-4 text-center text-white text-[16px]">
      <a href="<?= base_url('/') ?>" class="text-[#b88a00] border-b-2 border-[#b88a00] pb-0.5">Home</a>
      <a href="<?= base_url('') ?>#about" class="hover:text-[#b88a00] transition">About</a>
      <a href="<?= base_url('login') ?>" class="hover:text-[#b88a00] transition">Booking</a>
      <button class="flex items-center justify-center gap-2 bg-[#b88a00] text-white text-[15px] font-medium px-5 py-1.5 rounded-full hover:bg-[#c49c20] transition w-fit mx-auto">
        <svg viewBox="0 0 24 24" width="26" fill="#e9e2e2">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z"/>
        </svg>
        <span>Profile</span>
      </button>
    </div>
  </nav>

  <!-- Konten -->
  <div>
    <?= $this->renderSection('content'); ?>
  </div>

  <script>
    function toggleMenu() {
      const mobileMenu = document.getElementById("mobile-menu");
      mobileMenu.classList.toggle("hidden");
    }
  </script>

</body>
</html>
