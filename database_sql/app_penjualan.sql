-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 14.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `kategori`, `harga_barang`) VALUES
('IP001', 'IPhone 11', 'IPhone', 7000000),
('IP002', 'IPhone 12', 'IPhone', 10500000),
('IP003', 'IPhone 12 Pro', 'IPhone', 15800000),
('IP004', 'IPhone 12 Pro Max', 'IPhone', 16000000),
('IP005', 'IPhone 13', 'IPhone', 12500000),
('IP006', 'IPhone 13 Mini', 'IPhone', 12500000),
('IP007', 'IPhone 13 Pro', 'IPhone', 18000000),
('IP008', 'IPhone 13 Pro Max', 'IPhone', 19500000),
('IP009', 'IPhone 14', 'IPhone', 14000000),
('IP010', 'IPhone 14 Plus', 'IPhone', 16000000),
('IP011', 'IPhone 14 Pro', 'IPhone', 18000000),
('IP012', 'IPhone 14 Pro Max', 'IPhone', 20000000),
('MAC001', 'MacBook Pro M1', 'Mac', 16500000),
('MAC002', 'MacBook Pro M2', 'Mac', 21500000),
('MAC003', 'MacBook Air M1', 'Mac', 13000000),
('MAC004', 'MacBook Air M2', 'Mac', 20000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `item_dibeli` varchar(100) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `tgl_beli`, `nama_pembeli`, `item_dibeli`, `total_harga`) VALUES
(107230001, '2023-07-01', 'Samuel', 'IPhone 14 Pro Max', 22200000),
(207230002, '2023-07-02', 'Grace', 'IPhone 11', 7770000),
(307230003, '2023-07-03', 'Nathan', 'MacBook Pro M2', 23865000),
(307230004, '2023-07-03', 'Bijan', 'IPhone 14 Pro Max', 22200000),
(307230005, '2023-07-03', 'Tita', 'IPhone 13 Pro Max', 21645000),
(307230006, '2023-07-03', 'Alvin', 'IPhone 12 Pro Max', 17760000),
(407230001, '2023-07-04', 'Joko', 'IPhone 12 Pro Max', 17760000),
(407230002, '2023-07-04', 'Bijan', 'IPhone 14 Pro Max', 22200000),
(407230003, '2023-07-04', 'Allan', 'MacBook Air M2', 22200000),
(407230004, '2023-07-04', 'Obi', 'IPhone 11', 7770000),
(407230005, '2023-07-04', 'Anita', 'IPhone 14 Pro Max', 22200000),
(407230006, '2023-07-04', 'Tata', 'MacBook Pro M2', 23865000),
(407230007, '2023-07-04', 'Jojo', 'IPhone 14 Pro Max', 22200000),
(407230008, '2023-07-04', 'Jeowol', 'IPhone 14 Pro', 19980000),
(407230009, '2023-07-04', 'Veren', 'MacBook Pro M2', 23865000),
(407230010, '2023-07-04', 'Jovan ', 'MacBook Pro M2', 23865000),
(407230011, '2023-07-04', 'Sharon', 'IPhone 14', 15540000),
(407230012, '2023-07-04', 'Pak Botak', 'IPhone 14 Pro', 19980000),
(407230013, '2023-07-04', 'Orso', 'IPhone 13', 13875000),
(407230014, '2023-07-04', 'Malkist', 'IPhone 14 Pro Max', 22200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nip` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `password`, `nama_pegawai`, `level`) VALUES
('111', '$2y$10$X0vL.Zci18qkWah25g9R7e5m4fQMfmi5R5Jg7LzQYwlEXSBIF1hfa', 'Nathanael Prasetyo', 'pegawai'),
('123', '$2y$10$QMPtB/nVYBhxa.myqPiiOuiEyYPwrRolB6SaAranGEDJYwa2c79fG', 'Samuel Prasetyo', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
