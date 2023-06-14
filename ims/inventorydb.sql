-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 08:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barrowed_equipment`
--

CREATE TABLE `barrowed_equipment` (
  `barrow_id` int(11) NOT NULL COMMENT 'Primary Key',
  `costumer_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `equipment_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `barrow_status` tinyint(5) NOT NULL COMMENT '1 = Pending| 0 = Complete',
  `barrow_date` datetime NOT NULL DEFAULT current_timestamp(),
  `return_date` datetime DEFAULT NULL,
  `barrow_qty` int(11) NOT NULL,
  `returned_qty` int(100) NOT NULL,
  `subtotal_amount` int(100) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Issued by | Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barrowed_equipment`
--

INSERT INTO `barrowed_equipment` (`barrow_id`, `costumer_id`, `equipment_id`, `barrow_status`, `barrow_date`, `return_date`, `barrow_qty`, `returned_qty`, `subtotal_amount`, `user_id`) VALUES
(63, 211, 87, 1, '2023-05-07 09:57:26', NULL, 6, 4, 1200, 109);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `category_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_added`, `user_id`, `category_status`) VALUES
(19, 'Office', '2023-03-12 21:02:20', 109, 1),
(38, 'STEM', '2023-03-22 21:48:56', 109, 1),
(39, 'Clinic', '2023-03-22 21:51:16', 109, 1),
(40, 'TVL-HE', '2023-03-22 21:52:49', 109, 1),
(56, 'TVL-ICT', '2023-04-05 16:09:14', 109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(17, 'sample@yahoo.com', '56516', 1676734217),
(63, 'teemo@gmail.com', '21941', 1678281451),
(268, 'hannahpalatan@gmail.com', '35863', 1678447465),
(270, 'erwindagoc93@gmail.com', '85808', 1678447772),
(271, 'cedricjamesresurreccion27@gmail.com', '65246', 1678448160),
(272, 'maureeenalejandreamahor@gmail.com', '97516', 1678450831),
(273, 'shikalo444@gmail.com', '27095', 1678453947),
(386, 'jeromesavc@gmail.com', '66036', 1683613958);

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `costumer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `school_id` int(50) NOT NULL COMMENT 'Foreign Key',
  `role_position` text NOT NULL,
  `costumer_status` tinyint(11) NOT NULL COMMENT '1=Allowed | 0=Block',
  `admin_id` int(100) NOT NULL COMMENT 'Added by | Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`costumer_id`, `name`, `email`, `phone_number`, `address`, `school_id`, `role_position`, `costumer_status`, `admin_id`) VALUES
(211, 'testbarrower1', 'test1@gmail.com', '09887625544', 'test address', 19, 'Student', 1, 109);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `category_id` int(50) NOT NULL COMMENT 'Foreign key',
  `equipment_name` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `type_id` int(10) NOT NULL COMMENT 'Foreign key',
  `location_id` int(10) NOT NULL COMMENT 'Foreign key',
  `unit_id` int(10) NOT NULL COMMENT 'Foreign key',
  `price` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `in_use` int(100) NOT NULL COMMENT 'Equipment Used',
  `quantity` int(100) NOT NULL COMMENT 'Equipment Available',
  `amount` int(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT',
  `conditions` int(250) DEFAULT NULL COMMENT 'Good | Critical',
  `equipment_img` varchar(255) NOT NULL,
  `img_extension` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL,
  `user_id` int(100) NOT NULL COMMENT 'Added By | Foreign key',
  `admins_id` int(100) DEFAULT NULL COMMENT 'Updated by | Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `category_id`, `equipment_name`, `type_id`, `location_id`, `unit_id`, `price`, `stock`, `in_use`, `quantity`, `amount`, `status`, `conditions`, `equipment_img`, `img_extension`, `date_added`, `date_updated`, `user_id`, `admins_id`) VALUES
(79, 19, 'Monitor', 8, 22, 21, 399, 20, 0, 20, 11970, 1, 15, 'monitor', 'png', '2023-05-01 03:57:57', '2023-05-06 19:01:25', 109, 109),
(87, 56, 'Keyboard', 8, 19, 21, 200, 30, 6, 24, 6000, 1, 15, 'keyboard', 'png', '2023-05-02 15:24:06', '2023-05-06 19:47:40', 109, 109),
(88, 19, 'Mouse', 17, 21, 21, 200, 20, 0, 20, 5000, 1, 10, 'mouse', 'png', '2023-05-05 19:04:42', '2023-05-06 19:44:04', 109, 109),
(90, 56, 'Lan Cable', 8, 19, 21, 200, 18, 0, 18, 3600, 1, 10, 'lancable', 'png', '2023-05-07 13:01:33', NULL, 109, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `equip_id` int(11) NOT NULL,
  `equip_type` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `equip_status` int(2) NOT NULL DEFAULT 1 COMMENT '1=Available | 0=NOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`equip_id`, `equip_type`, `date_added`, `user_id`, `equip_status`) VALUES
(8, 'Computer Peripherals', '2023-03-12 21:02:38', 109, 1),
(12, 'Science Laboratory Equipment', '2023-03-22 21:48:42', 109, 1),
(13, 'Medical Equipment', '2023-03-22 21:51:25', 109, 1),
(14, 'Cleaning Materials', '2023-03-22 21:53:04', 109, 1),
(17, 'Faculty Materials', '2023-03-27 20:45:32', 109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_unit`
--

CREATE TABLE `equipment_unit` (
  `id` int(100) NOT NULL,
  `unit_type` varchar(50) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL COMMENT 'Foreign key',
  `unit_status` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Available | 0 = NOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment_unit`
--

INSERT INTO `equipment_unit` (`id`, `unit_type`, `date_added`, `user_id`, `unit_status`) VALUES
(21, 'Each(s)', '2023-03-22 21:49:07', 109, 1),
(23, 'Bundle(s)', '2023-03-27 20:43:12', 109, 1),
(33, 'Package(s)', '2023-04-19 19:16:21', 109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_branch`
--

CREATE TABLE `location_branch` (
  `id` int(100) NOT NULL,
  `location` varchar(200) NOT NULL COMMENT 'Must be Unique',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Foreign key',
  `location_status` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Available | 0 = NOT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_branch`
--

INSERT INTO `location_branch` (`id`, `location`, `date_added`, `user_id`, `location_status`) VALUES
(19, 'Golden Minds Colleges Sta. Maria, Bulacan', '2023-03-12 21:02:55', 109, 1),
(21, 'Golden Minds Colleges Balagtas, Bulacan', '2023-03-13 01:05:10', 109, 1),
(22, 'Golden Minds Academy Guiguinto, Bulacan', '2023-03-13 01:05:25', 109, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `acct_name` varchar(255) NOT NULL,
  `uname` varchar(100) NOT NULL COMMENT 'Must be Unique',
  `pword` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 = Active| 0 = Inactive',
  `school_branch` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'Must be unique',
  `birthday` date NOT NULL,
  `gender` text NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `img_extension` varchar(50) NOT NULL,
  `acct_created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_logged_in` tinyint(10) NOT NULL COMMENT '1=Account LoggedIn | 0=NOT',
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `session_id` varchar(200) NOT NULL COMMENT 'SID User Tracker'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `acct_name`, `uname`, `pword`, `status`, `school_branch`, `address`, `phone_number`, `email`, `birthday`, `gender`, `profile_img`, `img_extension`, `acct_created`, `is_logged_in`, `login_time`, `logout_time`, `session_id`) VALUES
(109, 'Jerome Avecilla', 'admin', '$2y$10$DfV7o9khtxXElebULbK9cenWgZUFvyUx6Ne8IIDeBNYYQm.r5qpTG', 1, 'Golden Minds Colleges Sta. Maria, Bulacan', 'Bulacan, Philippines', '9469595286', 'jeromesavc@gmail.com', '2004-03-24', 'Male', 'adminn', 'png', '2023-03-11 02:12:18', 0, '2023-05-09 14:02:26', '2023-05-09 14:20:46', 'kea0870592eg87tndccql3r1di');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barrowed_equipment`
--
ALTER TABLE `barrowed_equipment`
  ADD PRIMARY KEY (`barrow_id`),
  ADD KEY `barrower_id` (`costumer_id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `user_admin_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD KEY `users_id` (`user_id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`costumer_id`),
  ADD KEY `schoolBranch_id` (`school_id`),
  ADD KEY `id_admin` (`admin_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipment_name` (`equipment_name`),
  ADD KEY `catergory` (`category_id`),
  ADD KEY `equipment_type` (`type_id`),
  ADD KEY `equipment_unit` (`unit_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_rack` (`location_id`),
  ADD KEY `admins_id` (`admins_id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`equip_id`),
  ADD UNIQUE KEY `equip_type` (`equip_type`),
  ADD KEY `et_user_id` (`user_id`);

--
-- Indexes for table `equipment_unit`
--
ALTER TABLE `equipment_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_type` (`unit_type`),
  ADD KEY `ut_user_id` (`user_id`);

--
-- Indexes for table `location_branch`
--
ALTER TABLE `location_branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location` (`location`),
  ADD KEY `lb_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barrowed_equipment`
--
ALTER TABLE `barrowed_equipment`
  MODIFY `barrow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `equipment_unit`
--
ALTER TABLE `equipment_unit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `location_branch`
--
ALTER TABLE `location_branch`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barrowed_equipment`
--
ALTER TABLE `barrowed_equipment`
  ADD CONSTRAINT `barrower_id` FOREIGN KEY (`costumer_id`) REFERENCES `costumers` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_admin_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `costumers`
--
ALTER TABLE `costumers`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolBranch_id` FOREIGN KEY (`school_id`) REFERENCES `location_branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `admins_id` FOREIGN KEY (`admins_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catergory` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_type` FOREIGN KEY (`type_id`) REFERENCES `equipment_type` (`equip_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_unit` FOREIGN KEY (`unit_id`) REFERENCES `equipment_unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_rack` FOREIGN KEY (`location_id`) REFERENCES `location_branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD CONSTRAINT `et_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment_unit`
--
ALTER TABLE `equipment_unit`
  ADD CONSTRAINT `ut_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location_branch`
--
ALTER TABLE `location_branch`
  ADD CONSTRAINT `lb_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
