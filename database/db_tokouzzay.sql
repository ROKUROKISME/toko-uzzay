-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2024 pada 17.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokouzzay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('kasir1', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `id_supplier` int(6) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(9) NOT NULL,
  `stok` int(3) NOT NULL,
  `berat` int(6) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `aktif` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `id_kategori`, `id_supplier`, `harga_beli`, `harga_jual`, `stok`, `berat`, `gambar`, `deskripsi`, `aktif`) VALUES
(1, 'Parfume Arome Jasmine', 1, 1, 2700, 3100, 908, 150, 'parfume1.jpg', 'Parfume cocok untuk wanita', 'Aktif'),
(3, 'Parfume Aroma Buah Mawar', 3, 1, 18000, 22000, 48, 1000, 'parfume2.jpg', 'Parfume yang sangat cocok untuk semua genre', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(6) NOT NULL,
  `id_konsumen` int(6) NOT NULL,
  `id_penjualan` int(6) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_konsumen`, `id_penjualan`, `id_barang`, `qty`, `total`, `tanggal`, `status`) VALUES
(2, 1, 2, 1, 2, 3100, '2023-10-01', 'Selesai'),
(5, 1, 3, 1, 1, 3100, '2023-10-15', 'Selesai'),
(7, 1, 0, 3, 1, 22000, '2023-10-15', 'Keranjang'),
(12, 2, 4, 1, 1, 3100, '2024-01-09', 'Selesai'),
(13, 2, 5, 3, 1, 22000, '2024-01-19', 'Diterima'),
(14, 2, 6, 1, 1, 3100, '2024-01-19', 'Dibayar'),
(15, 2, 6, 3, 1, 22000, '2024-01-19', 'Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `is_aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `is_aktif`) VALUES
(1, 'Pria', 'Aktif'),
(2, 'Wanita', 'Aktif'),
(3, 'All Genre', 'Aktif'),
(4, 'Apa', 'Nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `username`, `nama`, `jk`, `email`, `telp`, `alamat`, `password`, `aktif`) VALUES
(1, 'tian', 'Tian', 'L', 'tian@gmail.com', '085849176945', 'Jln. Raya Kapuas', '12345', 'Aktif'),
(2, 'roger', 'Dold D. Roger S', 'L', 'roger@gmail.com', '081234567890', '', '12345', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(6) NOT NULL,
  `id_konsumen` int(6) NOT NULL,
  `total_harga` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_resi` varchar(20) NOT NULL,
  `ongkir` int(6) NOT NULL,
  `kurir` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_konsumen`, `total_harga`, `tanggal`, `waktu`, `bukti`, `alamat`, `nomor_resi`, `ongkir`, `kurir`, `status`) VALUES
(2, 1, 6200, '2023-10-04', '12:54:22', '68eddcea02ceb29abde1b1c752fa29eb.jpg', 'NULL', 'JNE12345', 21000, 'jne', 'Selesai'),
(3, 1, 3100, '2023-10-15', '06:19:28', 'indomie.jpg', 'NULL', 'JNE123456789', 14000, 'jne', 'Diterima'),
(4, 2, 3100, '2024-01-09', '07:40:38', '68eddcea02ceb29abde1b1c752fa29eb.jpg', 'NULL', 'JNE123456789', 14000, 'jne', 'Diterima'),
(5, 2, 22000, '2024-01-19', '04:23:59', '68eddcea02ceb29abde1b1c752fa29eb.jpg', 'NULL', 'JNE121212', 14000, 'jne', 'Diterima'),
(6, 2, 25100, '2024-01-19', '07:02:12', '68eddcea02ceb29abde1b1c752fa29eb.jpg', 'NULL', '', 14000, 'jne', 'Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `nama`, `bank`, `nomor`) VALUES
(2, 'Kaido', 'BCA', '123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `is_aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `is_aktif`) VALUES
(1, 'Bacarat', '081234567899', 'Aktif'),
(2, 'Coba', '1234567890098', 'Nonaktif'),
(3, 'Wings', '081234567890', 'Nonaktif'),
(4, 'Marina', '08123456789', 'Aktif'),
(5, 'Bellagio', '089876543211', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
