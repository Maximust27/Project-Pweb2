<?= $this->extend('user/header-user') ?>
<?= $this->section('content') ?>

<style>
  .font-montaga { font-family: "Montaga", serif; }
  
  /* Active State */
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

  /* Styling Khusus Slot Booked (Merah Bersih) */
  .booked-slot {
    background-color: #EF4444 !important; /* Tailwind Red-500 */
    color: white !important;
    border-color: #EF4444 !important;
    cursor: not-allowed !important;
    opacity: 0.6;
  }
</style>

<form action="<?= base_url('booking/save') ?>" method="POST" id="bookingForm">
<main class="font-montaga bg-white text-gray-800">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8">

    <input type="hidden" name="service" id="selectedService">
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
        ?>
        <div class="flex flex-col">
          <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
            <img src="https://via.placeholder.com/300x300?text=<?= $h['label'] ?>" class="w-full h-full object-cover">
          </div>
          <div class="text-center">
            <div class="text-sm lg:text-base text-gray-800 mb-2"><?= $h['label'] ?></div>
            <button type="button"
              class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn"
              data-label="<?= $h['label'] ?>">
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
              ['label'=>'Basic','price'=>'100.000'],
              ['label'=>'Bleaching','price'=>'100.000'],
              ['label'=>'Bleaching + Coloring','price'=>'120.000'],
              ['label'=>'Bleaching + Perm','price'=>'120.000'],
            ];
            foreach($colorings as $c):
          ?>
          <div class="flex flex-col">
            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
              <img src="https://via.placeholder.com/300x300?text=<?= $c['label'] ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <div class="text-sm lg:text-base text-white mb-2"><?= $c['label'] ?></div>
              <button type="button"
                class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn"
                data-label="<?= $c['label'] ?>">
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
        ?>
        <button type="button"
          class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn hover-gold w-full text-left"
          data-label="<?= $p['label'] ?>">
          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
            <img src="https://via.placeholder.com/200x200?text=<?= str_replace(' ','+',$p['label']) ?>" class="w-full h-full object-cover">
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
          ?>
          <button type="button"
            class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn hover-gold w-full text-left"
            data-label="<?= $t['label'] ?>">
            <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
              <img src="https://via.placeholder.com/200x200?text=<?= str_replace(' ','+',$t['label']) ?>" class="w-full h-full object-cover">
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
          ?>
          <button type="button"
            class="flex flex-col items-center bg-white text-gray-800 rounded-2xl p-3 card-shadow option-btn-2 hover-gold"
            data-group="stylist"
            data-label="<?= $s ?>">
            
            <div class="w-24 h-32 lg:w-32 lg:h-40 rounded-2xl bg-gray-200 overflow-hidden mb-3">
              <img src="https://via.placeholder.com/150x200?text=<?= $s ?>" class="w-full h-full object-cover">
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
          
        <div class="text-center mt-4 lg:mt-6">
          <button type="submit"
            class="px-8 lg:px-12 py-2 lg:py-3 rounded-full bg-black text-white text-sm lg:text-base hover:bg-gray-800 transition-colors">
            Booking
          </button>
        </div>
      </div>
    </section>
  </div>
</main>
</form>

<script>
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
            setTimeout(() => {
                 document.getElementById('timeSection').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        });
    });

    // 3. Logic Pilih Jam
    timeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            if(!stylistInput.value) {
                alert("Silahkan pilih Stylist terlebih dahulu.");
                document.getElementById('stylistSection').scrollIntoView({ behavior: 'smooth' });
                return;
            }

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
            timeInput.value = btn.dataset.label;
        });
    });

    // 4. Fungsi Cek Slot (Update Visual Booked)
    function checkAvailability(stylistName) {
        document.body.style.cursor = 'wait';

        fetch(`/booking/slots?stylist=${stylistName}`)
            .then(res => res.json())
            .then(data => {
                document.body.style.cursor = 'default';

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
                        if (timeInput.value === btn.dataset.label) {
                            timeInput.value = ""; 
                        }
                    } else {
                        // === KONDISI AVAILABLE ===
                        btn.disabled = false;
                        btn.innerText = btn.dataset.label; // "10.00"

                        // Cek state aktif
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

    // Auto Refresh (Opsional)
    setInterval(() => {
        if(stylistInput.value) checkAvailability(stylistInput.value);
    }, 5000);

</script>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>