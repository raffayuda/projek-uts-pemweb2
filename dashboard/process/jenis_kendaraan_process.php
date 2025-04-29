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

// Proses tambah data jenis kendaraan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nama = clean_input($_POST['nama']);

    $query = "INSERT INTO jenis_kendaraan (nama) VALUES ('$nama')";

    if ($conn->query($query) === TRUE) {
        header("Location: ../jenis_kendaraan.php?status=success&message=Data jenis kendaraan berhasil ditambahkan");
    } else {
        header("Location: ../jenis_kendaraan.php?status=error&message=Gagal menambahkan data: " . $conn->error);
    }
    exit();
}

// Proses edit data jenis kendaraan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = clean_input($_POST['id']);
    $nama = clean_input($_POST['nama']);

    $query = "UPDATE jenis_kendaraan SET nama = '$nama' WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../jenis_kendaraan.php?status=success&message=Data jenis kendaraan berhasil diperbarui");
    } else {
        header("Location: ../jenis_kendaraan.php?status=error&message=Gagal memperbarui data: " . $conn->error);
    }
    exit();
}

// Proses hapus data jenis kendaraan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = clean_input($_POST['id']);

    // Periksa apakah jenis kendaraan sedang digunakan dalam armada
    $check_query = "SELECT COUNT(*) as count FROM armada WHERE jenis_kendaraan_id = $id";
    $check_result = $conn->query($check_query);
    $check_data = $check_result->fetch_assoc();
    
    if ($check_data['count'] > 0) {
        // Jika ada armada yang menggunakan jenis kendaraan ini, hapus armada terlebih dahulu
        // Periksa apakah armada sedang digunakan dalam peminjaman
        $check_peminjaman = "SELECT COUNT(*) as count FROM peminjaman p 
                            JOIN armada a ON p.armada_id = a.id 
                            WHERE a.jenis_kendaraan_id = $id";
        $result_peminjaman = $conn->query($check_peminjaman);
        $data_peminjaman = $result_peminjaman->fetch_assoc();
        
        if ($data_peminjaman['count'] > 0) {
            header("Location: ../jenis_kendaraan.php?status=error&message=Tidak dapat menghapus jenis kendaraan karena sedang digunakan dalam peminjaman");
            exit();
        }
        
        // Hapus armada yang menggunakan jenis kendaraan ini
        $delete_armada = "DELETE FROM armada WHERE jenis_kendaraan_id = $id";
        if (!$conn->query($delete_armada)) {
            header("Location: ../jenis_kendaraan.php?status=error&message=Gagal menghapus armada terkait: " . $conn->error);
            exit();
        }
    }

    // Hapus jenis kendaraan
    $query = "DELETE FROM jenis_kendaraan WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../jenis_kendaraan.php?status=success&message=Data jenis kendaraan berhasil dihapus");
    } else {
        header("Location: ../jenis_kendaraan.php?status=error&message=Gagal menghapus data: " . $conn->error);
    }
    exit();
}

// Ambil data jenis kendaraan untuk form edit
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get') {
    $id = clean_input($_GET['id']);

    $query = "SELECT * FROM jenis_kendaraan WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo "<div class='mb-3'>";
        echo "<label for='nama' class='form-label'>Nama Jenis Kendaraan</label>";
        echo "<input type='text' class='form-control' id='nama' name='nama' value='" . $row['nama'] . "' required />";
        echo "</div>";
        
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='edit'>";
    } else {
        echo "<p class='text-danger'>Data jenis kendaraan tidak ditemukan</p>";
    }
    exit();
}

// Redirect jika tidak ada action yang sesuai
header("Location: ../jenis_kendaraan.php");
exit();