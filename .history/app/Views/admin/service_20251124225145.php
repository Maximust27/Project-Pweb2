<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('content') ?>

<!-- Services Content Section -->
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-bold mb-4">All Service</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Foto</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Service</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Harga</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-6 py-4">
                        <img src="/img/cornrow.jpg" class="w-20 h-20 rounded-lg object-cover" />
                    </td>
                    <td class="px-6 py-4 text-gray-800">Cornrow</td>
                    <td class="px-6 py-4 text-gray-800">Rp125.000,-</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-700 text-white px-4 py-1 rounded hover:bg-green-800">Ubah</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4">
                        <img src="/img/hairperm.jpg" class="w-20 h-20 rounded-lg object-cover" />
                    </td>
                    <td class="px-6 py-4 text-gray-800">Hair Perm</td>
                    <td class="px-6 py-4 text-gray-800">Rp100.000,-</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-700 text-white px-4 py-1 rounded hover:bg-green-800">Ubah</button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4">
                        <img src="/img/keratin.jpg" class="w-20 h-20 rounded-lg object-cover" />
                    </td>
                    <td class="px-6 py-4 text-gray-800">Keratin Treatment</td>
                    <td class="px-6 py-4 text-gray-800">Rp100.000,-</td>
                    <td class="px-6 py-4 text-center">
                        <button class="bg-green-700 text-white px-4 py-1 rounded hover:bg-green-800">Ubah</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
