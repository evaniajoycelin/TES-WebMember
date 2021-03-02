-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2021 at 02:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elites`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tanggal_post` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_event` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `harga_event` double NOT NULL,
  `kuota` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal_post`, `deskripsi`, `foto_event`, `id_user`, `lokasi`, `venue`, `waktu`, `harga_event`, `kuota`, `keterangan`) VALUES
(12, 'Seminar TES Bersama Bisa', '2021-01-11', '<p>Alerts are available for any length of text, as well as an optional dismiss button. For proper styling, use one of the eight required contextual classes (e.g., .alert-success). For inline dismissal, use the alerts jQuery plugin.</p>\r\n', 'Event-20210111110230.jpg', 11, 'Jakarta', 'Jl. Cikutra', '2020-12-23 16:09:00', 100000, 20, 'POSTING'),
(14, 'Tips Pebisnis Keren', '2021-01-25', '<p>skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;</p>\r\n\r\n<p>skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;skakhsakhsa. sjajsajskaksahkhs.&nbsp;</p>\r\n', 'Event-20210125072820.jpg', 11, 'Jakarta', 'Jl. Cikutra', '2021-01-24 15:00:00', 100000, 3, 'POSTING'),
(15, 'Testingan', '2021-01-26', '<p>sashahsa skhakhska sahksah shakhsa.</p>\r\n', 'Event-20210126063423.jpg', 11, 'Bandung', 'Jl. Cikutra', '2021-02-01 14:00:00', 250000, 1, 'POSTING');

-- --------------------------------------------------------

--
-- Table structure for table `event_daftar`
--

CREATE TABLE `event_daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_daftar`
--

INSERT INTO `event_daftar` (`id_daftar`, `id_event`, `id_user`) VALUES
(7, 15, 52);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `jenis_info` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_info` date NOT NULL,
  `foto_info` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `jenis_info`, `deskripsi`, `tgl_info`, `foto_info`, `id_user`) VALUES
(2, 'Term and Condition', '<p>Testingan aja bro....</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n', '2020-12-10', 'Kosong', 11),
(3, 'Event', '<p>Event aja bro....</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n', '2020-12-10', 'Event-20201210021920.jpg', 11),
(4, 'Course', '<p>Ini Course.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-12-10', 'Info-20201210090616.jpg', 11),
(5, 'Membership Info', '<p>Ini Info Membership</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>\r\n', '2020-12-10', 'Info-20201210091335.jpg', 11),
(6, 'Kontak Kami', '<h3><strong>Head Office</strong></h3>\r\n\r\n<p>Jl. Raya Mangga Besar</p>\r\n\r\n<p>(021) 6008999</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<h3><strong>Availability Time</strong></h3>\r\n\r\n<p>Senin - Jum&#39;at 09.00 WIB - 17.00 WIB</p>\r\n\r\n<p><sup>*</sup>&nbsp;except holiday</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-12-10', 'Kosong', 11),
(7, 'EliTES Membership', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.</p>\r\n', '2021-01-11', 'Info-20210111063158.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kelas` varchar(100) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `deskripsi`, `foto_kelas`, `kondisi`, `pesan`) VALUES
(3, 'KELAS 1', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'Kelas-20201223052823.jpg', 'POSTING', 'Pesan Singkat yeah'),
(4, 'KELAS 2', '<p>asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.</p>\r\n', 'Kelas-20201002052337.jpg', 'POSTING', NULL),
(5, 'KELAS 3', '<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n\r\n<p>sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;sanskaksjka saksak.&nbsp;&nbsp;sanskaksjka saksak.&nbsp;</p>\r\n', 'Kelas-20201014014908.jpg', 'POSTING', NULL),
(6, 'KELAS 4', '<p>sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Kelas-20201024014924.jpg', 'POSTING', NULL),
(7, 'KELAS 5', '<p>sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.sajsakjksa sakshjkajska skhjahska.&nbsp;sajsakjksa sakshjkajska skhjahska.</p>\r\n', 'Kelas-20201024015017.jpg', 'POSTING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak_kami`
--

INSERT INTO `kontak_kami` (`id_kontak`, `nama_kontak`, `email`, `deskripsi`) VALUES
(1, 'Willy', 'wilnus@gmail.com', 'Yeah'),
(2, 'Aristyo Budiman', 'aridto@gmail.com', 'Keren');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `nama_kursus` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kursus` varchar(100) NOT NULL,
  `id_pilar` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `deskripsi`, `foto_kursus`, `id_pilar`, `id_paket`) VALUES
(28, 'GEM 1 - Dasar Bisnis', '<p>aksnahskahsa sakshakhsa skhahskahs skahska skahksa.</p>\r\n', 'kursus-20210214073315.jpg', 1, 5),
(29, 'GEM 2 - Bisnis Berkembang', '<p>Yos</p>\r\n', 'kursus-20210215015457.jpg', 1, 5),
(30, 'GEM 3 - Visi Misi Bisnis', '<p>Tes</p>\r\n', 'kursus-20210215023944.jpg', 2, 5),
(31, 'GEM 4 - Yoyoyo', '<p><strong>Keterangan:</strong></p>\r\n\r\n<p>akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.&nbsp;akakjajja hahAK ahhakakhkhak ahkhAKha ahkahk.</p>\r\n', 'kursus-20210217094239.jpg', 1, 6),
(32, 'Belajar Sukses', '<p>jGjgjsgasjga sjagsjagsjags. akhsakhsa.</p>\r\n', 'kursus-20210222033634.jpg', 2, 5),
(33, 'Zoo', '<p>yeah</p>\r\n', 'kursus-20210224050642.jpg', 3, 6),
(34, 'Towewew', '<p>asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.&nbsp;asajskajs sakskajska sakjska.</p>\r\n', 'kursus-20210226023429.jpg', 4, 6),
(35, 'Meeting Hari Ini', '<p>hashkahsa ahskahs</p>\r\n', 'kursus-20210226031433.jpg', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `paket_kelas`
--

CREATE TABLE `paket_kelas` (
  `id_paketkelas` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_kelas`
--

INSERT INTO `paket_kelas` (`id_paketkelas`, `id_paket`, `id_kelas`) VALUES
(14, 5, 3),
(15, 6, 3),
(16, 6, 4),
(17, 6, 5),
(18, 7, 3),
(19, 7, 4),
(20, 7, 5),
(23, 7, 4),
(24, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `paket_member`
--

CREATE TABLE `paket_member` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_member` double NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL,
  `foto_paket` varchar(100) NOT NULL,
  `masa_berlaku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_member`
--

INSERT INTO `paket_member` (`id_paket`, `nama_paket`, `harga_member`, `deskripsi_paket`, `kondisi`, `jumlah_kelas`, `foto_paket`, `masa_berlaku`) VALUES
(5, 'Free User', 0, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 1, 'paket-20201219105108.jpg', 'Free'),
(6, 'Self Employee', 2000000, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 3, 'paket-20201219105125.jpg', '1 Tahun'),
(7, 'Enterpreneur', 4000000, '<p>lsalsjsaksjajs shakhsa sahkshakhsa sjasjagjsga .&nbsp;ajskajksjak sahskahhsa shahskahksa hskahksa sahkhskahsa sakhskaha hsakhkah.</p>\r\n', 'POSTING', 6, 'paket-20201219105143.jpg', '1 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `pilar`
--

CREATE TABLE `pilar` (
  `id_pilar` int(11) NOT NULL,
  `nama_pilar` varchar(50) NOT NULL,
  `desk_pilar` text NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilar`
--

INSERT INTO `pilar` (`id_pilar`, `nama_pilar`, `desk_pilar`, `id_kelas`) VALUES
(1, 'GEM', 'khsakhska', 3),
(2, 'BA', '<p>Yes</p>\r\n', 3),
(3, 'BKT', '<p>Bangkit</p>\r\n', 4),
(4, 'SUS', '<p>Sukses</p>\r\n', 4),
(5, 'RUN', '<p>Lari</p>\r\n', 5),
(6, 'FAS', '<p>Fast</p>\r\n', 6),
(7, 'ARN', '<p>Wes</p>\r\n', 7),
(8, 'TOW', '<p>Wewew</p>\r\n', 7);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'BANTEN'),
(2, 'DKI JAKARTA'),
(3, 'JAWA BARAT'),
(4, 'JAWA TENGAH'),
(5, 'DI YOGYAKARTA'),
(6, 'JAWA TIMUR'),
(7, 'BALI'),
(8, 'NANGGROE ACEH DARUSSALAM (NAD)'),
(9, 'SUMATERA UTARA'),
(10, 'SUMATERA BARAT'),
(11, 'RIAU'),
(12, 'KEPULAUAN RIAU'),
(13, 'JAMBI'),
(14, 'BENGKULU'),
(15, 'SUMATERA SELATAN'),
(16, 'BANGKA BELITUNG'),
(17, 'LAMPUNG'),
(18, 'KALIMANTAN BARAT'),
(19, 'KALIMANTAN TENGAH'),
(20, 'KALIMANTAN SELATAN'),
(21, 'KALIMANTAN TIMUR'),
(22, 'KALIMANTAN UTARA'),
(23, 'SULAWESI BARAT'),
(24, 'SULAWESI SELATAN'),
(25, 'SULAWESI TENGGARA'),
(26, 'SULAWESI TENGAH'),
(27, 'GORONTALO'),
(28, 'SULAWESI UTARA'),
(29, 'MALUKU'),
(30, 'MALUKU UTARA'),
(31, 'NUSA TENGGARA BARAT (NTB)'),
(32, 'NUSA TENGGARA TIMUR (NTT)'),
(33, 'PAPUA BARAT'),
(34, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `nama_sosmed` varchar(50) NOT NULL,
  `link_sosmed` varchar(50) NOT NULL,
  `logo_sosmed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `nama_sosmed`, `link_sosmed`, `logo_sosmed`) VALUES
(1, 'Website', 'https://te-society.com/', 'sosmed-20201219091258.jpg'),
(2, 'Facebook', 'https://www.facebook.com/thesociety/', 'sosmed-20201219084006.jpg'),
(3, 'Instagram', 'https://www.instagram.com/', 'sosmed-20201219084349.jpg'),
(4, 'Youtube', 'https://www.youtube.com/', 'sosmed-20201219084815.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_transaksi` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_rekening` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `biaya_transaksi` double NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `baca_admin` varchar(20) NOT NULL,
  `baca_member` varchar(20) NOT NULL,
  `foto_struk` varchar(100) DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_transaksi`, `no_rek`, `nama_rekening`, `tgl_transaksi`, `id_paket`, `id_event`, `id_user`, `biaya_transaksi`, `keterangan`, `baca_admin`, `baca_member`, `foto_struk`, `tgl_berakhir`) VALUES
(54, 'Upgrade Membership ke-Self Employee', '1212121', 'Mita', '2020-01-24', 6, NULL, 52, 2000000, 'Expired', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210125052550.jpg', '2021-01-24'),
(55, 'Upgrade Membership ke-Self Employee', '121212', 'Danny Julian', '2020-01-24', 6, NULL, 31, 2000000, 'Expired', 'Sudah dibaca', 'Belum dibaca', 'Struk_paketMember-20210125052809.jpg', '2021-01-24'),
(56, 'Upgrade Membership ke-Self Employee', '100', 'Danny Julian', '2020-01-24', 6, NULL, 52, 2000000, 'Expired', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210125084733.jpg', '2021-01-24'),
(57, 'Upgrade Membership ke-Self Employee', '12121', 'Danny Julian', '2020-01-24', 6, NULL, 52, 2000000, 'Expired', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210125090433.jpg', '2021-01-24'),
(58, 'Mengikuti Event Testingan', '123456', 'Mita', '2026-01-21', NULL, 15, 52, 250000, 'Expired', 'Sudah dibaca', 'Sudah dibaca', 'Struk_event-20210126063546.jpg', '2021-01-26'),
(59, 'Upgrade Membership ke-Self Employee', '100000', 'Mita', '2021-01-26', 6, NULL, 52, 2000000, 'Ok', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210126011134.jpg', '2022-01-26'),
(60, 'Upgrade Membership ke-Enterpreneur', '090900909', 'Naruto', '2021-01-29', 7, NULL, 48, 4000000, 'Ok', 'Sudah dibaca', 'Sudah dibaca', 'Struk_paketMember-20210129060724.jpg', '2022-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hak_akses` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `setuju` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `email`, `password`, `foto`, `hak_akses`, `status`, `setuju`) VALUES
(11, 'Admin', 'Antapanai', '1990-07-29', '', '08989898989', 'evenan@mail.com', '123456', 'Kosong', 'Administrator', 'Aktif', ''),
(31, 'Danny Julian', 'Antapani', '1993-07-29', 'Laki-laki', '085822260147', 'julianpratamad@gmail.com', '123456', 'User-20201218082355.jpg', 'Member', 'Aktif', 'Ya'),
(44, 'Juki', 'Antapani', '2000-12-12', 'Laki-laki', '08992121', 'jukini@gmail.com', '122', 'Kosong', 'Member', 'Aktif', 'Ya'),
(45, 'Melsa', 'sasaa', '1990-12-12', 'Laki-laki', '089898898', 'melsa@gmail.com', '12345', 'Kosong', 'Member', 'Aktif', 'Ya'),
(46, 'Joni Lengke', 'Cikutra', '1998-10-10', 'Laki-laki', '08988989898', 'jonileng@gmail.com', '111111', 'Kosong', 'Member', 'Aktif', 'Ya'),
(48, 'Uzumaki Naruto', 'Konoha', '1990-10-10', 'Laki-laki', '0898898989', 'uzumaki@gmail.com', '123456', 'user-20210129060645.jpg', 'Member', 'Aktif', 'Ya'),
(52, 'Mita Mitaan', 'Cikutra', '1992-12-12', 'Laki-laki', '08989898998', 'mitaan@gmail.com', 'mita123', 'Kosong', 'Member', 'Aktif', 'Ya'),
(55, 'Ferdi', 'Medso', '1990-10-10', 'Laki-laki', '08989889898', 'ferdiso@gmail.com', '123456', 'User-20210121071814.jpg', 'Administrator', 'Aktif', 'Ya'),
(56, 'Soni', 'Sonia', '1998-02-19', 'Laki-laki', '08989898989', 'sonisi@mail.com', '123456', 'User-20210121072009.jpg', 'Administrator', 'Aktif', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `user_preneur`
--

CREATE TABLE `user_preneur` (
  `id_userpreneur` int(11) NOT NULL,
  `nama_bisnis` varchar(50) NOT NULL,
  `tahun_dirikan` year(4) NOT NULL,
  `bidang_usaha` varchar(50) NOT NULL,
  `akun_instagram` varchar(25) DEFAULT NULL,
  `page_facebook` varchar(50) DEFAULT NULL,
  `website_bisnis` varchar(25) DEFAULT NULL,
  `omset_bulanan` varchar(27) NOT NULL,
  `jumlah_karyawan` varchar(27) NOT NULL,
  `deskripsi_usaha` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `alamat_bisnis` varchar(100) NOT NULL,
  `email_bisnis` varchar(50) NOT NULL,
  `telp_bisnis` varchar(15) NOT NULL,
  `foto_usaha` varchar(100) NOT NULL,
  `industri` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_preneur`
--

INSERT INTO `user_preneur` (`id_userpreneur`, `nama_bisnis`, `tahun_dirikan`, `bidang_usaha`, `akun_instagram`, `page_facebook`, `website_bisnis`, `omset_bulanan`, `jumlah_karyawan`, `deskripsi_usaha`, `id_user`, `id_provinsi`, `alamat_bisnis`, `email_bisnis`, `telp_bisnis`, `foto_usaha`, `industri`) VALUES
(9, 'Danny COrp', 2019, 'Jasa', '', '', '', 'Rp 10 Juta - Rp 20 Juta', '< 10 Orang', 'IT ', 31, 1, 'Bangka', 'dannyjp70@yahoo.co.id', '', 'Bisnis_31-20210123102914.jpg', 'Lainnya'),
(10, 'Mita COrp', 2011, 'Produk', '', '', '', '< Rp 10 Juta', '10-50 Orang', 'Yeah', 52, 5, 'Malioboro', 'mirnazum@gmail.com', '089898989898', 'Kosong', 'Makanan dan minuman'),
(11, 'Mita Style', 2020, 'Produk', 'Mitastyle', 'Mita Keyen Bingit', 'www.mitayal.com', 'Rp 10 Juta - Rp 20 Juta', '< 10 Orang', 'Keyen', 52, 27, 'Makassar', 'mitaan@gmail.com', '0808889898', 'Bisnis_52-20210123105330.jpg', 'Pakaian Jadi');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id_userstats` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id_userstats`, `id_user`, `id_paket`) VALUES
(23, 31, 5),
(29, 44, 5),
(30, 45, 5),
(31, 46, 5),
(33, 48, 7),
(36, 52, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `event_daftar`
--
ALTER TABLE `event_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_pilar` (`id_pilar`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  ADD PRIMARY KEY (`id_paketkelas`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `paket_member`
--
ALTER TABLE `paket_member`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pilar`
--
ALTER TABLE `pilar`
  ADD PRIMARY KEY (`id_pilar`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_preneur`
--
ALTER TABLE `user_preneur`
  ADD PRIMARY KEY (`id_userpreneur`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_userstats`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_paket` (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_daftar`
--
ALTER TABLE `event_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  MODIFY `id_paketkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paket_member`
--
ALTER TABLE `paket_member`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pilar`
--
ALTER TABLE `pilar`
  MODIFY `id_pilar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_preneur`
--
ALTER TABLE `user_preneur`
  MODIFY `id_userpreneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_userstats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_daftar`
--
ALTER TABLE `event_daftar`
  ADD CONSTRAINT `event_daftar_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_daftar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_2` FOREIGN KEY (`id_pilar`) REFERENCES `pilar` (`id_pilar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kursus_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket_kelas`
--
ALTER TABLE `paket_kelas`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paket_kelas_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pilar`
--
ALTER TABLE `pilar`
  ADD CONSTRAINT `pilar_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `event` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paket` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_preneur`
--
ALTER TABLE `user_preneur`
  ADD CONSTRAINT `user_preneur_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_preneur_ibfk_2` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_status`
--
ALTER TABLE `user_status`
  ADD CONSTRAINT `paketan` FOREIGN KEY (`id_paket`) REFERENCES `paket_member` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
