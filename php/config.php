<?php

if($_SERVER["HTTP_HOST"] == 'cny24.cokeplus.hk'){
	$linkUsers = mysqli_connect("db-017503-dev.cu9gpdfxfhhn.ap-southeast-1.rds.amazonaws.com","dbadmin","PLYnQoiTJtsOJJ3q","cocacola_cny24");
}else{
	$linkUsers = mysqli_connect("localhost","jazzup1","ffjd*dN4","jazzup102");
}
//db-017503-prod.cu9gpdfxfhhn.ap-southeast-1.rds.amazonaws.com qT4088L9vCjpYIWP
mysqli_set_charset($linkUsers,"utf8");

if (!$linkUsers) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
	
}

?>