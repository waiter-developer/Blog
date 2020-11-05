-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2020 at 06:14 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_article`
--

CREATE TABLE `blog_article` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_article`
--

INSERT INTO `blog_article` (`id`, `user_id`, `title`, `text`, `image`, `date`) VALUES
(29, 9, 'The second wave', '<p>Covid-19 cases continue to rise in Pakistan. Our country still doesn’t have any proper strategy that can help in case of a medical emergency. We need to identify and implement a proper policy to contain the spread of the virus. Collaborating with other countries can help us learn what worked best for them. Entry without masks must be strictly banned in public spaces.</p><p>Since the country cannot afford another lockdown, increasing the number of daily testing seems a plausible solution to control the rate of transmission. One of the reasons why many people don’t get tested is that they cannot afford to pay for the test which is priced between Rs7,000 and Rs10,000. The authorities have to take relevant steps to bring the price of tests within the affordable range. The media should also play a responsible role and create awareness among the people.</p>', 'uploads/photo-1490823670292-6699d9edbb7d.jpeg', '2020-10-30 01:30:46'),
(30, 9, 'Tax matters', '<p>The Federal Government Employees Housing Authority (FGEHA) is responsible for the management of Islamabad’s G-13 and G-14 sectors. The institution has developed these housing areas. About a month ago, residents received a property tax notice from both the housing authority and the Capital Development Authority (CDA). Both organisations claim that they are the competent authority to receive the tax.</p><p>However, when residents ask the newly established housing authority to show them the government notification that verifies their claim, they evade the question. The result is total confusion. The authorities are requested to clarify this matter</p>', 'uploads/photo-1490823670292-6699d9edbb7d.jpeg', '2020-10-29 23:51:12'),
(31, 9, 'Still deciding whether to return your children to Memphis school buildings? Here are 13 answers to questions you may have.', '<p>It’s hard for public health officials to trace where someone contracted the coronavirus. But what local officials have noticed is that most COVID-19 cases in schools tend to be among athletes and coaches.</p><p>About 135 of the first 500 people infected with COVID-19 in Shelby County since late September, or 27%, were students or staff at schools, said David Sweat, the county’s chief of epidemiology. Of that group, 83% of them were athletes or coaches for basketball, volleyball, soccer, cheerleading, and other sports. Shelby County Schools <a href=\"https://www.commercialappeal.com/story/sports/high-school/2020/09/15/high-school-sports-shelby-county-schools-postpones-fall-sports-until-further-notice/5737966002/\">suspended sports events</a> in September after consulting with health officials, but many private schools and suburban districts did not.</p><p>Sweat said that he can’t rule out that infections spread in classrooms. But he said from looking at survey results from people who have contracted the virus, he sees a stronger correlation between sports and infection among students and staff.</p>', 'uploads/photo-1470122619772-bf3359cc11e9.jpeg', '2020-10-29 23:19:47'),
(32, 9, 'Still deciding whether to return your children to Memphis school buildings? Here are 13 answers to questions you may have.', '<p>Earlier this month, Shelby County Schools <a href=\"https://tn.chalkbeat.org/2020/10/19/21524129/scs-plans-january-return-for-elementary-and-students-with-disabilities\">announced</a> its intent to reopen buildings to students in January starting with elementary grades and students with disabilities. Parents and teachers can select whether to participate or continue remote learning, but they had a lot of questions.</p><p>We’ve gathered as many answers as we could since then. You can click on the links below to jump to a particular question you’re interested in. We’ll update this as we get more information. Have more questions that aren’t answered here? Email us at tn.tips@chalkbeat.org.</p>', 'uploads/photo-1505860125062-3ce932953cf5.jpeg', '2020-10-30 02:50:48'),
(33, 9, 'Good Samaritans pitch in to help Roanoke man', '<p>More than a dozen friends, family, random strangers and volunteer groups, including Franklin County home-schooled students, and local business Roanoke Home Buyers, have been working for the past two weeks to restore Michael Hairfield’s home. On Oct. 8, Danielle Willis of Troutville was shopping at Dollar Tree on Franklin Road in Roanoke when Hairfield, a type 2 diabetic, fainted into her after his blood sugar had dropped. “I said, ‘Someone bring me a chair and some chocolate,’” Willis recalled of that initial meeting. After sitting with him at the store for an hour, Willis asked if she could call a family member to take Hairfield home after he’d refused to go to the hospital. Hairfield told Willis that he was divorced, had no kids and no other family members to help him.</p>', 'uploads/photo-1457530378978-8bac673b8062.jpeg', '2020-10-30 03:57:12'),
(34, 9, 'Drive-thru flu clinic vaccinates 60', '<p>Influenza, also called the flu, is highly contagious and generally spreads from person-to-person when an infected person coughs or sneezes. Typical flu symptoms include fever, dry cough, sore throat, runny or stuffy nose, headache, muscle aches and extreme fatigue. Vaccination is the best way to prevent influenza, Bell said, adding that the health district can set up a flu clinic to vaccinate at area businesses or other organizations.</p><p>For more information, call the West Piedmont Health District, Franklin County office at 484-0292 or visit <a href=\"http://www.vdh.virginia.gov/flu\"><strong>www.vdh.virginia.gov/flu</strong></a>.</p>', 'uploads/photo-1457530378978-8bac673b8062.jpeg', '2020-10-30 03:58:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_article`
--
ALTER TABLE `blog_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_article`
--
ALTER TABLE `blog_article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
