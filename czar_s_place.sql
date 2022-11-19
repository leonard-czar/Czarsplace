-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 02:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `czar's_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pwd`) VALUES
(1, 'lebechi', 'uchey');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `brand_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_image`) VALUES
(1, 'Audemars piguet', 'Audemars.png'),
(2, 'Rolex', 'rolex.jpg'),
(3, 'Hublot', 'hublot.jpg'),
(15, 'Casio', 'ig1.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `watchid` int(11) NOT NULL,
  `cartimg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `qty`, `price`, `total`, `userid`, `watchid`, `cartimg`) VALUES
(112, 11, '260000', '2860000', 4, 16, 'Audemars6.jpg'),
(113, 1, '250000', '250000', 4, 24, 'rolex5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(45) NOT NULL,
  `customer_lastname` varchar(45) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phonenumber` varchar(45) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_address2` varchar(100) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_phonenumber`, `gender`, `customer_address`, `customer_address2`, `state_id`, `customer_password`, `customer_regdate`) VALUES
(1, 'uchey', 'lebechi ', 'leonell4fame@gmail.com', '08182281634', 'male', '2 ilarogun close lawason, surulere lagos state', '', 24, '$2y$10$hKEpY8q1wJAleaiYZwiRwOttvolY/6htUj.GPDr/Oj0lpq66aHnSC', '2022-10-03 12:00:32'),
(3, 'tunde', 'ednut', 'tunde@gmail.com', '0918821634', 'male', '1 kube street', '', 18, '$2y$10$XzXc6ZvE4zfrEJCz0f2iZOvCduqnQ1jxL942FYlF4bp72o8SVzdu.', '2022-10-24 08:12:29'),
(4, 'badoo', 'lee', 'lee@mail.com', '080', 'female', 'success road', '', 17, '$2y$10$35UBcynt0mEC3rKVKLH.5Ocq1HHoWiLUHMOiYcsLH4L/k0/ZkQhjO', '2022-10-30 18:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `orders_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_status` enum('pending','paid') DEFAULT NULL,
  `total_amount` float NOT NULL,
  `shipping_address` varchar(150) NOT NULL,
  `alt_phonenumber` varchar(15) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`orders_id`, `customer_id`, `order_status`, `total_amount`, `shipping_address`, `alt_phonenumber`, `order_date`) VALUES
(1222532066, 1, 'paid', 190000, 'bestest villa', '', '2022-11-06 16:03:10'),
(1680154286, 1, 'pending', 2520000, 'ok', '', '2022-11-06 14:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `watch_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` float NOT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `watch_id`, `qty`, `unit_price`, `total`) VALUES
(63, 1680154286, 23, 12, 210000, 2520000),
(69, 1222532066, 32, 1, 190000, 190000);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nassarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'Abuja (FCT)'),
(38, 'Foreign');

-- --------------------------------------------------------

--
-- Table structure for table `wristwatches`
--

CREATE TABLE `wristwatches` (
  `watch_id` int(11) NOT NULL,
  `watch_Name` varchar(45) DEFAULT NULL,
  `watch_description` varchar(255) DEFAULT NULL,
  `watch_price` float NOT NULL,
  `collection` varchar(50) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `case_description` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `dial` varchar(50) NOT NULL,
  `Bezel` varchar(50) NOT NULL,
  `crystal` varchar(50) NOT NULL,
  `caliber` varchar(50) NOT NULL,
  `watch_function` varchar(50) NOT NULL,
  `mechanism` varchar(50) NOT NULL,
  `number_of_jewels` varchar(50) NOT NULL,
  `total_diameter` varchar(50) NOT NULL,
  `power_reserve` varchar(50) NOT NULL,
  `number_of_parts` varchar(50) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `bracelet` varchar(50) NOT NULL,
  `clasp` varchar(50) NOT NULL,
  `water_resistance` varchar(50) NOT NULL,
  `brand_Id` int(11) NOT NULL,
  `watch_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wristwatches`
--

INSERT INTO `wristwatches` (`watch_id`, `watch_Name`, `watch_description`, `watch_price`, `collection`, `reference_number`, `case_description`, `gender`, `movement`, `dial`, `Bezel`, `crystal`, `caliber`, `watch_function`, `mechanism`, `number_of_jewels`, `total_diameter`, `power_reserve`, `number_of_parts`, `frequency`, `bracelet`, `clasp`, `water_resistance`, `brand_Id`, `watch_image`) VALUES
(11, 'audemars piguet code 11.59', '26393CR.OO.A002KB.01 Smoked Lacquered Grey Selfwinding Chronograph 41mm Men\'s Watch', 220000, 'Code 11.59', '26393NR.OO.A002KB.01', '41 mm, Rose Gold,12.6 mm thick', 'Men', 'Automatic', 'Smoked grey dial with vertical satin-finished base', 'lack inner bezel', 'Double glareproofed sapphire crystal and case back', '4401', 'Flyback chronograph, hours, minutes, small seconds', 'Self-winding', '40', '32 mm', '70 h', '381', '4 hz 28,800 vph', 'Black,Rubber-coated strap', '18-carat pink gold pin buckle', '30m', 1, 'Audemars1.jpg'),
(12, 'audemars piguet royal oak', 'Offshore 26420SO.OO.A600CA.01 Chronograph Men\'s Watch', 310000, 'Royal Oak Offshore', '26420SO.OO.A600CA.01', '43 mm, 14.4 mm thick', 'Men', 'Automatic', 'Smoked Light Browns', '', 'Glareproofed Sapphire Crystal', '4401', 'Flyback Chronograph, Hours, Minutes, Small Seconds', 'Self-winding', '', '', '70 h', '', '4 hz 28,800 vph', 'Light Brown Rubber', '18-carat pink gold pin buckle', '30m', 1, 'Audemars2.jpg'),
(13, 'audemars piguet royal oak', 'selfwinding 15451OR.YY.1256OR.0118kt Rosegold 37mm Ladies Watch', 250000, 'Royal Oak Offshore', '15451OR.YY.1256OR.01', '18kt Rose Gold', 'Ladies', 'Automatic', 'Gold', 'Orange Sapphire', 'scratch resistant sapphire crystal', '', '', 'Self-winding', '', '', '60 h', '', '', '', '', '50m/165ft', 1, 'Audemars3.jpg'),
(14, 'audemars piguet royal oak', 'selfwinding 15551ST.ZZ.1356ST.01 “50th Anniversary” 37mm Stainless Steel Ladies’ Watch', 300000, 'Royal Oak “50th Anniversary', '15550ST.OO.1356ST.02', '9mm Octagon shaped,Stainless steel case, glareproo', 'Ladies', 'Automatic', 'Bleu nuit nuage 50” dial with “Grande Tapisserie', '', 'Anti-Reflective Scratch Resistant Sapphire', '', '', '', '', '37mm', '60 h', '', '', 'Stainless steel bracelet', 'AP folding clasp', '50m/165ft', 1, 'Audemars4.jpg'),
(15, 'audemars piguet code 11.59', '26600CR.OO.D009KB.01 Tourbillon Openworked 41mm 18k White Gold Men\'s Watch', 290000, 'Code 11.59', '26600CR.OO.D009KB.01', '10.7 mm Round shaped,18 karat White gold', 'Men', 'Automatic', 'Grey Skeleton, Arabic numerals and Indices', 'Grey Lacquered Inner Bezel', 'Scratch Resistance Sapphire crystal', '2948', 'Tourbillon, Hours and minute', '', '', '41mm', '', '196', '21,600 A/h', 'Grey Textile strap coated with rubber with hand st', 'AP folding clasp', '30m', 1, 'Audemars5.jpg'),
(16, 'audemars piguet royal oak', '15500ST.OO.1220ST.03 Black Dial 41mm Stainless Steel Men\'s Watch', 260000, 'Royal Oak', '15500ST.OO.1220ST.03', 'Stainless Steel', 'Men', 'Automatic', 'Black', 'Fixed', '', '', '', '', '', '41mm', '', '', '', 'Stainless steel bracelet', 'AP folding clasp', '50m', 1, 'Audemars6.jpg'),
(21, 'Rolex Submariner', 'Oyster Perpetual Black Dial 41mm Mens Watch', 300000, 'Rolex Submarine', '116610LN', '41mm', 'Men', 'Automatic', 'Black', 'Black Unidirectional Rotating', '', '', 'Round / Baton Indexes', '', '', '', '', '', '', 'silver, Stainless Steel', '', '100m', 2, 'rolex2.jpg'),
(22, 'Rolex Datejust', '41 Rose Gold/Steel Slate Roman Dial Fluted Bezel Jubilee Bracelet 126331,men\'s watch', 360000, 'Rolex Datejust', '126331SRJ', '41mm Round shaped', 'Men', 'Automatic', 'Slate Roman', 'Rose Gold Fluted', '', '', 'Round', '', '', '', '', '', '', 'Rose Gold/Steel', 'Folding Oysterclasp', '100m', 2, 'rolex3.jpg'),
(23, 'Rolex Datejust', '278288RBR Malachite 6 and 9 Diamond Bezel 31mm 18k Yellow Gold Jubilee Ladie\'s Watch', 210000, 'Rolex Datejust', '278288RBR', 'Round shaped,18 karat Yellow Gold', 'Ladies', 'Automatic', 'Green Malachite a green copper carbonate mineral', 'Diamond-Set,46 pieces of Diamonds', ' Scratch Resistance Sapphire crystal', '2236', '', 'Self winding', '', '31mm', '55 hours', '', '', '', 'Folding Clasp', '100m', 2, 'rolex4.jpg'),
(24, 'Rolex Datejust', '18kt Rose Gold 31mm Ladie\'s Watch', 250000, 'Rolex Datejust', '178288', 'Round shaped,18 karat Rose Gold', 'Ladies', 'Automatic', 'Black Set With 10 Diamonds', 'Fixed', 'scratch resistant sapphire crystal', '', '', 'Self winding', '', '31mm', '', '', '', '18 karat Rose Gold', 'Double-locking safety', '100m', 2, 'rolex5.jpg'),
(25, 'Rolex Yactch-Master 40', 'Oyster 40 mm, Everrose gold Men\'s Watch', 400000, 'Rolex Yatch-Master', '126655', 'Oyster Everose gold', 'Men', 'Automatic', 'Intense Black', 'Bidirectional Rotatable', '', '3235', '', 'Self winding', '', '40mm', '70 hours', '', '', '', '', '100m', 2, 'rolex1.jpg'),
(31, 'Hublot Classic Fusion', 'Chronograph Juventus Limited Edition Of 200 Watch', 210000, 'Classic Fusion Limited Edition', '521.CQ.1420.LR.JUV18', 'Satin-finished Black Ceramic', 'Men', 'Manual-Winding', 'Black sunray satin', 'Black PVD titanium with black carbon fiber insert', 'Scratch resistant sapphire', '3235', '', 'Self winding', '', '40mm', '', '', '', '18 karat Rose Gold', 'Black Leather strap with white stitching', '100m', 3, 'hub1.jpg'),
(32, 'Hublot Classic Fusion', '565.NX.7170.LR 38mm Blue Dial Titanium Ladies Watch', 190000, 'Classic Fusion', ' 565.NX.7170.LR', 'Titanium', 'Ladies', 'Automatic', 'Black sunray satin', 'Titanium bezel set with 126 diamonds (0.78ct)', 'Sapphire crystal with anti-reflective treatment', '', '', '', '', '40mm', '42 hours', '', '', 'Blue Rubber and Leather Strap', '', '50m', 3, 'hub.jpg'),
(33, 'Hublot Classic Fusion', '565.NX.8970.LR Titanium 38mm Green Dial Men\'s Watch', 150000, 'Classic Fusion', '565.NX.8970.LR', 'Round shaped Titanium', 'Men', 'Automatic', 'Green Analog,Silver No Numerals', 'Fixed', 'Scratch Resistant Sapphire', '', '', '', '', '', '42 hours', '', '', 'Green Gummy Leather Strap', '', '50m/65ft', 3, 'hublot01.jpg'),
(34, 'Hublot Big Bang ', '44mm 18K Rose Gold Ceramic Rubber Strap Men\'s Watch', 200000, 'Big Bang', '301.PB.131.RX', 'Round shaped 18kt Rose Gold', 'Men', 'Automatic', 'Black Carbon Arabic', 'Fixed', 'Scratch Resistant Sapphire', '', '', '', '', '44m', '42 hours', '', '', 'Black Rubber Strap', 'Deployment Clasp', '50m', 3, 'hublot02.jpg'),
(35, 'Hublot Spirit of Big Bang', 'Titanium Diamonds 39mm mens Watch 665.NX.1170.RX.1204', 250000, 'Spirit Of Big Bang', '665.NX.1170.RX.1204', 'Square shaped', 'Men', 'Automatic', 'Black sapphire', 'Titanium with 50 brilliant cut white Diamonds', 'Scratch Resistant Sapphire', 'HUB 1710', '', 'Self-Winding', '', '39m', '50 hours', '', '', 'Black Rubber', 'Deployment Clasp', '100m', 3, 'huublot.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `watchid` (`watchid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `Customer_Email_UNIQUE` (`customer_email`),
  ADD UNIQUE KEY `Customer_PhoneNum_UNIQUE` (`customer_phonenumber`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `key1_idx` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `key2_idx` (`order_id`),
  ADD KEY `key22_idx` (`watch_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `wristwatches`
--
ALTER TABLE `wristwatches`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `key4_idx` (`brand_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `wristwatches`
--
ALTER TABLE `wristwatches`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`watchid`) REFERENCES `wristwatches` (`watch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `state_key` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `key1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `key2` FOREIGN KEY (`order_id`) REFERENCES `customer_orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key22` FOREIGN KEY (`watch_id`) REFERENCES `wristwatches` (`watch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wristwatches`
--
ALTER TABLE `wristwatches`
  ADD CONSTRAINT `key4` FOREIGN KEY (`brand_Id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
