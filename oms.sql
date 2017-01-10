-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2017 at 04:05 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `oms_brand_mapping`
--

CREATE TABLE `oms_brand_mapping` (
  `brand_mapping_id` int(5) NOT NULL,
  `brand_es` varchar(50) NOT NULL,
  `brand_marketplace_id` int(5) NOT NULL,
  `brand_marketplace_desc` varchar(50) NOT NULL,
  `marketplace_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_brand_mapping`
--

INSERT INTO `oms_brand_mapping` (`brand_mapping_id`, `brand_es`, `brand_marketplace_id`, `brand_marketplace_desc`, `marketplace_id`) VALUES
(1, 'ASUS', 136, 'Asus', 1),
(2, 'LG', 1231, 'LG', 1),
(3, 'DENPOO', 550, 'Denpoo', 1),
(6, 'ACME 707', 7096, 'Acme', 1),
(9, 'A DATA', 32, 'A Data', 1),
(10, '3DR', 19313, '3DR ', 1),
(11, 'ACER', 2169, 'Acer', 1),
(12, 'ADONIT', 34, 'adonit', 1),
(13, 'ADVAN', 2183, 'Advan', 1),
(14, 'AKARI', 54, 'Akari', 1),
(15, 'AKG', 56, 'AKG', 1),
(16, 'AKIRA', 14651, 'Akira', 1),
(17, 'ALCATEL', 63, 'alcatel', 1),
(18, 'ALKALINE', 66, 'Alkaline', 1),
(19, 'ANTENNA SHOP', 8902, 'Antenna Shop', 1),
(20, 'ANYMODE', 98, 'Anymode', 1),
(21, 'APPLE', 102, 'Apple', 1),
(22, 'APROLINK', 104, 'aprolink', 1),
(23, 'AQUA', 106, 'Aqua', 1),
(24, 'ARISTON', 114, 'Ariston', 1),
(25, 'ASUS ZENFONE', 13907, 'Asus Zenfone C', 1),
(26, 'AUDIO-TECHNICA', 6109, 'AUDIO-TECHNICA', 1),
(27, 'AUX', 2625, 'Aux', 1),
(28, 'AXIS', 9498, 'AXIS', 1),
(29, 'AZALEA', 161, 'Azalea', 1),
(30, 'B-CARE', 218, 'Bcare', 1),
(31, 'BELKIN', 230, 'Belkin', 1),
(32, 'BENQ', 5218, 'BenQ', 1),
(33, 'BERVIN', 246, 'Bervin', 1),
(34, 'BESTLIFE', 5970, 'BESTLIFE', 1),
(35, 'BIPBIP', 7634, 'Bipbip', 1),
(36, 'BLACK & DECKER', 17949, 'Black & Decker', 1),
(37, 'BLACK AND DECKER', 7057, 'Black and Decker', 1),
(38, 'BLACK RAPID', 4863, 'BLACK RAPID', 1),
(39, 'BLACKBERRY', 2141, 'Blackberry', 1),
(40, 'BLAUPUNKT', 5571, 'BLAUPUNKT', 1),
(41, 'BMW', 17113, 'BMW', 1),
(42, 'BOLDE', 6541, 'Bolde', 1),
(43, 'BOLT', 2171, 'Bolt', 1),
(44, 'BRAUN', 6275, 'Braun', 1),
(45, 'BRAVEN', 7197, 'braven', 1),
(46, 'BRICA', 320, 'Brica', 1),
(47, 'BRINNO', 5985, 'BRINNO', 1),
(48, 'BROTHER', 2230, 'BROTHER', 1),
(49, 'BUFFALO', 332, 'BUFFALO', 1),
(50, 'CANON', 363, 'Canon', 1),
(51, 'CASIO', 387, 'Casio', 1),
(52, 'CASTLE', 16187, 'Castle', 1),
(53, 'CATALYST', 18763, 'Catalyst', 1),
(54, 'CHANGHONG', 401, 'Changhong', 1),
(55, 'COLOUD', 2443, 'COLOUD', 1),
(56, 'COMPAQ', 12208, 'compaq', 1),
(57, 'COSMOS', 485, 'Cosmos', 1),
(58, 'CREATIVE', 495, 'Creative', 1),
(59, 'CRESYN', 5601, 'CRESYN', 1),
(60, 'CRUMPLER', 4859, 'CRUMPLER', 1),
(61, 'DAEWOO', 6856, 'Daewoo', 1),
(62, 'DELIZIA', 6983, 'Delizia', 1),
(63, 'DELL', 542, 'Dell', 1),
(64, 'DELUX', 8611, 'Deluxe', 1),
(65, 'DiCAPAC', 563, 'Dicapac', 1),
(66, 'DISNEY', 568, 'Disney', 1),
(67, 'DIVOOM', 572, 'Divoom', 1),
(68, 'DJI PHANTOM', 11571, 'DJI Phantom', 1),
(69, 'DOMO', 7210, 'Domo', 1),
(70, 'EDIFIER', 629, 'Edifier', 1),
(71, 'EG-MEMORY', 8337, 'EGMemory', 1),
(72, 'ELBA', 638, 'Elba', 1),
(73, 'ELECTROLUX', 640, 'Electrolux', 1),
(74, 'ELITECH', 12199, 'Elitech', 1),
(75, 'ENERPAD', 2507, 'ENERPAD', 1),
(76, 'EPRAIZER', 5937, 'EPRAIZER', 1),
(77, 'EPSON', 675, 'Epson', 1),
(78, 'EVERCOSS', 695, 'evercoss', 1),
(79, 'EXCELL', 698, 'Excell', 1),
(80, 'EXECUTIVE', 5114, 'EXECUTIVE', 1),
(81, 'FERRARI', 5178, 'FERRARI', 1),
(82, 'FITBIT', 6209, 'FITBIT', 1),
(83, 'FUJIFILM', 799, 'Fujifilm', 1),
(84, 'FUJITSU', 4926, 'FUJITSU', 1),
(85, 'GARMIN', 812, 'Garmin', 1),
(86, 'GENEVA', 12077, 'Geneva', 1),
(87, 'GOLF', 14919, 'Golf', 1),
(88, 'GOPRO', 863, 'GoPro', 1),
(89, 'GP', 864, 'GP', 1),
(90, 'GRIFFIN', 882, 'Griffin', 1),
(91, 'HAIER', 4828, 'Haier', 1),
(92, 'HALLOA', 906, 'Halloa', 1),
(93, 'HARMAN KARDON', 2150, 'Harman Kardon', 1),
(94, 'HELLOLULU', 6032, 'HELLOLULU', 1),
(95, 'HEWLETT PACKARD', 11561, 'Hewlett Packcard', 1),
(96, 'HISENSE', 11196, 'Hisense', 1),
(97, 'HITACHI', 953, 'Hitachi', 1),
(98, 'HP', 975, 'HP', 1),
(99, 'HTC', 977, 'HTC', 1),
(100, 'HUAWEI', 978, 'Huawei', 1),
(101, 'IMATION', 1006, 'Imation', 1),
(102, 'IPHONE', 14404, 'IPHONE', 1),
(103, 'JAWBONE', 4916, 'Jawbone', 1),
(104, 'JBL', 1063, 'JBL', 1),
(105, 'JUST MOBILE', 2502, 'JUST MOBILE', 1),
(106, 'JVC', 1100, 'JVC', 1),
(107, 'KASPERSKY', 1113, 'Kaspersky', 1),
(108, 'KINGSTON', 1144, 'Kingston', 1),
(109, 'KODAK', 1159, 'Kodak', 1),
(110, 'LAB-C', 2478, 'LAB C', 1),
(111, 'LDNIO', 7013, 'LDNIO', 1),
(112, 'LEEF', 6762, 'Leef', 1),
(113, 'LENOVO', 13662, 'Lenovo', 1),
(114, 'I-LEXUS', 2996, 'LEXUS', 1),
(115, 'LIFEPROOF', 2501, 'LifeProof', 1),
(116, 'LINKSYS', 1243, 'Linksys', 1),
(117, 'LOCK&ampLOCK', 12038, 'Lock & Lock', 1),
(118, 'LOGITECH', 1256, 'Logitech', 1),
(119, 'LOWEPRO', 2242, 'Lowepro', 1),
(120, 'LOYAL', 15580, 'Loyal', 1),
(121, 'MANFROTTO', 2417, 'Manfrotto', 1),
(122, 'MARANTZ', 1312, 'Marantz', 1),
(123, 'MARSHALL', 2441, 'Marshall', 1),
(124, 'MARVO', 1323, 'Marvo', 1),
(125, 'MASPION', 1326, 'Maspion', 1),
(126, 'MATSUNICHI', 1332, 'Matsunichi', 1),
(127, 'MEDIATECH', 1345, 'Mediatech', 1),
(128, 'MICRODRONE', 19460, 'Micro Drone', 1),
(129, 'MICROSOFT', 1374, 'Microsoft', 1),
(130, 'MIDEA', 1376, 'Midea', 1),
(131, 'MITSUBISHI', 1388, 'Mitsubishi', 1),
(132, 'MIYAKO', 1392, 'Miyako', 1),
(133, 'MODENA', 1401, 'Modena', 1),
(134, 'MOSHI', 1414, 'Moshi', 1),
(135, 'MOTOROLA', 1417, 'Motorola', 1),
(136, 'MURAGO', 18038, 'MURAGO', 1),
(137, 'NATIONAL GEOGRAPHIC', 2457, 'National Geographic', 1),
(138, 'NESCAFE', 2320, 'Nescafe', 1),
(139, 'NETGEAR', 10878, 'Netgear', 1),
(140, 'NEXIAN', 2408, 'NEXIAN', 1),
(141, 'NIKON', 1480, 'Nikon', 1),
(142, 'NILLKIN', 2371, 'NILLKIN', 1),
(143, 'NINTENDO', 2252, 'Nintendo', 1),
(144, 'NOKIA', 2165, 'Nokia', 1),
(145, 'NOONTEC', 2506, 'NOONTEC', 1),
(146, 'OCTAGON STUDIO', 12212, 'Octagon Studio', 1),
(147, 'OLYMPUS', 1522, 'Olympus', 1),
(148, 'ONE', 2400, 'ONE', 1),
(149, 'OPLINK', 19159, 'Oplink', 1),
(150, 'OPPO SMARTPHONE', 2172, 'OPPO', 1),
(151, 'OTHER', 14034, 'others', 1),
(152, 'OTTERBOX', 2175, 'Otterbox', 1),
(153, 'OZAKI', 2470, 'Ozaki', 1),
(154, 'PANASONIC', 1573, 'Panasonic', 1),
(155, 'PAPER ONE', 15568, 'Paper One', 1),
(156, 'PARROT', 6690, 'Parrot', 1),
(157, 'PEBBLE', 7274, 'Pebble', 1),
(158, 'PEGATRON', 11701, 'Pegatron', 1),
(159, 'PHILIPS', 13351, 'Philips', 1),
(160, 'PIONEER', 1608, 'Pioneer', 1),
(161, 'PNY', 1625, 'PNY', 1),
(162, 'POLARIS', 5875, 'POLARIS', 1),
(163, 'POLYTRON', 2423, 'Polytron', 1),
(164, 'POWERLOGIC', 6896, 'Powerlogic', 1),
(165, 'PQI', 5592, 'PQI', 1),
(166, 'PROLINK', 1671, 'Prolink', 1),
(167, 'PX', 5038, 'PX', 1),
(168, 'QUANTUM', 1685, 'Quantum', 1),
(169, 'RAPOO', 2430, 'RAPOO', 1),
(170, 'REMAX', 2397, 'Remax', 1),
(171, 'RINNAI', 1730, 'Rinnai', 1),
(172, 'ROMAN', 5227, 'ROMAN', 1),
(173, 'ROYAL', 6893, 'Royal', 1),
(174, 'RUNTASTIC', 16102, 'Runtastic', 1),
(175, 'SAHITEL', 5867, 'SAHITEL', 1),
(176, 'SAMSUNG', 1779, 'Samsung', 1),
(177, 'SANDISK', 1782, 'Sandisk', 1),
(178, 'SANKEN', 1785, 'Sanken', 1),
(179, 'SANYO', 1791, 'Sanyo', 1),
(180, 'SDV', 1806, 'SDV', 1),
(181, 'SEAGATE', 2383, 'SEAGATE', 1),
(182, 'SHARP', 1825, 'Sharp', 1),
(183, 'SHURE', 2161, 'SHURE', 1),
(184, 'SICRON', 18862, 'Sicron', 1),
(185, 'SIMBADDA', 1847, 'Simbadda', 1),
(186, 'SJCAM', 1855, 'Sjcam', 1),
(187, 'SKROSS', 1860, 'Skross', 1),
(188, 'SMARTFREN', 2182, 'Smartfren', 1),
(189, 'SONIC GEAR', 2146, 'Sonic Gear', 1),
(190, 'SONY', 1880, 'Sony', 1),
(191, 'SOUND MAGIC', 5050, 'SOUND MAGIC', 1),
(192, 'SPECTRA', 2220, 'Spectra', 1),
(193, 'SPHERO', 11552, 'Sphero', 1),
(194, 'TAMRON', 2424, 'Tamron', 1),
(195, 'TARGUS', 1951, 'Targus', 1),
(196, 'TCL', 1955, 'TCL', 1),
(197, 'TDK', 2385, 'TDK', 1),
(198, 'TECSTAR', 1959, 'Tecstar', 1),
(199, 'UNBRANDED', 14719, 'The unbranded brand', 1),
(200, 'TOSHIBA', 2002, 'Toshiba', 1),
(201, 'TP-LINK', 2008, 'TP-Link', 1),
(202, 'TRANSCEND', 2010, 'Transcend', 1),
(203, 'TRENDMICRO', 6165, 'TRENDMICRO', 1),
(204, 'TYLT', 7349, 'TYLT', 1),
(205, 'UAG', 6680, 'UAG', 1),
(206, 'UNILEVER', 2039, 'Unilever', 1),
(207, 'UNIQUE', 2192, 'uNiQue', 1),
(208, 'UNPLUG', 7382, 'Unplug', 1),
(209, 'URBANEARS', 2442, 'URBANEARS', 1),
(210, 'USB.COM', 13178, 'USB ', 1),
(211, 'UTICON', 6841, 'Uticon', 1),
(212, 'VGEN', 13821, 'vgen', 1),
(213, 'VINZO', 2398, 'Vinzo', 1),
(214, 'VIORA', 5689, 'VIORA', 1),
(215, 'WALKERA', 11771, 'Walkera', 1),
(216, 'WD', 2382, 'WD', 1),
(217, 'WESTERN DIGITAL', 2094, 'Western Digital', 1),
(218, 'WINN GAS', 2268, 'Winn Gas', 1),
(219, 'XEROX', 5101, 'XEROX', 1),
(220, 'XIAOMI', 2105, 'Xiaomi', 1),
(221, 'XL', 14765, 'xl', 1),
(222, 'YAMAHA', 2111, 'Yamaha', 1),
(223, 'YONGMA', 3170, 'YONGMA', 1),
(224, 'ZEROWATT', 5969, 'ZEROWATT', 1),
(225, 'ZUMREED', 9629, 'zumreed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oms_category_mapping`
--

CREATE TABLE `oms_category_mapping` (
  `category_mapping_id` int(5) NOT NULL,
  `category_es` varchar(50) NOT NULL,
  `category_marketplace_id` int(5) NOT NULL,
  `category_marketplace_desc` varchar(50) NOT NULL,
  `marketplace_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_category_mapping`
--

INSERT INTO `oms_category_mapping` (`category_mapping_id`, `category_es`, `category_marketplace_id`, `category_marketplace_desc`, `marketplace_id`) VALUES
(1, '1', 630, 'AC', 1),
(3, 'Television', 45, 'Televisi', 1),
(4, '2', 45, 'Televisi', 1),
(5, '3', 45, 'Televisi', 1),
(8, '5', 4, 'Handphone Basic', 1),
(9, '6', 4, 'Handphone Basic', 1),
(10, '20', 45, 'Televisi', 1),
(11, 'tester', 3, 'Smartphone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oms_color_mapping`
--

CREATE TABLE `oms_color_mapping` (
  `color_mapping_id` int(5) NOT NULL,
  `color_es` varchar(50) NOT NULL,
  `color_marketplace_id` int(5) NOT NULL,
  `color_marketplace_desc` varchar(50) NOT NULL,
  `marketplace_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_color_mapping`
--

INSERT INTO `oms_color_mapping` (`color_mapping_id`, `color_es`, `color_marketplace_id`, `color_marketplace_desc`, `marketplace_id`) VALUES
(1, 'Biru', 4, 'Blue', 1),
(2, 'Putih', 16, 'White', 1),
(3, 'Abu - abu', 8, 'grey', 1),
(4, 'Cokelat', 5, 'brown', 1),
(5, 'Emas', 6, 'gold', 1),
(6, 'Hijau', 7, 'green', 1),
(7, 'Hitam', 3, 'black', 1),
(8, 'Kuning', 17, 'yellow', 1),
(9, 'Merah', 13, 'red', 1),
(10, 'Oranye', 10, 'orange', 1),
(11, 'Pink', 11, 'merah jambu', 1),
(12, 'Silver', 14, 'perak', 1),
(13, 'Ungu', 12, 'purple', 1),
(14, 'Beige', 2, 'beige', 1),
(15, 'Magenta', 741, 'magenta', 1),
(16, 'Merah Tua', 737, 'maroon', 1),
(17, 'Orange', 10, 'orange', 1),
(18, 'Peach', 739, 'persik', 1),
(19, 'perunggu', 732, 'bronze', 1),
(20, 'badam', 731, 'almond', 1),
(21, 'kopi', 734, 'coffee', 1),
(22, 'unta', 733, 'camel', 1),
(23, 'krim', 735, 'cream', 1),
(24, 'fuchsia', 740, 'fuchsia', 1),
(25, 'khaki', 736, 'khaki', 1),
(26, 'multi warna', 18, 'Multi Colour', 1),
(27, 'navy', 9, 'navy', 1),
(28, 'tidak ada warna', 1, 'no color', 1),
(29, 'Lainnya', 19, 'others', 1),
(30, 'tan', 738, 'tan', 1),
(31, 'pirus', 15, 'torquise', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oms_invoice_status`
--

CREATE TABLE `oms_invoice_status` (
  `invoice_id` int(50) NOT NULL,
  `marketplace_id` int(5) NOT NULL,
  `delivery_provider` varchar(50) NOT NULL,
  `tracking_number` varchar(20) NOT NULL,
  `cancel_reason` varchar(150) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oms_login`
--

CREATE TABLE `oms_login` (
  `user_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `category_code` varchar(1) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `createdon` date NOT NULL,
  `isdelete` int(1) NOT NULL DEFAULT '0',
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_login`
--

INSERT INTO `oms_login` (`user_id`, `name`, `address`, `hp`, `phone`, `email`, `password`, `category_code`, `active`, `birthday`, `createdon`, `isdelete`, `note`) VALUES
(1, 'Yung Fei.', 'Jakarta', '08992369126', '08992369126', 'yungfei1989@gmail.com', '794885428ddb12e1b64e52fb6650de0e', '', 1, '1900-12-29', '0000-00-00', 0, '<p>tes<br></p>'),
(2, 'Dwikky Maradhiza', 'Testing', '123123123', '123123123', 'dwikkymaradhiza@yahoo.com', '8f5670586880fc41fb66e930cf1c9fd7', NULL, 1, '2017-01-17', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `oms_marketplace`
--

CREATE TABLE `oms_marketplace` (
  `marketplace_id` int(5) NOT NULL,
  `marketplace_name` varchar(20) NOT NULL,
  `marketplace_prefix` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_marketplace`
--

INSERT INTO `oms_marketplace` (`marketplace_id`, `marketplace_name`, `marketplace_prefix`) VALUES
(1, 'Matahari Mall', 'MM');

-- --------------------------------------------------------

--
-- Table structure for table `oms_permission`
--

CREATE TABLE `oms_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_permission`
--

INSERT INTO `oms_permission` (`id`, `name`, `description`) VALUES
(1, 'brand-read', 'Read brand menu'),
(2, 'brand-write', 'Add and update brand menu'),
(3, 'brand-delete', 'Delete brand data'),
(4, 'color-read', 'Read color menu'),
(5, 'color-write', 'Add and update color menu'),
(6, 'color-delete', 'Delete color data'),
(7, 'category-read', 'Read category menu'),
(8, 'category-write', 'Add and update category menu'),
(9, 'category-delete', 'Delete category data'),
(10, 'product-read', 'Read product menu'),
(11, 'product-write', 'Add and update product menu'),
(12, 'product-delete', 'Delete product data'),
(13, 'order-read', 'Read order menu'),
(14, 'role-read', 'Read role menu'),
(15, 'role-write', 'Add and update role menu'),
(16, 'role-delete', 'Delete role data'),
(17, 'user-read', 'Read user menu'),
(18, 'user-write', 'Add and update user menu'),
(19, 'user-delete', 'Delete user data');

-- --------------------------------------------------------

--
-- Table structure for table `oms_privilege`
--

CREATE TABLE `oms_privilege` (
  `privilege_id` int(5) NOT NULL,
  `privilege_name` varchar(50) NOT NULL,
  `privilege_code` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_privilege`
--

INSERT INTO `oms_privilege` (`privilege_id`, `privilege_name`, `privilege_code`) VALUES
(1, 'SuperUser', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `oms_product`
--

CREATE TABLE `oms_product` (
  `product_id` int(5) NOT NULL,
  `productES_id` int(5) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `brand_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `color_id` int(5) NOT NULL,
  `price` varchar(15) NOT NULL,
  `weight_package` varchar(10) NOT NULL,
  `weight_product` varchar(10) NOT NULL,
  `product_hightlight` text NOT NULL,
  `product_full_description` text NOT NULL,
  `images` text NOT NULL,
  `product_attributes` text NOT NULL,
  `dimension_package` varchar(20) NOT NULL,
  `dimension_product` varchar(20) NOT NULL,
  `youtube_url` varchar(100) NOT NULL,
  `handling_fee` int(10) NOT NULL,
  `insurance` tinyint(1) NOT NULL,
  `jabodetabek_only` tinyint(1) NOT NULL,
  `limit_qty` int(3) NOT NULL,
  `marketplace_id` int(5) NOT NULL,
  `promo_price` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `stock_available` varchar(10) NOT NULL,
  `stock_minimum` varchar(10) NOT NULL,
  `end_date` date NOT NULL,
  `createdon` date NOT NULL,
  `product_marketplace_id` varchar(20) NOT NULL,
  `product_marketplace_variant_id` varchar(20) NOT NULL,
  `createdby` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_product`
--

INSERT INTO `oms_product` (`product_id`, `productES_id`, `sku`, `product_name`, `brand_id`, `category_id`, `color_id`, `price`, `weight_package`, `weight_product`, `product_hightlight`, `product_full_description`, `images`, `product_attributes`, `dimension_package`, `dimension_product`, `youtube_url`, `handling_fee`, `insurance`, `jabodetabek_only`, `limit_qty`, `marketplace_id`, `promo_price`, `start_date`, `stock_available`, `stock_minimum`, `end_date`, `createdon`, `product_marketplace_id`, `product_marketplace_variant_id`, `createdby`) VALUES
(1, 14, 'S-18NLA', 'LG AC Split 2 PK S-18NLA - Putih', 2, 1, 2, '8599000', '50', '35', '[{"sequence":"1","description":" Filter udara untuk anti bakteri dan jamur"},{"sequence":"2","description":" Proses pendinginan yang cepat"},{"sequence":"3","description":" Desain yang menawan"},{"sequence":"4","description":" Pengatur otomatis"}]', 'Dinginkan ruangan secara cepat dengan teknologi Jet Cool yang dapat menyejukkan ruangan dalam waktu 3 menit. Dengan filter udaranya LG AC Split 2 PK mencegah bakteri dan debu menganggu waktu istirahat Sahabat ESer. Dilengkapi tombol Deep Sleep untuk mengatur temperatur ruangan secara otomatis dan membuat Sahabat ESer dapat tidur lebih nyenyak.', '[{"sequence":"1","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_1.jpg"},{"sequence":"2","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_2.jpg"},{"sequence":"3","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_3.jpg"},{"sequence":"4","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_4.jpg"},{"sequence":"5","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-18NLA\\/S-18NLA_5.jpg"}]', '', '475 x 840 x 1080 cm', '770 x 285 x 540 cm', '', 0, 0, 0, 0, 1, '', '0000-00-00', '100', '10', '0000-00-00', '2016-11-07', 'XMA00281300000000', 'XMA0028130000000001', 1),
(2, 13, 'S-12NLA', 'LG - AC - Split - 1.5 PK - Air Filter - Deep Sleep', 1, 1, 1, '6399000', '35', '0', '[{"sequence":"1","description":"teeeeeeeeeeeeeeeeeee"},{"sequence":"2","description":"No description Yet"},{"sequence":"3","description":"No description Yet"},{"sequence":"4","description":"No description Yet"}]', 'Dinginkan ruangan secara cepat dengan teknologi Jet Cool yang dapat menyejukkan ruangan dalam waktu 3 menit. Dengan filter udaranya, LG AC Split 1 1/2 PK mencegah bakteri dan debu menganggu waktu istirahat Sahabat ESer. Dilengkapi tombol Deep Sleep untuk mengatur temperatur ruangan secara otomatis dan membuat Sahabat ESer dapat tidur lebih nyenyak.', '[{"sequence":"1","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_1.jpg"},{"sequence":"2","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_2.jpg"},{"sequence":"3","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_3.jpg"},{"sequence":"4","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_4.jpg"},{"sequence":"5","path":"http:\\/\\/www.es.id\\/media\\/dem\\/S-12NLA\\/S-12NLA_5.jpg"}]', '[{"id":"1","value":"1 year"},{"id":"4","value":""},{"id":"6","value":""},{"id":"13","value":""},{"id":"20","value":""},{"id":"73","value":""},{"id":"74","value":""},{"id":"87","value":""},{"id":"98","value":""}]', '675 x 770 x 835 cm', '720 x 500 x 500 cm', '', 0, 0, 0, 0, 1, '', '0000-00-00', '100', '10', '0000-00-00', '2016-11-08', 'XHA00281300000004', 'XHA0028130000000401', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oms_role`
--

CREATE TABLE `oms_role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_role`
--

INSERT INTO `oms_role` (`id`, `name`, `description`) VALUES
(6, 'Superadmin Role', 'Superadmin Role'),
(10, 'Admin Role', 'Admin Role');

-- --------------------------------------------------------

--
-- Table structure for table `oms_role_permission`
--

CREATE TABLE `oms_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_role_permission`
--

INSERT INTO `oms_role_permission` (`id`, `role_id`, `permission_id`) VALUES
(50, 6, 1),
(51, 6, 2),
(52, 6, 3),
(53, 6, 4),
(54, 6, 5),
(55, 6, 6),
(56, 6, 7),
(57, 6, 8),
(58, 6, 9),
(59, 6, 10),
(60, 6, 11),
(61, 6, 12),
(62, 6, 13),
(63, 6, 14),
(64, 6, 15),
(65, 6, 16),
(66, 6, 17),
(67, 6, 18),
(68, 6, 19),
(74, 10, 1),
(75, 10, 4),
(76, 10, 7),
(77, 10, 10),
(78, 10, 11),
(79, 10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `oms_role_user`
--

CREATE TABLE `oms_role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oms_role_user`
--

INSERT INTO `oms_role_user` (`id`, `user_id`, `role_id`) VALUES
(6, 1, 6),
(9, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oms_brand_mapping`
--
ALTER TABLE `oms_brand_mapping`
  ADD PRIMARY KEY (`brand_mapping_id`),
  ADD UNIQUE KEY `my_unique_key` (`brand_es`,`marketplace_id`);

--
-- Indexes for table `oms_category_mapping`
--
ALTER TABLE `oms_category_mapping`
  ADD PRIMARY KEY (`category_mapping_id`),
  ADD UNIQUE KEY `my_unique_key` (`category_es`,`marketplace_id`);

--
-- Indexes for table `oms_color_mapping`
--
ALTER TABLE `oms_color_mapping`
  ADD PRIMARY KEY (`color_mapping_id`);

--
-- Indexes for table `oms_invoice_status`
--
ALTER TABLE `oms_invoice_status`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `oms_login`
--
ALTER TABLE `oms_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `oms_marketplace`
--
ALTER TABLE `oms_marketplace`
  ADD PRIMARY KEY (`marketplace_id`);

--
-- Indexes for table `oms_permission`
--
ALTER TABLE `oms_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oms_privilege`
--
ALTER TABLE `oms_privilege`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `oms_product`
--
ALTER TABLE `oms_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `oms_role`
--
ALTER TABLE `oms_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oms_role_permission`
--
ALTER TABLE `oms_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oms_role_user`
--
ALTER TABLE `oms_role_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oms_brand_mapping`
--
ALTER TABLE `oms_brand_mapping`
  MODIFY `brand_mapping_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT for table `oms_category_mapping`
--
ALTER TABLE `oms_category_mapping`
  MODIFY `category_mapping_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `oms_color_mapping`
--
ALTER TABLE `oms_color_mapping`
  MODIFY `color_mapping_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `oms_invoice_status`
--
ALTER TABLE `oms_invoice_status`
  MODIFY `invoice_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oms_login`
--
ALTER TABLE `oms_login`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oms_marketplace`
--
ALTER TABLE `oms_marketplace`
  MODIFY `marketplace_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oms_permission`
--
ALTER TABLE `oms_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `oms_privilege`
--
ALTER TABLE `oms_privilege`
  MODIFY `privilege_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oms_product`
--
ALTER TABLE `oms_product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oms_role`
--
ALTER TABLE `oms_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `oms_role_permission`
--
ALTER TABLE `oms_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `oms_role_user`
--
ALTER TABLE `oms_role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
