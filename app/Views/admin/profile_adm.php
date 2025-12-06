<?= $this->extend('layout_admin/sidebar') ?>

<?= $this->section('page_title') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-gray-50 flex justify-center items-start pt-10 px-4 font-sans">
    
    <!-- Notifikasi Sukses -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div id="alert-success" class="fixed top-5 right-5 z-50 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 animate-bounce-in">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span><?= session()->getFlashdata('success') ?></span>
            <button onclick="document.getElementById('alert-success').remove()" class="ml-4 text-green-800 font-bold">&times;</button>
        </div>
    <?php endif; ?>

    <!-- MAIN CARD -->
    <div class="bg-white rounded-[40px] shadow-xl p-10 md:p-16 max-w-6xl w-full flex flex-col md:flex-row gap-12 relative overflow-hidden">
        
        <!-- BUTTON EDIT (Pojok Kanan Atas) -->
        <button onclick="openEditModal()" class="absolute top-8 right-8 text-gray-400 hover:text-[#B8860B] transition duration-300 p-2 rounded-full hover:bg-yellow-50" title="Edit Profil">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </button>

        <!-- BAGIAN KIRI: Foto, Nama Panggilan, Role -->
        <div class="w-full md:w-1/3 flex flex-col items-center text-center">
            
            <!-- Lingkaran Foto -->
            <div class="relative group cursor-pointer" onclick="openEditModal()">
                <div class="w-64 h-64 bg-gray-200 rounded-full overflow-hidden border-4 border-transparent group-hover:border-[#B8860B] transition-all duration-300 shadow-sm flex items-center justify-center">
                    <?php if(!empty($admin['photo']) && file_exists('uploads/' . $admin['photo'])): ?>
                        <img src="<?= base_url('uploads/' . $admin['photo']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <!-- Placeholder Icon jika tidak ada foto (Mirip gambar referensi) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                    <?php endif; ?>
                </div>

                <!-- Overlay Edit saat Hover -->
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-full flex items-center justify-center transition-all duration-300">
                    <span class="bg-white p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#B8860B]" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Nama Panggilan (Serif Besar) -->
            <h1 class="text-4xl font-serif font-bold text-black mt-8 mb-1 tracking-wide">
                <?= esc($admin['name'] ?? 'Your Name') ?>
            </h1>
            
            <!-- Role (Kecil di bawah nama) -->
            <p class="text-gray-600 font-serif text-lg tracking-wide">
                <?= esc($admin['role'] ?? 'Your Role') ?>
            </p>
        </div>

        <!-- BAGIAN KANAN: Detail & Skills -->
        <div class="flex-1 flex flex-col justify-start pt-4">
            
            <!-- Nama Lengkap (Serif Sangat Besar) -->
            <h2 class="text-5xl md:text-6xl font-serif font-bold text-black mb-6 tracking-tight leading-tight">
                <?= esc($admin['full_name'] ?? 'Full Name') ?>
            </h2>

            <!-- Deskripsi -->
            <div class="text-gray-700 text-lg leading-relaxed mb-10 max-w-2xl font-light">
                <?= nl2br(esc($admin['description'] ?? 'Tambahkan deskripsi singkat tentang diri Anda di sini.')) ?>
            </div>

            <!-- Judul Skill (Serif Besar) -->
            <h3 class="text-4xl font-serif font-bold text-black mb-6 tracking-wide">
                <?= esc($admin['skill_title'] ?? 'My Skills') ?>
            </h3>

            <!-- List Skills -->
            <ul class="space-y-3">
                <?php if(!empty($skills)): ?>
                    <?php foreach ($skills as $s): ?>
                        <li class="flex items-center gap-4 group">
                            <!-- Icon Centang Emas Solid -->
                            <div class="w-6 h-6 bg-[#B8860B] rounded-full flex items-center justify-center flex-shrink-0 shadow-sm group-hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-white stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-xl text-gray-800 font-light"><?= esc($s['skill_name']) ?></span>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="text-gray-400 italic pl-2">Belum ada skill yang ditambahkan.</li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</div>

<!-- MODAL EDIT FORM -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-60 hidden z-[999] items-center justify-center overflow-y-auto backdrop-blur-sm transition-opacity duration-300">
    <div class="bg-white m-4 p-8 rounded-3xl w-full max-w-3xl shadow-2xl relative transform scale-95 transition-transform duration-300" id="modalContent">
        
        <div class="flex justify-between items-center mb-8 border-b border-gray-100 pb-4">
            <h2 class="text-3xl font-serif font-bold text-gray-900">Edit Profil</h2>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-red-500 transition-colors p-2 rounded-full hover:bg-red-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form action="<?= base_url('/admin/updateProfile') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="photoLama" value="<?= $admin['photo'] ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Panggilan</label>
                        <input type="text" name="name" value="<?= esc($admin['name']) ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#B8860B] focus:border-transparent outline-none transition shadow-sm" placeholder="Contoh: Rocky">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan / Role</label>
                        <input type="text" name="role" value="<?= esc($admin['role']) ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#B8860B] focus:border-transparent outline-none transition shadow-sm" placeholder="Contoh: Master Barber">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="full_name" value="<?= esc($admin['full_name']) ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#B8860B] focus:border-transparent outline-none transition shadow-sm" placeholder="Contoh: Rocky Gerung">
                    </div>
                    
                    <!-- Upload Foto Custom -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-dashed border-gray-300 hover:border-[#B8860B] transition">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Foto Profil</label>
                        <input type="file" name="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#B8860B] file:text-white hover:file:bg-yellow-700 transition cursor-pointer">
                        <p class="text-xs text-gray-400 mt-2">*Format: JPG, PNG. Max 2MB.</p>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Diri</label>
                        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#B8860B] focus:border-transparent outline-none transition shadow-sm resize-none"><?= esc($admin['description']) ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Bagian Skill</label>
                        <input type="text" name="skill_title" value="<?= esc($admin['skill_title']) ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#B8860B] focus:border-transparent outline-none transition shadow-sm" placeholder="Contoh: Master Of Hair cut">
                    </div>
                    
                    <!-- Dynamic Skills Input -->
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <label class="block text-sm font-bold text-gray-700">Daftar Keahlian</label>
                            <button type="button" onclick="addSkill()" class="text-xs bg-white text-[#B8860B] border border-[#B8860B] px-3 py-1 rounded-full font-bold hover:bg-[#B8860B] hover:text-white transition">+ Tambah</button>
                        </div>
                        <div id="skillsContainer" class="max-h-40 overflow-y-auto pr-2 space-y-2 custom-scrollbar">
                            <?php foreach ($skills as $s): ?>
                                <div class="flex items-center gap-2 animate-fade-in">
                                    <span class="text-[#B8860B]">•</span>
                                    <input type="text" name="skills[]" value="<?= esc($s['skill_name']) ?>" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-[#B8860B] outline-none">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-end gap-4 border-t border-gray-100 pt-6">
                <button type="button" onclick="closeEditModal()" class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 font-bold transition">Batal</button>
                <button type="submit" class="px-8 py-3 rounded-xl bg-[#B8860B] text-white hover:bg-yellow-700 font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Animasi sederhana untuk modal */
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    
    .animate-bounce-in { animation: slideUp 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); }
    
    /* Scrollbar cantik untuk list skill */
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { bg: #f1f1f1; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #B8860B; }
</style>

<script>
    function openEditModal() {
        const modal = document.getElementById('editModal');
        const content = document.getElementById('modalContent');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Animasi masuk
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
        document.body.style.overflow = 'hidden';
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        const content = document.getElementById('modalContent');
        // Animasi keluar
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }, 200);
    }

    function addSkill() {
        const container = document.getElementById('skillsContainer');
        const div = document.createElement('div');
        div.className = 'flex items-center gap-2 animate-fade-in mt-2';
        div.innerHTML = `
            <span class="text-[#B8860B]">•</span>
            <input type="text" name="skills[]" placeholder="Keahlian baru..." class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-1 focus:ring-[#B8860B] outline-none">
        `;
        container.appendChild(div);
        container.scrollTop = container.scrollHeight;
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