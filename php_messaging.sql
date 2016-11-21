-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2016 at 01:58 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `php_messaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userid_recipient` varchar(25) NOT NULL,
  `userid_sender` varchar(25) NOT NULL,
  `message_content` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `userid_recipient`, `userid_sender`, `message_content`) VALUES
(4, 'marid_af', 'coba', 'coba'),
(5, 'marid_af', 'coba', 'aaa'),
(6, 'marid_af', 'coba', 'amsyong'),
(7, 'denny_', 'coba', 'jaran'),
(8, 'denny_', 'coba', 'jaran'),
(9, 'marid_af', 'denny_', 'amsyong'),
(10, 'denny_', 'coba', 'allo'),
(11, 'coba', 'denny_', 'all'),
(12, 'coba', 'marid_af', 'amm'),
(13, 'coba', 'denny_', 'hamsyong'),
(14, 'coba', 'denny_', 'jaran'),
(15, 'coba', 'denny_', 'allo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(25) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `Nama`) VALUES
('coba', '$2y$10$TsCY3bT0Ojb8HkaqLPNAWuApNyfYAm3mf656.s2xChLDdxQWGPMn.', 'asd@asd.com', 'asd'),
('denny_', '$2y$10$7/buiZeFPa9I8a3kOug9Fu7Awcy9CowWVU5xv7A3DUwWq5wdBo3FS', 'dnny@example.com', 'Denny'),
('marid_af', '$2y$10$xNn/CBS52Pnjg0nHTVcBuOSUD2uwkzZdr8XX8O6hLsllS3QUrT1Gy', 'mrd@example.com', 'Marid AF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_recipient` (`userid_recipient`),
  ADD KEY `userid_sender` (`userid_sender`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userid_recipient`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`userid_sender`) REFERENCES `user` (`username`);
