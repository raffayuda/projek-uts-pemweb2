<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../auth/config.php';

// Pastikan koneksi database tersedia
if (!isset($mysqli) || !$mysqli) {
    // Jika $mysqli tidak tersedia dari config, coba buat koneksi baru
    $mysqli = new mysqli("localhost", "root", "", "rental_mobil");
    
    // Cek koneksi
    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }
}

// Cek apakah parameter ID ada
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = "ID Pembayaran tidak valid";
    header("Location: pembayaran.php");
    exit();
}

$pembayaran_id = $_GET['id'];

// Query untuk mendapatkan detail pembayaran
$sql = "SELECT p.*, pm.nama_peminjam, pm.mulai, pm.selesai, pm.status_pinjam, 
        a.merk, a.nopol, jk.nama as jenis_kendaraan,
        lp1.nama as lokasi_pengambilan, lp2.nama as lokasi_pengembalian
        FROM pembayaran p
        LEFT JOIN peminjaman pm ON p.peminjaman_id = pm.id
        LEFT JOIN armada a ON pm.armada_id = a.id
        LEFT JOIN jenis_kendaraan jk ON a.jenis_kendaraan_id = jk.id
        LEFT JOIN lokasi_pengambilan lp1 ON pm.pengambilan_id = lp1.id
        LEFT JOIN lokasi_pengembalian lp2 ON pm.pengembalian_id = lp2.id
        WHERE p.id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $pembayaran_id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data ditemukan
if ($result->num_rows == 0) {
    $_SESSION['error'] = "Data pembayaran tidak ditemukan";
    header("Location: pembayaran.php");
    exit();
}

$pembayaran = $result->fetch_assoc();

// Konversi format tanggal untuk tampilan
$tanggal_bayar = date('d F Y', strtotime($pembayaran['tanggal']));
$tanggal_mulai = date('d F Y', strtotime($pembayaran['mulai']));
$tanggal_selesai = date('d F Y', strtotime($pembayaran['selesai']));
$created_at = date('d F Y H:i', strtotime($pembayaran['created_at']));
$updated_at = date('d F Y H:i', strtotime($pembayaran['updated_at']));

// Fungsi untuk format rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Detail Pembayaran #<?= $pembayaran_id ?> | Driveasy</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    
    <style>
      .dt-buttons {
        margin-bottom: 15px;
      }
      .dt-button {
        background-color: #696cff !important;
        color: white !important;
        border: none !important;
        border-radius: 0.375rem !important;
        padding: 0.4375rem 1.25rem !important;
      }
      .transaction-detail {
        border-radius: 0.5rem;
        box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
      }
      .transaction-header {
        border-bottom: 1px solid #d9dee3;
        padding: 1.5rem;
      }
      .transaction-body {
        padding: 1.5rem;
      }
      .detail-row {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f0f0f0;
      }
      .detail-row:last-child {
        border-bottom: none;
      }
      .badge-status {
        padding: 0.35em 0.65em;
        font-size: 85%;
        border-radius: 0.25rem;
      }
      .badge-lunas {
        background-color: #71dd37;
        color: #fff;
      }
      .badge-pending {
        background-color: #ffab00;
        color: #fff;
      }
      .badge-dibatalkan {
        background-color: #ff3e1d;
        color: #fff;
      }
      .btn-print {
        background-color: #696cff;
        color: white;
        border: none;
        border-radius: 0.375rem;
        padding: 0.4375rem 1.25rem;
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'components/sidebar.php'; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include 'components/navbar.php'; ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Flash Messages -->
              <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <?= $_SESSION['success'] ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
              <?php endif; ?>
              
              <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <?= $_SESSION['error'] ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
              <?php endif; ?>
              
              <!-- Header -->
              <div class="row mb-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="card-title mb-0">Detail Pembayaran #<?= $pembayaran_id ?></h4>
                        <p class="mb-0 text-muted">Tanggal: <?= $tanggal_bayar ?></p>
                      </div>
                      <div>
                        <a href="pembayaran.php" class="btn btn-secondary me-2">
                          <i class="bx bx-arrow-back"></i> Kembali
                        </a>
                        <button class="btn btn-print" onclick="window.print()">
                          <i class="bx bx-printer"></i> Cetak
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Detail Transaksi -->
              <div class="row">
                <div class="col-md-8">
                  <div class="card transaction-detail mb-4">
                    <div class="transaction-header">
                      <h5 class="mb-0">Informasi Pembayaran</h5>
                    </div>
                    <div class="transaction-body">
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>ID Pembayaran</strong>
                        </div>
                        <div class="col-md-8">
                          #<?= $pembayaran_id ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Tanggal Pembayaran</strong>
                        </div>
                        <div class="col-md-8">
                          <?= $tanggal_bayar ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Jumlah Bayar</strong>
                        </div>
                        <div class="col-md-8">
                          <strong><?= formatRupiah($pembayaran['jumlah_bayar']) ?></strong>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Status Pembayaran</strong>
                        </div>
                        <div class="col-md-8">
                          <span class="badge badge-status <?= strtolower($pembayaran['status_pembayaran']) == 'lunas' ? 'badge-lunas' : (strtolower($pembayaran['status_pembayaran']) == 'pending' ? 'badge-pending' : 'badge-dibatalkan') ?>">
                            <?= $pembayaran['status_pembayaran'] ?>
                          </span>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Metode Pembayaran</strong>
                        </div>
                        <div class="col-md-8">
                          <?= $pembayaran['metode_pembayaran'] ?: 'Cash/Tunai' ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Keterangan</strong>
                        </div>
                        <div class="col-md-8">
                          <?= $pembayaran['keterangan'] ?: '-' ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Dibuat Pada</strong>
                        </div>
                        <div class="col-md-8">
                          <?= $created_at ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-4">
                          <strong>Diperbarui Pada</strong>
                        </div>
                        <div class="col-md-8">
                          <?= $updated_at ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="card transaction-detail mb-4">
                    <div class="transaction-header">
                      <h5 class="mb-0">Informasi Peminjam</h5>
                    </div>
                    <div class="transaction-body">
                      <div class="row detail-row">
                        <div class="col-md-5">
                          <strong>Nama</strong>
                        </div>
                        <div class="col-md-7">
                          <?= $pembayaran['nama_peminjam'] ?>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-5">
                          <strong>ID Peminjaman</strong>
                        </div>
                        <div class="col-md-7">
                          <a href="detail_peminjaman.php?id=<?= $pembayaran['peminjaman_id'] ?>">#<?= $pembayaran['peminjaman_id'] ?></a>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-5">
                          <strong>Status Peminjaman</strong>
                        </div>
                        <div class="col-md-7">
                          <?= $pembayaran['status_pinjam'] ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Detail Kendaraan -->
              <div class="row">
                <div class="col-12">
                  <div class="card transaction-detail mb-4">
                    <div class="transaction-header">
                      <h5 class="mb-0">Informasi Kendaraan</h5>
                    </div>
                    <div class="transaction-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Kendaraan</strong>
                            </div>
                            <div class="col-md-8">
                              <?= $pembayaran['merk'] ?>
                            </div>
                          </div>
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Nomor Polisi</strong>
                            </div>
                            <div class="col-md-8">
                              <?= $pembayaran['nopol'] ?>
                            </div>
                          </div>
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Jenis</strong>
                            </div>
                            <div class="col-md-8">
                              <?= $pembayaran['jenis_kendaraan'] ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Tanggal Mulai</strong>
                            </div>
                            <div class="col-md-8">
                              <?= $tanggal_mulai ?>
                            </div>
                          </div>
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Tanggal Selesai</strong>
                            </div>
                            <div class="col-md-8">
                              <?= $tanggal_selesai ?>
                            </div>
                          </div>
                          <div class="row detail-row">
                            <div class="col-md-4">
                              <strong>Durasi</strong>
                            </div>
                            <div class="col-md-8">
                              <?php
                                $date1 = new DateTime($pembayaran['mulai']);
                                $date2 = new DateTime($pembayaran['selesai']);
                                $interval = $date1->diff($date2);
                                echo $interval->days + 1 . " hari";
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row detail-row">
                        <div class="col-md-2">
                          <strong>Lokasi Pengambilan</strong>
                        </div>
                        <div class="col-md-4">
                          <?= $pembayaran['lokasi_pengambilan'] ?>
                        </div>
                        <div class="col-md-2">
                          <strong>Lokasi Pengembalian</strong>
                        </div>
                        <div class="col-md-4">
                          <?= $pembayaran['lokasi_pengembalian'] ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
            <!-- / Content -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Cancel Modal -->
      <div class="modal fade" id="cancelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Konfirmasi Pembatalan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin membatalkan pembayaran ini?</p>
              <p><strong>Pembayaran #<?= $pembayaran_id ?></strong> untuk <strong><?= $pembayaran['nama_peminjam'] ?></strong></p>
              <p>Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <form action="proses/cancel_pembayaran.php" method="POST">
                <input type="hidden" name="pembayaran_id" value="<?= $pembayaran_id ?>">
                <button type="submit" class="btn btn-danger">Ya, Batalkan Pembayaran</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

  </body>
</html>