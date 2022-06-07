-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220523.649d9b34ea
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 01:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpusin`
--

-- --------------------------------------------------------

--
-- Table structure for table `amercements`
--

CREATE TABLE `amercements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amercement_trx_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `amercements`
--
DELIMITER $$
CREATE TRIGGER `generate_amercement_number` BEFORE INSERT ON `amercements` FOR EACH ROW BEGIN
                    INSERT INTO sequence_booking_number VALUES (NULL);
                    SET NEW.amercement_trx_no = CONCAT("FN-",DATE_FORMAT(CURDATE(), "%Y%m%d"),"",LPAD(LAST_INSERT_ID(), 5, "0")); 
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `trx_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_date` date DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `isBooked` tinyint(1) DEFAULT NULL,
  `isBack` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `bookings`
--
DELIMITER $$
CREATE TRIGGER `generate_booking_number` BEFORE INSERT ON `bookings` FOR EACH ROW BEGIN
                    INSERT INTO sequence_booking_number VALUES (NULL);
                    SET NEW.trx_number = CONCAT("BOOK-",DATE_FORMAT(CURDATE(), "%Y%m%d"),"",LPAD(LAST_INSERT_ID(), 5, "0")); 
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER INSERT ON `bookings` FOR EACH ROW BEGIN
                    UPDATE books
                    SET stock = stock - 1
                    WHERE id = NEW.book_id ;
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `library_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOnline` tinyint(1) NOT NULL,
  `pdfLocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `amercement_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `created_at`, `updated_at`, `library_id`, `title`, `description`, `imgLocation`, `author`, `publisher`, `isOnline`, `pdfLocation`, `stock`, `amercement_price`) VALUES
(1, '2022-06-05 10:02:11', '2022-06-05 10:02:11', 2, 'Laut Bercerita', 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.', 'book1.png', 'Leila S. Chudori', 'Gramedia', 0, NULL, 2, 3000),
(2, '2022-06-05 10:02:11', '2022-06-05 10:02:11', 1, 'Gadis Kretek', 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.', 'book2.png', 'Ratih Kumala', 'Gramedia', 0, NULL, 2, 3000),
(3, '2022-06-05 10:02:11', '2022-06-05 10:02:11', 1, 'Amba', 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.', 'book1.png', 'Laksmi Pamuntjak', 'Gramedia', 0, NULL, 3, 3000),
(4, '2022-06-05 10:02:11', '2022-06-05 10:02:11', 1, 'Orang Orang Proyek', 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.', 'book1.png', 'Ahmad Tohari', 'Gramedia', 0, NULL, 3, 4000),
(5, '2022-06-05 10:02:11', '2022-06-05 10:02:11', 1, 'Orang Orang Proyek', 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.', 'book1.png', 'Ahmad Tohari', 'Gramedia', 0, NULL, 3, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `library_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `library_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgLocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `created_at`, `updated_at`, `library_name`, `library_desc`, `location`, `imgLocation`, `user_id`, `is_active`) VALUES
(1, '2022-06-05 10:02:05', '2022-06-05 10:02:05', 'Perpustakaan Kota', 'Ut proident nostrud cupidatat nisi aliquip cupidatat labore consectetur incididunt minim.', 'Jl. Surabaya', 'perpustakaan1.jpg', 1, 1),
(2, '2022-06-05 10:02:05', '2022-06-05 10:02:05', 'Perpustakaan Unesa', 'Ut proident nostrud cupidatat nisi aliquip cupidatat labore consectetur incididunt minim.', 'Jl. Lidah Wetan, Unesa Kampus Utama', 'perpustakaan1.jpg', 2, 1),
(3, '2022-06-06 00:35:51', '2022-06-06 00:35:51', 'Perpustakaan SMP 3 Surabaya', 'perpustakaan ini merupakan perpustakaan yang ada di smp dan bisa di akses oleh umum', 'Jl. Kertajaya', 'perpustakaan1.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_29_152138_create_amercement_table', 1),
(6, '2022_05_29_153909_create_booking_table', 1),
(7, '2022_05_29_154337_create_carts_table', 1),
(8, '2022_05_29_154549_create_library_table', 1),
(9, '2022_05_29_154919_create_books_table', 1),
(10, '2022_06_02_004959_sequence_booking_number', 1),
(11, '2022_06_02_005208_generate_booking_number', 1),
(12, '2022_06_02_005412_sequence_amercement_number', 1),
(13, '2022_06_02_005517_generate_amercement_number', 1),
(14, '2022_06_02_224435_trigger_updated_stock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sequence_amercement_number`
--

CREATE TABLE `sequence_amercement_number` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sequence_booking_number`
--

CREATE TABLE `sequence_booking_number` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `poin`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Perpustakaan Kota', 'perpuskota@gmail.com', NULL, '$2y$10$.8tfHKLvaltmJZpGpmgJMeoQIj9hIus92G4CaWQgwcHddZijCg.Uq', 2, 0, 1, NULL, '2022-06-05 10:01:56', '2022-06-05 10:01:56'),
(2, 'Perpustakaan Unesa', 'perpusunesa@gmail.com', NULL, '$2y$10$HKV4syVf9yIkCeBr1qOHHu30bnLfmop/nMqlqCgyv95GPEC.6lYBK', 2, 0, 1, NULL, '2022-06-05 10:01:56', '2022-06-05 10:01:56'),
(3, 'Administrator', 'admin@admin.com', NULL, '$2y$10$R2N3L8Fb4NWjW4wht05pMuGnDCI.ZMnYg2hJXWpWH3czbofxRbzJi', 1, 0, 1, NULL, '2022-06-05 10:01:57', '2022-06-05 10:01:57'),
(4, 'admin2', 'admin2@admin.com', NULL, '$2y$10$c0AI8ZBJxCtD8DFN0mhlR.lNQ9WBiL0E11a752yfB1u0gd8fKO/QG', 1, 0, 1, NULL, '2022-06-05 11:23:45', '2022-06-05 11:23:45'),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$CS1EAJAMlwMj4pCH91xSmu.834cwz.3ejAXKCXoyd7Dd/CYDilYEq', 2, 0, 0, NULL, '2022-06-05 11:43:48', '2022-06-05 11:43:48'),
(6, 'bagas12dwi_', 'bag12dwi.s@gmail.com', NULL, '$2y$10$ImRMkCjibqanaI.8v7MpO.g1egU6.MWBf5mIjF3HQIgpYGbfkYW.O', 3, 0, 1, NULL, '2022-06-06 01:02:47', '2022-06-06 01:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amercements`
--
ALTER TABLE `amercements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sequence_amercement_number`
--
ALTER TABLE `sequence_amercement_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence_booking_number`
--
ALTER TABLE `sequence_booking_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amercements`
--
ALTER TABLE `amercements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sequence_amercement_number`
--
ALTER TABLE `sequence_amercement_number`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sequence_booking_number`
--
ALTER TABLE `sequence_booking_number`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



