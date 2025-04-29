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

// Proses tambah data pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $tanggal = clean_input($_POST['tanggal']);
    $jumlah_bayar = clean_input($_POST['jumlah_bayar']);
    $peminjaman_id = clean_input($_POST['peminjaman_id']);
    
    // Validasi peminjaman_id
    $check_query = "SELECT id FROM peminjaman WHERE id = $peminjaman_id";
    $check_result = $conn->query($check_query);
    
    if ($check_result->num_rows == 0) {
        header("Location: ../pembayaran.php?status=error&message=Data peminjaman tidak ditemukan");
        exit();
    }
    
    $query = "INSERT INTO pembayaran (tanggal, jumlah_bayar, peminjaman_id) 
              VALUES ('$tanggal', $jumlah_bayar, $peminjaman_id)";

    if ($conn->query($query) === TRUE) {
        header("Location: ../pembayaran.php?status=success&message=Data pembayaran berhasil ditambahkan");
    } else {
        header("Location: ../pembayaran.php?status=error&message=Gagal menambahkan data: " . $conn->error);
    }
    exit();
}

// Proses edit data pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = clean_input($_POST['id']);
    $tanggal = clean_input($_POST['tanggal']);
    $jumlah_bayar = clean_input($_POST['jumlah_bayar']);
    $peminjaman_id = clean_input($_POST['peminjaman_id']);
    
    // Validasi peminjaman_id
    $check_query = "SELECT id FROM peminjaman WHERE id = $peminjaman_id";
    $check_result = $conn->query($check_query);
    
    if ($check_result->num_rows == 0) {
        header("Location: ../pembayaran.php?status=error&message=Data peminjaman tidak ditemukan");
        exit();
    }
    
    $query = "UPDATE pembayaran SET 
              tanggal = '$tanggal', 
              jumlah_bayar = $jumlah_bayar, 
              peminjaman_id = $peminjaman_id 
              WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../pembayaran.php?status=success&message=Data pembayaran berhasil diperbarui");
    } else {
        header("Location: ../pembayaran.php?status=error&message=Gagal memperbarui data: " . $conn->error);
    }
    exit();
}

// Proses hapus data pembayaran
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = clean_input($_POST['id']);
    
    $query = "DELETE FROM pembayaran WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../pembayaran.php?status=success&message=Data pembayaran berhasil dihapus");
    } else {
        header("Location: ../pembayaran.php?status=error&message=Gagal menghapus data: " . $conn->error);
    }
    exit();
}

// Ambil data pembayaran untuk form edit
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get') {
    $id = clean_input($_GET['id']);

    $query = "SELECT pb.*, p.nama_peminjam 
              FROM pembayaran pb 
              LEFT JOIN peminjaman p ON pb.peminjaman_id = p.id 
              WHERE pb.id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "Data tidak ditemukan"]);
    }
    exit();
}

// Redirect jika tidak ada action yang sesuai
header("Location: ../pembayaran.php");
exit();