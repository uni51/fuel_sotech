CREATE TABLE IF NOT EXISTS `posts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`summary` varchar(255) NOT NULL,
	`body` text NOT NULL,
	`created_at` int(11) NOT NULL,
	`updated_at` int(11) NOT NULL,	
	PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;