-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2022 pada 14.40
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
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_penyakit` varchar(11) NOT NULL,
  `id_gejala` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paramedis`
--

CREATE TABLE `paramedis` (
  `id_paramedis` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `no_identitas` varchar(25) NOT NULL,
  `jabatan` text NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_user_id` int(11) NOT NULL,
  `artikel_judul` varchar(255) NOT NULL,
  `artikel_slug` varchar(255) NOT NULL,
  `artikel_img` varchar(255) NOT NULL,
  `artikel_excerpt` text NOT NULL,
  `artikel_body` text NOT NULL,
  `artikel_create` int(11) DEFAULT NULL,
  `artikel_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`artikel_id`, `artikel_user_id`, `artikel_judul`, `artikel_slug`, `artikel_img`, `artikel_excerpt`, `artikel_body`, `artikel_create`, `artikel_update`) VALUES
(6, 3, 'Kardimin Pergi ke Pasar', 'kardimin-pergi-ke-pasar.html', '1b269c887b38469023cb15184fc29ca8.jpeg', '<p>sgfkdsbfkjhfa kontol</p>', '<p>kahsfakhfaf</p>', 1641370526, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_deteksi_paramedis`
--

CREATE TABLE `tb_deteksi_paramedis` (
  `id_deteksi_paramedis` varchar(11) NOT NULL,
  `tanggal_input` varchar(14) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_paramedis` varchar(11) NOT NULL,
  `id_penyakit` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_deteksi_pasien`
--

CREATE TABLE `tb_deteksi_pasien` (
  `id_deteksi_pasien` varchar(11) NOT NULL,
  `tanggal_input` varchar(14) NOT NULL,
  `id_pasien` varchar(11) NOT NULL,
  `id_penyakit` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` varchar(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `id_pertanyaan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` varchar(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `id_pertanyaan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_backend`
--

CREATE TABLE `tb_log_backend` (
  `logback_id` int(11) NOT NULL,
  `logback_user` varchar(256) NOT NULL,
  `logback_level` varchar(10) NOT NULL,
  `logback_time` date NOT NULL,
  `logback_type` varchar(10) NOT NULL,
  `logback_data` varchar(20) NOT NULL,
  `logback_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log_backend`
--

INSERT INTO `tb_log_backend` (`logback_id`, `logback_user`, `logback_level`, `logback_time`, `logback_type`, `logback_data`, `logback_desc`) VALUES
(1, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'user', 'View Datas'),
(2, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'pakar', 'View Datas'),
(3, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'artikel', 'View Datas'),
(4, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'artikel', 'View Datas'),
(5, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'pakar', 'View Datas'),
(6, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'pakar', 'View Datas'),
(7, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'user', 'View Datas'),
(8, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'gejala', 'View Datas'),
(9, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'gejala', 'View Datas'),
(10, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'solusi', 'View Datas'),
(11, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'probabilitas', 'View Datas'),
(12, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'hama', 'View Datas'),
(13, 'Rizki Widya Pratama', 'Admin', '2022-01-07', 'view', 'artikel', 'View Datas'),
(14, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'pakar', 'View Datas'),
(15, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'user', 'View Datas'),
(16, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'hama', 'View Datas'),
(17, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'probabilitas', 'View Datas'),
(18, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'solusi', 'View Datas'),
(19, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'solusi', 'View Datas'),
(20, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'solusi', 'View Datas'),
(21, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'probabilitas', 'View Datas'),
(22, 'Rizki Widya Pratama', 'Admin', '2022-01-08', 'view', 'pakar', 'View Datas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(11) NOT NULL,
  `nama pasien` varchar(100) NOT NULL,
  `jenis kelamin` varchar(10) NOT NULL,
  `tanggal lahir` varchar(14) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_teleppon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(55) NOT NULL,
  `id_rekomendasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` varchar(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekomendasi`
--

CREATE TABLE `tb_rekomendasi` (
  `id_rekomendasi` varchar(11) NOT NULL,
  `rekomendasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_username` varchar(128) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_image` varchar(128) NOT NULL DEFAULT '',
  `user_password` varchar(128) NOT NULL,
  `user_viewpassword` varchar(128) NOT NULL,
  `user_level` varchar(128) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_username`, `user_email`, `user_image`, `user_password`, `user_viewpassword`, `user_level`, `user_created`) VALUES
(3, 'Rizki Widya Pratama', 'superadmin', 'superadmin@gmail.com', 'admin.png', '$2y$10$YvIQJ9PgJfKnc2UPDbtm7.UPVUkXjlVzD0m6lrwiMlBnMCtx..A6O', 'AxenNet123', 'Admin', '2022-01-03 04:58:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  ADD PRIMARY KEY (`id_paramedis`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indeks untuk tabel `tb_deteksi_paramedis`
--
ALTER TABLE `tb_deteksi_paramedis`
  ADD PRIMARY KEY (`id_deteksi_paramedis`);

--
-- Indeks untuk tabel `tb_deteksi_pasien`
--
ALTER TABLE `tb_deteksi_pasien`
  ADD PRIMARY KEY (`id_deteksi_pasien`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tb_log_backend`
--
ALTER TABLE `tb_log_backend`
  ADD PRIMARY KEY (`logback_id`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `tb_rekomendasi`
--
ALTER TABLE `tb_rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_log_backend`
--
ALTER TABLE `tb_log_backend`
  MODIFY `logback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
