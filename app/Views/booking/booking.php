<?= $this->extend('layout_user/header') ?>
<?= $this->section('content') ?>

<style>
  .font-montaga { font-family: "Montaga", serif; }
  .gold-bg {
    background: linear-gradient(180deg,#C59A2D 0%,#B88420 100%);
  }
  .card-shadow { box-shadow: 0 6px 18px rgba(16,24,40,0.08); }
</style>

<main class="font-montaga bg-white text-gray-800">
  <div class="max-w-md lg:max-w-4xl mx-auto px-5 py-8">

    <!-- Title -->
    <div class="text-center mb-8">
      <h3 class="text-base text-lg lg:text-2xl text-[#C59A2D] font-semibold">Silahkan Pilih Service</h3>
    </div>

    <!-- Haircut row -->
    <section class="mb-8 lg:mb-12">
        <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Haircut</h4>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <?php
          $haircuts = [
            ['label'=>'Basic','price'=>'25.000','selected'=>false],
            ['label'=>'Beard','price'=>'25.000','selected'=>true],
            ['label'=>'Cornrow','price'=>'125.000','selected'=>false],
            ['label'=>'Gimbal','price'=>'125.000','selected'=>false],
          ];
          foreach($haircuts as $h):
        ?>
        <div class="flex flex-col">
          <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
            <img src="https://via.placeholder.com/300x300?text=<?= $h['label'] ?>" alt="<?= $h['label'] ?>" class="w-full h-full object-cover">
          </div>
          <div class="text-center">
            <div class="text-sm lg:text-base text-gray-800 mb-2"><?= $h['label'] ?></div>
            <div class="inline-block <?= $h['selected'] ? 'gold-bg text-white' : 'bg-gray-200 text-gray-800' ?> text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg">
              <?= $h['price'] ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Coloring dark band -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Colloring</h4>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
          <?php
            $colorings = [
              ['label'=>'Basic','price'=>'100.000','selected'=>false],
              ['label'=>'Bleaching','price'=>'100.000','selected'=>true],
              ['label'=>'Bleaching + Coloring','price'=>'120.000','selected'=>false],
              ['label'=>'Bleaching + Perm','price'=>'120.000','selected'=>false],
            ];
            foreach($colorings as $c):
          ?>
          <div class="flex flex-col">
            <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gray-200 mb-3">
              <img src="https://via.placeholder.com/300x300?text=<?= $c['label'] ?>" alt="<?= $c['label'] ?>" class="w-full h-full object-cover">
            </div>
            <div class="text-center">
              <div class="text-sm lg:text-base text-white mb-2"><?= $c['label'] ?></div>
              <div class="inline-block <?= $c['selected'] ? 'gold-bg text-white' : 'bg-gray-200 text-gray-800' ?> text-xs lg:text-sm font-semibold px-4 py-1.5 rounded-lg">
                <?= $c['price'] ?>
              </div>
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
        <!-- Hair Perm Card -->
        <div class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row lg:flex-row items-center p-4 lg:p-5">
          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
            <img src="https://via.placeholder.com/200x200?text=Hair+Perm" class="w-full h-full object-cover">
          </div>
          <div class="flex flex-col justify-center">
            <div class="text-base lg:text-lg text-gray-800 mb-2">Hair Perm</div>
            <div class="text-sm lg:text-base font-semibold text-gray-800">100.000</div>
          </div>
        </div>

        <!-- Down Perm Card -->
       <div class="gold-bg rounded-2xl overflow-hidden card-shadow flex flex-row lg:flex-row items-center p-4 lg:p-5">
          <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
            <img src="https://via.placeholder.com/200x200?text=Down+Perm" class="w-full h-full object-cover">
          </div>
          <div class="flex flex-col justify-center">
            <div class="text-base lg:text-lg text-gray-800 mb-2">Down Perm</div>
            <div class="text-sm lg:text-base font-semibold text-gray-800">100.000</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Treatment dark band -->
    <section class="mb-8 lg:mb-12">
      <div class="bg-[#1A1A1A] rounded-2xl py-8 lg:py-10 px-5 lg:px-8">
        <h4 class="text-center text-white text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Treatment</h4>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
          <!-- Keratin Treatment Card -->
          <div class="bg-white rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5">
            <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
              <img src="https://via.placeholder.com/200x200?text=Keratin" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
              <div class="text-base lg:text-lg text-gray-800 mb-2">Keratin Treatment</div>
              <div class="text-sm lg:text-base font-semibold text-gray-800">100.000</div>
            </div>
          </div>

          <!-- Creambath Treatment Card -->
          <div class="gold-bg rounded-2xl overflow-hidden card-shadow flex flex-row items-center p-4 lg:p-5">
            <div class="w-28 h-28 lg:w-32 lg:h-32 rounded-xl overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
              <img src="https://via.placeholder.com/200x200?text=Keratin" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
              <div class="text-base lg:text-lg text-gray-800 mb-2">Creambath Treatment</div>
              <div class="text-sm lg:text-base font-semibold text-gray-800">100.000</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stylist -->
    <section class="mb-8 lg:mb-12">
        <div class="bg-[#F3F4F6] rounded-2xl lg:py-10 ">
            <h4 class="text-center text-[#C59A2D] text-lg lg:text-xl font-semibold mb-6 lg:mb-8">Stylist</h4>
            <div class="flex justify-center gap-6 lg:gap-10">
              <?php
                $stylists = [
                  ['name'=>'Tisna','selected'=>true],
                  ['name'=>'Pinkky','selected'=>false],
                  ['name'=>'Ahnaf','selected'=>false]
                ];
                foreach($stylists as $s):
              ?>
                <div class="flex flex-col items-center">
                  <div class="w-24 h-32 lg:w-32 lg:h-40 rounded-2xl bg-gray-200 overflow-hidden card-shadow mb-3">
                    <img src="https://via.placeholder.com/150x200?text=<?= $s['name'] ?>" class="w-full h-full object-cover">
                  </div>
                  <div class="text-sm lg:text-base text-gray-800 mb-2"><?= $s['name'] ?></div>
                  <div class="<?= $s['selected'] ? 'gold-bg text-white' : 'bg-gray-200 text-gray-800' ?> text-xs lg:text-sm font-semibold px-5 py-1.5 rounded-lg">
                    <?= $s['name'] ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Time slots (big black rounded) -->
    <section class="mb-6 lg:mb-10">
      <div class="bg-[#1A1A1A] rounded-3xl p-6 lg:p-10">
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-3 lg:gap-4 mb-4 lg:mb-6">
          <?php
            $slots = ['09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00'];
            $sidx=0;
            foreach($slots as $slot):
              $sidx++;
          ?>
            <button class="<?= $sidx==1 ? 'bg-[#C59A2D] text-white' : 'bg-white text-gray-900' ?> text-xs lg:text-sm px-3 py-2 lg:py-3 rounded-full w-full hover:opacity-80 transition-opacity"><?= $slot ?></button>
          <?php endforeach; ?>
        </div>

        <div class="text-center mt-4 lg:mt-6">
          <button class="px-8 lg:px-12 py-2 lg:py-3 rounded-full bg-black text-white text-sm lg:text-base hover:bg-gray-800 transition-colors">Booking</button>
        </div>
      </div>
    </section>

  </div>
</main>

<?= $this->include('layout_user/footer') ?>
<?= $this->endSection() ?>