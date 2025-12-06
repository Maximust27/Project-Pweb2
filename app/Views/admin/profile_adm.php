<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="p-8">
    
    <!-- Notifikasi Flash Data -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <div class="bg-white shadow-lg rounded-xl p-10 border border-gray-200 relative">

        <!-- ICON EDIT -->
        <button onclick="openEditModal()" class="absolute top-4 right-4 text-gray-500 hover:text-black hover:bg-gray-100 p-2 rounded-full transition z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 3.487l3.651 3.65M4.5 19.5l3.878-.53 9.48-9.48a1.125 1.125 0 000-1.59l-3.65-3.65a1.125 1.125 0 00-1.59 0l-9.48 9.48L4.5 19.5z" />
            </svg>
        </button>

        <div class="flex flex-col md:flex-row gap-10">
            
            <!-- FOTO PROFIL -->
            <div class="flex flex-col items-center text-center flex-shrink-0">
                <div class="w-44 h-44 bg-gray-200 rounded-full overflow-hidden flex items-center justify-center border-4 border-white shadow-md">
                    <img src="<?= base_url('uploads/' . ($admin['photo'] ?? 'default.png')) ?>" 
                         class="w-full h-full object-cover" 
                         alt="Foto Profil"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($admin['name']) ?>&background=random'">
                </div>

                <h2 class="text-xl font-bold mt-4 text-gray-800"><?= esc($admin['name']) ?></h2>
                <p class="text-sm text-gray-500">Administrator</p>
            </div>

            <!-- INFO PROFIL -->
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-800 mb-4"><?= esc($admin['full_name']) ?></h2>

                <div class="prose max-w-none text-gray-600 mb-6">
                    <p><?= nl2br(esc($admin['description'])) ?></p>
                </div>

                <?php if(!empty($admin['skill_title'])): ?>
                    <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-3"><?= esc($admin['skill_title']) ?></h3>
                <?php endif; ?>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <?php if(!empty($skills)): ?>
                        <?php foreach ($skills as $s): ?>
                            <li class="flex items-center gap-3 bg-gray-50 px-3 py-2 rounded-md">
                                <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full"></span> 
                                <span class="text-gray-700 font-medium"><?= esc($s['skill_name'])?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-gray-400 italic">Belum ada skill yang ditambahkan.</li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 items-center justify-center overflow-auto p-4 backdrop-blur-sm transition-opacity">
    <div class="bg-white p-8 rounded-xl w-full max-w-4xl shadow-2xl relative animate-fade-in-down">

        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form action="<?= base_url('/admin/updateProfile') ?>" method="POST" enctype="multipart/form-data">
            
            <?= csrf_field() ?>
            <!-- Foto lama -->
            <input type="hidden" name="photoLama" value="<?= $admin['photo'] ?>">

            <!-- GRID DUA KOLOM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- KOLOM KIRI: Foto & Nama -->
                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Foto Profil</label>
                        <input type="file" name="photo" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Max: 10MB.</p>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Nama Panggilan</label>
                        <input type="text" name="name" value="<?= esc($admin['name']) ?>" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="full_name" value="<?= esc($admin['full_name']) ?>" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    </div>
                </div>

                <!-- KOLOM KANAN: Deskripsi & Skills -->
                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Deskripsi Diri</label>
                        <textarea name="description" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="5"><?= esc($admin['description']) ?></textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Judul Bagian Skill</label>
                        <input type="text" name="skill_title" value="<?= esc($admin['skill_title']) ?>" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contoh: My Expertise">
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block font-semibold text-gray-700">Daftar Skills</label>
                            <button type="button" onclick="addSkill()" class="text-sm bg-blue-50 text-blue-600 px-3 py-1 rounded hover:bg-blue-100 font-medium">+ Tambah</button>
                        </div>
                        
                        <div id="skillsContainer" class="max-h-40 overflow-y-auto space-y-2 pr-2">
                            <?php foreach ($skills as $s): ?>
                                <div class="flex gap-2">
                                    <input type="text" name="skills[]" value="<?= esc($s['skill_name']) ?>" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BUTTON SIMPAN / BATAL -->
            <div class="mt-8 flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeEditModal()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Batal</button>
                <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition shadow-lg">Simpan Perubahan</button>
            </div>

        </form>
    </div>
</div>

<script>
    function addSkill() {
        let container = document.getElementById('skillsContainer');
        let div = document.createElement('div');
        div.className = 'flex gap-2 mt-2';
        
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'skills[]';
        input.placeholder = 'Masukkan nama skill...';
        input.className = 'w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none';
        
        div.appendChild(input);
        container.appendChild(div);
        
        // Auto scroll ke bawah saat tambah
        container.scrollTop = container.scrollHeight;
    }

    function openEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Mencegah scroll body
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto'; // Mengembalikan scroll body
    }
    
    // Close modal on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
</script>

<?= $this->endSection() ?>