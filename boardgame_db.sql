-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2013 at 09:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boardgame_db`
--
CREATE DATABASE IF NOT EXISTS `boardgame_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boardgame_db`;

-- --------------------------------------------------------

--
-- Table structure for table `boardgames`
--

CREATE TABLE IF NOT EXISTS `boardgames` (
  `bg_id` int(11) NOT NULL AUTO_INCREMENT,
  `bg_name` varchar(100) NOT NULL,
  `bg_image` varchar(100) NOT NULL,
  `bg_description` text NOT NULL,
  `bg_stars_no` int(11) NOT NULL DEFAULT '0',
  `bg_times_voted` int(11) NOT NULL DEFAULT '0',
  `bg_min_players` int(11) NOT NULL DEFAULT '0',
  `bg_max_players` int(11) NOT NULL DEFAULT '0',
  `bg_price` float NOT NULL DEFAULT '0',
  `bg_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bg_stock` int(11) NOT NULL,
  PRIMARY KEY (`bg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `boardgames`
--

INSERT INTO `boardgames` (`bg_id`, `bg_name`, `bg_image`, `bg_description`, `bg_stars_no`, `bg_times_voted`, `bg_min_players`, `bg_max_players`, `bg_price`, `bg_date_added`, `bg_stock`) VALUES
(1, 'Settlers of Catan', 'catan1.jpg', 'Players are recent immigrants to the newly populated island of Catan. Expand your colony through the building of settlements, roads, and villages by harvesting commodities from the land around you. Trade sheep, lumber ,bricks and some grain for a settlement, bricks and wood for a road, or try to complete other combinations for more advanced buildings, services and specials. Trade with other players, or at local seaports to get resources you might lack. The first player to achieve 10 points from a combination of roads, settlements, and special cards wins.', 0, 0, 3, 6, 42, '0000-00-00 00:00:00', 0),
(2, 'Carcassonne', 'carcassonne1.jpg', 'The game board is a medieval landscape built by the players as the game progresses. The game starts with a single terrain tile face up and 71 others shuffled face down for the players to draw from. On each turn a player draws a new terrain tile and places it adjacent to tiles that are already face up. The new tile must be placed in a way that extends features on the tiles it abuts: roads must connect to roads, fields to fields, and cities to cities.\r\n\r\n\r\nA part of a game board after several turns.\r\nAfter placing each new tile, the placing player may opt to station a piece (called a "follower") on a feature of that newly-placed tile. The placing player may not use a follower to claim any features of the tile that extend or connect features already claimed by another player. However, it is possible for terrain features claimed by opposing players to become "shared" by the subsequent placement of tiles connecting them. For example, two field tiles which each have a follower can become connected into a single field by another terrain tile.\r\nThe game ends when the last tile has been placed. At that time, all features (including fields) score points for the players with the most followers on them. The player with the most points wins the game.', 0, 0, 2, 6, 30, '0000-00-00 00:00:00', 0),
(3, 'Monopoly', '', 'Monopoly is an American-originated board game originally published by Parker Brothers. Subtitled "The Fast-Dealing Property Trading Game," the game is named after the economic concept of monopoly — the domination of a market by a single entity. It is currently produced by the United States game and toy company Hasbro. Players move around the game board buying or trading properties, developing their properties with houses and hotels, and collecting rent from their opponents, the ultimate goal being to drive them into bankruptcy.', 0, 0, 2, 6, 14, '2013-10-14 09:58:20', 0),
(4, 'Chess', '', 'Chess is a two-player strategy board game played on a chessboard, a checkered gameboard with 64 squares arranged in an eight-by-eight grid. It is one of the world''s most popular games, played by millions of people worldwide at home, in clubs, online, by correspondence, and in tournaments.\r\nEach player begins the game with 16 pieces: one king, one queen, two rooks, two knights, two bishops, and eight pawns. Each of the six piece types moves differently. Pieces are used to attack and capture the opponent''s pieces, with the objective to ''checkmate'' the opponent''s king by placing it under an inescapable threat of capture. In addition to checkmate, the game can be won by the voluntary resignation of the opponent, which typically occurs when too much material is lost, or if checkmate appears unavoidable. A game may also result in a draw in several ways, where neither player wins.', 0, 0, 2, 2, 18, '2013-10-14 10:00:04', 0),
(5, 'Domino', '', 'Dominoes (or dominos) generally refers to the collective gaming pieces making up a domino set (sometimes called a deck or pack) or to the subcategory of tile games played with domino pieces. In the area of mathematical tilings and polyominoes, the word domino often refers to any rectangle formed from joining two congruent squares edge to edge. The traditional Sino-European domino set consists of 28 dominoes, colloquially nicknamed bones, cards, tiles, tickets, stones, or spinners. Each domino is a rectangular tile with a line dividing its face into two square ends. Each end is marked with a number of spots (also called pips or nips) or is blank. The backs of the dominoes in a set are indistinguishable, either blank or having some common design. A domino set is a generic gaming device, similar to playing cards or dice, in that a variety of games can be played with a set.', 0, 0, 2, 4, 17, '2013-10-14 10:01:12', 0),
(6, 'Chomp Card Game', '', 'Plunge into a fast-paced undersea world where life is survival of the quickest. Identify the lowest creature in the food chain then slap it before other players scarf it down. Big fish chomp little fish and everyone chomps plankton. Watch out for the ink-squirting octopus and if you spot an electric eel, get ready for an all-out feeding frenzy! Collect all the cards and you''re ruler of the deep blue sea!\r\n\r\nChomp! is a great tool to help teach children about the food chain. Players learn about the hierarchy of ocean species through employing skills such as visual discrimination and sequencing. It also helps to sharpen reflexes and teaches quick thinking and analysis while playing a fast-moving game.', 0, 0, 2, 5, 15, '2013-10-14 10:02:36', 0),
(7, 'Killer Bunny', '', 'The objective of the game is to win, accomplished by acquiring carrot cards, one of which is revealed to be the winning "magic carrot" at the end of the game. Acquiring carrot cards is done primarily through the use of bunnies, which allow the use of an enormous variety of in-game actions. Thus, the game revolves around playing bunnies and eliminating opposing bunnies through various means (some comical and some violent, but the game art never shows blood or gore).\r\nEach player maintains a hand of five cards and a run cycle of two cards. In each turn, players normally turn the Top Run card face up to play it, then slide the Bottom Run card into the Top Run position, draw a replacement card, and place a card from their hand into the Bottom Run position, thus returning their hand size to five cards.\r\nCards may be one of different varieties: "Run" cards are the basic type of cards, while "Special" cards are those that may be either played normally, or may be saved for later use when put through the run cycle. "Very Special" cards are similar, except that the player may choose to play the card out of turn, immediately from their hand. There are also the "Play Immediately" cards, which are played whenever they are drawn. Finally, "Kaballa Dolla" cards represent the monetary currency in the game, which may be used to purchase various items at the start of the player''s turns.''', 0, 0, 2, 8, 0, '2013-10-14 10:06:22', 0),
(8, 'Poker', '', 'Poker is a family of card games involving betting and individual play, whereby the winner is determined by the ranks and combinations of their cards, some of which remain hidden until the end of the game. Poker games vary in the number of cards dealt, the number of shared or "community" cards and the number of cards that remain hidden. The betting procedures vary among different poker games in such ways as betting limits and splitting the pot between a high hand and a low hand.', 0, 0, 3, 7, 10, '2013-10-14 10:09:38', 0),
(9, 'Risk', '', 'Risk is a strategic board game, produced by Parker Brothers (now a division of Hasbro). It was invented by French film director Albert Lamorisse and originally released in 1957 as La Conquête du Monde ("The Conquest of the World") in France. Risk is a turn-based game for two to six players. The standard version is played on a board depicting a political map of the Earth, divided into forty-two territories, which are grouped into six continents. The primary object of the game is "world domination," or "to occupy every territory on the board and in so doing, eliminate all other players."[1] Players control armies with which they attempt to capture territories from other players, with results determined by dice rolls.', 0, 0, 2, 6, 11, '2013-10-14 10:12:10', 0),
(10, 'Rummikub', '', 'Rummikub''s main component is a pool of tiles, consisting of 104 number tiles and two or more joker tiles. The number tiles range in value from one to thirteen, in four colors ( black, yellow, blue and red, or other). Each combination of color and number is represented twice. Players each have a rack (container) to store tiles, without revealing the face of the tiles to the other players.\r\nRummikub may also be played using two decks of 52 playing cards, plus one joker per person. Cards have their face value, with ace counting for 1, jack for 11, queen for 12 and king for 13. It is advisable to use small cards, because space on the playing table is limited, and to deal the cards (rather than taking them from a pool) unless the backs of both decks have the same color and motif. Cards are less likely than tiles to read as upside down for any given player; however, large hands may prove slightly difficult to hold, especially for young ones.', 0, 0, 2, 4, 16, '2013-10-14 10:14:15', 0),
(11, 'Civilization', '', 'The Civilization board depicts areas around the Mediterranean Sea. The board is divided into many regions. Each player starts with a single population token and attempts to grow and expand his empire over successive turns, trying to build the greatest civilization.\r\nAs each nation grows, adding more and more population to the board, players can build cities in regions they control. Each city grants a trade card to the owner, which allows trade with other players for any of eleven commodities, such as iron, grain and bronze. Along with trade come eight calamities such as volcanoes, famine and civil war, which destroy population and cities. Trade cards are combined in sets to purchase civilization cards, which grant special abilities and give bonuses toward future civilization card purchases. The civilization cards grant access to abilities such as agriculture, coinage, philosophy and medicine.\r\nThe goal of Civilization is to be first to advance to the final age on the Archaeological Succession Table (AST).', 0, 0, 2, 7, 80, '2013-10-14 10:16:19', 0),
(12, 'Candy Land', '', 'Candy Land (also Candyland) is a simple racing board game. The game requires no reading and minimal counting skills, making it suitable for young children.\r\nDue to the design of the game, there is no strategy involved—players are never required to make choices, just follow directions. The winner is predetermined by the shuffle of the cards.', 0, 0, 2, 4, 12, '2013-10-14 10:18:23', 0),
(13, 'Clue', '', 'The object of the game is for players to strategically move around the game board (representing the rooms of a mansion), in the guise of one of the game''s six characters, collecting clues from which to deduce which suspect murdered the game''s perpetual victim, Dr. Black (Mr. Boddy in North American versions), and with which weapon and in what room.\r\nNumerous games, books, and a film have been released as part of the Cluedo franchise. Several spinoffs games have been released featuring various extra characters, weapons and rooms, or different game play. The original and traditional format of the game is marketed as the "Classic Detective Game", while the various spinoffs are all distinguished by different slogans.', 0, 0, 3, 6, 14.5, '2013-10-14 10:22:36', 0),
(14, 'Spy Alley', '', 'Spy Alley is a board game wherein each player secretly works for the spy agency of one of six countries. The players take turns moving around the board in an attempt to first gather the password, disguise, code book, and key corresponding to their country, and then reach their embassy, winning the game. But the player must beware, for any of one''s opponents may deduce and expose one''s nationality at any time, thus eliminating one from the game.', 0, 0, 2, 6, 6.5, '2013-10-14 10:25:20', 0),
(15, 'Lost Cities', '', 'Lost Cities is a fast-moving game, with players playing or discarding, and then replacing, a single card each turn. Cards represent progress on one of the five color-coded expeditions. Players must decide, during the course of the game, how many of these expeditions to actually embark upon. Card play rules are quite straightforward, but because players can only move forward on an expedition (by playing cards which are higher-numbered than those already played), making the right choice in a given game situation can be quite difficult. An expedition that has been started will earn points according to how much progress has been made when the game ends, and after three rounds, the player with the highest total score wins the game. Each expedition that is started but not thoroughly charted incurs a negative point penalty (investment costs).\r\nInteraction between players is indirect, in that one cannot directly impact another player''s expeditions. However, since players can draw from the common discard piles, they are free to make use of opposing discards. Additionally, since the available cards for a given expedition are finite, progress made by an opponent in a given color can lead to difficulty making progress in that same color.\r\nThe game''s board, while designed to supplement the theme, is optional and consists only of simple marked areas where players place discards. If Lost Cities had four expeditions instead of five, it could be played with a standard deck of playing cards. When doing so, the face cards would represent investment cards, with numbered cards two through ten serving as the expedition progress cards.', 0, 0, 2, 2, 17.6, '2013-10-14 10:26:38', 0),
(16, 'Camelot', '', 'Camelot is a strategy board game for two players. One of the first games published by Parker Brothers, it was invented late in the 19th century by George S. Parker and originally published under the name Chivalry.\r\nThe game (reduced in size and number of pieces, and reissued as "Camelot" in 1930) flourished through dozens of editions and numerous variants, achieving its greatest popularity in the 1930s, but remained in print through the late 1960s. In the 1980s, Parker Brothers briefly republished the game under the name Inside Moves. Since then the game has been out of print, but retains a core of fans who look forward to another revival.\r\nCamelot is easily learned and without extensive praxis or theory, thus perhaps more accessible for novices to play and enjoy compared to either chess or checkers. The game is exceptionally tactical almost from the first move, and therefore quick to play to a conclusion.', 0, 0, 2, 2, 25, '2013-10-14 10:27:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `boardgames_categories`
--

CREATE TABLE IF NOT EXISTS `boardgames_categories` (
  `bg_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boardgames_categories`
--

INSERT INTO `boardgames_categories` (`bg_id`, `cat_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(6, 2),
(6, 4),
(7, 4),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(10, 3),
(11, 1),
(12, 4),
(13, 1),
(14, 1),
(15, 2),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Strategy Games', 'Put your strategies to the test with this exciting collection of board games. '),
(2, 'Card Games', 'This collection of popular card games will let you jump right into your favorite games at your next '),
(3, 'Classic Games', 'Classic games the whole family can enjoy!'),
(4, 'Children''s Games', 'Fun, Educational games your kids will love!');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `meet_id` int(11) NOT NULL AUTO_INCREMENT,
  `meet_user_id` int(11) NOT NULL,
  `meet_bg_id` int(11) NOT NULL,
  `meet_location` varchar(100) NOT NULL,
  `meet_date` int(11) NOT NULL DEFAULT '0',
  `meet_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meet_details` varchar(100) NOT NULL,
  PRIMARY KEY (`meet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_user_id` int(11) NOT NULL,
  `review_bg_id` int(11) NOT NULL,
  `review_content` text NOT NULL,
  `review_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_user_id`, `review_bg_id`, `review_content`, `review_date_added`) VALUES
(1, 1, 2, 'first!', '2013-10-16 12:52:58'),
(2, 2, 2, 'second!', '2013-10-16 12:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE IF NOT EXISTS `shopping_carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_user_id` int(11) NOT NULL DEFAULT '0',
  `cart_bg_id` int(11) NOT NULL DEFAULT '0',
  `cart_quantity` int(11) NOT NULL DEFAULT '1',
  `cart_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_is_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_name`, `user_email`, `user_is_admin`) VALUES
(1, 'a1', 'a', 'Andreea', 'and@email.eu', 0),
(2, 'a2', 'a', 'Ana', 'ana@email.eu', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
