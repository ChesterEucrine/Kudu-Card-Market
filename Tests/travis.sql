# Create Testuser
#CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
#GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';

# Create DB
CREATE DATABASE IF NOT EXISTS d1965919 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE d1965919;

# Create Table
CREATE TABLE IF NOT EXISTS STUDENT (
  STUDENT_NO varchar(20) NOT NULL,
  PASSWORD text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE STUDENT
  ADD PRIMARY KEY (STUDENT_NO);

# Add Data
INSERT INTO STUDENT(STUDENT_NO,PASSWORD) values('1234','123')

CREATE TABLE `students` (
  `STUDENT_NO` varchar(20) NOT NULL,
  `FNAME` varchar(20) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `PASSWORD` text NOT NULL,
  `EMAIL_ADDRESS` varchar(100) NOT NULL,
  `CONTACT_NO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENT_NO`, `FNAME`, `LNAME`, `PASSWORD`, `EMAIL_ADDRESS`, `CONTACT_NO`) VALUES
('123', 'd', 'd', '123', 'd@gmail.com', '09'),
('1234', 'Davis', 'Moswedi', '$2y$10$H3pKG2VRUU0Jr8mUYVG7Y.EJgn4l9sGHJDHkbH.AUMk04Brj.LMhG', 'davis@gmail.com', '0835160151'),
('12345', 'sd', 'ad', '$2y$10$LeOJFAXDzqFqk.Fsb8U0TuN4.tmSfoTiP1DMIR6SVkaE/nl7SLoh.', 'a@gamul.com', 'er'),
('123456', '12322', '222', '$2y$10$7ks8W1u7oIEkzB2RKwzk3uJpEn4kgSI6QIFM7DK9SYDGVN.ExV7ei', 'dada@gmail.com', '131'),
('1299', '313', '131', '$2y$10$PvTpdD6s0doeHVc8QBCL6OiKIbFE8obQAxb1uSBPgAEC4kqsAbphK', 'dsdwe@gmail.com', 'qeq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENT_NO`),
  ADD UNIQUE KEY `EMAIL_ADDRESS` (`EMAIL_ADDRESS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

