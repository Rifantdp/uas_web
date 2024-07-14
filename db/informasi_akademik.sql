-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2024 pada 06.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informasi_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `hp`, `posisi`) VALUES
('aku321', 'aku123', '087', 1),
('aku457', 'kua', '87', 3),
('aku758', 'aku', '87', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `urut_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(20) NOT NULL,
  `gelar_guru` varchar(10) NOT NULL,
  `gender_guru` char(1) NOT NULL,
  `hp_guru` int(11) NOT NULL,
  `alamat_guru` varchar(30) NOT NULL,
  `jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`urut_guru`, `nip`, `nama_guru`, `gelar_guru`, `gender_guru`, `hp_guru`, `alamat_guru`, `jabatan`) VALUES
(2, 100674830, 'Tasya Ananda', 'Spd.Mtk', 'P', 87, 'DEPOK', 'PENGAJAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `urut_kelas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `sup_kelas` int(11) NOT NULL,
  `sub_kelas` int(11) NOT NULL,
  `wali_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`urut_kelas`, `id_kelas`, `sup_kelas`, `sub_kelas`, `wali_kelas`) VALUES
(1, 71, 7, 1, '-'),
(2, 72, 7, 2, ''),
(6, 73, 7, 3, '100674830'),
(7, 74, 7, 4, 'Tasya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mapel`
--

CREATE TABLE `data_mapel` (
  `no_mapel` int(11) NOT NULL,
  `judul_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_mapel`
--

INSERT INTO `data_mapel` (`no_mapel`, `judul_mapel`) VALUES
(1, 'BIOLOGY'),
(2, 'FISIKA'),
(3, 'KIMIA'),
(4, 'MATEMATIKA 1'),
(5, 'MATEMATIKA 2'),
(6, 'SOSIOLOGI'),
(7, 'Lanjut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_schedule` varchar(7) NOT NULL,
  `nip` int(11) NOT NULL,
  `pts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `nis`, `id_schedule`, `nip`, `pts`, `uas`) VALUES
(1, 102, '11712', 100674830, 80, 90),
(4, 101, '11712', 100674830, 70, 80),
(5, 103, '11710', 100674830, 90, 100),
(6, 104, '11710', 100674830, 0, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_schedule`
--

CREATE TABLE `data_schedule` (
  `urut_schedule` int(11) NOT NULL,
  `id_schedule` varchar(7) NOT NULL,
  `day_schedule` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `no_mapel` int(11) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_schedule`
--

INSERT INTO `data_schedule` (`urut_schedule`, `id_schedule`, `day_schedule`, `id_time`, `id_kelas`, `no_mapel`, `nip`) VALUES
(1, '11712', 1, 1, 71, 2, 100674830),
(3, '11710', 2, 1, 72, 3, 100674830);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `urut_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `gender_siswa` char(1) NOT NULL,
  `hp_siswa` int(11) NOT NULL,
  `alamat_siswa` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`urut_siswa`, `nis`, `nama_siswa`, `gender_siswa`, `hp_siswa`, `alamat_siswa`, `id_kelas`) VALUES
(1, 101, 'M Rifan FM', 'L', 62, 'Jakarta Barat', 71),
(2, 102, 'Tania Rahma K', 'P', 87, 'Tanggerang', 71),
(12, 103, 'Anggi Anita', 'P', 87, 'Cikarang', 72),
(13, 104, 'Asta', 'L', 85, 'Jakarta Timur', 72);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_time`
--

CREATE TABLE `data_time` (
  `id_time` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_time`
--

INSERT INTO `data_time` (`id_time`, `start_time`, `end_time`) VALUES
(1, '07:15:00', '08:00:00'),
(2, '08:00:00', '08:45:00'),
(3, '08:45:00', '09:30:00'),
(4, '09:30:00', '10:15:00'),
(5, '10:15:00', '11:00:00'),
(6, '11:00:00', '11:45:00'),
(7, '11:45:00', '12:30:00'),
(8, '12:30:00', '13:15:00'),
(9, '13:15:00', '14:00:00'),
(10, '14:00:00', '14:45:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`urut_guru`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`urut_kelas`),
  ADD UNIQUE KEY `id_kelas_UNIQUE` (`id_kelas`);

--
-- Indeks untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`no_mapel`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nis_idx` (`nis`),
  ADD KEY `nip_idx` (`nip`),
  ADD KEY `nilai_schedule_idx` (`id_schedule`);

--
-- Indeks untuk tabel `data_schedule`
--
ALTER TABLE `data_schedule`
  ADD PRIMARY KEY (`urut_schedule`),
  ADD UNIQUE KEY `id_schedule_UNIQUE` (`id_schedule`),
  ADD KEY `schedule_kelas_idx` (`id_kelas`),
  ADD KEY `schedule_nip_idx` (`nip`),
  ADD KEY `schedule_time_idx` (`id_time`),
  ADD KEY `schedule_mpael_idx` (`no_mapel`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`urut_siswa`),
  ADD UNIQUE KEY `nis_UNIQUE` (`nis`),
  ADD KEY `id_kelas_idx` (`id_kelas`);

--
-- Indeks untuk tabel `data_time`
--
ALTER TABLE `data_time`
  ADD PRIMARY KEY (`id_time`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `urut_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `urut_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  MODIFY `no_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_schedule`
--
ALTER TABLE `data_schedule`
  MODIFY `urut_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `urut_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_time`
--
ALTER TABLE `data_time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD CONSTRAINT `nilai_nip` FOREIGN KEY (`nip`) REFERENCES `data_guru` (`nip`),
  ADD CONSTRAINT `nilai_nis` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`),
  ADD CONSTRAINT `nilai_schedule` FOREIGN KEY (`id_schedule`) REFERENCES `data_schedule` (`id_schedule`);

--
-- Ketidakleluasaan untuk tabel `data_schedule`
--
ALTER TABLE `data_schedule`
  ADD CONSTRAINT `schedule_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`),
  ADD CONSTRAINT `schedule_mpael` FOREIGN KEY (`no_mapel`) REFERENCES `data_mapel` (`no_mapel`),
  ADD CONSTRAINT `schedule_nip` FOREIGN KEY (`nip`) REFERENCES `data_guru` (`nip`),
  ADD CONSTRAINT `schedule_time` FOREIGN KEY (`id_time`) REFERENCES `data_time` (`id_time`);

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
