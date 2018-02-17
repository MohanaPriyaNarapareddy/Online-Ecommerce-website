-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2017 at 08:55 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craigslist`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(10) NOT NULL,
  `street` varchar(30) NOT NULL,
  `apt` int(10) NOT NULL,
  `cityID` int(10) NOT NULL,
  `stateID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `street`, `apt`, `cityID`, `stateID`) VALUES
(1, '7720 McCallum Blvd', 2051, 41, 43),
(2, '7720 McCallum Blv', 205, 41, 43),
(3, '7720 McCallum Blv', 205, 41, 43),
(4, '7720 McCallum Blv', 205, 41, 43),
(5, '7720 McCallum Blvd', 435, 41, 43),
(6, '8103 Fenwick Court', 0, 41, 43),
(7, '4567 Coit road', 34, 41, 43),
(8, '4567 Coit road', 34, 41, 43),
(9, '4560 Preston Road', 0, 41, 43),
(10, 'Main Street', 0, 41, 43),
(11, '21, Frankford Road', 234, 41, 43),
(12, '7720 McCallum Blvd', 0, 41, 43),
(13, '456 Frankford Road,', 0, 41, 43),
(14, '3456 Coit Road', 0, 41, 43),
(15, '435 Coit Road', 0, 41, 43),
(16, '456 Springcreek Road', 0, 41, 43),
(17, '497 Preston Road', 0, 41, 43),
(18, '4567 Preston Road', 0, 41, 43),
(19, '3345 W. Campbell Road', 0, 41, 43),
(20, '234 E.Campbell Road', 0, 41, 43);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `postID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `sectionID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_folderpath` varchar(200) DEFAULT NULL,
  `img_name` varchar(200) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `addressID` int(10) DEFAULT NULL,
  `postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `contactinfo` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not_approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`postID`, `userID`, `sectionID`, `title`, `description`, `img_folderpath`, `img_name`, `latitude`, `longitude`, `addressID`, `postedon`, `updatedon`, `contactinfo`, `status`) VALUES
(1, 1, 1, 'dvfsdggfhjhjkdgafd', 'lsakmcx;ldskjfnkhfkuewthgikdsuhcinkauhi', 'C:.-MAMP.-htdocs.-craiglist.-imagescr-_', 'craiglist_homepage1111272017044310-_-png', '32.9876595', '-96.773997', 1, '2017-11-27 04:43:10', '2017-12-04 03:17:14', '0', 'active'),
(2, 1, 18, 'dclkdjnvkfldnvfeknglkfsnmgglkrgsnm', 'kjsnclkdsjnalknfkajf37584986u29485294869u69486u8953p8u6', 'C:.-MAMP.-htdocs.-craiglist.-imagescr-_', '221811272017044630-_-png', '32.9876595', '-96.773997', 1, '2017-11-27 04:46:30', '2017-12-04 06:23:36', 'Name: adit<br/>Email: adesai_1995@yahoo.in<br/>Con', 'active'),
(3, 1, 3, 'Polio Vaccines Available', 'Hey Everyone,\r\nI am giving away free polio vaccinations in my clinic.\r\nMy clinic is located in Sachse.\r\nI recommend every parent of new born to visit my place, so that we can eradicate it.\r\n', 'C:.-MAMP.-htdocs.-craiglist.-imagescr-_', 'DSC_1092-12_1312012017013806-_-jpg', '32.9945353', '-96.5941222', 6, '2017-12-01 01:38:06', '2017-12-02 10:07:50', 'Name: Anuja<br/>Email: anuja@gmail.com<br/>Contact: 9716783409', 'active'),
(4, 3, 19, 'Parking needed', 'Parking Needed.\r\nlakjndcklsjfdngvlkfjdnvlksjfdnvlkjs,\r\nlKHBDSJWAKNFLKREJSNGFRLKJFKJLFDNBLKJGDNFBLKJFSN\r\n24R435785769865769865\r\nLKAJNSCLKDSJNVLKFJNBLGRKNJVLKADN\r\nkjsdnckjnvfkjnbkgrjngkjdnvfkdlnvlkfdsn.', NULL, NULL, '32.7813791', '-96.7969224', 10, '2017-12-03 07:39:56', '2017-12-03 07:42:40', 'Name: john hutton<br/>Email: jhutton@rty.vom<br/>Contact: 4567893456', 'active'),
(5, 0, 3, 'PAging Check 2', 'lkdnsvlkfdnvfdsjnv\r\ndlvkjnfdlvkjfdlkbjdgb\r\nvslkdjvnfsldijvmrldfjbdlgkfnjvfds', NULL, NULL, '32.9732677', '-96.679208', 19, '2017-12-04 08:52:51', '2017-12-04 08:54:03', 'Name: zxcv<br/>Email: waed@reg.com<br/>Contact: 3456789876', 'active'),
(6, 0, 3, 'Checking Paging 3', 'dscds,jcn dks.ncm\r\nscnalkdsjbckjehbvkjrebvlkead \r\nxWKSAYXBKSANCLIEAKDSNCLRE', NULL, NULL, '32.9795976', '-96.6310505', 20, '2017-12-04 08:53:52', '2017-12-04 08:54:13', 'Name: ASDDSF<br/>Email: SAD@CSKJNC.COM<br/>Contact: 2345678765', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(10) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `category`) VALUES
(1, 'community'),
(2, 'housing'),
(3, 'for sale'),
(4, 'personals'),
(5, 'jobs'),
(6, 'gigs'),
(7, 'services'),
(8, 'resumes'),
(9, 'events');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `stateID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `city`, `stateID`) VALUES
(1, 'Montgomery', 1),
(2, 'Birmingham', 1),
(3, 'Juneau', 2),
(4, 'Anchorage', 2),
(5, 'Phoenix', 3),
(6, 'Little Rock', 4),
(7, 'Sacremento', 5),
(8, 'Los Angeles', 5),
(9, 'Denver', 6),
(10, 'Hartford', 7),
(11, 'Bridgeport', 7),
(12, 'Dover', 8),
(13, 'Wilmington', 8),
(14, 'Tallahassee', 9),
(15, 'Jacksonville', 9),
(16, 'Atlanta', 10),
(17, 'Honolulu', 11),
(18, 'Boise', 12),
(19, 'Springfield', 13),
(20, 'Chicago', 13),
(21, 'Indianapolis', 14),
(22, 'Des Moines', 15),
(23, 'Topeka', 16),
(24, 'Wichita', 16),
(25, 'Frankfort', 17),
(26, 'Louisville', 17),
(27, 'Baton Rouge', 18),
(28, 'New Orleans', 18),
(29, 'Augusta', 19),
(30, 'Portland', 19),
(31, 'Annapolis', 20),
(32, 'Baltimore', 20),
(33, 'Boston', 21),
(34, 'Lansing', 22),
(35, 'Detroit', 22),
(36, 'St. Paul', 23),
(37, 'Minneapolis', 23),
(38, 'Jackson', 24),
(39, 'Jefferson City', 25),
(40, 'Kansas City', 25),
(41, 'Dallas', 43);

-- --------------------------------------------------------

--
-- Table structure for table `forums_qa`
--

CREATE TABLE `forums_qa` (
  `postID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `sectionID` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `posttype` int(1) NOT NULL,
  `replyto` int(10) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `raterid` int(10) DEFAULT NULL,
  `flags` tinyint(1) DEFAULT NULL,
  `flaguserID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_gigs`
--

CREATE TABLE `jobs_gigs` (
  `postID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `sectionID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL,
  `addressID` int(10) DEFAULT NULL,
  `postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `contactinfo` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not_approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_gigs`
--

INSERT INTO `jobs_gigs` (`postID`, `userID`, `sectionID`, `title`, `description`, `latitude`, `longitude`, `addressID`, `postedon`, `updatedon`, `contactinfo`, `status`) VALUES
(1, 3, 29, 'Comedy Club', 'Hey guys,\r\nI am posting this gig on behalf of Comedy Club of Dallas.\r\n\r\nWe are organizing an event - a roast for ages 15 up. The event will happen in Omni Hotel Dallas.\r\nThe dates are from 20 Dec to 25 Dec 2017.\r\n\r\nTickets are available on atom and different other websites.\r\nHope to see you there.', '32.8249731', '-96.8033622', 9, '2017-12-03 07:17:04', '2017-12-04 03:26:38', 'Name: Adit<br/>Email: adesai@yahoo.in<br/>Contact:', 'active'),
(2, 1, 31, 'Personal Asst Needed', 'I am looking for someone who can do anything needed, when needed. If you feel that is you, please send photo and resume immediately.\r\ndo NOT contact me with unsolicited services or offers.\r\n\r\nCompensation upto 2k per week', '32.9876595', '-96.773997', 12, '2017-12-04 06:03:59', '2017-12-04 06:23:17', 'Name: Adit<br/>Email: adesai@yahoo.in<br/>Contact: 4567890983', 'active'),
(3, 1, 31, 'Secretary needed now', 'Please be into secretary outfits. Please send pics, \r\nready to play in the morning and a few days a week. Send info quickly please\r\ndo NOT contact me with unsolicited services or offers\r\n\r\nCompensation upto 2000$/weekly', '32.9981192', '-96.8141379', 13, '2017-12-04 06:06:04', '2017-12-04 06:23:24', 'Name: Aditya<br/>Email: asangvi@gmail.com<br/>Contact: 2345678903', 'active'),
(4, 1, 31, 'Female modeling opportunity (Addison)', 'Hello. I am in need of a couple female models . No modeling experience is necessary. If you are interested please send a little information about yourself and a couple sample shots. Compensation is based on type of shoot. Thank you\r\ndo NOT contact me with unsolicited services or offers.', '32.9411323', '-96.6889356', 16, '2017-12-04 06:20:02', '2017-12-04 06:23:30', 'Name: aman<br/>Email: amanpatel@yahoo.com<br/>Contact: 2345676980', 'active'),
(5, 1, 31, 'Extras Wanted Music Vid Nov 9 (Dallas)', 'video shoot november 9 anybody interested in attending the shoot is welcome email me for details. Note: this is not a paid gig.\r\ndo NOT contact me with unsolicited services or offers', '32.9182213', '-96.8035305', 17, '2017-12-04 06:22:02', '2017-12-04 06:23:12', 'Name: Aatman Patel<br/>Email: aatman@yahoo.com<br/>Contact: 2345679808', 'active'),
(6, 0, 31, 'Check Pagination', 'HI HELLO', '32.8249973', '-96.8033639', 18, '2017-12-04 08:48:48', '2017-12-04 08:48:57', 'Name: qwe<br/>Email: qwe@gmail.com<br/>Contact: 2345678908', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(10) NOT NULL,
  `section` varchar(30) NOT NULL,
  `categoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `section`, `categoryID`) VALUES
(1, 'activities', 1),
(2, 'artists', 1),
(3, 'childcare', 1),
(4, 'classes', 1),
(5, 'events', 1),
(6, 'general', 1),
(7, 'groups', 1),
(8, 'local news', 1),
(9, 'lost+found', 1),
(10, 'musicians', 1),
(11, 'pets', 1),
(12, 'politics', 1),
(13, 'rideshare', 1),
(14, 'volunteers', 1),
(15, 'apts / housing', 2),
(16, 'housing swap', 2),
(17, 'housing wanted', 2),
(18, 'office/commercial', 2),
(19, 'parking/storage', 2),
(20, 'real estate for sale', 2),
(21, 'rooms/shared', 2),
(22, 'rooms wanted', 2),
(23, 'sublets/temporary', 2),
(24, 'vacation rentals', 2),
(25, 'computer', 6),
(26, 'creative', 6),
(27, 'crew', 6),
(28, 'domestic', 6),
(29, 'event', 6),
(30, 'labor', 6),
(31, 'talent', 6),
(32, 'writing', 6);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateID` int(10) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateID`, `state`) VALUES
(1, 'Alabama'),
(2, 'Alaska'),
(3, 'Arizona'),
(4, 'Arkansas'),
(5, 'California'),
(6, 'Colorado'),
(7, 'Connecticut'),
(8, 'Delaware'),
(9, 'Floride'),
(10, 'Georgia'),
(11, 'Hawaii'),
(12, 'Idaho'),
(13, 'Illinois'),
(14, 'Indiana'),
(15, 'Iowa'),
(16, 'Kansas'),
(17, 'Kentucky'),
(18, 'Louisiana'),
(19, 'Maine'),
(20, 'Maryland'),
(21, 'Massachusetts'),
(22, 'Michigan'),
(23, 'Minnesota'),
(24, 'Mississippi'),
(25, 'Missouri'),
(26, 'Montana'),
(27, 'Nebraska'),
(28, 'Nevada'),
(29, 'New Hampshire'),
(30, 'New Jersey'),
(31, 'New Mexico'),
(32, 'New York'),
(33, 'North Carolina'),
(34, 'North Dakota'),
(35, 'Ohio'),
(36, 'Oklahoma'),
(37, 'Oregan'),
(38, 'Pennysylvania'),
(39, 'Rhode Island'),
(40, 'South Carolina'),
(41, 'South Dakota'),
(42, 'Tennessee'),
(43, 'Texas'),
(44, 'Utah'),
(45, 'Vermont'),
(46, 'Virginia'),
(47, 'Washington'),
(48, 'West Virginia'),
(49, 'Wisconsin'),
(50, 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `addressID` int(10) NOT NULL,
  `contact` int(11) NOT NULL,
  `usertypeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `emailid`, `password`, `addressID`, `contact`, `usertypeID`) VALUES
(1, 'VR', 'aditdesa', 'adesai_1995@yahoo.i', 'aditdesai', 4, 1234567890, 2),
(2, 'adit', 'adit', 'adesai_1995@yahoo.in', 'qwerty', 4, 469805760, 1),
(3, 'john', 'john', 'john@gmail.com', 'qwertyuio', 7, 2147483647, 2),
(4, 'aashna', 'aashnap', 'aashna@tech.com', 'qwerty', 11, 2147483647, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeID` int(1) NOT NULL,
  `user-type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeID`, `user-type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `postID` int(10) NOT NULL,
  `tableID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlID`, `userID`, `postID`, `tableID`) VALUES
(8, 1, 1, 1),
(9, 1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `stateID` (`stateID`);

--
-- Indexes for table `forums_qa`
--
ALTER TABLE `forums_qa`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `jobs_gigs`
--
ALTER TABLE `jobs_gigs`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `postID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `jobs_gigs`
--
ALTER TABLE `jobs_gigs`
  MODIFY `postID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`stateID`) REFERENCES `state` (`stateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
