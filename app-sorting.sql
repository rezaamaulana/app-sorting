-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2025 pada 14.43
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
-- Database: `app-sorting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_ujians`
--

CREATE TABLE `hasil_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `materi` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` enum('lulus','tidak lulus') NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`jawaban`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_ujians`
--

INSERT INTO `hasil_ujians` (`id`, `user_id`, `materi`, `nilai`, `status`, `waktu_mulai`, `waktu_selesai`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kuis-Bubble-Sort', 100, 'lulus', '2025-06-17 09:34:16', '2025-06-17 09:34:16', '{\"data\":[{\"question\":1,\"answer\":\"C\",\"benar\":true},{\"question\":2,\"answer\":\"B\",\"benar\":true},{\"question\":3,\"answer\":\"A\",\"benar\":true},{\"question\":4,\"answer\":\"A\",\"benar\":true},{\"question\":5,\"answer\":\"B\",\"benar\":true}],\"waktu_pengerjaan\":2400,\"nilai\":100}', '2025-06-17 01:34:16', '2025-06-17 01:34:16'),
(2, 1, 'Kuis-Insertion-Sort', 80, 'lulus', '2025-06-17 09:34:54', '2025-06-17 09:34:54', '{\"data\":[{\"question\":1,\"answer\":\"A\",\"benar\":true},{\"question\":2,\"answer\":\"C\",\"benar\":true},{\"question\":3,\"answer\":\"B\",\"benar\":true},{\"question\":4,\"answer\":\"D\",\"benar\":true},{\"question\":5,\"answer\":\"B\",\"benar\":false}],\"waktu_pengerjaan\":2400,\"nilai\":80}', '2025-06-17 01:34:54', '2025-06-17 01:34:54'),
(3, 1, 'Kuis-Selection-Sort', 100, 'lulus', '2025-06-17 09:35:40', '2025-06-17 09:35:40', '{\"data\":[{\"question\":1,\"answer\":\"B\",\"benar\":true},{\"question\":2,\"answer\":\"C\",\"benar\":true},{\"question\":3,\"answer\":\"A\",\"benar\":true},{\"question\":4,\"answer\":\"A\",\"benar\":true},{\"question\":5,\"answer\":\"D\",\"benar\":true}],\"waktu_pengerjaan\":2400,\"nilai\":100}', '2025-06-17 01:35:40', '2025-06-17 01:35:40'),
(4, 3, 'Kuis-Bubble-Sort', 100, 'lulus', '2025-06-17 09:42:03', '2025-06-17 09:42:03', '{\"data\":[{\"question\":1,\"answer\":\"C\",\"benar\":true},{\"question\":2,\"answer\":\"B\",\"benar\":true},{\"question\":3,\"answer\":\"A\",\"benar\":true},{\"question\":4,\"answer\":\"A\",\"benar\":true},{\"question\":5,\"answer\":\"B\",\"benar\":true}],\"waktu_pengerjaan\":2400,\"nilai\":100}', '2025-06-17 01:37:18', '2025-06-17 01:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kkms`
--

CREATE TABLE `kkms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materi` varchar(255) NOT NULL,
  `kkm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_24_132327_create_hasil_ujians_table', 1),
(6, '2025_05_25_032906_create_kkms_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` enum('A','B','C','D') NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('guru','siswa') NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nis`, `kelas`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'reza', '001', 'A', '$2y$10$NbzZXmz2KF0qsfA.t53.I.kth3BAr/xsTYWlhwG8xLUXal/ae2eGG', 'siswa', NULL, '2025-06-17 01:29:26', '2025-06-17 01:29:26'),
(2, 'reza', '000', 'A', '$2y$10$9IV1Kyl1yrSuxxapGs1DfeQ.4BDat.GislZFzE2O/3KZEAOECjN/i', 'guru', NULL, '2025-06-17 01:30:53', '2025-06-17 01:30:53'),
(3, 'aaa', '002', 'B', '$2y$10$Jh2SAOsxJUmva1GGBuWAnOs3VGC1II5weoyAwkFUmlQYEEf.JjhuC', 'siswa', NULL, '2025-06-17 01:36:34', '2025-06-17 01:36:34'),
(4, 'adul', '003', 'C', '$2y$10$z8xaN1V4353TX53H6tkGqusI6fOHbPy8y54bMkrNOGnHKjFB32tmm', 'siswa', NULL, '2025-06-18 08:32:44', '2025-06-18 08:32:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil_ujians`
--
ALTER TABLE `hasil_ujians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_ujians_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `kkms`
--
ALTER TABLE `kkms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_ujians`
--
ALTER TABLE `hasil_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kkms`
--
ALTER TABLE `kkms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_ujians`
--
ALTER TABLE `hasil_ujians`
  ADD CONSTRAINT `hasil_ujians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
