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

    <title>Manajemen Armada | Driveasy</title>

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
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
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
      .img-preview {
        max-width: 100px;
        max-height: 100px;
        object-fit: cover;
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
              <h4 class="fw-bold py-3 mb-4">Manajemen Armada</h4>

              <!-- Responsive Table -->
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Daftar Armada</h5>
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#tambahArmadaModal"
                  >
                    <i class="bx bx-plus me-1"></i> Tambah Armada
                  </button>
                </div>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table id="armadaTable" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Gambar</th>
                          <th>Merk</th>
                          <th>Nopol</th>
                          <th>Jenis</th>
                          <th>Kapasitas</th>
                          <th>Rating</th>
                          <th>Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT a.*, j.nama as jenis_nama 
                                  FROM armada a 
                                  LEFT JOIN jenis_kendaraan j ON a.jenis_kendaraan_id = j.id 
                                  ORDER BY a.id DESC";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><img src='" . $row['gambar'] . "' class='img-preview' alt='" . $row['merk'] . "'></td>";
                                echo "<td>" . $row['merk'] . "</td>";
                                echo "<td>" . $row['nopol'] . "</td>";
                                echo "<td>" . $row['jenis_nama'] . "</td>";
                                echo "<td>" . $row['kapasitas_kursi'] . " Kursi</td>";
                                echo "<td>" . $row['rating'] . "/5</td>";
                                echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                                echo "<td>
                                        <div class='dropdown'>
                                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='editArmada(" . $row['id'] . ")'>
                                                    <i class='bx bx-edit-alt me-1'></i> Edit
                                                </a>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='deleteArmada(" . $row['id'] . ")'>
                                                    <i class='bx bx-trash me-1'></i> Delete
                                                </a>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='viewArmada(" . $row['id'] . ")'>
                                                    <i class='bx bx-detail me-1'></i> Detail
                                                </a>
                                            </div>
                                        </div>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>Tidak ada data armada</td></tr>";
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

            <!-- Modal Tambah Armada -->
            <div class="modal fade" id="tambahArmadaModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Armada Baru</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/armada_process.php" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="merk" class="form-label">Merk Kendaraan</label>
                          <input
                            type="text"
                            class="form-control"
                            id="merk"
                            name="merk"
                            placeholder="Masukkan merk kendaraan"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="nopol" class="form-label">Nomor Polisi</label>
                          <input
                            type="text"
                            class="form-control"
                            id="nopol"
                            name="nopol"
                            placeholder="Masukkan nomor polisi"
                            required
                          />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="thn_beli" class="form-label">Tahun Pembelian</label>
                          <input
                            type="number"
                            class="form-control"
                            id="thn_beli"
                            name="thn_beli"
                            placeholder="Masukkan tahun pembelian"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="jenis_kendaraan_id" class="form-label">Jenis Kendaraan</label>
                          <select class="form-select" id="jenis_kendaraan_id" name="jenis_kendaraan_id" required>
                            <option value="" disabled selected>Pilih jenis kendaraan</option>
                            <?php
                            $query_jenis = "SELECT * FROM jenis_kendaraan ORDER BY nama";
                            $result_jenis = $conn->query($query_jenis);
                            
                            if ($result_jenis->num_rows > 0) {
                                while ($row_jenis = $result_jenis->fetch_assoc()) {
                                    echo "<option value='" . $row_jenis['id'] . "'>" . $row_jenis['nama'] . "</option>";
                                }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="kapasitas_kursi" class="form-label">Kapasitas Kursi</label>
                          <input
                            type="number"
                            class="form-control"
                            id="kapasitas_kursi"
                            name="kapasitas_kursi"
                            placeholder="Masukkan kapasitas kursi"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="rating" class="form-label">Rating (1-5)</label>
                          <input
                            type="number"
                            class="form-control"
                            id="rating"
                            name="rating"
                            min="1"
                            max="5"
                            placeholder="Masukkan rating"
                            required
                          />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="harga" class="form-label">Harga Sewa per Hari</label>
                          <input
                            type="number"
                            class="form-control"
                            id="harga"
                            name="harga"
                            placeholder="Masukkan harga sewa"
                            required
                          />
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="gambar" class="form-label">URL Gambar</label>
                          <input
                            type="text"
                            class="form-control"
                            id="gambar"
                            name="gambar"
                            placeholder="Masukkan URL gambar"
                            required
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea
                          class="form-control"
                          id="deskripsi"
                          name="deskripsi"
                          rows="3"
                          placeholder="Masukkan deskripsi kendaraan"
                          required
                        ></textarea>
                      </div>
                      <input type="hidden" name="action" value="add">
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

            <!-- Modal Edit Armada -->
            <div class="modal fade" id="editArmadaModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Armada</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/armada_process.php" method="post" id="editArmadaForm">
                    <div class="modal-body" id="editArmadaBody">
                      <!-- Form fields will be loaded dynamically -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                      </button>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Detail Armada -->
            <div class="modal fade" id="detailArmadaModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Detail Armada</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body" id="detailArmadaBody">
                    <!-- Detail content will be loaded dynamically -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Tutup
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteArmadaModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-sm" role="document">
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
                    <p>Apakah Anda yakin ingin menghapus armada ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Batal
                    </button>
                    <form action="process/armada_process.php" method="post">
                      <input type="hidden" name="id" id="deleteArmadaId">
                      <input type="hidden" name="action" value="delete">
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

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
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- DataTables JS -->
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

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script>
      $(document).ready(function() {
        $('#armadaTable').DataTable({
          responsive: true,
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'copy',
              text: '<i class="bx bx-copy"></i> Copy',
              className: 'btn btn-sm'
            },
            {
              extend: 'excel',
              text: '<i class="bx bx-file"></i> Excel',
              className: 'btn btn-sm'
            },
            {
              extend: 'pdf',
              text: '<i class="bx bx-file-pdf"></i> PDF',
              className: 'btn btn-sm'
            },
            {
              extend: 'print',
              text: '<i class="bx bx-printer"></i> Print',
              className: 'btn btn-sm'
            }
          ]
        });
      });

      // Function to edit armada
      function editArmada(id) {
        $.ajax({
          url: 'process/armada_process.php',
          type: 'GET',
          data: {
            id: id,
            action: 'get'
          },
          success: function(response) {
            $('#editArmadaBody').html(response);
            $('#editArmadaModal').modal('show');
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('Terjadi kesalahan saat mengambil data armada');
          }
        });
      }

      // Function to view armada details
      function viewArmada(id) {
        $.ajax({
          url: 'process/armada_process.php',
          type: 'GET',
          data: {
            id: id,
            action: 'view'
          },
          success: function(response) {
            $('#detailArmadaBody').html(response);
            $('#detailArmadaModal').modal('show');
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('Terjadi kesalahan saat mengambil detail armada');
          }
        });
      }

      // Function to delete armada
      function deleteArmada(id) {
        $('#deleteArmadaId').val(id);
        $('#deleteArmadaModal').modal('show');
      }
    </script>
  </body>
</html>