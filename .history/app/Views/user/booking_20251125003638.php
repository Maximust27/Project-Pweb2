<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<style>
  .font-montaga { font-family: "Montaga", serif; }
  
  /* Active State (Gold) */
  .gold-bg {
    background: linear-gradient(180deg,#C59A2D 0%,#B88420 100%) !important;
    color: white !important;
    border-color: transparent !important;
  }
  
  .card-shadow { box-shadow: 0 6px 18px rgba(16,24,40,0.08); }
  
  .hover-gold:hover {
    background: linear-gradient(180deg,#C59A2D 0%,#B88420 100%);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border-color: transparent;
  }

  /* Styling Khusus Slot Booked (Merah) */
  .booked-slot {
    background-color: #EF4444 !important;
    color: white !important;
    border-color: #EF4444 !important;
    cursor: not-allowed !important;
    opacity: 0.6;
  }
</style>

<form action="<?= base_url('booking/save') ?>" method="POST" id="bookingForm">
<main class="font-montaga bg-white text-gray-800 relative">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8 pb-32">

    <input type="hidden" name="selected_services_json" id="jsonInput">
    <input type="hidden" name="stylist" id="selectedStylist">
    <input type="hidden" name="time" id="selectedTime">

    <div class="text-center mb-8">
      <h3 class="text-base text-lg lg:text-2xl text-[#C59A2D] font-semibold">Silahkan Pilih Service</h3>
    </div>

    <section class="mb-8 lg:mb-12">
      <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Haircut</h4>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <?php
          $haircuts = [
            ['label'=>'Basic','price'=>'25.000'],
            ['label'=>'Beard','price'=>'25.000'],
            ['label'=>'Cornrow','price'=>'125.000'],
            ['label'=>'Gimbal','price'=>'125.000'],
          ];
          foreach($haircuts as $h):
            // LOGIKA NAMA FILE: "Basic" -> "gambar_basic.jpg"
            $cleanName = strtolower(str_replace([' + ', ' '], '_', $h['label']));
            $img = "gambar_" . $cleanName . ".jpg";
        ?>
        <div class="flex flex-col">
          <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
            <img src="/img/<?= $img ?>" class="w-full h-full object-cover">
          </div>
          <div class="text-center">
            <div class="text-sm lg:text-base text-gray-800 mb-2"><?= $h['label'] ?></div>
            <button type="button"
              class="service-btn inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold transition-all duration-300"
              onclick="toggleService(this)"
              data-name="<?= $h['label'] ?>"
              data-price="<?= $h['price'] ?>"
              data-image="/img/<?= $img ?>">
              <?= $h['price'] ?>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Coloring</h4>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
          <?php
            $colorings = [
              ['label'=>'Coloring','price'=>'100.000'],
              ['label'=>'Bleaching','price'=>'100.000'],
              ['label'=>'Bleaching + Coloring','price'=>'120.000'],
              ['label'=>'Bleaching + Buzzcut','price'=>'120.000'],
            ];
            foreach($colorings as $c):
                // LOGIKA NAMA FILE: "Bleaching + Coloring" -> "gambar_bleaching_coloring.jpg"
                $cleanName = strtolower(str_replace([' + ', ' '], '_', $c['label']));
                $img = "gambar_" . $cleanName . ".jpg";
          ?>
          <div class="flex flex-col">
            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
              <img src="/img/<?= $img ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <div class="text-sm lg:text-base text-white mb-2"><?= $c['label'] ?></div>
              <button type="button"
                class="service-btn inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold transition-all duration-300"
                onclick="toggleService(this)"
                data-name="<?= $c['label'] ?>"
                data-price="<?= $c['price'] ?>"
                data-image="/img/<?= $img ?>">
                <?= $c['price'] ?>
              </button>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="mb-8 lg:mb-12">
      <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Perming</h4>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
        <?php
          $perms = [
            ['label'=>'Hair Perm','price'=>'100.000'],
            ['label'=>'Down Perm','price'=>'100.000']
          ];
          foreach($perms as $p):
            // LOGIKA NAMA FILE: "Hair Perm" -> "gambar_hair_perm.jpg"
            $cleanName = strtolower(str_replace([' + ', ' '], '_', $p['label']));
            $img = "gambar_" . $cleanName . ".jpg";
        ?>
        <button type="button"
          class="service-btn bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 hover-gold w-full text-left transition-all duration-300"
          onclick="toggleService(this)"
          data-name="<?= $p['label'] ?>"
          data-price="<?= $p['price'] ?>"
          data-image="/img/<?= $img ?>">
          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
            <img src="/img/<?= $img ?>" class="w-full h-full object-cover">
          </div>
          <div class="flex flex-col justify-center text-left">
            <div class="text-base lg:text-lg text-gray-800 mb-2"><?= $p['label'] ?></div>
            <div class="text-sm lg:text-base font-semibold text-gray-800"><?= $p['price'] ?></div>
          </div>
        </button>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Treatment</h4>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
          <?php
            $treatments = [
              ['label'=>'Keratin Treatment','price'=>'100.000'],
              ['label'=>'Creambath Treatment','price'=>'100.000']
            ];
            foreach($treatments as $t):
               // LOGIKA NAMA FILE: "Keratin Treatment" -> "gambar_keratin_treatment.jpg"
               $cleanName = strtolower(str_replace([' + ', ' '], '_', $t['label']));
               $img = "gambar_" . $cleanName . ".jpg";
          ?>
          <button type="button"
            class="service-btn bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 hover-gold w-full text-left transition-all duration-300"
            onclick="toggleService(this)"
            data-name="<?= $t['label'] ?>"
            data-price="<?= $t['price'] ?>"
            data-image="/img/<?= $img ?>">
            <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
              <img src="/img/<?= $img ?>" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center text-left">
              <div class="text-base lg:text-lg text-gray-800 mb-2"><?= $t['label'] ?></div>
              <div class="text-sm lg:text-base font-semibold text-gray-800"><?= $t['price'] ?></div>
            </div>
          </button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="stylistSection" class="mb-8 lg:mb-12 scroll-mt-10">
      <div class="bg-[#F3F4F6] rounded-2xl lg:py-10 py-8">
        <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Stylist</h4>

        <div class="flex justify-center gap-6 lg:gap-10">
          <?php
            $stylists = ['Tisna','Pinkky','Ahnaf'];
            foreach($stylists as $s):
              // Ubah "Tisna" jadi "tisna.jpg" (Huruf kecil)
              $imgStylist = strtolower($s) . ".jpg";
          ?>
          <button type="button"
            class="flex flex-col items-center bg-white text-gray-800 rounded-2xl p-3 card-shadow option-btn-2 hover-gold"
            data-group="stylist"
            data-label="<?= $s ?>">
            
            <div class="w-24 h-32 lg:w-32 lg:h-40 rounded-2xl bg-gray-200 overflow-hidden mb-3">
              <img src="/img/<?= $imgStylist ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-sm lg:text-base font-semibold"><?= $s ?></div>
          </button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="timeSection" class="mb-6 lg:mb-10 scroll-mt-10">
      <div class="bg-[#1A1A1A] rounded-3xl p-6 lg:p-10">
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-3 lg:gap-4 mb-4 lg:mb-6">
          <?php foreach($slots as $slot): ?>
              <?php 
                  $isBooked = $stylist ? $bookingModel->isBooked($slot, $stylist) : false;
              ?>
              <button type="button"
                  class="
                      text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border option-btn-2
                      <?= $isBooked ? 'booked-slot' : 'bg-white text-gray-900 border-gray-200 hover-gold' ?>
                  "
                  data-group="time"
                  data-label="<?= $slot ?>"
                  <?= $isBooked ? 'disabled' : '' ?>
              >
                  <?= $slot ?> </button>
          <?php endforeach; ?>
        </div>
<<<<<<< HEAD
          
        <div class="text-center mt-4 lg:mt-6">
          <button type="submit"
            class="px-8 lg:px-12 py-2 lg:py-3 rounded-full bg-black text-white text-sm lg:text-base hover:bg-gray-800 transition-colors">
            Booking
          </button>
        </div>
      </div>
    </section>
  </div>
=======
        
        <p class="text-center text-gray-400 text-sm italic mt-2">Pastikan Service, Stylist, dan Jam sudah dipilih.</p>
      </div>
    </section>
  </div>

  <div class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-[0_-5px_15px_rgba(0,0,0,0.1)] z-50">
      <div class="max-w-4xl mx-auto flex justify-between items-center">
          <div>
              <p class="text-xs text-gray-500 mb-1">Total Estimasi</p>
              <h3 class="text-xl lg:text-2xl font-bold text-[#C59A2D]" id="displayTotal">Rp 0</h3>
              <p class="text-xs text-gray-400" id="displayCount">0 Service dipilih</p>
          </div>
          <button type="submit" 
            class="px-8 lg:px-12 py-3 rounded-full bg-black text-white text-sm lg:text-base font-semibold hover:bg-gray-800 transition-colors shadow-lg"
            onclick="return validateForm()">
            Konfirmasi Booking
          </button>
      </div>
  </div>

>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
</main>
</form>

<script>
<<<<<<< HEAD
    // Elements
    const serviceInput = document.getElementById('selectedService');
    const stylistInput = document.getElementById('selectedStylist');
    const timeInput = document.getElementById('selectedTime');
    const serviceButtons = document.querySelectorAll('.option-btn');
    const stylistButtons = document.querySelectorAll('.option-btn-2[data-group="stylist"]');
    const timeButtons = document.querySelectorAll('.option-btn-2[data-group="time"]');

    // 1. Logic Pilih Service (Auto Scroll ke Stylist)
    serviceButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Reset visual tombol service
            serviceButtons.forEach(b => {
                b.classList.remove('gold-bg', 'text-white');
                b.classList.add('bg-white', 'text-gray-800');
            });
            
            // Highlight tombol yang dipilih
            btn.classList.remove('bg-white', 'text-gray-800');
            btn.classList.add('gold-bg', 'text-white');
            
            // Simpan data
            serviceInput.value = btn.dataset.label;

            // === FITUR BARU: AUTO SCROLL KE STYLIST ===
            document.getElementById('stylistSection').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        });
    });

    // 2. Logic Pilih Stylist (Cek Slot AJAX + Visual Update)
    stylistButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Visual Stylist Active
            stylistButtons.forEach(b => b.classList.remove('gold-bg', 'text-white'));
            btn.classList.add('gold-bg', 'text-white');

            // Simpan data
            stylistInput.value = btn.dataset.label;

            // Panggil Data Slot Terbaru
            checkAvailability(btn.dataset.label);

            // Opsional: Auto Scroll ke Jam
=======
    // --- VARIABEL & ELEMEN ---
    let selectedServices = []; 
    const jsonInput = document.getElementById('jsonInput');
    
    const stylistInput = document.getElementById('selectedStylist');
    const timeInput = document.getElementById('selectedTime');
    
    const stylistButtons = document.querySelectorAll('.option-btn-2[data-group="stylist"]');
    const timeButtons = document.querySelectorAll('.option-btn-2[data-group="time"]');

    // --- 1. LOGIKA PILIH SERVICE ---
    function toggleService(btn) {
        const name  = btn.dataset.name;
        const price = btn.dataset.price;
        const image = btn.dataset.image;

        const index = selectedServices.findIndex(item => item.name === name);

        if (index > -1) {
            selectedServices.splice(index, 1);
            btn.classList.remove('gold-bg', 'text-white', 'border-transparent');
            btn.classList.add('bg-white', 'text-gray-800');
        } else {
            selectedServices.push({ name, price, image });
            btn.classList.remove('bg-white', 'text-gray-800');
            btn.classList.add('gold-bg', 'text-white', 'border-transparent');
        }

        updateCartUI();
    }

    function updateCartUI() {
        let total = 0;
        selectedServices.forEach(item => {
            let priceNum = parseInt(item.price.replace(/\./g, ''));
            total += priceNum;
        });

        document.getElementById('displayTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('displayCount').innerText = selectedServices.length + ' Service dipilih';
        jsonInput.value = JSON.stringify(selectedServices);
    }

    // --- 2. LOGIKA PILIH STYLIST ---
    stylistButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            stylistButtons.forEach(b => b.classList.remove('gold-bg', 'text-white'));
            btn.classList.add('gold-bg', 'text-white');

            stylistInput.value = btn.dataset.label;
            checkAvailability(btn.dataset.label);

>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
            setTimeout(() => {
                 document.getElementById('timeSection').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        });
    });

<<<<<<< HEAD
    // 3. Logic Pilih Jam
=======
    // --- 3. LOGIKA PILIH JAM ---
>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
    timeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            if(!stylistInput.value) {
                alert("Silahkan pilih Stylist terlebih dahulu.");
                document.getElementById('stylistSection').scrollIntoView({ behavior: 'smooth' });
                return;
            }

<<<<<<< HEAD
            // Reset Visual Jam (yang available saja)
            timeButtons.forEach(b => {
                if(!b.disabled) {
                   b.classList.remove('gold-bg', 'text-white', 'border-transparent');
                   b.classList.add('bg-white', 'text-gray-900');
                }
            });
            
            // Highlight Jam Dipilih
            btn.classList.remove('bg-white', 'text-gray-900');
            btn.classList.add('gold-bg', 'text-white', 'border-transparent');

            // Simpan data
=======
            timeButtons.forEach(b => {
                if(!b.disabled) {
                   b.classList.remove('gold-bg', 'text-white', 'border-transparent');
                   b.classList.add('bg-white', 'text-gray-900', 'border-gray-200');
                }
            });
            
            btn.classList.remove('bg-white', 'text-gray-900', 'border-gray-200');
            btn.classList.add('gold-bg', 'text-white', 'border-transparent');

>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
            timeInput.value = btn.dataset.label;
        });
    });

<<<<<<< HEAD
    // 4. Fungsi Cek Slot (Update Visual Booked)
    function checkAvailability(stylistName) {
        document.body.style.cursor = 'wait';

=======
    // --- 4. VALIDASI ---
    function validateForm() {
        if (selectedServices.length === 0) {
            alert("Harap pilih minimal satu Service!");
            return false;
        }
        if (stylistInput.value === "") {
            alert("Harap pilih Stylist!");
            document.getElementById('stylistSection').scrollIntoView({ behavior: 'smooth' });
            return false;
        }
        if (timeInput.value === "") {
            alert("Harap pilih Jam booking!");
            document.getElementById('timeSection').scrollIntoView({ behavior: 'smooth' });
            return false;
        }
        return true;
    }

    // --- 5. CEK SLOT AJAX ---
    function checkAvailability(stylistName) {
        document.body.style.cursor = 'wait';
>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
        fetch(`/booking/slots?stylist=${stylistName}`)
            .then(res => res.json())
            .then(data => {
                document.body.style.cursor = 'default';
<<<<<<< HEAD

                timeButtons.forEach(btn => {
                    const slotData = data.find(s => s.time === btn.dataset.label);
                    
                    // Reset ke kondisi default bersih dulu
                    btn.className = "text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border option-btn-2 transition-all duration-300 ";

                    if (slotData && slotData.booked) {
                        // === KONDISI BOOKED (MERAH SAJA, TANPA TEKS TAMBAHAN) ===
                        btn.classList.add("booked-slot"); // Class khusus merah
                        btn.disabled = true;
                        btn.innerText = btn.dataset.label; // Tetap "10.00" saja
                        
                        // Hapus input jika user sebelumnya memilih jam ini
=======
                timeButtons.forEach(btn => {
                    const slotData = data.find(s => s.time === btn.dataset.label);
                    
                    btn.className = "text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border option-btn-2 transition-all duration-300 ";

                    if (slotData && slotData.booked) {
                        btn.classList.add("booked-slot");
                        btn.disabled = true;
>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
                        if (timeInput.value === btn.dataset.label) {
                            timeInput.value = ""; 
                        }
                    } else {
<<<<<<< HEAD
                        // === KONDISI AVAILABLE ===
                        btn.disabled = false;
                        btn.innerText = btn.dataset.label; // "10.00"

                        // Cek state aktif
=======
                        btn.disabled = false;
>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
                        if (timeInput.value === btn.dataset.label) {
                            btn.classList.add("gold-bg", "text-white", "border-transparent");
                        } else {
                            btn.classList.add("bg-white", "text-gray-900", "border-gray-200", "hover-gold");
                        }
                    }
                });
            })
            .catch(err => {
                console.error(err);
                document.body.style.cursor = 'default';
            });
    }

<<<<<<< HEAD
    // Auto Refresh (Opsional)
=======
>>>>>>> 96c14c46a1be60d59fc797b4299e5832bfc812fc
    setInterval(() => {
        if(stylistInput.value) checkAvailability(stylistInput.value);
    }, 5000);

</script>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>