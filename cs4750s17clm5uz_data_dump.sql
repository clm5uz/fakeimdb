-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 04:34 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4750s17clm5uz`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`cs4750s17clm5uz`@`%` PROCEDURE `insert_phone`(IN user INT, IN phone CHAR(15))
BEGIN
  INSERT INTO user_phone VALUES (user, phone);
END$$

CREATE DEFINER=`cs4750s17clm5uz`@`%` PROCEDURE `test`(IN id INT)
BEGIN
  SELECT * FROM user WHERE user_id = id;
END$$

CREATE DEFINER=`cs4750s17clm5uz`@`%` PROCEDURE `test2`(IN con INT)
BEGIN
  SELECT first_name FROM user
  WHERE user_id = con;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `actor_id` int(11) NOT NULL,
  `first_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `first_name`, `last_name`) VALUES
(1, 'Tom', 'Cruise\r\n'),
(2, 'Brad', 'Pitt\r\n'),
(3, 'Angelina', 'Jolie\r\n'),
(4, 'Jennifer', 'Aniston\r\n'),
(5, 'Morgan', 'Freeman\r\n'),
(6, 'Denzel', 'Washington\r\n'),
(7, 'Scarlett', 'Johansson\r\n'),
(8, 'Tina', 'Fey\r\n'),
(9, 'Emma', 'Watson\r\n'),
(10, 'Ryan', 'Reynolds\r\n'),
(11, 'Ryan', 'Gosling\r\n'),
(12, 'Mark', 'Wahlberg\r\n'),
(13, 'Dwayne', 'Johnson\r\n'),
(14, 'Ashton', 'Kutcher\r\n'),
(15, 'Mila', 'Kunis\r\n'),
(16, 'Matt', 'Damon\r\n'),
(17, 'Tom', 'Hardy\r\n'),
(18, 'Leonardo', 'DiCaprio\r\n'),
(19, 'Meryl', 'Streep\r\n'),
(20, 'Emma', 'Stone\r\n'),
(21, 'Tom ', 'Hanks\r\n'),
(22, 'Elijah ', 'Wood\r\n'),
(23, 'Jason', 'Segel\r\n'),
(24, 'Amy', 'Poehler\r\n'),
(25, 'Kathy', 'Bates\r\n'),
(26, 'Jack', 'Nicholson\r\n'),
(27, 'John', 'Travolta'),
(28, 'Liam', 'Neeson'),
(29, 'Michael J', 'Fox'),
(30, 'Harrison', 'Ford'),
(31, 'Sam', 'Neill'),
(32, 'Laura', 'Dern'),
(33, 'Sean', 'Connery'),
(34, 'Lorraine', 'Gary'),
(35, 'Robert', 'Shaw'),
(36, 'Richard', 'Dreyfuss'),
(37, 'Colin', 'Farrell'),
(38, 'Jonah', 'Hill'),
(39, 'Margot', 'Robbie'),
(40, 'Matthew', 'McConaughey');

-- --------------------------------------------------------

--
-- Table structure for table `acts_in`
--

CREATE TABLE IF NOT EXISTS `acts_in` (
  `actor_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acts_in`
--

INSERT INTO `acts_in` (`actor_id`, `media_id`) VALUES
(21, 26),
(18, 5),
(4, 17),
(6, 2),
(5, 8),
(22, 27),
(22, 28),
(22, 29),
(23, 18),
(24, 12),
(24, 4),
(26, 3),
(27, 9),
(5, 14),
(21, 34),
(21, 35),
(21, 36),
(21, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(28, 42),
(29, 43),
(30, 44),
(31, 45),
(32, 45),
(30, 46),
(33, 46),
(34, 47),
(35, 47),
(36, 47),
(1, 48),
(37, 48),
(18, 49),
(16, 49),
(26, 49),
(12, 49),
(18, 50),
(38, 50),
(39, 50),
(40, 50),
(18, 50);

-- --------------------------------------------------------

--
-- Table structure for table `created_by`
--

CREATE TABLE IF NOT EXISTS `created_by` (
  `media_id` int(11) DEFAULT NULL,
  `studio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `created_by`
--

INSERT INTO `created_by` (`media_id`, `studio_id`) VALUES
(1, 9),
(1, 12),
(2, 12),
(2, 13),
(33, 8),
(32, 3),
(32, 10),
(32, 11),
(31, 3),
(31, 10),
(31, 11),
(30, 3),
(30, 10),
(30, 11),
(29, 10),
(29, 11),
(28, 10),
(28, 11),
(27, 10),
(27, 11),
(26, 4),
(3, 6),
(4, 5),
(25, 14),
(25, 15),
(5, 6),
(6, 6),
(24, 16),
(23, 17),
(22, 19),
(7, 18),
(8, 21),
(21, 20),
(20, 22),
(20, 23),
(19, 24),
(18, 1),
(9, 25),
(10, 27),
(17, 6),
(16, 26),
(16, 28),
(10, 1),
(11, 30),
(15, 29),
(15, 1),
(11, 1),
(14, 10),
(12, 32),
(13, 31),
(1, 9),
(1, 12),
(2, 12),
(2, 13),
(33, 8),
(32, 3),
(32, 10),
(32, 11),
(31, 3),
(31, 10),
(31, 11),
(30, 3),
(30, 10),
(30, 11),
(29, 10),
(29, 11),
(28, 10),
(28, 11),
(27, 10),
(27, 11),
(26, 4),
(3, 6),
(4, 5),
(25, 14),
(25, 15),
(5, 6),
(6, 6),
(24, 16),
(23, 17),
(22, 19),
(7, 18),
(8, 21),
(21, 20),
(20, 22),
(20, 23),
(19, 24),
(18, 1),
(9, 25),
(10, 27),
(17, 6),
(16, 26),
(16, 28),
(10, 1),
(11, 30),
(15, 29),
(15, 1),
(11, 1),
(14, 10),
(12, 32),
(13, 31);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `director_id` int(11) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `first_name`, `last_name`) VALUES
(1, 'Steven', 'Spielberg\r\n'),
(2, 'Quentin', 'Tarantino\r\n'),
(3, 'Martin ', 'Scorcese\r\n'),
(4, 'Woody', 'Allen\r\n'),
(5, 'George', 'Lucas\r\n'),
(6, 'Clint', 'Eastwood\r\n'),
(7, 'Tim', 'Burton\r\n'),
(8, 'Mel', 'Brooks\r\n'),
(9, 'Andrew', 'Stanton\r\n'),
(10, 'Lee', 'Unkrich\r\n'),
(11, 'David', 'Trainer\r\n'),
(12, 'Terry', 'Hughes\r\n'),
(13, 'John', 'Aoshima\r\n'),
(14, 'Aaron', 'Springer\r\n'),
(15, 'Joe', 'Pitt\r\n'),
(16, 'Rob', 'Renzetti\r\n'),
(17, 'Matt', 'Braly\r\n'),
(18, 'Stephen', 'Sandoval\r\n'),
(19, 'Sunil', 'Hall\r\n'),
(20, 'Peter', 'Jackson\r\n'),
(21, 'Paul', 'Scheuring\r\n'),
(22, 'Boaz', 'Yakin\r\n'),
(23, 'Stanley', 'Kubrick\r\n'),
(24, 'Robert', 'Zemeckis\r\n'),
(25, 'Kyle', 'Newacheck\r\n'),
(26, 'Greg', 'Daniels\r\n'),
(27, 'Michael', 'Schur\r\n'),
(28, 'David', 'Fincher\r\n'),
(29, 'Jon', 'Avnet\r\n'),
(30, 'Christopher', 'Nolan\r\n'),
(31, 'Phil', 'Lord\r\n'),
(32, 'Christopher', 'Miller\r\n'),
(33, 'Sidney', 'Lumet\r\n'),
(34, 'Jake', 'Kasdan\r\n'),
(35, 'Frank', 'Darabont\r\n'),
(36, 'Matt', 'Shakman\r\n'),
(37, 'John', 'Kretchmer\r\n'),
(38, 'Gary', 'Halvorson\r\n'),
(39, 'Pamela', 'Fryman\r\n'),
(40, 'Ken', 'Kwapis\r\n'),
(41, 'Andrew', 'McCarthy\r\n'),
(42, 'Graham', 'Linehan\r\n'),
(43, 'Alfred', 'Hitchcock\r\n'),
(44, 'Peter', 'Berg\r\n'),
(45, 'Anton', 'Cropper\r\n'),
(46, 'John', 'Lasseter'),
(47, 'Barry', 'Levinson'),
(48, 'Joseph', 'Kosinski'),
(49, 'Ben', 'Stiller'),
(50, 'Christopher', 'McQuarrie');

-- --------------------------------------------------------

--
-- Table structure for table `directs`
--

CREATE TABLE IF NOT EXISTS `directs` (
  `director_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directs`
--

INSERT INTO `directs` (`director_id`, `media_id`) VALUES
(2, 9),
(9, 1),
(10, 1),
(11, 10),
(12, 10),
(13, 33),
(14, 33),
(15, 33),
(16, 33),
(17, 33),
(18, 33),
(19, 33),
(20, 27),
(20, 28),
(20, 29),
(20, 30),
(20, 31),
(20, 32),
(21, 11),
(22, 2),
(23, 3),
(24, 26),
(25, 13),
(26, 12),
(28, 14),
(29, 4),
(30, 5),
(31, 6),
(32, 6),
(33, 7),
(34, 15),
(35, 8),
(36, 16),
(37, 25),
(38, 17),
(39, 18),
(40, 19),
(41, 20),
(42, 21),
(43, 22),
(44, 23),
(45, 24),
(1, 34),
(35, 35),
(46, 36),
(1, 37),
(47, 38),
(48, 39),
(49, 40),
(50, 41),
(1, 42),
(24, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(3, 49),
(3, 50),
(3, 51);

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE IF NOT EXISTS `episode` (
  `media_id` int(11) DEFAULT NULL,
  `season` int(11) DEFAULT NULL,
  `episode` int(11) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`media_id`, `season`, `episode`, `title`, `duration`) VALUES
(10, 1, 1, 'That ''70s Pilot', 22),
(10, 2, 1, 'Garae Sale', 22),
(10, 3, 1, 'Reefer Madness', 22),
(10, 4, 1, 'It''s a Wonderful Life', 22),
(10, 5, 1, 'Going to California', 22),
(10, 6, 1, 'The Kids Are Alright', 22),
(10, 7, 1, 'Time Is on My Side', 22),
(10, 8, 1, 'Bohemian Rhapsody', 22),
(11, 1, 1, 'Pilot', 42),
(11, 2, 1, 'Manhunt', 41),
(11, 3, 1, 'Orientacion', 43),
(11, 4, 1, 'Scylla', 42),
(12, 1, 1, 'Pilot', 22),
(12, 2, 1, 'Pawnee Zoo', 22),
(12, 3, 1, 'Go Big or Go Home', 22),
(12, 4, 1, 'I''m Leslie Knope', 22),
(12, 5, 1, 'Ms. Knope Goes to Washington', 22),
(12, 6, 1, 'London: Part 1', 22),
(12, 7, 2, 'Ron and Jammy', 22),
(13, 1, 3, 'Office Campout', 22),
(13, 2, 1, 'Heist School', 22),
(13, 3, 1, 'The Business Trip', 22),
(13, 4, 2, 'Fry Guys', 22),
(13, 5, 1, 'Dorm Daze', 22),
(13, 6, 1, 'Wolves of Rancho', 22),
(13, 7, 1, 'Trainees'' Day', 22),
(15, 1, 1, 'Pilot', 24),
(15, 2, 1, 'Re-launch', 22),
(15, 3, 1, 'All In', 21),
(15, 4, 1, 'The Last Wedding', 21),
(15, 5, 1, 'Big Mama P', 20),
(15, 6, 1, 'House Hunt', 23),
(16, 1, 3, 'Underage Drinking: A National Concern', 22),
(16, 2, 3, 'Dennis and Dee Go on Welfare', 22),
(16, 3, 2, 'The Gang Gets Invincible', 22),
(16, 4, 13, 'The Nightman Cometh', 22),
(16, 5, 10, 'The D.E.N.N.I.S. System', 22),
(16, 6, 8, 'The Gang Gets a New Member', 22),
(16, 7, 8, 'The ANTI-Social Network', 22),
(16, 8, 5, 'The Gang Gets Analyzed', 22),
(16, 9, 5, 'Mac Day', 22),
(16, 10, 2, 'The Gang Group Dates', 22),
(16, 11, 5, 'Mac & Dennis Move to the Suburbs', 22),
(16, 12, 2, 'The Gang Goes to a Water Park', 22),
(17, 1, 1, 'The One Where Monica Gets A Roommate', 22),
(17, 1, 2, 'The One with the Sonogram at the End', 22),
(17, 1, 3, 'The One with the Thumb', 22),
(17, 2, 1, 'The One with Ross''s New Girlfriend', 22),
(17, 2, 2, 'The One with the Breast Milk', 22),
(17, 3, 5, 'The One with Frank Jr.', 22),
(17, 3, 8, 'The One with the Giant Poking Device', 22),
(17, 4, 1, 'The One with the Jellyfish', 22),
(17, 4, 23, 'The One with Ross'' Wedding: Part One', 22),
(17, 4, 24, 'The One with Ross'' Wedding: Part Two', 22),
(17, 5, 3, 'The One Hundreth', 22),
(17, 6, 8, 'The One with Ross'' Teeth', 22),
(17, 7, 1, 'The One with Monica''s Thunder', 22),
(17, 8, 10, 'The One with Monica''s Boots', 22),
(17, 9, 22, 'The One with the Donor', 22),
(17, 10, 3, 'The One with Ross'' Tan', 22),
(18, 1, 1, 'Pilot', 22),
(18, 2, 5, 'World''s Greatest Couple', 22),
(18, 3, 7, 'Dowisetrepla', 22),
(18, 4, 2, 'The Best Burger in New York', 22),
(18, 5, 8, 'The Playbook', 22),
(18, 5, 18, 'Say Cheese', 22),
(18, 6, 4, 'Subway Wars', 22),
(18, 7, 3, 'Ducky Tie', 22),
(18, 8, 2, 'The Pre-Nup', 22),
(18, 8, 8, 'Twelve Horny Women', 22),
(18, 9, 1, 'The Locket', 22),
(18, 9, 3, 'Last Time in New York', 22),
(19, 1, 2, 'Diversity Day', 22),
(19, 2, 4, 'The Fire', 22),
(19, 3, 1, 'Gay Witch Hunt', 22),
(19, 4, 12, 'The Deposition', 22),
(19, 5, 22, 'Dream Team', 22),
(19, 6, 8, 'Koi Pond', 22),
(19, 7, 19, 'Garage Sale', 22),
(19, 8, 12, 'Pool Party', 22),
(19, 9, 20, 'Paper Airplane', 22),
(20, 1, 1, 'I Wasn''t Ready', 52),
(20, 2, 4, 'A Whole Other Hole', 60),
(20, 3, 13, 'Trust No Bitch', 88),
(20, 4, 2, 'Power Suit', 59),
(21, 1, 1, 'Yesterday''s Jam', 24),
(21, 2, 1, 'The Work Outing', 24),
(21, 3, 1, 'From Hell', 24),
(21, 4, 1, 'Jen the Fredo', 24),
(21, 5, 1, 'The Internet is Coming', 50),
(23, 1, 1, 'Pilot', 43),
(23, 2, 1, 'Last Days of Summer', 43),
(23, 3, 1, 'I Knew You When', 43),
(23, 4, 1, 'East of Dillon', 43),
(23, 5, 1, 'Expectations', 43),
(24, 1, 1, 'Pilot', 90),
(24, 2, 5, 'Break Point', 43),
(24, 3, 1, 'The Arrangement', 47),
(24, 4, 4, 'Leveraged', 44),
(24, 5, 16, '25th Hour', 45),
(24, 6, 8, 'Borrowed Time', 42),
(25, 1, 1, 'Pilot', 55),
(25, 2, 1, 'Withdrawl', 50),
(25, 3, 1, 'On Gaurd', 43),
(25, 4, 1, 'Wanted', 42),
(25, 5, 1, 'At What Price', 43),
(25, 6, 1, 'Borrowed Time', 44),
(33, 1, 1, 'Tourist Trapped', 22),
(33, 2, 1, 'Scary-oke', 23),
(17, 1, 4, 'The One with George Stephanopoulos', 22),
(17, 1, 5, 'The One with the East German Laundry Det', 22),
(17, 1, 6, 'The One with the Butt', 22),
(17, 1, 7, 'The One with the Blackout', 22),
(17, 1, 8, 'The One Where Nana Dies Twice', 22),
(17, 1, 9, 'The One Where Underdog Gets Away', 22),
(17, 1, 10, 'The One with the Monkey', 22),
(17, 1, 11, 'The One with Mrs. Bing', 22),
(17, 1, 12, 'The One with the Dozen Lasagnas', 22),
(17, 1, 13, 'The One with the Boobies', 22),
(17, 1, 14, 'The One with Candy Hearts', 22),
(17, 1, 15, 'The One with the Stoned Guy', 22),
(17, 1, 16, 'The One with the Two Parts: Part 1', 22),
(17, 1, 17, 'The One with the Two Parts: Part 2', 22),
(17, 1, 18, 'The One with All the Poker', 22),
(17, 1, 19, 'The One Where the Monkey Gets Away', 22),
(17, 1, 20, 'The One with the Evil Orthodontist', 22),
(17, 1, 21, 'The One with the Fake Monica', 22),
(17, 1, 22, 'The One with the Ick Factor', 22),
(17, 1, 23, 'The One with the Birth', 22),
(17, 1, 24, 'The One Where Rachel Finds Out', 22);

-- --------------------------------------------------------

--
-- Table structure for table `friends_with`
--

CREATE TABLE IF NOT EXISTS `friends_with` (
  `user_id_one` int(11) DEFAULT NULL,
  `user_id_two` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_with`
--

INSERT INTO `friends_with` (`user_id_one`, `user_id_two`) VALUES
(58, 63),
(58, 63),
(58, 64),
(73, 58),
(73, 64),
(73, 63),
(58, 57);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year_released` year(4) DEFAULT NULL,
  `genre` enum('Action','Adventure','Comedy','Crime','Documentary','Fantasy','Horror','Romance','Sports','Family','Thriller') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `title`, `year_released`, `genre`) VALUES
(1, 'Finding Nemo', 2003, 'Family'),
(2, 'Remember the Titans', 2000, 'Sports'),
(3, 'The Shining', 1980, 'Horror'),
(4, 'Fried Green Tomatoes', 1991, 'Adventure'),
(5, 'Inception', 2010, 'Thriller'),
(6, 'Lego Movie', 2014, 'Family'),
(7, '12 Angry Men', 1957, 'Crime'),
(8, 'Shawshank Redeption', 1994, 'Action'),
(9, 'Pulp Fiction', 1994, 'Adventure'),
(10, 'That 70s show', 1998, 'Comedy'),
(11, 'Prison Break', 2005, 'Crime'),
(12, 'Parks and Recreation', 2009, 'Comedy'),
(13, 'Workaholics', 2001, 'Comedy'),
(14, 'Seven', 1995, 'Thriller'),
(15, 'New Girl', 2011, 'Comedy'),
(16, 'Its Always Sunny in Philadelphia', 2005, 'Comedy'),
(17, 'Friends', 1994, 'Comedy'),
(18, 'How I Met Your Mother', 2005, 'Comedy'),
(19, 'The Office', 2005, 'Comedy'),
(20, 'Orange is the New Black', 2013, 'Thriller'),
(21, 'The IT Crowd', 2006, 'Comedy'),
(22, 'Psycho', 1960, 'Horror'),
(23, 'Friday Night Lights', 2006, 'Sports'),
(24, 'Suits', 2011, 'Crime'),
(25, 'White Collar', 2009, 'Crime'),
(26, 'Forrest Gump', 1994, 'Adventure'),
(27, 'The Lord of the Rings: The Fellowship of the Ring', 2001, 'Adventure'),
(28, 'The Lord of the Rings: The Two Towers', 2002, 'Adventure'),
(29, 'The Lord of the Rings: The Return of the King', 2003, 'Adventure'),
(30, 'The Hobbit: An Unexpected Journey', 2012, 'Adventure'),
(31, 'The Hobbit: The Desolation of Smaug', 2013, 'Adventure'),
(32, 'The Hobbit: The Battle of the Five Armies', 2014, 'Adventure'),
(33, 'Gravity Falls', 2012, 'Comedy'),
(34, 'Saving Private Ryan', 1998, 'Thriller'),
(35, 'The Green Mile', 1995, 'Thriller'),
(36, 'Toy Story', 2010, 'Comedy'),
(37, 'Catch Me If You Can', 2002, 'Crime'),
(38, 'Rain Man', 1988, 'Thriller'),
(39, 'Oblivion', 2013, 'Adventure'),
(40, 'Tropic Thunder', 2008, 'Adventure'),
(41, 'Jack Reacher', 2012, 'Action'),
(42, 'Shindler''s List', 1993, 'Thriller'),
(43, 'Back to the Future', 1985, 'Adventure'),
(44, 'Raiders of the Lost Ark', 1981, 'Adventure'),
(45, 'Jurassic Park', 1993, 'Adventure'),
(46, 'Indiana Jones and the Last Crusade', 1989, 'Adventure'),
(47, 'Jaws', 1975, 'Thriller'),
(48, 'Minority Report', 2002, 'Adventure'),
(49, 'The Departed', 2006, 'Crime'),
(50, 'The Wolf of Wall Street', 2013, 'Crime'),
(51, 'Shutter Island', 2010, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `media_id` int(11) DEFAULT NULL,
  `movie_rating` varchar(5) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`media_id`, `movie_rating`, `duration`) VALUES
(1, 'G', 100),
(2, 'PG', 113),
(3, 'R', 146),
(4, 'PG-13', 130),
(5, 'PG-13', 148),
(6, 'PG', 100),
(7, 'NR', 96),
(8, 'R', 142),
(9, 'R', 154),
(14, 'R', 127),
(22, 'R', 109),
(26, 'PG-13', 142),
(27, 'PG-13', 228),
(28, 'PG-13', 235),
(29, 'PG-13', 201),
(30, 'PG-13', 182),
(31, 'PG-13', 187),
(32, 'PG-13', 164),
(34, 'PG', 169),
(35, 'PG', 189),
(36, 'PG', 81),
(37, 'R', 141),
(38, 'R', 133),
(39, 'PG-13', 124),
(40, 'R', 107),
(41, 'PG-13', 130),
(42, 'R', 195),
(43, 'PG', 116),
(44, 'PG', 115),
(45, 'PG-13', 127),
(46, 'PG-13', 127),
(47, 'PG', 124),
(48, 'PG-13', 145),
(49, 'R', 151),
(50, 'R', 180),
(51, 'R', 138);

-- --------------------------------------------------------

--
-- Table structure for table `shared_with`
--

CREATE TABLE IF NOT EXISTS `shared_with` (
  `sending_user_id` int(11) DEFAULT NULL,
  `receiving_user_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shared_with`
--

INSERT INTO `shared_with` (`sending_user_id`, `receiving_user_id`, `media_id`) VALUES
(64, 58, 10),
(63, 58, 32),
(58, 66, 17),
(58, 63, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_five_movies`
--
CREATE TABLE IF NOT EXISTS `top_five_movies` (
`media_id` int(11)
,`title` varchar(255)
,`year_released` year(4)
,`genre` enum('Action','Adventure','Comedy','Crime','Documentary','Fantasy','Horror','Romance','Sports','Family','Thriller')
,`avg_rating` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_five_shows`
--
CREATE TABLE IF NOT EXISTS `top_five_shows` (
`media_id` int(11)
,`title` varchar(255)
,`year_released` year(4)
,`genre` enum('Action','Adventure','Comedy','Crime','Documentary','Fantasy','Horror','Romance','Sports','Family','Thriller')
,`avg_rating` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `tv_show`
--

CREATE TABLE IF NOT EXISTS `tv_show` (
  `media_id` int(11) NOT NULL,
  `number_of_seasons` int(11) DEFAULT NULL,
  `tv_rating` enum('TV-Y','TV-Y7','TV-G','TV-PG','TV-14','TV-MA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`media_id`, `number_of_seasons`, `tv_rating`) VALUES
(10, 8, ''),
(11, 4, ''),
(12, 7, ''),
(13, 7, ''),
(15, 6, ''),
(16, 14, ''),
(17, 10, ''),
(18, 9, ''),
(19, 9, ''),
(20, 4, ''),
(21, 5, ''),
(23, 5, ''),
(24, 6, ''),
(25, 6, ''),
(33, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(57, 'asmith', '$2y$10$pAZtfHf1flV3xygxJILul.Cg0mQIjrkcFo8S0kyAcCctRrGGewkiu', 'Anne', 'Smith', 'asmith@gmail.com'),
(58, 'cmccarthy', '$2y$10$iumzgUmEfOtD1EjpQJemWeJgNzODANs2YQ6n5LrLoS9rSW.Tk2Dfe', 'Colleen', 'McCarthy', 'colleen.mccarthy135@gmail.com'),
(60, 'lrichardson', '$2y$10$oYkdtg/SCpxD.sPNnm7C.ecgkiLLOe5lDw6XgVfs55xgL4t5QE6bu', 'Luke', 'Richardson', 'lricha@gmail.com'),
(61, 'clarkyd', '$2y$10$NAttCEnvKGMazyCh5IzmdOsrUeWV/QFHJAwKCw9XM2f/yg/wmfAwC', 'Clarky', 'Marlakey', 'clarkyd@clarkyd.com'),
(63, 'jlint', '$2y$10$PC003/t5lNy/XrMeGo5gRe049r2BjD2VOCC0r9tFQGkxSFWcBrL3W', 'Jack', 'Lint', 'jrl2ek@virginia.edu'),
(64, 'ssq9tf', '$2y$10$QU6olYA3l5.LE2il/RcADunjCr64NvOxuA9QvWS3RSrliKfQxF1fq', 'Sudipta', 'Quabili', 'ssq9tf@virginia.edu'),
(65, 'cmccarthytest', '$2y$10$vBl2BbyPzH8Tt.20gSemDuRwBOcNE2/mAKmy9C8AkRmcczP5/0k9m', 'Sally', 'Smith', 'cmccarthy@gmail.com'),
(66, 'dat_boi', '$2y$10$YEcKUA6mj2v6SeOiuit3ce7Mfcqum/KHFMLEeNzJzXOoH9FsFiM.i', 'dat', 'Boi', 'pokespeedthrust@yahoo.com'),
(68, 'testperson', '$2y$10$MGa4q/mgqYdLVoPtkGqOfeK2Q/g73EwRvihUkUfgzLncJ7EoKjSbC', 'Sam', 'Ascot', 'test@gmail.com'),
(72, 'testnewaccount', '$2y$10$KyYewsV0ddGuXFTbmJfoAepN/amrReLjLHlIDNx3QWO3Qo9t5MJ4e', 'Bob', 'Stacks', 'testnew@gmail.com'),
(73, 'bjohnson', '$2y$10$AzuA00hk7lHXM5vyo6x48e1p/HxKZALtYTHqcHr4D3qdWtzF0OJEO', 'Ben', 'Johnson', 'bjohnson@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE IF NOT EXISTS `user_phone` (
  `user_id` int(11) DEFAULT NULL,
  `phone_number` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_phone`
--

INSERT INTO `user_phone` (`user_id`, `phone_number`) VALUES
(60, '9067238123'),
(61, '351435231412414'),
(63, '6147871913'),
(64, '3025622072'),
(66, '5555555555'),
(72, '7886453333'),
(73, '8907965555');

-- --------------------------------------------------------

--
-- Table structure for table `wants_to_watch`
--

CREATE TABLE IF NOT EXISTS `wants_to_watch` (
  `user_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wants_to_watch`
--

INSERT INTO `wants_to_watch` (`user_id`, `media_id`) VALUES
(58, 4),
(58, 33),
(58, 7),
(66, 16),
(66, 13),
(73, 44),
(73, 12),
(73, 15),
(63, 17);

-- --------------------------------------------------------

--
-- Table structure for table `watched`
--

CREATE TABLE IF NOT EXISTS `watched` (
  `user_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `star_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watched`
--

INSERT INTO `watched` (`user_id`, `media_id`, `date`, `star_rating`) VALUES
(58, 17, '0000-00-00 00:00:00', 5),
(58, 6, '0000-00-00 00:00:00', 5),
(58, 9, '0000-00-00 00:00:00', 2),
(58, 12, '0000-00-00 00:00:00', 5),
(58, 8, '0000-00-00 00:00:00', 4),
(66, 1, '0000-00-00 00:00:00', 4),
(58, 1, '0000-00-00 00:00:00', 5),
(58, 20, '0000-00-00 00:00:00', 4),
(58, 11, '0000-00-00 00:00:00', 5),
(58, 15, '0000-00-00 00:00:00', 5),
(64, 6, '0000-00-00 00:00:00', 5),
(63, 44, '0000-00-00 00:00:00', 4),
(63, 38, '0000-00-00 00:00:00', 2),
(63, 5, '0000-00-00 00:00:00', 4),
(63, 36, '0000-00-00 00:00:00', 3),
(63, 7, '0000-00-00 00:00:00', 5),
(63, 50, '0000-00-00 00:00:00', 5),
(63, 49, '0000-00-00 00:00:00', 4),
(63, 37, '0000-00-00 00:00:00', 3),
(63, 2, '0000-00-00 00:00:00', 5),
(66, 6, '0000-00-00 00:00:00', 5),
(66, 8, '0000-00-00 00:00:00', 3),
(66, 7, '0000-00-00 00:00:00', 3),
(66, 2, '0000-00-00 00:00:00', 2),
(66, 22, '0000-00-00 00:00:00', 2),
(66, 6, '0000-00-00 00:00:00', 5),
(66, 11, '0000-00-00 00:00:00', 3),
(66, 17, '0000-00-00 00:00:00', 5),
(66, 15, '0000-00-00 00:00:00', 1),
(66, 20, '0000-00-00 00:00:00', 3),
(66, 23, '0000-00-00 00:00:00', 1),
(73, 17, '0000-00-00 00:00:00', 5),
(58, 2, '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Structure for view `top_five_movies`
--
DROP TABLE IF EXISTS `top_five_movies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cs4750s17clm5uz`@`%` SQL SECURITY DEFINER VIEW `top_five_movies` AS select `media`.`media_id` AS `media_id`,`media`.`title` AS `title`,`media`.`year_released` AS `year_released`,`media`.`genre` AS `genre`,avg(`watched`.`star_rating`) AS `avg_rating` from ((`media` join `movie` on((`media`.`media_id` = `movie`.`media_id`))) join `watched` on((`media`.`media_id` = `watched`.`media_id`))) group by `media`.`media_id` order by avg(`watched`.`star_rating`) desc limit 5;

-- --------------------------------------------------------

--
-- Structure for view `top_five_shows`
--
DROP TABLE IF EXISTS `top_five_shows`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cs4750s17clm5uz`@`%` SQL SECURITY DEFINER VIEW `top_five_shows` AS select `media`.`media_id` AS `media_id`,`media`.`title` AS `title`,`media`.`year_released` AS `year_released`,`media`.`genre` AS `genre`,avg(`watched`.`star_rating`) AS `avg_rating` from ((`media` join `tv_show` on((`media`.`media_id` = `tv_show`.`media_id`))) join `watched` on((`media`.`media_id` = `watched`.`media_id`))) group by `media`.`media_id` order by avg(`watched`.`star_rating`) desc limit 5;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `acts_in`
--
ALTER TABLE `acts_in`
  ADD KEY `actor_id` (`actor_id`), ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `created_by`
--
ALTER TABLE `created_by`
  ADD KEY `media_id` (`media_id`), ADD KEY `studio_id` (`studio_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `directs`
--
ALTER TABLE `directs`
  ADD KEY `director_id` (`director_id`), ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `friends_with`
--
ALTER TABLE `friends_with`
  ADD KEY `user_id_one` (`user_id_one`), ADD KEY `user_id_two` (`user_id_two`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `shared_with`
--
ALTER TABLE `shared_with`
  ADD KEY `sending_user_id` (`sending_user_id`), ADD KEY `receiving_user_id` (`receiving_user_id`), ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `tv_show`
--
ALTER TABLE `tv_show`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wants_to_watch`
--
ALTER TABLE `wants_to_watch`
  ADD KEY `user_id` (`user_id`), ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `watched`
--
ALTER TABLE `watched`
  ADD KEY `user_id` (`user_id`), ADD KEY `media_id` (`media_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acts_in`
--
ALTER TABLE `acts_in`
ADD CONSTRAINT `acts_in_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
ADD CONSTRAINT `acts_in_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `created_by`
--
ALTER TABLE `created_by`
ADD CONSTRAINT `created_by_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`),
ADD CONSTRAINT `created_by_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`studio_id`);

--
-- Constraints for table `directs`
--
ALTER TABLE `directs`
ADD CONSTRAINT `directs_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `director` (`director_id`),
ADD CONSTRAINT `directs_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `friends_with`
--
ALTER TABLE `friends_with`
ADD CONSTRAINT `friends_with_ibfk_1` FOREIGN KEY (`user_id_one`) REFERENCES `user` (`user_id`),
ADD CONSTRAINT `friends_with_ibfk_2` FOREIGN KEY (`user_id_two`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `shared_with`
--
ALTER TABLE `shared_with`
ADD CONSTRAINT `shared_with_ibfk_1` FOREIGN KEY (`sending_user_id`) REFERENCES `user` (`user_id`),
ADD CONSTRAINT `shared_with_ibfk_2` FOREIGN KEY (`receiving_user_id`) REFERENCES `user` (`user_id`),
ADD CONSTRAINT `shared_with_ibfk_3` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `tv_show`
--
ALTER TABLE `tv_show`
ADD CONSTRAINT `tv_show_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
ADD CONSTRAINT `user_phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `wants_to_watch`
--
ALTER TABLE `wants_to_watch`
ADD CONSTRAINT `wants_to_watch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
ADD CONSTRAINT `wants_to_watch_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `watched`
--
ALTER TABLE `watched`
ADD CONSTRAINT `watched_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
ADD CONSTRAINT `watched_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
