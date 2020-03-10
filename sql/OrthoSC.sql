-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2019 at 02:04 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OrthoSC`
--

-- --------------------------------------------------------

--
-- Table structure for table `theinfo`
--

CREATE TABLE `theinfo` (
  `infoKey` int(11) NOT NULL,
  `infoFirstName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `infoLastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `infoEmail` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `infoPhoneNumber` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `infoBirthDate` date NOT NULL,
  `infoAddress` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `infoCity` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `infoState` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `infoZip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `infoInsurance` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `infoMedicationsAllergies` text COLLATE utf8_unicode_ci,
  `infoSymptoms` text COLLATE utf8_unicode_ci,
  `infoNewsletter` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theinfo`
--

INSERT INTO `theinfo` (`infoKey`, `infoFirstName`, `infoLastName`, `infoEmail`, `infoPhoneNumber`, `infoBirthDate`, `infoAddress`, `infoCity`, `infoState`, `infoZip`, `infoInsurance`, `infoMedicationsAllergies`, `infoSymptoms`, `infoNewsletter`) VALUES
(16, 'Billie', 'Eilish', 'TheEilish@yahoo.com', '512-924-8127', '2001-12-18', '1446 Whispering Pines Circle', 'Dallas', 'TX', '75287', 'true', '', '', 'false'),
(1, 'John', 'Doe', 'John.Doe@gmail.com', '843-531-3127', '1964-11-06', '3257 Wild Wood Road', 'North Myrtle Beach', 'SC', '29513', 'false', 'Inhaler', 'Hard to breath', 'true'),
(14, 'Edna', 'Winningham', 'WinninghamOfficial@gmail.com', '704-787-1081', '1981-10-01', '3444 Harry Place', 'Charlotte', 'NC', '28202', 'true', 'Antidepressants', 'Depression', 'false'),
(15, '', 'Foster', '', '760-963-0578', '1970-05-12', '2677 Wilson Street', 'Riverside', 'CA', '92501', 'false', '', '', 'false'),
(12, 'Rhonda', 'Howland', 'Rhonda.Howland@yahoo.com', '704-891-1849', '1982-01-19', '2517 Kelly Street', 'Charlotte', 'NC', '28209', 'true', 'Steroids for Arthritis. Opioids for pain.', 'Large amount of pain due to Arthritis.', 'false'),
(13, 'Lorraine', 'Carlton', 'LorrCarlton@aol.com', '864-983-4132', '1950-09-02', '158 Brown Avenue', 'Laurens', 'SC', '29360', 'true', 'Adderall', 'Can not focus', 'true'),
(17, '', 'Deaton', '', '702-373-8753', '1974-02-27', '4444 Mesa Drive', 'North Las Vegas', 'NV', '89032', 'false', '', '', 'false'),
(18, 'Annie', 'Vaughn', 'Vaughn@aol.com', '580-715-3234', '1973-12-03', '3264 Benson Park Drive', 'Clinton', 'OK', '73601', 'false', '', '', 'false'),
(19, 'Gary', 'Mayer', 'GaryTheMan@yahoo.com', '662-588-8388', '1932-02-12', '1092 Saint Clair Street', 'Jackson', 'MS', '39201', 'false', '', '', 'false'),
(21, 'Stanley', 'Bealer', '', '814-967-3566', '1954-03-10', '1535 Custer Street', 'Townville', 'PA', '16360', 'true', '', '', 'false'),
(22, 'Geraldine', 'Jones', 'Jones62@aol.com', '206-342-2522', '1962-12-05', '2116 Owagner Lane', 'Seattle', 'WA', '98101', 'true', '', '', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `theinfo`
--
ALTER TABLE `theinfo`
  ADD PRIMARY KEY (`infoKey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `theinfo`
--
ALTER TABLE `theinfo`
  MODIFY `infoKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
