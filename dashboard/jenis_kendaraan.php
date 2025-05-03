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

    <title>Manajemen Jenis Kendaraan | Driveasy</title>

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
              <h4 class="fw-bold py-3 mb-4">Manajemen Jenis Kendaraan</h4>

              <!-- Responsive Table -->
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Daftar Jenis Kendaraan</h5>
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#tambahJenisModal"
                  >
                    <i class="bx bx-plus me-1"></i> Tambah Jenis
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
                    <table id="jenisTable" class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Jenis</th>
                          <th>Jumlah Armada</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = "SELECT j.*, COUNT(a.id) as jumlah_armada 
                                  FROM jenis_kendaraan j 
                                  LEFT JOIN armada a ON j.id = a.jenis_kendaraan_id 
                                  GROUP BY j.id 
                                  ORDER BY j.id";
                        $result = $conn->query($query);
                        $no = 1;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['jumlah_armada'] . " kendaraan</td>";
                                echo "<td>
                                        <div class='dropdown'>
                                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                                <i class='bx bx-dots-vertical-rounded'></i>
                                            </button>
                                            <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='editJenis(" . $row['id'] . ")'>
                                                    <i class='bx bx-edit-alt me-1'></i> Edit
                                                </a>
                                                <a class='dropdown-item' href='javascript:void(0);' onclick='deleteJenis(" . $row['id'] . ", " . $row['jumlah_armada'] . ")'>
                                                    <i class='bx bx-trash me-1'></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Tidak ada data jenis kendaraan</td></tr>";
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

            <!-- Modal Tambah Jenis Kendaraan -->
            <div class="modal fade" id="tambahJenisModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Jenis Kendaraan</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/jenis_kendaraan_process.php" method="post">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Jenis Kendaraan</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama"
                          placeholder="Masukkan nama jenis kendaraan"
                          required
                        />
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

            <!-- Modal Edit Jenis Kendaraan -->
            <div class="modal fade" id="editJenisModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Jenis Kendaraan</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <form action="process/jenis_kendaraan_process.php" method="post" id="editJenisForm">
                    <div class="modal-body" id="editJenisBody">
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

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteJenisModal" tabindex="-1" aria-hidden="true">
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
                    <p id="deleteJenisText">Apakah Anda yakin ingin menghapus jenis kendaraan ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Batal
                    </button>
                    <form action="process/jenis_kendaraan_process.php" method="post">
                      <input type="hidden" name="id" id="deleteJenisId">
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
        $('#jenisTable').DataTable({
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

      // Function to edit jenis kendaraan
      function editJenis(id) {
        $.ajax({
          url: 'process/jenis_kendaraan_process.php',
          type: 'GET',
          data: {
            id: id,
            action: 'get'
          },
          success: function(response) {
            $('#editJenisBody').html(response);
            $('#editJenisModal').modal('show');
          },
          error: function(xhr, status, error) {
            console.error(error);
            alert('Terjadi kesalahan saat mengambil data jenis kendaraan');
          }
        });
      }

      // Function to delete jenis kendaraan
      function deleteJenis(id, jumlahArmada) {
        $('#deleteJenisId').val(id);
        
        if (jumlahArmada > 0) {
          $('#deleteJenisText').html('Jenis kendaraan ini memiliki ' + jumlahArmada + ' armada terkait. Menghapus jenis ini akan menghapus semua armada terkait. Apakah Anda yakin?');
        } else {
          $('#deleteJenisText').html('Apakah Anda yakin ingin menghapus jenis kendaraan ini?');
        }
        
        $('#deleteJenisModal').modal('show');
      }
    </script>
  </body>
</html>