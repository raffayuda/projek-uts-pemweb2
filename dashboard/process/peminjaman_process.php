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

// Fungsi untuk upload file KTP
function upload_ktp($file) {
    $target_dir = "../../uploads/ktp/";
    
    // Buat direktori jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_name = time() . "_" . basename($file["name"]);
    $target_file = $target_dir . $file_name;
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Cek apakah file adalah gambar
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return ["status" => false, "message" => "File bukan gambar."];
    }
    
    // Cek ukuran file (max 2MB)
    if ($file["size"] > 2000000) {
        return ["status" => false, "message" => "Ukuran file terlalu besar (max 2MB)."];
    }
    
    // Izinkan format file tertentu
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
        return ["status" => false, "message" => "Hanya file JPG, JPEG, & PNG yang diizinkan."];
    }
    
    // Upload file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return ["status" => true, "file_path" => $target_file];
    } else {
        return ["status" => false, "message" => "Gagal mengupload file."];
    }
}

// Proses tambah data peminjaman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nama_peminjam = clean_input($_POST['nama_peminjam']);
    $phone = clean_input($_POST['phone']);
    $keperluan_pinjam = clean_input($_POST['keperluan_pinjam']);
    $armada_id = clean_input($_POST['armada_id']);
    $status_pinjam = clean_input($_POST['status_pinjam']);
    $pengambilan_id = clean_input($_POST['pengambilan_id']);
    $pengembalian_id = clean_input($_POST['pengembalian_id']);
    $mulai = clean_input($_POST['mulai']);
    $waktu_pengambilan = clean_input($_POST['waktu_pengambilan']);
    $selesai = clean_input($_POST['selesai']);
    $waktu_pengembalian = clean_input($_POST['waktu_pengembalian']);
    $biaya = clean_input($_POST['biaya']);
    $komentar_peminjam = isset($_POST['komentar_peminjam']) ? clean_input($_POST['komentar_peminjam']) : null;
    
    // Upload KTP
    if (isset($_FILES['ktp_peminjam']) && $_FILES['ktp_peminjam']['error'] == 0) {
        $upload_result = upload_ktp($_FILES['ktp_peminjam']);
        
        if (!$upload_result['status']) {
            header("Location: ../peminjaman.php?status=error&message=" . $upload_result['message']);
            exit();
        }
        
        $ktp_peminjam = $upload_result['file_path'];
    } else {
        header("Location: ../peminjaman.php?status=error&message=KTP peminjam wajib diupload.");
        exit();
    }
    
    $query = "INSERT INTO peminjaman (nama_peminjam, ktp_peminjam, phone, keperluan_pinjam, mulai, selesai, biaya, armada_id, komentar_peminjam, status_pinjam, pengembalian_id, pengambilan_id, waktu_pengambilan, waktu_pengembalian) 
              VALUES ('$nama_peminjam', '$ktp_peminjam', '$phone', '$keperluan_pinjam', '$mulai', '$selesai', $biaya, $armada_id, " . ($komentar_peminjam ? "'$komentar_peminjam'" : "NULL") . ", '$status_pinjam', $pengembalian_id, $pengambilan_id, '$waktu_pengambilan', '$waktu_pengembalian')";

    if ($conn->query($query) === TRUE) {
        header("Location: ../peminjaman.php?status=success&message=Data peminjaman berhasil ditambahkan");
    } else {
        header("Location: ../peminjaman.php?status=error&message=Gagal menambahkan data: " . $conn->error);
    }
    exit();
}

// Proses edit data peminjaman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = clean_input($_POST['id']);
    $nama_peminjam = clean_input($_POST['nama_peminjam']);
    $phone = clean_input($_POST['phone']);
    $keperluan_pinjam = clean_input($_POST['keperluan_pinjam']);
    $armada_id = clean_input($_POST['armada_id']);
    $status_pinjam = clean_input($_POST['status_pinjam']);
    $pengambilan_id = clean_input($_POST['pengambilan_id']);
    $pengembalian_id = clean_input($_POST['pengembalian_id']);
    $mulai = clean_input($_POST['mulai']);
    $waktu_pengambilan = clean_input($_POST['waktu_pengambilan']);
    $selesai = clean_input($_POST['selesai']);
    $waktu_pengembalian = clean_input($_POST['waktu_pengembalian']);
    $biaya = clean_input($_POST['biaya']);
    $komentar_peminjam = isset($_POST['komentar_peminjam']) ? clean_input($_POST['komentar_peminjam']) : null;
    $old_ktp = isset($_POST['old_ktp']) ? clean_input($_POST['old_ktp']) : null;
    
    // Cek apakah ada upload KTP baru
    if (isset($_FILES['ktp_peminjam']) && $_FILES['ktp_peminjam']['error'] == 0) {
        $upload_result = upload_ktp($_FILES['ktp_peminjam']);
        
        if (!$upload_result['status']) {
            header("Location: ../peminjaman.php?status=error&message=" . $upload_result['message']);
            exit();
        }
        
        $ktp_peminjam = $upload_result['file_path'];
    } else {
        // Gunakan KTP lama jika tidak ada upload baru
        $ktp_peminjam = $old_ktp;
    }
    
    $query = "UPDATE peminjaman SET 
              nama_peminjam = '$nama_peminjam', 
              ktp_peminjam = '$ktp_peminjam', 
              phone = '$phone', 
              keperluan_pinjam = '$keperluan_pinjam', 
              mulai = '$mulai', 
              selesai = '$selesai', 
              biaya = $biaya, 
              armada_id = $armada_id, 
              komentar_peminjam = " . ($komentar_peminjam ? "'$komentar_peminjam'" : "NULL") . ", 
              status_pinjam = '$status_pinjam', 
              pengembalian_id = $pengembalian_id, 
              pengambilan_id = $pengambilan_id, 
              waktu_pengambilan = '$waktu_pengambilan', 
              waktu_pengembalian = '$waktu_pengembalian' 
              WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../peminjaman.php?status=success&message=Data peminjaman berhasil diperbarui");
    } else {
        header("Location: ../peminjaman.php?status=error&message=Gagal memperbarui data: " . $conn->error);
    }
    exit();
}

// Proses hapus data peminjaman
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = clean_input($_POST['id']);
    
    // Periksa apakah peminjaman memiliki pembayaran terkait
    $check_query = "SELECT COUNT(*) as count FROM pembayaran WHERE peminjaman_id = $id";
    $check_result = $conn->query($check_query);
    $check_data = $check_result->fetch_assoc();
    
    if ($check_data['count'] > 0) {
        // Hapus pembayaran terkait terlebih dahulu
        $delete_payment = "DELETE FROM pembayaran WHERE peminjaman_id = $id";
        if (!$conn->query($delete_payment)) {
            header("Location: ../peminjaman.php?status=error&message=Gagal menghapus pembayaran terkait: " . $conn->error);
            exit();
        }
    }

    // Hapus peminjaman
    $query = "DELETE FROM peminjaman WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../peminjaman.php?status=success&message=Data peminjaman berhasil dihapus");
    } else {
        header("Location: ../peminjaman.php?status=error&message=Gagal menghapus data: " . $conn->error);
    }
    exit();
}

// Ambil data peminjaman untuk form edit atau detail
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get') {
    $id = clean_input($_GET['id']);

    $query = "SELECT p.*, a.merk as armada_merk, a.nopol as armada_nopol, 
              lp1.nama as pengambilan_nama, lp2.nama as pengembalian_nama 
              FROM peminjaman p 
              LEFT JOIN armada a ON p.armada_id = a.id 
              LEFT JOIN lokasi_pengambilan lp1 ON p.pengambilan_id = lp1.id 
              LEFT JOIN lokasi_pengembalian lp2 ON p.pengembalian_id = lp2.id 
              WHERE p.id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        header('HTTP/1.1 404 Not Found');
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }
    exit();
}
?>