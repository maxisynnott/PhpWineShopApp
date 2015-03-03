CREATE TABLE IF NOT EXISTS `wines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wine` varchar(50) NOT NULL,
  `description` varchar(32) NOT NULL,
  `type` varchar(10) DEFAULT 'wine',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `wine`, `description`, `type`) VALUES
(1, 'wine1', 'this is a wine', 'red'),
(2, 'wine2', 'this is a wine', 'red'),
(3, 'wine3', 'this is a wine', 'red');
