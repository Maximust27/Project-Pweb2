<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<style>
  .font-montaga { font-family: "Montaga", serif; }
  .gold-bg {
    background: linear-gradient(180deg,#C59A2D 0%,#B88420 100%) !important;
    color: white !important;
  }
  .card-shadow { box-shadow: 0 6px 18px rgba(16,24,40,0.08); }
  .hover-gold:hover {
    background: linear-gradient(180deg,#C59A2D 0%,#B88420 100%);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
</style>

<form action="<?= base_url('booking/save') ?>" method="POST" id="bookingForm">
<main class="font-montaga bg-white text-gray-800">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8">

    <!-- Hidden Input -->
    <input type="hidden" name="service" id="selectedService">
    <input type="hidden" name="stylist" id="selectedStylist">
    <input type="hidden" name="time" id="selectedTime">

    <!-- Title -->
    <div class="text-center mb-8">
      <h3 class="text-base text-lg lg:text-2xl text-[#C59A2D] font-semibold">Silahkan Pilih Service</h3>
    </div>

    <!-- Haircut -->
    <section class="mb-8 lg:mb-12">
      <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Haircut</h4>
      <div id="haircutOptions" class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">

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
            <img src="https://via.placeholder.com/300x300?text=<?= $h['label'] ?>" alt="<?= $h['label'] ?>" class="w-full h-full object-cover">
          </div>
          <div class="text-center">
            <div class="text-sm lg:text-base text-gray-800 mb-2"><?= $h['label'] ?></div>

            <button type="button"
              class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn"
              data-group="haircut"
              data-label="<?= $h['label'] ?>">
              <?= $h['price'] ?>
            </button>

          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Coloring -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Coloring</h4>
        <div id="coloringOptions" class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">

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
              <img src="https://via.placeholder.com/300x300?text=<?= $c['label'] ?>" alt="<?= $c['label'] ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <div class="text-sm lg:text-base text-white mb-2"><?= $c['label'] ?></div>

              <button type="button"
                class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn"
                data-group="coloring"
                data-label="<?= $c['label'] ?>">
                <?= $c['price'] ?>
              </button>

            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Perming -->
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
          class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn hover-gold"
          data-group="perming"
          data-label="<?= $p['label'] ?>">

          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4">
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

    <!-- Treatment -->
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
            class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn hover-gold"
            data-group="treatment"
            data-label="<?= $t['label'] ?>">

            <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4">
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

    <!-- Stylist -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#F3F4F6] rounded-2xl lg:py-10">
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

    <!-- Time slots -->
    <section class="mb-6 lg:mb-10">
      <div class="bg-[#1A1A1A] rounded-3xl p-6 lg:p-10">
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-3 lg:gap-4 mb-4 lg:mb-6">

          <?php foreach($slots as $slot): ?>
            <?php 
              // Cek apakah sudah dibooking
              $isBooked = $bookingModel->isBooked($slot); 
            ?>

            <button type="button"
              class="
                text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border 
                option-btn-2
                <?php if($isBooked): ?>
                    bg-red-600 text-white border-red-700 cursor-not-allowed opacity-70
                <?php else: ?>
                    bg-white text-gray-900 border-gray-200 hover-gold
                <?php endif; ?>
              "
              data-group="time"
              data-label="<?= $slot ?>"
              <?= $isBooked ? 'disabled' : '' ?>
            >
              <?= $slot ?> <?= $isBooked ? '(Booked)' : '' ?>
            </button>
                
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
  // Service button (multiple allowed)
  document.querySelectorAll('.option-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.option-btn').forEach(b => b.classList.remove('gold-bg'));
      btn.classList.add('gold-bg');

      let label = btn.dataset.label;
      document.getElementById('selectedService').value = label;
    });
  });

  // Single-select group (stylist + time)
  document.querySelectorAll('.option-btn-2').forEach(btn => {
    btn.addEventListener('click', () => {
      const group = btn.dataset.group;
      const siblings = document.querySelectorAll(`.option-btn-2[data-group="${group}"]`);

      siblings.forEach(b => b.classList.remove('gold-bg'));
      btn.classList.add('gold-bg');

      if (group === "stylist") {
        document.getElementById('selectedStylist').value = btn.dataset.label;
      }
      if (group === "time") {
        document.getElementById('selectedTime').value = btn.dataset.label;
      }
    });
  });
</script>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>
