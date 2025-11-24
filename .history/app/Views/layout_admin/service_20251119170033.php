<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('content') ?>


<div class="bg-white p-4 shadow rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Pesanan Baru</h1>
    <hr>
    <br>
<?php foreach ($orders as $order): ?>
    <div class="px-4 py-3 rounded-md odd:bg-gray-200 even:bg-white odd:border-0 even:border">
        <?= $order['title'] ?>
    </div>
<?php endforeach; ?>

</div>

<?= $this->endSection() ?>
