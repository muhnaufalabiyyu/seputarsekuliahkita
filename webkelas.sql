-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2021 pada 10.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '$2y$10$fUHQkOVT.kapxjtbm02CqOvi25df4eg8YXKvul.U9Y922zX.Rts7G', NULL, '2021-10-27 03:22:25', '2021-12-28 03:00:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `konten`, `gambar`, `slug`, `tgl_buat`) VALUES
(4, 'aa', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'a.jpg', 'aa', '2021-12-29 03:13:28'),
(5, 'bbb', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'bbb.jpg', 'bbb', '2021-12-29 03:17:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `konten`, `gambar`, `slug`, `tgl_buat`) VALUES
(1, 'berita 1 oke', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, 'berita-1-oke', '2021-12-29 03:38:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `kategori` enum('Webinar','Workshop','Social Activity','Training') DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `link_register` text DEFAULT NULL,
  `no_kontak` varchar(20) DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `kategori`, `judul`, `tgl`, `jam_mulai`, `jam_selesai`, `lokasi`, `gambar`, `link_register`, `no_kontak`, `tgl_buat`) VALUES
(1, 'Webinar', 'Webinar Maju Terus Pantang Mundur', '2021-12-31', '11:00:00', '15:00:00', 'Zoom Meeting', NULL, 'https://youtube.com/channel/UC-zrJ3MBHehqMnp4zOlkbhg', '6289675013500', '2021-12-29 04:06:25'),
(2, 'Workshop', 'Workshop Buku', '2022-01-06', '09:30:00', '16:31:00', 'Google Meet', 'workshop-buku.png', 'https://youtube.com/channel/UC-zrJ3MBHehqMnp4zOlkbhg', '6289675013500', '2021-12-29 04:13:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `kategori` enum('E-Book','E-Journal','Others') DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `tahun_terbit` varchar(20) DEFAULT NULL,
  `genre` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `library`
--

INSERT INTO `library` (`id`, `kategori`, `judul`, `pengarang`, `tahun_terbit`, `genre`, `deskripsi`, `gambar`, `file`, `slug`, `tgl_buat`) VALUES
(1, 'E-Book', 'Buku Saja Oke', 'Orang', '2020', 'Magic', 'Buku adalah kumpulan/himpunan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan, gambar atau tempelan.', 'buku-saja5815.png', 'file-buku-saja8589.pdf', 'buku-saja-oke', '2021-12-29 06:13:24'),
(3, 'E-Journal', 'Jurnal Massal', 'Gogo', '2021', 'Musik', 'musik adalah suatu hasil karya seni berupa bunyi dalam bentuk lagu atau komposisi yang mengungkapkan pikiran dan perasaan penciptanya', 'jurnal-massal6304.jpg', 'file-jurnal-massal7157.pdf', 'jurnal-massal', '2021-12-29 08:24:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `angkatan` varchar(20) DEFAULT NULL,
  `aduan` text DEFAULT NULL,
  `berkas` text DEFAULT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `jenis`, `angkatan`, `aduan`, `berkas`, `tgl_buat`) VALUES
(2, 'biaya', '2020', 'aaa', '4098.docx', '2021-12-29 09:11:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_web` varchar(100) DEFAULT NULL,
  `deskripsi_web` text DEFAULT NULL,
  `alamat_web` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `logo_header` text DEFAULT NULL,
  `favicon` text DEFAULT NULL,
  `embed` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `deskripsi_web`, `alamat_web`, `email`, `no_kontak`, `logo`, `logo_header`, `favicon`, `embed`, `twitter`, `facebook`, `instagram`, `linkedin`, `updated_at`) VALUES
(1, 'Seputar Kuliah Kita', 'Merupakan web-based application yang berfokus pada pengembangan fitur yang ada di e-learning STMI Jakarta.', 'Jl. Letjend Suprapto No.26 Cempaka Putih, Jakarta Pusat DKI Jakarta, 10510', 'humas@stmi.ac.id', '(021) 42801783', 'logostmi.png', 'kemenperin.png', 'logostmi.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7037770985353!2d106.86568401476892!3d-6.170404295532727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5043973ff63%3A0xc125c1242e567fd1!2sPolytechnic%20STMI%20Jakarta!5e0!3m2!1sen!2sid!4v1640383850303!5m2!1sen!2sid\" width=\"300\" height=\"250\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/stmijakarta/?hl=en', 'https://www.linkedin.com/', '2021-12-29 09:43:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
