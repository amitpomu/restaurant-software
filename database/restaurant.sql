-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2016 at 03:59 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(9) NOT NULL,
  `till` int(3) NOT NULL,
  `code` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `total_price` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `till`, `code`, `name`, `price`, `quantity`, `total_price`) VALUES
(2, 2, 265, 'pizza', 250, 1, 250),
(6, 1, 819, 'Chicken Chilly', 200, 1, 200),
(7, 1, 865, 'Taccos', 200, 1, 200),
(8, 1, 931, 'palak panneer', 125, 1, 125),
(9, 1, 790, 'Chicken Chilly', 200, 1, 200),
(10, 1, 582, 'Black Forest Cake', 150, 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_code` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category_code`) VALUES
(1, 'Fast Food', 1),
(3, 'Cold Drinks', 2),
(4, 'Desert', 3),
(5, 'Chicken Items', 4),
(6, 'Tobacco', 5),
(7, 'Newari Food', 10),
(8, 'Thakali Food', 15),
(9, 'Pork Items', 17),
(10, 'Maxican Food', 50);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `image`) VALUES
(1, 'Amit Restaurant', 'wk-big-img-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(9) NOT NULL,
  `discount_code` varchar(30) NOT NULL,
  `discount_percent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount_code`, `discount_percent`) VALUES
(1, '12345', 20),
(12, 'abc', 25),
(13, 'a1b2c3', 50),
(15, 'abcd', 75);

-- --------------------------------------------------------

--
-- Table structure for table `discount_amount`
--

CREATE TABLE `discount_amount` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `user` varchar(50) NOT NULL,
  `discount_date` varchar(11) NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `amount` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_amount`
--

INSERT INTO `discount_amount` (`id`, `user_id`, `user`, `discount_date`, `visible`, `amount`) VALUES
(16, 18, 'admin', '2015/11/22', 0, 93),
(17, 18, 'admin', '2015/11/22', 0, 20),
(18, 20, 'staff', '2015/11/23', 0, 60),
(19, 18, 'admin', '2015/11/23', 0, 59),
(20, 18, 'admin', '2015/11/29', 0, 50),
(21, 18, 'admin', '2015/11/29', 0, 20),
(22, 18, 'admin', '2015/12/05', 0, 150);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` int(9) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `dos` varchar(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_meal`
--

CREATE TABLE `employee_meal` (
  `id` int(9) NOT NULL,
  `year` int(5) NOT NULL,
  `month` varchar(15) NOT NULL,
  `meal_date` varchar(11) NOT NULL,
  `employee` varchar(30) NOT NULL,
  `emp_id` varchar(30) NOT NULL,
  `meal` varchar(30) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_meal`
--

INSERT INTO `employee_meal` (`id`, `year`, `month`, `meal_date`, `employee`, `emp_id`, `meal`, `quantity`, `price`) VALUES
(3, 2015, 'December', '2015/12/05', 'Amit Subba', '3', 'aalu dum', 1, 45),
(4, 2015, 'December', '2015/12/05', 'Arun Tamang', '18', 'Burger', 1, 100),
(5, 2015, 'December', '2015/12/05', 'Amit Subba', '3', 'Burger', 1, 100),
(6, 2015, 'December', '2015/12/06', 'Amit Subba', '3', 'pizza', 1, 250),
(7, 2015, 'December', '2015/12/10', 'Amit Subba', '3', 'banana milkshake', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(3) NOT NULL,
  `notice_date` varchar(11) NOT NULL,
  `user_category` varchar(9) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(9) NOT NULL,
  `report_date` varchar(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `code` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `quantity` int(3) NOT NULL,
  `total_sales` int(9) NOT NULL,
  `delivery_type` varchar(30) NOT NULL,
  `from_time` varchar(30) NOT NULL,
  `to_time` varchar(30) NOT NULL,
  `user_id` int(9) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `report_date`, `visible`, `code`, `name`, `price`, `quantity`, `total_sales`, `delivery_type`, `from_time`, `to_time`, `user_id`, `user`) VALUES
(128, '2015/11/22', 0, 354, 'Burger', 100, 1, 100, 'Eat In', '23:23:56', '', 18, 'admin'),
(129, '2015/11/22', 0, 96, 'Fanta', 25, 1, 25, 'Eat In', '23:24:04', '', 18, 'admin'),
(130, '2015/11/22', 0, 658, 'Chicken Kabab', 250, 1, 250, 'Eat In', '23:24:09', '', 18, 'admin'),
(132, '2015/11/22', 0, 752, 'banana momo', 80, 1, 80, 'Eat In', '23:35:13', '', 19, 'manager'),
(133, '2015/11/22', 0, 857, 'Chicken Kabab', 250, 1, 250, 'Eat In', '23:35:16', '', 19, 'manager'),
(134, '2015/11/22', 0, 823, 'Burger', 100, 1, 100, 'Eat In', '23:42:35', '', 18, 'admin'),
(136, '2015/11/23', 0, 879, 'banana milkshake', 50, 1, 50, 'Eat In', '00:57:49', '01:05:40', 20, 'staff'),
(137, '2015/11/23', 0, 640, 'mango juice', 50, 1, 50, 'Eat In', '00:57:53', '01:05:39', 20, 'staff'),
(138, '2015/11/23', 0, 396, 'Burger', 100, 2, 200, 'Eat In', '00:57:57', '01:05:39', 20, 'staff'),
(139, '2015/11/23', 0, 240, 'c momo', 70, 1, 70, 'Eat In', '01:07:01', '20:39:43', 18, 'admin'),
(140, '2015/11/27', 0, 806, 'aalu dum', 45, 1, 45, 'Eat In', '12:21:55', '12:22:08', 18, 'admin'),
(141, '2015/11/29', 0, 473, 'Burger', 100, 2, 200, 'Eat In', '14:08:06', '14:11:06', 18, 'admin'),
(142, '2015/11/29', 0, 513, 'banana milkshake', 50, 1, 50, 'Eat In', '14:08:16', '14:11:05', 18, 'admin'),
(143, '2015/11/29', 0, 24, 'banana milkshake', 50, 1, 50, 'Eat In', '14:16:44', '20:52:40', 20, 'staff'),
(144, '2015/11/29', 0, 618, 'Chicken Chilly', 200, 1, 200, 'Eat In', '14:29:13', '14:29:32', 18, 'admin'),
(145, '2015/11/29', 0, 187, 'Burger', 100, 1, 100, 'Eat In', '20:24:32', '20:52:39', 18, 'admin'),
(147, '2015/12/05', 0, 265, 'pizza', 250, 1, 250, 'Eat In', '13:14:57', '13:41:25', 19, 'manager'),
(148, '2015/12/05', 0, 538, 'Burger', 100, 1, 100, 'Eat In', '13:25:50', '13:41:26', 18, 'admin'),
(149, '2015/12/05', 0, 328, 'Chicken Chilly', 200, 1, 200, 'Eat In', '13:39:38', '13:41:27', 18, 'admin'),
(150, '2015/12/05', 0, 63, 'Chicken Chilly', 200, 1, 200, 'Eat In', '13:42:30', '', 18, 'admin'),
(151, '2015/12/05', 1, 819, 'Chicken Chilly', 200, 1, 200, 'Eat In', '13:49:54', '14:08:47', 20, 'staff'),
(152, '2015/12/05', 1, 865, 'Taccos', 200, 1, 200, 'Eat In', '13:53:52', '14:08:51', 18, 'admin'),
(153, '2015/12/05', 1, 931, 'palak panneer', 125, 1, 125, 'Eat In', '14:21:46', '14:22:05', 18, 'admin'),
(154, '2015/12/10', 1, 790, 'Chicken Chilly', 200, 1, 200, 'Eat In', '16:41:19', '', 18, 'admin'),
(155, '2015/12/10', 1, 582, 'Black Forest Cake', 150, 1, 150, 'Eat In', '16:50:10', '', 18, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `report_archive`
--

CREATE TABLE `report_archive` (
  `id` int(9) NOT NULL,
  `report_date` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_archive`
--

INSERT INTO `report_archive` (`id`, `report_date`, `amount`) VALUES
(17, '2015/11/22', 878),
(18, '2015/12/02', 1119),
(19, '2015/12/05', 773);

-- --------------------------------------------------------

--
-- Table structure for table `report_cancel`
--

CREATE TABLE `report_cancel` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cancel_date` varchar(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `code` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_cancel`
--

INSERT INTO `report_cancel` (`id`, `user_id`, `user`, `cancel_date`, `visible`, `name`, `price`, `code`, `quantity`, `total_price`) VALUES
(21, 18, 'admin', '2015/11/22', 0, 'aalu dum', 45, 698, 1, 45),
(22, 18, 'admin', '2015/11/23', 0, 'aalu dum', 45, 243, 1, 45),
(23, 18, 'admin', '2015/12/05', 0, 'banana momo', 80, 835, 2, 160),
(24, 19, 'manager', '2015/12/05', 1, 'Chicken Chilly', 200, 63, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(9) NOT NULL,
  `emp_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary_year` int(9) NOT NULL,
  `salary_month` varchar(30) NOT NULL,
  `salary` int(30) NOT NULL,
  `month_id` int(3) NOT NULL,
  `allowance` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(9) NOT NULL,
  `code` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `quantity` int(3) NOT NULL,
  `delivery_type` varchar(30) NOT NULL,
  `order_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `code`, `name`, `price`, `quantity`, `delivery_type`, `order_time`) VALUES
(1, 395, 'Burger', 100, 1, 'Eat In', '20:51:52'),
(2, 274, 'pizza', 250, 1, 'Eat In', '15:44:49'),
(3, 790, 'Chicken Chilly', 200, 1, 'Eat In', '16:41:19'),
(4, 582, 'Black Forest Cake', 150, 1, 'Eat In', '16:50:10'),
(5, 679, 'banana milkshake', 50, 1, 'Eat In', '16:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(9) NOT NULL,
  `stock_date` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_code` int(11) NOT NULL,
  `note` text NOT NULL,
  `unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `stock_date`, `user`, `name`, `quantity`, `category_code`, `note`, `unit`) VALUES
(3, '2015/12/05', 'cook', 'potato', 50, 2, '50 kg sold 50 kg needed', 'kg'),
(4, '2015/10/17', 'admin', 'buff', 50, 1, '25 kg added', 'kg'),
(5, '2015/11/21', 'admin', 'Flower', 50, 2, '10 kg added', 'kg'),
(7, '2015/11/29', 'admin', 'Burger Patties', 400, 3, '200 addad', 'piece'),
(8, '2015/11/29', 'cook', 'chicken tender', 40, 3, '10 sold 10 needed', 'piece');

-- --------------------------------------------------------

--
-- Table structure for table `stock_category`
--

CREATE TABLE `stock_category` (
  `id` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_category`
--

INSERT INTO `stock_category` (`id`, `name`, `category_code`) VALUES
(1, 'meat', 1),
(2, 'vegetables', 2),
(3, 'Frozen', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(9) NOT NULL,
  `cat_code` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `cat_code`, `name`, `price`) VALUES
(33, 1, 'c momo', 70),
(34, 1, 'choumin', 50),
(35, 1, 'naan', 25),
(36, 4, 'Chicken Roast', 350),
(39, 1, 'palak panneer', 125),
(44, 1, 'pizza', 250),
(45, 1, 'Burger', 100),
(46, 2, 'Milk Shake', 50),
(47, 1, 'aalu dum', 45),
(48, 1, 'banana momo', 80),
(49, 2, 'Coke', 25),
(51, 2, 'Fanta', 25),
(53, 3, 'Black Forest Cake', 150),
(54, 3, 'Venila Ice cream', 50),
(55, 2, 'Sprite', 25),
(56, 4, 'Chicken Wings', 150),
(57, 5, 'Surya Cigarate', 10),
(59, 10, 'Bara', 50),
(60, 10, 'Newari Khaja Set', 125),
(61, 15, 'Thakali Khana Set', 250),
(62, 15, 'Dhedo & Gundruk', 150),
(63, 17, 'Pork Chilly', 200),
(64, 4, 'Chicken Chilly', 200),
(66, 4, 'Chicken Tikka', 250),
(67, 4, 'chiken masala', 125),
(68, 4, 'Chicken Kabab', 250),
(69, 3, 'White Forest Cake', 350),
(70, 10, 'Chatamari', 50),
(72, 2, 'Orange Juice', 30),
(73, 17, 'Pork Sekuwa', 250),
(74, 2, 'mango juice', 50),
(75, 2, 'banana milkshake', 50),
(76, 2, 'Real Juice', 30),
(77, 17, 'Pork Momo', 150),
(78, 50, 'Taccos', 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashed_password` varchar(50) NOT NULL,
  `user_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `hashed_password`, `user_category`) VALUES
(18, 'admin', 'M01UVVNmamNUdStlb3ZwUWI0Tm4rQT09', 'admin'),
(19, 'manager', 'STkvUTNqVExuM2E0bTRteW9kR2lrQT09', 'manager'),
(20, 'staff', 'Z1B2aUJkL1YrWEVSS2ZZYkF6REhaQT09', 'staff'),
(21, 'cook', 'dEFaVW5CWG4rbjFrQWpCMVdLUy8vUT09', 'cook');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(9) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'cook'),
(4, 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_amount`
--
ALTER TABLE `discount_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_meal`
--
ALTER TABLE `employee_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_archive`
--
ALTER TABLE `report_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_cancel`
--
ALTER TABLE `report_cancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_category`
--
ALTER TABLE `stock_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `discount_amount`
--
ALTER TABLE `discount_amount`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `employee_meal`
--
ALTER TABLE `employee_meal`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `report_archive`
--
ALTER TABLE `report_archive`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `report_cancel`
--
ALTER TABLE `report_cancel`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stock_category`
--
ALTER TABLE `stock_category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
