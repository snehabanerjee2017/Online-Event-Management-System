-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 11:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineeventmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `caterer`
--

CREATE TABLE `caterer` (
  `caterer_id` int(10) NOT NULL,
  `caterer_name` varchar(50) NOT NULL,
  `caterer_office_address` varchar(50) NOT NULL,
  `caterer_cost_per_plate` int(50) NOT NULL,
  `caterer_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caterer`
--

INSERT INTO `caterer` (`caterer_id`, `caterer_name`, `caterer_office_address`, `caterer_cost_per_plate`, `caterer_rating`) VALUES
(2, 'Caterer2', 'Ultodanga', 1500, 4.6),
(3, 'Caterer3', 'Beleghata', 1400, 4.1),
(4, 'Caterer4', 'Dumdum', 1500, 4.3),
(5, 'Caterer5', 'Shyambazar', 1300, 3.9),
(6, 'Caterer6', 'Dumdum', 1300, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone_number` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone_number`, `customer_email`, `customer_city`, `customer_username`) VALUES
(1, 'customer2', '9163354651', 'customer1@gmail.com', 'Kolkata', 'user2'),
(2, 'customer3', '9073822913', 'user3@gmail.com', 'Delhi', 'user3'),
(3, 'Customer4', '9903625580', 'customer4@yahoo.in', 'Delhi', 'user4'),
(4, 'Customer5', '9073822910', 'user5@gmail.com', 'Bangalore', 'user5'),
(5, 'Customer10', '9433671820', 'user10@gmail.com', 'Kolkata', 'user10'),
(6, 'Customer8', '8961502451', 'customer8@yahoo.in', 'Delhi', 'user8');

-- --------------------------------------------------------

--
-- Table structure for table `decorator`
--

CREATE TABLE `decorator` (
  `decorator_id` int(10) NOT NULL,
  `decorator_name` varchar(50) NOT NULL,
  `decorator_office_address` varchar(100) NOT NULL,
  `decorator_average_rate` int(50) NOT NULL,
  `decorator_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `decorator`
--

INSERT INTO `decorator` (`decorator_id`, `decorator_name`, `decorator_office_address`, `decorator_average_rate`, `decorator_rating`) VALUES
(3, 'Decaorator3', 'Rabindra Sadan', 25000, 4.6),
(4, 'Decorator4', 'Parkstreet', 50000, 4.8),
(5, 'Decorator5', 'Moulali', 15000, 3.7),
(6, 'Decorator6', 'Airport', 20000, 3.8);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `hall_id` int(10) DEFAULT NULL,
  `caterer_id` int(10) DEFAULT NULL,
  `decorator_id` int(10) DEFAULT NULL,
  `studio_id` int(50) DEFAULT NULL,
  `planner_id` int(10) DEFAULT NULL,
  `total_cost` int(50) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `guests` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `customer_id`, `event_date`, `event_time`, `hall_id`, `caterer_id`, `decorator_id`, `studio_id`, `planner_id`, `total_cost`, `event_type`, `guests`) VALUES
(3, 5, '2012-12-09', '19:00:00', 1, 2, 3, NULL, 4, 150000, 'corporate', 400),
(7, 5, '2019-12-14', '18:00:00', 2, 0, 3, NULL, 5, 25000, 'anniversary', 200),
(24, 6, '2020-03-30', '19:00:00', 3, 2, 3, 5, 1, 359997, 'wedding', 50);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(10) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `hall_location` varchar(100) NOT NULL,
  `hall_area_sq_ft` int(50) NOT NULL,
  `hall_capacity` int(50) NOT NULL,
  `hall_rent` int(50) NOT NULL,
  `hall_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `hall_location`, `hall_area_sq_ft`, `hall_capacity`, `hall_rent`, `hall_rating`) VALUES
(1, 'Hall1', 'Airport Gate 2', 1000, 100, 10000, 4.3),
(3, 'Hall3', 'Newtown', 4999, 399, 39999, 4.5),
(4, 'Hall5', 'Ballygunge', 3000, 300, 25000, 4.2),
(5, 'Hall4', 'Sealdah', 1000, 100, 8000, 4),
(6, 'Hall6', 'Dumdum', 2000, 150, 8000, 4.2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `status`, `login_time`) VALUES
('srijeet', 'srijeet', 0, '2020-01-05 18:46:34'),
('srijeet', 'srijeet', 0, '2020-01-05 18:48:11'),
('srijeet', 'srijeet', 1, '2020-01-05 22:20:49'),
('user1', 'user1', 0, '2020-01-05 15:28:58'),
('user1', 'user1', 0, '2020-01-05 16:04:37'),
('user1', 'user1', 0, '2020-01-05 16:23:45'),
('user1', 'user1', 0, '2020-01-05 18:33:29'),
('user10', 'user10', 0, '2020-01-05 16:23:05'),
('user10', 'user10', 0, '2020-01-05 17:00:57'),
('user2', 'user2', 1, '2020-01-05 15:35:46'),
('user3', 'user3', 0, '2020-01-05 15:50:11'),
('user5', 'user5', 0, '2020-01-05 15:56:18'),
('user8', 'user8', 0, '2020-01-05 22:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `planner_id` int(10) NOT NULL,
  `planner_name` varchar(50) NOT NULL,
  `planner_gender` varchar(10) NOT NULL,
  `planner_city` varchar(50) NOT NULL,
  `planner_salary` int(50) NOT NULL,
  `planner_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`planner_id`, `planner_name`, `planner_gender`, `planner_city`, `planner_salary`, `planner_rating`) VALUES
(1, 'Planner1', 'male', 'kashmir', 19999, 4.5),
(2, 'Planner2', 'female', 'Delhi', 15000, 4.2),
(3, 'Planner3', 'female', 'Kolkata', 25000, 4.6),
(4, 'Planner4', 'male', 'Bangalore', 20000, 3.6),
(6, 'Planner6', 'female', 'Kolkata', 30000, 4.6);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `username`, `password`, `type`, `reg_time`) VALUES
('Srijeet Roy', 'srijeet', 'srijeet', 'admin', '2020-01-05 18:35:51'),
('user1', 'user1', 'user1', 'admin', '2020-01-05 14:28:29'),
('Customer10', 'user10', 'user10', 'customer', '2020-01-05 15:56:50'),
('user2', 'user2', 'user2', 'customer', '2020-01-05 15:29:46'),
('user3', 'user3', 'user3', 'customer', '2020-01-05 15:43:51'),
('Customer4', 'user4', 'user4', 'customer', '2020-01-05 15:50:58'),
('Customer5', 'user5', 'user5', 'customer', '2020-01-05 15:53:57'),
('Customer8', 'user8', 'user8', 'customer', '2020-01-05 18:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `studio_id` int(10) NOT NULL,
  `studio_name` varchar(50) NOT NULL,
  `studio_office_address` varchar(100) NOT NULL,
  `studio_average_rate` int(50) NOT NULL,
  `studio_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`studio_id`, `studio_name`, `studio_office_address`, `studio_average_rate`, `studio_rating`) VALUES
(1, 'Studio1', 'Sinthee More', 30000, 4.1),
(2, 'Studio2', 'Howrah', 40000, 4),
(3, 'Studio3', 'BAdhbazaar', 25000, 3.6),
(5, 'Studio5', 'Tollygunge', 49999, 4.2),
(6, 'Studio6', 'Tollygunge', 40000, 4.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caterer`
--
ALTER TABLE `caterer`
  ADD PRIMARY KEY (`caterer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `decorator`
--
ALTER TABLE `decorator`
  ADD PRIMARY KEY (`decorator_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`login_time`);

--
-- Indexes for table `planner`
--
ALTER TABLE `planner`
  ADD PRIMARY KEY (`planner_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`studio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `caterer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `decorator`
--
ALTER TABLE `decorator`
  MODIFY `decorator_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `planner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `studio_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
