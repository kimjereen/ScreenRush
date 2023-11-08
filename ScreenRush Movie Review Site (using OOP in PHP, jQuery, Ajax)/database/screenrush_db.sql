-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 08, 2023 at 09:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screenrush_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_des` text NOT NULL,
  `year` year(4) NOT NULL,
  `resolution` varchar(10) NOT NULL,
  `pg` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `ratings` decimal(10,1) NOT NULL,
  `num_of_stars` int(11) NOT NULL,
  `num_of_reviews` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `img_src` text NOT NULL,
  `trailer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_des`, `year`, `resolution`, `pg`, `duration`, `ratings`, `num_of_stars`, `num_of_reviews`, `status`, `genre`, `img_src`, `trailer`) VALUES
(1, 'Maquia: When the Promised Flower Blooms', 'In a world where people can live for centuries, the Iorph clan, blessed with long life, spends peaceful days weaving the ', 2018, '1080p', 'PG 13', '115 mins', '10.0', 5, 1, 'Released', 'Animation, Drama, Fantasy, Adventure', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/hL3NqRE2ccR4Y2sYSJTrmalRjrz.jpg', 'https://www.youtube.com/watch?v=AEWvRqZQ0RU&pp=ygUUbWFxdWlhIG1vdmllIHRyYWlsZXI%3D'),
(2, 'World War Z', 'Former United Nations employee Gerry Lane traverses the world in a race against time to stop a zombie pandemic that is toppling armies and governments and threatens to destroy humanity itself.', 2013, 'HD', 'PG 13', '116 mins', '6.0', 3, 1, 'Released', 'Action, Adventure, Horror', 'https://image.tmdb.org/t/p/original/aCnVdvExw6UWSeQfr0tUH3jr4qG.jpg', 'https://www.youtube.com/watch?v=slfrrjPndV4&pp=ygUZd29ybGQgd2FyIHogbW92aWUgdHJhaWxlcg%3D%3D'),
(3, 'Black Clover: Sword of the Wizard King', 'Asta, a boy born with no magic in a world where magic is everything, and his rival Yuno, a genius mage chosen by the legendary 4-leaf Grimoire, have together fought a number of powerful enemies to prove their power beyond adversity and aim for the top mage \"Wizard King\". Standing in front of Asta and Yuno, who dream of becoming the Wizard King, are the Wizard Kings from the past. Conrad Leto, Julius Novachrono\'s predecessor Wizard King, once respected by the people of Clover Kingdom but suddenly rebelled against the kingdom and was sealed away, has been resurrected. Now he aims to use the \"Imperial Sword\" to resurrect the 3 most feared Wizard Kings in the history, Edward Avalaché, Princia Funnybunny and Jester Garandaros, and take over the Clover Kingdom.', 2023, '4K', 'PG 13', '110 mins', '9.0', 9, 2, 'New', 'Animation, Action, Adventure', 'https://i0.wp.com/www.animegeek.com/wp-content/uploads/2022/10/Black-Clover-Sword-of-the-Wizard-King-Movie-Anime-Key-Visual-December-2022.jpg?resize=691%2C1024&ssl=1', 'https://www.youtube.com/watch?v=PrgxJ1_sUcs&pp=ygUtYmxhY2sgY2xvdmVyIHN3b3JkIG9mIHRoZSB3aXphcmQga2luZyB0cmFpbGVy'),
(4, 'Nanny McPhee', 'A recently widowed undertaker, Mr. Brown, is struggling to manage his seven rambunctious children, who have already scared off 17 nannies. In desperation, he hires Nanny McPhee, an imposing figure with a special touch of magic. As Nanny McPhee uses her unique disciplinary methods to teach the children five important lessons, they begin to understand the consequences of their actions and the true value of love and respect.', 2005, 'HD', 'PG', '97 mins', '8.0', 8, 2, 'Released', 'Comedy, Family, Fantasy', 'https://image.tmdb.org/t/p/original/1inb4WJI7kS9womE4YFMHPwTWqj.jpg', 'https://www.youtube.com/watch?v=54xMw6eouOM&pp=ygUMbmFubnkgbWNwaGVl'),
(5, 'Alive', 'A mysterious outbreak spreads rapidly, leaving survivors trapped and isolated in their apartments. Oh Joon-woo, a video game live streamer, and Kim Yoo-bin, his apartment neighbor, must find a way to survive as they face dwindling supplies, encroaching danger, and the terrifying realization that they might be the only ones left. As their situation becomes increasingly dire, they must rely on their ingenuity and resilience to navigate the chaos and find a means of escape.', 2020, 'HD', 'R', '98 mins', '8.0', 4, 1, 'Released', 'Horror, Thriller, Zombies', 'https://i.pinimg.com/736x/30/27/e0/3027e09bd72588736799a796863fb8c0.jpg', 'https://www.youtube.com/watch?v=jQ8CCg1tOqc&pp=ygUNYWxpdmUgdHJhaWxlcg%3D%3D'),
(6, 'The Boy and the Heron', 'Through encounters with his friends and uncle, follows a teenage boy\'s psychological development. He enters a magical world with a talking grey heron after finding an abandoned tower in his new town.', 2023, '4K', 'PG 13', '0 min', '0.0', 0, 0, 'Upcoming', 'Animation, Adventure, Drama', 'https://th.bing.com/th/id/OIF.tiy8FzXYn0YsKsWYlKVa8w?pid=ImgDet&rs=1', 'https://www.youtube.com/watch?v=f7EDFdA10pg&pp=ygUddGhlIGJveSBhbmQgdGhlIGhlcm9uIHRyYWlsZXI%3D'),
(7, 'Scaramouche: The Wanderer\'s Journey', 'The journey of the enigmatic Scaramouche, a mischievous bard with a hidden past, as he sets out on a perilous quest to uncover the truth behind the mysterious ruins that have surfaced across Teyvat. As he delves deeper into the secrets of the ancient civilization, Scaramouche must confront his own demons and grapple with the complexities of his identity. Along the way, he forms unlikely alliances, faces formidable adversaries, and discovers the true power of friendship and sacrifice amidst the ever-unfolding chaos threatening to consume the world.', 2025, '4K', 'G', '160 mins', '7.3', 11, 3, 'Upcoming', 'Action, Adventure, Drama, Slice-of-Life', 'https://i.pinimg.com/originals/19/41/dd/1941ddd73bda0ef4d24bbcc2750b1434.jpg', 'https://www.youtube.com/watch?v=UDQ7m2L9sK8&pp=ygUfd2FuZGVyZXIgZ2Vuc2hpbiBpbXBhY3QgdHJhaWxlcg%3D%3D'),
(8, 'Peninsula', 'A gripping action-horror film set four years after the events of the original \"Train to Busan.\" The movie follows Jung-seok, a soldier who escaped the zombie-infested South Korea but is tasked with returning to the peninsula on a dangerous mission. Amidst ruthless human survivors and hordes of flesh-eating zombies, Jung-seok must navigate through the desolate wasteland and confront his own inner demons as he fights for his and others\' survival in a world consumed by chaos and desperation.', 2020, 'HD', 'R', '116 mins', '0.0', 0, 0, 'Released', 'Action, Sci-Fi, Horror, Zombies', 'https://www.newdvdreleasedates.com/images/posters/large/peninsula-2020-02.jpg', 'https://www.youtube.com/watch?v=yVucSRLLeIM'),
(9, 'BTS: Yet To Come', 'It showcases BTS\' massive free show at Busan\'s World Expo in October, which welcomed more than 50,000 in-person guests.', 2023, 'HD', 'PG 13', '104 mins', '8.0', 4, 1, 'Released', 'Music, Documentary', 'https://i.redd.it/bts-yet-to-come-in-cinemas-teaser-poster-v0-4etc01np1y6a1.jpg?auto=webp&s=450bfc7d1832cd698e7da7774ae67ac922f62f55', 'https://www.youtube.com/watch?time_continue=1&v=u0kJfkDix4Y&embeds_referring_euri=https%3A%2F%2Fwww.bing.com%2F&embeds_referring_origin=https%3A%2F%2Fwww.bing.com&source_ve_path=Mjg2NjY&feature=emb_logo'),
(10, 'Enchanted Moments: A Love That Lasts Forever', 'This Movie weaves a tale of romance, friendship, and self-discovery. Follow the emotional journey of Ryan and Kim, classmates blossoming romance faces a rollercoaster of challenges, laughter, and heartfelt moments. As they navigate the complexities of life, relationships, and personal growth, they discover the true essence of love and the importance of cherishing every moment, no matter how ordinary or extraordinary. Nothing is gonna stop them... as their connection deepens, they learn that sometimes the best relationships are found where you least expect them.', 2024, '4K', 'PG', '143 mins', '9.0', 9, 2, 'Upcoming', 'Drama, Romance, Comedy, Slice-of-Life', './assets/images/our-movie.jpg', 'https://www.youtube.com/watch?v=NMxFvOXMNAw&pp=ygUWbm90aGluZ3MgZ29ubmEgc3RvcCB1cw%3D%3D');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `user_email`, `user_password`) VALUES
(1, 'kimjereen', 'Kim Barroquillo', 'kimbarroquillo@gmail.com', 'kimjereen'),
(2, 'ryanlu', 'Ryan Lu', 'lu@email.com', 'ryanlu'),
(3, 'kimlu', 'Kim Lu', 'kimlu@email.com', 'kimlu'),
(4, '_moff', 'moffles', 'moffle@email.com', 'moff'),
(5, 'Kimichiry', 'Ryan Everof Lu', 'everof@gmail.com', '123456'),
(6, 'sampleUser1', 'Sample User', 'user@email.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `review_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `stars` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`review_id`, `movie_id`, `movie_name`, `user_id`, `username`, `stars`, `date`, `comment`) VALUES
(1, 3, 'Black Clover: Sword of the Wizard King', 4, '_moff', 5, 'Sat Nov 04 2023 22:4', 'this was a long awaited movie of mine. finally it arrived. so excited for the next moviee'),
(2, 7, 'Scaramouche: The Wanderer\'s Journey', 4, '_moff', 4, 'Sat Nov 04 2023 22:4', 'i watched this movie more than once. hehe you guys will love this movie for sure! specially genshin fans and scara users '),
(3, 4, 'Nanny McPhee', 4, '_moff', 4, 'Sat Nov 04 2023 22:5', 'this was kind of nostalgic for me rewatching it again. to those who havent watched this you guys will like this movie'),
(4, 7, 'Scaramouche: The Wanderer\'s Journey', 2, 'ryanlu', 2, 'Sat Nov 04 2023 22:5', 'I like the the movie Neuvillette of Fontaine much better than this. watch that instead'),
(5, 2, 'World War Z', 2, 'ryanlu', 3, 'Sat Nov 04 2023 22:5', 'I just watched this movie last week it was okay. '),
(6, 7, 'Scaramouche: The Wanderer\'s Journey', 3, 'kimlu', 5, 'Sat Nov 04 2023 22:5', 'i love the movie. it made me cry the ending was so nice and the lesson it gave me just WOW'),
(7, 4, 'Nanny McPhee', 3, 'kimlu', 4, 'Sat Nov 04 2023 22:5', 'only little people my age know this movie but this is GOLDEN'),
(8, 3, 'Black Clover: Sword of the Wizard King', 3, 'kimlu', 4, 'Sat Nov 04 2023 22:5', 'tbh the movie lacks a lot but but but the next arc ! immm so excitedd give us the next season after this moviee'),
(9, 5, 'Black Clover: Sword of the Wizard King', 3, 'kimlu', 4, 'Sat Nov 04 2023 22:5', 'the movie was okay since its Park Shin hye and ZOMBIESS'),
(10, 1, 'Maquia: When the Promised Flower Blooms', 3, 'kimlu', 5, 'Sat Nov 04 2023 23:0', 'i loveee lovee love this movie. i cried an ocean to this movies so wonderful tho its a very long movie still worth ittt'),
(11, 10, 'Enchanted Moments: A Love That Lasts Forever', 1, 'kimjereen', 5, 'Sat Nov 04 2023 23:5', 'I cant wait to watch this movie. title at cover palang gusto ko an mapanood and story nila. IM A VERY BIG FAN PA OF RYAN LU AAAAaaaaa'),
(12, 10, 'Enchanted Moments: A Love That Lasts Forever', 5, 'Kimichiry', 4, 'Mon Nov 06 2023 13:3', '4 star because of the gravity impacted to the earth XD'),
(13, 9, 'BTS: Yet To Come', 3, 'kimlu', 4, 'Tue Nov 07 2023 16:5', 'Am a BTS fan and i enjoyed this movie so much. feels like I was also in the concert the day it was filmed.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
