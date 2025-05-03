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

    <title>Manajemen Peminjaman | Driveasy</title>

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
      .img-preview {
        max-width: 100px;
        max-height: 100px;
        object-fit: cover;
      }
      .status-badge {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 600;
      }
      .status-dibooking {
        background-color: #ffab00;
        color: #fff;
      }
      .status-dalam-peminjaman {
        background-color: #03c3ec;
        color: #fff;
      }
      .status-selesai {
        background-color: #71dd37;
        color: #fff;
      }
      .status-dibatalkan {
        background-color: #ff3e1d;
        color: #fff;
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
              <h4 class="fw-bold py-3 mb-4">Manajemen Peminjaman</h4>

              <!-- Responsive Table -->
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Daftar Peminjaman</h5>
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#tambahPeminjamanModal"
                  >
                    <i class="bx bx-plus me-1"></i> Tambah Peminjaman
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
                    <table id="peminjamanTable" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Peminjam</th>
                          <th>Armada</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>Biaya</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT p.*, a.merk as armada_merk, a.nopol as armada_nopol 
                                  FROM peminjaman p 
                                  LEFT JOIN armada a ON p.armada_id = a.id 
                                  ORDER BY p.id DESC";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Set class untuk status
                                $statusClass = '';
                                switch(strtolower($row['status_pinjam'])) {
                                    case 'dibooking':
                                        $statusClass = 'status-dibooking';
                                        break;
                                    case 'dalam peminjaman':
                                        $statusClass = 'status-dalam-peminjaman';
                                        break;
                                    case 'selesai':
                                        $statusClass = 'status-selesai';
                                        break;
                                    case 'dibatalkan':
                                        $statusClass = 'status-dibatalkan';
                                        break;
                                    default:
                                        $statusClass = '';
                                }
                                
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['nama_peminjam'] . "</td>";
                                echo "<td>" . $row['armada_merk'] . " (" . $row['armada_nopol'] . ")</td>";
                                echo "<td>" . date('d M Y', strtotime($row['mulai'])) . "</td>";
                                echo "<td>" . date('d M Y', strtotime($row['selesai'])) . "</td>";
                                echo "<td>Rp " . number_format($row['biaya'], 0, ',', '.') . "</td>";
                                echo "<td><span class='status-badge $statusClass'>" . $row['status_pinjam'] . "</span></td>";
                                echo "<td>
                                        <div class='dropdown'>
                                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='editPeminjaman(" . $row['id'] . ")'>
                                                    <i class='bx bx-edit-alt me-1'></i> Edit
                                                </a>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='deletePeminjaman(" . $row['id'] . ")'>
                                                    <i class='bx bx-trash me-1'></i> Delete
                                                </a>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='viewPeminjaman(" . $row['id'] . ")'>
                                                    <i class='bx bx-detail me-1'></i> Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Tidak ada data peminjaman</td></tr>";
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

            <!-- Modal Tambah Peminjaman -->
            <div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Peminjaman Baru</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/peminjaman_process.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                          <input
                            type="text"
                            class="form-control"
                            id="nama_peminjam"
                            name="nama_peminjam"
                            placeholder="Masukkan nama peminjam"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="phone" class="form-label">Nomor Telepon</label>
                          <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            placeholder="Masukkan nomor telepon"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="ktp_peminjam" class="form-label">KTP Peminjam</label>
                        <input
                          type="file"
                          class="form-control"
                          id="ktp_peminjam"
                          name="ktp_peminjam"
                          accept="image/*"
                          required
                        />
                        <small class="text-muted">Upload foto KTP peminjam (format: JPG, PNG, max 2MB)</small>
                      </div>
                      <div class="mb-3">
                        <label for="keperluan_pinjam" class="form-label">Keperluan Peminjaman</label>
                        <textarea
                          class="form-control"
                          id="keperluan_pinjam"
                          name="keperluan_pinjam"
                          rows="2"
                          placeholder="Masukkan keperluan peminjaman"
                          required
                        ></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="armada_id" class="form-label">Armada</label>
                          <select class="form-select" id="armada_id" name="armada_id" required>
                            <option value="" selected disabled>Pilih Armada</option>
                            <?php
                            $query_armada = "SELECT a.*, j.nama as jenis_nama FROM armada a 
                                            LEFT JOIN jenis_kendaraan j ON a.jenis_kendaraan_id = j.id 
                                            ORDER BY a.merk ASC";
                            $result_armada = $conn->query($query_armada);
                            
                            if ($result_armada->num_rows > 0) {
                                while ($row_armada = $result_armada->fetch_assoc()) {
                                    echo "<option value='" . $row_armada['id'] . "'>" . $row_armada['merk'] . " - " . $row_armada['nopol'] . " (" . $row_armada['jenis_nama'] . ")</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="status_pinjam" class="form-label">Status Peminjaman</label>
                          <select class="form-select" id="status_pinjam" name="status_pinjam" required>
                            <option value="Dibooking" selected>Dibooking</option>
                            <option value="Dalam Peminjaman">Dalam Peminjaman</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="pengambilan_id" class="form-label">Lokasi Pengambilan</label>
                          <select class="form-select" id="pengambilan_id" name="pengambilan_id" required>
                            <option value="" selected disabled>Pilih Lokasi Pengambilan</option>
                            <?php
                            $query_pengambilan = "SELECT * FROM lokasi_pengambilan ORDER BY nama ASC";
                            $result_pengambilan = $conn->query($query_pengambilan);
                            
                            if ($result_pengambilan->num_rows > 0) {
                                while ($row_pengambilan = $result_pengambilan->fetch_assoc()) {
                                    echo "<option value='" . $row_pengambilan['id'] . "'>" . $row_pengambilan['nama'] . "</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="pengembalian_id" class="form-label">Lokasi Pengembalian</label>
                          <select class="form-select" id="pengembalian_id" name="pengembalian_id" required>
                            <option value="" selected disabled>Pilih Lokasi Pengembalian</option>
                            <?php
                            $query_pengembalian = "SELECT * FROM lokasi_pengembalian ORDER BY nama ASC";
                            $result_pengembalian = $conn->query($query_pengembalian);
                            
                            if ($result_pengembalian->num_rows > 0) {
                                while ($row_pengembalian = $result_pengembalian->fetch_assoc()) {
                                    echo "<option value='" . $row_pengembalian['id'] . "'>" . $row_pengembalian['nama'] . "</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 mb-3">
                          <label for="mulai" class="form-label">Tanggal Mulai</label>
                          <input
                            type="date"
                            class="form-control datepicker"
                            id="mulai"
                            name="mulai"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="waktu_pengambilan" class="form-label">Waktu Pengambilan</label>
                          <input
                            type="time"
                            class="form-control timepicker"
                            id="waktu_pengambilan"
                            name="waktu_pengambilan"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="selesai" class="form-label">Tanggal Selesai</label>
                          <input
                            type="date"
                            class="form-control datepicker"
                            id="selesai"
                            name="selesai"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="waktu_pengembalian" class="form-label">Waktu Pengembalian</label>
                          <input
                            type="time"
                            class="form-control timepicker"
                            id="waktu_pengembalian"
                            name="waktu_pengembalian"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="biaya" class="form-label">Biaya</label>
                        <div class="input-group">
                          <span class="input-group-text">Rp</span>
                          <input
                            type="number"
                            class="form-control"
                            id="biaya"
                            name="biaya"
                            placeholder="Masukkan biaya peminjaman"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="komentar_peminjam" class="form-label">Komentar Peminjam</label>
                        <textarea
                          class="form-control"
                          id="komentar_peminjam"
                          name="komentar_peminjam"
                          rows="2"
                          placeholder="Masukkan komentar peminjam (opsional)"
                        ></textarea>
                      </div>
                      <input type="hidden" name="action" value="add">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- / Modal Tambah Peminjaman -->

            <!-- Modal Edit Peminjaman -->
            <div class="modal fade" id="editPeminjamanModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Peminjaman</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/peminjaman_process.php" method="post" enctype="multipart/form-data" id="editPeminjamanForm">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="edit_nama_peminjam" class="form-label">Nama Peminjam</label>
                          <input
                            type="text"
                            class="form-control"
                            id="edit_nama_peminjam"
                            name="nama_peminjam"
                            placeholder="Masukkan nama peminjam"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="edit_phone" class="form-label">Nomor Telepon</label>
                          <input
                            type="text"
                            class="form-control"
                            id="edit_phone"
                            name="phone"
                            placeholder="Masukkan nomor telepon"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="edit_ktp_peminjam" class="form-label">KTP Peminjam</label>
                        <div id="ktp_preview_container" class="mb-2">
                          <img id="ktp_preview" src="" alt="KTP Preview" style="max-width: 200px; max-height: 150px;" />
                        </div>
                        <input
                          type="file"
                          class="form-control"
                          id="edit_ktp_peminjam"
                          name="ktp_peminjam"
                          accept="image/*"
                        />
                        <small class="text-muted">Upload foto KTP peminjam baru jika ingin mengubah (format: JPG, PNG, max 2MB)</small>
                      </div>
                      <div class="mb-3">
                        <label for="edit_keperluan_pinjam" class="form-label">Keperluan Peminjaman</label>
                        <textarea
                          class="form-control"
                          id="edit_keperluan_pinjam"
                          name="keperluan_pinjam"
                          rows="2"
                          placeholder="Masukkan keperluan peminjaman"
                          required
                        ></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="edit_armada_id" class="form-label">Armada</label>
                          <select class="form-select" id="edit_armada_id" name="armada_id" required>
                            <option value="" selected disabled>Pilih Armada</option>
                            <?php
                            $query_armada = "SELECT a.*, j.nama as jenis_nama FROM armada a 
                                            LEFT JOIN jenis_kendaraan j ON a.jenis_kendaraan_id = j.id 
                                            ORDER BY a.merk ASC";
                            $result_armada = $conn->query($query_armada);
                            
                            if ($result_armada->num_rows > 0) {
                                while ($row_armada = $result_armada->fetch_assoc()) {
                                    echo "<option value='" . $row_armada['id'] . "'>" . $row_armada['merk'] . " - " . $row_armada['nopol'] . " (" . $row_armada['jenis_nama'] . ")</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="edit_status_pinjam" class="form-label">Status Peminjaman</label>
                          <select class="form-select" id="edit_status_pinjam" name="status_pinjam" required>
                            <option value="Dibooking">Dibooking</option>
                            <option value="Dalam Peminjaman">Dalam Peminjaman</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="edit_pengambilan_id" class="form-label">Lokasi Pengambilan</label>
                          <select class="form-select" id="edit_pengambilan_id" name="pengambilan_id" required>
                            <option value="" selected disabled>Pilih Lokasi Pengambilan</option>
                            <?php
                            $query_pengambilan = "SELECT * FROM lokasi_pengambilan ORDER BY nama ASC";
                            $result_pengambilan = $conn->query($query_pengambilan);
                            
                            if ($result_pengambilan->num_rows > 0) {
                                while ($row_pengambilan = $result_pengambilan->fetch_assoc()) {
                                    echo "<option value='" . $row_pengambilan['id'] . "'>" . $row_pengambilan['nama'] . "</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="edit_pengembalian_id" class="form-label">Lokasi Pengembalian</label>
                          <select class="form-select" id="edit_pengembalian_id" name="pengembalian_id" required>
                            <option value="" selected disabled>Pilih Lokasi Pengembalian</option>
                            <?php
                            $query_pengembalian = "SELECT * FROM lokasi_pengembalian ORDER BY nama ASC";
                            $result_pengembalian = $conn->query($query_pengembalian);
                            
                            if ($result_pengembalian->num_rows > 0) {
                                while ($row_pengembalian = $result_pengembalian->fetch_assoc()) {
                                    echo "<option value='" . $row_pengembalian['id'] . "'>" . $row_pengembalian['nama'] . "</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 mb-3">
                          <label for="edit_mulai" class="form-label">Tanggal Mulai</label>
                          <input
                            type="date"
                            class="form-control datepicker"
                            id="edit_mulai"
                            name="mulai"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="edit_waktu_pengambilan" class="form-label">Waktu Pengambilan</label>
                          <input
                            type="time"
                            class="form-control timepicker"
                            id="edit_waktu_pengambilan"
                            name="waktu_pengambilan"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="edit_selesai" class="form-label">Tanggal Selesai</label>
                          <input
                            type="date"
                            class="form-control datepicker"
                            id="edit_selesai"
                            name="selesai"
                            required
                          />
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="edit_waktu_pengembalian" class="form-label">Waktu Pengembalian</label>
                          <input
                            type="time"
                            class="form-control timepicker"
                            id="edit_waktu_pengembalian"
                            name="waktu_pengembalian"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="edit_biaya" class="form-label">Biaya</label>
                        <div class="input-group">
                          <span class="input-group-text">Rp</span>
                          <input
                            type="number"
                            class="form-control"
                            id="edit_biaya"
                            name="biaya"
                            placeholder="Masukkan biaya peminjaman"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="edit_komentar_peminjam" class="form-label">Komentar Peminjam</label>
                        <textarea
                          class="form-control"
                          id="edit_komentar_peminjam"
                          name="komentar_peminjam"
                          rows="2"
                          placeholder="Masukkan komentar peminjam (opsional)"
                        ></textarea>
                      </div>
                      <input type="hidden" name="action" value="edit">
                      <input type="hidden" name="id" id="edit_id">
                      <input type="hidden" name="old_ktp" id="old_ktp">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- / Modal Edit Peminjaman -->

            <!-- Modal Detail Peminjaman -->
            <div class="modal fade" id="detailPeminjamanModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Peminjaman</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="mb-3">Informasi Peminjam</h6>
                        <dl class="row">
                          <dt class="col-sm-5">Nama Peminjam:</dt>
                          <dd class="col-sm-7" id="detail_nama_peminjam"></dd>
                          
                          <dt class="col-sm-5">Nomor Telepon:</dt>
                          <dd class="col-sm-7" id="detail_phone"></dd>
                          
                          <dt class="col-sm-5">KTP Peminjam:</dt>
                          <dd class="col-sm-7">
                            <img id="detail_ktp_peminjam" src="" alt="KTP Peminjam" style="max-width: 100%; max-height: 150px;" />
                          </dd>
                          
                          <dt class="col-sm-5">Keperluan:</dt>
                          <dd class="col-sm-7" id="detail_keperluan_pinjam"></dd>
                        </dl>
                      </div>
                      <div class="col-md-6">
                        <h6 class="mb-3">Informasi Peminjaman</h6>
                        <dl class="row">
                          <dt class="col-sm-5">Armada:</dt>
                          <dd class="col-sm-7" id="detail_armada"></dd>
                          
                          <dt class="col-sm-5">Status:</dt>
                          <dd class="col-sm-7"><span id="detail_status_pinjam" class="status-badge"></span></dd>
                          
                          <dt class="col-sm-5">Tanggal Mulai:</dt>
                          <dd class="col-sm-7" id="detail_mulai"></dd>
                          
                          <dt class="col-sm-5">Waktu Pengambilan:</dt>
                          <dd class="col-sm-7" id="detail_waktu_pengambilan"></dd>
                          
                          <dt class="col-sm-5">Tanggal Selesai:</dt>
                          <dd class="col-sm-7" id="detail_selesai"></dd>
                          
                          <dt class="col-sm-5">Waktu Pengembalian:</dt>
                          <dd class="col-sm-7" id="detail_waktu_pengembalian"></dd>
                        </dl>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <h6 class="mb-3">Informasi Lokasi</h6>
                        <dl class="row">
                          <dt class="col-sm-5">Lokasi Pengambilan:</dt>
                          <dd class="col-sm-7" id="detail_pengambilan"></dd>
                          
                          <dt class="col-sm-5">Lokasi Pengembalian:</dt>
                          <dd class="col-sm-7" id="detail_pengembalian"></dd>
                        </dl>
                      </div>
                      <div class="col-md-6">
                        <h6 class="mb-3">Informasi Biaya</h6>
                        <dl class="row">
                          <dt class="col-sm-5">Biaya Total:</dt>
                          <dd class="col-sm-7" id="detail_biaya"></dd>
                          
                          <dt class="col-sm-5">Komentar:</dt>
                          <dd class="col-sm-7" id="detail_komentar_peminjam"></dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Modal Detail Peminjaman -->

            <!-- Modal Hapus Peminjaman -->
            <div class="modal fade" id="deletePeminjamanModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data peminjaman ini?</p>
                    <p class="text-danger">Perhatian: Tindakan ini tidak dapat dibatalkan!</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="process/peminjaman_process.php" method="post">
                      <input type="hidden" name="action" value="delete">
                      <input type="hidden" name="id" id="delete_id">
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Modal Hapus Peminjaman -->

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
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    
    <!-- Date picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script>
      $(document).ready(function() {
        // Inisialisasi DataTables
        $('#peminjamanTable').DataTable({
          responsive: true,
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'excel',
              text: '<i class="bx bx-export me-1"></i> Export Excel',
              className: 'btn btn-sm'
            },
            {
              extend: 'pdf',
              text: '<i class="bx bx-file-pdf me-1"></i> Export PDF',
              className: 'btn btn-sm'
            },
            {
              extend: 'print',
              text: '<i class="bx bx-printer me-1"></i> Print',
              className: 'btn btn-sm'
            }
          ],
          order: [[0, 'desc']]
        });
        
        // Inisialisasi Flatpickr untuk date picker
        flatpickr(".datepicker", {
          dateFormat: "Y-m-d",
          allowInput: true,
          theme: "material_blue"
        });
        
        // Inisialisasi Flatpickr untuk time picker
        flatpickr(".timepicker", {
          enableTime: true,
          noCalendar: true,
          dateFormat: "H:i",
          time_24hr: true,
          allowInput: true,
          theme: "material_blue"
        });
      });
      
      // Fungsi untuk menampilkan modal edit
      function editPeminjaman(id) {
        // Ambil data peminjaman dengan AJAX
        $.ajax({
          url: 'process/peminjaman_process.php?action=get&id=' + id,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            // Isi form dengan data yang diterima
            $('#edit_id').val(data.id);
            $('#edit_nama_peminjam').val(data.nama_peminjam);
            $('#edit_phone').val(data.phone);
            $('#edit_keperluan_pinjam').val(data.keperluan_pinjam);
            $('#edit_armada_id').val(data.armada_id);
            $('#edit_status_pinjam').val(data.status_pinjam);
            $('#edit_pengambilan_id').val(data.pengambilan_id);
            $('#edit_pengembalian_id').val(data.pengembalian_id);
            $('#edit_mulai').val(data.mulai);
            $('#edit_waktu_pengambilan').val(data.waktu_pengambilan);
            $('#edit_selesai').val(data.selesai);
            $('#edit_waktu_pengembalian').val(data.waktu_pengembalian);
            $('#edit_biaya').val(data.biaya);
            $('#edit_komentar_peminjam').val(data.komentar_peminjam);
            $('#old_ktp').val(data.ktp_peminjam);
            
            // Tampilkan preview KTP jika ada
            if (data.ktp_peminjam) {
              $('#ktp_preview').attr('src', "../" + data.ktp_peminjam);
              $('#ktp_preview_container').show();
            } else {
              $('#ktp_preview_container').hide();
            }
            
            // Tampilkan modal edit
            $('#editPeminjamanModal').modal('show');
          },
          error: function(xhr, status, error) {
            alert('Terjadi kesalahan: ' + error);
          }
        });
      }
      
      // Fungsi untuk menampilkan modal detail
      function viewPeminjaman(id) {
        // Ambil data peminjaman dengan AJAX
        $.ajax({
          url: 'process/peminjaman_process.php?action=get&id=' + id,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            // Isi detail dengan data yang diterima
            $('#detail_nama_peminjam').text(data.nama_peminjam);
            $('#detail_phone').text(data.phone);
            $('#detail_keperluan_pinjam').text(data.keperluan_pinjam);
            $('#detail_armada').text(data.armada_merk + ' - ' + data.armada_nopol);
            
            // Set class untuk status
            let statusClass = '';
            switch(data.status_pinjam.toLowerCase()) {
              case 'dibooking':
                statusClass = 'status-dibooking';
                break;
              case 'dalam peminjaman':
                statusClass = 'status-dalam-peminjaman';
                break;
              case 'selesai':
                statusClass = 'status-selesai';
                break;
              case 'dibatalkan':
                statusClass = 'status-dibatalkan';
                break;
              default:
                statusClass = '';
            }
            
            $('#detail_status_pinjam').text(data.status_pinjam).removeClass().addClass('status-badge ' + statusClass);
            
            // Format tanggal
            const formatDate = (dateStr) => {
              const date = new Date(dateStr);
              return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            };
            
            $('#detail_mulai').text(formatDate(data.mulai));
            $('#detail_selesai').text(formatDate(data.selesai));
            $('#detail_waktu_pengambilan').text(data.waktu_pengambilan);
            $('#detail_waktu_pengembalian').text(data.waktu_pengembalian);
            $('#detail_pengambilan').text(data.pengambilan_nama);
            $('#detail_pengembalian').text(data.pengembalian_nama);
            $('#detail_biaya').text('Rp ' + new Intl.NumberFormat('id-ID').format(data.biaya));
            $('#detail_komentar_peminjam').text(data.komentar_peminjam || '-');
            
            // Tampilkan KTP jika ada
            if (data.ktp_peminjam) {
              $('#detail_ktp_peminjam').attr('src',"../" + data.ktp_peminjam).show();
            } else {
              $('#detail_ktp_peminjam').hide();
            }
            
            // Tampilkan modal detail
            $('#detailPeminjamanModal').modal('show');
          },
          error: function(xhr, status, error) {
            alert('Terjadi kesalahan: ' + error);
          }
        });
      }
      
      // Fungsi untuk menampilkan modal hapus
      function deletePeminjaman(id) {
        $('#delete_id').val(id);
        $('#deletePeminjamanModal').modal('show');
      }
    </script>
  </body>
</html>