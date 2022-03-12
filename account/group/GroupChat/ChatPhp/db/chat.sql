-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 07:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`) VALUES
(1, 2, 3, 'hello', '2019-06-16 21:23:33'),
(2, 4, 3, 'hi', '2019-06-16 21:24:28'),
(3, 2, 1, 'hey', '2019-06-16 21:26:13'),
(4, 4, 1, 'hi', '2019-06-16 21:26:32'),
(5, 2, 1, 'dsfsdfds', '2019-06-16 21:51:31'),
(6, 4, 2, 'dfdfdf', '2019-06-16 21:51:53'),
(7, 2, 3, 'sdfsdf', '2019-06-17 20:57:52'),
(8, 2, 1, 'sdfsdf', '2019-06-17 20:57:59'),
(9, 2, 1, 'fuck', '2019-06-17 21:09:02'),
(10, 2, 1, 'fuck', '2019-06-17 21:09:06'),
(11, 2, 1, 'fuck', '2019-06-17 21:09:08'),
(12, 2, 1, 'mother', '2019-06-17 21:09:11'),
(13, 2, 1, 'fucker', '2019-06-17 21:09:13'),
(14, 2, 1, 'ass', '2019-06-17 21:09:16'),
(15, 2, 1, 'penis', '2019-06-17 21:09:19'),
(16, 2, 1, 'fucker', '2019-06-17 21:09:25'),
(17, 2, 1, 'sdfdsfdsf', '2019-06-22 09:40:01'),
(18, 4, 1, 'tttttttttttttttt', '2019-06-22 09:40:11'),
(19, 2, 1, 'hello', '2019-06-22 09:41:33'),
(20, 5, 1, 'Helllo', '2019-06-22 09:41:48'),
(21, 6, 1, 'dave  dee', '2019-06-22 10:22:45'),
(22, 2, 5, 'Hello Guyz!', '2019-06-22 10:40:56'),
(23, 7, 5, 'Hi', '2019-06-22 10:41:52'),
(24, 7, 5, 'Whats the plan!', '2019-06-22 10:41:59'),
(25, 2, 5, 'We are planning this monday!', '2019-06-22 10:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(1, 'My First Chat Room', '2017-09-11 13:20:18', 'pass', 2),
(2, 'Free Entrance :)', '2017-09-11 13:20:51', '', 3),
(3, 'Admin Chat Room', '2017-09-11 13:21:24', '', 1),
(5, 'Trekking Group', '2019-06-22 10:40:49', 'pk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 1),
(4, 3, 2),
(5, 3, 4),
(6, 1, 4),
(7, 1, 3),
(8, 1, 1),
(9, 2, 4),
(10, 3, 5),
(11, 3, 5),
(12, 1, 5),
(13, 1, 6),
(14, 3, 6),
(15, 2, 6),
(17, 5, 2),
(18, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `uname`, `photo`, `access`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '', 1),
(2, 'pn', 'ded0804cf804b6d26e37953dc2dbc505', 'projectnotes', '', 2),
(3, 'julyn', 'bf70c261981e1708530982d56d2e8e01', 'julyn', '', 2),
(4, 'maneestha', 'd7a257eee410a2c83fa460276ebffa07', 'manish', 'upload/note1_1560701285.jpg', 2),
(5, 'james', 'ecda8ff7933831de47cded3bb238b613', 'james', '', 2),
(6, 'dave', '1610838743cc90e3e4fdda748282d9b8', 'dave', '', 2),
(7, 'mkbhd', '1080703961dc81a7d14046689048a5a1', 'mkbhd', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat_member`
--
ALTER TABLE `chat_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
