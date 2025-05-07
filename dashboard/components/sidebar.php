<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <h4 class="demo menu-text fw-bolder mt-3 ms-2"><span class="text-primary">Driv</span>Easy</h4>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
             <?php $current_page = basename($_SERVER['PHP_SELF'])?>
            <li class="menu-item <?= $current_page == 'index.php' ? 'active' : '' ?>">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'jenis_kendaraan.php' ? 'active' : '' ?>">
              <a href="jenis_kendaraan.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-car-garage"></i>
                <div data-i18n="Analytics">Jenis Kendaraan</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'lokasi_pengambilan.php' ? 'active' : '' ?>">
              <a href="lokasi_pengambilan.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div data-i18n="Analytics">Lokasi Pengambilan</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'lokasi_pengembalian.php' ? 'active' : '' ?>">
              <a href="lokasi_pengembalian.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-revision"></i>
                <div data-i18n="Analytics">Lokasi Pengembalian</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'armada.php' ? 'active' : '' ?>">
              <a href="armada.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Analytics">Armada</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'peminjaman.php' ? 'active' : '' ?>">
              <a href="peminjaman.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Analytics">Peminjaman</div>
              </a>
            </li>
            <li class="menu-item <?= $current_page == 'pembayaran.php' ? 'active' : '' ?>">
              <a href="pembayaran.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-credit-card"></i>
                <div data-i18n="Analytics">Pembayaran</div>
              </a>
            </li>

           
          </ul>
        </aside>