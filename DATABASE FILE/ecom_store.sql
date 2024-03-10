-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_about`) VALUES
(2, 'Administrators', 'admin@mail.com', 'Password@123', 'user-profile-min.png', '7777775500', '  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical  '),
(3, 'testing admin name', 'admintesting@gmail.com', 'admin123', 'drwhite.png', 'sample contact', 'working as sample description ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cat_id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(2, 'Female', 'feminelg.png'),
(3, 'Kids', 'kidslg.jpg'),
(4, 'Others', 'othericon.png'),
(5, 'Men', 'malelg.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'ecomstore@mail.com', 'Contact  To Us', 'If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(5, 8, 'Sale', '10', 'CASTRO', 2, 1),
(6, 14, 'Sale', '65', 'CODEASTRO', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `age` int(50) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_confirm_code` text NOT NULL,
  `business_type` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `location`, `age`, `customer_address`, `customer_image`, `customer_confirm_code`, `business_type`, `status`) VALUES
(2, 'user', 'user@ave.com', '123', '0092334566931', '', 0, 'new york', 'user.jpg', '', '', ''),
(3, 'Demo Customer', 'demo@customer.com', 'Password123', '700000000', '', 0, 'DemoAddress', 'sample_image.jpg', '', '', ''),
(4, 'Thomas', 'thomas@demo.com', 'Password123', '777777777', '', 0, '111 Address', 'sample_img360.png', '1427053935', '', ''),
(5, 'Fracis', 'test@customer.com', 'Password123', '780000000', '', 0, '112 Bleck Street', 'userav-min.png', '1634138674', '', ''),
(6, 'Sample Customer', 'customer@mail.com', 'Password123', '7800000000', '', 0, 'Sample Address', 'user-icn-min.png', '174829126', '', ''),
(7, 'Young', 'young@gmail.com', 'Young12345678', 'sample contact', '', 0, 'sample address', 'drwhite.png', '102551234', '', ''),
(8, 'code', 'code@gmail.com', 'Codemaster1874', '098765432', '', 0, 'sample', 'drwhite.png', '1819402588', '', ''),
(9, 'firs', 'first_customer@gmail.com', 'F123456789', 'sample contact', '', 0, 'Sample photographer', 'drwhite.png', '', '', ''),
(10, 'final name', 'final@gmail.com', 'final123456789', 'sample photographer', '', 0, 'sample address', 'favicon-nis.png', '', 'Photographer', 'Inactive'),
(11, 'first_quest', 'guest@gmail.com', 'g1234', 'guset contact', '', 0, 'guest address', 'FB_IMG_16594815455054147.jpg', '', 'Guest', 'Active'),
(12, 'dee', 'kiki@gmail.com', 'kiki##33', '09089787677', '', 0, 'gkhk', 'mum_dad.jpg', '', 'Guest', 'Inactive'),
(13, 'sample cutomer2', 'customer2@gamil.com', 'customer2', '09089787677', '', 0, 'sample address2', 'hat.jpg', '', 'Photographer', 'Active'),
(14, 'firstestingname', 'testing@gmail.com', '12345678', '8974783774', '', 0, 'sample address', 'FB_IMG_16594815923216699.jpg', '', 'Hair Stylish', 'Active'),
(15, 'Keziah', 'keziah@gamil.com', '123456', '8575847484', 'Kaduna', 20, 'Makurdi', 'lady_stands.jpg', '', 'Guest', 'Inactive'),
(16, 'customer name', 'customer@gmail.com', '123456', 'sample contact2', 'Makurdi', 25, 'Makurdi', 'mum_dad.jpg', '', 'Guest', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(17, 2, 100, 1715523401, 2, 'Large', '2017-02-20 08:21:42', 'pending'),
(23, 3, 20, 1762810884, 1, 'Medium', '2021-09-14 08:35:57', 'Complete'),
(24, 4, 100, 1972602052, 1, 'Large', '2021-09-14 16:37:52', 'Complete'),
(25, 4, 90, 2008540778, 1, 'Medium', '2021-09-14 16:43:15', 'pending'),
(27, 5, 120, 2138906686, 1, 'Small', '2021-09-15 03:18:41', 'Complete'),
(28, 5, 180, 361540113, 2, 'Medium', '2021-09-15 03:25:42', 'Complete'),
(29, 3, 100, 858195683, 1, 'Large', '2021-09-15 03:14:01', 'Complete'),
(31, 6, 245, 901707655, 1, 'Medium', '2021-09-15 03:52:18', 'Complete'),
(32, 6, 75, 2125554712, 1, 'Large', '2021-09-15 03:52:58', 'pending'),
(33, 7, 180, 1224634593, 2, 'Select a Size', '2023-05-18 06:54:35', 'pending'),
(34, 8, 0, 1541406815, 0, 'Select a Size', '2023-05-20 06:26:24', 'pending'),
(35, 8, 0, 1541406815, 0, 'Select a Size', '2023-05-20 06:26:24', 'pending'),
(36, 8, 0, 1541406815, 0, 'Select a Size', '2023-05-20 06:26:24', 'pending'),
(37, 8, 225, 1541406815, 3, 'Small', '2023-05-20 06:30:07', 'Complete'),
(38, 8, 0, 1541406815, 0, 'Select a Size', '2023-05-20 06:26:24', 'pending'),
(39, 11, 264, 1744670772, 3, 'Medium', '2023-05-22 19:27:50', 'pending'),
(40, 11, 10000, 732533789, 2, 'Small', '2023-05-28 11:01:18', 'pending'),
(41, 11, 264, 890803796, 3, 'Medium', '2023-05-28 11:32:58', 'pending'),
(42, 11, 9000, 644627930, 2, 'Large', '2023-05-28 11:36:24', 'pending'),
(43, 13, 120000, 1552565135, 2, 'Medium', '2023-07-06 13:16:02', 'Complete'),
(44, 13, 4500, 89932156, 1, 'Small', '2023-07-05 21:00:04', 'pending'),
(45, 13, 6000, 89932156, 1, 'Medium', '2023-07-05 21:00:04', 'pending'),
(46, 13, 120000, 89932156, 2, 'Medium', '2023-07-05 21:00:04', 'pending'),
(47, 13, 13500, 1341492528, 3, 'Small', '2023-07-06 13:06:18', 'pending'),
(48, 13, 300, 1341492528, 2, 'Small', '2023-07-06 13:06:18', 'pending'),
(49, 13, 100, 1341492528, 2, 'Small', '2023-07-06 13:06:18', 'pending'),
(50, 16, 1200, 552353942, 1, 'Small', '2023-07-12 13:12:16', 'pending'),
(51, 16, 4500, 552353942, 1, 'Small', '2023-07-12 13:12:16', 'pending'),
(52, 16, 88, 552353942, 1, 'Medium', '2023-07-12 13:12:17', 'pending'),
(53, 16, 9000, 552353942, 2, 'Small', '2023-07-12 13:12:17', 'pending'),
(54, 16, 90, 552353942, 1, 'Small', '2023-07-12 13:12:17', 'pending'),
(55, 16, 50, 552353942, 1, 'Small', '2023-07-12 13:12:18', 'pending'),
(56, 16, 245, 552353942, 1, 'Small', '2023-07-12 13:12:18', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_types`
--

CREATE TABLE `enquiry_types` (
  `enquiry_id` int(10) NOT NULL,
  `enquiry_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_types`
--

INSERT INTO `enquiry_types` (`enquiry_id`, `enquiry_title`) VALUES
(1, 'Order and Delivery Support'),
(2, 'Technical Support'),
(3, 'Price Concern');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_image`) VALUES
(2, 'Adidas', 'adilg.png'),
(3, 'Nike', 'niketransl.png'),
(4, 'Philip Plein', 'pplg.png'),
(5, 'Lacoste', 'lacostelg.png'),
(7, 'Polo', 'polobn.jpg'),
(8, 'Gildan 1800', 'sample_img360.png'),
(9, 'tesing manufacturer Edited', 'drwhite.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `payment_date`) VALUES
(2, 1607603019, 447, 'UBL/Omni', '11/1/2016'),
(3, 314788500, 345, 'UBL/Omni', '11/1/2016'),
(4, 6906, 400, 'Western Union', 'January 1'),
(5, 10023, 20, 'Bank Code', '09/14/2021'),
(6, 69088, 100, 'Bank Code', '09/14/2021'),
(7, 1835758347, 480, 'Western Union', '09-04-2021'),
(8, 1835758347, 480, 'Bank Code', '09-14-2021'),
(9, 1144520, 480, 'Bank Code', '09-14-2021'),
(10, 2145000000, 480, 'Bank Code', '09-14-2021'),
(20, 858195683, 100, 'Bank Code', '09-13-2021'),
(21, 2138906686, 120, 'Bank Code', '09-13-2021'),
(22, 2138906686, 120, 'Bank Code', '09-15-2021'),
(23, 361540113, 180, 'Western Union', '09-15-2021'),
(24, 361540113, 180, 'UBL/Omni', '09-15-2021'),
(25, 901707655, 245, 'Western Union', '09-15-2021'),
(26, 566464636, 400, 'Bank Code', '2023-05-20'),
(27, 984849, 4500, 'Bank Code', '12/05/2023');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(17, 2, 1715523401, '9', 2, 'Large', 'pending'),
(23, 3, 1762810884, '12', 1, 'Medium', 'Complete'),
(24, 4, 1972602052, '5', 1, 'Large', 'Complete'),
(25, 4, 2008540778, '13', 1, 'Medium', 'pending'),
(27, 5, 2138906686, '14', 1, 'Small', 'Complete'),
(28, 5, 361540113, '13', 2, 'Medium', 'Complete'),
(29, 3, 858195683, '5', 1, 'Large', 'Complete'),
(31, 6, 901707655, '8', 1, 'Medium', 'Complete'),
(32, 6, 2125554712, '15', 1, 'Large', 'pending'),
(33, 7, 1224634593, '13', 2, 'Select a Size', 'pending'),
(34, 8, 1541406815, '5', 0, 'Select a Size', 'pending'),
(35, 8, 1541406815, '13', 0, 'Select a Size', 'pending'),
(36, 8, 1541406815, '14', 0, 'Select a Size', 'pending'),
(37, 8, 1541406815, '15', 3, 'Small', 'Complete'),
(38, 8, 1541406815, '16', 0, 'Select a Size', 'pending'),
(39, 11, 1744670772, '15', 3, 'Medium', 'pending'),
(40, 11, 732533789, '17', 2, 'Small', 'pending'),
(41, 11, 890803796, '15', 3, 'Medium', 'pending'),
(42, 11, 644627930, '16', 2, 'Large', 'pending'),
(43, 13, 1552565135, '20', 2, 'Medium', 'Complete'),
(44, 13, 89932156, '16', 1, 'Small', 'pending'),
(45, 13, 89932156, '18', 1, 'Medium', 'pending'),
(46, 13, 89932156, '20', 2, 'Medium', 'pending'),
(47, 13, 1341492528, '16', 3, 'Small', 'pending'),
(48, 13, 1341492528, '12', 2, 'Small', 'pending'),
(49, 13, 1341492528, '9', 2, 'Small', 'pending'),
(50, 16, 552353942, '14', 1, 'Small', 'pending'),
(51, 16, 552353942, '16', 1, 'Small', 'pending'),
(52, 16, 552353942, '15', 1, 'Medium', 'pending'),
(53, 16, 552353942, '16', 2, 'Small', 'pending'),
(54, 16, 552353942, '13', 1, 'Small', 'pending'),
(55, 16, 552353942, '9', 1, 'Small', 'pending'),
(56, 16, 552353942, '8', 1, 'Small', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `service` varchar(50) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `age_range` varchar(20) NOT NULL,
  `product_location` varchar(255) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `service`, `manufacturer_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `age_range`, `product_location`, `product_desc`) VALUES
(5, 7, 5, '', 5, '2023-07-06 11:32:04', 'Denim Borg Lined Western Jacket', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-1-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-2-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0465-0064553-3-pdp_slider_l.jpg', 259, '10+', 'Kaduna', '\r\n\r\n<p>This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description.</p>\r\n\r\n'),
(8, 4, 2, 'Hair Stylish', 4, '2023-07-06 11:32:40', 'Sleeveless Flaux Fur Hybrid Coat', 'Black Blouse Versace Coat1.jpg', 'Black Blouse Versace Coat2.jpg', 'Black Blouse Versace Coat3.jpg', 245, '15+', 'Lagos', '\r\n\r\n\r\n\r\n<p>This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description.</p>\r\n\r\n\r\n\r\n'),
(9, 5, 4, 'Hair Stylish', 7, '2023-07-06 11:33:17', 'Long Sleeves Polo Shirt for Men', 'product-1.jpg', 'product-2.jpg', 'product-3.jpg', 50, '12 -', 'Makurdi', '\r\n\r\n\r\n\r\n\r\n<p>This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description. This is a sample product description.</p>\r\n\r\n\r\n\r\n\r\n'),
(12, 8, 5, 'Hair Stylish', 2, '2023-07-06 11:33:51', 'Ultraboost 21 PrimeBlue Shoes', 'lady_stands.jpg', 'Ultraboost_21_2.jpg', 'Ultraboost_21_3.jpg', 150, '25+', 'Kaduna', '\r\n\r\n\r\n\r\nThis product is made with Primeblue, a high-performance recycled material made in part with Parley Ocean Plastic. 50% of the upper is textile, 92% of the textile is Primeblue yarn. No virgin polyester.\r\n\r\n'),
(13, 9, 2, 'Hair Stylish', 3, '2023-07-06 11:34:47', 'Nike Sportswear Essential Collection', 'nike-s.jpg', 'nike-s2.jpg', 'nike-s02.jpg', 90, '25+', 'Lagos', '\r\n\r\n\r\nThis is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text. This is a sample text.\r\n\r\n\r\n\r\n\r\n'),
(14, 5, 5, 'Hair Stylish', 7, '2023-07-06 11:35:07', 'Demo Product Title Name - Test', 'hat.jpg', 'Prod-placeholder.jpg', 'Prod-placeholder.jpg', 1200, '30+', 'Kaduna', '\r\n\r\n\r\nThis is a demo. This is a demo. This is a demo. This is a demo.\r\n\r\n\r\n\r\n\r\n'),
(15, 5, 5, 'Hair Stylish', 8, '2023-07-06 11:35:36', 'Gildan 1800 Ultra Cotton Polo Shirt', 'g18bulk.jpg', 'g18bulk2.jpg', 'g18bulk3.jpg', 88, '25+', 'Abuja', '\r\n\r\nTHIS IS A DEMO DESCRIPTION\r\n\r\n'),
(16, 5, 2, 'Hair Stylish', 2, '2023-07-12 10:39:29', 'Testing title', 'shoes.jpg', 'drwhite.png', 'IMG_20211121_123753_7.jpg', 4500, '30', 'Makurdi', '\r\n\r\nsome description of sample t-shirt\r\n\r\n\r\n\r\n'),
(18, 10, 4, 'Photographer', 7, '2023-07-12 10:43:50', 'photographer title', 'lady_collects.jpg', 'lady_collects.jpg', 'lady_collects.jpg', 6000, '25', 'Kaduna', '\r\nbest photographer sample\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(4, 'Coats', 'no', 'coaticn.png'),
(5, 'T-Shirts', 'no', 'tshirticn.png'),
(6, 'Sweater', 'no', 'sweatericn.png'),
(7, 'jackets', 'yes', 'jacketicn.png'),
(8, 'Sneakers', 'yes', 'sneakericn.png'),
(9, 'Trousers', 'no', 'trousericn.png'),
(10, 'Sample product cat edited', '', 'FB_IMG_16594815923216699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `age` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `user_id`, `product_id`, `location`, `age`) VALUES
(1, 13, 16, '', 0),
(2, 12, 17, '', 0),
(3, 13, 17, 'Makurdi', 30),
(4, 13, 17, '', 0),
(5, 13, 17, '', 0),
(6, 13, 16, 'Makurdi', 30),
(7, 13, 16, '', 0),
(8, 13, 16, 'Makurdi', 30),
(9, 13, 16, '', 0),
(10, 13, 12, 'Makurdi', 30),
(11, 13, 9, 'Makurdi', 30),
(12, 15, 14, 'Makurdi', 30),
(13, 15, 16, 'Makurdi', 30),
(14, 14, 15, 'Makurdi', 25),
(15, 16, 16, 'Makurdi', 25),
(16, 16, 13, 'Lagos', 25),
(17, 16, 9, '', 0),
(18, 16, 8, 'Makurdi', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  MODIFY `enquiry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
