<?= $this->extend('layout_admin/sidebar') ?>
<?= $this->section('page_title') ?>
PROFILE ADMIN
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <div class="p-8">
        <h1 class="text-2xl font-bold mb-6">Profile Admin</h1>

        <div class="bg-white shadow-lg rounded-xl p-10 border border-gray-200 relative">

    <!-- ICON EDIT -->
    <button onclick="openEditModal()" class="absolute top-4 right-4 text-gray-500 hover:text-black z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"> 
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487l3.651 3.65M4.5 19.5l3.878-.53 9.48-9.48a1.125 1.125 0 000-1.59l-3.65-3.65a1.125 1.125 0 00-1.59 0l-9.48 9.48L4.5 19.5z" />
        </svg>
    </button>

        <div class="flex gap-10">
            
            <!-- FOTO PROFIL -->
            <div class="flex flex-col items-center text-center">
                <div class="w-44 h-44 bg-gray-300 rounded-full overflow-hidden flex items-center justify-center">
                    <img src="<?= base_url('uploads/' . ($admin['photo'] ?? 'default-user.png')) ?>" class="w-full h-full object-cover" alt="">
                </div>

                <h2 class="text-xl font-bold mt-4"><?= $admin['name'] ?></h2>
                <p class="text-sm text-gray-600"><?= $admin['role'] ?></p>
            </div>

            <!-- INFO PROFIL -->
            <div class="flex-1">
                <h2 class="text-2xl font-bold"><?= $admin['full_name'] ?></h2>

                <p class="text-gray-700 mt-2 max-w-lg">
                    <?= $admin['description'] ?>
                </p>

                <h3 class="text-xl font-bold mt-6"><?= $admin['skill_title'] ?></h3>

                <ul class="mt-3 space-y-2">
                    <?php foreach ($skills as $s): ?>
                        <li class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-yellow-500 rounded-full"></span> <?= $s['skill_name']?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-xl w-[450px] shadow-xl relative">

            <h2 class="text-xl font-bold mb-4">Edit Profil</h2>

            <form action="<?= base_url('/admin/updateProfile') ?>" method="POST" enctype="multipart/form-data">

                <label class="block font-semibold">Foto</label>
                <input type="file" name="photo" class="w-full border p-2 rounded mb-4">

                <label class="block font-semibold">Nama</label>
                <input type="text" name="name" value="<?= $admin['name'] ?>" class="w-full border p-2 rounded mb-4">

                <label class="block font-semibold">Nama Lengkap</label>
                <input type="text" name="full_name" value="<?= $admin['full_name'] ?>" class="w-full border p-2 rounded mb-4">

                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded mb-4" rows="4"><?= $admin['description'] ?></textarea>

                <label class="block font-semibold">Judul Skill</label>
                <input type="text" name="skill_title" value="<?= $admin['skill_title'] ?>" class="w-full border p-2 rounded mb-4">

                <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg"> Simpan </button>
                <button type="button" onclick="closeEditModal()" class="ml-2 text-gray-700 px-4 py-2"> Batal </button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>
<?= $this->endSection() ?>
