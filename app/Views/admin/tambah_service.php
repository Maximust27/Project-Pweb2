<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Tambah Service
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4 border-b pb-2">Tambah Service Baru</h2>

    <!-- Menampilkan Error Validasi (Jika ada) -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li>• <?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Khusus Tambah - Action ke 'simpan' -->
    <form action="<?= base_url('admin/service/simpan') ?>" method="post" enctype="multipart/form-data">
        
        <?= csrf_field() ?>

        <!-- Input Nama Service -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nama Service</label>
            <input type="text" name="service_name" 
                   value="<?= old('service_name') ?>" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Contoh: Haircut Premium" required>
        </div>

        <!-- Input Harga -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Harga (Rp)</label>
            <input type="number" name="price" 
                   value="<?= old('price') ?>" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Contoh: 50000" required>
        </div>

        <!-- Input Kategori -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="category" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Category --</option>
                <?php 
                $categories = ['Haircut', 'Coloring', 'Shaving', 'Treatment', 'Styling'];
                $currentCategory = old('category');
                ?>
                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat ?>" <?= ($currentCategory == $cat) ? 'selected' : '' ?>>
                        <?= $cat ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Input Foto -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Foto</label>
            <!-- Wajib diisi saat tambah baru -->
            <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
            <small class="text-gray-500 block mt-1">*Format: JPG, JPEG, PNG. Maks 2MB.</small>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-2 mt-6">
            <a href="<?= base_url('admin/service') ?>" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 transition">
                Simpan Data
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>