-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 04:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bullbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `catName`) VALUES
(1, 'Immovables'),
(2, 'Auto'),
(3, 'House Facility'),
(4, 'Technics');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `postID`, `imageName`) VALUES
(1, 2, '2-1'),
(2, 2, '2-2'),
(13, 2, '2-3'),
(21, 2, '2-4'),
(69, 26, '26-1'),
(70, 26, '26-2'),
(71, 26, '26-3'),
(72, 26, '26-4'),
(73, 26, '26-5'),
(74, 27, '27-1'),
(75, 27, '27-2'),
(76, 27, '27-3'),
(77, 27, '27-4'),
(78, 27, '27-5'),
(139, 30, '30-1'),
(140, 30, '30-2'),
(141, 30, '30-3'),
(142, 30, '30-4'),
(143, 30, '30-5'),
(144, 30, '30-6'),
(145, 31, '31-1'),
(146, 31, '31-2'),
(147, 31, '31-3'),
(148, 31, '31-4'),
(149, 31, '31-5'),
(150, 31, '31-6');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(1255) CHARACTER SET utf8 NOT NULL,
  `catID` int(11) NOT NULL,
  `subCatID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `region` varchar(60) NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `photoCount` int(11) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `title`, `Description`, `catID`, `subCatID`, `price`, `userID`, `postDate`, `region`, `city`, `photoCount`, `address`) VALUES
(1, 'Daewoo Matiz 2016, YAngi', 'Karochi moshniy. 30min km yurgan.', 2, 1, 5000, 1, '2017-05-01 00:00:00', 'Tashkent', '', 0, ''),
(2, 'Samsung Galaxy Tab 2', '5 yil bo\'ldi ishllatvonimga, haliyam yengidey!!', 4, 7, 150, 1, '2017-05-02 00:00:00', 'Tashkent', '', 0, ''),
(3, 'LG LTE2', '2 yil bo\'ldi ishllatvonimga, haliyam yengidey!! KELISHAMIZ!!!', 4, 7, 220, 2, '2017-05-03 00:00:00', 'Navoiy', '', 0, ''),
(4, 'TESTTESTTEST', 'DESCRIPTIsdfs', 1, 2, 1234, 2, '2017-04-30 00:00:00', 'Farg\'ona', '', 0, ''),
(7, 'asdasd', 'qwertytiop', 1, 3, 1000, 2, '2017-05-04 00:00:00', 'Tashkent', '', 0, ''),
(8, 'asdasda', 'skjdhajihdkjasdjkh', 2, 4, 1002, 3, '2017-05-05 00:00:00', 'Tashkent', '', 0, ''),
(9, 'asdasda222', '219837981dshfjksdjh', 1, 4, 20012, 3, '2017-05-06 00:00:00', 'Tashkent', '', 0, ''),
(12, 'qweryui', 'poiuytreweruiiuytrertyui', 2, 3, 1234, 3, '0000-00-00 00:00:00', 'Namangan', '', 0, ''),
(26, 'qweryui', 'poiuytreweruiiuytrertyui', 2, 3, 1234, 3, '0000-00-00 00:00:00', 'Andijon', '', 0, ''),
(27, 'qweryui', 'poiuytreweruiiuytrertyui', 2, 3, 1234, 3, '0000-00-00 00:00:00', '', '', 0, ''),
(30, 'GRUGLALFD', 'GRUGLALFDLFLLVLLLBLABLABLAGRUGLALFDLFLLVLLLBLABLABLA', 2, 1, 1002, 14, '2017-05-09 15:25:39', 'Qoqon', 'Fergana region', 6, ' Malikrabbod 13-kv'),
(31, 'GRUGLALFD', 'GRUGLALFDLFLLVLLLBLABLABLAGRUGLALFDLFLLVLLLBLABLABLA', 2, 1, 1002, 14, '2017-05-09 15:27:35', 'Qoqon', 'Fergana region', 6, ' Malikrabbod 13-kv');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subCatID` int(11) NOT NULL,
  `subCatName` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subCatID`, `subCatName`, `catID`) VALUES
(1, 'Passenger Cars', 2),
(2, 'Trucks', 2),
(3, 'Motorcycles', 2),
(4, 'Flats', 1),
(5, 'Detached houses', 1),
(6, 'Furniture', 3),
(7, 'Mobile Devices', 4),
(8, 'Laptops', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Contacts` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warnings` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `psw` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `Location`, `Contacts`, `isAdmin`, `registerDate`, `warnings`, `mail`, `psw`) VALUES
(1, 'Shakhobiddin', 'Urmanov', 'Tashkent', '998935360380', 1, '2017-05-06 00:00:00', 0, '', ''),
(2, 'Sherzod', 'Niyazov', 'Navoi', '998932228591', 0, '2017-05-03 00:00:00', 0, '', ''),
(3, 'Javohir', 'Hazrat', 'Namangan', '998937777777', 0, '2017-05-01 00:00:00', 0, '', ''),
(4, 'Abdurakhmon', 'Kadyrov', 'Andijan', '998932390461', 0, '2017-05-02 00:00:00', 0, '', ''),
(5, 'Jasurbek', 'Nabijonov', 'Andijon', '998977144138', 0, '2017-05-04 00:00:00', 0, '', ''),
(8, 'Shoxrux', 'Kimsanov', 'Fergana', '998933575346', 0, '2017-05-08 12:46:06', 0, '', ''),
(14, 'Abcde', 'Edbcdc', 'Marokanda', '998931234567', 0, '2017-05-08 13:37:30', 0, 'sh0301@mail.ru', '5edde56fad0da25fd7c74bfba181145a'),
(24, 'Jasurbek', 'Nabijonov', 'Marokanda', '998931234567', 0, '2017-05-08 17:39:32', 0, 'jasur@mail.ru', 'd53b754b99ad70dcdf21a8ac6cb78af4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postID_2` (`postID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subCatID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `catID_2` (`catID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subCatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `posts` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `categories` (`catID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
