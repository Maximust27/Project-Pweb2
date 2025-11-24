<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Playfair Display', serif;
        }
    </style>

    <title>Ubah Menu</title>
</head>

<body class="bg-[#F5F5F5]">

    <div class="p-10">

        <!-- CARD -->
        <div class="bg-white rounded-xl shadow-md p-10">
            <h1 class="text-3xl mb-10" style="color:#B8860B; font-family: 'Playfair Display';">
                Ubah Menu
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- FOTO + UPLOAD -->
                <div class="flex flex-col items-center">
                    <div class="w-64 h-64 rounded-xl overflow-hidden shadow-lg mb-4 bg-gray-200">
                        <img id="previewImage" src="https://i.pinimg.com/736x/6b/23/53/6b235366aecbb8f3e8f302ff7f6ba674.jpg" class="w-full h-full object-cover">
                    </div>

                    <label class="cursor-pointer bg-gray-200 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition"> Choose File 
                        <input id="imageInput" type="file" class="hidden">
                    </label>

                </div>

                <!-- FORM KANAN -->
                <div class="flex flex-col gap-6 justify-start">

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Nama Baru</label>
                        <input type="text" placeholder="Nama Awal" class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none">
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Harga Baru</label>
                        <input type="number" placeholder="Rp" class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none">
                    </div>

                    <!-- SUBMIT DI KANAN -->
                    <div class="text-right mt-4">
                        <button class="bg-[#B8860B] text-white px-8 py-2 rounded-full hover:bg-[#9c740a] transition font-semibold"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image preview
        document.getElementById("imageInput").addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const preview = document.getElementById("previewImage");
                preview.src = URL.createObjectURL(file);
            }
        });
    </script>

</body>

</html>
