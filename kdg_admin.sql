-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 07:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdg_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'Super', 'Admin', 'admin@server.com', 'administrator', '$2y$10$LNwNFdhpQp8SkrbqKZ4tcuwNWkkH62iDpNcCJqL2Hqv03stxILb4C');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `title` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id` int(12) NOT NULL,
  `author` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `category` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `keywords` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `page` varchar(140) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `img_alt` varchar(140) NOT NULL,
  `show_title` int(1) NOT NULL DEFAULT 1,
  `show_byline` int(11) NOT NULL DEFAULT 1,
  `no_index` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `copy` varchar(32) NOT NULL DEFAULT '(c) 2017 by KDG Web Design',
  `slide_category` varchar(32) NOT NULL,
  `hits` int(11) NOT NULL,
  `schemadata` longtext NOT NULL,
  `moddate` varchar(128) NOT NULL,
  `modauthor` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`title`, `body`, `id`, `author`, `created_date`, `category`, `keywords`, `description`, `image`, `active`, `page`, `img_alt`, `show_title`, `show_byline`, `no_index`, `featured`, `copy`, `slide_category`, `hits`, `schemadata`, `moddate`, `modauthor`) VALUES
('About Us', '    <section class=\"page-section about-heading\">\r\n        <div class=\"container\"><img class=\"img-fluid rounded about-heading-img mb-3 mb-lg-0\" src=\"assets/img/about.jpg\">\r\n            <div class=\"about-heading-content\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-10 col-xl-9 mx-auto\">\r\n                        <div class=\"bg-faded rounded p-5\">\r\n                            <h2 class=\"section-heading mb-4\"><span class=\"section-heading-upper\">Strong Coffee, Strong Roots</span><span class=\"section-heading-lower\">&nbsp;About Our Cafe</span></h2>\r\n                            <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>\r\n                            <p class=\"mb-0\"><span>We guarantee that you will fall in&nbsp;</span><span>lust</span><span>&nbsp;with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.</span></p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n', 1, 'Johnny Watts', 'Tue, 12 Apr 2022 13:07:17 EDT', 'general', '', '    <section class=\"page-section about-heading\">\r\n        <div class=\"container\"><img class=\"img-fluid rounded about-heading-img mb-3 mb-lg-0\" src=\"assets/img/about.jpg\">\r\n            <div class=\"about-heading-content\">\r\n                <div class=\"row\">\r\n                    <div class=\"col-lg-10 col-xl-9 mx-auto\">\r\n                        <div class=\"bg-faded rounded p-5\">\r\n                            <h2 class=\"section-heading mb-4\"><span class=\"section-heading-upper\">Strong Coffee, Strong Roots</span><span class=\"section-heading-lower\">&nbsp;About Our Cafe</span></h2>\r\n                            <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>\r\n                            <p class=\"mb-0\"><span>We guarantee that you will fall in&nbsp;</span><span>lust</span><span>&nbsp;with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.</span></p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>\r\n', '/assets/img/about.jpg', 1, 'about', 'About KDG_ADMIN', 1, 0, 1, 0, '(c) 2017 by KDG Web Design', '', 0, '', 'Tue, 12 Apr 2022 13:07:17 EDT', 'Super Admin'),
('Products', ' <section class=\"page-section\">\r\n\r\n        <div class=\"container\">\r\n\r\n            <div class=\"product-item\">\r\n\r\n                <div class=\"d-flex product-item-title\">\r\n\r\n                    <div class=\"d-flex me-auto bg-faded p-5 rounded\">\r\n\r\n                        <h2 class=\"section-heading mb-0\"><span class=\"section-heading-upper\">Blended to Perfection</span><span class=\"section-heading-lower\">Coffees &amp; Teas</span></h2>\r\n\r\n                    </div>\r\n\r\n                </div><img class=\"img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded\" src=\"assets/img/products-01.jpg\">\r\n\r\n                <div class=\"bg-faded p-5 rounded\">\r\n\r\n                    <p class=\"mb-0\">We take pride in our work, and it shows. Every time you order a beverage from us, we guarantee that it will be an experience worth having. Whether it\'s our world famous Venezuelan Cappuccino, a refreshing iced herbal tea, or something as simple as a cup of speciality sourced black coffee, you will be coming back for more.</p>\r\n\r\n                </div>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </section>\r\n\r\n    <section class=\"page-section\">\r\n\r\n        <div class=\"container\">\r\n\r\n            <div class=\"product-item\">\r\n\r\n                <div class=\"d-flex product-item-title\">\r\n\r\n                    <div class=\"d-flex ms-auto bg-faded p-5 rounded\">\r\n\r\n                        <h2 class=\"section-heading mb-0\"><span class=\"section-heading-upper\">Delicious Treats, Good Eats</span><span class=\"section-heading-lower\">Bakery &amp; Kitchen</span></h2>\r\n\r\n                    </div>\r\n\r\n                </div><img class=\"img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded\" src=\"assets/img/products-02.jpg\">\r\n\r\n                <div class=\"bg-faded p-5 rounded\">\r\n\r\n                    <p class=\"mb-0\">Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.</p>\r\n\r\n                </div>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </section>\r\n\r\n    <section class=\"page-section\">\r\n\r\n        <div class=\"container\">\r\n\r\n            <div class=\"product-item\">\r\n\r\n                <div class=\"d-flex product-item-title\">\r\n\r\n                    <div class=\"d-flex mx-auto bg-faded p-5 rounded\">\r\n\r\n                        <h2 class=\"section-heading mb-0\"><span class=\"section-heading-upper\">From Around the World</span><span class=\"section-heading-lower\">Bulk Speciality Blends</span></h2>\r\n\r\n                    </div>\r\n\r\n                </div><img class=\"img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded\" src=\"assets/img/products-03.jpg\">\r\n\r\n                <div class=\"bg-faded p-5 rounded\">\r\n\r\n                    <p class=\"mb-0\">Travelling the world for the very best quality coffee is something take pride in. When you visit us, you\'ll always find new blends from around the world, mainly from regions in Central and South America. We sell our blends in smaller to large bulk quantities. Please visit us in person for more details.</p>\r\n\r\n                </div>\r\n\r\n            </div>\r\n\r\n        </div>\r\n\r\n    </section>', 3, 'Johnny Watts', 'Tue, 12 Apr 2022 13:29:10 EDT', 'general', '', 'Travelling the world for the very best quality coffee is something take pride in. When you visit us, you\'ll always find new blends from around the world, mainly from regions in Central and South America.', '/assets/img/products-01.jpg', 1, 'products', 'Products KDG_ADMIN', 1, 0, 1, 0, '(c) 2017 by KDG Web Design', '', 0, '', 'Tue, 12 Apr 2022 13:29:10 EDT', 'Super Admin'),
('Store', '    <section class=\"page-section cta\">\n        <div class=\"container\">\n            <div class=\"row\">\n                <div class=\"col-xl-9 mx-auto\">\n                    <div class=\"text-center cta-inner rounded\">\n                        <h2 class=\"section-heading mb-5\"><span class=\"section-heading-upper\">Come On In</span><span class=\"section-heading-lower\">We\'re Open</span></h2>\n                        <ul class=\"list-unstyled text-start mx-auto list-hours mb-5\">\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Sunday<span class=\"ms-auto\">Closed</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Monday<span class=\"ms-auto\">7:00 AM to 8:00 PM</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Tuesday<span class=\"ms-auto\">7:00 AM to 8:00 PM</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Wednesday<span class=\"ms-auto\">7:00 AM to 8:00 PM</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Thursday<span class=\"ms-auto\">7:00 AM to 8:00 PM</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Friday<span class=\"ms-auto\">7:00 AM to 8:00 PM</span></li>\n                            <li class=\"d-flex list-unstyled-item list-hours-item\">Saturday<span class=\"ms-auto\">9:00 AM to 5:00 PM</span></li>\n                        </ul>\n                        <p class=\"address mb-5\"><em><strong>1116 Orchard Street</strong><span><br>Golden Valley, Minnesota</span></em></p>\n                        <p class=\"address mb-0\"><small><em>Call Anytime</em></small><span><br>(317) 585-8468</span></p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n    <section class=\"page-section about-heading\">\n        <div class=\"container\"><img class=\"img-fluid rounded about-heading-img mb-3 mb-lg-0\" src=\"assets/img/about.jpg\">\n            <div class=\"about-heading-content\">\n                <div class=\"row\">\n                    <div class=\"col-lg-10 col-xl-9 mx-auto\">\n                        <div class=\"bg-faded rounded p-5\">\n                            <h2 class=\"section-heading mb-4\"><span class=\"section-heading-upper\">Strong Coffee, Strong Roots</span><span class=\"section-heading-lower\">&nbsp;About Our Cafe</span></h2>\n                            <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>\n                            <p class=\"mb-0\"><span>We guarantee that you will fall in&nbsp;</span><em>lust</em><span>&nbsp;with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.</span></p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n', 4, 'Johnny Watts', 'Tue, 12 Apr 2022 13:38:43 EDT', 'general', '', 'Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America.', '/assets/img/products-03.jpg', 1, 'store', 'Store KDG_ADMIN', 1, 0, 1, 0, '(c) 2017 by KDG Web Design', '', 0, '', 'Tue, 12 Apr 2022 13:38:43 EDT', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bot-logs`
--

CREATE TABLE `bot-logs` (
  `id` int(1) NOT NULL,
  `ip-addy` varchar(50) NOT NULL,
  `is-blocked` int(1) NOT NULL DEFAULT 0,
  `logged-from` varchar(100) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `usr-agnt` varchar(254) NOT NULL DEFAULT 'Unknown',
  `reason` varchar(150) NOT NULL DEFAULT 'Not Blocked',
  `created_date` varchar(32) NOT NULL,
  `referer` varchar(254) NOT NULL,
  `remotehost` varchar(254) NOT NULL,
  `request` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(120) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `keywords` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `keywords`) VALUES
(1, 'general', '', ''),
(2, 'articles', '', ''),
(3, 'legal', '', ''),
(4, 'guides', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact-request`
--

CREATE TABLE `contact-request` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `service` varchar(32) NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `needs_ecom` varchar(3) NOT NULL,
  `disc-code` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` longtext NOT NULL,
  `image` mediumtext NOT NULL,
  `caption` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `haxxors`
--

CREATE TABLE `haxxors` (
  `id` int(11) NOT NULL,
  `ip_addy` varchar(50) NOT NULL,
  `name` varchar(254) NOT NULL,
  `logged-from` longtext NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0,
  `usr-agnt` varchar(254) NOT NULL DEFAULT 'Unknown',
  `is-blocked` int(1) NOT NULL DEFAULT 1,
  `created_date` varchar(32) NOT NULL,
  `referer` varchar(254) NOT NULL,
  `remotehost` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_menu`
--

CREATE TABLE `home_menu` (
  `id` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `label` varchar(82) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `httpbl`
--

CREATE TABLE `httpbl` (
  `id` int(11) NOT NULL,
  `ip_addy` varchar(254) NOT NULL,
  `type` varchar(84) NOT NULL,
  `threat` int(2) NOT NULL,
  `usr-agnt` varchar(254) NOT NULL,
  `created_date` varchar(64) NOT NULL,
  `logged-from` varchar(254) NOT NULL,
  `activity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `image-desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jackpot`
--

CREATE TABLE `jackpot` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `login_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL,
  `type` varchar(24) NOT NULL,
  `phrase` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passcode` varchar(128) NOT NULL,
  `group` varchar(30) NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` longtext NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_side`
--

CREATE TABLE `m_side` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `not_found`
--

CREATE TABLE `not_found` (
  `id` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `ip_addy` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offline`
--

CREATE TABLE `offline` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offline`
--

INSERT INTO `offline` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quote-request`
--

CREATE TABLE `quote-request` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `url` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `has_url` varchar(3) NOT NULL DEFAULT 'no',
  `email_auth` varchar(3) NOT NULL DEFAULT 'yes',
  `phone_auth` varchar(3) NOT NULL DEFAULT 'no',
  `best` varchar(30) NOT NULL,
  `Service` varchar(48) NOT NULL,
  `details` longtext NOT NULL,
  `created_date` varchar(32) NOT NULL,
  `image` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `disc-code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `side_menu`
--

CREATE TABLE `side_menu` (
  `id` int(11) NOT NULL,
  `page` varchar(64) COLLATE utf8_bin NOT NULL,
  `url` varchar(128) COLLATE utf8_bin NOT NULL,
  `label` varchar(64) COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `category` varchar(48) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `site-config`
--

CREATE TABLE `site-config` (
  `id` int(11) NOT NULL,
  `title` varchar(84) NOT NULL,
  `header-img` varchar(50) NOT NULL,
  `header_img_alt` varchar(64) NOT NULL DEFAULT 'Site Logo',
  `copy` varchar(254) NOT NULL DEFAULT 'Copyright (c) 2016 by KDG CMS | <a href="http://kaoticka.com">Kaosium Design Group</a>',
  `site_description` varchar(180) NOT NULL,
  `site_keywords` varchar(128) NOT NULL,
  `ogp_image` varchar(64) NOT NULL,
  `ogp_image_type` varchar(32) NOT NULL,
  `ogp_url` varchar(50) NOT NULL,
  `ogp_img_width` int(4) NOT NULL,
  `ogp_img_height` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `url` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` longtext NOT NULL,
  `created_date` varchar(60) NOT NULL,
  `image` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Registered'),
(3, 'Member'),
(4, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_ips`
--

CREATE TABLE `visitor_ips` (
  `id` int(11) NOT NULL,
  `ip_addy` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `logged-from` longtext NOT NULL,
  `seen` int(1) NOT NULL DEFAULT 0,
  `usr-agnt` longtext NOT NULL,
  `is-blocked` int(1) NOT NULL DEFAULT 0,
  `created_date` varchar(32) NOT NULL,
  `referer` varchar(254) NOT NULL,
  `remotehost` varchar(254) NOT NULL,
  `reason` varchar(84) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bot-logs`
--
ALTER TABLE `bot-logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact-request`
--
ALTER TABLE `contact-request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `haxxors`
--
ALTER TABLE `haxxors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_menu`
--
ALTER TABLE `home_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httpbl`
--
ALTER TABLE `httpbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jackpot`
--
ALTER TABLE `jackpot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_side`
--
ALTER TABLE `m_side`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_found`
--
ALTER TABLE `not_found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline`
--
ALTER TABLE `offline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote-request`
--
ALTER TABLE `quote-request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_menu`
--
ALTER TABLE `side_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site-config`
--
ALTER TABLE `site-config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_ips`
--
ALTER TABLE `visitor_ips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bot-logs`
--
ALTER TABLE `bot-logs`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact-request`
--
ALTER TABLE `contact-request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `haxxors`
--
ALTER TABLE `haxxors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_menu`
--
ALTER TABLE `home_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `httpbl`
--
ALTER TABLE `httpbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jackpot`
--
ALTER TABLE `jackpot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_side`
--
ALTER TABLE `m_side`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `not_found`
--
ALTER TABLE `not_found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offline`
--
ALTER TABLE `offline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quote-request`
--
ALTER TABLE `quote-request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `side_menu`
--
ALTER TABLE `side_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site-config`
--
ALTER TABLE `site-config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor_ips`
--
ALTER TABLE `visitor_ips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
