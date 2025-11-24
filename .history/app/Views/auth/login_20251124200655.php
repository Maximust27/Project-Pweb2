<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kdeux - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="min-h-screen flex overflow-hidden">

    <!-- LEFT SIDE – FULL IMAGE -->
    <div class="hidden md:block w-1/2 h-screen">
        <img src="/img/Login.jpeg" alt="Login Illustration" class="w-full h-full object-cover">
    </div>

    <!-- RIGHT SIDE – LOGIN AREA -->
    <div class="w-full md:w-1/2 h-screen bg-[#1A1A1A] text-white flex items-center justify-center p-12 relative">

        <div class="absolute top-6 left-8 text-2xl font-bold tracking-wide">Kdeux</div>

        <div class="w-full max-w-xl">

            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-semibold">Login</h1>
            </div>

            <!-- FORM LOGIN -->
            <?php if (session()->getFlashdata('error')): ?>
                <div style="background:#f87171; padding:10px; margin-bottom:15px; border-radius:5px; color:white;">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/auth') ?>" method="POST" class="space-y-6">
                <?= csrf_field(); ?>

                <!-- Email -->
                <div>
                    <input type="email" name="email" placeholder="E-mail Address"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none"
                        required>
                </div>

                <div>
                    <input type="number" name="telphone" placeholder="Telephone number"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none"
                        required>
                </div>

                <!-- Password -->
                <div>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none"
                        required>
                </div>

                <!-- Tombol Login -->
                <button type="submit"
                    class="w-full bg-white text-black py-3 rounded-lg font-medium transition hover:bg-gray-200">
                    Login
                </button>

            </form>

            <!-- SOCIAL LOGIN ICONS -->
            <div class="flex items-center justify-center gap-6 mt-6 text-4xl">
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-google"></i>
                </a>
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            </div>

            <!-- FOOTER -->
            <p class="text-center text-white/70 mt-8 text-sm">
                New User?
                <a href="<?= base_url('register') ?>" class="text-white font-medium hover:underline">Sign Up</a>
            </p>

        </div>
    </div>

</body>
</html>
        