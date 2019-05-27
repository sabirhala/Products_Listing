-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 01:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `varshani_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CatImg` varchar(255) NOT NULL,
  `CatDis` text NOT NULL,
  `isheader` varchar(20) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `CatImg`, `CatDis`, `isheader`) VALUES
(55, 'STD House Wiring Cable 3/4 Core', 'pp5.jpg', 'A single stage air compressor works using the force of a piston and pressure sensitive valve.', 'false'),
(56, 'Earthing Material', 'pp4.jpg', 'We are instrumental in offering a wide range of Pillar Drills to the clients.', 'false'),
(57, 'Flood Lights, Energy Saver Bulbs', 'electric_item.png', 'We are instrumental in offering a wide range of Pillar Drills to the clients.', 'false'),
(58, 'LED Fitting & Ordinary Fittings', 'electric_item.png', 'a leader in low-voltage switchgears with a market share of over 40 per cent', 'false'),
(59, 'Diesel Engine oil, Gear Oil, Hydraulic Oil, ATF, Cutting oil, Petrol Engine oil', 'oil.png', 'e are successfully meeting the varied requirements of our clients by providing the best quality range of Welding Machine Generator', 'false'),
(60, 'Piller Drills', 'pp2.jpg', 'We are instrumental in offering a wide range of Pillar Drills to the clients.', 'false'),
(61, 'Dpper flexible & armoured cables', 'pp5.jpg', 'We are authorized dealers of GLOBAL, SHULE & ROYAL ENGLAND brand of cables and wire. This is a company known...', 'false'),
(62, 'Portable, Single & three phase welding machine & ROD', 'pp6.jpg', 'L&T, a leader in low-voltage switchgears with a market share of over 40 per cent', 'false'),
(63, 'AxCL Lubes oil', 'oil.png', 'Our electronic ballasts are superior in quality and performance. Offered at industry leading prices, our products are...', 'true'),
(64, 'Lubi Motors', 'submersible.png', 'Lubi provide high quality, reliable and cost effective ground water pumping system for your housed, industry and farm.high quality, reliable and cost effective ground water pumping system for your ', 'true'),
(93, 'Electronic Equipment & Supplies', 'electric_item.png', 'The quality of products and services being produced in the Emirates are world We envision ourselves as one of the best building contractors and we believe in crafting the magic with our expertise, dedication and passion. We have proudly emerged into a company from very humble beginning ', 'true'),
(110, 'Mercury Vapour & Sodium Vapour bulbs', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(111, 'Air Circulators', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(112, 'Stand Fans & Rechargeable fans', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(113, 'Single Phase & Three Phase Industrial Motor Lubi', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(114, 'Makita Industrial Power Tolls', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(115, 'Cutting Disc, Grinding Disk & Diamond Cutting Disk', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(116, 'MCB & Circuit Breakers (Single Phase & 3 Phase)', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(117, 'Power Rammer & Power Trowel', 'dummy-image.jpg', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(127, 'Contractors & MCCB', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(128, 'Control Panels & Changeovers switch', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(129, 'Concrete Vibrator & Poker', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(130, 'Plate Compactor', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(131, 'Generators', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(132, 'Honda Engine & Petrol Diesel water pump', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(133, 'Chain Blocks 1 Ton to 10 ', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(134, 'Taparia Make Hand Tools', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false'),
(135, 'Air Compressor', '', 'The quality of products and services being produced in the Emirates are world class and second to none. Numerous awards and accolades have been presented to companies in these Emirates. ', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProID` int(11) NOT NULL,
  `ProName` varchar(500) NOT NULL,
  `ProDetail` text NOT NULL,
  `ProDes` text NOT NULL,
  `ProImg1` varchar(255) NOT NULL,
  `ProImg2` varchar(255) NOT NULL,
  `ProImg3` varchar(255) NOT NULL,
  `ProImg4` varchar(255) NOT NULL,
  `ThumbnailImg` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProPrice` double(10,2) DEFAULT NULL,
  `SubCateID` int(11) DEFAULT NULL,
  `NoOfCountOnPackage` int(11) NOT NULL,
  `ProVolID` int(11) NOT NULL,
  `NoOfValume` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `ProName`, `ProDetail`, `ProDes`, `ProImg1`, `ProImg2`, `ProImg3`, `ProImg4`, `ThumbnailImg`, `CategoryID`, `ProPrice`, `SubCateID`, `NoOfCountOnPackage`, `ProVolID`, `NoOfValume`) VALUES
(50, 'Single Stage Air Compressor', 'Single Stage Air Compressor', 'A single stage air compressor works using the force of a piston and pressure sensitive valve.', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'pp1.png', 'p3.jpg', 135, 3000.00, 0, 2, 2, 2.00),
(51, 'Pillar Drills', 'Pillar Drills', 'We are instrumental in offering a wide range of Pillar Drills to the clients.', 'pp2.jpg', 'pp3.jpg', 'pp2.jpg', 'pp3.jpg', 'pp2.jpg', 60, 5000.00, 0, 3, 2, 55.00),
(52, 'Siemens, L&T switch gears', 'Siemens, L&T switch gears', 'L&T, a leader in low-voltage switchgears with a market share of over 40 per cent', 'oil.png', 'oil.png', 'oil.png', 'oil.png', 'oil.png', 63, 3500.00, 0, 66, 2, 6.00),
(53, 'Electronic Ballasts', 'Electronic Ballasts', 'Our electronic ballasts are superior in quality and performance. Offered at industry leading prices, our products are...', 'electric_item.png', 'electric_item.png', 'electric_item.png', 'electric_item.png', 'electric_item.png', 93, 6000.00, 0, 3, 2, 5.00),
(54, 'Wire and Cables', 'Wire and Cables', 'We are authorized dealers of GLOBAL, SHULE & ROYAL ENGLAND brand of cables and wire. This is a company known...', 'pp5.jpg', 'pp5.jpg', 'pp5.jpg', 'pp5.jpg', 'submersible.png', 64, 2000.00, 9, 6, 2, 6.00),
(55, 'Generators', 'Generators', 'We are successfully meeting the varied requirements of our clients by providing the best quality range of Welding Machine Generator.', 'p4.jpg', 'pp1.png', 'p4.jpg', 'pp1.png', 'p4.jpg', 131, 5000.00, 0, 5, 2, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `ProSpeID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `ProSpeIndex` int(11) NOT NULL,
  `ProKey` varchar(50) NOT NULL,
  `ProValue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_specification`
--

INSERT INTO `product_specification` (`ProSpeID`, `ProID`, `ProSpeIndex`, `ProKey`, `ProValue`) VALUES
(5, 41, 1, 'sdsd', 'sadsad'),
(6, 43, 1, 'sdasd', 'sdsad'),
(11, 41, 2, 'sdd', 'sdsd'),
(13, 43, 2, 'sdsad', 'sdsad'),
(19, 41, 3, 'dfdsfdf', 'sadsadas'),
(37, 43, 3, 'df', 'sdfd'),
(38, 43, 4, 'dsfd', 'sdfsd'),
(39, 43, 5, 'asd', 'sdasd'),
(40, 43, 6, 'sadsd', 'sadsad'),
(41, 43, 7, 'asdsdasd', 'sdasdsads'),
(42, 43, 8, 'asdsadsad', 'sdsadsad'),
(43, 46, 1, 'Key 1', 'Single Satage Comressor'),
(44, 46, 2, 'New Key', 'New Key Specification 2'),
(45, 47, 1, 'Key 1', 'Key Value 1'),
(46, 47, 2, 'Key 2', 'Key Value 2'),
(47, 48, 1, 'Portable Key 1', 'Portable Key 1 Value'),
(48, 48, 2, 'Portable Key 2', 'Portable Key 2 Value'),
(49, 49, 1, 'Electronic Key 1', 'Electronic Key 1 Value'),
(50, 49, 2, 'Electronic Key 2', 'Electronic Key 2 Value'),
(51, 51, 1, 'Drilling Capacity', '13 mm'),
(52, 51, 2, 'Piller Dia', '47 mm'),
(53, 51, 3, 'Spindle Nose', 'Solid'),
(54, 50, 1, 'Speed', ' 550 to 800 rpm'),
(55, 50, 2, 'Motor HP', '10 hp'),
(56, 52, 1, ' Number of poles', '2 Pole'),
(57, 52, 2, 'Material', 'Plastic'),
(58, 52, 3, 'Voltage', '220v'),
(59, 53, 1, 'Rated Voltage', '230 - 240 V'),
(60, 53, 2, 'Material', 'Housing - ABS'),
(61, 54, 1, 'Material', 'Copper; Size: 17x17x5 cm'),
(62, 54, 2, 'Wire Length', '90 m'),
(63, 54, 3, 'Net Weight', '2 Kg'),
(64, 55, 1, 'Power ', '850 VA'),
(65, 55, 2, 'Voltage', '230 Volt , 50 Hz., Single Phase'),
(66, 55, 3, 'Fuel Tank Capacity', '7.5 Ltr.');

-- --------------------------------------------------------

--
-- Table structure for table `product_volume`
--

CREATE TABLE `product_volume` (
  `ProVolID` int(11) NOT NULL,
  `ProValName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_volume`
--

INSERT INTO `product_volume` (`ProVolID`, `ProValName`) VALUES
(1, 'Litter'),
(2, 'Kilo Gram'),
(3, 'Cubic Foot');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `SubCateID` int(11) NOT NULL,
  `SubCateName` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`SubCateID`, `SubCateName`, `CategoryID`) VALUES
(8, '30A A.V.S SOLATEX', 55),
(9, 'VETO POWER GUARD', 56),
(10, 'FAVICOL', 56),
(11, 'FOAM SPRAY', 55),
(12, 'syska', 57),
(13, 'Syska LED', 58),
(14, 'Servo', 59),
(15, 'point 1 inch', 60),
(16, 'Polycab', 61);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`adminid`, `adminname`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`ProSpeID`);

--
-- Indexes for table `product_volume`
--
ALTER TABLE `product_volume`
  ADD PRIMARY KEY (`ProVolID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`SubCateID`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `ProSpeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product_volume`
--
ALTER TABLE `product_volume`
  MODIFY `ProVolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SubCateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
