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

// Proses tambah data lokasi pengambilan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nama = clean_input($_POST['nama']);

    $query = "INSERT INTO lokasi_pengambilan (nama) VALUES ('$nama')";

    if ($conn->query($query) === TRUE) {
        header("Location: ../lokasi_pengambilan.php?status=success&message=Data lokasi pengambilan berhasil ditambahkan");
    } else {
        header("Location: ../lokasi_pengambilan.php?status=error&message=Gagal menambahkan data: " . $conn->error);
    }
    exit();
}

// Proses edit data lokasi pengambilan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = clean_input($_POST['id']);
    $nama = clean_input($_POST['nama']);

    $query = "UPDATE lokasi_pengambilan SET nama = '$nama' WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../lokasi_pengambilan.php?status=success&message=Data lokasi pengambilan berhasil diperbarui");
    } else {
        header("Location: ../lokasi_pengambilan.php?status=error&message=Gagal memperbarui data: " . $conn->error);
    }
    exit();
}

// Proses hapus data lokasi pengambilan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = clean_input($_POST['id']);

    // Periksa apakah lokasi pengambilan sedang digunakan dalam peminjaman
    $check_query = "SELECT COUNT(*) as count FROM peminjaman WHERE pengambilan_id = $id";
    $check_result = $conn->query($check_query);
    $check_data = $check_result->fetch_assoc();
    
    if ($check_data['count'] > 0) {
        header("Location: ../lokasi_pengambilan.php?status=error&message=Tidak dapat menghapus lokasi pengambilan karena sedang digunakan dalam peminjaman");
        exit();
    }

    $query = "DELETE FROM lokasi_pengambilan WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: ../lokasi_pengambilan.php?status=success&message=Data lokasi pengambilan berhasil dihapus");
    } else {
        header("Location: ../lokasi_pengambilan.php?status=error&message=Gagal menghapus data: " . $conn->error);
    }
    exit();
}

// Ambil data lokasi pengambilan untuk form edit
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'get') {
    $id = clean_input($_GET['id']);

    $query = "SELECT * FROM lokasi_pengambilan WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo "<div class='mb-3'>";
        echo "<label for='nama' class='form-label'>Nama Lokasi</label>";
        echo "<input type='text' class='form-control' id='nama' name='nama' value='" . $row['nama'] . "' required />";
        echo "</div>";
        
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='hidden' name='action' value='edit'>";
    } else {
        echo "<p class='text-danger'>Data lokasi pengambilan tidak ditemukan</p>";
    }
    exit();
}

// Redirect jika tidak ada action yang sesuai
header("Location: ../lokasi_pengambilan.php");
exit();