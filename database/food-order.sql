-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 03:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_inquiry`
--

CREATE TABLE `catering_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catering_inquiry`
--

INSERT INTO `catering_inquiry` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'jonathan', '08114792340', 'gdnsjonathan@gmail.com', 'hello, please i want to make inquiry about your catering service for an occassion of 250 invitees');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'michael', 'ughelli', 'dinhoj@gmail.com', 'hello its micaheal from nigeria'),
(2, 'peter', 'warri', 'peter@gmail.com', 'hello, do you make catering service to residents of warri ?');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `phone`) VALUES
(1, 'joan', '$2y$10$MnGv1YXQmpymXqxtCP2Cfe8.9oQ8bwe8xmJfNIyahmoouPe8jzaoS', '8114792340');

-- --------------------------------------------------------

--
-- Table structure for table `event_decoration_inquiry`
--

CREATE TABLE `event_decoration_inquiry` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_decoration_inquiry`
--

INSERT INTO `event_decoration_inquiry` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'chris jackson', '09176893401', 'abel@gmail.com', 'hello welcome to this tuttoria video'),
(2, 'joshua inginla', '07054902367', 'joshuainginla@gmial.com', 'hi, i want to make inquiries about your event decoration servoce for a hall of 1000 seater capacity'),
(3, 'joshua inginla', '07054902367', 'joshuainginla@gmial.com', 'hi, i want to make inquiries about your event decoration servoce for a hall of 1000 seater capacity');

-- --------------------------------------------------------

--
-- Table structure for table `paid_order`
--

CREATE TABLE `paid_order` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_paid` datetime NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paid_order`
--

INSERT INTO `paid_order` (`id`, `status`, `reference`, `name`, `date_paid`, `email`) VALUES
(14, 'success', 'FoodOrdered371348428', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(15, 'success', 'FoodOrdered278899639', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(16, 'success', 'FoodOrdered82751300', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(17, 'success', 'FoodOrdered245531352', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(18, 'success', 'FoodOrdered830169633', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(19, 'success', 'FoodOrdered740231912', '', '0000-00-00 00:00:00', 'dinho4girl@gmail.com'),
(20, 'success', 'FoodOrdered762347508', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(21, 'success', 'FoodOrdered517661966', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(22, 'success', 'FoodOrdered255549765', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(23, 'success', 'FoodOrdered982451236', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(24, 'success', 'FoodOrdered379634899', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(25, 'success', 'FoodOrdered472538857', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(26, 'success', 'FoodOrdered407080504', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(27, 'success', 'FoodOrdered595666163', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(28, 'success', 'FoodOrdered334433989', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(29, 'success', 'FoodOrdered206995177', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(30, 'processing', 'FoodOrdered554764974', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com'),
(31, 'success', 'FoodOrdered425106589', '', '0000-00-00 00:00:00', 'dinhoj@gmail.com'),
(32, 'success', 'FoodOrdered831736602', '', '0000-00-00 00:00:00', 'teamtechknowmore@gmail.com'),
(33, 'success', 'FoodOrdered683284716', '', '0000-00-00 00:00:00', 'gdnsjonathan@gmail.com'),
(34, 'delivered', 'FoodOrdered674198144', '', '0000-00-00 00:00:00', 'ivvi4coolpad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quick`
--

CREATE TABLE `quick` (
  `id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `num1` varchar(25) NOT NULL,
  `num2` varchar(25) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `real_order`
--

CREATE TABLE `real_order` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `rice` decimal(10,2) NOT NULL,
  `beans` decimal(10,2) NOT NULL,
  `dodo` decimal(10,2) NOT NULL,
  `yam` decimal(10,2) NOT NULL,
  `moimoi` decimal(10,2) NOT NULL,
  `salad` decimal(10,2) NOT NULL,
  `meat` decimal(10,2) NOT NULL,
  `delivery` decimal(10,2) NOT NULL,
  `plates` int(10) NOT NULL,
  `total` double(10,2) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `food_id` int(255) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `real_order`
--

INSERT INTO `real_order` (`id`, `food_name`, `rice`, `beans`, `dodo`, `yam`, `moimoi`, `salad`, `meat`, `delivery`, `plates`, `total`, `customer_name`, `customer_contact`, `customer_address`, `food_id`, `date_ordered`, `reference`) VALUES
(74, 'banga rice', '200.00', '0.00', '200.00', '0.00', '0.00', '300.00', '100.00', '100.00', 1, 900.00, '', '08114792340', 'contol v', 88, '2022-08-20 02:23:48', 'not paid'),
(75, 'banga rice', '700.00', '0.00', '0.00', '200.00', '0.00', '200.00', '300.00', '100.00', 1, 1500.00, 'john', '123', 'contol v', 45, '2022-08-20 02:29:41', 'not paid'),
(76, 'banga rice', '200.00', '200.00', '200.00', '0.00', '200.00', '0.00', '200.00', '100.00', 1, 1100.00, 'john', '08114792340', 'control v', 34, '2022-08-20 02:36:52', 'not paid'),
(77, 'jollof rice', '300.00', '0.00', '200.00', '0.00', '0.00', '100.00', '0.00', '100.00', 1, 700.00, '', '123123123123', 'control v', 66, '2022-08-20 02:38:16', 'not paid'),
(78, 'fried rice', '400.00', '0.00', '300.00', '200.00', '200.00', '100.00', '100.00', '100.00', 1, 1400.00, 'FoodOrdered206995177', '08114792340', 'control v', 91, '2022-08-20 02:40:42', 'not paid'),
(79, 'banga rice', '200.00', '100.00', '200.00', '0.00', '200.00', '100.00', '200.00', '100.00', 1, 1100.00, 'kitchenDegina', '08114792340', 'otovwodo main market beside shop fair car park', 42, '2022-08-20 02:42:35', 'FoodOrdered554764974'),
(80, 'banga rice', '300.00', '200.00', '0.00', '0.00', '300.00', '0.00', '200.00', '100.00', 1, 1100.00, 'marvelous', '08114792340', 'control v', 54, '2022-08-20 02:50:35', 'FoodOrdered425106589'),
(81, 'jollof rice', '300.00', '200.00', '0.00', '200.00', '0.00', '200.00', '0.00', '100.00', 1, 1000.00, 'marvelous', '08114792340', 'control v', 23, '2022-08-20 02:52:35', 'FoodOrdered831736602'),
(82, 'fried rice', '300.00', '100.00', '100.00', '0.00', '200.00', '0.00', '200.00', '100.00', 1, 1000.00, 'jonathan', '08114792340', 'otovwodo motor park ughelli', 100, '2022-08-20 02:58:14', 'FoodOrdered683284716'),
(83, 'banga rice', '300.00', '100.00', '100.00', '0.00', '0.00', '0.00', '400.00', '100.00', 1, 1000.00, 'mr abel', '08023457683', '12, markolomi street ', 81, '2022-08-20 02:08:16', 'FoodOrdered674198144'),
(84, 'jollof rice', '300.00', '100.00', '200.00', '0.00', '0.00', '0.00', '1000.00', '100.00', 2, 3400.00, 'christopher', '0806118401', 'golds world opposite ovie palace ughelli', 98, '2022-08-26 08:41:59', 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `sales_status`
--

CREATE TABLE `sales_status` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_status`
--

INSERT INTO `sales_status` (`id`, `status`) VALUES
(1, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(14, 'john', 'smilga', 'bc7d2696c9033901fee73783cc9e5121'),
(19, 'jonathan', 'dinho', '527bd5b5d689e2c32ae974c6229ff785'),
(20, 'john', 'code', '72b302bf297a228a75730123efef7c41'),
(21, 'john', 'akon', 'fe57b072f9d28942620b4444adc03565'),
(22, 'jonathan', 'jonathan', '78842815248300fa6ae79f7776a5080a'),
(23, 'jonathan', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(9, 'Rice', 'Food_category866.jpeg', 'yes', 'yes'),
(11, 'Soup', 'Food_category483.jpeg', 'no', 'yes'),
(12, 'Drinks', 'Food_category322.jpeg', 'yes', 'yes'),
(13, 'snacks', 'Food_category56.jpeg', 'yes', 'yes'),
(14, 'Fruits', 'Food_category957.jpeg', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(16, 'banga Rice', 'Banga rice is prepared with palm fruits together with other ingredients. it is best enjoyed with beans, yam or ripe fried plantain and fish/meat', '23.00', 'food-name-57.jpeg', 9, 'yes', 'yes'),
(18, 'jollof rice', 'jollof rice is prepared with tomatoes in stew form and other essential ingredients. \r\nit is best enjoyed with ripe fried plantain, moimoi, spaghette and either fish, meat or chicken', '18.00', 'food-name-222.jpeg', 9, 'no', 'yes'),
(19, 'Fried Rice', 'Fried rice is prepared with green beans and other ingredients. it is best enjoyed with ripe fried plantain, salad, meat or chicken with a chilled bottle of malt drink.', '21.00', 'food-name-769.jpeg', 9, 'yes', 'yes'),
(20, 'coconut rice', 'coconut rice is prepared with cocunut extract and other ingredients like pepper. it is best enjoyed with beans, meat sauce and fish ', '32.00', 'food-name-641.jpeg', 9, 'yes', 'yes'),
(21, 'coke', 'coca cola soft drink is take as a complementary drink after eating a delicious meal. coke table of content includes; carbonated water and sugar ', '150.00', 'food-name-183.jpeg', 9, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `random_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `random_id`) VALUES
(1, 'pizza', '21.00', 1, '21.00', '2022-06-28 04:51:48', 'cancelled', 'godson', '09056789043', 'dinhoj@gmail.com', '27 ughelli ', ''),
(2, 'burger', '18.00', 2, '36.00', '2022-06-28 04:56:47', 'delivered', 'abel', '0814786532', 'ivvi4coolpad@gmail.com', '27 akpodiete street', ''),
(3, 'burger', '18.00', 4, '72.00', '2022-06-28 04:59:45', 'ordered', 'james', '0814786532', 'ivvi4coolpad@gmail.com', '27 akpodiete street', ''),
(18, 'pizza', '21.00', 1, '21.00', '2022-07-03 08:17:39', 'ordered', 'vija', '0814786532', 'dinhoj@gmail.com', 'okhlahoma', '1368');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_inquiry`
--
ALTER TABLE `catering_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_decoration_inquiry`
--
ALTER TABLE `event_decoration_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_order`
--
ALTER TABLE `paid_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick`
--
ALTER TABLE `quick`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_order`
--
ALTER TABLE `real_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_status`
--
ALTER TABLE `sales_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering_inquiry`
--
ALTER TABLE `catering_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_decoration_inquiry`
--
ALTER TABLE `event_decoration_inquiry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paid_order`
--
ALTER TABLE `paid_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `quick`
--
ALTER TABLE `quick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `real_order`
--
ALTER TABLE `real_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sales_status`
--
ALTER TABLE `sales_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
