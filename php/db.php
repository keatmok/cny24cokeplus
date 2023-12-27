<?php

$sqlA = 'CREATE TABLE IF NOT EXISTS `cocacola_cny24_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text COLLATE utf8_unicode_ci NOT NULL,
  `pic` text COLLATE utf8_unicode_ci NOT NULL,
  `pic_fc` text COLLATE utf8_unicode_ci NOT NULL,
  `costume` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;';


$sqlB = 'CREATE TABLE IF NOT EXISTS `cocacola_cny24_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `pic` text COLLATE utf8_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8_unicode_ci NOT NULL,
  `members` text COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_finish` datetime DEFAULT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL,
  `agent` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;';


$linkUsers = mysqli_connect("db-017503-test.cu9gpdfxfhhn.ap-southeast-1.rds.amazonaws.com","dbadmin","PLYnQoiTJtsOJJ3q","db-017503-test");
mysqli_set_charset($linkUsers,"utf8");

if (!$linkUsers) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
	
	
	$createResultA = mysqli_query($linkUsers, $sqlA);
	$createResultB = mysqli_query($linkUsers, $sqlB);
} 