CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `authorize` int(10) NOT NULL,
  `f_name` varchar(40) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `med_id` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`admin_id`, `authorize`, `f_name`, `l_name`, `med_id`, `email`, `pass`) VALUES
(1, 512, 'Connor', 'White', '111', 'clwhite2205@muleriders.saumag.edu', 'internet');

CREATE TABLE `images` (
  `user_id` int(10) NOT NULL DEFAULT 0,
  `img_name` varchar(255) DEFAULT 'N/A',
  `img_data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `lab_confirm` (
  `p_name` varchar(20) NOT NULL,
  `iflab` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lab_confirm` (`p_name`, `iflab`) VALUES
('Harry', 0),
('Henry', 0),
('Kimberly', 0),
('Rebecca', 0);

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `f_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `m_initial` varchar(10) NOT NULL,
  `l_name` varchar(60) NOT NULL,
  `age` varchar(50) NOT NULL,
  `height` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `medications` varchar(50) CHARACTER SET latin1 NOT NULL,
  `allergies` varchar(60) CHARACTER SET latin1 NOT NULL,
  `conditions` varchar(60) CHARACTER SET latin1 NOT NULL,
  `signed_waiver` tinyint(1) NOT NULL,
  `provider_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `patients` (`patient_id`, `f_name`, `m_initial`, `l_name`, `age`, `height`, `gender`, `medications`, `allergies`, `conditions`, `signed_waiver`, `provider_id`) VALUES
(20, 'Henry', 'V', 'Douglass', '24', 'Six Feet', 'Male', 'N/A', 'N/A', '4', 1, 1805),
(23, 'Harry', 'J', 'Watson', '85', '5 foot 3 in', 'Male', 'N/A', 'Peanut Butter', 'Anemia', 1, 1109),
(0, 'Rebecca', 'H', 'Rappaport', '24', 'Six Feet', 'Male', 'N/A', 'N/A', 'N/A', 1, 1109),
(22, 'Kimberly', 'A', 'Watson', '46', '6 foot 4 in', 'Female', 'N/A', 'N/A', 'N/A', 1, 1109);

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `med_id` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `med_id`, `email`, `pass`) VALUES
(1805, 'Jane', 'Carson', 'd404559f602eab6fd602ac7680dacbfaadd13630', 'jane@gmail.com', 'da74bdea95272ef5c013e01123746d1268bd63a5908f0ab76f7ccb5653c6a12b9ece70131bb5a61a07d80062a2a31b4c922a4d31fd8b53777737dec4c438ed2e'),
(1109, 'John', 'Legend', '3c9909afec25354d551dae21590bb26e38d53f21', 'john@gmail.com', '082f30e40b2b35c37ce0071950cd845e00c3c1bbc8d2051170e67cdc42288281cb08f0ee346f2c6ff8d7eeb0b825381f5878ab1608799c4d65eef25c273c593a');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

ALTER TABLE `images`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `img_name` (`img_name`);

ALTER TABLE `lab_confirm`
  ADD UNIQUE KEY `p_name` (`p_name`);

ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `f_name` (`f_name`);

ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);


ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1806;

