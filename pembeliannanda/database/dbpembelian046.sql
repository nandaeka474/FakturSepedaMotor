-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2024 pada 02.34
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
-- Database: `dbpembelian046`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rangka`
--

CREATE TABLE `detail_rangka` (
  `no_faktur` int(11) NOT NULL,
  `no_rangka` varchar(15) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_rangka`
--

INSERT INTO `detail_rangka` (`no_faktur`, `no_rangka`, `unit`) VALUES
(8746588, 'MH3545P8372', '1(SATU)'),
(9124767, 'NC3545P8372', '1(SATU)'),
(9899889, 'RQ4365S8331', '1(SATU)'),
(9912211, 'RQ4365S8332', '1(SATU)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `no_faktur` int(11) NOT NULL,
  `no_seri` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_user` varchar(2) NOT NULL,
  `terbilang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`no_faktur`, `no_seri`, `id_pembeli`, `id_user`, `terbilang`) VALUES
(8746588, 2357953, 0, '', 'EMPAT BELAS JUTA ENAM RATUS RIBU RUPIAH'),
(9124767, 2357955, 0, '', 'EMPAT BELAS JUTA ENAM RATUS RIBU RUPIAH'),
(9899889, 5264952, 3, 'V2', 'LIMA PULUH JUTA RUPIAH'),
(9912211, 5264956, 2, 'V2', 'LIMA PULUH JUTA RUPIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `kota`) VALUES
(1, 'Andre Hendra  Setiawan', 'KP Mampang  RT009/013  Sukatani/T', 'Depok'),
(2, 'Nanda Eka Putri', 'Jln Garuda Raya Blok D14', 'Bogor'),
(3, 'Natasya Putri', 'Jln. Elang No.4 RT 09 RW 14 ', 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangka`
--

CREATE TABLE `rangka` (
  `no_rangka` varchar(15) NOT NULL,
  `no_motor` varchar(10) NOT NULL,
  `warna` varchar(5) NOT NULL,
  `invoerpas_no` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `model` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `eks_kapal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rangka`
--

INSERT INTO `rangka` (`no_rangka`, `no_motor`, `warna`, `invoerpas_no`, `tahun`, `harga`, `model`, `type`, `merk`, `eks_kapal`) VALUES
('MH3545P8372', '45P-012FDU', 'Biru', 268194, 2010, 14600000, '45P(BYSON)', '150CC', 'Yamaha', 'AS VENUS 00359'),
('NC3545P8372', '53P-012FDU', 'Merah', 267195, 2010, 14600000, '53P(BYSON)', '150CC', 'Yamaha', 'AS Venus 00359'),
('RQ4365S8331', '99D-013XYZ', 'Hitam', 459192, 2011, 50000000, '99D(COBRA)', '200 CC', 'YAMAHA', 'AS Mars 00362'),
('RQ4365S8332', '99D-013XYA', 'Putih', 459192, 2011, 50000000, '99D(COBRA)', '200 CC', 'YAMAHA', 'AS Mars 00362');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(2) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`) VALUES
('U1', 'Udin'),
('V2', 'Vani'),
('W3', 'Windy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_rangka`
--
ALTER TABLE `detail_rangka`
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `no_rangka` (`no_rangka`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `faktur_ibfk_1` (`id_pembeli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `rangka`
--
ALTER TABLE `rangka`
  ADD PRIMARY KEY (`no_rangka`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_rangka`
--
ALTER TABLE `detail_rangka`
  ADD CONSTRAINT `detail_rangka_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `faktur` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_rangka_ibfk_2` FOREIGN KEY (`no_rangka`) REFERENCES `rangka` (`no_rangka`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
