-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2021 pada 08.05
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblapoteker`
--

CREATE TABLE `tblapoteker` (
  `id_apoteker` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_apoteker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tblapoteker`
--

INSERT INTO `tblapoteker` (`id_apoteker`, `id_user`, `nama_apoteker`) VALUES
(1, 5, 'Revalina');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbldokter`
--

CREATE TABLE `tbldokter` (
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbldokter`
--

INSERT INTO `tbldokter` (`id_dokter`, `id_user`, `nama_dokter`) VALUES
(1, 3, 'Jaka Bagus Wibowo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblobat`
--

CREATE TABLE `tblobat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok_obat` varchar(10) NOT NULL,
  `harga_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tblobat`
--

INSERT INTO `tblobat` (`id_obat`, `nama_obat`, `stok_obat`, `harga_obat`) VALUES
(1, 'Paracetamol', '102', '10000'),
(2, 'Sanmol 10mg', '100', '12000'),
(3, 'Bodrex', '111', '13000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpembayaran`
--

CREATE TABLE `tblpembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_rekammedis` int(11) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblrekammedis`
--

CREATE TABLE `tblrekammedis` (
  `id_rekammedis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `obat_1` varchar(200) DEFAULT NULL,
  `obat_2` varchar(200) DEFAULT NULL,
  `obat_3` varchar(200) DEFAULT NULL,
  `obat_4` varchar(200) DEFAULT NULL,
  `obat_5` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tblsupplier`
--

INSERT INTO `tblsupplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp`) VALUES
(1, 'Kimia Farma Indo', 'Jl. Belitung Raya', '52147591');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbluser`
--

CREATE TABLE `tbluser` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `aktif` enum('T','Y','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbluser`
--

INSERT INTO `tbluser` (`id_user`, `nama_lengkap`, `alamat`, `umur`, `jk`, `no_telp`, `username`, `password`, `role`, `aktif`) VALUES
(1, 'Muhammad Erlangga', 'Jl. H. Mencong IX', '22', 'Laki-Laki', '0895347399934', 'erlangga', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Y'),
(2, 'Nida Salshabila', 'Jl. H. Jum II', '20', 'Perempuan', '0895343567782', 'salsa', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Y'),
(3, 'Jaka Bagus Wibowo', 'Bojonggede Bogor', '22', 'Laki-Laki', '081232784281', 'jaka', 'e10adc3949ba59abbe56e057f20f883e', 'Dokter', 'Y'),
(4, 'Attalla Hasan', 'Srengseng', '15', 'Laki-Laki', '', 'attalla', 'e10adc3949ba59abbe56e057f20f883e', 'Pasien', 'Y'),
(5, 'Revalina', 'Pamulang', '20', 'Perempuan', '08124226482', 'reva', 'e10adc3949ba59abbe56e057f20f883e', 'Apoteker', 'Y'),
(6, 'Cello Achmad Fairuz', 'Ciledug Indah', '8', 'Laki-Laki', '', 'cello', 'e10adc3949ba59abbe56e057f20f883e', 'Pasien', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblapoteker`
--
ALTER TABLE `tblapoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indeks untuk tabel `tbldokter`
--
ALTER TABLE `tbldokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tblobat`
--
ALTER TABLE `tblobat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tblpembayaran`
--
ALTER TABLE `tblpembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tblrekammedis`
--
ALTER TABLE `tblrekammedis`
  ADD PRIMARY KEY (`id_rekammedis`);

--
-- Indeks untuk tabel `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblapoteker`
--
ALTER TABLE `tblapoteker`
  MODIFY `id_apoteker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbldokter`
--
ALTER TABLE `tbldokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tblobat`
--
ALTER TABLE `tblobat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tblpembayaran`
--
ALTER TABLE `tblpembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblrekammedis`
--
ALTER TABLE `tblrekammedis`
  MODIFY `id_rekammedis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
