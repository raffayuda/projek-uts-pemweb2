-- Data untuk tabel jenis_kendaraan
INSERT INTO `jenis_kendaraan` (`id`, `nama`) VALUES
(1, 'Premium'),
(2, 'Eco'),
(3, 'Sport'),
(4, 'SUV');

-- Data untuk tabel lokasi_pengambilan
INSERT INTO `lokasi_pengambilan` (`id`, `nama`) VALUES
(1, 'Downtown Office'),
(2, 'Airport Terminal'),
(3, 'North Branch'),
(4, 'South Branch');

-- Data untuk tabel lokasi_pengembalian
INSERT INTO `lokasi_pengembalian` (`id`, `nama`) VALUES
(1, 'Downtown Office'),
(2, 'Airport Terminal'),
(3, 'North Branch'),
(4, 'South Branch');

-- Data untuk tabel armada
INSERT INTO `armada` (`id`, `merk`, `nopol`, `thn_beli`, `deskripsi`, `jenis_kendaraan_id`, `kapasitas_kursi`, `rating`, `gambar`) VALUES
(1, 'Tesla Model S', 'B 1234 EV', 2023, 'Electric • Auto • Range 300 mi', 1, 5, 5, 'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(2, 'Toyota Prius', 'B 5678 HB', 2022, 'Hybrid • Auto • MPG 54', 2, 5, 5, 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(3, 'Porsche 911', 'B 911 SP', 2023, 'Gas • Manual • 0-60 in 3.2s', 3, 2, 5, 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'),
(4, 'Mercedes-Benz GLC', 'B 4321 MB', 2022, 'Gas • Auto • Luxury SUV', 4, 5, 4, 'https://images.unsplash.com/photo-1653245620594-02e1d9a188f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
(5, 'BMW i4', 'B 8765 BM', 2023, 'Electric • Auto • Range 270 mi', 1, 5, 4, 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
(6, 'Honda Civic', 'B 2468 HC', 2021, 'Gas • Auto • MPG 36', 2, 5, 4, 'https://images.unsplash.com/photo-1590362891991-f776e747a588?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');

-- Data untuk tabel peminjaman
INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `ktp_peminjam`, `keperluan_pinjam`, `mulai`, `selesai`, `biaya`, `armada_id`, `komentar_peminjam`, `status_pinjam`, `pengembalian_id`, `pengambilan_id`, `waktu_pengambilan`, `waktu_pengembalian`) VALUES
(1, 'Budi Santoso', '3275012345678901', 'Liburan Keluarga', '2025-05-01', '2025-05-03', 360, 1, 'Mobil sangat nyaman dan bersih', 'Selesai', 1, 1, '10:00:00', '15:00:00'),
(2, 'Siti Rahayu', '3275023456789012', 'Perjalanan Bisnis', '2025-05-05', '2025-05-07', 150, 2, NULL, 'Dalam Peminjaman', 2, 2, '09:00:00', '18:00:00'),
(3, 'Ahmad Hidayat', '3275034567890123', 'Tur Kota', '2025-05-10', '2025-05-11', 180, 3, 'Pengalaman mengemudi yang luar biasa', 'Selesai', 1, 3, '08:00:00', '20:00:00'),
(4, 'Dewi Anggraini', '3275045678901234', 'Acara Pernikahan', '2025-05-15', '2025-05-16', 240, 4, NULL, 'Dibooking', 4, 4, '11:00:00', '14:00:00'),
(5, 'Rudi Hartono', '3275056789012345', 'Perjalanan Keluarga', '2025-05-20', '2025-05-23', 810, 5, NULL, 'Dibooking', 3, 2, '13:00:00', '12:00:00');

-- Data untuk tabel pembayaran
INSERT INTO `pembayaran` (`id`, `tanggal`, `jumlah_bayar`, `peminjaman_id`) VALUES
(1, '2025-05-01', 360, 1),
(2, '2025-05-05', 150, 2),
(3, '2025-05-10', 180, 3);


-- Data untuk tabel user
INSERT INTO `pembayaran` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', 1);


-- Data untuk tabel pembayaran
INSERT INTO `role_user` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');