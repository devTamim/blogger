-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 10:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogbuzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'category-1', NULL, NULL, NULL),
(2, NULL, 'category-1', NULL, NULL, NULL),
(3, NULL, 'category-1', NULL, NULL, NULL),
(4, NULL, 'category-1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `seo_title`, `description`, `created_at`, `updated_at`, `image`) VALUES
(35, 1, 1, 'Quae quis cupiditate', NULL, 'Quae quis cupiditate', '2022-03-14 20:36:22', NULL, 'image/Dhff3Eft/cantine.jpeg'),
(36, 9, 1, 'Quaerat consequatur hello', NULL, 'Quaerat consequatur hello Quaerat consequatur hello Quaerat consequatur hello v Quaerat consequatur hello vQuaerat consequatur hello Quaerat consequatur hello Quaerat consequatur hello Quaerat consequatur hello', '2022-03-14 20:36:15', NULL, 'image/3CUMAap1/libarary.jpg'),
(37, 31, 1, 'Aspernatur qui archi', NULL, 'Molestiae ut quo ali', '2022-03-14 20:36:04', NULL, 'image/cyRaOJO3/course-1.jpg'),
(38, 10, 1, 'Itaque voluptas ut d', NULL, 'Debitis qui a occaec Debitis qui a occaec  Debitis qui a occaec  Debitis qui a occaec Debitis qui a occaec Debitis qui a occaec Debitis qui a occaec vvDebitis qui a occaec Debitis qui a occaec Debitis qui a occaec Debitis qui a occaec Debitis qui a occaec ', '2022-03-14 20:35:30', NULL, 'image/eOEf01tj/cantine.jpg'),
(40, 1, 1, 'Hello rest', NULL, 'Magnam odit ab neces', '2022-03-14 21:25:25', NULL, 'image/vc1swdWr/IMG_6963-removebg-preview.png'),
(41, 1, 1, 'Tempor nulla optio ', NULL, 'Accusantium consequu\r\nAccusantium consequu\r\nAccusantium consequu\r\nAccusantium consequu\r\nAccusantium consequu\r\nAccusantium consequu', '2022-03-14 21:33:11', NULL, 'image/8W1H46O7/01.jpg'),
(42, 1, 3, 'Delectus est dolore', NULL, 'Occaecat ratione tem', '2022-03-14 21:34:51', NULL, 'image/9FBOb8we/cHbjS.jpg'),
(43, NULL, 0, 'Saepe velit fugiat a', NULL, 'Qui enim laboriosam', '2022-03-14 21:35:56', NULL, 'image/9yqj3S3I/screencapture-file-C-Users-hp-Desktop-bootstrap-using-index-html-2022-02-01-23_25_44.png'),
(44, 10, 4, 'Est ipsam laborum qu', NULL, 'Repellendus Consect', '2022-03-14 21:37:49', NULL, 'image/GOGlHJhy/screencapture-127-0-0-1-8000-posts-2022-03-04-00_05_21.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Tamim', 'user@email.com', 'user@email.com', '2022-02-26 17:39:52', NULL),
(3, 'test', 'test@gmail.com', 'twst', '2022-02-26 17:41:43', NULL),
(4, 'Ahmed Tamim', 'tamim@gmail.com', 'joy19050', '2022-02-26 18:00:17', NULL),
(6, 'joy', 'tamimj@gmail.com', 'joy19050', '2022-02-26 18:25:53', NULL),
(7, '1232', 'testtwue@gmail.com', '12345678', '2022-02-26 18:26:23', NULL),
(8, 'company', 'users@email.com', '$2y$10$reH2fMfdtW0HakOI2svIDOrYBNyFdktO/sWElDOJtIf0XmjRarJx.', '2022-02-26 18:35:04', NULL),
(9, 'Ahmed Tamim', 'watumel@mailinator.com', '$2y$10$Ho7U833UjaErD/DK5NqeB.FgIpc5lcwf/2dUQNFs6srJ1IEdvSD5i', '2022-03-08 06:31:12', NULL),
(10, 'Ahmed Tamimn', 'bexe@mailinator.com', '$2y$10$xc2N6BFAmB930w00VveZ5Om3exOftY8lxB/0sgyd0LmUUgvS9lofy', '2022-03-08 15:18:04', NULL),
(11, 'fanyriwe@mailinator.com', 'sesydutu@mailinator.com', '$2y$10$nCqhyvAX1uY//Xycb3hPDONWuXYRYQKaJTmXR6uyqLqoNOgvhQ79i', '2022-03-08 04:42:27', NULL),
(12, 'sowuqa@mailinator.com', 'kyfy@mailinator.com', '$2y$10$WHuH3or4uQD9oCntEfLcr.YrTlDZxB/kq8cUux/VK/kBnOMIduBjm', '2022-03-08 04:42:40', NULL),
(13, 'kodadat@mailinator.com', 'quvupif@mailinator.com', '$2y$10$OBvf/jT2jcBpud2j9aDOtu93A5sBtT06c529QgfYqWzFevtG3NQLu', '2022-03-08 04:43:38', NULL),
(14, 'dobaxaxavy@mailinator.com', 'kuvahefezy@mailinator.com', '$2y$10$XRsLbDIXA.jhM.gYvCzy7Oizb4xK37nYsrnhG09.ICH8iKmp1kWkO', '2022-03-08 04:44:53', NULL),
(15, 'kojasery@mailinator.com', 'myguteju@mailinator.com', '$2y$10$5UGJTu.tbrDkDF0IOgVioesSnP1uubL0TXyTo3LI6bq8QAEcK87qG', '2022-03-08 04:45:10', NULL),
(16, 'zohu@mailinator.com', 'kapad@mailinator.com', '$2y$10$31ZfCwZUUGsfSKIm4tk/2O9OTfBlkfY55Pfx9Y7vAJ4AcV9jU02AS', '2022-03-08 04:45:25', NULL),
(17, 'cuzibisu@mailinator.com', 'goxufowazi@mailinator.com', '$2y$10$2Jov1BPO5d.5UpHn4YS6veKxCbzNyahBqicjPO85VwPV0N9PeXRb6', '2022-03-08 05:42:46', NULL),
(18, 'jyhosuka@mailinator.com', 'jonelosyqa@mailinator.com', '$2y$10$QYkzFI6GVvqZZ5ejz4xPq.FB8cm/dj4br7trYFldr/AdoX69xoPIO', '2022-03-08 05:46:07', NULL),
(19, 'qenelawi@mailinator.com', 'hahyfiqe@mailinator.com', '$2y$10$i9xo/kprc5o5Dca8NnuQCOHVYe1jT8wgMsQUDlxRnPRrkxMBCWdlq', '2022-03-08 06:19:51', NULL),
(20, 'qorafamox@mailinator.com', 'vykyp@mailinator.com', '$2y$10$UDKNsu5qXGtLNqt2b4zin.oo.ezrmalRZ3zFXFaHqBG5mzk2K.KxK', '2022-03-08 06:21:49', NULL),
(21, 'qytygyv@mailinator.com', 'qeraca@mailinator.com', '$2y$10$zQp5c4OEwNQLKjyOXdL/GOFr8eMXO7qd8UBFewGXLjKg8RkvsePnG', '2022-03-08 06:25:30', NULL),
(22, 'lyjo@mailinator.com', 'xixavuw@mailinator.com', '$2y$10$I8K0N7KzIQ.Luvhva0ry3.FGkIQJmosaGUWkxu3M9mg4KPW.4/cN.', '2022-03-08 06:26:23', NULL),
(23, 'dided@mailinator.com', 'nihupazobi@mailinator.com', '$2y$10$N8c7o5UoY2s9cn7vjcNymu0WZzDH5b6h/mJgMVODTIirej0r4AWCu', '2022-03-08 06:31:46', NULL),
(24, 'guna@mailinator.com', 'kyryjob@mailinator.com', '$2y$10$gM6WenFHSTKUZ5zRa0fSGu46ZU6PUt7tzg/li9/9XO.SmJH8Pahki', '2022-03-08 06:32:48', NULL),
(25, 'lojy@mailinator.com', 'tibesu@mailinator.com', '$2y$10$rnfIeBBWh5TzMHt/vMFyreAB6KRwnLIq.1uDknjs3A4GV2UTjoTRi', '2022-03-08 06:34:58', NULL),
(26, 'sacu@mailinator.com', 'lamuwodo@mailinator.com', '$2y$10$UIOg3lxn4f0OTIPlA4vVu.VPBTkYIFG/VTzpImxJXs0jy/xIm4IWi', '2022-03-08 06:36:18', NULL),
(27, 'babikig@mailinator.com', 'cuxawyle@mailinator.com', '$2y$10$d8PVSX/XY5P65DMzGDCfLemOp9wcz6qv0bwi3W68Mv8ilQlC/il2m', '2022-03-08 06:37:25', NULL),
(28, 'gycicogu@mailinator.com', 'wihif@mailinator.com', '$2y$10$cz23vGWtMneEz5gJsWKZJex023worWYuGgUV0wVqWqxXPQV4PBaqq', '2022-03-08 06:41:17', NULL),
(29, 'vinijawy@mailinator.com', 'pylaq@mailinator.com', '$2y$10$0QDl/i/yQCkDPYMr.jFmR.8DlBBKHGdHRJapnE1Jyz3xv2sCu1/ey', '2022-03-08 06:42:05', NULL),
(30, 'kohyge@mailinator.com', 'nuhaqy@mailinator.com', '$2y$10$sKTgUDqa9mSozuJuDTdgPOB3SXNL6LyxtWVeplx456cxfA396Issu', '2022-03-08 06:55:12', NULL),
(31, 'devicyjoqy@mailinator.com', 'sunyc@mailinator.com', '$2y$10$NnUwM3fz8HPEktrfuSfT7ugXWtgEE4xeR4GHqttvIKkq/Ubp/pL/q', '2022-03-08 07:23:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
