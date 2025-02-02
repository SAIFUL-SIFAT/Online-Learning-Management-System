-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2025 at 02:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `admin_auth_code` varchar(255) DEFAULT NULL,
  `sec_question` varchar(255) DEFAULT NULL,
  `sec_question_ans` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `username`, `password`, `phone`, `profile_photo`, `admin_auth_code`, `sec_question`, `sec_question_ans`) VALUES
(1, 'Admin', '', 'admin@lms.com', 'root', 'root', '1234567890', NULL, 'code123', 'pet_name', 'Fluffy'),
(2, 'Bob', 'Jones', 'bob@example.com', 'bob_admin', 'pass123', '0987654321', NULL, 'code456', 'mother_maiden_name', 'Johnson'),
(3, 'Charlie', 'Brown', 'charlieb@example.com', 'charlie_admin', 'pass123', '1112223333', NULL, 'code789', 'first_car', 'Toyota'),
(4, 'David', 'White', 'davidw@example.com', 'david_admin', 'pass123', '2223334444', NULL, 'code321', 'favorite_teacher', 'Mr. Smith'),
(5, 'Eve', 'Black', 'eveb@example.com', 'eve_admin', 'pass123', '3334445555', NULL, 'code654', 'first_pet', 'Rex'),
(6, 'Frank', 'Green', 'frankg@example.com', 'frank_admin', 'pass123', '4445556666', NULL, 'code987', 'favorite_book', '1984'),
(7, 'Grace', 'Blue', 'graceb@example.com', 'grace_admin', 'pass123', '5556667777', NULL, 'code159', 'hometown', 'Springfield'),
(8, 'Hank', 'Yellow', 'hanky@example.com', 'hank_admin', 'pass123', '6667778888', NULL, 'code753', 'first_school', 'Lincoln High'),
(9, 'Ivy', 'Purple', 'ivyp@example.com', 'ivy_admin', 'pass123', '7778889999', NULL, 'code852', 'dream_job', 'Engineer'),
(10, 'Jack', 'Orange', 'jacko@example.com', 'jack_admin', 'pass123', '8889990000', NULL, 'code963', 'first_bike', 'Honda'),
(11, 'Kate', 'Pink', 'katep@example.com', 'kate_admin', 'pass123', '9990001111', NULL, 'code147', 'favorite_movie', 'Inception'),
(12, 'Leo', 'Gray', 'leog@example.com', 'leo_admin', 'pass123', '0001112222', NULL, 'code258', 'lucky_number', '7'),
(13, 'Mia', 'Cyan', 'miac@example.com', 'mia_admin', 'pass123', '1112223333', NULL, 'code369', 'best_friend', 'Emily'),
(14, 'Nick', 'Magenta', 'nickm@example.com', 'nick_admin', 'pass123', '2223334444', NULL, 'code741', 'favorite_color', 'Blue'),
(15, 'Olivia', 'Silver', 'olivias@example.com', 'olivia_admin', 'pass123', '3334445555', NULL, 'code852', 'favorite_song', 'Imagine'),
(16, 'Paul', 'Gold', 'paulg@example.com', 'paul_admin', 'pass123', '4445556666', NULL, 'code963', 'favorite_sport', 'Soccer'),
(17, 'Quinn', 'Bronze', 'quinnb@example.com', 'quinn_admin', 'pass123', '5556667777', NULL, 'code357', 'childhood_nickname', 'Q'),
(18, 'Rachel', 'Platinum', 'rachelp@example.com', 'rachel_admin', 'pass123', '6667778888', NULL, 'code468', 'favorite_food', 'Pizza'),
(19, 'Steve', 'Titanium', 'stevet@example.com', 'steve_admin', 'pass123', '7778889999', NULL, 'code579', 'favorite_band', 'The Beatles'),
(20, 'Tina', 'Diamond', 'tinad@example.com', 'tina_admin', 'pass123', '8889990000', NULL, 'code680', 'favorite_animal', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `student_id`, `course_id`, `issue_date`) VALUES
(1, 2, 5, '2025-01-15'),
(2, 2, 6, '2025-01-16'),
(3, 3, 7, '2025-01-17'),
(4, 4, 8, '2025-01-18'),
(5, 5, 9, '2025-01-19'),
(6, 6, 10, '2025-01-20'),
(7, 7, 11, '2025-01-21'),
(8, 8, 12, '2025-01-22'),
(9, 9, 13, '2025-01-23'),
(10, 10, 14, '2025-01-24'),
(11, 11, 15, '2025-01-25'),
(12, 12, 5, '2025-01-26'),
(13, 13, 6, '2025-01-27'),
(14, 14, 7, '2025-01-28'),
(15, 15, 8, '2025-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `instructor_id`, `title`, `description`) VALUES
(1, 13, 'Introduction to Programming', 'Learn the basics of programming using Python.'),
(2, 19, 'Linear Algebra', 'Fundamental concepts in matrix operations and vector spaces.'),
(3, 11, 'Database Systems', 'Learn the principles of relational databases and SQL.'),
(4, 13, 'Operating Systems', 'Understanding the fundamentals of operating systems and file systems.'),
(5, 19, 'Math II', 'Differential Calculus'),
(6, 19, 'Math III', 'Integral Calculus'),
(7, 19, 'Web Technologies', 'Learn vanilla PHP, JavaScript, HTML, CSS, and other related tools and techniques.'),
(8, 13, 'Computer Networks', 'Learn basics of networking, TCP/IP, and more.'),
(9, 14, 'Artificial Intelligence', 'Study algorithms and techniques for creating intelligent systems.'),
(10, 15, 'Digital Electronics', 'Introduction to digital logic design and circuits.'),
(11, 16, 'Data Structures and Algorithms', 'Learn about data structures and algorithms for efficient problem-solving.'),
(12, 17, 'Machine Learning', 'Foundations of machine learning and statistical modeling.'),
(13, 18, 'Advanced Python Programming', 'Deep dive into Python programming for real-world applications.'),
(14, 16, 'Computer Graphics', 'Learn 2D and 3D graphics programming with OpenGL.'),
(15, 19, 'Software Engineering', 'Learn the principles of software development lifecycle, methodologies, and best practices.');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `percentage` decimal(5,2) NOT NULL CHECK (`percentage` >= 0 and `percentage` <= 100),
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `qualifications` text NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `teaching_experience` int(11) DEFAULT NULL,
  `institution` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `full_name`, `email`, `pass`, `phone`, `qualifications`, `expertise`, `profile_picture`, `teaching_experience`, `institution`, `status`) VALUES
(11, 'Alice Johnson', 'alice.johnson@example.com', 'pass123', '1234567890', 'PhD in Computer Science', 'Artificial Intelligence', NULL, 10, 'MIT', 0),
(12, 'Bob Smith', 'bob.smith@example.com', 'pass123', '2345678901', 'MSc in Mathematics', 'Statistics', NULL, 8, 'Harvard', 0),
(13, 'Charlie Brown', 'charlie.brown@example.com', 'pass123', '3456789012', 'MSc in Physics', 'Quantum Computing', NULL, 6, 'Stanford', 0),
(14, 'David White', 'david.white@example.com', 'pass123', '4567890123', 'PhD in Data Science', 'Big Data Analytics', NULL, 9, 'Oxford', 0),
(15, 'Emma Green', 'emma.green@example.com', 'pass123', '5678901234', 'MSc in Information Systems', 'Cybersecurity', NULL, 7, 'Cambridge', 0),
(16, 'Frank Martin', 'frank.martin@example.com', 'pass123', '6789012345', 'MSc in Machine Learning', 'Deep Learning', NULL, 5, 'Berkeley', 0),
(17, 'Grace Lee', 'grace.lee@example.com', 'pass123', '7890123456', 'PhD in Software Engineering', 'Cloud Computing', NULL, 12, 'Carnegie Mellon', 0),
(18, 'Henry Clark', 'henry.clark@example.com', 'pass123', '8901234567', 'MSc in Electrical Engineering', 'Embedded Systems', NULL, 4, 'Yale', 0),
(19, 'Isabel Adams', 'isabel.adams@example.com', 'pass123', '9012345678', 'MSc in Bioinformatics', 'Genetic Algorithms', NULL, 6, 'Princeton', 0),
(20, 'Jack Taylor', 'jack.taylor@example.com', 'pass123', '0123456789', 'PhD in Robotics', 'Autonomous Systems', NULL, 10, 'Caltech', 0),
(21, 'Karen Harris', 'karen.harris@example.com', 'pass123', '1234509876', 'MSc in Human-Computer Interaction', 'UX Design', NULL, 8, 'UCLA', 0),
(22, 'Leo Wilson', 'leo.wilson@example.com', 'pass123', '2345609875', 'PhD in Computational Neuroscience', 'Neural Networks', NULL, 9, 'NYU', 0),
(23, 'Mia Carter', 'mia.carter@example.com', 'pass123', '3456709874', 'MSc in Cloud Computing', 'AWS, Azure', NULL, 7, 'University of Toronto', 0),
(24, 'Noah Scott', 'noah.scott@example.com', 'pass123', '4567809873', 'PhD in Computer Vision', 'Image Processing', NULL, 10, 'ETH Zurich', 0),
(25, 'Olivia King', 'olivia.king@example.com', 'pass123', '5678909872', 'MSc in Natural Language Processing', 'AI Chatbots', NULL, 6, 'University of Edinburgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `moderator_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `work_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`moderator_id`, `full_name`, `email`, `username`, `password`, `phone_number`, `department`, `role`, `manager`, `work_location`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com', 'alicej', 'modpass1', '1234567890', 'Computer Science', 'Lead Moderator', 'Dr. Smith', 'New York'),
(2, 'Bob Williams', 'bob.williams@example.com', 'bobw', 'modpass2', '2345678901', 'Mathematics', 'Assistant Moderator', 'Dr. Adams', 'Los Angeles'),
(3, 'Charlie Brown', 'charlie.brown@example.com', 'charlieb', 'modpass3', '3456789012', 'Physics', 'Moderator', 'Dr. Lee', 'Chicago'),
(4, 'David Miller', 'david.miller@example.com', 'davidm', 'modpass4', '4567890123', 'Biology', 'Senior Moderator', 'Dr. Green', 'Houston'),
(5, 'Emma Davis', 'emma.davis@example.com', 'emmad', 'modpass5', '5678901234', 'Chemistry', 'Moderator', 'Dr. White', 'Phoenix'),
(6, 'Frank Wilson', 'frank.wilson@example.com', 'frankw', 'modpass6', '6789012345', 'Computer Science', 'Assistant Moderator', 'Dr. Black', 'San Diego'),
(7, 'Grace Moore', 'grace.moore@example.com', 'gracem', 'modpass7', '7890123456', 'Engineering', 'Lead Moderator', 'Dr. Scott', 'San Francisco'),
(8, 'Henry Taylor', 'henry.taylor@example.com', 'henryt', 'modpass8', '8901234567', 'Statistics', 'Moderator', 'Dr. King', 'Miami'),
(9, 'Isabella Harris', 'isabella.harris@example.com', 'isabellah', 'modpass9', '9012345678', 'Economics', 'Senior Moderator', 'Dr. Thomas', 'Atlanta'),
(10, 'Jack Clark', 'jack.clark@example.com', 'jackc', 'modpass10', '0123456789', 'Sociology', 'Moderator', 'Dr. Nelson', 'Boston'),
(11, 'Katherine Lewis', 'katherine.lewis@example.com', 'katherinel', 'modpass11', '1234509876', 'Psychology', 'Assistant Moderator', 'Dr. Carter', 'Seattle'),
(12, 'Liam Walker', 'liam.walker@example.com', 'liamw', 'modpass12', '2345609875', 'Philosophy', 'Moderator', 'Dr. Murphy', 'Denver'),
(13, 'Mia Allen', 'mia.allen@example.com', 'miaa', 'modpass13', '3456709874', 'Political Science', 'Lead Moderator', 'Dr. Rogers', 'Philadelphia'),
(14, 'Nathan Young', 'nathan.young@example.com', 'nathany', 'modpass14', '4567809873', 'History', 'Senior Moderator', 'Dr. Perez', 'Dallas'),
(15, 'Olivia Hall', 'olivia.hall@example.com', 'oliviah', 'modpass15', '5678909872', 'Geology', 'Moderator', 'Dr. Edwards', 'Washington DC');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `message`, `type`, `created_at`) VALUES
(1, 'Reminder: Your course registration deadline is tomorrow!', 'student', '2025-02-02 02:00:00'),
(2, 'New updates are available for the course \"Web Technologies\".', 'system', '2025-02-02 03:00:00'),
(3, 'The system will undergo maintenance tonight from 10 PM to 12 AM.', 'system', '2025-02-01 10:45:00'),
(4, 'Your enrollment in \"Math II\" has been confirmed!', 'student', '2025-02-02 04:00:00'),
(5, 'Discount available for \"Web Technologies\" course. Use code WEB10 for 10% off.', 'system', '2025-02-02 05:00:00'),
(6, 'Your profile photo has been successfully updated.', 'student', '2025-02-02 06:00:00'),
(7, 'Important: New event \"Career Fair\" added on February 5th. Don’t miss it!', 'student', '2025-02-02 07:00:00'),
(8, 'Your password was successfully changed.', 'student', '2025-02-02 08:00:00'),
(9, 'New course \"Advanced Machine Learning\" has been launched. Enroll now!', 'system', '2025-02-02 09:00:00'),
(10, 'The \"Computer Networks\" course has new materials uploaded.', 'system', '2025-02-02 10:00:00'),
(11, 'Your certificate for \"Math III\" has been issued.', 'student', '2025-02-02 11:00:00'),
(12, 'Reminder: Your course \"Web Technologies\" starts on February 3rd.', 'student', '2025-02-02 12:00:00'),
(13, 'There is a new announcement in the \"Data Science\" course forum.', 'student', '2025-02-02 13:00:00'),
(14, 'Your course enrollment in \"Computer Networks\" has been canceled.', 'system', '2025-02-02 14:00:00'),
(15, 'Congratulations! You have been promoted to Senior Moderator.', 'system', '2025-02-02 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `preferred_language` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `full_name`, `last_name`, `email`, `username`, `password`, `phone`, `dob`, `country`, `preferred_language`, `profile_picture`) VALUES
(2, 'Michael', 'Brown', 'michael.brown@example.com', 'michaelb', 'pass123', '1234567890', '2001-05-14', 'USA', 'EN', NULL),
(3, 'Sophia', 'Davis', 'sophia.davis@example.com', 'sophiad', 'pass123', '2345678901', '2002-08-21', 'Canada', 'FR', NULL),
(4, 'Liam', 'Wilson', 'liam.wilson@example.com', 'liamw', 'pass123', '3456789012', '2000-12-30', 'UK', 'EN', NULL),
(5, 'Emma', 'Martinez', 'emma.martinez@example.com', 'emmanm', 'pass123', '4567890123', '2001-07-19', 'Spain', 'ES', NULL),
(6, 'Noah', 'Anderson', 'noah.anderson@example.com', 'noaha', 'pass123', '5678901234', '1999-11-25', 'Australia', 'EN', NULL),
(7, 'Olivia', 'Thomas', 'olivia.thomas@example.com', 'oliviat', 'pass123', '6789012345', '2003-04-10', 'Germany', 'DE', NULL),
(8, 'William', 'Moore', 'william.moore@example.com', 'williamm', 'pass123', '7890123456', '2000-09-05', 'France', 'FR', NULL),
(9, 'Ava', 'Taylor', 'ava.taylor@example.com', 'avat', 'pass123', '8901234567', '2002-02-14', 'Italy', 'IT', NULL),
(10, 'James', 'Harris', 'james.harris@example.com', 'jamesh', 'pass123', '9012345678', '2001-06-20', 'Netherlands', 'NL', NULL),
(11, 'Isabella', 'Clark', 'isabella.clark@example.com', 'isabellac', 'pass123', '0123456789', '1998-10-01', 'Brazil', 'PT', NULL),
(12, 'Benjamin', 'Lewis', 'benjamin.lewis@example.com', 'benjaminl', 'pass123', '1234509876', '1997-03-15', 'Mexico', 'ES', NULL),
(13, 'Mia', 'Walker', 'mia.walker@example.com', 'miaw', 'pass123', '2345609875', '2004-12-11', 'Sweden', 'SV', NULL),
(14, 'Alexander', 'Allen', 'alexander.allen@example.com', 'alexandera', 'pass123', '3456709874', '2003-01-29', 'Norway', 'NO', NULL),
(15, 'Charlotte', 'Young', 'charlotte.young@example.com', 'charlottey', 'pass123', '4567809873', '1999-07-07', 'India', 'HI', NULL),
(16, 'Daniel', 'Hall', 'daniel.hall@example.com', 'danielh', 'pass123', '5678909872', '2002-05-03', 'Japan', 'JA', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `moderator_id` (`moderator_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `moderator_id` (`moderator_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`moderator_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `moderator`
--
ALTER TABLE `moderator`
  MODIFY `moderator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`moderator_id`) REFERENCES `moderator` (`moderator_id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`moderator_id`) REFERENCES `moderator` (`moderator_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
