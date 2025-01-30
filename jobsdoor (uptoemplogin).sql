-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 06:07 AM
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
(3, 4, 'Madhav Technolabs', 'IT', '150 ft ring road Rajkot', 'Rajkot', 'Gujarat', 'India', 362625, 'http://www.madhavinfotech.com', 'HR', 'Mahesh', 'Malam', '8562302111', 'hr@madhavinfotech.com', 'AfterNoon', '2022-04-04 12:44:00', '2022-04-04 12:44:00'),
(4, 5, 'Girnar Infotech', 'IT', 'Datar Rd Junagadh', 'Junagadh', 'Gujarat', 'India', 362001, 'http://www.girnarinfotech.com', 'CEO', 'Gautam', 'Parmar', '7405814116', 'ceo@girnarinfotech.com', 'Anytime', '2022-04-04 12:44:50', '2022-04-04 12:44:50'),
(5, 16, 'Swati Technolabs', 'IT', '132 ft ring road Rajkot', 'Rajkot', 'Gujarat', 'India', 385656, 'http://www.swatitechnolabs.com', 'Web Devloper', 'Shejal', 'Shrimali', '7844512369', 'shejalshrimali@gmail.com', 'Morning', '2022-04-11 04:33:14', '2022-04-11 04:33:14');

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
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_name` varchar(50) NOT NULL,
  `no_of_vacancy` varchar(5) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `key_skills` varchar(255) NOT NULL,
  `location` varchar(150) NOT NULL,
  `type_of_job` varchar(10) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `indroduction_pdf` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 0 COMMENT '1 = Active 0 = Incative',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '1 = Delete, 0 = Not Delete',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `user_id`, `job_name`, `no_of_vacancy`, `job_description`, `key_skills`, `location`, `type_of_job`, `salary`, `qualification`, `indroduction_pdf`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 5, 'Php devloper', '12', 'We hiring php devloper....', 'HTML, CSS, Javascript,Core PHP..', 'Ahemdabad', 'parttime', '45000', 'MCA', '1649755642.pdf', 0, 0, '2022-04-12 09:27:22', '2022-04-12 09:27:22'),
(2, 5, 'Android Devloper', '2', 'We hiring Android Devloper....', 'kotlin,java', 'Rajkot', 'fulltime', '45000', 'Btech', '1649756387.pdf', 0, 0, '2022-04-12 09:39:47', '2022-04-12 09:39:47'),
(3, 4, 'Wordpress Devloper', '4', 'We hiring wordpress devloper', 'wordpress', 'Ahemdabad', 'fulltime', '78000', 'MCA/MSc(it)/BTech', '1649756920.pdf', 0, 0, '2022-04-12 09:48:40', '2022-04-12 09:48:40'),
(4, 4, 'Java Devloper', '51', 'We hiring java devloper', 'JSP,OOPS,Applet,Servlat..', 'Rajkot', 'fulltime', '56000', 'MCA/MSc(it)/BTech', '1649757010.pdf', 1, 0, '2022-04-12 09:50:10', '2022-04-12 09:50:10'),
(5, 3, '.Net Devloper', '11', 'We hiring .net devloper...', 'C#,MVC .net framwork', 'Gandhinagar', 'parttime', '28500', 'MCA', '1649758137.pdf', 1, 0, '2022-04-12 10:08:57', '2022-04-12 10:08:57'),
(6, 3, 'Tester', '19', 'We are hiring tester....', 'Good Testing.....', 'Gandhinagar', 'fulltime', '45500', 'BE/ME/MCA/BTech', '1649758231.pdf', 0, 1, '2022-04-12 10:10:31', '2022-04-12 10:10:31'),
(7, 3, 'Python Devloper', '5', 'We hiring python devloper..', 'Basic python, Matlab, Numpy, Django...', 'Ahemdabad', 'fulltime', '28500', 'Btech/MCA', '1649764725.pdf', 1, 0, '2022-04-12 11:58:45', '2022-04-12 11:58:45');

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
(2, 'Mahek Manakar', 'hr@moontechnolabs.com', NULL, '2', 1, 0, '2022-04-04 12:41:32', '2022-04-04 12:41:14'),
(3, 'Pruthviraj Sasiya', 'hr@ashvainfotech.com', '$2a$04$ZF5OVM6GAAm9rnLODgX6jeU/BECvwIeYAtWSJ6FCSsp7eseSuX8/y', '2', 0, 0, '2022-04-12 09:45:59', '2022-04-04 12:42:51'),
(4, 'Mahesh Malam', 'hr@madhavinfotech.com', '$2a$04$TY54qFp3S1.k4JI4Xt.2Eeuqy1yQHIi7ERoj8xUTBbSMdtHWmCmF2', '2', 0, 0, '2022-04-12 09:44:59', '2022-04-04 12:44:00'),
(5, 'Gautam Parmar', 'ceo@girnarifotech.com', '$2y$10$tkXn0aFFqGfTURnfO63UIOxIsrDSk55XLxvpzge.aQWJ1n.8Acijm', '2', 1, 0, '2022-04-12 09:41:04', '2022-04-11 05:33:00'),
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
(16, 'Shejal Shrimali', 'shejalshrimali@gmail.com', NULL, '2', 0, 0, '2022-04-11 04:33:14', '2022-04-11 04:33:14'),
(17, 'aaa aaa', 'aaa@gmail.com', NULL, '3', 0, 0, '2022-04-12 05:01:41', '2022-04-12 05:01:41');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_preference`
--
ALTER TABLE `job_preference`
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
-- AUTO_INCREMENT for table `education_details`
--
ALTER TABLE `education_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_preference`
--
ALTER TABLE `job_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
