<?php
require 'auth/config.php';

// Query untuk mengambil data lokasi pengambilan
$sql_pickup = "SELECT id, nama FROM lokasi_pengambilan ORDER BY id";
$result_pickup = $conn->query($sql_pickup);

$pickup_locations = [];
if ($result_pickup->num_rows > 0) {
    while($row = $result_pickup->fetch_assoc()) {
        $pickup_locations[] = $row;
    }
}

// Query untuk mengambil data lokasi pengembalian
$sql_return = "SELECT id, nama FROM lokasi_pengembalian ORDER BY id";
$result_return = $conn->query($sql_return);

$return_locations = [];
if ($result_return->num_rows > 0) {
    while($row = $result_return->fetch_assoc()) {
        $return_locations[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Kembalikan data dalam format JSON jika diminta melalui AJAX
if (isset($_GET['format']) && $_GET['format'] == 'json') {
    $response = [
        'pickup' => $pickup_locations,
        'return' => $return_locations
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>