    <?= $this->extend('layout_admin/sidebar') ?>
    <?= $this->section('page_title') ?>
    Service
    <?= $this->endSection() ?>

    <?= $this->section('content') ?>

    <!-- Services Content Section -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">All Services</h2>
        </div>

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
                    <?php if(!empty($services)): ?>
                        <?php foreach($services as $service): ?>
                            <tr>
                                <td class="px-6 py-4">
                                    <img src="/img/<?= esc($service['image']) ?>" class="w-20 h-20 rounded-lg object-cover" />
                                </td>
                                <td class="px-6 py-4 text-gray-800"><?= esc($service['service_name']) ?></td>
                                <td class="px-6 py-4 text-gray-800">Rp<?= number_format($service['price'],0,",",".") ?>,-</td>
                                <td class="px-6 py-4 text-center flex justify-center gap-2">
                                    <a href="<?= base_url('admin/edit_service/'.$service['id']) ?>" class="bg-green-700 text-white px-4 py-1 rounded hover:bg-green-800">Ubah</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada service</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?= $this->endSection() ?>