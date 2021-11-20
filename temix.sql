-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 09:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temix`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`booking_id`, `customer_name`, `customer_mail`, `customer_phone`, `request_date`, `service`, `appointment_date`, `appointment_address`, `notes`, `status`) VALUES
(30, 'Kelly Ikpefua', 'onostarkels@gmail.com', '07068897068', '2021-07-14', 'Event (Cake design)', '2021-07-30', '27 father healing street off ometan road', 'sdvcsd', 1),
(31, 'Bolu', 'bolu@gmail.com', '07068897068', '2021-07-14', 'General Appontment', '2021-07-19', '27 father healing street off ometan road', 'lklkl', 1),
(32, 'Chima James Onyema', 'mexylj@yahoo.com', '08067666729', '2021-07-14', 'General Appontment', '2021-08-12', '7 Osaigbovo street', 'I want to have ameeting for decoration', -1),
(33, 'Johnny Bravo', 'johny@gmail.com', '0998800099', '2021-07-16', 'Event (Decoration)', '2021-08-13', '24 iziegbe street, Benin city', 'You are aware of theese familiraity', -1),
(34, 'Kelly Ikpefua', 'onosta@kee.com', '08035761888', '2021-07-24', 'General Appontment', '2021-08-25', '24 iziegbe street, Benin city', 'keclmk;lk l;;l', 0),
(35, 'Kelly Brown', 'onosta@kee.com', '07068897068', '2021-07-25', 'Event (Cake design)', '2021-08-23', '24 iziegbe street, Benin city', 'getting a cade doen', 1),
(36, 'Kelly Brown', 'onosta@kee.com', '07068897068', '2021-07-25', 'Event (Cake design)', '2021-08-23', '24 iziegbe street, Benin city', 'getting a cade doen', 0),
(37, 'Cynthia Ikpefua', 'cy@gmail.com', '07088999000', '2021-07-25', 'Event (Cake design)', '2021-07-26', '23 nelson wiliams warri', 'bake my cake now', -1),
(38, 'Cynthia Ikpefua', 'cy@gmail.com', '07088999000', '2021-07-25', 'Event (Cake design)', '2021-07-26', '23 nelson wiliams warri', 'bake my cake now', 0),
(39, 'Paul James', 'paul@mem.com', '09034556688', '2021-07-25', 'General Appontment', '2021-08-27', '3 johnpaul street', 'slkdvjm lkal;ckl; lcl,l,  kl;l', 0),
(40, 'Chima James Onyema', 'mexylj@yahoo.com', '0998800099', '2021-07-25', 'Event (Decoration)', '2021-07-29', '23 rivers road, portharcourt', 'ii need a decoration of my event', 0),
(41, 'Chima James Onyema', 'mexylj@yahoo.com', '0998800099', '2021-07-25', 'Event (Decoration)', '2021-07-29', '23 rivers road, portharcourt', 'ii need a decoration of my event', 0),
(42, 'Kelly Ikpefua', 'onostarkels@gmail.com', '07068897068', '2021-07-28', 'Event (Cake design)', '2021-07-30', '27 father healing street off ometan road', 'just testing it', -1),
(43, 'Nkem Ayaolugu', 'nkem@yahoo.com', '0909090909', '2021-09-23', 'Event (Decoration)', '2021-10-30', 'ku plaza benin', 'i want a befiting decoration for my bday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_ads`
--

CREATE TABLE `banner_ads` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_ads`
--

INSERT INTO `banner_ads` (`banner_id`, `title`, `banner_description`, `photo`) VALUES
(1, 'Where Cakes Become Art', 'Get professional cakes for your birthdays, anniversaries, weddings, etc. We deliver to any part of the World', 'temix-empire-cakes.jpg'),
(2, 'Exclusive Events', 'We create your dream events at your pace', 'events_banner5.jpg'),
(3, 'Classic Beddings', 'Get The Best Bed Sheets Of All Types And Brands For The Best Prices. We Delivier Across Nigeria', 'bed6.jpg'),
(4, 'The Cake Specialist', 'Lets Give You That Cake You So Desire, For Your Events Or Parties, Any Day Any Where Across The Country', 'Temix_md.jpg'),
(5, '', '', 'rich_princess.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_name`, `quantity`, `item_price`, `customer_email`) VALUES
(63, 'Clasic Blue Sheet', 1, '5000', 'Bolu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(3, 'Cakes'),
(4, 'Ice Cream'),
(5, 'Snacks'),
(6, 'Others'),
(8, 'Bed Sheets');

-- --------------------------------------------------------

--
-- Table structure for table `daily_encounter`
--

CREATE TABLE `daily_encounter` (
  `encounter_id` int(11) NOT NULL,
  `total_customers` int(11) NOT NULL,
  `total_sales` int(11) NOT NULL,
  `encounter_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `foto` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `foto`, `description`, `media_type`, `upload_date`) VALUES
(1, 'bed_sheet.jpg', 'Party', 'Photo', '2021-07-12 16:17:39'),
(2, 'sponge_bob cake.jpg', 'Spongebob Cakes', 'Photo', '2021-07-13 11:42:18'),
(3, '8 Ways to Make Money as a Developer.mp4', 'Kkkk', 'Video', '2021-07-20 22:55:03'),
(6, 'Temix_md.jpg', 'Temix Boss', 'Photo', '2021-07-29 12:31:31'),
(7, '8 Ways to Make Money as a Developer.mp4', 'Testing Video', 'Video', '2021-07-29 12:35:50'),
(8, 'Turn an API into a Startup-! Build & Sell an API with JavaScript.mp4', 'Api Video', 'Video', '2021-07-29 12:39:13'),
(9, 'yt1s.com - Git  GitHub Crash Course For Beginners.mp4', 'Yamayama', 'Video', '2021-07-29 12:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_prize` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_price` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_foto` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_item` int(12) NOT NULL,
  `daily_deal` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_category`, `item_name`, `item_prize`, `previous_price`, `item_foto`, `item_description`, `featured_item`, `daily_deal`, `time_created`) VALUES
(18, 'Bed Sheets', 'Clasic Blue Sheet', '5000', '0', 'bedding_slide1.jpg', 'Just a regular', 1, 1, '2021-07-14 11:42:06'),
(19, 'Bed Sheets', 'Louis Vuiton Sheet', '5000', '0', 'bed_sheet.jpg', 'Louis vuiton classic', 1, 0, '2021-07-14 11:42:40'),
(20, 'Cakes', 'Spongebob Cakes', '10000', '0', 'sponge_bob cake.jpg', 'For the kids', 1, 0, '2021-07-14 11:43:21'),
(21, 'Cakes', 'Anniversary Cake', '10000', '15', 'cake_slide2.jpg', 'anniversayr loves', 0, 1, '2021-07-14 11:43:55'),
(22, 'Snacks', 'Hot Dog', '2000', '1500', 'chef-pee-special-hot-dog.jpeg', '', 1, 1, '2021-07-19 20:29:01'),
(23, 'Others', 'Burgers And Chips', '12000', '5000', 'chef-pee-special-cuisines2.jpg', '', 1, 1, '2021-07-21 08:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `notification_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `customer_email`, `subject`, `details`, `status`, `notification_date`) VALUES
(1, 'Onostarkels@gmail.com', 'Item Dispensed', 'Hello Kelly, your order with Order_number: 62220210718040715 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Temix Empire', 1, '2021-10-12 16:49:22'),
(2, 'Admin@temixempire.com', 'Item Dispensed', 'Hello Temix, your order with Order_number: 95020211012014155 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Temix Empire', 0, '2021-10-12 16:49:22'),
(3, 'Onostarkels@gmail.com', 'Order Cancelled', 'Hello Kelly, your order Hot Dog, with order number:  was cancelled. \n Kindly contact admin for more details. \n You can continue shopping.', 1, '2021-10-12 19:43:59'),
(4, 'gazelle@gmail.com', 'Checking correctness', 'If this work, i will be very happy', 1, '2021-10-13 12:49:31'),
(88, 'Onostarkels@gmail.com', 'Item Dispensed', 'Hello Kelly, your order Spongebob Cakes, with order number: 44120211020111718 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', 1, '2021-10-20 22:17:56'),
(89, 'Onostarkels@gmail.com', 'Item Dispensed', 'Hello Kelly, your order Anniversary Cake, with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', 1, '2021-10-20 22:20:22'),
(90, 'Onostarkels@gmail.com', 'Item Dispensed', 'Hello Kelly, your order Hot Dog, with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', 0, '2021-10-20 22:20:44'),
(91, 'Paulinhonavas@gmail.com', 'Item Dispensed', 'Hello Paul, your order Hot Dog, with order number: 95920211020112541 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', 1, '2021-10-20 22:26:52'),
(92, 'Paulinhonavas@gmail.com', 'Item Dispensed', 'Hello Paul, your order Burgers And Chips, with order number: 95920211020112541 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', 0, '2021-10-20 22:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_number` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_email`, `item_name`, `quantity`, `item_price`, `order_date`, `order_number`, `order_time`, `order_status`, `delivery_date`) VALUES
(35, 'Onostarkels@gmail.com', 'Louis Vuiton Sheet', 2, '10000', '2021-07-18', '62220210718040715', '2021-10-12 11:31:31', 1, '2021-10-12'),
(37, 'Bolu@gmail.com', 'Louis Vuiton Sheet', 1, '5000', '2021-07-18', '92720210718041038', '2021-07-24 06:15:09', 1, '2021-07-24'),
(38, 'Bolu@gmail.com', 'Louis Vuiton Sheet', 1, '5000', '2021-07-18', '40420210718041103', '2021-10-12 11:22:21', 1, '2021-10-12'),
(39, 'Bolu@gmail.com', 'Spongebob Cakes', 4, '40000', '2021-07-21', '70420210721095710', '2021-07-23 15:03:48', 1, '2021-07-23'),
(40, 'Onostarkels@gmail.com', 'Hot Dog', 1, '1500', '2021-07-21', '72820210721095838', '2021-07-21 09:14:14', 1, '2021-07-21'),
(41, 'Victoryikpefua@gmail.com', 'Spongebob Cakes', 1, '10000', '2021-08-08', '120210808100737', '2021-10-12 11:08:57', 1, '2021-10-12'),
(42, 'Onostarkels@gmail.com', 'Spongebob Cakes', 1, '10000', '2021-09-23', '95220210923104910', '2021-10-12 11:08:36', 1, '2021-10-12'),
(43, 'Onostarkels@gmail.com', 'Spongebob Cakes', 1, '10000', '2021-09-28', '38220210928101633', '2021-10-12 11:06:49', 1, '2021-10-12'),
(44, 'Paulinhonavas@gmail.com', 'Clasic Blue Sheet', 1, '5000', '2021-09-28', '45020210928103859', '2021-10-12 11:04:26', 1, '2021-10-12'),
(45, 'Cy@gmail.com', 'Clasic Blue Sheet', 1, '5000', '2021-10-10', '58620211010103024', '2021-10-12 10:56:59', 1, '2021-10-12'),
(46, 'Cy@gmail.com', 'Clasic Blue Sheet', 1, '5000', '2021-10-10', '44320211010103102', '2021-10-12 10:45:24', 1, '2021-10-12'),
(47, 'Onostarkels@gmail.com', 'Hot Dog', 1, '1500', '0000-00-00', '', '2021-10-12 09:55:58', -1, '2021-10-12'),
(48, 'Onostarkels@gmail.com', 'Spongebob Cakes', 2, '20000', '2021-10-10', '97220211010022252', '2021-10-12 09:55:42', 1, '2021-10-12'),
(49, 'Onostarkels@gmail.com', 'Hot Dog', 2, '3000', '2021-10-12', '6020211012115703', '2021-10-12 09:59:01', -1, '2021-10-12'),
(50, 'Onostarkels@gmail.com', 'Spongebob Cakes', 1, '10000', '2021-10-12', '6020211012115703', '2021-10-12 09:58:55', 1, '2021-10-12'),
(52, 'Admin@temixempire.com', 'Hot Dog', 2, '3000', '2021-10-12', '95020211012014155', '2021-10-12 11:42:09', 1, '2021-10-12'),
(53, 'Onostarkels@gmail.com', 'Hot Dog', 2, '3000', '0000-00-00', '', '2021-10-12 18:43:59', -1, '2021-10-12'),
(54, 'Onostarkels@gmail.com', 'Spongebob Cakes', 2, '20000', '2021-10-20', '44120211020111718', '2021-10-20 21:17:56', 1, '2021-10-20'),
(58, 'Paulinhonavas@gmail.com', 'Hot Dog', 2, '3000', '2021-10-20', '95920211020112541', '2021-10-20 21:26:52', 1, '2021-10-20'),
(59, 'Paulinhonavas@gmail.com', 'Burgers And Chips', 2, '10000', '2021-10-20', '95920211020112541', '2021-10-20 21:27:03', 1, '2021-10-20'),
(60, 'Paulinhonavas@gmail.com', 'Burgers And Chips', 3, '36000', '2021-10-31', '42020211031021459', '2021-10-31 13:14:59', 0, '0000-00-00'),
(61, 'Paulinhonavas@gmail.com', 'Hot Dog', 2, '4000', '2021-10-31', '42020211031021459', '2021-10-31 13:14:59', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `user_password`, `phone_number`, `address`, `city`, `subscriber`) VALUES
(1, 'Kelly', 'Ikpefua', 'onostarkels@gmail.com', 'ymcmbher0', '07068897068', 'Okabere road, Off Sapele road', 'Benin', 1),
(2, 'Paul', 'Ikpefua', 'paulinhonavas@gmail.com', 'paulinhonavas', '07057456881', '27 father hilly street off ometan road', 'Warri', 0),
(3, 'Temix', 'Empire', 'admin@temixempire.com', 'temidayo', '09023140300', '123 Jakpa Road', 'Warri', 0),
(4, 'Taiwo', 'Oni', 'bolu@gmail.com', 'bolu123', '0908989', 'Pz road Off sapele road', 'Benin', 1),
(5, 'Cynthia', 'Ikpefua', 'cy@gmail.com', 'cygracious', '089889', '', '', 0),
(6, 'James', 'Onyema', 'mexylj@yahoo.com', 'ymcmbher0', '07057456881', '', '', 0),
(7, 'Victory', 'Ikpefua', 'victoryikpefua@gmail.com', 'victory12345', '0990000', '', '', 0),
(8, 'Toyin', 'Faniran', 'gazelle@gmail.com', 'gazelle', '08100653703', 'Okabere', 'Benin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `banner_ads`
--
ALTER TABLE `banner_ads`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `daily_encounter`
--
ALTER TABLE `daily_encounter`
  ADD PRIMARY KEY (`encounter_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `banner_ads`
--
ALTER TABLE `banner_ads`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daily_encounter`
--
ALTER TABLE `daily_encounter`
  MODIFY `encounter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
