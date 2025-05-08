<?php
header('Content-Type: application/json');

// Koneksi ke database
require 'auth/config.php';

// Cek apakah form disubmit via POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error", "message" => "Metode tidak valid"]);
    exit();
}

// Ambil data dari form
$pengambilan_id = $_POST['pickup_location'] ?? null;
$pengembalian_id = $_POST['return_location'] ?? null;
$mulai = $_POST['pickup_date'] ?? null;
$selesai = $_POST['return_date'] ?? null;
$waktu_pengambilan = $_POST['pickup_time'] ?? null;
$waktu_pengembalian = $_POST['return_time'] ?? null;
$armada_id = $_POST['vehicle_id'] ?? null;
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$nama_peminjam = trim($first_name . ' ' . $last_name);
$keperluan_pinjam = $_POST['purpose'] ?? null;
$komentar_peminjam = $_POST['comments'] ?? '';
$phone = $_POST['phone'] ?? '';

$errors = [];

// Validasi data
if (empty($pengambilan_id)) $errors[] = "Lokasi pengambilan harus dipilih";
if (empty($pengembalian_id)) $errors[] = "Lokasi pengembalian harus dipilih";
if (empty($mulai)) $errors[] = "Tanggal pengambilan harus diisi";
if (empty($selesai)) $errors[] = "Tanggal pengembalian harus diisi";
if (empty($waktu_pengambilan)) $errors[] = "Waktu pengambilan harus diisi";
if (empty($waktu_pengembalian)) $errors[] = "Waktu pengembalian harus diisi";
if (empty($armada_id)) $errors[] = "Kendaraan harus dipilih";
if (empty($nama_peminjam)) $errors[] = "Nama peminjam harus diisi";
if (empty($keperluan_pinjam)) $errors[] = "Keperluan peminjaman harus diisi";

// Validasi tanggal
$today = date('Y-m-d');
if ($mulai < $today) $errors[] = "Tanggal pengambilan tidak boleh kurang dari hari ini";
if ($selesai < $mulai) $errors[] = "Tanggal pengembalian tidak boleh kurang dari tanggal pengambilan";

// Handle upload KTP
$ktp_peminjam = '';
if (isset($_FILES['ktp_image']) && $_FILES['ktp_image']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = 'uploads/ktp/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    // Generate file name with timestamp to avoid duplicates
    $file_name = time() . '_' . basename($_FILES['ktp_image']['name']);
    $upload_path = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES['ktp_image']['tmp_name'], $upload_path)) {
        // Simpan hanya nama file, bukan path lengkap
        $ktp_peminjam = $file_name;
    } else {
        $errors[] = "Gagal mengunggah gambar KTP";
    }
} else {
    $errors[] = "Foto KTP harus diunggah";
}

// Jika ada error, kirim response error
if (!empty($errors)) {
    echo json_encode([
        "status" => "error",
        "message" => implode("<br>", $errors)
    ]);
    exit();
}

try {
    // Hitung durasi sewa
    $start_date = new DateTime($mulai);
    $end_date = new DateTime($selesai);
    $interval = $start_date->diff($end_date);
    $days = $interval->days + 1;

    // Ambil harga kendaraan dari DB
    $stmt = $conn->prepare("SELECT harga FROM armada WHERE id = ?");
    $stmt->bind_param("i", $armada_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode([
            "status" => "error",
            "message" => "Kendaraan tidak ditemukan"
        ]);
        exit();
    }

    $row = $result->fetch_assoc();
    $harga_per_hari = $row['harga'];
    $biaya = $harga_per_hari * $days;

    $status_pinjam = 'Dibooking';

    // Simpan data ke tabel peminjaman
    $stmt = $conn->prepare("INSERT INTO peminjaman (nama_peminjam, ktp_peminjam, keperluan_pinjam, mulai, selesai, biaya, armada_id, komentar_peminjam, status_pinjam, pengembalian_id, pengambilan_id, waktu_pengambilan, waktu_pengembalian, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdissiisss", $nama_peminjam, $ktp_peminjam, $keperluan_pinjam, $mulai, $selesai, $biaya, $armada_id, $komentar_peminjam, $status_pinjam, $pengembalian_id, $pengambilan_id, $waktu_pengambilan, $waktu_pengembalian, $phone);

    if ($stmt->execute()) {
        $peminjaman_id = $conn->insert_id;
        echo json_encode([
            "status" => "success",
            "redirect" => "index.php?booking_success=true&id=" . $peminjaman_id
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal menyimpan ke database: " . $stmt->error
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Exception: " . $e->getMessage()
    ]);
}

$conn->close();