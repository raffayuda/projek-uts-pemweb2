<?php
require 'auth/config.php';

// Query untuk mengambil data armada
$sql = "SELECT a.id, a.merk, a.deskripsi, a.kapasitas_kursi, a.rating, a.gambar, a.harga, j.nama as jenis_nama 
        FROM armada a 
        JOIN jenis_kendaraan j ON a.jenis_kendaraan_id = j.id 
        WHERE a.id NOT IN (SELECT armada_id FROM peminjaman WHERE status_pinjam IN ('Dibooking', 'Dalam Peminjaman'))
        ORDER BY a.id";

$result = $conn->query($sql);

$vehicles = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Menggunakan harga langsung dari database (kolom harga pada tabel armada)
        $vehicles[] = $row;
    }
}

// Query untuk mengambil semua jenis kendaraan
$sql_jenis = "SELECT id, nama FROM jenis_kendaraan ORDER BY id";
$result_jenis = $conn->query($sql_jenis);

$jenis_kendaraan = [];
if ($result_jenis->num_rows > 0) {
    while($row = $result_jenis->fetch_assoc()) {
        $jenis_kendaraan[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Kembalikan data dalam format JSON jika diminta melalui AJAX
if (isset($_GET['format']) && $_GET['format'] == 'json') {
    $response = [
        'vehicles' => $vehicles,
        'jenis_kendaraan' => $jenis_kendaraan
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>