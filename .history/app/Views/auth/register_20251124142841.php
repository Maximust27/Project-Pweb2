<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kdeux - Register</title>
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

    <!-- LEFT SIDE – REGISTER AREA -->
    <div class="w-full md:w-1/2 h-screen bg-[#1A1A1A] text-white flex items-center justify-center p-12 relative">

        <!-- Logo -->
        <div class="absolute top-6 left-8 text-2xl font-bold tracking-wide">
            Kdeux </div>

        <div class="w-full max-w-xl">
            
            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-semibold">Create An Account</h1>
            </div>

            <!-- Form -->
<form action="<?= base_url('register/process') ?>" method="POST" class="space-y-6">

                <!-- Name -->
                <div>
                    <input type="text" placeholder="Name" name="name"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none">
                </div>

                <!-- Email -->
                <div>
                    <input type="email" placeholder="E-mail Address" name="email"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none">
                </div>

                <!-- Telephone -->
                <div>
                    <input type="tel" placeholder="Telephone Number" name="telephone"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none">
                </div>

                <!-- Password -->
                <div>
                    <input type="password" placeholder="Password" name="password"
                        class="w-full px-4 py-3 rounded-lg bg-transparent border border-white text-white placeholder-white/60 focus:ring-2 focus:ring-white focus:outline-none">
                </div>

                <!-- Terms Text -->
                <p class="text-xs text-white/50 text-center leading-relaxed"> By logging in you agree to our <a href="#" class="underline hover:text-white transition duration-200">Terms of Use</a> 
                    and <a href="#" class="underline hover:text-white transition duration-200">Privacy Policy</a>
                </p>
            
                <!-- Register Button -->
                <button type="submit" class="w-full bg-white text-black py-3 rounded-lg font-medium transition hover:bg-gray-200"> 
                    Sign Up </button>
            </form>

            <!-- Icon GOOGLE, IG, X -->
            <div class="flex items-center justify-center gap-6 mt-6 text-4xl">

                <!-- Google -->
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-google text-4xl"></i>
                </a>

                <!-- Instagram -->
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-instagram text-4xl"></i>
                </a>

                <!-- X Twitter -->
                <a href="#" class="hover:text-gray-300 transition">
                    <i class="fa-brands fa-x-twitter text-4xl"></i>
                </a>

            </div>            

            <!-- Footer -->

            <form action="login/process" method="post">
            <p class="text-center text-white/70 mt-8 text-sm"> Already Have 
                <a href="<?= base_url('login')  ?>" class="text-white/70 font-medium underline hover:text-white">Account?</a>
            </p></form>

        </div>
    </div>

    
    <div class="hidden md:block w-1/2 h-screen">
        <img src="/img/Register.jpeg" alt="Register Illustration" class="w-full h-full object-cover">
    </div>

</body>
</html>
