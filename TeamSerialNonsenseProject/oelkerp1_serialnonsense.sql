-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 06:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oelkerp1_serialnonsense`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparel`
--

CREATE TABLE `apparel` (
  `ProID` varchar(10) NOT NULL,
  `Type` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apparel`
--

INSERT INTO `apparel` (`ProID`, `Type`) VALUES
('01', 'T-Shirt'),
('02', 'T-Shirt'),
('03', 'T-Shirt'),
('04', 'T-Shirt'),
('05', 'T-Shirt'),
('06', 'T-Shirt'),
('07', 'T-Shirt'),
('08', 'T-Shirt'),
('09', 'Mask'),
('17', 'Hoodie'),
('18', 'Hoodie'),
('19', 'Hoodie'),
('20', 'Hoodie'),
('21', 'Hoodie');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ProID` varchar(10) NOT NULL,
  `AName` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ProID`, `AName`) VALUES
('22', 'Joy Chappell'),
('24', 'Hot Nuggs'),
('24', 'Steel Bucket'),
('25', 'Hot Nuggs'),
('25', 'Steel Bucket'),
('26', 'Hot Nuggs'),
('26', 'Steel Bucket'),
('27', 'Hot Nuggs'),
('27', 'Steel Bucket'),
('28', 'Hot Nuggs'),
('28', 'Steel Bucket'),
('29', 'Hot Nuggs'),
('29', 'Steel Bucket'),
('30', 'Hot Nuggs'),
('30', 'Steel Bucket');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ProID` varchar(10) NOT NULL,
  `Pages` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ProID`, `Pages`) VALUES
('22', 328);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Uname` varchar(30) NOT NULL,
  `NumInCart` int(11) NOT NULL,
  `ProID` varchar(10) NOT NULL,
  `RNum` int(11) DEFAULT NULL,
  `Quant` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Uname`, `NumInCart`, `ProID`, `RNum`, `Quant`) VALUES
('davinky', 1, '24', NULL, 2),
('davinky', 0, '22', NULL, 50),
('kirin_stan', 0, '24', NULL, 2),
('EverettFan', 1, '23', 19, 1),
('', 0, '23', 18, 1),
('EverettFan', 0, '13', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE `comic` (
  `ProID` varchar(10) NOT NULL,
  `Issue` int(11) DEFAULT NULL,
  `Volume` int(11) NOT NULL,
  `Title` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`ProID`, `Issue`, `Volume`, `Title`) VALUES
('24', 1, 1, 'Fall from Grace'),
('25', 2, 1, 'A New Recruit'),
('26', 3, 1, 'Breaking the Silence'),
('27', 4, 1, 'Missed Opportunity'),
('28', 5, 1, 'Sense of Danger'),
('29', 6, 1, 'Just Like Us'),
('30', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Uname` varchar(30) NOT NULL,
  `PassW` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Uname`, `PassW`, `FullName`, `Email`) VALUES
('EverettFan', 'maclunkey456', 'Decon Stan', 'stand@gmail.com'),
('newuser', 'pies', 'Steven', 'stand@gmail.com'),
('NewGuy', 'something', 'Jim', 'nguy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `OrderID` int(11) NOT NULL,
  `ProID` varchar(10) NOT NULL,
  `ItemNum` int(11) NOT NULL,
  `RNum` int(11) DEFAULT NULL,
  `Qt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`OrderID`, `ProID`, `ItemNum`, `RNum`, `Qt`) VALUES
(0, '03', 0, NULL, 2),
(9, '23', 1, 14, 1),
(9, '04', 0, NULL, 2),
(17, '01', 0, NULL, 2),
(16, '11', 0, NULL, 2),
(0, '01', 6, NULL, 2),
(1, '28', 0, NULL, 3),
(1, '05', 1, NULL, 2),
(2, '01', 0, NULL, 50),
(4, '01', 0, NULL, 4),
(5, '23', 0, 5, 1),
(6, '07', 0, NULL, 3),
(7, '23', 0, 9, 1),
(8, '23', 0, 6, 1),
(8, '23', 1, 7, 1),
(8, '23', 2, 8, 1),
(8, '23', 3, 10, 1),
(8, '23', 4, 11, 1),
(8, '23', 5, 12, 1),
(8, '23', 6, 13, 1),
(10, '01', 0, NULL, 1),
(10, '20', 1, NULL, 1),
(10, '16', 2, NULL, 1),
(11, '10', 0, NULL, 1),
(14, '24', 0, NULL, 2),
(14, '10', 1, NULL, 1),
(14, '22', 2, NULL, 3),
(14, '11', 3, NULL, 1),
(15, '24', 0, NULL, 2),
(15, '10', 1, NULL, 1),
(15, '22', 2, NULL, 3),
(15, '11', 3, NULL, 1),
(17, '23', 1, 16, 1),
(19, '05', 0, NULL, 2),
(19, '22', 1, NULL, 1),
(20, '28', 1, NULL, 2),
(20, '23', 2, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `TimeOfOrder` timestamp NOT NULL DEFAULT current_timestamp(),
  `Uname` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `DateSent` date DEFAULT NULL,
  `DateDelivered` date DEFAULT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`TimeOfOrder`, `Uname`, `Address`, `DateSent`, `DateDelivered`, `OrderID`) VALUES
('2021-05-14 00:08:34', 'EverettFan', '101 Crest Road', NULL, NULL, 0),
('2021-05-10 23:39:42', 'EverettFan', '101 Crest Road', NULL, NULL, 1),
('2021-05-10 23:43:05', 'EverettFan', '101 Crest Road', NULL, NULL, 2),
('2021-05-10 23:43:44', 'EverettFan', '101 Crest Road', NULL, NULL, 3),
('2021-05-10 23:55:06', 'EverettFan', '101 Crest Road', NULL, NULL, 4),
('2021-05-11 02:19:30', 'EverettFan', '3 Van Auken Road', NULL, NULL, 5),
('2021-05-11 03:54:35', 'kirin_stan', '123 test rd', NULL, NULL, 6),
('2021-05-11 05:26:49', 'null', '{}', NULL, NULL, 7),
('2021-05-11 21:21:48', 'Daddy', '4 father\'s lane', NULL, NULL, 8),
('2021-05-14 00:15:44', 'EverettFan', '3 Van Auken Road', NULL, NULL, 9),
('2021-05-16 04:32:56', 'EverettFan', '3 Van Auken Road', NULL, NULL, 10),
('2021-05-16 16:54:25', 'zacharyc927', 'the home of zachie', NULL, NULL, 11),
('2021-12-01 22:55:19', 'EverettFan', '3 Van Auken Road', NULL, NULL, 12),
('2021-12-01 22:57:29', 'EverettFan', '3 Van Auken Road', NULL, NULL, 13),
('2021-12-01 22:58:38', 'EverettFan', '3 Van Auken Road', NULL, NULL, 14),
('2021-12-01 23:05:26', 'EverettFan', 'my big blimbus', NULL, NULL, 15),
('2021-12-07 18:52:11', 'EverettFan', '3 Van Auken Road', NULL, NULL, 16),
('2021-12-09 21:46:25', 'EverettFan', 'my small smigmus', NULL, NULL, 17),
('2021-12-09 21:48:02', 'EverettFan', 'my big blimbus', NULL, NULL, 18),
('2021-12-12 17:44:14', 'newuser', 'newuser\'s address', NULL, NULL, 19),
('2021-12-14 02:29:18', 'NewGuy', '1 Little House Road, New York, New York 77777', NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Username` varchar(30) NOT NULL,
  `PW` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Username`, `PW`, `Email`) VALUES
('HotNuggs', 'lD½áì¹Ô²»ê\Z:¯¹', 'oelkersp1@mail.montclair.edu'),
('SteelBucket', '[ð‹c:½éîN X„x4@K;öø¾^\'‘Â×Jˆ\\Òí', 'gdltorre@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `ProID` varchar(10) NOT NULL,
  `Width` float NOT NULL,
  `Height` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`ProID`, `Width`, `Height`) VALUES
('10', 10.125, 18),
('11', 18, 10.125),
('12', 18, 10.125),
('13', 18, 10.125),
('14', 10.125, 18),
('15', 18, 10.125),
('16', 18, 10.125);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProID` varchar(10) NOT NULL,
  `Price` decimal(12,2) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `ProDes` varchar(250) DEFAULT NULL,
  `Qty` int(11) NOT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `Image` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `Price`, `Name`, `ProDes`, `Qty`, `Brand`, `Image`) VALUES
('01', '20.00', 'Everett Thorne T-Shirt', 'T-shirt with the main protagonist of Bitter End in a cool shaded style! Artwork by Hot Nuggs.', 50, 'Bitter End', 'ts01.jpg'),
('02', '15.99', 'Synadel T-Shirt', 'T-shirt with each member of the Syndel in their featured color! Artwork by Hot Nuggs, image provided by CustomInk.', 50, 'Bitter End', 'ts02.jpg'),
('03', '15.99', 'Cityscape T-Shirt', 'T-shirt with Everett and Kirin patrolling town at night! Artwork by Hot Nuggs, image provided by CustomInk.', 50, 'Bitter End', 'ts03.jpg'),
('04', '15.99', 'Night Sky T-Shirt', 'T-shirt depicting Everett and his struggle. Artwork by Hot Nuggs, image provided by CustomInk.', 48, 'Bitter End', 'ts04.jpg'),
('05', '15.99', 'Blingo T-Shirt', 'T-shirt with our mascot, Blingo! Artwork by Hot Nuggs, image provided by CustomInk.', 48, 'Serial Nonsense', 'ts05.jpg'),
('06', '15.99', 'Hot Nuggs T-Shirt', 'T-shirt with co-creator of Serial Nonsense, Hot Nuggs! Artwork by Hot Nuggs, image provided by CustomInk.', 50, 'Serial Nonsense', 'ts06.jpg'),
('07', '15.99', 'Steel Bucket T-Shirt', 'T-shirt with co-creator of Serial Nonsense, Steel Bucket! Artwork by Hot Nuggs, image provided by CustomInk.', 47, 'Serial Nonsense', 'ts07.jpg'),
('08', '15.99', 'Serial Nonsense T-Shirt', 'T-shirt with our logo! Logo by Hot Nuggs, image provided by CustomInk.', 50, 'Serial Nonsense', 'ts08.jpg'),
('09', '6.99', 'Cult Face Mask', 'Cloth face mask featuring the design of the masks of the antagonists from Bitter End! Artwork by Hot Nuggs, image provided by CustomInk.', 100, 'Bitter End', 'm09.jpg'),
('10', '10.99', 'Everett Thorne Poster', 'Poster with the main protagonist of Bitter End in a cool shaded style! Artwork by Hot Nuggs.', 72, 'Bitter End', 'p10.jpg'),
('11', '10.99', 'Synadel Poster', 'Poster with each member of the Syndel in their featured color! Artwork by Hot Nuggs.', 71, 'Bitter End', 'p11.jpg'),
('12', '10.99', 'New Synadel Poster', 'Poster with members new and old of the Syndel in their featured color! Artwork by Hot Nuggs.', 75, 'Bitter End', 'p12.jpg'),
('13', '10.99', 'Masked Villains Poster', 'Poster with the antagonists of Bitter End with their mask, as well as what may be underneath! Artwork by Hot Nuggs.', 75, 'Bitter End', 'p13.jpg'),
('14', '10.99', 'Unmasked Villains Poster', 'Poster with the antagonists of Bitter End, without any masks! Artwork by Hot Nuggs.', 75, 'Bitter End', 'p14.jpg'),
('15', '10.99', 'Night Sky Poster', 'Poster depicting Everett and his struggle! Artwork by Hot Nuggs.', 75, 'Bitter End', 'p15.jpg'),
('16', '10.99', 'Cityscape Poster', 'Poster with Everett and Kirin patrolling town at night! Artwork by Hot Nuggs.', 74, 'Bitter End', 'p16.jpg'),
('17', '24.99', 'Everett Thorne Hoodie', 'Hoodie with the main protagonist of Bitter End in a cool shaded style! Artwork by Hot Nuggs, image provided by CustomInk.', 30, 'Bitter End', 'h17.jpg'),
('18', '24.99', 'Hot Nuggs Hoodie', 'Hoodie with co-creator of Serial Nonsense, Hot Nuggs! Artwork by Hot Nuggs, image provided by CustomInk.', 30, 'Serial Nonsense', 'h18.jpg'),
('19', '24.99', 'Steel Bucket Hoodie', 'Hoodie with co-creator of Serial Nonsense, Steel Bucket! Artwork by Hot Nuggs, image provided by CustomInk.', 30, 'Serial Nonsense', 'h19.jpg'),
('20', '24.99', 'Blingo Hoodie', 'Hoodie with our mascot, Blingo! Artwork by Hot Nuggs, image provided by CustomInk.', 29, 'Serial Nonsense', 'h20.jpg'),
('21', '24.99', 'Serial Nonsense Hoodie', 'Hoodie with our logo! Logo by Hot Nuggs, image provided by CustomInk.', 30, 'Bitter End', 'h21.jpg'),
('22', '12.99', 'Hero Up', 'Novel spot-lighted for our good friend! Written by Joy Chappell with cover art by krrjuus', 17, NULL, 'b22.jpg'),
('23', '39.99', 'Drawing Request', 'Want me to draw something? Let me know what you want and I can get cracking for your viewing pleasure!', 7, NULL, 'r23.jpg'),
('24', '11.99', 'Bitter End: Issue 1', 'Issue one of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 56, 'Bitter End', 'c24.jpg'),
('25', '11.99', 'Bitter End: Issue 2', 'Issue two of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 60, 'Bitter End', 'c25.jpg'),
('26', '11.99', 'Bitter End: Issue 3', 'Issue three of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 60, 'Bitter End', 'c26.jpg'),
('27', '11.99', 'Bitter End: Issue 4', 'Issue four of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 60, 'Bitter End', 'c27.jpg'),
('28', '11.99', 'Bitter End: Issue 5', 'Issue five of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 58, 'Bitter End', 'c28.jpg'),
('29', '11.99', 'Bitter End: Issue 6', 'Issue six of Bitter End! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 59, 'Bitter End', 'c29.jpg'),
('30', '20.99', 'Bitter End: Volume 1', 'The first six issues of Bitter End, all in one place! Artwork by Hot Nuggs, story by Hot Nuggs and Steel Bucket.', 59, 'Bitter End', 'c30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ProID` varchar(10) NOT NULL,
  `RNum` int(11) NOT NULL,
  `ReqDes` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ProID`, `RNum`, `ReqDes`) VALUES
('23', 1, 'dummy request'),
('23', 0, 'a monkey that is a cop'),
('23', 2, 'a monkey with a cool hat'),
('23', 3, 'me'),
('23', 4, 'a funny boy'),
('23', 5, 'world\'s largest hot dog bun'),
('23', 6, 'a very large, very cute, arachnid '),
('23', 7, 'serveral pieces of cheese that are eating smaller pieces of cheese'),
('23', 8, 'an orangutan in a man-kini  '),
('23', 9, 'I desire a handcrafted image of yourself stroking my eyelashes.'),
('23', 10, 'you showering in the morning '),
('23', 11, 'Matthew Burnett as a \"cool\" Catholic priest from the 80s '),
('23', 12, 'a fanfic comic of Birth of a Nation'),
('23', 13, 'a castle that contain nothing of any consequence '),
('23', 14, 'canary chewing a gumball'),
('23', 15, 'freddy coogar'),
('23', 16, 'flongus'),
('23', 17, 'a penguin'),
('23', 18, ''),
('23', 19, 'my dad'),
('23', 20, 'a digital world');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparel`
--
ALTER TABLE `apparel`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ProID`,`AName`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Uname`,`NumInCart`),
  ADD KEY `ProID` (`ProID`),
  ADD KEY `RNum` (`RNum`);

--
-- Indexes for table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Uname`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`OrderID`,`ItemNum`),
  ADD KEY `ProID` (`ProID`),
  ADD KEY `RNum` (`RNum`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`TimeOfOrder`),
  ADD KEY `Uname` (`Uname`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RNum`),
  ADD KEY `ProID` (`ProID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Set main database user
--
GRANT ALL
ON oelkerp1_serialnonsense.*
TO oelkersp1@localhost
IDENTIFIED BY 'blingoishere963'; 