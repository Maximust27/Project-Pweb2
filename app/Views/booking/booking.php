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

<main class="font-montaga bg-white text-gray-800">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8">

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
            <button class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn" data-group="haircut">
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
              <button class="inline-block bg-white text-gray-800 text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg border border-gray-200 hover-gold option-btn" data-group="coloring">
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
        <button class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn border border-gray-200" data-group="perming">
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
          <button class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5 option-btn border border-gray-200" data-group="treatment">
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
          <button class="flex flex-col items-center bg-white text-gray-800 rounded-2xl p-3 card-shadow option-btn-2" data-group="stylist">
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
          <?php
            $slots = ['09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00'];
            foreach($slots as $slot):
          ?>
          <button class="bg-white text-gray-900 text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full border border-gray-200 hover-gold option-btn-2" data-group="time">
            <?= $slot ?>
          </button>
          <?php endforeach; ?>
        </div>

        <div class="text-center mt-4 lg:mt-6">
          <button class="px-8 lg:px-12 py-2 lg:py-3 rounded-full bg-black text-white text-sm lg:text-base hover:bg-gray-800 transition-colors">Booking</button>
        </div>
      </div>
    </section>

  </div>
</main>

<script>
  // hanya satu yang bisa aktif per grup
  document.querySelectorAll('.option-btn-2').forEach(btn => {
    btn.addEventListener('click', () => {
      const group = btn.dataset.group;
      const siblings = document.querySelectorAll(`.option-btn-2[data-group="${group}"]`);
      const isActive = btn.classList.contains('gold-bg');

      // kalau tombol sudah aktif → kembalikan ke putih (unselect)
      if (isActive) {
        btn.classList.remove('gold-bg');
        btn.classList.add('bg-white', 'text-gray-800');
        return;
      }

      // kalau tombol belum aktif → nonaktifkan semua dulu
      siblings.forEach(b => {
        b.classList.remove('gold-bg');
        b.classList.add('bg-white', 'text-gray-800');
      });

      // lalu aktifkan tombol yang diklik
      btn.classList.add('gold-bg');
      btn.classList.remove('bg-white', 'text-gray-800');
    });
  });

  // Toggle gold ketika diklik
  document.querySelectorAll('.option-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.toggle('gold-bg');
      if (btn.classList.contains('gold-bg')) {
        btn.classList.remove('bg-white', 'text-gray-800');
      } else {
        btn.classList.add('bg-white', 'text-gray-800');
      }
    });
  });

</script>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>
