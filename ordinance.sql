-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 06:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Invironment', 1, NULL, '2020-07-08 02:31:10'),
(2, 'Health', 1, NULL, '2020-07-08 02:31:20'),
(3, 'Appropriation/Budget', NULL, NULL, '2020-07-08 02:31:44'),
(4, 'Public Utilities', 1, '2020-07-07 08:51:08', '2020-07-08 02:32:05'),
(5, 'Infrastructure', 1, '2020-07-07 08:51:22', '2020-07-08 02:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `history_ordinances`
--

CREATE TABLE `history_ordinances` (
  `id` int(11) NOT NULL,
  `ordinance_number` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_approved` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ordinance_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_ordinances`
--

INSERT INTO `history_ordinances` (`id`, `ordinance_number`, `title`, `date_approved`, `status`, `category`, `uploaded_file`, `uploaded_by`, `created_at`, `updated_at`, `ordinance_id`, `remarks`) VALUES
(1, 'asd-1234', 'title', '2020-07-07', 'Approved', 'asdasd', '/attachments/1594114439_MerchandisingMobileApp.pdf', 1, '2020-07-07 09:45:00', '2020-07-07 09:45:00', 2, 'asdasd'),
(2, '61', 'RESOLUTION CREATING THE POSITION OF MUN. SOCIAL WELFARE OFFICER IV OF SAN QUINTIN, P ANGASINAN.', '2000-08-29', 'Approved', 'Invironment', '/attachments/1594256995_doc00329920200708024431.pdf', 2, '2020-07-09 01:11:21', '2020-07-09 01:11:21', 10, NULL),
(3, '09', 'AN ORDINANCE ADOPTING THE PUBLIC INVESTMENT PROGRAM CY-2003 (AIP-General) OF THE MUNICIPALITY OF SAN QUINTIN, P ANGASINAN. ·', '2002-12-02', 'Approved', 'Invironment', '/attachments/1594261649_1doc00332820200708031825.pdf', 2, '2020-07-09 02:37:41', '2020-07-09 02:37:41', 28, NULL),
(4, '03', 'AN ORDINANCE REGULATING THE SELLING AND DRINKING OF LIQUOR FROM 10:00 IN THE EVENING TO 5:00 IN THE MORNING AND PROVIDING PENALTY FOR VIOLATION THEREOF', '2002-02-04', 'Approved', 'Invironment', '/attachments/1594265657_8doc00333520200708032208.pdf', 2, '2020-07-09 04:32:30', '2020-07-09 04:32:30', 35, NULL),
(5, '03', 'AN ORDINANCE REGULATING THE SELLING AND DRINKING OF LIQUOR FROM 10:00 IN THE EVENING TO 5:00 IN THE MORNING AND PROVIDING PENALTY FOR VIOLATION THEREOF', '2002-02-04', 'Approved', 'Invironment', '/attachments/1594265580_7doc00333420200708032143.pdf', 2, '2020-07-09 04:34:33', '2020-07-09 04:34:33', 34, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordinances`
--

CREATE TABLE `ordinances` (
  `id` int(11) NOT NULL,
  `ordinance_number` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_approved` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordinances`
--

INSERT INTO `ordinances` (`id`, `ordinance_number`, `title`, `date_approved`, `status`, `category`, `uploaded_file`, `uploaded_by`, `created_at`, `updated_at`, `remarks`) VALUES
(1, 'asd-123', 'ordinansya para sa puso mo', '2020-07-14', 'Approved', 'c', '/attachments/1594113651_MyDayPortalUserGuide22MAY2020(1).pdf', 1, '2020-07-07 09:20:51', '2020-07-07 09:20:51', 'testing lang'),
(2, 'asd-12345', 'title', '2020-07-07', 'Approved', 'asdasd', '/attachments/1594114439_MerchandisingMobileApp.pdf', 1, '2020-07-07 09:33:59', '2020-07-07 09:45:00', 'asdasd'),
(3, '123', 'rj', '2020-07-15', 'Disapproved', 'c', '/attachments/1594169460_comfast.jpg', 1, '2020-07-08 00:51:00', '2020-07-08 00:51:00', NULL),
(4, '12', 'AN ORDINANCE APPROVING THE ECONOMIC DEVELOPMENT FUND (EDF) ANNUAL INVESTMENT PLAN IN THE AMOUNT OF P 4, 825, 125.00 FOR THE OPERATION OF THE LOCAL GOVERNMENT UNIT (LGU) OF SAN QUINTIN, PANGASINAN FOR CALENDAR YEAR 2001.', '2000-02-10', 'Approved', 'Invironment', '/attachments/1594255392_doc00329220200708023816.pdf', 2, '2020-07-09 00:43:12', '2020-07-09 00:43:12', NULL),
(5, '12', 'AN ORDINANCE APPROVING THE ECONOMIC DEVELOPMENT FUND (EDF) ANNUAL INVESTMENT PLAN IN THE AMOUNT OF P 4, 825, 125.00 FOR THE OPERATION OF THE LOCAL GOVERNMENT UNIT (LGU) OF SAN QUINTIN, PANGASINAN FOR CALENDAR YEAR 2001.', '2000-10-25', 'Approved', 'Invironment', '/attachments/1594255821_doc00329320200708024007.pdf', 2, '2020-07-09 00:50:21', '2020-07-09 00:50:21', NULL),
(6, '11', 'AN ORDJNANCE APPROPRIATING FUNDS FOR THE GENERAL FUND OF THE MUNICIPAL BUDGET FOR THE LOCAL GOVERNMENT UNIT OF SAN  QUINTJN, PANGASJNAN FOR ITS OPERATION FOR CY 2001 ( P 27, 129, 125.00).', '2000-10-25', 'Approved', 'Invironment', '/attachments/1594255922_doc00329420200708024046.pdf', 2, '2020-07-09 00:52:02', '2020-07-09 00:52:02', NULL),
(7, '10', 'AN ORDINANCE APPROPRIATING FUNDS, FOR THE MUNICIPAL SUPPLEMENTAL BUDGET NO. 2 CY 2000 OF THE LOCAL GOVERNMENT UNIT OF SAN QUINTIN, PANGASINAN FOR ITS OPERATION FOR CY 2000.', NULL, 'Approved', 'Invironment', '/attachments/1594256177_doc00329520200708024147.pdf', 2, '2020-07-09 00:56:17', '2020-07-09 00:56:17', NULL),
(8, '9', 'AN APPROPRIATION ORDINANCE APPROVING THE REVISED ANNUAL INVESTMENT PLAN (AIP) FUNDED BY 20 % IRA OF SAN QUINTIN, PANGASINAN FOR CY 2000 IN THE AMOUNT OF P 4, 452, 235. 20 AS OPERATIVE', '2000-09-27', 'Approved', 'Invironment', '/attachments/1594256360_doc00329620200708024243.pdf', 2, '2020-07-09 00:59:20', '2020-07-09 00:59:20', NULL),
(9, '8', 'AN ORDINANCE CREATING THE MUN. SOCIAL WELFARE OFFICER IV OF SAN QUINTIN, P ANGASINAN.', '2000-09-20', 'Approved', 'Invironment', '/attachments/1594256873_doc00329720200708024322.pdf', 2, '2020-07-09 01:07:53', '2020-07-09 01:07:53', NULL),
(10, '61', 'RESOLUTION CREATING THE POSITION OF MUN. SOCIAL WELFARE OFFICER IV OF SAN QUINTIN, P ANGASINAN.', '2000-08-29', 'Approved', 'Invironment', '/attachments/1594257081_doc00329820200708024354.pdf', 2, '2020-07-09 01:09:55', '2020-07-09 01:11:21', NULL),
(11, '7', 'AN ORDINANCE REALINGNING THE AMOUNT OF P 250, 000.00 OUT FROM THE 20 % DEVELOPMENT FUND UNDER INFRASTRUCTURE DEVELOPMENT TO THE CAPITAL OUTLAY UNDER THE OFFICE OF THE MAYOR', '2000-08-16', 'Approved', 'Invironment', '/attachments/1594257611_8doc00329920200708024431.pdf', 2, '2020-07-09 01:20:11', '2020-07-09 01:20:11', NULL),
(12, '6', 'AN ORDINANCE REALIGNING THE AMOUNT OF P500, 000.00 OUT FROM THE AMORTIZATION APPROPRIATION OF OF Pl .4 THE MILLION ONGOING PESOS PUBLIC LOAN MARKET INTEREST FOR BUILDINGTHE   CONSTRUCTION TO OTHER SERVICES UNDER THE OFFICE OF THE MAYOR.', '2000-08-16', 'Approved', 'Invironment', '/attachments/1594257794_9doc00330020200708024510.pdf', 2, '2020-07-09 01:23:14', '2020-07-09 01:23:14', NULL),
(13, '5', 'AN APPROPRIATION ORDINANCE EMBODYING THE MUNICIPAL UTILIZATION PLAN OF CY 2000 CALAMITY FUND OF THE LOCAL GOVERNMENT UNIT OF SAN QUINTIN, P ANGASINAN IN THE AMOUNT OF Pl, 258, 583.80 FOR IT\'S OPERATION FOR THE CURRENT YEAR', '2000-08-02', 'Approved', 'Invironment', '/attachments/1594257942_10doc00330120200708024637.pdf', 2, '2020-07-09 01:25:42', '2020-07-09 01:25:42', NULL),
(14, '03', 'AN ORDINANCE REALIGNING THE AMOUNT OF P250, 000.00 OUT FROM THE MAYOR\'S CAPITAL OUTLAY ON OFFICE EQUJPMENT TO LAND IMPROVEMENTS AS COUNTERPART FOR THE LMP-DPWH SHARING PROGRAM PHASE II CONCRETING PROJECTS.', '2000-07-05', 'Approved', 'Invironment', '/attachments/1594258144_11doc00330220200708024709.pdf', 2, '2020-07-09 01:29:04', '2020-07-09 01:29:04', NULL),
(15, '02', 'AN ORDINANCE APPROPRIATING FUNDS FOR THE MUNICIPAL SUPPLEMENTAL BUDGET NO. 1 OF THE LOCAL GOVERNMENT UNIT OF SAN QUINTIN,  PANGASINAN FOR ITS OPERATION FOR CY 2000', '2000-04-05', 'Approved', 'Invironment', '/attachments/1594258337_12doc00330320200708024730.pdf', 2, '2020-07-09 01:32:17', '2020-07-09 01:32:17', NULL),
(16, '01', 'AN ORDINANCE APPROVING THE 20% MODIFIED MUNICIPAL DEVELOPMENT FUND (EDF) ANNUAL INVESTMENT PLAN UTILIZATION PLAN OF SAN QUINTIN, PANGASINAN FOR CY 2000 IN THE AMOUNT OF P4,452,235.20 AS OPERATIVE', '2000-03-01', 'Approved', 'Invironment', '/attachments/1594258721_13doc00330420200708024809.pdf', 2, '2020-07-09 01:38:41', '2020-07-09 01:38:41', NULL),
(17, '09', 'AN ORDINANCE ENACTING MUNICIPAL SUPPLEMENTAL BUDGET NO. 2 OF Tiffi GnNERAL FUND FOR Tiffi OPERATION OF Tiffi LOCAL GOVERNMENT OF SAN QUINTIN, PANGASINAN AND PROVIDING APPROPRIATION THEREOF.', '2001-12-10', 'Approved', 'Invironment', '/attachments/1594260022_1doc00331520200708030237.pdf', 2, '2020-07-09 02:00:22', '2020-07-09 02:00:22', NULL),
(18, '08', 'AN ORDINANCE ADOPTING .THE PUBLIC INVESTMENT PROGRAM CY-2002 (A.IP-General) OF THE MUNICIPALITY OF SAN QUINTIN, PANGASINAN.', '2001-11-19', 'Approved', 'Invironment', '/attachments/1594260168_2doc00331620200708030351.pdf', 2, '2020-07-09 02:02:48', '2020-07-09 02:02:48', NULL),
(19, '08', 'AN ORDINANCE ADOPTING THE PUBLIC INVESTMENT PROGRAM CY-2002 (AlP-General) OF THE MUNICIPALITY OF SAN QUINTIN, PANGASINAN.', '2001-11-19', 'Approved', 'Invironment', '/attachments/1594260251_3doc00331720200708030544.pdf', 2, '2020-07-09 02:04:11', '2020-07-09 02:04:11', NULL),
(20, '07', 'AN ORDINANCE APPROVING THE MUNICIPAL DEVELOPMENT FUND (MDF) FROM THE 20% OF IRA IN THE AMOUNT OF P 4, 444, 318.80 FOR THE OPERATION OF THE LOCAL GOVERNMENT UNIT (LGU) OF SAN QUINTIN, PANGASINAN FOR CALENDAR YEAR 2002.', '2001-11-19', 'Approved', 'Invironment', '/attachments/1594260326_4doc00331820200708030723.pdf', 2, '2020-07-09 02:05:26', '2020-07-09 02:05:26', NULL),
(21, '05', 'AN ORDINANCE REQUIRING MUNICIPAL OFFICIALS, LOCAL AND NATIONAL EMPLOYEES TO ATTEND FLAG RAISING CEREMONY ON EVERY MONDAY AND HEADS OF OFFICES ARE REQUIRED TO PRESENT MONTHLY ACCOMPLISHMENT REPORT IN THE PROGRAM AND PROVIDE PENALTY FOR VIOLATION THEREOF.', '2001-09-17', 'Approved', 'Invironment', '/attachments/1594260397_5doc00332020200708030919.pdf', 2, '2020-07-09 02:06:37', '2020-07-09 02:06:37', NULL),
(22, '06', 'AN ORDINANCE APPROPRIATING FUNDS FOR THE GENERAL FUND OF TI-IE  MlJNICIP AL BUDGET FOR TIIE LOCAL GOVERNMENT UNIT OF SAN  A QUINTIN, PANGASINN FOR ITS OPERATION FOR CY 2002 ( P 26,051,569.00).', '2001-11-19', 'Approved', 'Invironment', '/attachments/1594260502_6doc00332120200708030955.pdf', 2, '2020-07-09 02:08:22', '2020-07-09 02:08:22', NULL),
(23, '04', 'AN ORDINANCE AMENDING SECTION 5 (3) UNDER THE THIRD OFFENSE OF P3,000.00 TO P 2,500.00 OF ORDINANCE NO. 14 S. 2000', '2001-07-23', 'Approved', 'Invironment', '/attachments/1594260561_7doc00332220200708031036.pdf', 2, '2020-07-09 02:09:21', '2020-07-09 02:09:21', NULL),
(24, '03', 'AN ORDINANCE AMENDING THE PENALTY OF P 3, 000.00 TOP 2,500.00  UNDER THE THIRD OFFENSE OF ORDINANCE NO. 13, S. 2000:', '2001-07-23', 'Approved', 'Invironment', '/attachments/1594261103_8doc00332320200708031102.pdf', 2, '2020-07-09 02:18:23', '2020-07-09 02:18:23', NULL),
(25, '02', 'AN ORDINANCE APPROPRIATING F{)NDS FOR THE SUPPLEMENTAL BUDGET NO. 2, S. 2001 OF THE LOCAL GOVERNMENT UNIT OF SAN QUINTIN FOR TIS OPERATION FOR CY 2001.', '2001-07-16', 'Approved', 'Invironment', '/attachments/1594261177_9doc00332420200708031116.pdf', 2, '2020-07-09 02:19:37', '2020-07-09 02:19:37', NULL),
(26, '01', 'AN ORDINANCE ADOPTING THE PUBLIC INVESTMENT PROGRAM CY-2001 (AIP-General) OF THE MUNICIPALITY OF SAN QUINTIN, P ANGASINAN.', '2001-03-14', 'Approved', 'Invironment', '/attachments/1594261324_10doc00332520200708031143.pdf', 2, '2020-07-09 02:22:04', '2020-07-09 02:22:04', NULL),
(27, '01', 'AN ORDNANCE ADOPTING THE PUBLIC INVESTr-.ffiNT PROGRAM CY-2001  H (AIP-General) OF TE :MUNICIPALITY OF SAN QUINTIN, P ANGASINAN.', '2001-03-14', 'Approved', 'Invironment', '/attachments/1594261423_11doc00332620200708031417.pdf', 2, '2020-07-09 02:23:43', '2020-07-09 02:23:43', NULL),
(28, '09', 'AN ORDINANCE ADOPTING THE PUBLIC INVESTMENT PROGRAM CY-2003 (AIP-General) OF THE MUNICIPALITY OF SAN QUINTIN, P ANGASINAN. ·', '2002-12-02', 'Approved', 'Appropriation/Budget', '/attachments/1594261649_1doc00332820200708031825.pdf', 2, '2020-07-09 02:27:29', '2020-07-09 02:37:41', NULL),
(29, '08', 'AN ORDINANCE APPROVING THE MUNICIPAL DEVELOPMENT FUND (MDF) FROM THE 20% OF IRA IN THE AMOUNT OF P 4, 996, 487.40 FOR THE OPERATION OF THE LOCAL GOVERNMENT UNIT (LGU) OF SAN QUINTIN, PANGASINAN FOR CALENDAR YEAR 2003.', '2001-12-02', 'Approved', 'Invironment', '/attachments/1594263906_2doc00332920200708031912.pdf', 2, '2020-07-09 03:05:06', '2020-07-09 03:05:06', NULL),
(30, '07', 'AN ORDINANCE APPROPRIATING FUNDS FOR THE GENERAL FUND OF THE MUNICIPAL BUDGET FOR THE LOCAL GOVERNMENT UNIT OF SA QUINTIN, PANGAS', '2002-12-02', 'Approved', 'Invironment', '/attachments/1594264806_3doc00333020200708031947.pdf', 2, '2020-07-09 03:20:06', '2020-07-09 03:20:06', NULL),
(31, '06', 'AN ORDINANCE REGULATING THE OPERATION OF BILLIARDS AND POOLS IN THE MUNICIPALITY OF SAN QUINTIN, P ANGASINAN', '2002-09-21', 'Approved', 'Invironment', '/attachments/1594264846_4doc00333120200708032024.pdf', 2, '2020-07-09 03:20:46', '2020-07-09 03:20:46', NULL),
(32, '05', 'AN ORDINANCE APPROPRIATING FUNDS. FOR THE MUNICIPAL SUPPLEMENTAL BUDGET NO. 2 OF THE LOCAL GOVERNMENT OF SAN QUINTIN, PANGASINAN IN THE AMOUNT OF P 3,617,388.32 FOR ITS OPERATION FOR CY 2002.', '2002-07-01', 'Approved', 'Invironment', '/attachments/1594264895_6doc00333320200708032119.pdf', 2, '2020-07-09 03:21:35', '2020-07-09 03:21:35', NULL),
(33, '05', 'AN ORDINANCE AWARDING THE FIRST FLOOR OF THE SANGGUNIANG BAY AN BUILDING TO THE ABC/LIGA NG MGA BARANGAY AND THE SANGGUNIANG KABAT AAN (SK) SAN QUINTIN, P ANGASINAN AS THEIR PERMANENT OFFICE AND SESSION HALL.', '2002-03-11', 'Approved', 'Invironment', '/attachments/1594264949_6doc00333320200708032119.pdf', 2, '2020-07-09 03:22:29', '2020-07-09 03:22:29', NULL),
(34, '02', 'AN ORDINANCE REGULATING THE OPERATION OF BUSINESSES ENGAGED IN KARAOKE, VIDEOKE AND OTHER SIMILAR ESTABLISHMENTS INSIDE THE MARKET COMPOUND OF SAN QUINTIN, PANGASINAN AND PROVIDING PENALTY FOR VIOLATION THEREOF', '2002-02-04', 'Approved', 'Invironment', '/attachments/1594269273_9doc00333620200708032448.pdf', 2, '2020-07-09 03:33:00', '2020-07-09 04:34:33', NULL),
(35, '03', 'AN ORDINANCE REGULATING THE SELLING AND DRINKING OF LIQUOR FROM 10:00 IN THE EVENING TO 5:00 IN THE MORNING AND PROVIDING PENALTY FOR VIOLATION THEREOF', '2002-02-04', 'Approved', 'Invironment', '/attachments/1594265657_8doc00333520200708032208.pdf', 2, '2020-07-09 03:34:17', '2020-07-09 03:34:17', NULL),
(36, '01', 'AN ORDINANCE APPROPRIATING FUNDS FOR THE MUNICIPAL  SUPPLEMENTAL BUDGET NO. 1 OF THE LOCAL GOVERNMENT OF SAN  QUINTIN, PANGASINAN IN THE AMOUNT OF P 1,582,516.00 FOR ITS OPERATION COF CT 2002', '2002-01-31', 'Approved', 'Invironment', '/attachments/1594269607_10doc00333720200708032516.pdf', 2, '2020-07-09 04:40:07', '2020-07-09 04:40:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `deactivate_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00',
  `role` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `add_by`, `deactivate_by`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@lafilgroup.com', NULL, '$2y$10$Wq.iEkymQ1tSzZfHTCe2j.bW.8Ye5BbjbwOBeH0vV9680/FIpaX0u', 'Dj3x1IiEkIGEvTfx7HtkV1Qol47htbrTV6C0gHJnYlvMjYmk6BDo4DL8yP11', 1, NULL, NULL, '2020-07-07 08:43:13', 'Admin'),
(2, 'RJ Bentillo', 'rj@admin.com', NULL, '$2y$10$JpncKTKTQtzm8m76N35INeyh3rB4uAuVboJ1qQTznhKXdNSq/QprS', '7M6ZfpLtmGLdkFGuDFa48a50IaVa0RdDByqVHie1yeRUbzSw1cgb2NdxUfVJ', 1, NULL, '2020-07-07 08:32:14', '2020-07-08 03:02:35', 'Admin'),
(3, 'myrna', 'myrna@admin.com', NULL, '$2y$10$kXRkF69rdck29U0ytXVvz.neUJ4tQUwbjlMdGKiNPBiPEE.U2BYqq', 'MK6B7YoBGgHvTKxFMd12psxpLQbDVsfr8B1LVNlrMzxYkyJk9N5JkL0LpL5K', 1, NULL, '2020-07-08 02:30:36', '2020-07-08 05:13:28', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_ordinances`
--
ALTER TABLE `history_ordinances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordinances`
--
ALTER TABLE `ordinances`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_ordinances`
--
ALTER TABLE `history_ordinances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordinances`
--
ALTER TABLE `ordinances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
