<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Edit Service - <?= esc($service['service_name']) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Load Font Khusus Playfair Display -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    /* Memastikan font dipakai di area ini */
    .font-playfair {
        font-family: 'Playfair Display', serif;
    }
</style>

<div class="p-10 bg-[#F5F5F5] min-h-screen font-playfair">

    <!-- Menampilkan Error Validasi (Jika ada salah input) -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Ada Kesalahan!</strong>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li>• <?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- CARD UTAMA -->
    <div class="bg-white rounded-xl shadow-md p-10">
        <h1 class="text-3xl mb-10 text-[#B8860B]" style="font-family: 'Playfair Display';">
            Ubah Menu
        </h1>

        <!-- FORM START -->
        <form action="<?= base_url('admin/service/update/' . $service['id']) ?>" method="post" enctype="multipart/form-data">
            
            <?= csrf_field() ?>
            <!-- 
                FIX: Menghapus method spoofing PUT. 
                Kita gunakan POST murni karena ada upload file (multipart), 
                dan Routes.php menggunakan $routes->post().
            -->
            
            <!-- 
               PENTING: Input Kategori disembunyikan (Hidden).
               Kita ambil nilai lama biar validasi di controller (required) tetap lolos.
            -->
            <input type="hidden" name="category" value="<?= esc($service['category']) ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                
                <!-- FOTO + UPLOAD -->
                <div class="flex flex-col items-center">
                    <div class="w-64 h-64 rounded-xl overflow-hidden shadow-lg mb-4 bg-gray-200">
                        <?php 
                            $foto = $service['image'] ? base_url('uploads/' . $service['image']) : 'https://via.placeholder.com/300?text=No+Image'; 
                        ?>
                        <img id="previewImage" src="<?= $foto ?>" class="w-full h-full object-cover">
                    </div>

                    <label class="cursor-pointer bg-gray-200 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition text-gray-700"> 
                        Choose File 
                        <input id="imageInput" type="file" name="image" class="hidden" accept="image/*">
                    </label>
                </div>

                <!-- FORM KANAN -->
                <div class="flex flex-col gap-6 justify-start">

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Nama Baru</label>
                        <input type="text" 
                               name="service_name"
                               value="<?= old('service_name', $service['service_name']) ?>" 
                               placeholder="Nama Awal" 
                               class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Harga Baru</label>
                        <input type="number" 
                               name="price"
                               value="<?= old('price', $service['price']) ?>" 
                               placeholder="Rp" 
                               class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none" required>
                    </div>

                    <!-- SUBMIT DI KANAN -->
                    <div class="text-right mt-4 flex justify-end items-center gap-4">
                        <a href="<?= base_url('admin/service') ?>" class="text-gray-500 hover:text-gray-700 font-semibold text-sm">Batal</a>
                        
                        <button type="submit" class="bg-[#B8860B] text-white px-8 py-2 rounded-full hover:bg-[#9c740a] transition font-semibold"> 
                            Submit 
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM -->
    </div>
</div>

<script>
    // Image preview script
    document.getElementById("imageInput").addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            const preview = document.getElementById("previewImage");
            preview.src = URL.createObjectURL(file);
        }
    });
</script>

<?= $this->endSection() ?>