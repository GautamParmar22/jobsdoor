-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 11:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `total_exp` varchar(25) NOT NULL,
  `relavant_exp` varchar(25) NOT NULL,
  `current_ctc` varchar(10) NOT NULL,
  `expected_ctc` varchar(10) NOT NULL,
  `notice_period` varchar(10) NOT NULL,
  `upload_resume` varchar(255) NOT NULL,
  `tell_about_self` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_job`
--

INSERT INTO `applied_job` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile_no`, `position`, `total_exp`, `relavant_exp`, `current_ctc`, `expected_ctc`, `notice_period`, `upload_resume`, `tell_about_self`, `created_at`, `updated_at`) VALUES
(1, NULL, 'gautam', 'parmar', 'admin@jobsdoor.com', '7405814116', NULL, '1 year', '1 year', '56000', '120000', '2 month', '1650613411.pdf', 'asdfas', '2022-04-22 07:43:31', '2022-04-22 07:43:31'),
(2, NULL, 'gautam', 'parmar', 'gp.parmar1999@gmail.com', '7405814116', NULL, '12 year', '14 year', '56000', '120000', '1 month', '1650615836.pdf', 'sdasd', '2022-04-22 08:23:56', '2022-04-22 08:23:56'),
(3, NULL, 'gautam', 'parmar', 'gp.parmar1999@gmail.com', '7405814116', NULL, '12 year', '13 year', '56000', '120000', '1 month', '1650615945.doc', 'sadasd', '2022-04-22 08:25:45', '2022-04-22 08:25:45'),
(4, NULL, 'gautam', 'parmar', 'admin@jobsdoor.com', '7405814116', NULL, '11 year', '13 year', '56000', '120000', '0', '1650616537.pdf', NULL, '2022-04-22 08:35:37', '2022-04-22 08:35:37'),
(5, NULL, 'gautam', 'parmar', 'admin@jobsdoor.com1', '7405814116', NULL, '13 year', '13 year', '56000', '120000', '1 month', '1650616749.pdf', 'sas', '2022-04-22 08:39:09', '2022-04-22 08:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE `education_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `field_of_study` varchar(150) DEFAULT NULL,
  `edu_start_year` varchar(10) DEFAULT NULL,
  `edu_start_month` varchar(10) DEFAULT NULL,
  `edu_end_year` varchar(10) DEFAULT NULL,
  `edu_end_month` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_details`
--

INSERT INTO `education_details` (`id`, `user_id`, `school_name`, `degree`, `field_of_study`, `edu_start_year`, `edu_start_month`, `edu_end_year`, `edu_end_month`, `created_at`, `updated_at`) VALUES
(1, 6, 'GDCST', 'MCA', 'Computer Science', '2017', '04', '2020', '05', '2022-04-04 12:49:00', '2022-04-04 12:49:00'),
(2, 7, 'VJ Modha College', 'MCom Compurter Sci.', 'Computer Science & IT', '2017', '02', '2022', '11', '2022-04-04 12:51:56', '2022-04-04 12:51:56'),
(3, 8, 'Cl College', 'MSC (it)', 'Computer Science', '2018', '03', '2022', '04', '2022-04-04 12:58:07', '2022-04-04 12:58:07'),
(4, 9, 'JKM BCA College', 'BCA', 'Computer Science', '2017', '04', '2020', '04', '2022-04-04 13:04:09', '2022-04-04 13:04:09'),
(5, 10, 'SU', 'PHD', 'Computer Science & IT', '2013', '05', '2021', '04', '2022-04-04 13:08:11', '2022-04-04 13:08:11'),
(6, 11, 'SSIT', 'MSC (it)', 'Computer Science', '2005', '05', '2008', '05', '2022-04-05 04:17:16', '2022-04-05 04:17:16'),
(7, 12, 'BKNMU', 'PHD', 'Computer Science & IT', '2002', '06', '2007', '04', '2022-04-05 04:37:50', '2022-04-05 04:37:50'),
(8, 13, 'VJ Modha College', 'MSC (it)', 'Computer Science & IT', '2022', '02', '2022', '01', '2022-04-05 04:43:19', '2022-04-05 04:43:19'),
(9, 15, 'GDCST', 'MCA', 'Computer Science', '2007', '07', '2009', '06', '2022-04-05 05:29:20', '2022-04-05 05:29:20'),
(10, 17, 'GDCST', 'MCA', 'Computer Science', '2021', '03', '2022', '02', '2022-04-12 05:01:41', '2022-04-12 05:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `company_address` varchar(50) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `website` varchar(50) NOT NULL,
  `official_title` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reach_you` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`, `company_name`, `industry`, `company_address`, `city`, `state`, `country`, `zip_code`, `website`, `official_title`, `firstname`, `lastname`, `mobile_no`, `email`, `reach_you`, `created_at`, `updated_at`) VALUES
(1, 2, 'Moon Technolabs', 'IT', 'Ganesh Maridian SG Highway Sola Ahemdabad', 'Ahemdabad', 'Gujarat', 'India', 380001, 'http://www.moontechnolabs.com', 'HR', 'Mahek', 'Manakar', '7899545987', 'hr@moontechnolabs.com', 'Anytime', '2022-04-04 12:41:14', '2022-04-04 12:41:14'),
(2, 3, 'Ashva Infotech', 'IT', 'MG Road Juangadh', 'Junagadh', 'Gujarat', 'India', 362001, 'http://www.ashvainfotech.com', 'HR', 'Pruthviraj', 'Sasiya', '9978834943', 'hr@ashvainfotech.com', 'Morning', '2022-04-04 12:42:51', '2022-04-04 12:42:51'),
(3, 4, 'Ashva Infotech', 'IT', '150 ft ring road Rajkot', 'Rajkot', 'Gujarat', 'India', 362625, 'http://www.madhavinfotech.com', 'HR', 'Mahesh', 'Malam', '8562302111', 'hr@madhavinfotech.com', 'AfterNoon', '2022-04-04 12:44:00', '2022-04-04 12:44:00'),
(4, 5, 'Girnar Infotech', 'IT', 'Datar Rd Junagadh', 'Junagadh', 'Gujarat', 'India', 362001, 'http://www.girnarinfotech.com', 'CEO', 'Gautam', 'Parmar', '7405814116', 'ceo@girnarinfotech.com', 'Anytime', '2022-04-04 12:44:50', '2022-04-04 12:44:50'),
(5, 16, 'Swati Technolabs', 'IT', '132 ft ring road Rajkot', 'Rajkot', 'Gujarat', 'India', 385656, 'http://www.swatitechnolabs.com', 'Web Devloper', 'Shejal', 'Shrimali', '7844512369', 'shejalshrimali@gmail.com', 'Morning', '2022-04-11 04:33:14', '2022-04-11 04:33:14'),
(6, 18, 'Hyperlink Technolabs', 'IT', 'c156  Near Iscon mall Vadodara', 'Vadodara', 'Gujarat', 'India', 362325, 'http://www.mahadevtechnolabs.com', 'HR', 'Manshi', 'Bhalani', '7894563215', 'hr@mahadevtechnolabs.com', 'AfterNoon', '2022-04-13 07:28:42', '2022-04-13 07:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recent_employement` varchar(50) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `start_date` varchar(11) DEFAULT NULL,
  `end_date` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_history`
--

INSERT INTO `emp_history` (`id`, `user_id`, `recent_employement`, `industry`, `job_title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(5, 11, 'Project Manager', 'IT', 'PM', '22-12-2009', '23-12-2018', '2022-04-11 09:04:15', '2022-04-11 09:04:15'),
(6, 15, 'tester', 'AI & ML', 'Tester', '12-12-2007', '22-12-2009', '2022-04-11 09:04:59', '2022-04-11 09:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_vacancy` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_job` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_to` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_from` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indroduction_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 = Inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `user_id`, `job_name`, `no_of_vacancy`, `job_description`, `key_skills`, `location`, `type_of_job`, `salary_to`, `salary_from`, `qualification`, `indroduction_pdf`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4', 'Php devloper', '20', 'We hiring PHP Devloper....', 'HTML, CSS, Javascript,Core PHP..', 'Ahemdabad', 'fulltime', '56000', '60000', 'Btech/MCA', '1649833412.pdf', '1', '2022-04-12 20:03:32', '2022-04-13 20:03:48', NULL),
(2, '2', 'Android Devloper', '12', 'We hiring Android devloper...', 'JSP,OOPS,Applet,Servlat..', 'Rajkot', 'parttime', '78000', '80000', 'BE/ME/MCA/BTech', '1649931254.pdf', '0', '2022-04-12 20:06:37', '2022-04-13 23:14:14', NULL),
(4, '5', 'Java Tester', '19', 'We are hiring laravel devloper...', 'JSP,OOPS,Applet,Servlat..', 'Gandhinagar', 'fulltime', '56000', '60000', 'BE/ME/MCA/BTech', '1649933825.pdf', '1', '2022-04-12 20:13:45', '2022-04-13 23:57:05', NULL),
(6, '2', 'Java Devloper', '5', 'We hiring java devloper', 'JSP,OOPS,Applet,Servlat..', 'Ahemdabad', 'parttime', '56000', '60000', 'MCA/MSc(it)/BTech', '', '1', '2022-04-12 20:31:08', '2022-04-13 22:12:10', NULL),
(7, '18', 'Android Devloper', '25', 'We hiring android devloper...', 'JSP,OOPS,Applet,Servlat..', 'Gandhinagar', 'fulltime', '78000', '85000', 'BE/ME/MCA/BTech', '1649835118.pdf', '1', '2022-04-12 20:31:58', '2022-04-13 20:01:19', NULL),
(8, '3', 'Php devloper', '20', 'We hiring php devloper....', 'HTML, CSS, Javascript,Core PHP..', 'Ahemdabad', 'parttime', '45500', '55000', 'MCA/MSc(it)/BTech', '1649840742.pdf', '0', '2022-04-12 22:05:42', '2022-04-13 20:03:52', '2022-04-13 20:03:52'),
(9, '5', 'Front End Devloper', '45', 'We are hiring FronEnd Devloper  Grab this oppertunity.....', 'HTML, CSS, Javascript,Core PHP,Laravel', 'Gandhinagar', 'parttime', '45111', '50000', 'Btech/MCA/MSC(it)', '1649930909.pdf', '1', '2022-04-12 22:26:27', '2022-04-13 23:12:48', '2022-04-13 23:12:48'),
(10, '5', 'SEO', '6', 'We are Hiring SEO ...', 'QA, SEO ', 'Baroda', 'fulltime', '45500', '56000', 'MCA/ME/BTech', '1649931148.pdf', '1', '2022-04-12 22:27:19', '2022-04-13 23:12:35', NULL),
(11, '5', 'Laravel Devloper', '11', 'We are hiring Laravel devloper', 'HTML, CSS, Javascript,Core PHP..', 'Ahemdabad', 'fulltime', '1213233', '150000', 'MCA/MSc(it)/BTech', '1649933835.pdf', '0', '2022-04-13 19:11:34', '2022-04-13 23:57:15', NULL),
(12, '3', 'Php devloper', '20', 'we are hiring', 'HTML, CSS, Javascript,Core PHP..', 'Ahemdabad', 'parttime', '89000', '120000', 'MCA/MSc(it)/BTech', '1650000955.pdf', '0', '2022-04-15 00:05:55', '2022-04-15 00:05:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_preference`
--

CREATE TABLE `job_preference` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `apply_job_title` varchar(100) NOT NULL,
  `job_open` varchar(50) NOT NULL,
  `salary_from` varchar(10) NOT NULL,
  `salary_to` varchar(10) NOT NULL,
  `prefer_work` varchar(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `company_size` varchar(5) NOT NULL,
  `important_roll` varchar(250) NOT NULL,
  `tell_yourself` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_preference`
--

INSERT INTO `job_preference` (`id`, `user_id`, `apply_job_title`, `job_open`, `salary_from`, `salary_to`, `prefer_work`, `company`, `company_size`, `important_roll`, `tell_yourself`, `created_at`, `updated_at`) VALUES
(1, 6, 'sr software devloper', 'web devloper', '26000', '58000', '4 day', 'c3', '40', 'Career advancement,Work place,Company culture & mission & values', 'Hello my name is jayesh solanki i\'m computer science student....', '2022-04-04 12:49:00', '2022-04-04 12:49:00'),
(2, 7, 'sr software devloper', 'web devloper', '26000', '58000', 'PM', 'c2', '30', 'Career advancement,Compasation & benefite,Strong company leadership,Company culture & mission & values', 'Hello my name is nirali im from manavadar...', '2022-04-04 12:51:56', '2022-04-04 12:51:56'),
(3, 8, 'sr software devloper', 'TL/PM', '890000', '121000', '4 day', 'c3', '50', 'Career advancement,Compasation & benefite,Strong company leadership,Company culture & mission & values', 'Hello my name is Uday i\'m from Upleta...', '2022-04-04 12:58:07', '2022-04-04 12:58:07'),
(4, 9, 'jr software devloper', 'web devloper', '26000', '58000', '4 day', 'c2', '30', 'Career advancement,Work place,Company culture & mission & values', 'i\'m from Una..', '2022-04-04 13:04:09', '2022-04-04 13:04:09'),
(5, 10, 'Project Manager', 'TL/PM', '890000', '121000', '4 day', 'c3', '30', 'Career advancement,Work place,Company culture & mission & values', 'hello my name is shilpa i\'m computer science student...', '2022-04-04 13:08:11', '2022-04-04 13:08:11'),
(6, 11, 'sr software devloper', 'web devloper', '890000', '121000', '4 day', 'c2', '40', 'Career advancement,Work place,Company culture & mission & values', 'Hello i \' m from jetpur...', '2022-04-05 04:17:16', '2022-04-05 04:17:16'),
(7, 12, 'sr software tester', 'sr software tester', '890000', '121000', '4 day', 'c3', '40', 'Career advancement,Work place,Company culture & mission & values', 'Hello i \' m Computer science student...', '2022-04-05 04:37:50', '2022-04-05 04:37:50'),
(8, 13, 'Project Manager', 'TL/PM', '890000', '121000', '4 day', 'c3', '40', 'Career advancement,Work place,Company culture & mission & values', 'my name is parash and i\'m from morbi...', '2022-04-05 04:43:19', '2022-04-05 04:43:19'),
(9, 15, 'Project Manager', 'TL/PM', '890000', '121000', '4 day', 'c3', '30', 'Career advancement,Compasation & benefite,Company culture & mission & values', 'hello i\'m computer science student...', '2022-04-05 05:29:20', '2022-04-05 05:29:20'),
(10, 17, 'sr software devloper', 'web devloper', '26000', '121000', '4 day', 'c2', '30', 'Career advancement,Compasation & benefite,Work place', 'abc....', '2022-04-12 05:01:41', '2022-04-12 05:01:41');

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
(1, '2022_04_15_051342_create_job_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(35) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `start_job` varchar(10) NOT NULL,
  `reach_you` varchar(50) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_first_job` tinyint(1) NOT NULL,
  `top_skills` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `firstname`, `lastname`, `mobile_no`, `email`, `address`, `city`, `zip_code`, `start_job`, `reach_you`, `resume`, `created_at`, `updated_at`, `is_first_job`, `top_skills`) VALUES
(1, 6, 'Jayesh', 'Solanki', '7895623223', 'jayeshs@gmail.com', '149, Vashant Nagar Bantva', 'Bantva', '362620', '18-04-2022', 'Anytime', '1649076540.pdf', '2022-04-04 12:49:00', '2022-04-04 12:49:00', 0, '[\"Communication\",\"Confidence\",\"Team Work\"]'),
(2, 7, 'Nirali', 'Shah', '7895623223', 'nirali.p990@gmail.com', 'Panina tanka ni same vali gali Manavadar', 'Manavadar', '362621', '22-04-2022', 'Morning', '1649076716.doc', '2022-04-04 12:51:56', '2022-04-04 12:51:56', 1, 'Communication,Leadership,Queick Learner'),
(3, 8, 'Uday', 'Maru', '9635344545', 'udaymaru231@gmail.com', '\'vaibhav\' 15 , Rayjinagar Upleta', 'Upleta', '362689', '23-04-2022', 'Anytime', '1649077087.pdf', '2022-04-04 12:58:07', '2022-04-04 12:58:07', 0, '[\"Communication\",\"Leadership\",\"Queick Learner\"]'),
(4, 9, 'Nita', 'Shankhat', '7895623223', 'nita.s@yahoo.com', '139, Rameshvarnagar Una', 'Una', '362465', '05-04-2022', 'Anytime', '1649077449.pdf', '2022-04-04 13:04:09', '2022-04-04 13:04:09', 1, '[\"Leadership\",\"Confidence\",\"Queick Learner\",\"Team Work\"]'),
(5, 10, 'Shilpa', 'Babhaniya', '8523656541', 'bambhaniyashilpa@gmail.com', 'Panina tanka ni same vali gali Kodinar', 'Kodinar', '362622', '22-04-2022', 'AfterNoon', '1649077691.pdf', '2022-04-04 13:08:11', '2022-04-04 13:08:11', 0, 'Communication,Leadership,Queick Learner'),
(6, 11, 'Mayank', 'Trambadiya', '9685545123', 'mayankt@yahoo.com', '165, Near Jetpur Police Line Jetpur', 'Jetpur', '372215', '06-04-2022', 'Anytime', '1649132236.pdf', '2022-04-05 04:17:16', '2022-04-05 04:17:16', 0, '[\"Leadership\",\"Confidence\",\"Queick Learner\"]'),
(7, 12, 'Pradip', 'Chawla', '7800089891', 'pradipchawla@gmail.com', '177,Near Nagarvada Pratij', 'Pratij', '362220', '05-04-2022', 'AfterNoon', '1649133470.doc', '2022-04-05 04:37:50', '2022-04-05 04:37:50', 0, 'Communication,Confidence,Queick Learner'),
(8, 13, 'Parash', 'Patel', '7411445451', 'parashpatel@gmail.com', 'Morbi', 'Morbi', '362620', '04-02-2022', 'Morning', '1649133799.pdf', '2022-04-05 04:43:19', '2022-04-05 04:43:19', 0, 'Communication,Leadership,Queick Learner'),
(9, 14, 'Parash', 'Patel', '7411445451', 'parashpatel1@gmail.com', 'Morbi', 'Morbi', '362620', '05-04-2022', 'Morning', '1649133907.pdf', '2022-04-05 04:45:07', '2022-04-05 04:45:07', 0, 'Communication,Leadership,Queick Learner'),
(10, 15, 'Jayesh', 'Solanki', '7855496002', 'jayeshs1@gmail.com', 'Panina tanka ni same vali gali Manavadar', 'Manavadar', '362622', '28-02-2022', 'Anytime', '1649136560.pdf', '2022-04-05 05:29:20', '2022-04-05 05:29:20', 0, '[\"Communication\",\"Leadership\",\"Confidence\"]'),
(11, 17, 'aaa', 'aaa', '9624100621', 'aaa@gmail.com', 'near panchayat office nandiya', 'Umarala', '362620', '04-02-2022', 'Anytime', '1649739701.pdf', '2022-04-12 05:01:41', '2022-04-12 05:01:41', 0, '[\"Leadership\",\"Confidence\",\"Queick Learner\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_type` varchar(1) NOT NULL COMMENT '1 = Admin, 2 = Employer, 3 = Candidate',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Inactive, 1 = Active',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Delete , 0 = Not Delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_type`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@jobsdoor.com', '$2y$10$S5F1./ZLHyQ4eNTw.cTF2.C.DtMwHq7NnSigcb7HoNZqjAY1q3wL6', '1', 1, 1, '2022-04-04 12:39:16', '2022-04-04 12:39:16'),
(2, 'Mahek Manakar', 'hr@moontechnolabs.com', '$2a$04$6dUhNZAK0HUlhMzTVrGjUOnzeeblf1v8MtB0OKF9VtumkUfQbtM7O', '2', 1, 0, '2022-04-13 07:17:33', '2022-04-04 12:41:14'),
(3, 'Pruthviraj Sasiya', 'hr@ashvainfotech.com', '$2a$04$ZF5OVM6GAAm9rnLODgX6jeU/BECvwIeYAtWSJ6FCSsp7eseSuX8/y', '2', 0, 0, '2022-04-12 09:45:59', '2022-04-04 12:42:51'),
(4, 'Mahesh Malam', 'hr@madhavinfotech.com', '$2a$04$TY54qFp3S1.k4JI4Xt.2Eeuqy1yQHIi7ERoj8xUTBbSMdtHWmCmF2', '2', 0, 0, '2022-04-12 09:44:59', '2022-04-04 12:44:00'),
(5, 'Gautam Parmar', 'ceo@girnarifotech.com', '$2a$04$OUHx8Yyhg6QQkiUm4lD4NOjDvRF4PiLx0WuJnXZYe/u3Yqob7RrmW', '2', 1, 0, '2022-04-13 07:35:01', '2022-04-11 05:33:00'),
(6, 'Jayesh Solanki', 'jayeshs@gmail.com', NULL, '3', 1, 0, '2022-04-06 03:55:44', '2022-04-04 12:49:00'),
(7, 'Nirali Shah', 'nirali.p990@gmail.com', NULL, '3', 0, 0, '2022-04-04 12:51:56', '2022-04-04 12:51:56'),
(8, 'Uday Maru', 'udaymaru231@gmail.com', NULL, '3', 1, 0, '2022-04-11 09:03:47', '2022-04-04 12:58:07'),
(9, 'Nita Shankhat', 'nita.s@yahoo.com', NULL, '3', 1, 0, '2022-04-11 09:03:33', '2022-04-04 13:04:09'),
(10, 'Shilpa Babhaniya', 'bambhaniyashilpa@gmail.com', NULL, '3', 0, 0, '2022-04-04 13:08:11', '2022-04-04 13:08:11'),
(11, 'Mayank Trambadiya', 'mayankt@yahoo.com', NULL, '3', 1, 0, '2022-04-11 09:04:15', '2022-04-05 04:17:16'),
(12, 'Pradip Chawla', 'pradipchawla@gmail.com', NULL, '3', 0, 0, '2022-04-05 04:37:50', '2022-04-05 04:37:50'),
(13, 'Parash Patel', 'parashpatel@gmail.com', NULL, '3', 0, 0, '2022-04-05 04:43:19', '2022-04-05 04:43:19'),
(14, 'Parash Patel', 'parashpatel1@gmail.com', NULL, '3', 0, 1, '2022-04-11 10:24:45', '2022-04-05 04:45:07'),
(15, 'Jayesh Solanki', 'jayeshs1@gmail.com', NULL, '3', 1, 0, '2022-04-11 09:04:59', '2022-04-05 05:29:20'),
(16, 'Shejal Shrimali', 'shejalshrimali@gmail.com', '$2a$04$bB24YmQdcz6Snfne9vgx4.UdrhuTavGHD0K7m0ECN4AF.9bP/dpQi', '2', 0, 0, '2022-04-13 07:21:23', '2022-04-11 04:33:14'),
(17, 'aaa aaa', 'aaa@gmail.com', NULL, '3', 0, 1, '2022-04-13 07:37:19', '2022-04-12 05:01:41'),
(18, 'Manshi Bhalani', 'hr@mahadevtechnolabs.com', '$2a$04$Io5C3keJtzoIXs0sAoDSaOsXg1Ilbslw88wfTUNPI0L.XseZzbbiG', '2', 0, 0, '2022-04-13 07:29:43', '2022-04-13 07:28:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_details`
--
ALTER TABLE `education_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_preference`
--
ALTER TABLE `job_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
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
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education_details`
--
ALTER TABLE `education_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job_preference`
--
ALTER TABLE `job_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
