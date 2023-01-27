-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jan 2023 pada 07.53
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20018399_db_umkmkedungwinangun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(5) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `namaAdmin` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `namaAdmin`, `password`) VALUES
(1, 'annassetywn', 'Annas Setiawan', 'annas123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `idBank` int(10) NOT NULL,
  `namaBank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`idBank`, `namaBank`) VALUES
(1, 'BCA'),
(2, 'BRI'),
(4, 'Muamalat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailorder`
--

CREATE TABLE `tbl_detailorder` (
  `idDetailOrder` int(5) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `idProduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `buktiBayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailorder`
--

INSERT INTO `tbl_detailorder` (`idDetailOrder`, `idOrder`, `idProduk`, `jumlah`, `harga`, `buktiBayar`) VALUES
(6, 7, 4, 2, 9000, 'WhatsApp_Image_2023-01-21_at_03_04_42.jpg'),
(7, 8, 5, 1, 5000, 'WhatsApp_Image_2023-01-21_at_03_04_421.jpg'),
(8, 9, 3, 3, 30000, 'WhatsApp_Image_2023-01-21_at_03_04_422.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idKategori` int(5) NOT NULL,
  `namaKategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idKategori`, `namaKategori`) VALUES
(2, 'Makanan ringan'),
(3, 'Kerajinan'),
(4, 'Mainan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `idOngkir` int(10) NOT NULL,
  `tujuanKirim` varchar(20) NOT NULL,
  `hargaKirim` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`idOngkir`, `tujuanKirim`, `hargaKirim`) VALUES
(1, 'Kebumen', 15000),
(2, 'Purworejo', 20000),
(3, 'Boyolali', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idPembeli` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `idOngkir` int(10) NOT NULL,
  `tglOrder` date NOT NULL,
  `statusOrder` enum('Belum Dibayar','Sudah Dibayar','Dikirim','Dibatalkan','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `idPembeli`, `idToko`, `idOngkir`, `tglOrder`, `statusOrder`) VALUES
(6, 1, 4, 1, '2023-01-25', 'Belum Dibayar'),
(7, 1, 4, 1, '2023-01-25', 'Belum Dibayar'),
(8, 1, 2, 1, '2023-01-25', 'Dikirim'),
(9, 2, 4, 1, '2023-01-25', 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `idPembeli` int(10) NOT NULL,
  `usernamePembeli` varchar(10) NOT NULL,
  `namalengkapPembeli` varchar(30) NOT NULL,
  `emailPembeli` varchar(25) NOT NULL,
  `alamatPembeli` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `statusAktif` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `teleponPembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`idPembeli`, `usernamePembeli`, `namalengkapPembeli`, `emailPembeli`, `alamatPembeli`, `password`, `statusAktif`, `teleponPembeli`) VALUES
(1, 'annas', 'Annas Setiawan', 'annassetiawan45@gmail.com', 'Jl. Nasional 3 No.53 Kedungwinangun', 'annas123', 'Aktif', '085156555122'),
(2, 'afrisamift', 'Afrisa Miftahul Huda', 'afrisa@gmail.com', 'Jalan Kenanganga No.1 Boyolali', 'afrisa', 'Aktif', '087789564235');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjual`
--

CREATE TABLE `tbl_penjual` (
  `idPenjual` int(5) NOT NULL,
  `usernamePenjual` varchar(10) NOT NULL,
  `namalengkapPenjual` varchar(30) NOT NULL,
  `emailPenjual` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `statusAktif` enum('Aktif','Nonaktif') NOT NULL,
  `teleponPenjual` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjual`
--

INSERT INTO `tbl_penjual` (`idPenjual`, `usernamePenjual`, `namalengkapPenjual`, `emailPenjual`, `password`, `statusAktif`, `teleponPenjual`) VALUES
(1, 'Ikaretno', 'Ika Retno Asih Widodo', 'ikaretno12@gmail.com', 'ika123', 'Aktif', '085124245673'),
(2, 'dani', 'Dani Purmanto', 'danipurmanto58@gmail.com', 'dani123', 'Aktif', '087567555234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `idKategori` int(5) NOT NULL,
  `namaProduk` varchar(15) NOT NULL,
  `hargaProduk` int(10) NOT NULL,
  `deskripsiProduk` text NOT NULL,
  `fotoProduk` varchar(100) NOT NULL,
  `beratProduk` float NOT NULL,
  `stokProduk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`idProduk`, `idToko`, `idKategori`, `namaProduk`, `hargaProduk`, `deskripsiProduk`, `fotoProduk`, `beratProduk`, `stokProduk`) VALUES
(2, 2, 3, 'Totebag Batik', 25000, 'Totebag batik handmade.', 'foto1.jpg', 1, 15),
(3, 4, 3, 'Caping Petani', 30000, 'Caping petani dari bambu yang dibuat oleh pengrajin bambu dari UMKM kedungwinangun. Caping ini biasa digunakan oleh petani ketika pergi ke persawahan.', '20042021085233-Desa_Kalitengah-Kebumen-142.jpg', 1, 20),
(4, 4, 2, 'Kue bawang', 9000, 'Kue bawang merupakan camilan lezat dengan rasa yang gurih. Meski dinamakan kue, rasa camilan satu ini justru gurih dengan tekstur yang renyah.', 'toko-ananda_1614225948-seRK71.jpg', 1, 12),
(5, 2, 4, 'Miniatur Gajah', 5000, 'Miniatur gajah ini ibuat dengan bahan kayu, dapat dimainkan oleh anaka dan bahan pembelajaran untuk anak.', '3_(1).jpg', 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `idRekening` int(10) NOT NULL,
  `idBank` int(10) NOT NULL,
  `noRekening` varchar(20) NOT NULL,
  `namaRekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`idRekening`, `idBank`, `noRekening`, `namaRekening`) VALUES
(1, 1, '7648934812', 'Ika Retno Asih Widodo'),
(2, 2, '765398765390', 'Abi Nura'),
(3, 1, '765398765390', 'Abi Nura'),
(4, 2, '765398765390', 'Fajar Adi Pamungkas'),
(5, 2, '765398765390', 'Dani Purmanto'),
(6, 2, '765398765390', 'Dani Purmanto'),
(7, 2, '109890092837', 'Dani Purmanto'),
(8, 2, '109890092837', 'Dani Purmanto'),
(9, 4, '1', 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `idToko` int(5) NOT NULL,
  `idPenjual` int(5) NOT NULL,
  `idRekening` int(10) NOT NULL,
  `namaToko` varchar(20) NOT NULL,
  `logoToko` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamatToko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_toko`
--

INSERT INTO `tbl_toko` (`idToko`, `idPenjual`, `idRekening`, `namaToko`, `logoToko`, `deskripsi`, `alamatToko`) VALUES
(2, 1, 1, 'Khoja Kebumen', 'toko1.jpg', 'Khoja Kebumen adalah toko yang menjual produk umkm seperti makanan ringan dan kerajinan handmade.', 'Kedungwinangun, rt03/rw06'),
(4, 2, 8, 'Karsarasa', '272718637_705967043720335_6109995994466790635_n2.jpg', 'Toko penyedia makanan buatan UMKM dan pakaian.', 'Kedungwinangun Rt3 Rw.6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`idBank`);

--
-- Indeks untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`idOngkir`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idPembeli` (`idPembeli`),
  ADD KEY `idToko` (`idToko`),
  ADD KEY `idOngkir` (`idOngkir`);

--
-- Indeks untuk tabel `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`idPembeli`);

--
-- Indeks untuk tabel `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD PRIMARY KEY (`idPenjual`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idToko` (`idToko`),
  ADD KEY `idKat` (`idKategori`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`idRekening`),
  ADD KEY `idBank` (`idBank`);

--
-- Indeks untuk tabel `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `idPenjual` (`idPenjual`),
  ADD KEY `idRekening` (`idRekening`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `idBank` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  MODIFY `idDetailOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idKategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `idOngkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `idPembeli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  MODIFY `idPenjual` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `idRekening` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `idToko` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detailorder`
--
ALTER TABLE `tbl_detailorder`
  ADD CONSTRAINT `tbl_detailorder_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`),
  ADD CONSTRAINT `tbl_detailorder_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`);

--
-- Ketidakleluasaan untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`idPembeli`) REFERENCES `tbl_pembeli` (`idPembeli`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`idOngkir`) REFERENCES `tbl_ongkir` (`idOngkir`),
  ADD CONSTRAINT `tbl_order_ibfk_4` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `tbl_kategori` (`idKategori`),
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Ketidakleluasaan untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD CONSTRAINT `tbl_rekening_ibfk_1` FOREIGN KEY (`idBank`) REFERENCES `tbl_bank` (`idBank`);

--
-- Ketidakleluasaan untuk tabel `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD CONSTRAINT `tbl_toko_ibfk_1` FOREIGN KEY (`idPenjual`) REFERENCES `tbl_penjual` (`idPenjual`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_toko_ibfk_2` FOREIGN KEY (`idRekening`) REFERENCES `tbl_rekening` (`idRekening`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
