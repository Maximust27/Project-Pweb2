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

<form action="<?= base_url('user/booking/save') ?>" method="POST" id="bookingForm">
<main class="font-montaga bg-white text-gray-800 relative">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8 pb-32">

    <input type="hidden" name="selected_services_json" id="jsonInput">
    <input type="hidden" name="stylist" id="selectedStylist">
    <input type="hidden" name="time" id="selectedTime">

    <div class="text-center mb-8">
      <h3 class="text-base text-lg lg:text-2xl text-[#C59A2D] font-semibold">Silahkan Pilih Service</h3>
    </div>

    <?php 
        // Helper function untuk format rupiah di view
        function formatRupiah($angka){
            return number_format($angka, 0, ',', '.');
        }
    ?>

    <!-- SECTION HAIRCUT -->
    <section class="mb-8 lg:mb-12">
      <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Haircut</h4>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <?php foreach($services as $s): ?>
          <?php if($s['category'] == 'Haircut'): ?>
            <div class="flex flex-col">
              <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
                <!-- Logika Gambar: Cek folder uploads dulu, kalau gak ada pake placeholder/default -->
                <img src="<?= base_url('img/' . $s['image']) ?>" 
                     class="w-full h-full object-cover"
                     onerror="this.src='https://placehold.co/400x400?text=No+Image'">
              </div>
              <div class="text-center">
                <div class="text-sm lg:text-base text-gray-800 mb-2"><?= esc($s['service_name']) ?></div>
                <button type="button"
                  class="service-btn inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold transition-all duration-300"
                  onclick="toggleService(this)"
                  data-name="<?= esc($s['service_name']) ?>"
                  data-price="<?= number_format($s['price'], 0, ',', '.') ?>"
                  data-image="<?= base_url('img/' . $s['image']) ?>">
                  <?= formatRupiah($s['price']) ?>
                </button>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- SECTION COLORING (Dark Background) -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Coloring</h4>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
          <?php foreach($services as $s): ?>
            <?php if($s['category'] == 'Coloring'): ?>
            <div class="flex flex-col">
              <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
                <img src="<?= base_url('img/' . $s['image']) ?>" 
                     class="w-full h-full object-cover"
                     onerror="this.src='https://placehold.co/400x400?text=No+Image'">
              </div>
              <div class="text-center">
                <div class="text-sm lg:text-base text-white mb-2"><?= esc($s['service_name']) ?></div>
                <button type="button"
                  class="service-btn inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold transition-all duration-300"
                  onclick="toggleService(this)"
                  data-name="<?= esc($s['service_name']) ?>"
                  data-price="<?= number_format($s['price'], 0, ',', '.') ?>"
                  data-image="<?= base_url('img/' . $s['image']) ?>">
                  <?= formatRupiah($s['price']) ?>
                </button>
              </div>
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- SECTION PERMING (Horizontal Card) -->
    <section class="mb-8 lg:mb-12">
      <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Perming</h4>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
        <?php foreach($services as $s): ?>
            <?php if($s['category'] == 'Perming'): ?>
            <button type="button"
              class="service-btn bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 hover-gold w-full text-left transition-all duration-300"
              onclick="toggleService(this)"
              data-name="<?= esc($s['service_name']) ?>"
              data-price="<?= number_format($s['price'], 0, ',', '.') ?>"
              data-image="<?= base_url('img/' . $s['image']) ?>">
              <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
                <img src="<?= base_url('img/' . $s['image']) ?>" 
                     class="w-full h-full object-cover"
                     onerror="this.src='https://placehold.co/400x400?text=No+Image'">
              </div>
              <div class="flex flex-col justify-center text-left">
                <div class="text-base lg:text-lg text-gray-800 mb-2"><?= esc($s['service_name']) ?></div>
                <div class="text-sm lg:text-base font-semibold text-gray-800"><?= formatRupiah($s['price']) ?></div>
              </div>
            </button>
            <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- SECTION TREATMENT (Horizontal Card & Dark BG) -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Treatment</h4>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
          <?php foreach($services as $s): ?>
             <?php if($s['category'] == 'Treatment'): ?>
              <button type="button"
                class="service-btn bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 hover-gold w-full text-left transition-all duration-300"
                onclick="toggleService(this)"
                data-name="<?= esc($s['service_name']) ?>"
                data-price="<?= number_format($s['price'], 0, ',', '.') ?>"
                data-image="<?= base_url('img/' . $s['image']) ?>">
                <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
                  <img src="<?= base_url('img/' . $s['image']) ?>" 
                       class="w-full h-full object-cover"
                       onerror="this.src='https://placehold.co/400x400?text=No+Image'">
                </div>
                <div class="flex flex-col justify-center text-left">
                  <div class="text-base lg:text-lg text-gray-800 mb-2"><?= esc($s['service_name']) ?></div>
                  <div class="text-sm lg:text-base font-semibold text-gray-800"><?= formatRupiah($s['price']) ?></div>
                </div>
              </button>
             <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- SECTION STYLIST (Still hardcoded in View unless DB has stylists table) -->
    <section id="stylistSection" class="mb-8 lg:mb-12 scroll-mt-10">
      <div class="bg-[#F3F4F6] rounded-2xl lg:py-10 py-8">
        <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Stylist</h4>

        <div class="flex justify-center gap-6 lg:gap-10">
          <?php
            // Idealnya ini juga dari database (tabel 'stylists')
            // Sementara kita gunakan array $stylists yang dikirim dari controller atau hardcode
            $stylistList = isset($stylists) ? $stylists : ['Tisna','Pinnki','Ahnaf'];
            foreach($stylistList as $s):
              $imgStylist = strtolower($s) . ".jpg";
          ?>
          <button type="button"
            class="flex flex-col items-center bg-white text-gray-800 rounded-2xl p-3 card-shadow option-btn-2 hover-gold"
            data-group="stylist"
            data-label="<?= $s ?>">
            
            <div class="w-24 h-32 lg:w-32 lg:h-40 rounded-2xl bg-gray-200 overflow-hidden mb-3">
              <!-- Asumsi foto stylist masih di folder img/ public -->
              <img src="<?= base_url('img/' . $imgStylist) ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-sm lg:text-base font-semibold"><?= $s ?></div>
          </button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- SECTION TIME -->
    <section id="timeSection" class="mb-6 lg:mb-10 scroll-mt-10">
      <div class="bg-[#1A1A1A] rounded-3xl p-6 lg:p-10">
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-3 lg:gap-4 mb-4 lg:mb-6">
          <?php 
            // Pastikan $slots dikirim dari controller
            $timeSlots = isset($slots) ? $slots : ['10:00','11:00','13:00','...']; 
            foreach($timeSlots as $slot): 
          ?>
              <?php 
                  // Cek booked status (Logic tetap sama)
                  $isBooked = (isset($stylist) && $stylist) ? $bookingModel->isBooked($slot, $stylist) : false;
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
        
        <p class="text-center text-gray-400 text-sm italic mt-2">Pastikan Service, Stylist, dan Jam sudah dipilih.</p>
      </div>
    </section>
  </div>

  <!-- BOTTOM BAR (TOTAL) -->
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

</main>
</form>

<!-- JAVASCRIPT LOGIC (Dipertahankan, hanya path URL disesuaikan) -->
<script>
    let selectedServices = []; 
    const jsonInput = document.getElementById('jsonInput');
    const stylistInput = document.getElementById('selectedStylist');
    const timeInput = document.getElementById('selectedTime');
    const stylistButtons = document.querySelectorAll('.option-btn-2[data-group="stylist"]');
    const timeButtons = document.querySelectorAll('.option-btn-2[data-group="time"]');

    function toggleService(btn) {
        const name  = btn.dataset.name;
        const price = btn.dataset.price; // Format 25.000 (titik)
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
            // Hapus titik ribuan untuk kalkulasi
            let priceNum = parseInt(item.price.replace(/\./g, ''));
            total += priceNum;
        });

        document.getElementById('displayTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('displayCount').innerText = selectedServices.length + ' Service dipilih';
        jsonInput.value = JSON.stringify(selectedServices);
    }

    stylistButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            stylistButtons.forEach(b => b.classList.remove('gold-bg', 'text-white'));
            btn.classList.add('gold-bg', 'text-white');
            stylistInput.value = btn.dataset.label;
            checkAvailability(btn.dataset.label);
            setTimeout(() => {
                  document.getElementById('timeSection').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        });
    });

    timeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            if(!stylistInput.value) {
                alert("Silahkan pilih Stylist terlebih dahulu.");
                document.getElementById('stylistSection').scrollIntoView({ behavior: 'smooth' });
                return;
            }
            timeButtons.forEach(b => {
                if(!b.disabled) {
                   b.classList.remove('gold-bg', 'text-white', 'border-transparent');
                   b.classList.add('bg-white', 'text-gray-900', 'border-gray-200');
                }
            });
            btn.classList.remove('bg-white', 'text-gray-900', 'border-gray-200');
            btn.classList.add('gold-bg', 'text-white', 'border-transparent');
            timeInput.value = btn.dataset.label;
        });
    });

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

    function checkAvailability(stylistName) {
        document.body.style.cursor = 'wait';
        const url = '<?= base_url('user/booking/slots') ?>' + '?stylist=' + stylistName;
        fetch(url)
            .then(res => {
                if (!res.ok) throw new Error("Gagal mengambil data slot");
                return res.json();
            })
            .then(data => {
                document.body.style.cursor = 'default';
                timeButtons.forEach(btn => {
                    const slotData = data.find(s => s.time === btn.dataset.label);
                    // Reset styling
                    btn.className = "text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border option-btn-2 transition-all duration-300 ";
                    
                    if (slotData && slotData.booked) {
                        btn.classList.add("booked-slot");
                        btn.disabled = true;
                        if (timeInput.value === btn.dataset.label) {
                            timeInput.value = ""; 
                            alert("Maaf, slot jam " + btn.dataset.label + " baru saja diambil.");
                        }
                    } else {
                        btn.disabled = false;
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

    // Auto Refresh
    setInterval(() => {
        if(stylistInput.value) checkAvailability(stylistInput.value);
    }, 5000);
</script>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>