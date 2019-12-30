{\rtf1\ansi\ansicpg1252\cocoartf1671\cocoasubrtf500
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 -- phpMyAdmin SQL Dump\
-- version 4.9.0.1\
-- https://www.phpmyadmin.net/\
--\
-- Host: localhost:3306\
-- Generation Time: Dec 30, 2019 at 07:32 AM\
-- Server version: 5.7.26\
-- PHP Version: 7.3.8\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Database: `mouthmark`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `advertiser_company_details`\
--\
\
CREATE TABLE `advertiser_company_details` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` bigint(20) NOT NULL,\
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `company_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `company_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `advertiser_company_details`\
--\
\
INSERT INTO `advertiser_company_details` (`id`, `user_id`, `company_name`, `designation`, `company_email`, `company_location`, `company_phone_number`, `created_at`, `updated_at`) VALUES\
(1, 3, 'testcompany', 'developer', 'test@test.com', 'lahore', '03044688334', '2019-12-29 05:46:07', '2019-12-29 05:46:07'),\
(2, 4, 'testcompany', 'developer', 'test@test.com', 'lahore', '03044688334', '2019-12-29 05:51:38', '2019-12-29 05:51:38');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `advertiser_payment_details`\
--\
\
CREATE TABLE `advertiser_payment_details` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` bigint(20) NOT NULL,\
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_holders_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_billing_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_expiry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `ccv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `advertiser_payment_details`\
--\
\
INSERT INTO `advertiser_payment_details` (`id`, `user_id`, `card_type`, `card_holders_name`, `card_billing_address`, `card_billing_zip_code`, `card_no`, `card_expiry`, `ccv`, `created_at`, `updated_at`) VALUES\
(1, 4, 'fjakjdfkl', 'fkjdalkfj', 'fkjadlkfj', 'aldjf', 'jakldfjkl', 'jakdfjlk', 'fsklajflkad', '2019-12-29 05:49:10', '2019-12-29 05:49:10');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `advertiser_profiles`\
--\
\
CREATE TABLE `advertiser_profiles` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` bigint(20) NOT NULL,\
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `advertiser_profiles`\
--\
\
INSERT INTO `advertiser_profiles` (`id`, `user_id`, `email`, `first_name`, `last_name`, `gender`, `age`, `country`, `created_at`, `updated_at`) VALUES\
(1, 3, NULL, 'shhaeer', 'sjlkfjdflk', 'male', '11', 'paksitn', '2019-12-29 05:46:20', '2019-12-29 05:46:20'),\
(2, 4, NULL, 'shhaeer', 'sjlkfjdflk', 'male', '11', 'paksitn', '2019-12-29 05:51:54', '2019-12-29 05:51:54');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `countries`\
--\
\
CREATE TABLE `countries` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `countries`\
--\
\
INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES\
(1, 'United States', 'US', NULL, NULL),\
(2, 'Canada', 'CA', NULL, NULL),\
(3, 'Afghanistan', 'AF', NULL, NULL),\
(4, 'Albania', 'AL', NULL, NULL),\
(5, 'Algeria', 'DZ', NULL, NULL),\
(6, 'American Samoa', 'AS', NULL, NULL),\
(7, 'Andorra', 'AD', NULL, NULL),\
(8, 'Angola', 'AO', NULL, NULL),\
(9, 'Anguilla', 'AI', NULL, NULL),\
(10, 'Antarctica', 'AQ', NULL, NULL),\
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),\
(12, 'Argentina', 'AR', NULL, NULL),\
(13, 'Armenia', 'AM', NULL, NULL),\
(14, 'Aruba', 'AW', NULL, NULL),\
(15, 'Australia', 'AU', NULL, NULL),\
(16, 'Austria', 'AT', NULL, NULL),\
(17, 'Azerbaijan', 'AZ', NULL, NULL),\
(18, 'Bahamas', 'BS', NULL, NULL),\
(19, 'Bahrain', 'BH', NULL, NULL),\
(20, 'Bangladesh', 'BD', NULL, NULL),\
(21, 'Barbados', 'BB', NULL, NULL),\
(22, 'Belarus', 'BY', NULL, NULL),\
(23, 'Belgium', 'BE', NULL, NULL),\
(24, 'Belize', 'BZ', NULL, NULL),\
(25, 'Benin', 'BJ', NULL, NULL),\
(26, 'Bermuda', 'BM', NULL, NULL),\
(27, 'Bhutan', 'BT', NULL, NULL),\
(28, 'Bolivia', 'BO', NULL, NULL),\
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),\
(30, 'Botswana', 'BW', NULL, NULL),\
(31, 'Bouvet Island', 'BV', NULL, NULL),\
(32, 'Brazil', 'BR', NULL, NULL),\
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),\
(34, 'Brunei Darussalam', 'BN', NULL, NULL),\
(35, 'Bulgaria', 'BG', NULL, NULL),\
(36, 'Burkina Faso', 'BF', NULL, NULL),\
(37, 'Burundi', 'BI', NULL, NULL),\
(38, 'Cambodia', 'KH', NULL, NULL),\
(39, 'Cameroon', 'CM', NULL, NULL),\
(40, 'Cape Verde', 'CV', NULL, NULL),\
(41, 'Cayman Islands', 'KY', NULL, NULL),\
(42, 'Central African Republic', 'CF', NULL, NULL),\
(43, 'Chad', 'TD', NULL, NULL),\
(44, 'Chile', 'CL', NULL, NULL),\
(45, 'China', 'CN', NULL, NULL),\
(46, 'Christmas Island', 'CX', NULL, NULL),\
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),\
(48, 'Colombia', 'CO', NULL, NULL),\
(49, 'Comoros', 'KM', NULL, NULL),\
(50, 'Congo', 'CG', NULL, NULL),\
(51, 'Cook Islands', 'CK', NULL, NULL),\
(52, 'Costa Rica', 'CR', NULL, NULL),\
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),\
(54, 'Cuba', 'CU', NULL, NULL),\
(55, 'Cyprus', 'CY', NULL, NULL),\
(56, 'Czech Republic', 'CZ', NULL, NULL),\
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),\
(58, 'Denmark', 'DK', NULL, NULL),\
(59, 'Djibouti', 'DJ', NULL, NULL),\
(60, 'Dominica', 'DM', NULL, NULL),\
(61, 'Dominican Republic', 'DO', NULL, NULL),\
(62, 'East Timor', 'TP', NULL, NULL),\
(63, 'Ecudaor', 'EC', NULL, NULL),\
(64, 'Egypt', 'EG', NULL, NULL),\
(65, 'El Salvador', 'SV', NULL, NULL),\
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),\
(67, 'Eritrea', 'ER', NULL, NULL),\
(68, 'Estonia', 'EE', NULL, NULL),\
(69, 'Ethiopia', 'ET', NULL, NULL),\
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),\
(71, 'Faroe Islands', 'FO', NULL, NULL),\
(72, 'Fiji', 'FJ', NULL, NULL),\
(73, 'Finland', 'FI', NULL, NULL),\
(74, 'France', 'FR', NULL, NULL),\
(75, 'France, Metropolitan', 'FX', NULL, NULL),\
(76, 'French Guiana', 'GF', NULL, NULL),\
(77, 'French Polynesia', 'PF', NULL, NULL),\
(78, 'French Southern Territories', 'TF', NULL, NULL),\
(79, 'Gabon', 'GA', NULL, NULL),\
(80, 'Gambia', 'GM', NULL, NULL),\
(81, 'Georgia', 'GE', NULL, NULL),\
(82, 'Germany', 'DE', NULL, NULL),\
(83, 'Ghana', 'GH', NULL, NULL),\
(84, 'Gibraltar', 'GI', NULL, NULL),\
(85, 'Greece', 'GR', NULL, NULL),\
(86, 'Greenland', 'GL', NULL, NULL),\
(87, 'Grenada', 'GD', NULL, NULL),\
(88, 'Guadeloupe', 'GP', NULL, NULL),\
(89, 'Guam', 'GU', NULL, NULL),\
(90, 'Guatemala', 'GT', NULL, NULL),\
(91, 'Guinea', 'GN', NULL, NULL),\
(92, 'Guinea-Bissau', 'GW', NULL, NULL),\
(93, 'Guyana', 'GY', NULL, NULL),\
(94, 'Haiti', 'HT', NULL, NULL),\
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),\
(96, 'Honduras', 'HN', NULL, NULL),\
(97, 'Hong Kong', 'HK', NULL, NULL),\
(98, 'Hungary', 'HU', NULL, NULL),\
(99, 'Iceland', 'IS', NULL, NULL),\
(100, 'India', 'IN', NULL, NULL),\
(101, 'Indonesia', 'ID', NULL, NULL),\
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),\
(103, 'Iraq', 'IQ', NULL, NULL),\
(104, 'Ireland', 'IE', NULL, NULL),\
(105, 'Israel', 'IL', NULL, NULL),\
(106, 'Italy', 'IT', NULL, NULL),\
(107, 'Ivory Coast', 'CI', NULL, NULL),\
(108, 'Jamaica', 'JM', NULL, NULL),\
(109, 'Japan', 'JP', NULL, NULL),\
(110, 'Jordan', 'JO', NULL, NULL),\
(111, 'Kazakhstan', 'KZ', NULL, NULL),\
(112, 'Kenya', 'KE', NULL, NULL),\
(113, 'Kiribati', 'KI', NULL, NULL),\
(114, 'Korea, Democratic People\\'s Republic of', 'KP', NULL, NULL),\
(115, 'Korea, Republic of', 'KR', NULL, NULL),\
(116, 'Kuwait', 'KW', NULL, NULL),\
(117, 'Kyrgyzstan', 'KG', NULL, NULL),\
(118, 'Lao People\\'s Democratic Republic', 'LA', NULL, NULL),\
(119, 'Latvia', 'LV', NULL, NULL),\
(120, 'Lebanon', 'LB', NULL, NULL),\
(121, 'Lesotho', 'LS', NULL, NULL),\
(122, 'Liberia', 'LR', NULL, NULL),\
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),\
(124, 'Liechtenstein', 'LI', NULL, NULL),\
(125, 'Lithuania', 'LT', NULL, NULL),\
(126, 'Luxembourg', 'LU', NULL, NULL),\
(127, 'Macau', 'MO', NULL, NULL),\
(128, 'Macedonia', 'MK', NULL, NULL),\
(129, 'Madagascar', 'MG', NULL, NULL),\
(130, 'Malawi', 'MW', NULL, NULL),\
(131, 'Malaysia', 'MY', NULL, NULL),\
(132, 'Maldives', 'MV', NULL, NULL),\
(133, 'Mali', 'ML', NULL, NULL),\
(134, 'Malta', 'MT', NULL, NULL),\
(135, 'Marshall Islands', 'MH', NULL, NULL),\
(136, 'Martinique', 'MQ', NULL, NULL),\
(137, 'Mauritania', 'MR', NULL, NULL),\
(138, 'Mauritius', 'MU', NULL, NULL),\
(139, 'Mayotte', 'TY', NULL, NULL),\
(140, 'Mexico', 'MX', NULL, NULL),\
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),\
(142, 'Moldova, Republic of', 'MD', NULL, NULL),\
(143, 'Monaco', 'MC', NULL, NULL),\
(144, 'Mongolia', 'MN', NULL, NULL),\
(145, 'Montserrat', 'MS', NULL, NULL),\
(146, 'Morocco', 'MA', NULL, NULL),\
(147, 'Mozambique', 'MZ', NULL, NULL),\
(148, 'Myanmar', 'MM', NULL, NULL),\
(149, 'Namibia', 'NA', NULL, NULL),\
(150, 'Nauru', 'NR', NULL, NULL),\
(151, 'Nepal', 'NP', NULL, NULL),\
(152, 'Netherlands', 'NL', NULL, NULL),\
(153, 'Netherlands Antilles', 'AN', NULL, NULL),\
(154, 'New Caledonia', 'NC', NULL, NULL),\
(155, 'New Zealand', 'NZ', NULL, NULL),\
(156, 'Nicaragua', 'NI', NULL, NULL),\
(157, 'Niger', 'NE', NULL, NULL),\
(158, 'Nigeria', 'NG', NULL, NULL),\
(159, 'Niue', 'NU', NULL, NULL),\
(160, 'Norfork Island', 'NF', NULL, NULL),\
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),\
(162, 'Norway', 'NO', NULL, NULL),\
(163, 'Oman', 'OM', NULL, NULL),\
(164, 'Pakistan', 'PK', NULL, NULL),\
(165, 'Palau', 'PW', NULL, NULL),\
(166, 'Panama', 'PA', NULL, NULL),\
(167, 'Papua New Guinea', 'PG', NULL, NULL),\
(168, 'Paraguay', 'PY', NULL, NULL),\
(169, 'Peru', 'PE', NULL, NULL),\
(170, 'Philippines', 'PH', NULL, NULL),\
(171, 'Pitcairn', 'PN', NULL, NULL),\
(172, 'Poland', 'PL', NULL, NULL),\
(173, 'Portugal', 'PT', NULL, NULL),\
(174, 'Puerto Rico', 'PR', NULL, NULL),\
(175, 'Qatar', 'QA', NULL, NULL),\
(176, 'Republic of South Sudan', 'SS', NULL, NULL),\
(177, 'Reunion', 'RE', NULL, NULL),\
(178, 'Romania', 'RO', NULL, NULL),\
(179, 'Russian Federation', 'RU', NULL, NULL),\
(180, 'Rwanda', 'RW', NULL, NULL),\
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),\
(182, 'Saint Lucia', 'LC', NULL, NULL),\
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),\
(184, 'Samoa', 'WS', NULL, NULL),\
(185, 'San Marino', 'SM', NULL, NULL),\
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),\
(187, 'Saudi Arabia', 'SA', NULL, NULL),\
(188, 'Senegal', 'SN', NULL, NULL),\
(189, 'Serbia', 'RS', NULL, NULL),\
(190, 'Seychelles', 'SC', NULL, NULL),\
(191, 'Sierra Leone', 'SL', NULL, NULL),\
(192, 'Singapore', 'SG', NULL, NULL),\
(193, 'Slovakia', 'SK', NULL, NULL),\
(194, 'Slovenia', 'SI', NULL, NULL),\
(195, 'Solomon Islands', 'SB', NULL, NULL),\
(196, 'Somalia', 'SO', NULL, NULL),\
(197, 'South Africa', 'ZA', NULL, NULL),\
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),\
(199, 'Spain', 'ES', NULL, NULL),\
(200, 'Sri Lanka', 'LK', NULL, NULL),\
(201, 'St. Helena', 'SH', NULL, NULL),\
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),\
(203, 'Sudan', 'SD', NULL, NULL),\
(204, 'Suriname', 'SR', NULL, NULL),\
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),\
(206, 'Swaziland', 'SZ', NULL, NULL),\
(207, 'Sweden', 'SE', NULL, NULL),\
(208, 'Switzerland', 'CH', NULL, NULL),\
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),\
(210, 'Taiwan', 'TW', NULL, NULL),\
(211, 'Tajikistan', 'TJ', NULL, NULL),\
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),\
(213, 'Thailand', 'TH', NULL, NULL),\
(214, 'Togo', 'TG', NULL, NULL),\
(215, 'Tokelau', 'TK', NULL, NULL),\
(216, 'Tonga', 'TO', NULL, NULL),\
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),\
(218, 'Tunisia', 'TN', NULL, NULL),\
(219, 'Turkey', 'TR', NULL, NULL),\
(220, 'Turkmenistan', 'TM', NULL, NULL),\
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),\
(222, 'Tuvalu', 'TV', NULL, NULL),\
(223, 'Uganda', 'UG', NULL, NULL),\
(224, 'Ukraine', 'UA', NULL, NULL),\
(225, 'United Arab Emirates', 'AE', NULL, NULL),\
(226, 'United Kingdom', 'GB', NULL, NULL),\
(227, 'United States minor outlying islands', 'UM', NULL, NULL),\
(228, 'Uruguay', 'UY', NULL, NULL),\
(229, 'Uzbekistan', 'UZ', NULL, NULL),\
(230, 'Vanuatu', 'VU', NULL, NULL),\
(231, 'Vatican City State', 'VA', NULL, NULL),\
(232, 'Venezuela', 'VE', NULL, NULL),\
(233, 'Vietnam', 'VN', NULL, NULL),\
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),\
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),\
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),\
(237, 'Western Sahara', 'EH', NULL, NULL),\
(238, 'Yemen', 'YE', NULL, NULL),\
(239, 'Yugoslavia', 'YU', NULL, NULL),\
(240, 'Zaire', 'ZR', NULL, NULL),\
(241, 'Zambia', 'ZM', NULL, NULL),\
(242, 'Zimbabwe', 'ZW', NULL, NULL);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `country_filters`\
--\
\
CREATE TABLE `country_filters` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `task_id` bigint(20) DEFAULT NULL,\
  `country_id` bigint(20) DEFAULT NULL,\
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `failed_jobs`\
--\
\
CREATE TABLE `failed_jobs` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,\
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,\
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,\
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,\
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `filters`\
--\
\
CREATE TABLE `filters` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `task_id` bigint(20) NOT NULL,\
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `user_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `country_applied` tinyint(1) NOT NULL DEFAULT '0',\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `influencer_payment_details`\
--\
\
CREATE TABLE `influencer_payment_details` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` bigint(20) NOT NULL,\
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_holders_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_billing_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `card_expiry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `ccv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `influencer_payment_details`\
--\
\
INSERT INTO `influencer_payment_details` (`id`, `user_id`, `card_type`, `card_holders_name`, `card_billing_address`, `card_billing_zip_code`, `card_no`, `card_expiry`, `ccv`, `created_at`, `updated_at`) VALUES\
(1, 3, 'fjakjdfkl', 'fkjdalkfj', 'fkjadlkfj', 'aldjf', 'jakldfjkl', 'jakdfjlk', 'fsklajflkad', '2019-12-29 05:45:48', '2019-12-29 05:45:48');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `influencer_profiles`\
--\
\
CREATE TABLE `influencer_profiles` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `uid` bigint(20) NOT NULL,\
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `migrations`\
--\
\
CREATE TABLE `migrations` (\
  `id` int(10) UNSIGNED NOT NULL,\
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `batch` int(11) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `migrations`\
--\
\
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES\
(104, '2014_10_12_000000_create_users_table', 1),\
(105, '2014_10_12_100000_create_password_resets_table', 1),\
(106, '2019_08_19_000000_create_failed_jobs_table', 1),\
(107, '2019_11_29_073106_create_user_profiles_table', 1),\
(108, '2019_12_05_071829_create_user_images_table', 1),\
(109, '2019_12_05_075423_create_roles_table', 1),\
(110, '2019_12_06_092509_create_influencer_profiles_table', 1),\
(111, '2019_12_06_092542_create_advertiser_profiles_table', 1),\
(112, '2019_12_10_080059_create_advertiser_company_details_table', 1),\
(113, '2019_12_11_071305_create_tasks_table', 1),\
(114, '2019_12_11_071622_create_filters_table', 1),\
(115, '2019_12_11_072010_create_countries_table', 1),\
(116, '2019_12_11_072116_create_country_filters_table', 1),\
(117, '2019_12_27_125113_create_persmissions_table', 1),\
(118, '2019_12_27_125312_create_role_persmissions_table', 1),\
(119, '2019_12_29_103036_create_advertiser_payment_details_table', 1),\
(120, '2019_12_29_103725_create_influencer_payment_details_table', 1);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `password_resets`\
--\
\
CREATE TABLE `password_resets` (\
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `persmissions`\
--\
\
CREATE TABLE `persmissions` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `persmissions`\
--\
\
INSERT INTO `persmissions` (`id`, `name`, `created_at`, `updated_at`) VALUES\
(1, 'Create', '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(2, 'Read', '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(3, 'Update', '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(4, 'Delete', '2019-12-29 05:40:04', '2019-12-29 05:40:04');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `roles`\
--\
\
CREATE TABLE `roles` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `roles`\
--\
\
INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES\
(1, 'super_admin', '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(2, 'admin', '2019-12-29 05:40:04', '2019-12-29 05:40:04');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `role_persmissions`\
--\
\
CREATE TABLE `role_persmissions` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `role_id` bigint(20) NOT NULL,\
  `persmission_id` bigint(20) NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `role_persmissions`\
--\
\
INSERT INTO `role_persmissions` (`id`, `role_id`, `persmission_id`, `created_at`, `updated_at`) VALUES\
(1, 1, 1, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(2, 1, 2, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(3, 1, 3, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(4, 1, 4, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(5, 2, 1, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(6, 2, 2, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(7, 2, 3, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(8, 2, 4, '2019-12-29 05:40:04', '2019-12-29 05:40:04');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `tasks`\
--\
\
CREATE TABLE `tasks` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` bigint(20) NOT NULL,\
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `user_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `user_reached` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `task_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `filter_applied` tinyint(1) NOT NULL DEFAULT '0',\
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `users`\
--\
\
CREATE TABLE `users` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `role_id` bigint(20) DEFAULT NULL,\
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `users`\
--\
\
INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `access_token`, `email_verified_at`, `type`, `password`, `account_status`, `role_id`, `remember_token`, `profile_picture`, `is_deleted`, `created_at`, `updated_at`) VALUES\
(1, 'superadmin', NULL, 'superadmin@admin.com', NULL, NULL, 'super_admin', '$2y$10$YLykj9w5CQgVV14Ha3R55ee.RZ6heRVoC3f.BfGpEpg.tGxM5HoKy', NULL, 1, NULL, NULL, 0, '2019-12-29 05:40:04', '2019-12-29 05:40:04'),\
(2, 'admin', NULL, 'admin@admin.com', NULL, NULL, 'admin', '$2y$10$lqxWTYoRL4wmKkmHMCWQDueFsW464pEvLCQMK3TzEvVeC3dnSO/wK', NULL, 2, 'b6be6fcc-51e1-4341-9fce-25e8517bbe45', NULL, 0, '2019-12-29 05:40:04', '2019-12-29 08:23:40'),\
(3, 'sdfsdf2222', 'infldsljfldksjlfk', NULL, 'fsfsdfsdf', NULL, 'influencer', NULL, 'pending', NULL, '7273a648-202c-432b-a169-6b1680ea0f0a', 'lsdjflksjflsdfs.jpg', 0, '2019-12-29 05:44:18', '2019-12-29 05:44:18'),\
(4, 'advinfcWn1', 'adv inf', 'fsdfsdffsd21@gmail.com', NULL, NULL, 'advertiser', '$2y$10$5xyW9sf6BKts8nm2JPAGwOCfvAgNf0hiPJJ3720k0iCBy8dFbMLui', 'pending', NULL, '4ae502db-fd72-49ea-9eef-f766b8141971', NULL, 0, '2019-12-29 05:46:03', '2019-12-29 05:46:03');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `user_images`\
--\
\
CREATE TABLE `user_images` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `user_id` int(11) NOT NULL,\
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `cnic_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `cnic_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Dumping data for table `user_images`\
--\
\
INSERT INTO `user_images` (`id`, `user_id`, `profile_image`, `cnic_front`, `cnic_back`, `created_at`, `updated_at`) VALUES\
(1, 3, NULL, 'http://127.0.0.1:8000/images/uploads/104441Screenshot2019-12-08at6.57.15PM.png', 'http://127.0.0.1:8000/images/uploads/104441Screenshot2019-12-22at2.03.35PM.png', '2019-12-29 05:44:41', '2019-12-29 05:44:41');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `user_profiles`\
--\
\
CREATE TABLE `user_profiles` (\
  `id` bigint(20) UNSIGNED NOT NULL,\
  `uid` bigint(20) NOT NULL,\
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,\
  `type` enum('influencer','advertiser','admin','super_admin') COLLATE utf8mb4_unicode_ci NOT NULL,\
  `created_at` timestamp NULL DEFAULT NULL,\
  `updated_at` timestamp NULL DEFAULT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\
\
--\
-- Indexes for dumped tables\
--\
\
--\
-- Indexes for table `advertiser_company_details`\
--\
ALTER TABLE `advertiser_company_details`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `advertiser_payment_details`\
--\
ALTER TABLE `advertiser_payment_details`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `advertiser_profiles`\
--\
ALTER TABLE `advertiser_profiles`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `countries`\
--\
ALTER TABLE `countries`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `country_filters`\
--\
ALTER TABLE `country_filters`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `failed_jobs`\
--\
ALTER TABLE `failed_jobs`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `filters`\
--\
ALTER TABLE `filters`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `influencer_payment_details`\
--\
ALTER TABLE `influencer_payment_details`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `influencer_profiles`\
--\
ALTER TABLE `influencer_profiles`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `migrations`\
--\
ALTER TABLE `migrations`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `password_resets`\
--\
ALTER TABLE `password_resets`\
  ADD KEY `password_resets_email_index` (`email`);\
\
--\
-- Indexes for table `persmissions`\
--\
ALTER TABLE `persmissions`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `roles`\
--\
ALTER TABLE `roles`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `role_persmissions`\
--\
ALTER TABLE `role_persmissions`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `tasks`\
--\
ALTER TABLE `tasks`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `users`\
--\
ALTER TABLE `users`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `user_images`\
--\
ALTER TABLE `user_images`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- Indexes for table `user_profiles`\
--\
ALTER TABLE `user_profiles`\
  ADD PRIMARY KEY (`id`);\
\
--\
-- AUTO_INCREMENT for dumped tables\
--\
\
--\
-- AUTO_INCREMENT for table `advertiser_company_details`\
--\
ALTER TABLE `advertiser_company_details`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;\
\
--\
-- AUTO_INCREMENT for table `advertiser_payment_details`\
--\
ALTER TABLE `advertiser_payment_details`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- AUTO_INCREMENT for table `advertiser_profiles`\
--\
ALTER TABLE `advertiser_profiles`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;\
\
--\
-- AUTO_INCREMENT for table `countries`\
--\
ALTER TABLE `countries`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;\
\
--\
-- AUTO_INCREMENT for table `country_filters`\
--\
ALTER TABLE `country_filters`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT for table `failed_jobs`\
--\
ALTER TABLE `failed_jobs`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT for table `filters`\
--\
ALTER TABLE `filters`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT for table `influencer_payment_details`\
--\
ALTER TABLE `influencer_payment_details`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- AUTO_INCREMENT for table `influencer_profiles`\
--\
ALTER TABLE `influencer_profiles`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT for table `migrations`\
--\
ALTER TABLE `migrations`\
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;\
\
--\
-- AUTO_INCREMENT for table `persmissions`\
--\
ALTER TABLE `persmissions`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;\
\
--\
-- AUTO_INCREMENT for table `roles`\
--\
ALTER TABLE `roles`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;\
\
--\
-- AUTO_INCREMENT for table `role_persmissions`\
--\
ALTER TABLE `role_persmissions`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;\
\
--\
-- AUTO_INCREMENT for table `tasks`\
--\
ALTER TABLE `tasks`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
\
--\
-- AUTO_INCREMENT for table `users`\
--\
ALTER TABLE `users`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;\
\
--\
-- AUTO_INCREMENT for table `user_images`\
--\
ALTER TABLE `user_images`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- AUTO_INCREMENT for table `user_profiles`\
--\
ALTER TABLE `user_profiles`\
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;\
}