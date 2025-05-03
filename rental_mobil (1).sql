-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2025 pada 11.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `id` int(11) NOT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `thn_beli` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `jenis_kendaraan_id` int(11) DEFAULT NULL,
  `kapasitas_kursi` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `gambar` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`id`, `merk`, `nopol`, `thn_beli`, `deskripsi`, `jenis_kendaraan_id`, `kapasitas_kursi`, `rating`, `harga`, `gambar`) VALUES
(1, 'Tesla Model S', 'B 1234 EV', 2023, 'Electric • Auto • Range 300 mi', 1, 5, 5, 5000000, 'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(2, 'Toyota Prius', 'B 5678 HB', 2022, 'Hybrid • Auto • MPG 54', 2, 5, 5, 1200000, 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(3, 'Porsche 911', 'B 911 SP', 2023, 'Gas • Manual • 0-60 in 3.2s', 3, 2, 5, 2000000, 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(4, 'Mercedes-Benz GLC', 'B 4321 MB', 2022, 'Gas • Auto • Luxury SUV', 4, 5, 4, 3000000, 'https://images.unsplash.com/photo-1653245620594-02e1d9a188f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
(5, 'BMW i4', 'B 8765 BM', 2023, 'Electric • Auto • Range 270 mi', 1, 5, 4, 4000000, 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
(6, 'Honda Civic', 'B 2468 HC', 2021, 'Gas • Auto • MPG 36', 2, 5, 4, 1000000, 'https://images.unsplash.com/photo-1590362891991-f776e747a588?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `nama`) VALUES
(1, 'Premium'),
(2, 'Eco'),
(3, 'Sport'),
(4, 'SUV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pengambilan`
--

CREATE TABLE `lokasi_pengambilan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_pengambilan`
--

INSERT INTO `lokasi_pengambilan` (`id`, `nama`) VALUES
(1, 'Downtown Office'),
(2, 'Airport Terminal'),
(3, 'North Branch'),
(4, 'South Branch');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pengembalian`
--

CREATE TABLE `lokasi_pengembalian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_pengembalian`
--

INSERT INTO `lokasi_pengembalian` (`id`, `nama`) VALUES
(1, 'Downtown Office'),
(2, 'Airport Terminal'),
(3, 'North Branch'),
(4, 'South Branch');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL DEFAULT 'Lunas',
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tanggal`, `jumlah_bayar`, `peminjaman_id`, `status_pembayaran`, `metode_pembayaran`, `keterangan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2025-04-29', 3000000, 1, 'Lunas', NULL, NULL, NULL, '2025-04-29 12:39:22', '2025-04-29 12:39:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(45) NOT NULL,
  `ktp_peminjam` varchar(255) NOT NULL,
  `keperluan_pinjam` varchar(100) DEFAULT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `biaya` double NOT NULL,
  `armada_id` int(11) NOT NULL,
  `komentar_peminjam` varchar(100) DEFAULT NULL,
  `status_pinjam` varchar(20) NOT NULL DEFAULT 'Pending',
  `pengembalian_id` int(11) DEFAULT NULL,
  `pengambilan_id` int(11) DEFAULT NULL,
  `waktu_pengambilan` time DEFAULT NULL,
  `waktu_pengembalian` time DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `ktp_peminjam`, `keperluan_pinjam`, `mulai`, `selesai`, `biaya`, `armada_id`, `komentar_peminjam`, `status_pinjam`, `pengembalian_id`, `pengambilan_id`, `waktu_pengambilan`, `waktu_pengembalian`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Raffa Yuda', 'uploads/ktp/1745928441_Screenshot 2025-01-06 165952.png', 'Wedding', '2025-04-29', '2025-05-01', 3000000, 6, 'n', 'Dibooking', 2, 1, '19:10:00', '21:06:00', '+628889623663', '2025-04-29 12:07:21', '2025-04-29 12:07:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_peminjaman` (`peminjaman_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_armada` (`armada_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_peminjaman` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
