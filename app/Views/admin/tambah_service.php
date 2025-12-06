<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
<?= isset($service) ? 'Edit Service' : 'Tambah Service' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4"><?= isset($service) ? 'Edit Service' : 'Tambah Service' ?></h2>

    <form action="<?= isset($service) ? base_url('admin/service/update/'.$service['id']) : base_url('admin/service/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nama Service</label>
            <input type="text" name="service_name" value="<?= isset($service) ? esc($service['service_name']) : '' ?>" class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Harga</label>
            <input type="number" name="price" value="<?= isset($service) ? esc($service['price']) : '' ?>" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
         <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="category" class="w-full p-2 border rounded" required>
        <option value="">-- Pilih Category --</option>
        <option value="Haircut">Haircut</option>
        <option value="Coloring">Coloring</option>
        <option value="Shaving">Shaving</option>
        <option value="Treatment">Treatment</option>
        <option value="Styling">Styling</option>
    </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Foto</label>
            <input type="file" name="image" class="w-full">
            <?php if(isset($service) && $service['image']): ?>
                <img src="/uploads/<?= esc($service['image']) ?>" class="w-32 h-32 object-cover mt-2 rounded-lg">
            <?php endif; ?>
        </div>

        <div class="flex justify-end gap-2">
            <a href="<?= base_url('admin/service') ?>" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800"><?= isset($service) ? 'Update' : 'Simpan' ?></button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
