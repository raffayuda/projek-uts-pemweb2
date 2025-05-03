<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/login.php");
    exit();
}

include '../../auth/config.php';

// Fungsi untuk membersihkan input
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Fungsi untuk mengunggah file gambar
function upload_image() {
    $target_dir = "../uploads/armada/";
    
    // Buat direktori jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_name = basename($_FILES["gambar"]["name"]);
    $new_file_name = time() . '_' . $file_name; // Nama file dengan timestamp
    $target_file = $target_dir . $new_file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $upload_ok = 1;
    
    // Cek apakah file benar-benar gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        return ["status" => false, "message" => "File bukan gambar."];
    }
    
    // Cek ukuran file (max 2MB)
    if ($_FILES["gambar"]["size"] > 2000000) {
        return ["status" => false, "message" => "Ukuran file terlalu besar (max 2MB)."];
    }
    
    // Cek tipe file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        return ["status" => false, "message" => "Hanya file JPG, JPEG, & PNG yang diizinkan."];
    }
    
    // Upload file
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // Hanya kembalikan nama file, bukan path lengkap
        return ["status" => true, "file_path" => $new_file_name];
    } else {
        return ["status" => false, "message" => "Terjadi kesalahan saat mengunggah file."];
    }
}

// Proses tambah data armada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $merk = clean_input($_POST['merk']);
    $nopol = clean_input($_POST['nopol']);
    $thn_beli = clean_input($_POST['thn_beli']);
    $deskripsi = clean_input($_POST['deskripsi']);
    $jenis_kendaraan_id = clean_input($_POST['jenis_kendaraan_id']);
    $kapasitas_kursi = clean_input($_POST['kapasitas_kursi']);
    $rating = clean_input($_POST['rating']);
    $harga = clean_input($_POST['harga']);
    
    // Upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $upload_result = upload_image();
        if (!$upload_result["status"]) {
            header("Location: ../armada.php?status=error&message=" . $upload_result["message"]);
            exit();
        }
        $gambar_path = $upload_result["file_path"]; // Sekarang hanya nama file
    } else {
        header("Location: ../armada.php?status=error&message=Gambar wajib diunggah");
        exit();
    }

    $query = "INSERT INTO armada (merk, nopol, thn_beli, deskripsi, jenis_kendaraan_id, kapasitas_kursi, rating, harga, gambar) 
              VALUES ('$merk', '$nopol', $thn_beli, '$deskripsi', $jenis_kendaraan_id, $kapasitas_kursi, $rating, $harga, '$gambar_path')";

    if ($conn->query($query) === TRUE) {
        header("Location: ../armada.php?status=success&message=Data armada berhasil ditambahkan");
    } else {
        header("Location: ../armada.php?status=error&message=Gagal menambahkan data: " . $conn->error);
    }
    exit();
}

// Proses edit data armada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = clean_input($_POST['id']);
    $merk = clean_input($_POST['merk']);
    $nopol = clean_input($_POST['nopol']);
    $thn_beli = clean_input($_POST['thn_beli']);
    $deskripsi = clean_input($_POST['deskripsi']);
    $jenis_kendaraan_id = clean_input($_POST['jenis_kendaraan_id']);
    $kapasitas_kursi = clean_input($_POST['kapasitas_kursi']);
    $rating = clean_input($_POST['rating']);
    $harga = clean_input($_POST['harga']);
    
    // Cek apakah ada file gambar baru yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $upload_result = upload_image();
        if (!$upload_result["status"]) {
            header("Location: ../armada.php?status=error&message=" . $upload_result["message"]);
            exit();
        }
        $gambar_path = $upload_result["file_path"]; // Sekarang hanya nama file
        
        // Hapus gambar lama jika ada
        $query_get_old = "SELECT gambar FROM armada WHERE id = $id";
        $result_old = $conn->query($query_get_old);
        if ($result_old->num_rows > 0) {
            $row_old = $result_old->fetch_assoc();
            $old_image = $row_old['gambar'];
            // Jika nama file ada dan bukan path
            if (!empty($old_image)) {
                $old_image_path = "../uploads/armada/" . $old_image;
                if (file_exists($old_image_path)) {
                    @unlink($old_image_path);
                }
            }
        }
        
        $query = "UPDATE armada SET 
                  merk = '$merk', 
                  nopol = '$nopol', 
                  thn_beli = $thn_beli, 
                  deskripsi = '$deskripsi', 
                  jenis_kendaraan_id = $jenis_kendaraan_id, 
                  kapasitas_kursi = $kapasitas_kursi, 
                  rating = $rating, 
                  harga = $harga, 
                  gambar = '$gambar_path' 
                  WHERE id = $id";
    } else {
        // Tidak ada file gambar baru
        $query = "UPDATE armada SET 
                  merk = '$merk', 
                  nopol = '$nopol', 
                  thn_beli = $thn_beli, 
                  deskripsi = '$deskripsi', 
                  jenis_kendaraan_id = $jenis_kendaraan_id, 
                  kapasitas_kursi = $kapasitas_kursi, 
                  rating = $rating, 
                  harga = $harga 
                  WHERE id = $id";
    }

    if ($conn->query($query) === TRUE) {
        header("Location: ../armada.php?status=success&message=Data armada berhasil diperbarui");
    } else {
        header("Location: ../armada.php?status=error&message=Gagal memperbarui data: " . $conn->error);
    }
    exit();
}

// Proses hapus data armada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = clean_input($_POST['id']);

    // Periksa apakah armada sedang digunakan dalam peminjaman
    $check_query = "SELECT COUNT(*) as count FROM peminjaman WHERE armada_id = $id";
    $check_result = $conn->query($check_query);
    $check_data = $check_result->fetch_assoc();
    
    if ($check_data['count'] > 0) {
        header("Location: ../armada.php?status=error&message=Tidak dapat menghapus armada karena sedang digunakan dalam peminjaman");
        exit();
    }
    
    // Ambil informasi gambar untuk dihapus
    $query_get_image = "SELECT gambar FROM armada WHERE id = $id";
    $result_image = $conn->query($query_get_image);
    if ($result_image->num_rows > 0) {
        $row_image = $result_image->fetch_assoc();
        $image_name = $row_image['gambar'];
        // Hapus file gambar jika ada
        if (!empty($image_name)) {
            $image_path = "../uploads/armada/" . $image_name;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
    }

    $query = "DELETE FROM armada WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../armada.php?status=success&message=Data armada berhasil dihapus");
    } else {
        header("Location: ../armada.php?status=error&message=Gagal menghapus data: " . $conn->error);
    }
    exit();
}

// Ambil data armada untuk form edit
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get') {
    $id = clean_input($_GET['id']);

    $query = "SELECT * FROM armada WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Query untuk mendapatkan daftar jenis kendaraan
        $query_jenis = "SELECT * FROM jenis_kendaraan ORDER BY nama";
        $result_jenis = $conn->query($query_jenis);
        
        // Buat form edit
        echo "<div class='row'>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='merk' class='form-label'>Merk Kendaraan</label>";
        echo "<input type='text' class='form-control' id='merk' name='merk' value='" . $row['merk'] . "' required />";
        echo "</div>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='nopol' class='form-label'>Nomor Polisi</label>";
        echo "<input type='text' class='form-control' id='nopol' name='nopol' value='" . $row['nopol'] . "' required />";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='row'>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='thn_beli' class='form-label'>Tahun Pembelian</label>";
        echo "<input type='number' class='form-control' id='thn_beli' name='thn_beli' value='" . $row['thn_beli'] . "' required />";
        echo "</div>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='jenis_kendaraan_id' class='form-label'>Jenis Kendaraan</label>";
        echo "<select class='form-select' id='jenis_kendaraan_id' name='jenis_kendaraan_id' required>";
        
        if ($result_jenis->num_rows > 0) {
            while ($row_jenis = $result_jenis->fetch_assoc()) {
                $selected = ($row_jenis['id'] == $row['jenis_kendaraan_id']) ? 'selected' : '';
                echo "<option value='" . $row_jenis['id'] . "' $selected>" . $row_jenis['nama'] . "</option>";
            }
        }
        
        echo "</select>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='row'>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='kapasitas_kursi' class='form-label'>Kapasitas Kursi</label>";
        echo "<input type='number' class='form-control' id='kapasitas_kursi' name='kapasitas_kursi' value='" . $row['kapasitas_kursi'] . "' required />";
        echo "</div>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='rating' class='form-label'>Rating (1-5)</label>";
        echo "<input type='number' class='form-control' id='rating' name='rating' min='1' max='5' value='" . $row['rating'] . "' required />";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='row'>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='harga' class='form-label'>Harga Sewa per Hari</label>";
        echo "<input type='number' class='form-control' id='harga' name='harga' value='" . $row['harga'] . "' required />";
        echo "</div>";
        echo "<div class='col-md-6 mb-3'>";
        echo "<label for='gambar' class='form-label'>Gambar</label>";
        echo "<input type='file' class='form-control' id='gambar' name='gambar' accept='image/*'>";
        echo "<small class='text-muted'>Format yang diizinkan: JPG, JPEG, PNG. Max: 2MB</small>";
        // Tampilkan gambar dengan path yang direkonstruksi
        echo "<div class='mt-2'><img src='../uploads/armada/" . $row['gambar'] . "' class='img-preview' alt='Preview'></div>";
        echo "<small class='text-muted'>Biarkan kosong jika tidak ingin mengubah gambar</small>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='mb-3'>";
        echo "<label for='deskripsi' class='form-label'>Deskripsi</label>";
        echo "<textarea class='form-control' id='deskripsi' name='deskripsi' rows='3' required>" . $row['deskripsi'] . "</textarea>";
        echo "</div>";
        
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='edit'>";
    } else {
        echo "<p class='text-danger'>Data armada tidak ditemukan</p>";
    }
    exit();
}

// Ambil detail armada untuk modal detail
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'view') {
    $id = clean_input($_GET['id']);

    $query = "SELECT a.*, j.nama as jenis_nama 
              FROM armada a 
              LEFT JOIN jenis_kendaraan j ON a.jenis_kendaraan_id = j.id 
              WHERE a.id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        // Tampilkan gambar dengan path yang direkonstruksi
        echo "<img src='../uploads/armada/" . $row['gambar'] . "' class='img-fluid rounded mb-3' alt='" . $row['merk'] . "'>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<h4>" . $row['merk'] . "</h4>";
        echo "<p class='text-muted'>" . $row['nopol'] . " | " . $row['jenis_nama'] . "</p>";
        echo "<p><strong>Tahun Pembelian:</strong> " . $row['thn_beli'] . "</p>";
        echo "<p><strong>Kapasitas:</strong> " . $row['kapasitas_kursi'] . " Kursi</p>";
        echo "<p><strong>Rating:</strong> " . $row['rating'] . "/5</p>";
        echo "<p><strong>Harga Sewa:</strong> Rp " . number_format($row['harga'], 0, ',', '.') . " per hari</p>";
        echo "<p><strong>Deskripsi:</strong><br>" . $row['deskripsi'] . "</p>";
        echo "</div>";
        echo "</div>";
        
        // Cek apakah armada sedang digunakan dalam peminjaman
        $query_peminjaman = "SELECT p.*, lp.nama as lokasi_pengambilan, lr.nama as lokasi_pengembalian 
                            FROM peminjaman p 
                            LEFT JOIN lokasi_pengambilan lp ON p.pengambilan_id = lp.id 
                            LEFT JOIN lokasi_pengembalian lr ON p.pengembalian_id = lr.id 
                            WHERE p.armada_id = $id 
                            ORDER BY p.mulai DESC 
                            LIMIT 5";
        $result_peminjaman = $conn->query($query_peminjaman);
        
        if ($result_peminjaman->num_rows > 0) {
            echo "<hr>";
            echo "<h5 class='mt-4'>Riwayat Peminjaman Terakhir</h5>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-sm table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Peminjam</th>";
            echo "<th>Tanggal</th>";
            echo "<th>Lokasi</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            while ($row_peminjaman = $result_peminjaman->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_peminjaman['nama_peminjam'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($row_peminjaman['mulai'])) . " - " . date('d/m/Y', strtotime($row_peminjaman['selesai'])) . "</td>";
                echo "<td>Ambil: " . $row_peminjaman['lokasi_pengambilan'] . "<br>Kembali: " . $row_peminjaman['lokasi_pengembalian'] . "</td>";
                echo "<td><span class='badge bg-" . ($row_peminjaman['status_pinjam'] == 'Selesai' ? 'success' : ($row_peminjaman['status_pinjam'] == 'Dibooking' ? 'warning' : 'primary')) . "'>" . $row_peminjaman['status_pinjam'] . "</span></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<hr>";
            echo "<p class='text-muted mt-3'>Belum ada riwayat peminjaman untuk armada ini.</p>";
        }
    } else {
        echo "<p class='text-danger'>Data armada tidak ditemukan</p>";
    }
    exit();
}

// Redirect jika tidak ada action yang sesuai
header("Location: ../armada.php");
exit();