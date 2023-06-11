-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2023 at 04:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `posted_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `posted_date`) VALUES
(7, 'muhammadbilaluaf72@gmail.com', 2, 'Oh Amazing Movie', '2023-06-07 09:34:46'),
(8, 'muhammadbilaluaf72@gmail.com', 2, 'I like the theme song', '2023-06-07 09:34:56'),
(9, 'muhammadbilaluaf72@gmail.com', 2, 'Whoever Watched this movie?\r\nI remember the days when  I used to watch this movie while eating popcorns', '2023-06-07 09:35:25'),
(11, 'muhammadbilaluaf72@gmail.com', 3, 'i like this phone', '2023-06-07 23:21:36'),
(12, 'muhammadbilaluaf72@gmail.com', 5, 'Can u describe what are the ways', '2023-06-08 10:16:54'),
(13, 'muhammadbilaluaf72@gmail.com', 5, 'I want to get a list', '2023-06-08 10:17:01'),
(14, 'john@gmail.com', 6, 'I like the photo', '2023-06-09 09:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
CREATE TABLE IF NOT EXISTS `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `posted_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `user_id`, `post_id`, `posted_date`) VALUES
(1, 'muhammadbilaluaf72@gmail.com', 2, '2023-06-07 09:34:05'),
(2, 'muhammadbilaluaf72@gmail.com', 3, '2023-06-07 23:21:21'),
(3, 'muhammadbilaluaf72@gmail.com', 5, '2023-06-08 10:17:14'),
(4, 'john@gmail.com', 6, '2023-06-09 09:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `posted_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user`, `title`, `description`, `img`, `posted_date`) VALUES
(9, 'muhammadbilaluaf72@gmail.com', 'Shrek', 'Shrek is an animated film that tells the story of an ogre named Shrek whose peaceful life is disrupted when fairy tale characters invade his swamp. To reclaim his solitude, Shrek embarks on a quest to rescue Princess Fiona, who is intended to be the bride of the villainous Lord Farquaad. Along the way, Shrek discovers the true meaning of friendship and love, challenging societal expectations and celebrating individuality.', 'uploads/shrek.jpg', '2023-06-10 21:49:01'),
(3, 'saim@gmail.com', 'Poco M3', 'This Pocco M3 Will surprise you from its price', 'uploads/Poco-M3-review-india-with-pros-and-cons.jpg', '2023-06-07 07:47:45'),
(7, 'muhammadbilaluaf72@gmail.com', 'Jurassic World Camp Creatious', 'urassic World Camp Cretaceous follows a group of six teenagers chosen for a once-in-a-lifetime experience at a new adventure camp on the opposite side of Isla Nublar. But when dinosaurs wreak havoc across the island, the campers are stranded', 'uploads/jurraic world camp creatuous.jpg', '2023-06-10 21:40:29'),
(10, 'muhammadbilaluaf72@gmail.com', 'The Secret Life of Pets', 'The Secret Life of Pets is an animated comedy that explores what our pets do when were not around. The film follows Max, a lovable terrier, and his furry friends as they navigate hilarious adventures in the bustling city of New York. When Maxs comfortable life is disrupted by the arrival of a new and unruly pet named Duke, they must put their differences aside and work together to survive an unexpected journey through the citys streets. Packed with humor, heart, and memorable characters, the film offers a delightful peek into the secret lives of our beloved pets.', 'uploads/secret life of pets.jpg', '2023-06-10 21:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
(5, 'Muhammad Bilal G', 'muhammadbilaluaf72@gmail.com', '11111', 'uploads/admin.jpg'),
(6, 'Bilal', 'bilal@agilekode.com', '111', 'uploads/UML.png'),
(7, '', '', '', 'uploads/'),
(8, 'rashid', 'rashid@gmail.com', '111', 'uploads/Screenshot 2023-06-07 135804.png'),
(9, 'John Doe', 'john@gmail.com', '11111', 'uploads/user.jpg'),
(10, 'Muskan Khan', 'muskan@outlook.com', 'muskan', 'uploads/1c42dbe4cfb44025ac69d041568cf2c5.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
