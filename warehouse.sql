-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Ağu 2024, 17:20:19
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `warehouse`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birimler`
--

CREATE TABLE `birimler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `birimler`
--

INSERT INTO `birimler` (`id`, `birim`, `user`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'osman', '2024-03-08 16:36:25', '2024-07-31 17:37:40'),
(2, 'Metre', 'osman', '2024-03-08 16:36:31', '2024-03-08 16:36:31'),
(3, 'cm', 'osman', '2024-03-08 16:36:39', '2024-03-08 16:36:39'),
(5, 'Adet', 'osman', '2024-03-09 08:45:33', '2024-03-09 08:45:33'),
(6, 'gr', 'osman', '2024-07-31 17:38:06', '2024-07-31 17:38:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depolar`
--

CREATE TABLE `depolar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depo_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `depolar`
--

INSERT INTO `depolar` (`id`, `depo_ad`, `user`, `created_at`, `updated_at`) VALUES
(2, 'Depo 1', 'osman', '2024-02-26 15:03:07', '2024-07-31 17:44:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ust_kategori_id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`, `ust_kategori_id`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Sanal Kategori', 0, 'osman', '2024-08-01 16:34:10', '2024-08-01 16:34:10'),
(3, 'Temizlik Malzemeleri', 0, 'osman', '2024-03-07 17:05:56', '2024-03-07 17:05:56'),
(5, 'Sağlık Demirbaş', 0, 'osman', '2024-03-09 08:46:24', '2024-03-09 08:46:24'),
(6, 'Diğer', 0, 'osman', '2024-07-31 17:37:19', '2024-07-31 17:37:19'),
(8, 'Sanal Kategori', 0, 'osman', '2024-08-01 16:34:22', '2024-08-01 16:34:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_02_22_194613_depolar', 2),
(5, '2024_02_22_194742_kategoriler', 2),
(6, '2024_02_22_194753_urunler', 2),
(7, '2024_02_22_205002_create_depolars_table', 3),
(8, '2024_03_08_191935_birimler', 3),
(9, '2024_03_09_133340_stok_giris', 4),
(10, '2024_03_09_140149_stok_hareket', 4),
(11, '2024_03_21_191942_stok_cikis', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok_cikis`
--

CREATE TABLE `stok_cikis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depo_id` int(11) NOT NULL,
  `cikis_tarihi` datetime DEFAULT NULL,
  `aciklama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stok_cikis`
--

INSERT INTO `stok_cikis` (`id`, `depo_id`, `cikis_tarihi`, `aciklama`, `user`, `created_at`, `updated_at`) VALUES
(1, 5, '2024-03-21 00:00:00', '1 2 3', 'osman', '2024-03-21 17:12:57', '2024-03-21 17:12:57'),
(2, 5, '2024-03-21 00:00:00', '256 Neşter', 'osman', '2024-03-21 17:15:17', '2024-03-21 17:21:05'),
(3, 5, '2024-03-25 00:00:00', NULL, 'osman', '2024-03-25 17:18:11', '2024-03-25 17:18:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok_giris`
--

CREATE TABLE `stok_giris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depo_id` int(11) NOT NULL,
  `giris_tarihi` datetime DEFAULT NULL,
  `aciklama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stok_giris`
--

INSERT INTO `stok_giris` (`id`, `depo_id`, `giris_tarihi`, `aciklama`, `user`, `created_at`, `updated_at`) VALUES
(6, 2, '2024-03-18 00:00:00', 'ddd', 'osman', '2024-03-18 16:33:24', '2024-07-31 13:20:12'),
(7, 5, '2024-03-01 00:00:00', '3 tebeşir tozu 1 Neşter', 'osman', '2024-03-21 13:15:51', '2024-03-24 16:20:54'),
(10, 2, '2024-03-24 00:00:00', NULL, 'osman', '2024-03-24 16:50:40', '2024-03-24 16:50:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok_hareket`
--

CREATE TABLE `stok_hareket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stok_id` int(11) NOT NULL,
  `islem` tinyint(4) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `stok_hareket`
--

INSERT INTO `stok_hareket` (`id`, `stok_id`, `islem`, `urun_id`, `adet`, `user`, `created_at`, `updated_at`) VALUES
(24, 1, -1, 1, 1, 'osman', '2024-03-21 17:12:57', '2024-03-21 17:12:57'),
(25, 1, -1, 5, 2, 'osman', '2024-03-21 17:12:57', '2024-03-21 17:12:57'),
(26, 1, -1, 4, 3, 'osman', '2024-03-21 17:12:57', '2024-03-21 17:12:57'),
(29, 2, -1, 4, 256, 'osman', '2024-03-21 17:21:05', '2024-03-21 17:21:05'),
(32, 7, 1, 1, 1, 'osman', '2024-03-24 16:20:54', '2024-03-24 16:20:54'),
(33, 7, 1, 1, 2, 'osman', '2024-03-24 16:20:54', '2024-03-24 16:20:54'),
(34, 7, 1, 1, 3, 'osman', '2024-03-24 16:20:54', '2024-03-24 16:20:54'),
(35, 7, 1, 4, 44, 'osman', '2024-03-24 16:20:54', '2024-03-24 16:20:54'),
(36, 7, 1, 5, 11, 'osman', '2024-03-24 16:20:54', '2024-03-24 16:20:54'),
(37, 10, 1, 5, 10, 'osman', '2024-03-24 16:50:40', '2024-03-24 16:50:40'),
(41, 3, -1, 5, 9, 'osman', '2024-03-25 17:18:47', '2024-03-25 17:18:47'),
(44, 6, 1, 1, 2, 'osman', '2024-07-31 13:20:12', '2024-07-31 13:20:12'),
(45, 6, 1, 4, 23, 'osman', '2024-07-31 13:20:12', '2024-07-31 13:20:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urun_adi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birim` int(11) DEFAULT NULL,
  `barkod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tedarikci_bilgileri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aciklama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urun_adi`, `birim`, `barkod`, `tedarikci_bilgileri`, `aciklama`, `kategori_id`, `resim`, `user`, `created_at`, `updated_at`) VALUES
(2, 'Bardak', 5, '00001111', 'A101', 'Çay bardağı', 1, '12', 'osman', '2024-03-07 17:36:02', '2024-03-13 17:38:08'),
(4, 'Neşter', 5, '01444', 'Denta', 'sarı uçlu olan', 1, '10222.jpg', 'osman', '2024-03-07 17:48:28', '2024-03-13 17:38:15'),
(5, 'İmplant', 5, '012222', 'Ahmet Dental', '200 Adet Alındı', 5, '15', 'osman', '2024-03-09 08:47:12', '2024-03-09 08:47:12'),
(6, 'Diş İpi', 2, '015555', '12', '12', 1, '22', 'osman', '2024-03-13 17:39:15', '2024-03-13 17:39:15'),
(7, 'Kutu', 5, '15422222', NULL, NULL, 3, NULL, 'osman', '2024-07-31 17:36:24', '2024-07-31 17:40:03'),
(8, 'Şırınga tip1', 5, '25488888', NULL, 'beyaz ve mavi renk', 5, NULL, 'osman', '2024-07-31 17:41:46', '2024-07-31 17:41:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'osman', 'osmanvarisli@yahoo.com', NULL, '$2y$10$XFQHK2RLw0MrD8wAIYQdZ.msY3o4.4VxBAEatdupIdpcFK08meF5G', NULL, '2024-02-21 17:38:42', '2024-02-21 17:38:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `birimler`
--
ALTER TABLE `birimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `depolar`
--
ALTER TABLE `depolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `stok_cikis`
--
ALTER TABLE `stok_cikis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok_giris`
--
ALTER TABLE `stok_giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok_hareket`
--
ALTER TABLE `stok_hareket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `birimler`
--
ALTER TABLE `birimler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `depolar`
--
ALTER TABLE `depolar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `stok_cikis`
--
ALTER TABLE `stok_cikis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `stok_giris`
--
ALTER TABLE `stok_giris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `stok_hareket`
--
ALTER TABLE `stok_hareket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
