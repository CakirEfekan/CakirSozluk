-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 Eki 2015, 10:52:05
-- Sunucu sürümü: 5.5.46-cll
-- PHP Sürümü: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `cakirefe_sozluk`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basliklar`
--

CREATE TABLE IF NOT EXISTS `basliklar` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `isim` varchar(25) NOT NULL,
  `baslatan` varchar(45) NOT NULL,
  `ukteveren` varchar(55) DEFAULT NULL,
  `entryadedi` varchar(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Tablo döküm verisi `basliklar`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `entryler`
--

CREATE TABLE IF NOT EXISTS `entryler` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `baslikid` varchar(25) NOT NULL,
  `entry` text NOT NULL,
  `yazar` varchar(55) DEFAULT NULL,
  `tarih` varchar(25) NOT NULL DEFAULT '05.05.005',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Tablo döküm verisi `entryler`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE IF NOT EXISTS `yazarlar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kuladi` varchar(25) NOT NULL,
  `sifre` varchar(45) NOT NULL,
  `eposta` varchar(55) NOT NULL,
  `epostaonay` varchar(25) NOT NULL DEFAULT '0',
  `epostakod` varchar(25) NOT NULL DEFAULT '0',
  `baslik` int(25) NOT NULL DEFAULT '0',
  `entry` int(25) NOT NULL DEFAULT '0',
  `iyi` int(25) NOT NULL DEFAULT '0',
  `kotu` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Tablo döküm verisi `yazarlar`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
