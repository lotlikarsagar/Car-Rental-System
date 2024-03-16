-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 11:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `available_cars_view`
-- (See below for the actual view)
--
CREATE TABLE `available_cars_view` (
`car_id` int(11)
,`car_name` varchar(20)
,`price` int(11)
,`capacity` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `book_place` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `car_id`, `cust_id`, `book_date`, `pickup_date`, `return_date`, `book_place`) VALUES
(23, 5, 9, '2023-11-22', '2023-11-23', '2023-11-30', 'Mapusa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `booking_details_view`
-- (See below for the actual view)
--
CREATE TABLE `booking_details_view` (
`book_id` int(11)
,`book_date` date
,`pickup_date` date
,`return_date` date
,`book_place` varchar(20)
,`car_name` varchar(20)
,`price` int(11)
,`customer_fname` varchar(20)
,`customer_lname` varchar(20)
,`customer_email` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `book_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_name`, `price`, `capacity`, `status`) VALUES
(1, 'mahindra thar', 7000, 4, 'Available'),
(2, 'Tata Nexon', 6000, 4, 'Available'),
(3, 'Mahindra XUV700', 4000, 4, 'Available'),
(4, 'Mahindra Scorpio N', 7000, 4, 'Available'),
(5, 'Tata Harrier', 7000, 4, 'Not Available'),
(6, 'Skoda Kushaq', 7000, 4, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `fname`, `lname`, `email`, `username`, `password`, `address`) VALUES
(9, 'Sagar', 'Lotlikar', 's@gmail.com', 'sagar', '202cb962ac59075b964b07152d234b70', 'Cuncolim');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_return_days_view`
-- (See below for the actual view)
--
CREATE TABLE `customer_return_days_view` (
`cust_id` int(11)
,`fname` varchar(20)
,`lname` varchar(20)
,`book_id` int(11)
,`return_date` date
,`days_until_return` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_password`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `book_id`, `amount`) VALUES
(8, 23, 49000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `payment_summary_view`
-- (See below for the actual view)
--
CREATE TABLE `payment_summary_view` (
`pay_id` int(11)
,`book_id` int(11)
,`payment_amount` int(11)
,`customer_fname` varchar(20)
,`customer_lname` varchar(20)
,`customer_email` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `available_cars_view`
--
DROP TABLE IF EXISTS `available_cars_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `available_cars_view`  AS SELECT `car`.`car_id` AS `car_id`, `car`.`car_name` AS `car_name`, `car`.`price` AS `price`, `car`.`capacity` AS `capacity` FROM `car` WHERE `car`.`status` = 'Available' ;

-- --------------------------------------------------------

--
-- Structure for view `booking_details_view`
--
DROP TABLE IF EXISTS `booking_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `booking_details_view`  AS SELECT `b`.`book_id` AS `book_id`, `b`.`book_date` AS `book_date`, `b`.`pickup_date` AS `pickup_date`, `b`.`return_date` AS `return_date`, `b`.`book_place` AS `book_place`, `c`.`car_name` AS `car_name`, `c`.`price` AS `price`, `cu`.`fname` AS `customer_fname`, `cu`.`lname` AS `customer_lname`, `cu`.`email` AS `customer_email` FROM ((`booking` `b` join `car` `c` on(`b`.`car_id` = `c`.`car_id`)) join `customer` `cu` on(`b`.`cust_id` = `cu`.`cust_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `customer_return_days_view`
--
DROP TABLE IF EXISTS `customer_return_days_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_return_days_view`  AS SELECT `cu`.`cust_id` AS `cust_id`, `cu`.`fname` AS `fname`, `cu`.`lname` AS `lname`, `b`.`book_id` AS `book_id`, `b`.`return_date` AS `return_date`, to_days(`b`.`return_date`) - to_days(curdate()) AS `days_until_return` FROM (`customer` `cu` join `booking` `b` on(`cu`.`cust_id` = `b`.`cust_id`)) WHERE `b`.`return_date` >= curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `payment_summary_view`
--
DROP TABLE IF EXISTS `payment_summary_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment_summary_view`  AS SELECT `p`.`pay_id` AS `pay_id`, `p`.`book_id` AS `book_id`, `p`.`amount` AS `payment_amount`, `cu`.`fname` AS `customer_fname`, `cu`.`lname` AS `customer_lname`, `cu`.`email` AS `customer_email` FROM ((`payment` `p` join `booking` `b` on(`p`.`book_id` = `b`.`book_id`)) join `customer` `cu` on(`b`.`cust_id` = `cu`.`cust_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);

--
-- Constraints for table `book_details`
--
ALTER TABLE `book_details`
  ADD CONSTRAINT `book_details_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`),
  ADD CONSTRAINT `book_details_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
