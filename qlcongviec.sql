-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcongviec`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanban`
--

CREATE TABLE `kanban` (
  `kanbanId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `kanbanData` varchar(5000) NOT NULL DEFAULT '[{"id":1,"items":[]},{"id":2,"items":[]},{"id":3,"items":[]}]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kanban`
--

INSERT INTO `kanban` (`kanbanId`, `usersId`, `kanbanData`) VALUES
(4, 12, '\"[{\"id\":1,\"items\":[{\"id\":49507,\"content\":\"Task not started\"}]},{\"id\":2,\"items\":[{\"id\":26304,\"content\":\"In Progress 1\"},{\"id\":75341,\"content\":\"In Progress 2\"}]},{\"id\":3,\"items\":[{\"id\":10368,\"content\":\"Done\"}]}]\"'),
(5, 13, '\"[{\"id\":1,\"items\":[]},{\"id\":2,\"items\":[{\"id\":9768,\"content\":\"Test\"}]},{\"id\":3,\"items\":[]}]\"');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listsId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `listsData` varchar(5000) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listsId`, `usersId`, `listsData`) VALUES
(5, 12, '\"[{\"id\":\"1682736973667\",\"name\":\"To do list\",\"tasks\":[{\"id\":\"1682736977043\",\"name\":\"Task 1\",\"complete\":true},{\"id\":\"1682736981399\",\"name\":\"Task 2\",\"complete\":true}]},{\"id\":\"1682736992563\",\"name\":\"Make a game\",\"tasks\":[{\"id\":\"1682736995092\",\"name\":\"UI\",\"complete\":true},{\"id\":\"1682737004388\",\"name\":\"Assets and Sound Effects\",\"complete\":true},{\"id\":\"1682737011573\",\"name\":\"Code\",\"complete\":false}]}]\"'),
(6, 13, '\"[{\"id\":\"1682688470456\",\"name\":\"Test list\",\"tasks\":[]}]\"');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `userEmail`, `usersPwd`) VALUES
(12, 'HuaTienHao', '4601104049@student.hcmue.edu.vn', '$2y$10$8bTIolaEVzi7hyCXAaIHSuOgag.fwgA/GFnRnFI9p2VzeiWlj2G.W'),
(13, 'Test', 'test@gmail.com', '$2y$10$pzGdwuMzIFBflmBh3eG5oOhPcinQkwvxI9EanuXnjMePXmrTHqTT.');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `deleteUserAndKanban` BEFORE DELETE ON `users` FOR EACH ROW DELETE FROM kanban WHERE kanban.usersId = OLD.usersId
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteUserAndLists` BEFORE DELETE ON `users` FOR EACH ROW DELETE FROM lists WHERE lists.usersId = OLD.usersId
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertEmptyKanbanForNewUser` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO kanban VALUES(null, NEW.usersId, '[{"id":1,"items":[]},{"id":2,"items":[]},{"id":3,"items":[]}]')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertEmptyListOfForNewUser` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO lists VALUES(null, NEW.usersId, '[]')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanban`
--
ALTER TABLE `kanban`
  ADD PRIMARY KEY (`kanbanId`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`listsId`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanban`
--
ALTER TABLE `kanban`
  MODIFY `kanbanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kanban`
--
ALTER TABLE `kanban`
  ADD CONSTRAINT `kanban_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
