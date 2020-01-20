create database pri;

use pri;

CREATE TABLE `Users` (
`id` int(11) NOT NULL auto_increment,
`name` varchar(100) NOT NULL,
`password` text NOT NULL,
PRIMARY KEY  (`id`)
);
