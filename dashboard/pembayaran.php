<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../auth/config.php';
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

    <title>Manajemen Pembayaran | Driveasy</title>

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
    
    <!-- Date picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">

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
      .badge-status-lunas {
        background-color: #71dd37;
      }
      .badge-status-sebagian {
        background-color: #ffab00;
      }
      .badge-status-belum {
        background-color: #ff3e1d;
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
              <h4 class="fw-bold py-3 mb-4">Manajemen Pembayaran</h4>

              <!-- Responsive Table -->
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Daftar Pembayaran</h5>
                  <button 
                    type="button" 
                    class="btn btn-primary" 
                    data-bs-target="#tambahPembayaranModal" 
                    data-bs-toggle="modal"
                  >
                    <i class="bx bx-plus me-1"></i> Tambah Pembayaran
                  </button>
                </div>
                <div class="card-body">
                  <?php
                  // Tampilkan pesan sukses atau error jika ada
                  if (isset($_GET['status']) && isset($_GET['message'])) {
                      $status = $_GET['status'];
                      $message = $_GET['message'];
                      $alertClass = ($status == 'success') ? 'alert-success' : 'alert-danger';
                      
                      echo "<div class='alert $alertClass alert-dismissible' role='alert'>";
                      echo "$message";
                      echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                      echo "</div>";
                  }
                  ?>
                  <div class="table-responsive text-nowrap">
                    <table id="pembayaranTable" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Peminjam</th>
                          <th>Total Biaya</th>
                          <th>Total Dibayar</th>
                          <th>Sisa</th>
                          <th>Status</th>
                          <th>Tanggal Terakhir Bayar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Query untuk mendapatkan data peminjaman dan pembayaran
                        $query = "SELECT 
                                    p.id,
                                    p.nama_peminjam,
                                    p.biaya as total_biaya,
                                    COALESCE(SUM(pb.jumlah_bayar), 0) as total_dibayar,
                                    (p.biaya - COALESCE(SUM(pb.jumlah_bayar), 0)) as sisa,
                                    CASE 
                                      WHEN COALESCE(SUM(pb.jumlah_bayar), 0) = 0 THEN 'Belum Bayar'
                                      WHEN COALESCE(SUM(pb.jumlah_bayar), 0) < p.biaya THEN 'Sebagian'
                                      ELSE 'Lunas'
                                    END as status_bayar,
                                    MAX(pb.tanggal) as tanggal_terakhir
                                  FROM peminjaman p
                                  LEFT JOIN pembayaran pb ON p.id = pb.peminjaman_id
                                  GROUP BY p.id
                                  ORDER BY p.id DESC";
                        
                        $result = $conn->query($query);
                        $no = 1;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $statusClass = '';
                                switch($row['status_bayar']) {
                                    case 'Lunas':
                                      $statusClass = 'bg-success';
                                      break;
                                    case 'Sebagian':
                                      $statusClass = 'bg-warning';
                                      break;
                                    case 'Belum Bayar':
                                      $statusClass = 'bg-danger';
                                      break;
                                }
                                
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nama_peminjam'] . "</td>";
                                echo "<td>Rp " . number_format($row['total_biaya'], 0, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['total_dibayar'], 0, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['sisa'], 0, ',', '.') . "</td>";
                                echo "<td><span class='badge $statusClass'>" . $row['status_bayar'] . "</span></td>";
                                
                                if ($row['tanggal_terakhir']) {
                                    echo "<td>" . date('d-m-Y', strtotime($row['tanggal_terakhir'])) . "</td>";
                                } else {
                                    echo "<td>-</td>";
                                }
                                
                                echo "<td>";
                                echo "<div class='dropdown'>";
                                echo "<button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>";
                                echo "<i class='bx bx-dots-vertical-rounded'></i>";
                                echo "</button>";
                                echo "<div class='dropdown-menu'>";
                                echo "<a class='dropdown-item' href='javascript:void(0);' onclick='tambahPembayaran(" . $row['id'] . ", \"" . $row['nama_peminjam'] . "\", " . $row['sisa'] . ")'><i class='bx bx-wallet-alt me-1'></i> Bayar</a>";
                                echo "<a class='dropdown-item' href='detail_pembayaran.php?id=" . $row['id'] . "'><i class='bx bx-detail me-1'></i> Detail</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada data pembayaran</td></tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Driveasy
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Modal Tambah Pembayaran -->
    <div class="modal fade" id="tambahPembayaranModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pembayaran</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form action="process/pembayaran_process.php" method="post">
            <div class="modal-body">
              <input type="hidden" name="action" value="add">
              <div class="row">
                <div class="col mb-3">
                  <label for="tanggal" class="form-label">Tanggal Pembayaran</label>
                  <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    class="form-control"
                    value="<?php echo date('Y-m-d'); ?>"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="peminjaman_id" class="form-label">Peminjaman</label>
                  <select id="peminjaman_id" name="peminjaman_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Peminjaman</option>
                    <?php
                    $query_peminjaman = "SELECT 
                                          p.id, 
                                          p.nama_peminjam, 
                                          a.merk, 
                                          p.mulai, 
                                          p.selesai,
                                          p.biaya AS total_biaya,
                                          COALESCE(SUM(pb.jumlah_bayar), 0) AS total_dibayar,
                                          (p.biaya - COALESCE(SUM(pb.jumlah_bayar), 0)) AS sisa
                                         FROM peminjaman p 
                                         LEFT JOIN armada a ON p.armada_id = a.id 
                                         LEFT JOIN pembayaran pb ON p.id = pb.peminjaman_id
                                         GROUP BY p.id
                                         HAVING sisa > 0
                                         ORDER BY p.id DESC";
                    $result_peminjaman = $conn->query($query_peminjaman);
                    
                    if ($result_peminjaman->num_rows > 0) {
                        while ($row_peminjaman = $result_peminjaman->fetch_assoc()) {
                            $mulai = date('d-m-Y', strtotime($row_peminjaman['mulai']));
                            $selesai = date('d-m-Y', strtotime($row_peminjaman['selesai']));
                            $sisa = number_format($row_peminjaman['sisa'], 0, ',', '.');
                            echo "<option value='" . $row_peminjaman['id'] . "' data-sisa='" . $row_peminjaman['sisa'] . "'>" . 
                                 $row_peminjaman['nama_peminjam'] . " - " . $row_peminjaman['merk'] . " (" . $mulai . " s/d " . $selesai . ") - Sisa: Rp " . $sisa . 
                                 "</option>";
                        }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                  <input
                    type="number"
                    id="jumlah_bayar"
                    name="jumlah_bayar"
                    class="form-control"
                    placeholder="Masukkan jumlah pembayaran"
                    required
                  />
                  <small class="text-muted">Maksimal sisa pembayaran: <span id="max_sisa">0</span></small>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                  <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required>
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                    <option value="E-Wallet">E-Wallet</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="keterangan" class="form-label">Keterangan</label>
                  <textarea
                    id="keterangan"
                    name="keterangan"
                    class="form-control"
                    placeholder="Masukkan keterangan pembayaran (opsional)"
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script>
      $(document).ready(function() {
        // Inisialisasi DataTable
        $('#pembayaranTable').DataTable({
          responsive: true,
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'excel',
              text: '<i class="bx bx-export me-1"></i> Export Excel',
              className: 'btn btn-primary'
            },
            {
              extend: 'pdf',
              text: '<i class="bx bx-file-pdf me-1"></i> Export PDF',
              className: 'btn btn-primary'
            },
            {
              extend: 'print',
              text: '<i class="bx bx-printer me-1"></i> Print',
              className: 'btn btn-primary'
            }
          ],
          language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Tidak ada data yang ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(difilter dari _MAX_ total data)",
            paginate: {
              first: "Pertama",
              last: "Terakhir",
              next: "Selanjutnya",
              previous: "Sebelumnya"
            }
          }
        });
        
        // Update max sisa pembayaran saat memilih peminjaman
        $('#peminjaman_id').change(function() {
          var sisa = $(this).find(':selected').data('sisa');
          $('#max_sisa').text('Rp ' + formatNumber(sisa));
          $('#jumlah_bayar').attr('max', sisa);
        });
      });

      // Format angka dengan pemisah ribuan
      function formatNumber(num) {
        return new Intl.NumberFormat('id-ID').format(num);
      }
      
// Fungsi untuk menampilkan modal tambah pembayaran dengan data peminjaman
function tambahPembayaran(id, nama, sisa) {
  // Set modal title dengan info peminjaman
  $('#tambahPembayaranModal .modal-title').text('Tambah Pembayaran: ' + nama);
  
  // Set nilai peminjaman_id dan maksimal pembayaran
  $('#peminjaman_id').val(id);
  $('#max_sisa').text('Rp ' + formatNumber(sisa));
  $('#jumlah_bayar').attr('max', sisa);
  
  // Default jumlah bayar ke sisa pembayaran
  $('#jumlah_bayar').val(sisa);
  
  // Instead of disabling the dropdown, make it readonly
  // This will ensure the value is still submitted with the form
  $('#peminjaman_id').prop('disabled', false);
  $('#peminjaman_id').attr('readonly', true);
  
  // Set tanggal default ke hari ini
  $('#tanggal').val(new Date().toISOString().split('T')[0]);
  
  // Menampilkan modal
  var myModal = new bootstrap.Modal(document.getElementById('tambahPembayaranModal'));
  myModal.show();
}

$('#tambahPembayaranModal').on('hidden.bs.modal', function () {
  // Reset form
  $('#tambahPembayaranModal form')[0].reset();
  $('#peminjaman_id').prop('disabled', false);
  $('#peminjaman_id').attr('readonly', false);
  $('#max_sisa').text('0');
  $('#tambahPembayaranModal .modal-title').text('Tambah Pembayaran');
});

// Validasi jumlah pembayaran tidak melebihi sisa
$('#jumlah_bayar').on('input', function() {
  var max = parseFloat($(this).attr('max'));
  var value = parseFloat($(this).val());
  
  if (value > max) {
    $(this).val(max);
    alert('Jumlah pembayaran tidak boleh melebihi sisa yang harus dibayar (Rp ' + formatNumber(max) + ')');
  }
});
</script>
  </body>
</html>