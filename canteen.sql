-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 08:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sr_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `cost` int(11) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`sr_no`, `user_id`, `order_id`, `item`, `quantity`, `cost`, `stat`) VALUES
(1, 1, 45, 'test', 1, 60, 2),
(2, 1, 46, 'test', 1, 60, 2),
(3, 1, 46, 'Masala dosa', 1, 90, 2),
(4, 1, 47, 'test', 1, 60, 2),
(5, 1, 47, 'Masala dosa', 1, 90, 2),
(6, 1, 47, 'White sauce pasta', 1, 80, 2),
(7, 1, 47, 'White sauce pasta', 1, 80, 2),
(8, 1, 47, 'Medu Vada', 1, 75, 2),
(9, 1, 47, 'test', 1, 60, 2),
(10, 1, 47, 'Masala dosa', 1, 90, 2),
(11, 1, 48, 'dalal', 1, 10, 2),
(12, 1, 48, 'test', 1, 60, 2),
(13, 1, 49, 'test', 1, 60, 2),
(14, 1, 50, 'dalal', 1, 10, 2),
(15, 1, 51, 'desert', 1, 1000, 2),
(16, 8, 52, 'ves', 1, 20, 2),
(17, 8, 52, 'test', 1, 60, 2),
(18, 1, 53, 'desert', 1, 1000, 2),
(19, 1, 53, 'Masala dosa', 1, 90, 2),
(20, 1, 54, 'Masala dosa', 1, 90, 2),
(21, 1, 55, 'Masala dosa', 1, 90, 2),
(22, 1, 55, 'Samosa', 1, 15, 2),
(23, 1, 56, 'Masala dosa', 1, 90, 2),
(24, 1, 57, 'Masala dosa', 1, 90, 2),
(25, 1, 57, 'Masala dosa', 1, 90, 2),
(27, 1, 58, 'Masala dosa', 1, 90, 2),
(28, 1, 58, 'Samosa', 1, 15, 2),
(29, 1, 59, 'Medu Vada', 1, 75, 2),
(30, 1, 59, 'Momos', 1, 50, 2),
(31, 1, 60, 'Veg sandwich', 1, 60, 2),
(32, 1, 60, 'Vadapav', 1, 12, 2),
(35, 1, 61, 'Veg sandwich', 1, 60, 2),
(36, 1, 61, 'Vadapav', 1, 12, 2),
(37, 1, 61, 'Mexican Pizza', 1, 90, 2),
(38, 1, 62, 'White sauce pasta', 1, 80, 2),
(39, 1, 63, 'Veg sandwich', 1, 60, 2),
(40, 1, 63, 'Vadapav', 1, 12, 2),
(41, 1, 65, 'Veg sandwich', 1, 60, 2),
(42, 1, 65, 'Vadapav', 1, 12, 2),
(47, 1, 67, 'Veg sandwich', 1, 60, 2),
(48, 1, 67, 'Momos', 1, 50, 2),
(49, 9, 66, 'Momos', 1, 50, 2),
(50, 1, 67, 'Veg sandwich', 1, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `order_id`, `user_id`, `description`) VALUES
(1, 50, 1, 'good'),
(2, 58, 1, 'food good'),
(3, 58, 1, ',ndj'),
(4, 63, 1, 'Amazing food'),
(5, 63, 1, 'nfnlkff');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `food_type` varchar(30) NOT NULL,
  `food_desc` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1 COMMENT '(1:Yes, 0:No)',
  `food_image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `name`, `food_type`, `food_desc`, `cost`, `availability`, `food_image`) VALUES
(1, 'Veg sandwich', 'Indian', 'Vegetable sandwich is a type of vegetarian sandwich consisting of various vegetables which may include mushrooms and cheese', 60, 1, 'images/veg.jpg'),
(2, 'Vadapav', 'Indian', 'Vada pav, alternatively spelt vada pao, wada pav, or wada pao, is a vegetarian fast food dish native to the state of Maharashtra.', 12, 1, 'images/vada-pav-recipe-1a.jpg'),
(3, 'Mexican Pizza', 'Mexican', 'Mexican Pizzas are delicious corn tortillas topped with beans, beef and all the delicious taco toppings.', 90, 1, 'images/taco-pizza-recipe-003.jpg'),
(4, 'Masala dosa', 'Indian', 'It is made from rice, lentils, potato, methi, and curry leaves, and served with chutneys and sambar', 85, 1, 'images/masala.jpg'),
(5, 'Samosa', 'Indian', 'A samosa is a fried or baked pastry with a savoury filling, such as spiced potatoes, onions, peas, m', 15, 1, 'images/61050397.jpg'),
(6, 'Momos', 'Chinese', 'Momos is a type of South Asian dumpling, popular across the Indian subcontinent and the Himalayan regions of broader South Asia.', 50, 1, 'images/momos.jpg'),
(7, 'Paneer Chilli', 'Chinese', 'A popular Indo-Chinese made by seasoning fried Indian cottage cheese and in chilli sauce!!', 90, 1, 'images/chilli-paneer.jpg'),
(8, 'White sauce pasta', 'Italian', 'Pasta is a type of food typically made from an unleavened dough of durum wheat flour mixed with wate', 80, 1, 'images/white-sauce-pasta.jpg'),
(9, 'Medu Vada', 'South Indian', 'Medu vada is a South Indian fritter made from Vigna mungo. It is usually made in a doughnut shape, with a crispy exterior and soft interior.', 75, 1, 'images/medu.jpg'),
(10, 'Schezwan Noodles ', 'Chinese', 'Schezwan noodles is a spicy and tasty stir fried vegetable noodles with schezwan sauce', 80, 1, 'images/noodles.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `order_type` varchar(30) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `pay` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_status`, `date`, `user_id`, `stat`, `order_type`, `total`, `pay`, `address`) VALUES
(50, 5, '2019-10-23', 1, 2, 'pick', 10, 'cash', ''),
(58, 5, '2019-10-24', 1, 2, 'deliver', 105, 'cash', '509'),
(59, 4, '2019-10-24', 1, 2, 'pick', 125, 'cash', ''),
(60, 4, '2019-10-25', 1, 2, 'pick', 72, 'wallet', ''),
(61, 5, '2019-10-25', 1, 2, 'pick', 162, 'cash', ''),
(62, 3, '2019-10-30', 1, 2, 'deliver', 80, 'wallet', 'III/28'),
(63, 5, '2019-10-30', 1, 2, 'pick', 72, 'cash', ''),
(64, 3, '2019-11-06', 1, 1, 'pick', 0, 'cash', ''),
(65, 3, '2019-10-31', 1, 2, 'pick', 72, 'wallet', ''),
(66, 4, '2019-11-06', 9, 2, 'deliver', 50, 'cash', '510'),
(67, 3, '2019-11-06', 1, 2, 'pick', 170, 'cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `wallet` int(11) NOT NULL,
  `roles` int(1) NOT NULL DEFAULT 0 COMMENT '0-user 1-admin 2-manager',
  `loggedin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone`, `pass`, `wallet`, `roles`, `loggedin`) VALUES
(1, 'Prithvi Amin', '2017.prithvi.amin@ves.ac.in', '8291521204', 'abc', 101, 0, 0),
(2, 'Shubham Kelkar', '2017.shuham.kelkar@ves.ac.in', '8149269067', 'abc', 0, 1, 2),
(3, 'Jay Pakale', '2017.jay.pakale@ves.ac.in', '895623752', 'abc', 0, 2, 0),
(4, 'Jane Doe', '2017.jane.doe@ves.ac.in', '2147483647', 'abc', 0, 0, 0),
(5, 'John Doe', '2017.john.doe@ves.ac.in', '2147483647', 'abc', 0, 0, 0),
(7, 'Pranal Amin', 'pranal.amin@gmail.com', '8097762394', 'anc', 0, 0, 0),
(8, 'Sparsh Prabhakar', '2017.sparsh.prabhakar@ves.ac.in', '9004251621', 'abc', 900, 0, 0),
(9, 'Ria Bahrani', '2017.ria.bahrani@ves.ac.in', '9856321478', 'abc', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `sr_no` (`sr_no`),
  ADD KEY `fk_user_2` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `fk_order_1` (`order_id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_order_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
