<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kdeux Dashboard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Montaga Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Montaga', serif;
    }
    .active {
      background-color: #d4af37;
      color: #fff;
    }
    .sidebar-btn:hover {
      background-color: #d4af37;
      color: #fff;
    }
  </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed md:static md:translate-x-0 transform -translate-x-full md:w-64 w-60 bg-black text-white flex flex-col justify-between h-screen transition-transform duration-300 ease-in-out z-50">
    <div>
      <!-- Logo -->
      <div class="flex items-center gap-3 p-5 border-b border-gray-700">
        <div class="bg-[#D4AF37] p-2 rounded-md flex items-center justify-center w-10 h-10">
          <svg viewBox="0 0 512 512" fill="#ffffff" class="w-6 h-6 rotate-90">
            <path d="M424.994 126.551c30.029-30.029 30.018-78.738 0-108.766l-1.468-1.457L269.463 170.391l55.852 55.851L424.994 126.551z"/>
            <path d="M480.503 312.156c-20.898-20.932-48.609-31.531-76.01-31.498-14.518-.011-29.101 3.036-42.747 8.954L88.464 16.317l-1.469 1.469c-30.018 30.028-30.028 78.736 0 108.766L200.155 239.7l-49.912 49.911c-13.645-5.906-28.218-8.965-42.735-8.942-27.402-.044-55.123 10.554-76.021 31.487C10.554 333.054-.044 360.775 0 388.177c-.044 27.39 10.554 55.112 31.476 76.021 20.92 20.931 48.641 31.519 76.032 31.485 27.412.034 55.112-10.564 76.01-31.475 20.911-20.91 31.509-48.62 31.475-76.021.023-14.506-3.035-29.08-8.931-42.703l49.911-49.922 49.912 49.901c-5.896 13.634-8.954 28.207-8.932 42.725-.033 27.401 10.566 55.112 31.498 76.01 20.898 20.921 48.598 31.53 76.01 31.496 27.401.034 55.111-10.564 76.021-31.496 20.932-20.898 31.531-48.62 31.497-76.01-.045-27.39-10.643-55.101-31.576-75.999zM135.582 416.229c-7.839 7.805-17.808 11.581-28.075 11.625-10.278-.044-20.226-3.82-28.064-11.625-7.805-7.828-11.581-17.785-11.614-28.052.033-10.278 3.809-20.226 11.614-28.064 7.828-7.805 17.786-11.581 28.064-11.614 10.277.044 20.224 3.809 28.064 11.614 7.805 7.828 11.569 17.786 11.613 28.064-.044 10.267-3.808 20.224-11.624 28.063zM256.006 260.156c-9.417 0-17.046-7.628-17.046-17.045 0-9.417 7.629-17.046 17.046-17.046 9.417 0 17.046 7.628 17.046 17.046 0 9.417-7.628 17.045-17.046 17.045zm176.54 156.061c-7.838 7.816-17.796 11.592-28.063 11.626-10.256-.034-20.214-3.81-28.053-11.626-7.805-7.828-11.581-17.796-11.625-28.041.044-10.278 3.808-20.226 11.625-28.064 7.839-7.816 17.786-11.581 28.064-11.625 10.256.034 20.214 3.808 28.052 11.625 7.805 7.839 11.581 17.797 11.625 28.064-.044 10.232-3.808 20.178-11.625 28.041z"/>
          </svg>
        </div>
        <h1 class="text-xl font-semibold">Kdeux</h1>
      </div>

      <!-- Menu -->
      <nav class="mt-4 flex flex-col space-y-2 px-3">
          <!-- Dashboard -->
          <a href="#"
             class="flex items-center gap-3 px-4 py-2 rounded-md bg-[#1A1A1A] text-white hover:bg-[#D4AF37] transition duration-200 ease-in-out">
            <span class="w-5 h-5 flex items-center justify-center">
              <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 3V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 21H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M7 16L12.25 10.75L15.75 14.25L21 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            <span class="text-[15px] font-medium">Dashboard</span>
          </a>

          <!-- Bookings -->
          <a href="#"
             class="flex items-center gap-3 px-4 py-2 rounded-md bg-[#1A1A1A] text-white hover:bg-[#D4AF37] transition duration-200 ease-in-out">
            <span class="w-5 h-5 flex items-center justify-center">
              <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 9H21M9 15L11 17L15 13M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            <span class="text-[15px] font-medium">Bookings</span>
          </a>

          <!-- Services -->
          <a href="#"
             class="flex items-center gap-3 px-4 py-2 rounded-md bg-[#1A1A1A] text-white hover:bg-[#D4AF37] transition duration-200 ease-in-out">
            <span class="w-5 h-5 flex items-center justify-center">
              <svg viewBox="0 0 512 512" fill="#ffffff" class="w-6 h-6 rotate-90">
                <path d="M424.994 126.551c30.029-30.029 30.018-78.738 0-108.766l-1.468-1.457L269.463 170.391l55.852 55.851L424.994 126.551z"/>
                <path d="M480.503 312.156c-20.898-20.932-48.609-31.531-76.01-31.498-14.518-.011-29.101 3.036-42.747 8.954L88.464 16.317l-1.469 1.469c-30.018 30.028-30.028 78.736 0 108.766L200.155 239.7l-49.912 49.911c-13.645-5.906-28.218-8.965-42.735-8.942-27.402-.044-55.123 10.554-76.021 31.487C10.554 333.054-.044 360.775 0 388.177c-.044 27.39 10.554 55.112 31.476 76.021 20.92 20.931 48.641 31.519 76.032 31.485 27.412.034 55.112-10.564 76.01-31.475 20.911-20.91 31.509-48.62 31.475-76.021.023-14.506-3.035-29.08-8.931-42.703l49.911-49.922 49.912 49.901c-5.896 13.634-8.954 28.207-8.932 42.725-.033 27.401 10.566 55.112 31.498 76.01 20.898 20.921 48.598 31.53 76.01 31.496 27.401.034 55.111-10.564 76.021-31.496 20.932-20.898 31.531-48.62 31.497-76.01-.045-27.39-10.643-55.101-31.576-75.999zM135.582 416.229c-7.839 7.805-17.808 11.581-28.075 11.625-10.278-.044-20.226-3.82-28.064-11.625-7.805-7.828-11.581-17.785-11.614-28.052.033-10.278 3.809-20.226 11.614-28.064 7.828-7.805 17.786-11.581 28.064-11.614 10.277.044 20.224 3.809 28.064 11.614 7.805 7.828 11.569 17.786 11.613 28.064-.044 10.267-3.808 20.224-11.624 28.063zM256.006 260.156c-9.417 0-17.046-7.628-17.046-17.045 0-9.417 7.629-17.046 17.046-17.046 9.417 0 17.046 7.628 17.046 17.046 0 9.417-7.628 17.045-17.046 17.045zm176.54 156.061c-7.838 7.816-17.796 11.592-28.063 11.626-10.256-.034-20.214-3.81-28.053-11.626-7.805-7.828-11.581-17.796-11.625-28.041.044-10.278 3.808-20.226 11.625-28.064 7.839-7.816 17.786-11.581 28.064-11.625 10.256.034 20.214 3.808 28.052 11.625 7.805 7.839 11.581 17.797 11.625 28.064-.044 10.232-3.808 20.178-11.625 28.041z"/>
             </svg>
            </span>
            <span class="text-[15px] font-medium">Services</span>
          </a>

          <!-- Notification -->
          <a href="#"
             class="flex items-center gap-3 px-4 py-2 rounded-md bg-[#1A1A1A] text-white hover:bg-[#D4AF37] transition duration-200 ease-in-out">
            <span class="w-5 h-5 flex items-center justify-center">
                <svg height="200px" width="200px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#fff;} </style> <g> <path class="st0" d="M364.032,355.035c-3.862-1.446-8.072-3.436-12.35-5.794l-71.57,98.935l-5.09-64.814h-38.033l-5.091,64.814 l-71.569-98.935c-4.408,2.466-8.656,4.487-12.361,5.794c-37.478,13.193-129.549,51.136-123.607,122.21 C25.787,494.301,119.582,512,256.006,512c136.413,0,230.208-17.699,231.634-34.755 C493.583,406.102,401.273,368.961,364.032,355.035z"></path> <path class="st0" d="M171.501,208.271c5.21,29.516,13.966,55.554,25.494,68.38c0,15.382,0,26.604,0,35.587 c0,0.902-0.158,1.852-0.416,2.833l40.41,19.462v28.545h38.033v-28.545l40.39-19.452c-0.258-0.981-0.416-1.932-0.416-2.843 c0-8.983,0-20.205,0-35.587c11.548-12.826,20.304-38.864,25.514-68.38c12.143-4.338,19.096-11.281,27.762-41.658 c9.231-32.358-13.876-31.258-13.876-31.258c18.69-61.873-5.922-120.022-47.124-115.753c-28.426-49.73-123.627,11.36-153.48,7.102 c0,17.055,7.112,29.842,7.112,29.842c-10.379,19.69-6.378,58.951-3.446,78.809c-1.704-0.03-22.602,0.188-13.728,31.258 C152.405,196.99,159.338,203.934,171.501,208.271z"></path> </g> </g></svg>
            </span>
            <span class="text-[15px] font-medium">Notification</span>
          </a>

          <!-- Profile -->
          <a href="#"
             class="flex items-center gap-3 px-4 py-2 rounded-md bg-[#1A1A1A] text-white hover:bg-[#D4AF37] transition duration-200 ease-in-out">
            <span class="w-5 h-5 flex items-center justify-center">
                <svg viewBox="0 0 24 24" width="26" fill="#e9e2e2">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z"/>
                </svg>
            </span>
            <span class="text-[15px] font-medium">Profile</span>
          </a>
        </nav>
    </div>

    <!-- Logout -->
    <div class="p-3 border-t border-gray-700">
      <div class="bg-[#1A1A1A] rounded-md">
        <a href="#" class="sidebar-btn flex items-center gap-3 px-4 py-2 rounded-md w-full"><span>↩️</span> Logout</a>
      </div>
    </div>
  </aside>

  <!-- Overlay for mobile -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40 md:hidden"></div>

  <!-- Main Content -->
  <main class="flex-1 flex flex-col md:ml-0 ml-0 w-full">
    <!-- Header -->
    <header class="flex justify-between items-center bg-white shadow px-4 py-3 border-b">
      <div class="flex items-center gap-3">
        <!-- Hamburger -->
        <button id="menu-btn" class="md:hidden text-2xl focus:outline-none">☰</button>
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
      </div>

      <div class="flex items-center gap-6">
        <!-- Notification -->
        <div class="relative">
          <span class="text-gray-600 text-xl">

          
          </span>
          <span class="absolute -top-1 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5">3</span>
        </div>

        <!-- Profile -->
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 bg-gray-800 rounded-full"></div>
          <span class="text-gray-800">Nama Admin</span>
          <span class="text-gray-500">▾</span>
        </div>
      </div>
    </header>

    <!-- Content -->
    <section class="p-6">
    <?= $this->renderSection('content') ?>
</section>

  </main>

  <!-- JS Toggle Sidebar -->
  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuBtn = document.getElementById('menu-btn');

    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>
</body>
</html>
