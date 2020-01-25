create database pri_2;

use pri_2;

CREATE TABLE `Users` (
`id` int(11) NOT NULL auto_increment,
`name` varchar(100) NOT NULL,
`password` text NOT NULL,
`log` text NOT NULL,
PRIMARY KEY  (`id`)
);
