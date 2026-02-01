-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Ağu 2023, 16:45:09
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `shivaschecker`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `duyuruatan` text NOT NULL,
  `atılanduyuru` text NOT NULL,
  `tarih` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `duyuruatan`, `atılanduyuru`, `tarih`) VALUES
(14, 'utku', 't.me/rotatechecker', '16.08.2023');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `key_ad` text NOT NULL,
  `key_pas` text NOT NULL,
  `role` text NOT NULL,
  `createddate` text NOT NULL,
  `enddate` text NOT NULL,
  `ipadres` text NOT NULL,
  `security` text NOT NULL,
  `endkey` text NOT NULL,
  `owner` text NOT NULL,
  `banned` text NOT NULL,
  `createdadmin` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `key_ad`, `key_pas`, `role`, `createddate`, `enddate`, `ipadres`, `security`, `endkey`, `owner`, `banned`, `createdadmin`) VALUES
(189, 'utku', 'utkukim31', '1', '16.08.2023', '0', '', '1', '', '1', '', '1'),
(208, 'batu06', 'batu0631', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(191, 'Ria', 'babaeren31', '1', '16.08.2023', '722638229', '', '1', '', '', '', 'utku'),
(192, 'Sxgusto', '159852E', '2', '16.08.2023', '0', '', '1', '', '', '', 'Ria'),
(193, 'Mahmut', 'mahmut31', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(194, 'Onlinepegasus', '1599131', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku'),
(195, 'Emirtnbl28', 'emir2831', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(196, 'Aynud159', 'aynud31', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(197, 'Legalmarka', 'Legal3162', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(200, 'Beca', 'Beca34523498768', '1', '16.08.2023', '0', '', '1', '', '1', '', 'utku'),
(199, 'Elevenfc12', 'eleven3112', '1', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(201, 'wreqna', 'wreqna11', '2', '16.08.2023', '0', '', '', '', '', '', 'Elevenfc12'),
(202, 'kartany1 ', 'kartany132', '2', '16.08.2023', '11.09.2023', '', '1', '', '', '', 'Beca'),
(203, 'mrrobot', 'mrrobot', '2', '16.08.2023', '0', '', '', '', '', '0', 'Elevenfc12'),
(209, 'danger', '31root31', '1', '16.08.2023', '0', '', '1', '', '', '', 'Beca'),
(205, 'mrrobot3', 'mrrobot4', '2', '16.08.2023', '0', '', '1', '', '', '', 'Elevenfc12'),
(206, 'mrwreqna', 'mrwreqna1', '2', '16.08.2023', '0', '', '1', '', '', '', 'Elevenfc12'),
(207, 'Harun', 'Hakan31', '2', '16.08.2023', '16.09.2024', '', '1', '', '', '', 'utku'),
(210, 'Büzzükcü', 'kamal3162', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(211, 'aliacar', 'aliacar3141', '1', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(212, 'exelity', 'exelity31', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku'),
(213, 'Lesh', 'Leshx31x', '1', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(214, 'xxcvxx123', 'xxcvxx123 ', '2', '16.08.2023', '0', '', '1', '', '', '', 'Beca'),
(215, 'Kürşat', 'kürşat123', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku'),
(216, 'mert93', 'mert9331', '2', '16.08.2023', '5.09.2023', '', '1', '', '', '', 'utku'),
(217, 'Eness', '141288dd', '2', '16.08.2023', '08.09.2023', '', '1', '', '', '', 'Beca'),
(218, 'koydoplatini', 'Hawel67549031', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku'),
(219, 'Yusuf3535', 'Yusuf336699', '2', '16.08.2023', '16.08.2024', '', '1', '', '', '', 'utku'),
(220, 'Tarama', 'Tarama31', '2', '16.08.2023', '0', '', '1', '', '', '', 'utku'),
(221, 'ilker', 'ilker35', '2', '16.08.2023', '0', '', '1', '', '', '', 'danger'),
(222, 'Furkan', 'kara.2222', '2', '16.08.2023', '0', '', '1', '0', '0', '0', 'utku'),
(223, '100blazexx', '10blazexx', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku'),
(224, 'hdasdemir', 'hdasdemir35', '2', '16.08.2023', '0', '', '1', '', '', '', 'danger'),
(225, 'Baykan56', 'Baykan3156', '2', '16.08.2023', '16.09.2023', '', '1', '', '', '', 'utku');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
