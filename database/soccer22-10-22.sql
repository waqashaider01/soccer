-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2022 at 06:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partA` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partB` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partC` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `partA`, `partB`, `partC`, `created_at`, `updated_at`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<p><strong>&#39;&#39;Our goal, therefore, is to provide that opportunity by serving as a global link between Players, Scouts,</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Intermediaries, Coaches, Academies and Clubs.&#39;&#39;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p class=\"About__para pt-5\">Soccer World Link is a platform that enables players, agents, coaches, academies, and clubs and other  soccer professionals to connect and manage their recruitment process more efficiently.</p>\r\n                        <p class=\"About__para\">We are committed to providing a pathway to success in the game at youth, men and women levels.\r\n                            Many talented players have gone unnoticed due to a lack of opportunity to connect to the right people who\r\n                            might have\r\n                            helped further their careers.\r\n                        </p>\r\n                        <p class=\"About__para\">\r\n                            Our goal, therefore, is to provide that opportunity by serving as a global link between Players, Scouts,\r\n                            Intermediaries, Coaches, Academies and Clubs.\r\n                        </p>', '<p class=\"text-center mb-0\"> <strong class=\"fs-4\">Our Mission</strong></p>\r\n\r\n                        <p class=\"About__para\">To provide a simple, transparent, and effective service focused on connecting soccer players, agents, and\r\n                            other\r\n                            professionals worldwide.</p>\r\n                        <p class=\"text-center mb-0\"> <strong class=\"fs-4\">Our Vision</strong></p>\r\n                        <p class=\"About__para\">To be at the forefront of soccer recruitment globally.</p>\r\n                       <p class=\"text-center mb-0\"><strong class=\"fs-4\">Our values</strong></p>\r\n                        <section class=\"About__list_items\">\r\n                            <li>Passion</li>\r\n                            <li>Integrity</li>\r\n                            <li>Innovation</li>\r\n                            <li>Excellence</li>\r\n                        </section>', '2022-10-05 16:25:43', '2022-10-06 12:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `academy_infos`
--

CREATE TABLE `academy_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academy_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_at_academy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academy_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation_worldwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academy_infos`
--

INSERT INTO `academy_infos` (`id`, `academy_id`, `nationality`, `licensed`, `about_me`, `academy_name`, `position_at_academy`, `academy_nationality`, `countries_of_operation`, `countries_of_operation_worldwide`, `profile_link`, `profile_type`, `telephone`, `email`, `social_media_link_1`, `social_media_link_2`, `social_media_link_3`, `website`, `birth_city`, `state`, `birth_country`, `cover_img`, `profile_img`, `created_at`, `updated_at`, `reads`) VALUES
(1, 16, 'China', 'Yes', 'something from piketyno@mailinator.com', 'NewAcademy', 'representative', 'Ireland', '[\"United States\"]', '1', 'something.com', 'followers-only', '03060125464', 'asdsad@gmail.com', 'insta.com', 'fb.com', 'twitter.com', 'kmbo.me', 6, 'Pakistan', 1, NULL, NULL, '2022-06-18 17:54:10', '2022-10-01 12:22:17', 17);

-- --------------------------------------------------------

--
-- Table structure for table `agent_achievements`
--

CREATE TABLE `agent_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `achievements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_achievements`
--

INSERT INTO `agent_achievements` (`id`, `agent_id`, `achievements`, `month`, `year`, `details`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 4, '13', 'June', '1999', 'something something', '1', NULL, '2022-07-17 14:45:59'),
(2, 10, '21', 'June', '1999', 'something new', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocked_users`
--

CREATE TABLE `blocked_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `image`, `title`, `description`, `status`, `reads`, `created_at`, `updated_at`) VALUES
(1, 1, 'blog1.jpg', 'A Scout\'s Mindset What Players should Know', '<p>A Scout&#39;s Mindset: What Players Should Know</p>\r\n\r\n<p>In carrying out his primary role of discovering, assessing, and recruiting talents, a Soccer Scout has specific criteria spelled out for evaluating players.&nbsp; A scout is looking for both the strong and weak points of a player to decide to either recruit that player or not.</p>\r\n\r\n<p>There are specific attributes a Scout is looking for in a player, and when he finds them, it would be difficult not to show interest in that player.&nbsp;</p>\r\n\r\n<p>Scouts would generally evaluate players in certain aspects of the game with the player&#39;s playing position in mind. Some vital aspects Scouts have their eyes on are analyzed here.&nbsp;</p>\r\n\r\n<p>A player&#39;s physique would make a first impression. Players should be in shape and have an athletic physique.</p>\r\n\r\n<p>Besides physique, other vital aspects are strength, stamina, speed, reaction time, coordination and overall fitness level.</p>\r\n\r\n<p>Then comes technique, which has to do with skills like body movement, which can be done whether a player has the ball or not.</p>\r\n\r\n<p>A Player must have useful techniques to excel. There are several sides to techniques such as ball control either on the ground or in the air. A player must also be good at controlling the ball while he is running with it. This is important as it becomes more difficult to control the ball while running, but the ability to control the ball and keep the position while running with it is a quality that scouts are not likely to ignore.</p>\r\n\r\n<p>A soccer player who can read the game and make the right decisions in split seconds is an asset to any team, and soccer scouts are likely to be keener on having those in their kitty.&nbsp; A good sense of anticipation and ability to predict an opponent&#39;s next move and react accordingly is vital in a player&#39;s arsenal.</p>\r\n\r\n<p>Also, Scouts will be more likely to go for players who possess certain leadership qualities as they positively influence the rest of the team.</p>\r\n\r\n<p>A Player&#39;s passion for the game speaks volumes in a Scout&#39;s decision-making process. A player who shows a genuine love for the game and therefore pursuing a career out in it will likely go farther than only in it for the money.</p>\r\n\r\n<p>&nbsp;The game&#39;s psychological aspect is key to a player&#39;s makeup and something that a scout is looking for. Players have to be mentally healthy to go through their careers as the game comes with much pressure.&nbsp; There will be some winning and losing times, and players need to deal with the most trying times professionally. A player&#39;s reaction to unpalatable situations and his temperament could determine how far he will go in his career.</p>\r\n\r\n<p>A player&#39;s attitude both on and off the field can either make or mar his career. Even in the dressing room and on training grounds, it is essential to keep a cool head and learn as learning is a lifetime process. A player must be willing to take instructions from the coaching crew and relate well with the entire team.</p>\r\n\r\n<p>The bottom line is that players&#39; ability and attitude are vital qualities that Scouts are looking for.</p>\r\n\r\n<p>Written By: Soccerworldlink Media</p>', 'accepted', 4, '2022-08-07 00:51:57', '2022-10-07 16:57:35'),
(2, 1, 'blog2.jpg', 'My First Blog', '<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\">Why do we use it?</div>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable&nbsp;</p>', 'accepted', 80, '2022-08-07 00:53:01', '2022-10-15 06:57:43'),
(3, 1, 'blog3.jpg', 'Applauding the introduction of Video Assistant Referee (VAR)', '<p><strong>Applauding the introduction of Video Assistant Referee (VAR)</strong></p>\r\n\r\n<p>Before the introduction of the Video Assistant Referee (VAR) to the game of soccer, there was rarely a fan anywhere in the world who did not have a painful recollection of a game ruined by questionable officiating by the match referees.</p>\r\n\r\n<p>Only those viewing matches on television at the time had access to slow-motion replays while the game was in progress.</p>\r\n\r\n<p>The referees, on the other hand, did not.</p>\r\n\r\n<p>Those replays served as an unpleasant reminder of the crucial errors in judgment made by the referees.</p>\r\n\r\n<p>In fairness to the referees, their work was more difficult back then because they didn&#39;t have access to a replay of the action.</p>\r\n\r\n<p>They were forced to make split-second decisions, some of which were erroneous.</p>\r\n\r\n<p>Referees are merely human, and they could make mistakes just like everyone else.</p>\r\n\r\n<p>Nowadays, with several cameras recording the games, showing every available perspective in high-definition video format, officials&#39; decisions are in the spotlight.</p>\r\n\r\n<p>Among the game&#39;s top officials, some believe that such blunders contribute to the game&#39;s drama.</p>\r\n\r\n<p>However, that type of drama is not for everyone.</p>\r\n\r\n<p>Using a Video Assistant Referee (VAR) to make crucial decisions such as goals, penalties, and red cards, which might influence the outcome of a game on any given day, is a positive step forward in the spirit of fairness.</p>\r\n\r\n<p>As a result, it is reasonable to anticipate referees to feel relieved and grateful for the use of technology to make more precise decisions on the field.</p>\r\n\r\n<p>It&#39;s worth noting that this massive stride was preceded by goal-line technology, which eliminates any uncertainties about when the ball crosses the goal line.</p>\r\n\r\n<p>It is anticipated that soccer&#39;s technological advancements will continue so that all fans can keep enjoying the beautiful game.</p>\r\n\r\n<p>&ndash; Soccerworldlink Media</p>', 'accepted', 12, '2022-08-07 00:54:13', '2022-08-13 18:26:45'),
(4, 1, 'blog2.jpg', 'Attributes of an Intermediary', '<p>Attributes of an Intermediary</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Have you ever contemplated working as a soccer intermediary and wondered if it was the correct career choice for you?</p>\r\n\r\n<p>To be successful in the profession, you must exhibit specific characteristics.</p>\r\n\r\n<p>Before doing business with an intermediary, players and other game professionals would like to observe these attributes in them.</p>\r\n\r\n<p>The attributes that are essential include, but are not limited to:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Integrity/Trust</p>\r\n\r\n<p>To make players and other professionals feel comfortable with an intermediary, they must maintain a high level of personal integrity and trust.</p>\r\n\r\n<p>Suffice to say that no one wants to conduct business with or be represented by intermediaries with a dubious reputation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Knowledge of the game</p>\r\n\r\n<p>&nbsp;Intermediaries are expected to have an in-depth knowledge of the game of soccer.&nbsp;</p>\r\n\r\n<p>This is their job, and the more they know about it, the more authority they have.&nbsp;</p>\r\n\r\n<p>A thorough understanding of the game will guarantee that they are not pushed around and not left in the dark when making decisions based on what they know.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>They must study and keep their knowledge of the game&#39;s regulations up to date as they change from time to time.</p>\r\n\r\n<p>They must stay updated on industry news and vital statistics regarding different players, clubs, leagues and associations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Establishing Contacts in the industry</p>\r\n\r\n<p>Intermediaries who can make contacts or connections in the industry will surely be successful in the long run.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The job of an intermediary might be frustrating if you don&#39;t have the right relationships. Maintaining contact with clubs, coaches, academy officials, other intermediaries, and players is critical.&nbsp;</p>\r\n\r\n<p>The more people you know, the more clubs you can recommend a player to.</p>\r\n\r\n<p>Meet people both in-person and online.</p>\r\n\r\n<p>Use social media platforms to interact with other professionals and stay in touch with your clients and partners.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Go out and watch games live, and be ready to meet new people since you never know where or when the next big deal will come from.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Contract Negotiation prowess</p>\r\n\r\n<p>Every player or client would like an Intermediary who will work in their best interests, which, quite frankly, means securing some of the best contracts available.&nbsp;</p>\r\n\r\n<p>The ability of an Intermediary to negotiate contracts becomes extremely important at this point.</p>\r\n\r\n<p>&nbsp;The objective is to present your players&#39; demands in a calm but precise manner that even those on the other side of the table will have no choice but to accept your terms.</p>\r\n\r\n<p>Clients will flock to you if they know you can provide them with a competitive wage and other benefits.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Knowledge of Business Investments</p>\r\n\r\n<p>You&#39;ll stay on top of the game if you know what to help players invest in.</p>\r\n\r\n<p>Players make a lot of money and retire at a young age, with no pensions or other benefits.</p>\r\n\r\n<p>The money they earn during their playing career must be carefully channeled and invested.</p>\r\n\r\n<p>They rely on you to assist them in making such judgments, and you must be well-versed in the subject to make informed decisions on their behalf.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Accessibility</p>\r\n\r\n<p>An intermediary must be easily reachable.</p>\r\n\r\n<p>Keep your lines of contact open because you never know where the next big break will come from.</p>\r\n\r\n<p>Clients and partners may need to contact you at any time, so keep your phones, emails, and other social media communication channels open.</p>\r\n\r\n<p>If they call multiple times and are unable to contact you, they will seek assistance elsewhere.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Focusing on young talents</p>\r\n\r\n<p>It&#39;s essential to keep your attention on the younger generation because they are the game&#39;s future.</p>\r\n\r\n<p>Focus on finding young players who are yet to be noticed by anybody else.&nbsp;</p>\r\n\r\n<p>If you find a good one, the reward will far exceed your expectations.</p>\r\n\r\n<p>You&#39;ll have an easier job keeping these young players if you&#39;re the one who discovers them.</p>\r\n\r\n<p>Watch several youth tournaments, tell people what you do, and chances are they will let you know if they notice a promising player.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; Soccerworldlink Media</p>', 'accepted', 4, '2022-08-07 04:02:25', '2022-10-06 17:26:30'),
(5, 1, 'blog1.jpg', 'Becoming a Better Soccer Player', '<p>Becoming a Better Soccer Player</p>\r\n\r\n<p>The greatest players of all time and today&#39;s top players have one thing in common: they put in a lot of effort to get that far.</p>\r\n\r\n<p>It&#39;s great to have natural talent, but talent without hard work will not go very far in soccer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To succeed, you must have a well-thought-out plan. The general training and game routine that every other player participates in is a good thing. However, to be distinguished from the crowd, a player must put in extra effort on the side.</p>\r\n\r\n<p>Those efforts could take the form of practicing a certain skill or mastering a solo act.</p>\r\n\r\n<p>The idea is to try to improve every day.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>There must be some players whose style of play you admire.</p>\r\n\r\n<p>Get their game tapes or watch their games on the internet.</p>\r\n\r\n<p>Try working on that skill or style of play that you appreciate in them, and you will soon find yourself performing it as well as or better than them.&nbsp;</p>\r\n\r\n<p>It&#39;s important to remember that practice makes perfect.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Do not merely watch a game for the sake of watching it.</p>\r\n\r\n<p>Learn to critically examine games because this is your career, and you must take it seriously.</p>\r\n\r\n<p>Develop your vision so that you can comprehend the technical components of any game you watch.</p>\r\n\r\n<p>Even if the players are not in your position, pay attention to how they position themselves because this will give you a better idea of what to expect when you play against players in those positions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Keep an eye on the players&#39; actions, both with and without the ball.</p>\r\n\r\n<p>Take note of the formation or pattern of play, each player&#39;s passes, how they switch positions and create space for themselves.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Try to observe every detail that your eyes can see.</p>\r\n\r\n<p>Seek out more information about the game by watching videos and reading about various aspects; after all, no knowledge is wasted. You never could tell when it will come in handy.</p>\r\n\r\n<p>Attend live matches to get a sense of the actual match circumstances and situations.</p>\r\n\r\n<p>Match tickets are not cheap, but they are a worthy investment because nothing good comes easy.</p>\r\n\r\n<p>Put in your time, effort, and even financial resources, and you&#39;ll be glad you did when your efforts begin to yield results.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Stay in touch with other players and ask them questions to help you succeed in the game.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>They might be happy to share their knowledge with you, and you never know where that seemingly minor revelation could lead you.</p>\r\n\r\n<p>A good attitude on and off the field is critical to a player&#39;s success.</p>\r\n\r\n<p>As players come and go, a soccer club can do without any player, yet clubs are ubiquitous. It is common knowledge that no individual is more significant than a soccer team nor the game itself.</p>\r\n\r\n<p>As a result, players must adhere to the club&#39;s administrative structure and policies. They must respect both officials and teammates.</p>\r\n\r\n<p>These attributes should be an inherent part of every player as they can help with a successful career.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; Soccerworldlink Media</p>', 'accepted', 0, '2022-08-07 04:03:01', '2022-08-07 04:03:01'),
(6, 1, 'blog3.jpg', 'Becoming an Intermediary', '<p>Becoming an Intermediary</p>\r\n\r\n<p>When most people think of a soccer intermediary, they picture a man dressed in a suit and tie who connects players with clubs in exchange for a significant sum of money.</p>\r\n\r\n<p>Some individuals consider an intermediary&#39;s lifestyle stylish, consisting primarily of numerous vacations, money, and parties.</p>\r\n\r\n<p>This notion explains why some people are interested in pursuing a career in the profession.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>However, a closer examination of the profession finds one that is fraught with stress, hard work, and perseverance.</p>\r\n\r\n<p>The responsibilities that an intermediary bears are often not apparent from afar and hence are not usually acknowledged.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>An Intermediary is defined by the Federation For International Football Associations (FIFA), which is the sport&rsquo;s governing body defines an Intermediary as any natural or legal persons who, for a fee or free of charge, represent players and/or clubs in negotiations towards concluding an employment contract or transfer agreement.</p>\r\n\r\n<p>Under FIFA&#39;s regulations, every soccer player or club has the right to use an Intermediary (previously known as Agents) in a contract between a player and a club and between two clubs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In contrast to the old rule, almost anyone can now become an Intermediary if they meet the requirements.</p>\r\n\r\n<p>The major requirement, as stipulated by FIFA, is that they register with their country&#39;s soccer association.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Persons interested in becoming intermediaries now simply need to contact the Soccer Association of the country in which they live, and they will be given instructions on what documentation to submit and the fees to pay.</p>\r\n\r\n<p>A resume, business reference letters, government-issued identity, a police report showing no criminal records, signed and dated copies of the Intermediary&#39;s code of conduct, and the FIFA Intermediary declaration are typically the requested documents.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Although the requirements may differ slightly from one Association to another, the process has become significantly easier than it was only a few years ago.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; Soccerworldlink Media</p>', 'accepted', 0, '2022-08-07 04:05:37', '2022-08-07 04:05:37'),
(7, 1, 'blog2.jpg', 'Showcasing Yourself As A Player', '<p>Showcasing Yourself As A Player</p>\r\n\r\n<p>Not every soccer player, especially at the outset of their careers, is sought after by clubs.</p>\r\n\r\n<p>Many players need to promote themselves to stand out and be noticed.&nbsp;</p>\r\n\r\n<p>These days, there are a lot of good players, and everyone is vying for the attention of a coach, scout or intermediary.</p>\r\n\r\n<p>As a result, players should not throw their hands up in the air and hope for a call from these soccer agents.</p>\r\n\r\n<p>Players who are looking to excel do not wait to be contacted by coaches, intermediaries or scouts. They will have to showcase themselves until the agents notice them.</p>\r\n\r\n<p>Having an online presence is an excellent way to promote yourself as a player.</p>\r\n\r\n<p>Register and create a profile on our website to get the most out of it.</p>\r\n\r\n<p>Upload videos and photos of yourself in action or earning an award for others to see.</p>\r\n\r\n<p>Don&#39;t hide in the shadows; at the very least, make yourself noticeable.</p>\r\n\r\n<p>A club official, scout, or intermediary may contact you after viewing your profile on our website. You might be just what they are looking for.</p>\r\n\r\n<p>Use social media to create connections both within and outside of your locality.&nbsp;</p>\r\n\r\n<p>&nbsp;Send emails to agents inviting them to come watch you play.&nbsp;</p>\r\n\r\n<p>That way, your name will begin to register in their thoughts, and don&#39;t be surprised if they decide to watch your game at some point. If you impress them, this might lead to a big break for you.</p>\r\n\r\n<p>Attend trials and training camps whenever possible.</p>\r\n\r\n<p>Every opportunity to promote yourself should be taken advantage of as your moment to break into the spotlight could be right around the corner.</p>\r\n\r\n<p>&ndash; Soccerworldlink Media</p>', 'accepted', 0, '2022-08-07 04:05:56', '2022-08-07 04:05:56'),
(8, 1, 'blog1.jpg', 'The FIFA Men\'s World Cup', '<p><strong>The FIFA Men&#39;s World Cup</strong></p>\r\n\r\n<p><strong>One of the world&#39;s most significant sporting events takes place every four years, and it is the FIFA&nbsp; Men&#39;s world cup. It is a fantastic fiesta that many people worldwide want to be a part of. </strong></p>\r\n\r\n<p><strong>Some of these people might not be outright soccer fans, but they get involved because they do not want to be left out of the excitement it brings </strong></p>\r\n\r\n<p><strong>It is common to see fans adorning the jerseys of the countries they support throughout the month-long event. Coffee shops, sports bars, banks, and other corporate organizations stream live matches at their reception areas. Big screens are set up in streets and other viewing centers. </strong></p>\r\n\r\n<p><strong>Fans, irrespective of their nationalities, gather together, watching and analyzing the event. </strong></p>\r\n\r\n<p><strong>At the last world cup - Russia 2018, at least 3.5 billion people, which represents half the world&#39;s population, watched the games,&nbsp; according to statistics from FIFA - the world&#39;s governing body for the sport. </strong></p>\r\n\r\n<p><strong>The next edition takes place in Qatar in 2022, with 32&nbsp; countries competing for the coveted trophy. It will be the first edition ever hosted in the middle east. </strong></p>\r\n\r\n<p><strong>As usual, fans would be looking forward to another great event with great goals, upsets, individual brilliance, and new players&#39; revelations.</strong></p>\r\n\r\n<p><strong>For players, the world cup presents a huge opportunity to showcase themselves. Players who have done exceptionally well at previous world cup tournaments have gone on to sign big money contracts with big clubs. Besides the money, the honor that comes with playing at that stage lives with the players forever. </strong></p>\r\n\r\n<p><strong>As the world looks forward to the 2022 world cup, it is hoped that there will be more viewers than the previous editions and that the awareness of the game spreads even further than it already has.&nbsp; </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Written By: Soccerworldlink Media</strong></p>', 'accepted', 0, '2022-08-07 04:06:19', '2022-08-07 04:06:19'),
(11, 1, 'blog1.jpg', 'Women\'s Soccer Appreciation and Development', '<p>Women&#39;s Soccer Appreciation and Development</p>\r\n\r\n<p>Women&#39;s soccer has existed for quite some time.</p>\r\n\r\n<p>Over the years, we have seen several female players leave their imprint on the game.</p>\r\n\r\n<p>Just like the men, there is a world cup in different age groups for the women.</p>\r\n\r\n<p>Many countries currently have a women&#39;s soccer league, with games played weekly.</p>\r\n\r\n<p>So, despite these accomplishments, why does it appear that the women&#39;s game is still not getting the attention it deserves?</p>\r\n\r\n<p>There&#39;s no denying that there is a poor perception about female soccer out there.&nbsp;</p>\r\n\r\n<p>Some people say that the quality of the women&#39;s game is inferior to that of the men&#39;s.</p>\r\n\r\n<p>They claim that women&#39;s abilities, both physically and technically, are inadequate.</p>\r\n\r\n<p>Despite the enormous success achieved by individual female players and the entire women&#39;s game, many people still hold this negative opinion.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We don&#39;t have to look far to find evidence to support this theory.</p>\r\n\r\n<p>The fact that women are still paid significantly less than their male counterparts and the underwhelming coverage that the women&#39;s game receives worldwide attest to it all.</p>\r\n\r\n<p>Negative stereotypes and a lack of support can significantly affect anyone, especially when putting their best effort forward, and the women&#39;s game is no exception.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is indeed about time to promote women&#39;s soccer.</p>\r\n\r\n<p>It is here to stay, and the standard and quality have massively improved.</p>\r\n\r\n<p>We must fully support them, just as we do the men.</p>\r\n\r\n<p>More fan enthusiasm, business and governmental sector participation will undoubtedly propel the game to new heights. That will be a step in the right direction.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&ndash; Soccerworldlink Media</p>', 'accepted', 2, '2022-08-07 04:07:47', '2022-08-13 18:53:15'),
(12, 3, 'blog3.jpg', 'Lorem Ipsum', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishin</p>', 'accepted', 10, '2022-08-13 18:08:35', '2022-08-13 18:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Islamabad', 1, '2022-03-20 23:03:55', '2022-03-20 23:03:55'),
(2, 'Rawalpindi', 1, '2022-03-20 23:04:08', '2022-03-20 23:04:08'),
(3, 'Khanewal', 1, '2022-03-20 23:04:13', '2022-03-20 23:04:13'),
(4, 'Delhi', 2, '2022-03-20 23:04:19', '2022-03-20 23:04:19'),
(5, 'Los Angles', 4, '2022-03-20 23:04:31', '2022-03-20 23:04:31'),
(6, 'Downton', 3, '2022-03-20 23:04:44', '2022-03-20 23:04:44'),
(7, 'Tokyo', 2, '2022-03-20 23:05:02', '2022-03-20 23:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `club_infos`
--

CREATE TABLE `club_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_at_club` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation_worldwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_infos`
--

INSERT INTO `club_infos` (`id`, `club_id`, `nationality`, `licensed`, `about_me`, `club_name`, `position_at_club`, `club_nationality`, `countries_of_operation`, `countries_of_operation_worldwide`, `profile_link`, `profile_type`, `telephone`, `email`, `social_media_link_1`, `social_media_link_2`, `social_media_link_3`, `website`, `birth_city`, `state`, `birth_country`, `cover_img`, `profile_img`, `created_at`, `updated_at`, `reads`) VALUES
(1, 12, 'China', 'Yes', 'something for bio', 'New Club', 'representative', 'HongKong', '[\"Germany\"]', '1', 'something.com', 'followers-only', '03060125464', 'something@gmail.com', 'insta.com', 'fb.com', 'twitter.com', 'kmbo.me', 1, 'Pakistan', 1, 'backend/images/agent/cover/1655511558.jpg', 'backend/images/agent/profile/1655511550.jpg', '2022-06-18 06:32:17', '2022-10-01 14:48:42', 44);

-- --------------------------------------------------------

--
-- Table structure for table `coach_infos`
--

CREATE TABLE `coach_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_at_organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coach_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation_worldwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coach_infos`
--

INSERT INTO `coach_infos` (`id`, `coach_id`, `nationality`, `licensed`, `current_team`, `about_me`, `organization_name`, `position_at_organization`, `coach_nationality`, `countries_of_operation`, `countries_of_operation_worldwide`, `profile_link`, `profile_type`, `telephone`, `email`, `social_media_link_1`, `social_media_link_2`, `social_media_link_3`, `website`, `birth_city`, `state`, `birth_country`, `cover_img`, `profile_img`, `created_at`, `updated_at`, `reads`) VALUES
(1, 13, 'China', 'Yes', 'HongKong', 'something plmx', 'Alright', 'owner', 'HongKong', '[\"United States\"]', '1', 'something.com', 'followers-only', '03060125464', 's@gmail.com', 'insta.com', 'fb.com', 'twitter.com', 'kmbo.me', 1, 'Pakistan', 2, NULL, NULL, '2022-06-18 17:20:29', '2022-09-30 17:02:22', 8),
(2, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-23 18:29:22', '2022-07-23 18:29:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Kermit Barron', 'gifam@mailinator.com', 'Ad laborum impedit', '2022-08-06 22:31:23', '2022-08-06 22:31:23'),
(2, 'Jana Osborne', 'vyfe@mailinator.com', 'Minim dolore molesti', '2022-08-06 22:31:50', '2022-08-06 22:31:50'),
(3, 'Quon Pena', 'lybiton@mailinator.com', 'Aut ratione reiciend', '2022-08-27 18:28:16', '2022-08-27 18:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan', 'Pakistan.png', '2022-03-20 23:03:11', '2022-03-20 23:03:11'),
(2, 'India', 'India.png', '2022-03-20 23:03:15', '2022-03-20 23:03:15'),
(3, 'Germany', 'Germany.png', '2022-03-20 23:03:21', '2022-03-20 23:03:21'),
(4, 'United States', 'United States.png', '2022-03-20 23:03:30', '2022-03-20 23:03:30');

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
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower` bigint(20) UNSIGNED NOT NULL,
  `following` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower`, `following`, `created_at`, `updated_at`) VALUES
(5, 2, 12, '2022-09-30 13:03:36', '2022-09-30 13:03:36'),
(12, 1, 14, '2022-10-01 12:16:41', '2022-10-01 12:16:41'),
(17, 1, 2, '2022-10-10 14:36:50', '2022-10-10 14:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_approvals`
--

CREATE TABLE `guardian_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `gurdian_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_approvals`
--

INSERT INTO `guardian_approvals` (`id`, `player_id`, `gurdian_email`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 'jysuasas@mailinator.com', 'approved', '2022-07-08 13:18:17', '2022-07-15 14:50:24'),
(2, 19, 'kmbo@mailinator.com', 'disapproved', '2022-07-08 13:19:40', '2022-07-15 14:54:04'),
(3, 20, 'dumoda@mailinator.com', 'approved', '2022-07-08 13:24:40', '2022-07-30 17:45:21'),
(4, 21, 'kmbo@mailinator.com', 'disapproved', '2022-07-08 13:26:36', '2022-07-30 17:45:32'),
(5, 22, 'ali@email.com', 'disapproved', '2022-07-08 13:28:23', '2022-07-30 17:45:48'),
(6, 23, 'cetevukoju@mailinator.com', NULL, '2022-07-08 13:29:26', '2022-07-08 13:29:26'),
(7, 24, 'wexeku@mailinator.com', 'disapproved', '2022-07-08 13:30:58', '2022-07-30 18:06:36'),
(8, 25, 'qalaxi@mailinator.com', 'approved', '2022-07-17 14:21:35', '2022-07-17 14:22:39'),
(9, 27, 'gavasuwev@mailinator.com', NULL, '2022-07-23 18:27:27', '2022-07-23 18:27:27'),
(10, 32, 'RABI@GMAIL.COM', NULL, '2022-10-12 13:36:34', '2022-10-12 13:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `intermediary_infos`
--

CREATE TABLE `intermediary_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intermediary_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_at_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermediary_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation_worldwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intermediary_infos`
--

INSERT INTO `intermediary_infos` (`id`, `intermediary_id`, `nationality`, `licensed`, `about_me`, `agency_name`, `position_at_agency`, `intermediary_nationality`, `countries_of_operation`, `countries_of_operation_worldwide`, `profile_link`, `profile_type`, `telephone`, `email`, `social_media_link_1`, `social_media_link_2`, `social_media_link_3`, `website`, `birth_city`, `state`, `birth_country`, `cover_img`, `profile_img`, `created_at`, `updated_at`, `reads`) VALUES
(1, 14, 'China', 'Yes', 'something about intermediary', 'NewAgency PVT', 'owner', 'Pakistan', '[\"United States\"]', '1', 'something.com', 'hide', '03060125464', 'asdas@gmail.com', 'insta.com', 'fb.com', 'twitter.com', 'kmbo.me', 7, 'Pakistan', 3, NULL, NULL, '2022-06-18 17:37:04', '2022-10-01 14:48:12', 18);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `market_academies`
--

CREATE TABLE `market_academies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_academies`
--

INSERT INTO `market_academies` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `academy_name`, `city_id`, `country_id`, `start_date`, `start_time`, `end_date`, `end_time`, `player_gender`, `player_position`, `player_min_age`, `player_max_age`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(2, 16, 'academy', '1970-02-28', '[\"club\",\"scout\"]', 'backend/images/agent/logo/1656080887.png', 'This is some description for market academy', 'Something Academy', '3', '3', '1997-11-15', '16:35', '2011-06-05', '19:40', 'female', '[\"left-midfielder\"]', '40', '5', 'public', '+1 (616) 427-6418', 'zumykatar@mailinator.com', 'something.com', 'something.com', 'At est fugiat ab se', '2022-06-24 21:28:07', '2022-07-30 18:11:21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `market_applies`
--

CREATE TABLE `market_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `market_id` bigint(20) UNSIGNED NOT NULL,
  `market_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_applies`
--

INSERT INTO `market_applies` (`id`, `agent_id`, `player_id`, `market_id`, `market_type`, `additional_info`, `created_at`, `updated_at`) VALUES
(1, 14, 3, 1, 'recommend-a-player', 'its for recommend-a-player', '2022-07-30 17:47:21', '2022-07-30 17:47:21'),
(2, 13, 3, 1, 'recommend-a-player', 'its for recommend-a-player', '2022-07-30 17:47:21', '2022-07-30 17:47:21'),
(3, 16, 3, 2, 'academy', 'Something about additional info', '2022-07-30 18:11:20', '2022-07-30 18:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `market_campuses`
--

CREATE TABLE `market_campuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_campuses`
--

INSERT INTO `market_campuses` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `city_id`, `country_id`, `start_date`, `start_time`, `end_date`, `end_time`, `player_gender`, `player_position`, `player_min_age`, `player_max_age`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 16, 'camps', '1991-03-30', '[\"scout\",\"intermediary\",\"academy\"]', 'backend/images/agent/logo/1656301108.png', 'Totam quae reprehend', '1', '1', '1970-02-24', '15:19', '1983-01-18', '01:52', 'male', '[\"left-midfielder\",\"right-fullback\"]', '30', '0', 'followers-only', '+1 (133) 733-6183', 'wakypegaqi@mailinator.com', 'kmbo.me', 'Est unde iure quo pr', 'Aut aut facilis volu', '2022-06-27 10:38:28', '2022-07-30 18:23:16', 2),
(2, 16, 'camps', '1993-04-16', '[\"scout\"]', 'backend/images/agent/logo/1656301314.jpg', 'Dolorem perspiciatis', '4', '4', '2013-01-17', '08:50', '2020-06-06', '02:09', 'male', '[\"second-striker\",\"central-midfielder\",\"left-midfielder\",\"defensive-midfielder\",\"right-fullback\",\"left-fullback\",\"central-defender\",\"right-wing-back\",\"goalkeeper\"]', '15', '40', 'public', '+1 (373) 569-1267', 'redoq@mailinator.com', 'kmbo.me', 'In voluptatibus anim', 'Optio laborum quisq', '2022-06-27 10:41:54', '2022-06-27 10:46:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_clubs`
--

CREATE TABLE `market_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `league_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eu_passport_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_compensation_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_conditions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_clubs`
--

INSERT INTO `market_clubs` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `club_name`, `league_division`, `city_id`, `country_id`, `start_date`, `start_time`, `end_date`, `end_time`, `player_gender`, `player_position`, `player_min_age`, `player_max_age`, `eu_passport_required`, `transfer_fee`, `monthly_salary`, `training_compensation_fee`, `trial_conditions`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 12, 'club-seeking-player', '1973-10-08', '[\"club\",\"scout\",\"intermediary\"]', 'backend/images/agent/logo/1656317378.jpg', 'Qui praesentium aliq', 'Ivy Norris', '3rd', '6', '3', '1979-05-10', '06:52', '2009-08-05', '17:25', 'male', '[\"striker\",\"right-midfielder\",\"left-midfielder\",\"right-fullback\",\"left-wing-back\",\"goalkeeper\"]', '25', '40', 'yes', 'Rerum possimus susc', '4', 'yes', 'Vel beatae in offici', 'followers-only', '+1 (659) 145-7379', 'mohize@mailinator.com', 'https://www.lycykipyjyvepi.me.uk', 'Temporibus delectus', 'Quaerat illo veritat', '2022-06-27 15:09:38', '2022-06-27 15:09:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_partnership_requests`
--

CREATE TABLE `market_partnership_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `originating_partner_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prospective_partner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prospective_partner_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prospective_partner_country_wordwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_partnership_requests`
--

INSERT INTO `market_partnership_requests` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `originating_partner_country`, `prospective_partner`, `prospective_partner_country`, `prospective_partner_country_wordwide`, `start_date`, `start_time`, `end_date`, `end_time`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 16, 'partnership-request', '2019-12-01', '[\"club\",\"intermediary\",\"academy\"]', 'backend/images/agent/logo/1656577019.png', 'Deserunt error ad se', '4', 'academy', '1', '1', NULL, NULL, NULL, NULL, 'public', '+1 (264) 372-6587', 'hojozuvo@mailinator.com', 'https://www.hefa.tv', 'Est in ea magni nost', 'Ipsa rem irure dolo', '2022-06-30 15:12:15', '2022-06-30 15:16:59', 0),
(2, 14, 'partnership-request', '1974-10-29', '[\"scout\",\"coach\",\"intermediary\"]', 'backend/images/agent/logo/1656747919.png', 'Tempore inventore n', '1', 'intermediary', '2', '1', NULL, NULL, NULL, NULL, 'followers-only', '+1 (521) 136-3305', 'kabyvy@mailinator.com', 'https://www.kyno.mobi', 'Beatae provident ad', 'Incidunt est numqua', '2022-07-02 14:45:19', '2022-07-02 14:45:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_recommend_players`
--

CREATE TABLE `market_recommend_players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eu_passport_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_main_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_alternative_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_compensation_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_conditions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_recommend_players`
--

INSERT INTO `market_recommend_players` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `player_age`, `player_gender`, `country_id`, `eu_passport_required`, `player_main_position`, `player_alternative_position`, `transfer_fee`, `monthly_salary`, `training_compensation_fee`, `trial_conditions`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 14, 'recommend-a-player', '2020-03-20', '[\"club\",\"scout\",\"coach\"]', 'backend/images/agent/logo/1656748064.jpg', 'Possimus enim volup', '25', 'male', '4', 'no', '[\"second-striker\",\"attacking-midfielder\",\"central-midfielder\",\"left-midfielder\",\"left-fullback\",\"left-wing-back\",\"goalkeeper\"]', '[\"left-forward\",\"attacking-midfielder\",\"right-midfielder\",\"left-midfielder\",\"defensive-midfielder\",\"central-defender\",\"right-wing-back\"]', 'Explicabo Quia id i', '5', 'yes', 'Irure reiciendis hic', 'followers-only', '+1 (707) 729-1769', 'risyfibeb@mailinator.com', 'https://www.pasutykeciboru.us', 'Quis accusamus sapie', 'Voluptatem officia i', '2022-07-02 14:47:44', '2022-07-30 18:30:17', 10);

-- --------------------------------------------------------

--
-- Table structure for table `market_request_players`
--

CREATE TABLE `market_request_players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `league_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eu_passport_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_compensation_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_conditions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_request_players`
--

INSERT INTO `market_request_players` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `league_division`, `country_id`, `player_gender`, `player_position`, `player_min_age`, `player_max_age`, `eu_passport_required`, `transfer_fee`, `monthly_salary`, `training_compensation_fee`, `trial_conditions`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 14, 'request-a-player', '1979-06-17', '[\"coach\",\"intermediary\"]', 'backend/images/agent/logo/1656748412.png', 'Sint sed sed nostrum', '4th', '2', 'female', '[\"striker\",\"right-forward\",\"central-midfielder\",\"left-fullback\",\"left-wing-back\"]', '40', '0', 'yes', 'Maxime ipsum aut au', '8', 'yes', 'Quis incididunt reic', 'public', '+1 (111) 201-2335', 'dorih@mailinator.com', 'https://www.dygikelulaheh.co', 'Aute magna est reic', 'Dolor architecto ani', '2022-07-02 14:53:32', '2022-07-02 14:53:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_trials`
--

CREATE TABLE `market_trials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_trials`
--

INSERT INTO `market_trials` (`id`, `agent_id`, `slug`, `expiry_date`, `for_whom`, `upload_logo`, `description`, `city_id`, `country_id`, `start_date`, `start_time`, `end_date`, `end_time`, `player_gender`, `player_position`, `player_min_age`, `player_max_age`, `profile_type`, `telephone`, `email`, `website`, `social_media_link`, `additional_information`, `created_at`, `updated_at`, `reads`) VALUES
(1, 14, 'trials', '1976-08-09', '[\"coach\",\"intermediary\"]', 'backend/images/agent/logo/1656748583.png', 'Autem accusantium ma', '1', '3', '1997-11-03', '17:54', '2017-12-06', '00:06', 'female', '[\"striker\",\"defensive-midfielder\",\"right-fullback\",\"right-wing-back\",\"left-wing-back\",\"goalkeeper\"]', '30', '40', 'followers-only', '+1 (697) 731-2584', 'xapumabici@mailinator.com', 'https://www.lugabasowenehis.ca', 'Eos enim sint vel pr', 'Qui in non occaecat updated x2', '2022-07-02 14:54:46', '2022-07-30 17:22:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_at_sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_at_receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_sent_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starred_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `message_subject`, `upload_file`, `delete_at_sender`, `delete_at_receiver`, `message_sent_time`, `starred_message`, `read_message`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 'test1', 'test1', '1665941521.jpeg', '1', '0', '2022-10-16 17:32:01', '0', '1', '2022-10-16 12:32:01', '2022-10-19 02:36:08'),
(2, '1', '2', 'test1', 'test1', '1665941946.jpeg', '0', '0', '2022-10-16 17:39:06', '0', '0', '2022-10-16 12:39:06', '2022-10-19 02:36:11'),
(3, '30', '1', 'qwertyuiop', 'test', '1665987534.jpeg', '0', '0', '2022-10-17 06:18:54', '0', '0', '2022-10-17 01:18:54', '2022-10-19 02:24:55');

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
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2022_02_28_125950_create_player_infos_table', 1),
(25, '2022_03_09_085624_create_countries_table', 1),
(26, '2022_03_09_085657_create_cities_table', 1),
(27, '2022_03_09_215758_create_languages_table', 1),
(28, '2022_03_16_134328_create_player_career_match_data_table', 1),
(29, '2022_03_16_135041_create_player_transfer_histories_table', 1),
(30, '2022_03_16_135328_create_player_next_match_schedules_table', 1),
(32, '2022_03_19_225005_create_player_attributes_table', 1),
(35, '2022_06_10_070844_create_scout_infos_table', 2),
(39, '2022_06_17_221843_create_club_infos_table', 4),
(40, '2022_06_18_100644_create_coach_infos_table', 5),
(41, '2022_06_18_103006_create_intermediary_infos_table', 6),
(43, '2022_06_18_104441_create_academy_infos_table', 7),
(44, '2022_06_17_201515_create_agent_achievements_table', 8),
(45, '2022_03_16_135410_create_player_achievements_table', 9),
(47, '2022_06_24_103859_create_market_academies_table', 10),
(48, '2022_06_27_024830_create_market_campuses_table', 11),
(49, '2022_06_27_031858_create_market_clubs_table', 11),
(50, '2022_06_30_071710_create_market_partnership_requests_table', 12),
(51, '2022_07_02_064034_create_market_recommend_players_table', 13),
(52, '2022_07_02_071234_create_market_request_players_table', 13),
(53, '2022_07_02_073100_create_market_trials_table', 13),
(54, '2022_07_08_055811_create_guardian_approvals_table', 14),
(55, '2022_07_17_092104_create_players_portfolios_table', 15),
(58, '2022_07_17_094116_create_transfer_histories_table', 16),
(63, '2022_07_30_073557_create_market_applies_table', 17),
(64, '2022_07_30_093938_add_reads_to_player_infos', 18),
(65, '2022_07_30_095037_add_reads_to_scout_infos', 19),
(66, '2022_07_30_095110_add_reads_to_club_infos', 19),
(67, '2022_07_30_095130_add_reads_to_coach_infos', 19),
(68, '2022_07_30_095150_add_reads_to_intermediary_infos', 19),
(69, '2022_07_30_095214_add_reads_to_academy_infos', 19),
(77, '2022_07_30_101351_add_reads_to_market_academies', 21),
(78, '2022_07_30_101413_add_reads_to_market_campuses', 22),
(79, '2022_07_30_101431_add_reads_to_market_clubs', 23),
(80, '2022_07_30_101552_add_reads_to_market_recommend_players', 24),
(81, '2022_07_30_101616_add_reads_to_market_partnership_requests', 25),
(82, '2022_07_30_101637_add_reads_to_market_request_players', 26),
(83, '2022_07_30_101655_add_reads_to_market_trials', 27),
(86, '2022_08_06_094142_create_blogs_table', 28),
(87, '2022_08_06_150954_create_contact_us_table', 29),
(88, '2022_08_27_102213_create_player_c_v_s_table', 30),
(89, '2022_08_27_105710_create_reports_table', 31),
(90, '2022_09_29_082616_change_users_table', 32),
(91, '2019_05_03_000001_create_customer_columns', 33),
(92, '2019_05_03_000002_create_subscriptions_table', 33),
(93, '2019_05_03_000003_create_subscription_items_table', 33),
(94, '2022_09_28_051713_add_reported_id_to_reports_table', 33),
(95, '2022_09_29_060837_create_followers', 33),
(96, '2022_09_29_075039_add_followers_to_users_table', 33),
(97, '2022_09_29_075054_add_followings_to_users_table', 33),
(98, '2022_10_03_060349_create-privacy', 34),
(99, '2022_10_04_051639_create-privacy', 35),
(100, '2022_10_04_070607_create-terms', 36),
(101, '2022_10_04_080818_create-terms', 37),
(102, '2022_10_04_081124_create-terms', 38),
(103, '2022_10_05_072657_create-about_us', 38),
(104, '2022_10_06_052944_create-blocked_users', 39),
(105, '2022_10_11_085838_create-info_privacy', 40),
(106, '2022_10_11_090010_sendmail_on', 40),
(107, '2022_10_16_161725_create_messages_table', 41),
(108, '2022_10_17_065410_add_columns_messages', 42),
(109, '2022_10_21_050033_create_verify_account_table', 43);

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
-- Table structure for table `players_portfolios`
--

CREATE TABLE `players_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players_portfolios`
--

INSERT INTO `players_portfolios` (`id`, `agent_id`, `player_id`, `name`, `profile_link`, `created_at`, `updated_at`) VALUES
(2, 16, 24, 'Bo Chapman', '24', '2022-07-17 18:29:58', '2022-07-17 18:29:58'),
(3, 16, 22, 'Salman', '22', '2022-07-17 18:29:58', '2022-07-17 18:29:58'),
(4, 16, 21, 'Ali', '21', '2022-07-17 18:29:58', '2022-07-17 18:29:58'),
(5, 4, 21, 'Ruth England', '21', '2022-07-23 18:13:57', '2022-07-23 18:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `player_achievements`
--

CREATE TABLE `player_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `achievements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_achievements`
--

INSERT INTO `player_achievements` (`id`, `player_id`, `achievements`, `month`, `year`, `details`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 3, '37', 'August', '1993', 'Hic alias doloremque', '1', '2022-06-24 10:46:06', '2022-06-24 10:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `player_attributes`
--

CREATE TABLE `player_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `ball_control` int(11) DEFAULT NULL,
  `corners` int(11) DEFAULT NULL,
  `crossing` int(11) DEFAULT NULL,
  `dribbling` int(11) DEFAULT NULL,
  `finishing` int(11) DEFAULT NULL,
  `first_touch` int(11) DEFAULT NULL,
  `free_kick_taking` int(11) DEFAULT NULL,
  `heading` int(11) DEFAULT NULL,
  `long_shots` int(11) DEFAULT NULL,
  `long_throws` int(11) DEFAULT NULL,
  `marking` int(11) DEFAULT NULL,
  `passing` int(11) DEFAULT NULL,
  `penalty_taking` int(11) DEFAULT NULL,
  `tackling` int(11) DEFAULT NULL,
  `technique` int(11) DEFAULT NULL,
  `aggression` int(11) DEFAULT NULL,
  `anticipation` int(11) DEFAULT NULL,
  `bravery` int(11) DEFAULT NULL,
  `composure` int(11) DEFAULT NULL,
  `concentration` int(11) DEFAULT NULL,
  `creativity` int(11) DEFAULT NULL,
  `decisions` int(11) DEFAULT NULL,
  `determination` int(11) DEFAULT NULL,
  `flair` int(11) DEFAULT NULL,
  `influence` int(11) DEFAULT NULL,
  `off_the_ball` int(11) DEFAULT NULL,
  `positioning` int(11) DEFAULT NULL,
  `team_work` int(11) DEFAULT NULL,
  `work_rate` int(11) DEFAULT NULL,
  `acceleration` int(11) DEFAULT NULL,
  `agility` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `jumping` int(11) DEFAULT NULL,
  `natural_fitness` int(11) DEFAULT NULL,
  `reflexes` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `stamina` int(11) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `goalkeeping` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_attributes`
--

INSERT INTO `player_attributes` (`id`, `player_id`, `ball_control`, `corners`, `crossing`, `dribbling`, `finishing`, `first_touch`, `free_kick_taking`, `heading`, `long_shots`, `long_throws`, `marking`, `passing`, `penalty_taking`, `tackling`, `technique`, `aggression`, `anticipation`, `bravery`, `composure`, `concentration`, `creativity`, `decisions`, `determination`, `flair`, `influence`, `off_the_ball`, `positioning`, `team_work`, `work_rate`, `acceleration`, `agility`, `balance`, `jumping`, `natural_fitness`, `reflexes`, `speed`, `stamina`, `strength`, `goalkeeping`, `created_at`, `updated_at`) VALUES
(1, 1, 91, 40, 100, 71, 90, 40, 40, 75, 53, 40, 83, 60, 83, 63, 100, 100, 75, 94, 40, 87, 96, 97, 80, 40, 40, 40, 40, 40, 40, 40, 84, 40, 72, 64, 83, 93, 40, 80, 40, '2022-03-20 06:28:25', '2022-03-23 13:00:45'),
(2, 2, 60, 89, 47, 59, 47, 87, 93, 77, 91, 82, 70, 92, 77, 98, 95, 70, 46, 82, 83, 97, 81, 82, 86, 77, 77, 93, 88, 55, 77, 51, 92, 62, 85, 92, 30, 86, 40, 83, 39, '2022-03-24 17:52:54', '2022-05-15 00:35:03'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-28 02:35:10', '2022-05-28 02:35:10'),
(4, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:18:38', '2022-07-08 13:18:38'),
(5, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:19:47', '2022-07-08 13:19:47'),
(6, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:24:44', '2022-07-08 13:24:44'),
(7, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:26:40', '2022-07-08 13:26:40'),
(8, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:31:03', '2022-07-08 13:31:03'),
(9, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 14:21:46', '2022-07-17 14:21:46'),
(10, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-12 13:36:56', '2022-10-12 13:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `player_career_match_data`
--

CREATE TABLE `player_career_match_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matches_played` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `assists` int(11) DEFAULT NULL,
  `substitute_in` int(11) DEFAULT NULL,
  `substitute_out` int(11) DEFAULT NULL,
  `yellow_cards` int(11) DEFAULT NULL,
  `second_yellow_cards` int(11) DEFAULT NULL,
  `red_cards` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_career_match_data`
--

INSERT INTO `player_career_match_data` (`id`, `player_id`, `season`, `team`, `country`, `competition`, `matches_played`, `goals`, `assists`, `substitute_in`, `substitute_out`, `yellow_cards`, `second_yellow_cards`, `red_cards`, `created_at`, `updated_at`) VALUES
(1, 1, '2020/2021', 'Commodi ut est volup', '4', 'Domestic Cups', 73, 26, 15, 70, 80, 35, 82, 23, '2022-03-22 15:44:45', '2022-03-22 15:44:45'),
(2, 1, '2018/2019', 'Quasi quam non autem', '4', 'International Cups', 42, 96, 28, 53, 48, 35, 5, 79, '2022-03-22 15:45:02', '2022-03-22 15:45:02'),
(3, 1, '2019/2020', 'Consequatur dolor o', '2', 'National Team', 33, 17, 20, 81, 46, 23, 5, 38, '2022-03-22 15:45:17', '2022-03-22 15:45:17'),
(4, 1, '2018/2019', 'Qui consequuntur aut', '2', 'League', 86, 93, 29, 3, 32, 60, 92, 32, '2022-03-22 15:45:33', '2022-03-22 15:45:33'),
(5, 1, '2022/2023', 'Atque eveniet hic f', '1', 'National Team', 34, 97, 13, 29, 88, 10, 25, 12, '2022-03-22 15:45:47', '2022-03-22 15:45:47'),
(6, 2, '2021/2022', 'FC Copenhagen, Denmark', '1', 'Domestic Cups', 6, 4, 2, 1, 2, 1, 0, 0, '2022-03-25 16:44:26', '2022-03-25 16:44:26'),
(7, 1, '2022/2023', 'Illo sint provident', '3', 'International Cups', 73, 84, 94, 69, 84, 73, 39, 9, '2022-04-11 02:40:52', '2022-04-11 02:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `player_c_v_s`
--

CREATE TABLE `player_c_v_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_c_v_s`
--

INSERT INTO `player_c_v_s` (`id`, `player_id`, `cv`, `created_at`, `updated_at`) VALUES
(1, 3, '1661597092_test.pdf', '2022-08-27 17:36:28', '2022-08-27 17:44:52'),
(2, 3, '1661599033_test.pdf', '2022-08-27 18:17:13', '2022-08-27 18:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `player_infos`
--

CREATE TABLE `player_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `citizenship_country` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eu_passport` tinyint(1) DEFAULT NULL,
  `languages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `main_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_foot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_agent` tinyint(1) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_club` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `league_division` int(11) DEFAULT NULL,
  `career_country` int(11) DEFAULT NULL,
  `career_city` int(11) DEFAULT NULL,
  `contract_start_date` date DEFAULT NULL,
  `contract_expiry_date` date DEFAULT NULL,
  `national_team_player` tinyint(1) DEFAULT NULL,
  `international_caps` int(11) DEFAULT NULL,
  `training_compensation_to_previous_club` tinyint(1) DEFAULT NULL,
  `transfer_fee_to_previous_club` tinyint(1) DEFAULT NULL,
  `monthly_salary_target` int(11) DEFAULT NULL,
  `current_market_value` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_video1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_video2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_video3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_video4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_video5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_img4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_img5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_infos`
--

INSERT INTO `player_infos` (`id`, `birth_country`, `player_id`, `gender`, `dob`, `birth_city`, `citizenship_country`, `height`, `weight`, `profile_link`, `eu_passport`, `languages`, `main_position`, `alternative_position`, `preferred_foot`, `speed`, `have_agent`, `status`, `career_level`, `current_club`, `league_division`, `career_country`, `career_city`, `contract_start_date`, `contract_expiry_date`, `national_team_player`, `international_caps`, `training_compensation_to_previous_club`, `transfer_fee_to_previous_club`, `monthly_salary_target`, `current_market_value`, `cover_img`, `profile_img`, `media_video1`, `media_video2`, `media_video3`, `media_video4`, `media_video5`, `media_img1`, `media_img2`, `media_img3`, `media_img4`, `media_img5`, `created_at`, `updated_at`, `reads`) VALUES
(1, 1, 1, 'male', '2003-03-30', 1, 1, 172, 52, 'https://youtube.com/', 1, 'null', 'goalkeeper', 'goalkeeper', 'both', '30 meter per second', 1, 'free-agent', 'professional', 'Khanewal', 2, 1, 2, '2022-03-21', '2022-03-30', 1, 12, 1, 1, 5000, 1000, 'backend/images/players/cover/1647792667.png', 'backend/images/players/profile/1653685696.jpg', 'https://www.youtube.com/watch?v=MoYIwAh06pM&list=RDGMEM916WJxafRUGgOvd6dVJkeQ&index=4', 'https://www.youtube.com/watch?v=sTC1ZHBeR9U', 'https://www.youtube.com/watch?v=pUETAzLgzAY', 'https://www.youtube.com/watch?v=E0mUnT1XMAg&list=RDGMEMCMFH2exzjBeE_zAHHJOdxg&start_radio=1&rv=I1Nb6k-TjF8', 'https://www.youtube.com/watch?v=2WvCXvFVt1g', 'backend/images/players/media/1647790289.png', 'backend/images/players/media/1647792810.png', 'backend/images/players/media/1647791142.png', 'backend/images/players/media/1647791098.png', 'backend/images/players/media/1647955972.png', '2022-03-20 06:28:25', '2022-10-19 09:36:07', 36),
(2, 3, 2, 'female', '2000-07-25', 6, 4, 185, 74, 'http://swl.techrepublica.com/sscsc', 1, 'null', 'right-fullback', 'right-forward', 'both', '6.7 Seconds', 1, 'in-contract', 'youth-player', 'Toronto FC', 1, 1, NULL, '2022-01-25', '2024-10-28', 1, 13, 0, 1, 7495, 2005000, 'backend/images/players/profile/1653685696.jpg', 'backend/images/players/media/1647955972.png', 'https://www.youtube.com/watch?v=2JQeHqU5oEc', 'https://vimeo.com/481386833', 'https://www.youtube.com/watch?v=IcTcCi0ZTqM', 'https://www.youtube.com/watch?v=Pqj8f3Wsw08', 'https://www.youtube.com/watch?v=uSzO_W3laak', 'backend/images/players/media/1648171541.png', 'backend/images/players/media/1648171660.png', 'backend/images/players/media/1648171660.png', 'backend/images/players/media/1648171660.jpg', 'backend/images/players/media/1647955972.png', '2022-03-24 17:52:54', '2022-10-19 09:34:40', 123),
(3, 3, 3, 'female', '1999-08-25', 6, 4, 185, 74, 'http://swl.techrepublica.com/sscsc', 1, 'null', 'second-striker', 'right-forward', 'both', '6.7 Seconds', 1, 'in-contract', 'youth-player', 'Toronto FC', 1, 1, NULL, '2022-01-25', '2024-10-28', 1, 13, 0, 1, 7495, 2005000, 'backend/images/players/profile/1653685696.jpg', 'backend/images/players/media/1647955972.png', 'https://www.youtube.com/watch?v=2JQeHqU5oEc', 'https://vimeo.com/481386833', 'https://www.youtube.com/watch?v=IcTcCi0ZTqM', 'https://www.youtube.com/watch?v=Pqj8f3Wsw08', 'https://www.youtube.com/watch?v=uSzO_W3laak', 'backend/images/players/media/1648171541.png', 'backend/images/players/media/1648171660.png', 'backend/images/players/media/1648171660.png', 'backend/images/players/media/1648171660.jpg', 'backend/images/players/media/1647955972.png', '2022-03-24 17:52:54', '2022-10-19 09:34:15', 79),
(4, NULL, 18, 'male', '2022-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:18:17', '2022-07-08 13:18:17', 0),
(5, NULL, 19, 'male', '2022-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:19:40', '2022-07-08 13:19:40', 0),
(6, NULL, 20, 'male', '2020-03-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:24:40', '2022-07-08 13:24:40', 0),
(7, NULL, 21, 'male', '2022-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:26:36', '2022-07-08 13:26:36', 0),
(8, NULL, 22, NULL, '2022-07-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:28:23', '2022-07-08 13:28:23', 0),
(9, NULL, 23, 'female', '2021-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:29:26', '2022-07-08 13:29:26', 0),
(10, NULL, 24, 'male', '2011-01-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 13:30:58', '2022-07-08 13:30:58', 0),
(11, NULL, 25, 'male', '2020-08-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'backend/images/players/media/1647955972.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-17 14:21:35', '2022-07-17 14:21:35', 0),
(12, NULL, 27, 'male', '2010-10-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-23 18:27:27', '2022-07-23 18:27:27', 0),
(13, NULL, 32, 'female', '2022-10-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-12 13:36:34', '2022-10-12 13:36:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_next_match_schedules`
--

CREATE TABLE `player_next_match_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `my_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opposing_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_match` tinyint(1) DEFAULT NULL,
  `match_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `live_stream_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_next_match_schedules`
--

INSERT INTO `player_next_match_schedules` (`id`, `player_id`, `my_team`, `opposing_team`, `home_match`, `match_type`, `venue`, `date`, `time`, `live_stream_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'salman', 'waqar', 1, '1st Division', 'railway ground', '2022-03-21', '17:00:00', NULL, '2022-03-21 19:00:19', '2022-03-21 19:00:19'),
(2, 1, 'salman', 'Louis', 0, 'Amateur League', 'railway ground', '2022-03-25', '20:00:00', NULL, '2022-03-21 19:00:56', '2022-03-21 19:00:56'),
(3, 2, 'FC Bayern, Germany', 'Ajax, Holland', 0, 'International Match', 'Amsterdam Arena', '2022-03-28', '17:41:00', NULL, '2022-03-25 16:36:31', '2022-03-25 16:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `player_transfer_histories`
--

CREATE TABLE `player_transfer_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `transfer_date` date DEFAULT NULL,
  `transfer_from_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_to_team` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_transfer_histories`
--

INSERT INTO `player_transfer_histories` (`id`, `player_id`, `transfer_date`, `transfer_from_team`, `transfer_to_team`, `transfer_type`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-25', 'test Transfer From Team', 'test Transfer To Team', 'Free Agent', '2022-03-20 23:14:02', '2022-03-20 23:14:02'),
(3, 1, '2022-03-24', 'test Transfer From Team2', 'test Transfer To Team2', 'Loan', '2022-03-22 15:20:33', '2022-03-22 15:20:33'),
(4, 1, '1983-08-20', 'Ex eiusmod autem nob', 'Sed ipsa et eaque l', 'Loan', '2022-03-22 20:29:28', '2022-03-22 20:29:28'),
(5, 2, '2022-02-27', 'Lagos Eleven', 'Heartland FC', 'Free Agent', '2022-03-25 16:40:34', '2022-03-25 16:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<h3><strong>SOCCERWORLDLINK</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Welcome to SoccerWorldLink, a platform that connects soccer players, scouts, intermediaries,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; coaches, academies, and clubs simply, effectively, and transparently.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Your privacy is of the utmost importance to us.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; As a result, this Privacy Policy outlines how we collect, use, disclose, and secure your information</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; on our website, mobile application, products, tools, and contents (collectively, the &quot;Services&quot;).</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SoccerWorldLink (hereinafter &quot;us,&quot; &quot;we,&quot; or &quot;our&quot;) and you (hereinafter &quot;you,&quot; &quot;user,&quot; or &quot;member&quot;)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; are bound by this Privacy Policy.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please note that some of our services are integrated with third-party organizations with their own</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; privacy rules.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This Privacy Policy only applies to our services; it does not apply to the services of third-party</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; organizations over which we have no control.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By using our Services, you agree to this Privacy Policy and our Terms of Service.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you disagree with any aspect of this Policy, you may not access or use our Services.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>What we collect</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We only collect information that is necessary for us to provide our services to you.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Users are prompted for particular information when they use our site.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We gather your information either when you submit it on our service or when your device</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; automatically collects your information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Members submit information including first and last name, date of birth, telephone number, email</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; address, password, profile photo, postal addresses, payment method information, awards/honors,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; driver&#39;s license numbers, and passport numbers.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Other information may include height, weight, photographs, video clips, audio recordings, and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; sporting performance.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Some of the information collected automatically include IP address, device information, browser,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; domain and other system information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Others include your usage information, the pages you visit and the features you use.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; There may also be some information about your location, such as your city and country.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you subscribe to our premium services, we may ask for your payment and billing information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; However, we have no access to your financial information as they are registered directly with the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; third-party platform that handles our payment process securely.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Also, when you connect with our sites through social media platforms, we may collect some</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; information about you.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Such information is controlled by the privacy settings on your social media account.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We suggest that you always verify and, if necessary, change the privacy settings of third-party</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; websites or services before connecting to them.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>How We Use Your Information</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We use your information in several ways, such as:</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To ensure that your experience on our platform is customized to suit your specific work and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; requirements.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To protect you from abuse or infringement of your rights.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To send you service-related emails or notifications such as account verification, reminders, payment</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; confirmation, changes or upgrades to service features, technical and security notifications.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You can manage your email subscriptions by going to our website&#39;s &quot;Settings&quot; page, unsubscribing</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; from the email using the unsubscribe link or emailing us directly at</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; support@soccerworldlink.com.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please note that users cannot unsubscribe from service-related emails.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Sharing of Information</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You agree that your information may be shared in certain circumstances, such as the ones listed</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; below.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Publicly accessible by default by other users of our service and may be searchable by search</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; engines, displaying some of your information publicly.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A merger, acquisition, reorganization, financing, change of control, or in the event of bankruptcy</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; or related proceedings.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; For security or legal compliance reasons: We must share your data with approved third parties if</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; required by law, requested by the judiciary, government, or necessary to implement any legal</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; regulation, legal agreements, terms and conditions and privacy policy.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To prevent or detect fraud, violation, or potential violation, abuse, or any other harm to the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; rights, property, or legal interests of our service, its users, or affiliates.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; With analytics, businesses to better understand your preferences on our platform.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You have the option of sharing any material you generate on our platform on your social media</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; sites.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; When you publish anything on social media, your data is shared with those services.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please visit the relevant social media network website where you share your data to learn more about</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; the data collected.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Remember that copies of the information you delete from the service may persist in cached and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; archived pages of our service or if other Users copy or save that information.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Specific Requirements</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We may transmit, process, and keep our users&#39; personal information in countries where we operate,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; which may be outside of your home country, as SoccerWorldLink provides services all over the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; world.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Some governments in countries where we export personal data may have more access than governments in</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; your home country.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; For further information on the various rules, please see the sections below.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In compliance with the General Data Protection Regulations (GDPR), we have described your rights and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; how you can exercise them.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SoccerWorldLink complies with GDPR and ensures that data collection, processing, retention and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; deletion are all done under the law.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You have the right, among others, to request:</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To receive confirmation that we are processing your personal information and a copy of such</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To make a change or an update to your personal information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To stop using some or all of your information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To delete your information from our service.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In your account, you can exercise some of these rights, such as editing your information at any</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; time.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you want a copy of your information or having difficulties editing or removing any of it, please</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; send an email to support@soccerworldlink.com with your specific request.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; All European Union (EU) users must give their consent as to how their information is collected, used</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; and shared by technological means such as cookies.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We follow the EU&#39;s model contracts to transfer personal data to third countries when we do so (often</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; referred to as &quot;standard contractual terms&quot;).</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Your data will be destroyed once it is no longer required for any obligatory reasons.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you have shared your information on a third-party platform, we may not be able to delete it, but</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; we will make sure it is no longer available on our platform.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Furthermore, if we need your requested information to complete a transaction or investigate data</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; security violations, we will not be able to delete it.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Such information will be destroyed only when the transaction is completed, or all related security</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; issues have been resolved.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Due to the nature of our services, we collaborate with several partners, some of whom may have</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; access to your information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You can opt out of this activity by emailing <strong>support@soccerworldlink.com</strong>, and we</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; will respond as quickly as possible.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please note that if you choose not to share any part of your information required for the services</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; to function correctly, we may be unable to provide you with the services.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Monitoring of user behavior.</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We may, but are not compelled to, monitor communications on our service, such as messaging, to</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; safeguard our users and monitor the effectiveness of our service.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You agree that you have no expectation of privacy in any such communications or postings and that</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; you expressly consent to such monitoring.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Security</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You are responsible for keeping your login information secure and preventing unauthorized access to</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; your account, computer, or any other device through which you access and use our Services.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We protect your data on the platform from unauthorized access, modification, deletion, or loss.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Soccerworldlink protects its data networks with industry-standard firewalls, password protection and</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Intrusion Prevention Systems.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Our customers&#39; information is only accessible to authorized persons, and our security and privacy</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; policies are reviewed and updated regularly.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We respect your privacy and take all reasonable precautions to prevent any problems with your</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; data.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; However, we cannot guarantee that your information will always be completely secure, including if</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; data is lost due to unauthorized access or the loss of your login credentials.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Any device or software failure, as well as illegal third-party access or usage, can compromise the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; security of your personal information at any time.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please email us at <strong>support@soccerworldlink.com </strong> immediately to report a compromised</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; password or alleged or actual unauthorized access to your account.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Protecting children&#39;s information</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Only persons 16 and above are eligible to use this website.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; For children under the statutory age of 16, a parental/guardian&#39;s consent must be provided to use</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; our services.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We recognize the importance of protecting children&#39;s information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We do not disclose to third parties any children&#39;s personal information that we collect other than</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; in the manner and for reasons described in this privacy policy.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you suspect your child is using our service and you or another parent have not received an email</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; requesting your consent, don&#39;t hesitate to contact us at</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>privacy@soccerworldlink.com</strong>. If you do not meet our age criteria and we do not</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; receive your parents/guardian&#39;s consent within 14 days of creating your account, we will limit your</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; account and notify you. If, after 30 days, we still have not received your parental consent, we will</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; delete your account. Please note that it is a violation of our terms to create an account with</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; incorrect information.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Data Breach Reporting</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In the event of a data breach, we will investigate any information under our control that has been</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; compromised.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We will then immediately notify those whose information might have been affected and take additional</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; steps as necessary under any applicable laws and regulations.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Cookie Policy</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; How we use cookies</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cookies are small data files that web browser stores on a computer&rsquo;s hard drive.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cookies automatically gather information such as internet protocol (IP) address, operating system,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; clickstream, time/date stamp, and specific user identification codes that could be used to track the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; pages visited by a user as the frequency of such visits. This information is stored in log</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; files.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By helping to store your preferences and settings, you do not have to provide those details anytime</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; you are on our website.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This information is used to analyze traffic on our website and provide a better service to users,</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; such as remembering their preferences to facilitate a smooth browsing experience, among other</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; benefits.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A cookie does not give us access to your computer or provide us with any information about you other</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; than what you choose to share with us on the platform.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Controlling Cookies</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; You have the option of controlling cookies by either accepting, refusing or deleting them.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please note that if you opt to decline cookies, you may not enjoy a complete browsing experience on</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; our website.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; For more information on how to change the cookie settings on your browser, visit</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>www.allaboutcookies.org.</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Governing Laws</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The laws and regulations of Ontario, Canada shall govern this privacy policy and any other</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; supplementary terms defined by SoccerWorldLink, without giving effect to any conflicts of laws</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; principles.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This agreement is exempt from the United Nations Conventions on the International Sale of Goods.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; On all matters relating to this Privacy Policy, our terms and any other terms governing the</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; relationships between us, our users, and any third parties, the courts of Ontario, Canada shall have</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; exclusive jurisdiction.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Changes to this privacy policy</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We may periodically review and make changes to this Privacy Policy to reflect changes in our</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; business and practices. As a result, you are advised to check this page often.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The date of this Privacy Policy&#39;s last update will be displayed at the bottom of the page.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Contacting Us.</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; If you have any comments or questions concerning this privacy policy, do not hesitate to contact us</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; by email at the address listed below.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Please notify us promptly if you see any suspicious activity on your account or the platform in</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; general by emailing <strong>support@soccerworldlink.com</strong>.</p>', '2022-10-04 12:59:14', '2022-10-05 14:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reported_id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `reported_id`, `type`, `reason`, `created_at`, `updated_at`) VALUES
(4, 3, 0, 'offensive', 'any specific reason go here', '2022-08-27 18:19:44', '2022-08-27 18:19:44'),
(5, 1, 2, 'spam', ',,,', '2022-09-29 16:25:38', '2022-09-29 16:25:38'),
(6, 2, 1, 'violence', 'rwsfdf', '2022-10-01 15:03:28', '2022-10-01 15:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `scout_infos`
--

CREATE TABLE `scout_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scout_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_at_organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scout_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_of_operation_worldwide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_city` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_country` int(11) DEFAULT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scout_infos`
--

INSERT INTO `scout_infos` (`id`, `scout_id`, `nationality`, `licensed`, `about_me`, `organization_name`, `position_at_organization`, `scout_nationality`, `countries_of_operation`, `countries_of_operation_worldwide`, `profile_link`, `profile_type`, `telephone`, `email`, `social_media_link_1`, `social_media_link_2`, `social_media_link_3`, `website`, `birth_city`, `state`, `birth_country`, `cover_img`, `profile_img`, `created_at`, `updated_at`, `reads`) VALUES
(1, 10, 'Pakistan', 'Yes', 'i am a new user', 'Alright PVT LTD', 'owner', 'Pakistan', '[\"Pakistan\",\"India\"]', '1', 'something.com', 'public', '+1 (743) 956-9913', 'coqa@mailinator.com', 'Non omnis a autem ap', 'Nulla quae itaque su', 'Vitae dolores pariat', 'https://www.zuqukuqyha.biz', 1, 'Punjab', 1, 'backend/images/agent/cover/3074107828.JPG', 'backend/images/agent/profile/5189162775.JPG', NULL, '2022-10-01 12:35:32', 23),
(2, 4, 'Pakistan', 'Yes', 'i am a new user', 'Alright PVT LTD', 'owner', 'Pakistan', '[\"Pakistan\",\"India\"]', '1', 'something.com', 'public', '+1 (743) 956-9913', 'coqa@mailinator.com', 'Non omnis a autem ap', 'Nulla quae itaque su', 'Vitae dolores pariat', 'https://www.zuqukuqyha.biz', 1, 'Punjab', 1, 'backend/images/agent/cover/3074107828.JPG', 'backend/images/agent/profile/5189162775.JPG', NULL, '2022-10-01 12:42:02', 10),
(3, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-23 18:26:02', '2022-07-23 18:26:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sendmail_on`
--

CREATE TABLE `sendmail_on` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_follower` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invite_refral` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sendmail_on`
--

INSERT INTO `sendmail_on` (`id`, `user_id`, `new_follower`, `invite_refral`, `created_at`, `updated_at`) VALUES
(1, '1', 'new_follower', 'invite_refral', '2022-10-11 16:56:56', '2022-10-11 17:13:12'),
(2, '30', NULL, NULL, '2022-10-14 13:11:26', '2022-10-14 13:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_conditions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `terms_conditions`, `created_at`, `updated_at`) VALUES
(1, '<p class=\"text-center mb-0\"> <strong class=\"fs-4\">Our Mission</strong></p>\r\n\r\n                        <p class=\"About__para\">To provide a simple, transparent, and effective service focused on connecting soccer players, agents, and\r\n                            other\r\n                            professionals worldwide.</p>\r\n                        <p class=\"text-center mb-0\"> <strong class=\"fs-4\">Our Vision</strong></p>\r\n                        <p class=\"About__para\">To be at the forefront of soccer recruitment globally.</p>\r\n                       <p class=\"text-center mb-0\"><strong class=\"fs-4\">Our values</strong></p>\r\n                        <section class=\"About__list_items\">\r\n                            <li>Passion</li>\r\n                            <li>Integrity</li>\r\n                            <li>Innovation</li>\r\n                            <li>Excellence</li>\r\n                        </section>', '2022-10-04 16:25:40', '2022-10-05 16:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_histories`
--

CREATE TABLE `transfer_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_histories`
--

INSERT INTO `transfer_histories` (`id`, `agent_id`, `player_id`, `date`, `club_from`, `club_to`, `transfer_type`, `created_at`, `updated_at`) VALUES
(1, 16, 3, '2022-07-05', 'Barcelona Updated', 'Riyal Madrid', 'loan', '2022-07-17 18:10:18', '2022-07-17 18:20:29'),
(2, 4, 3, '1979-10-20', 'Quia ullamco tempore', 'Quibusdam reprehende', 'back-from-loan', '2022-07-23 18:14:53', '2022-07-23 18:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('player','scout','club','coach','intermediary','academy','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `followers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `followings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `status`, `followers`, `followings`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'M Salman', 'salman@gmail.com', NULL, '$2y$10$XquAHp/qqbWapAQk4OhYlO9/mz6MCmw2gXPpU7.d6BsrM0KktP5o2', 'oD0CccdDvr2H14WJhkRQXAgiFWHLfhmhlqqSGyaosvqH5VjBxokCQmXs4duE', '2022-03-20 06:28:25', '2022-10-19 02:57:06', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Andre Nedved', 'andrenedved@protonmail.com', NULL, '$2y$10$/RsWhtVsafIFaS5CZ/TtS.mfXfnL7YVAGKtKF9g/fyoPHY9AixIwa', '09Gef5PyoKAccYuOBHgQWxBJkbOit9x5WTHIyQep0HsYppIDXC0jgAbrJxsU', '2022-03-24 17:52:54', '2022-10-15 06:31:19', 'player', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Dane Ratliff', 'niquveq@mailinator.com', '2022-05-28 07:41:23', '$2y$10$/RsWhtVsafIFaS5CZ/TtS.mfXfnL7YVAGKtKF9g/fyoPHY9AixIwa', '9jHhQyqtkGrrsKDzngeTYD2t6kEsAHrj5346GsMHi3GCQ7FjVztFFzAmW1Pf', '2022-05-28 02:35:10', '2022-09-03 05:22:20', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Tad Fletcher', 'zywo@mailinator.com', NULL, '$2y$10$liqD6Yteh26/UkgYJx39ReuaN.szxX597TVeoisjHP0m5NCEKuXp6', NULL, '2022-06-09 18:41:47', '2022-06-09 18:41:47', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Aiko Bowers', 'tuwojedofo@mailinator.com', NULL, '$2y$10$WXTRXKjQyctur3yOLyeO/.6sZU1CvcEXMbSBR008slJRXEJWgDp7e', NULL, '2022-06-09 19:01:31', '2022-06-09 19:01:31', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Madeline Best', 'rite@mailinator.com', NULL, '$2y$10$8WtQRfStaceX9T6wI5nBy.qn73jBY8nMhP.31re8ZizQtpmsc998i', NULL, '2022-06-09 19:03:21', '2022-06-09 19:03:21', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Dorothy Solomon', 'nemonaququ@mailinator.com', NULL, '$2y$10$pbmVj18IxI4vudHGkQLeY.hFYCJ/CYKsutEDbRrilNW3v0jBCV3du', NULL, '2022-06-09 19:05:14', '2022-06-09 19:05:14', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Sigourney Hobbs', 'pyrup@mailinator.com', NULL, '$2y$10$BtDxGjO81RgEQzfxGXFFkuREIpKf5HM/AMqKfFRvG6SEgVRYF18Hq', NULL, '2022-06-09 19:07:52', '2022-06-09 19:07:52', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Sacha Elliott', 'tisewocaw@mailinator.com', NULL, '$2y$10$MKWggG4KpAtXaIshD7Y66uIYqD1dDcUHBbee.ZJldNwk2oY230M.2', NULL, '2022-06-09 19:11:52', '2022-06-09 19:11:52', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Nesa Patel', 'nesa@mailinator.com', NULL, '$2y$10$CahKoPz4KKJo4nVnEsVUDe4mZU2yxuBfDhnehTZqRmkpL/pYzscBW', NULL, '2022-06-09 19:12:41', '2022-06-18 02:58:09', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Raymond Holcomb', 'tiwefalyv@mailinator.com', NULL, '$2y$10$Y15CdF3I1jsFARkUJ5jshOb9P0KTkiVHehzVRZ2v1vJK2RvwLESWK', NULL, '2022-06-18 06:32:17', '2022-06-18 06:32:17', 'club', '', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Joy Randolph', 'rimy@mailinator.com', NULL, '$2y$10$DcEc29Xhn.7PsHcFuFlypeXW4MkZke2XQGEiy2lB.PZ2HMTIl0mfu', NULL, '2022-06-18 17:20:29', '2022-06-18 17:20:29', 'coach', '', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Penelope Puckett', 'vegewo@mailinator.com', NULL, '$2y$10$HPYz/LL8dDV2uSmDxkYoWuqja9fxhgcIIT48TITSqStfbuhevlL86', NULL, '2022-06-18 17:37:04', '2022-06-18 17:37:04', 'intermediary', '', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Mariam Hines', 'piketyno@mailinator.com', NULL, '$2y$10$LFNCThQcNFYhGplcAog6BehceXtJPakJdM8EITS5ae/QCVszqT/Ma', NULL, '2022-06-18 17:54:10', '2022-06-18 17:54:10', 'academy', '', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Shad Mathis', 'wijyvun@mailinator.com', NULL, '$2y$10$pScGnWCC6fVUqLZTNFFVK.gwVsyJFKNBzMyWEpwlJYScDmBMxWq3a', NULL, '2022-07-08 13:16:17', '2022-07-08 13:16:17', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Camille Cervantes', 'jysu@mailinator.com', NULL, '$2y$10$xUI/DT8T1pP8b4l2.r8OTeEnvw6RmL7j1I9MARoqdBaWj.BrROagy', NULL, '2022-07-08 13:18:17', '2022-07-08 13:18:17', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Salvador Guerra', 'vecoxy@mailinator.com', NULL, '$2y$10$PVYudeFR1iO/Lar0XDonr.7gefKvY1/tfWFGvy8exZpLrL0lo0i3O', NULL, '2022-07-08 13:19:40', '2022-07-08 13:19:40', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Ila Pennington', 'munajynic@mailinator.com', NULL, '$2y$10$gwQEUhoWocWbgmevqoSNOeZTBmIcmKPbqlhc1VsqrlLblQG/ljATq', NULL, '2022-07-08 13:24:40', '2022-07-08 13:24:40', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Ruth England', 'fucimawes@mailinator.com', NULL, '$2y$10$cExj/bFKFZNWK6EdMdTA9.qJsQfQ8DJY641KaD4IGQugOHATWJCam', NULL, '2022-07-08 13:26:36', '2022-07-08 13:26:36', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Yoko Lowery', 'xukary@mailinator.com', NULL, '$2y$10$Pv/s71AMF8Jhw5aUE21go.AAn.FDegKvC2IeLAEvkVCYBjogf2gWi', NULL, '2022-07-08 13:28:23', '2022-07-08 13:28:23', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Jakeem Macias', 'ruxybek@mailinator.com', NULL, '$2y$10$7.ICo5nZyBzLCypWo5CnluXoRIfAtje/USJJlGy31c5eAvocQ0TVe', NULL, '2022-07-08 13:29:26', '2022-07-08 13:29:26', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Bo Chapman', 'qonuxo@mailinator.com', NULL, '$2y$10$DDDVPqqcc.GE6NwRH2BnhOj463zCxJTWQTj2.YuBQCNaXCDOHSDqC', NULL, '2022-07-08 13:30:58', '2022-07-08 13:30:58', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Reece Contreras', 'rupujur@mailinator.com', NULL, '$2y$10$TGjPX6qj6kZ4FGkGppQQ7e2cthyrpTi2XhtLhzzZZAt5Yuv3hAikO', NULL, '2022-07-17 14:21:35', '2022-07-17 14:21:35', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Cassandra Herring', 'rubap@mailinator.com', NULL, '$2y$10$U8RC63TX5WtcBlmyJ0bM7OdUJ7iEoNxLxwjgh/ybbgx1U8ve3td86', NULL, '2022-07-23 18:26:02', '2022-07-23 18:26:02', 'scout', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Yasir Humphrey', 'hekefow@mailinator.com', NULL, '$2y$10$n/0Hio.MVpP4gP/WaDiwdu.vhnGC5zJBePs9k0FPkfDUA6HMev2NW', NULL, '2022-07-23 18:27:27', '2022-07-23 18:27:27', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Vivien Williams', 'baxamafiq@mailinator.com', NULL, '$2y$10$kOXaYFGtzthTKMvmMMV5kOlx0OGySkRf2NH8p.yynf1eIRNMzdiB6', NULL, '2022-07-23 18:29:22', '2022-07-23 18:29:22', 'coach', '', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Admin', 'admin@gmail.com', NULL, '$2y$10$XquAHp/qqbWapAQk4OhYlO9/mz6MCmw2gXPpU7.d6BsrM0KktP5o2', 'IXkNXfjh12Nxg9AhiSFMN0pH2a12EzpUt97r1WBW6xzT3nhmzLN5eizEiEd8', '2022-03-20 06:28:25', '2022-03-20 06:28:25', 'admin', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Admin', 'testadmin@gmail.com', NULL, '$2y$10$/RsWhtVsafIFaS5CZ/TtS.mfXfnL7YVAGKtKF9g/fyoPHY9AixIwa', 'AVdLSvE74JwXzKrVW7svHCtmJJ3EfZ1t9eMyapO1IrCxyh4RQ7LcCTcaeWkg', '2022-03-20 06:28:25', '2022-03-20 06:28:25', 'player', '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'RABI RAJPOOT', 'RAJPOOT@GMAIL.COM', NULL, '$2y$10$XquAHp/qqbWapAQk4OhYlO9/mz6MCmw2gXPpU7.d6BsrM0KktP5o2', NULL, '2022-10-12 13:36:34', '2022-10-12 13:36:34', 'player', 'active', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_account`
--

CREATE TABLE `verify_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photofront` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academy_infos`
--
ALTER TABLE `academy_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academy_infos_reads_index` (`reads`);

--
-- Indexes for table `agent_achievements`
--
ALTER TABLE `agent_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_reads_index` (`reads`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `club_infos`
--
ALTER TABLE `club_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_infos_reads_index` (`reads`);

--
-- Indexes for table `coach_infos`
--
ALTER TABLE `coach_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coach_infos_reads_index` (`reads`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_approvals`
--
ALTER TABLE `guardian_approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intermediary_infos`
--
ALTER TABLE `intermediary_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intermediary_infos_reads_index` (`reads`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_academies`
--
ALTER TABLE `market_academies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_academies_reads_index` (`reads`);

--
-- Indexes for table `market_applies`
--
ALTER TABLE `market_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_campuses`
--
ALTER TABLE `market_campuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_campuses_reads_index` (`reads`);

--
-- Indexes for table `market_clubs`
--
ALTER TABLE `market_clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_clubs_reads_index` (`reads`);

--
-- Indexes for table `market_partnership_requests`
--
ALTER TABLE `market_partnership_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_partnership_requests_reads_index` (`reads`);

--
-- Indexes for table `market_recommend_players`
--
ALTER TABLE `market_recommend_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_recommend_players_reads_index` (`reads`);

--
-- Indexes for table `market_request_players`
--
ALTER TABLE `market_request_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_request_players_reads_index` (`reads`);

--
-- Indexes for table `market_trials`
--
ALTER TABLE `market_trials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_trials_reads_index` (`reads`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `players_portfolios`
--
ALTER TABLE `players_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_achievements`
--
ALTER TABLE `player_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_attributes`
--
ALTER TABLE `player_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_attributes_player_id_foreign` (`player_id`);

--
-- Indexes for table `player_career_match_data`
--
ALTER TABLE `player_career_match_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_career_match_data_player_id_foreign` (`player_id`);

--
-- Indexes for table `player_c_v_s`
--
ALTER TABLE `player_c_v_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_infos`
--
ALTER TABLE `player_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_infos_player_id_foreign` (`player_id`),
  ADD KEY `player_infos_reads_index` (`reads`);

--
-- Indexes for table `player_next_match_schedules`
--
ALTER TABLE `player_next_match_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_next_match_schedules_player_id_foreign` (`player_id`);

--
-- Indexes for table `player_transfer_histories`
--
ALTER TABLE `player_transfer_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_transfer_histories_player_id_foreign` (`player_id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scout_infos`
--
ALTER TABLE `scout_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scout_infos_reads_index` (`reads`);

--
-- Indexes for table `sendmail_on`
--
ALTER TABLE `sendmail_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_histories`
--
ALTER TABLE `transfer_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `verify_account`
--
ALTER TABLE `verify_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academy_infos`
--
ALTER TABLE `academy_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_achievements`
--
ALTER TABLE `agent_achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blocked_users`
--
ALTER TABLE `blocked_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `club_infos`
--
ALTER TABLE `club_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coach_infos`
--
ALTER TABLE `coach_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guardian_approvals`
--
ALTER TABLE `guardian_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `intermediary_infos`
--
ALTER TABLE `intermediary_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market_academies`
--
ALTER TABLE `market_academies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `market_applies`
--
ALTER TABLE `market_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `market_campuses`
--
ALTER TABLE `market_campuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `market_clubs`
--
ALTER TABLE `market_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `market_partnership_requests`
--
ALTER TABLE `market_partnership_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `market_recommend_players`
--
ALTER TABLE `market_recommend_players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `market_request_players`
--
ALTER TABLE `market_request_players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `market_trials`
--
ALTER TABLE `market_trials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players_portfolios`
--
ALTER TABLE `players_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `player_achievements`
--
ALTER TABLE `player_achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `player_attributes`
--
ALTER TABLE `player_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `player_career_match_data`
--
ALTER TABLE `player_career_match_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `player_c_v_s`
--
ALTER TABLE `player_c_v_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_infos`
--
ALTER TABLE `player_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `player_next_match_schedules`
--
ALTER TABLE `player_next_match_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `player_transfer_histories`
--
ALTER TABLE `player_transfer_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scout_infos`
--
ALTER TABLE `scout_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sendmail_on`
--
ALTER TABLE `sendmail_on`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfer_histories`
--
ALTER TABLE `transfer_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `verify_account`
--
ALTER TABLE `verify_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_attributes`
--
ALTER TABLE `player_attributes`
  ADD CONSTRAINT `player_attributes_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_career_match_data`
--
ALTER TABLE `player_career_match_data`
  ADD CONSTRAINT `player_career_match_data_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_infos`
--
ALTER TABLE `player_infos`
  ADD CONSTRAINT `player_infos_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_next_match_schedules`
--
ALTER TABLE `player_next_match_schedules`
  ADD CONSTRAINT `player_next_match_schedules_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_transfer_histories`
--
ALTER TABLE `player_transfer_histories`
  ADD CONSTRAINT `player_transfer_histories_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
