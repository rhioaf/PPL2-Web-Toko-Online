-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2021 pada 09.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `gambar_barang` varchar(150) NOT NULL,
  `berat_barang` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `gambar_barang`, `berat_barang`) VALUES
(1, 'Headset Gaming', 900000, 35, 'headset.jpg', 1.1),
(2, 'Keyboard Gaming', 700000, 92, 'keyboard.jpg', 2.5),
(3, 'Kursi Gaming', 1000000, 21, 'kursi.png', 4.1),
(4, 'Meja', 500000, 597, 'meja.png', 6.5),
(5, 'Monitor Gaming', 2000000, 11, 'monitor.png', 3.8),
(6, 'Mouse Gaming', 900000, 72, 'mouse.png', 0.9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_jual` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id_penjualan`, `id_barang`, `jml_jual`, `harga_barang`) VALUES
(18, 2, 2, 700000),
(19, 6, 1, 900000),
(20, 1, 2, 900000),
(21, 1, 1, 900000),
(21, 3, 1, 1000000),
(22, 5, 1, 2000000),
(22, 2, 1, 700000),
(22, 1, 1, 900000),
(23, 1, 1, 900000),
(23, 2, 1, 700000),
(23, 3, 1, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(12430, 'Cilandak Barat'),
(12520, 'Pasar Minggu'),
(40511, 'Cipageran'),
(60265, 'Tegalsari'),
(60272, 'Genteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `kecamatan_awal` int(11) NOT NULL,
  `kecamatan_tujuan` int(11) NOT NULL,
  `ongkir_per_kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`kecamatan_awal`, `kecamatan_tujuan`, `ongkir_per_kg`) VALUES
(40511, 12430, 10000),
(40511, 12520, 10000),
(40511, 40511, 6000),
(40511, 60265, 18000),
(40511, 60272, 18000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl_penjualan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_penjualan` int(11) NOT NULL,
  `total_ongkir` int(11) NOT NULL,
  `status_penjualan` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kecamatan_tujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `total_penjualan`, `total_ongkir`, `status_penjualan`, `nama`, `nomor`, `alamat`, `id_kecamatan_tujuan`) VALUES
(18, '2021-01-08 12:45:35', 1400000, 50000, 0, 'Rhio Adjie Fabian', '082117677002', 'Cilandak, Jakarta Selatan', 12430),
(19, '2021-01-08 12:48:04', 900000, 18000, 0, 'TenZ', '089745611234', 'Genteng, Surabaya', 60272),
(20, '2021-01-08 12:53:03', 1800000, 36000, 0, 'Wardell', '097654321234', 'Tegalsari, Surabaya', 60265),
(21, '2021-01-08 13:34:15', 1900000, 90000, 0, 'Fahmi Idris', '098765432143', 'Jauh', 60272),
(22, '2021-01-08 13:35:28', 3600000, 80000, 0, 'Fahmi Idris 2', '082117677002', 'Dekat', 12520),
(23, '2021-01-12 01:43:09', 2600000, 80000, 0, 'Rhio Adjie Fabian', '082117677002', 'Cilandak, Jakarta Selatan', 12430);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD KEY `fk_id_barang` (`id_barang`),
  ADD KEY `fk_id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`kecamatan_awal`,`kecamatan_tujuan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_kecamatan_tujuan` (`id_kecamatan_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60273;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `fk_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_kecamatan_tujuan` FOREIGN KEY (`id_kecamatan_tujuan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
