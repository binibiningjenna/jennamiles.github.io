-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 03:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addressID` int(10) NOT NULL,
  `userInfoID` int(10) NOT NULL,
  `cityID` int(10) NOT NULL,
  `provinceID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `name`) VALUES
(1, 'Silang'),
(9, 'Baguio City'),
(10, 'Malvar'),
(11, 'San Pablo'),
(12, 'Lucena'),
(13, 'San Fernando'),
(14, 'Kalibo');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `userID` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `userInfoID` int(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  `willRemember` varchar(40) NOT NULL,
  `isOnline` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`userID`, `username`, `userInfoID`, `password`, `email`, `phoneNumber`, `willRemember`, `isOnline`) VALUES
(1, 'jennamilesreyes', 1, 'jenna01818', 'jennamiles@gmail.com', '09481542903', 'yes', 'yes'),
(9, 'jomari08', 2, '', '', '', '', ''),
(10, 'jmar19', 3, '', '', '', '', ''),
(11, 'kayegamana', 4, '', '', '', '', ''),
(12, 'jenny09', 5, '', '', '', '', ''),
(13, 'loreen093', 6, '', '', '', '', ''),
(14, 'i_am_yshimae', 7, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `closefriends`
--

CREATE TABLE `closefriends` (
  `closeFriendID` int(10) NOT NULL,
  `ownerID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(10) NOT NULL,
  `dateTime` varchar(40) NOT NULL,
  `content` varchar(300) NOT NULL,
  `userID` int(10) NOT NULL,
  `postID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendID` int(10) NOT NULL,
  `requesterID` int(10) NOT NULL,
  `requesteeID` int(10) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupchatmembers`
--

CREATE TABLE `groupchatmembers` (
  `groupChatMemberID` int(10) NOT NULL,
  `groupChatID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupchats`
--

CREATE TABLE `groupchats` (
  `name` varchar(40) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `theme` varchar(40) NOT NULL,
  `groupChatID` int(10) NOT NULL,
  `adminID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message` varchar(300) NOT NULL,
  `senderID` int(10) NOT NULL,
  `receiverID` int(10) NOT NULL,
  `dateTime` varchar(40) NOT NULL,
  `isRead` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `attachment` varchar(40) NOT NULL,
  `groupChatID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `content` varchar(300) NOT NULL,
  `dateTime` varchar(40) NOT NULL,
  `privacy` varchar(40) NOT NULL,
  `isDeleted` varchar(40) NOT NULL,
  `attachment` varchar(40) NOT NULL,
  `cityID` int(10) NOT NULL,
  `provinceID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `userID`, `content`, `dateTime`, `privacy`, `isDeleted`, `attachment`, `cityID`, `provinceID`) VALUES
(1, 1, 'Dream big. Start small. Act now.', '25-10-24', 'public', 'no', 'photo', 1, 1),
(14, 9, 'Everyday is a new beginning', '', '', '', '', 9, 9),
(15, 10, 'Do something today that your future self will thank you for', '', '', '', '', 10, 10),
(16, 11, 'Success is not the key to happiness. Happiness is the key to success.', '', '', '', '', 11, 11),
(17, 12, 'Stay positive, work hard, make it happen.', '', '', '', '', 12, 12),
(18, 13, 'Great things never come from comfort zones.', '', '', '', '', 13, 13),
(19, 14, 'Dreams are the seeds of possibility that lie within each of us. They challenge us to rise above our fears and limitations, urging us to step into our full potential. Remember, every great achievement began with a dream—nurture yours, believe in yourself, and take that first step towards making them ', '', '', '', '', 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinceID` int(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinceID`, `name`) VALUES
(1, 'Cavite'),
(9, 'Benguet'),
(10, 'Batangas'),
(11, 'Laguna'),
(12, 'Quezon'),
(13, 'Pampanga'),
(14, 'Aklan');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `reactionID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `postID` int(10) NOT NULL,
  `kind` varchar(40) NOT NULL,
  `commentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userInfoID` int(10) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `birthDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userInfoID`, `firstName`, `lastName`, `birthDay`) VALUES
(1, 'Jenna Miles', 'Reyes', '2004-05-18'),
(2, 'Jomari', 'Castillo', '2001-09-08'),
(3, 'Jaymark', 'Reyes', '2008-05-24'),
(4, 'K', 'Gamana', '2004-05-12'),
(5, 'Jennielyn', 'Reyes', '1985-04-09'),
(6, 'Loreen', 'Marajas', '2004-10-15'),
(7, 'Yshimae', 'Reedyoung', '2003-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `closefriends`
--
ALTER TABLE `closefriends`
  ADD PRIMARY KEY (`closeFriendID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendID`);

--
-- Indexes for table `groupchatmembers`
--
ALTER TABLE `groupchatmembers`
  ADD PRIMARY KEY (`groupChatMemberID`);

--
-- Indexes for table `groupchats`
--
ALTER TABLE `groupchats`
  ADD PRIMARY KEY (`groupChatID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`senderID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinceID`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`reactionID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userInfoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addressID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `closefriends`
--
ALTER TABLE `closefriends`
  MODIFY `closeFriendID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupchatmembers`
--
ALTER TABLE `groupchatmembers`
  MODIFY `groupChatMemberID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
  MODIFY `groupChatID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `senderID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinceID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `reactionID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
