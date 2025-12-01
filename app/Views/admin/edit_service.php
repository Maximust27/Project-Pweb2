<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Ubah Service
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="p-6 bg-gray-100 min-h-screen">

    <div class="bg-white rounded-xl shadow-md p-10 max-w-4xl mx-auto">
        <h1 class="text-3xl mb-10 text-[#B8860B] font-semibold">Ubah Service</h1>

        <form action="<?= base_url('admin/service/update/'.$service['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                <!-- FOTO + UPLOAD -->
                <div class="flex flex-col items-center">
                    <div class="w-64 h-64 rounded-xl overflow-hidden shadow-lg mb-4 bg-gray-200">
                        <img id="previewImage" src="<?= base_url('/uploads/'.$service['image']) ?>" class="w-full h-full object-cover">
                    </div>

                    <label class="cursor-pointer bg-gray-200 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-300 transition">
                        Choose File
                        <input id="imageInput" type="file" name="image" class="hidden">
                    </label>
                </div>

                <!-- FORM KANAN -->
                <div class="flex flex-col gap-6 justify-start">

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Nama Service</label>
                        <input type="text" name="service_name" value="<?= esc($service['service_name']) ?>" class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Harga</label>
                        <input type="number" name="price" value="<?= esc($service['price']) ?>" class="w-full bg-gray-200 rounded-full px-4 py-2 focus:outline-none" required>
                    </div>

                    <!-- SUBMIT DI KANAN -->
                    <div class="text-right mt-4">
                        <a href="<?= base_url('admin/service') ?>" class="bg-gray-400 px-6 py-2 rounded-full text-white hover:bg-gray-500 transition font-semibold mr-2">Batal</a>
                        <button type="submit" class="bg-[#B8860B] text-white px-8 py-2 rounded-full hover:bg-[#9c740a] transition font-semibold">Submit</button>
                    </div>

                </div>

            </div>
        </form>
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

<?= $this->endSection() ?>
