-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2025 pada 11.40
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
(1, 'Tesla Model S', 'B 1234 EV', 2023, 'Electric • Auto • Range 300 mi', 1, 5, 5, 5000000, '1746248459_tesla.png'),
(2, 'Toyota Prius', 'B 5678 HB', 2022, 'Hybrid • Auto • MPG 54', 2, 5, 5, 1200000, '1746248473_toyota.png'),
(3, 'Porsche 911', 'B 911 SP', 2023, 'Gas • Manual • 0-60 in 3.2s', 3, 2, 5, 2000000, '1746248719_prosche.png'),
(4, 'Mercedes-Benz GLC', 'B 4321 MB', 2022, 'Gas • Auto • Luxury SUV', 4, 5, 4, 3000000, '1746248732_mercedes.png'),
(5, 'BMW i4', 'B 8765 BM', 2023, 'Electric • Auto • Range 270 mi', 1, 5, 4, 4000000, '1746248742_bmw.png'),
(6, 'Honda Civic', 'B 2468 HC', 2021, 'Gas • Auto • MPG 36', 2, 5, 4, 1000000, '1746248759_civic.png');

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
(1, 'Jakarta Pusat, Kemayoran'),
(2, 'Depok, Cimanggis'),
(3, 'Bogor, Cibanteng'),
(4, 'Bekasi, Tambun');

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
(1, 'Jakarta Pusat, Kemayoran'),
(2, 'Depok, Cimanggis'),
(3, 'Bogor, Cibanteng'),
(4, 'Bekasi, Tambun');

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
(2, '2025-05-05', 9000000, 6, 'Lunas', NULL, NULL, NULL, '2025-05-05 09:32:44', '2025-05-05 09:32:44');

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
(6, 'Raffa Yuda', 'uploads/ktp/1746415738_images.jpeg', 'Liburan', '2025-05-05', '2025-05-07', 9000000, 4, 'AAAHHHHHH', 'Dibooking', 2, 1, '10:30:00', '12:28:00', '+628889623663', '2025-05-05 03:28:58', '2025-05-05 03:28:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`) VALUES
(1, 'raffa', 'raffa@gmail.com', '$2y$10$6LclnNvsx9t8SXY2Sqf52O36ThZMAhmRHtJeu8aqZlzBDTNvW/dC.', 2),
(2, 'admin', 'admin@gmail.com', '$2y$10$iIu.fRgFbPyR3XCoZTPhe.vfoAhphBMgfOSGCopL6KdL0MBmMQOMy', 1),
(3, 'test', 'test@gmail.com', '$2y$10$Iud2.WHtV0iaICdrdBiMFeXzuRvofFWBSs4XMmaRkA.9I8oeKS1DK', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_kendaraan_id` (`jenis_kendaraan_id`);

--
-- Indeks untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi_pengambilan`
--
ALTER TABLE `lokasi_pengambilan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi_pengembalian`
--
ALTER TABLE `lokasi_pengembalian`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasi_pengambilan`
--
ALTER TABLE `lokasi_pengambilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasi_pengembalian`
--
ALTER TABLE `lokasi_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `armada`
--
ALTER TABLE `armada`
  ADD CONSTRAINT `armada_ibfk_1` FOREIGN KEY (`jenis_kendaraan_id`) REFERENCES `jenis_kendaraan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_peminjaman` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`armada_id`) REFERENCES `armada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
