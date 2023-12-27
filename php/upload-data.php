<?php
//echo getcwd();
// /home/jazzup1/public_html/client/coca-cola/20231127/php
if($_POST["img"]){
	include('config.php');
	include('general.php');
	//$targetPath = '/home/jazzup1/public_html/client/coca-cola/20231218/uploads/';
	//$targetPath = '/var/app/current/uploads/';
	$filename = bin2hex(openssl_random_pseudo_bytes(8)).substr($_SESSION[$sessionName],0,10).bin2hex(openssl_random_pseudo_bytes(8)).'.png';
	$filename_fc = bin2hex(openssl_random_pseudo_bytes(8)).substr($_SESSION[$sessionName],0,10).bin2hex(openssl_random_pseudo_bytes(8)).'.png';

	$method = 'AES-256-ECB';
	$key = md5($_POST['uid']);
	
	
	$data =  $_POST['img'];
	$data = openssl_decrypt($data, $method, $key, 0);
	$data = substr($data,strpos($data,",")+1);
	$data = base64_decode($data);
	file_put_contents($targetPath.'uploads/'.$filename, $data);

	
	$dataB = $_POST['imgB'];
	$dataB = openssl_decrypt($dataB, $method, $key, 0);
	$dataB = substr($dataB,strpos($dataB,",")+1);
	$dataB = base64_decode($dataB);
	file_put_contents($targetPath.'uploads/'.$filename_fc, $dataB);
	
	
	$userSql = "SELECT `uid`,`pic` FROM `cocacola_cny24_member` where `uid` = '".$_SESSION[$sessionName]."'";
	$userResult = mysqli_query($linkUsers,$userSql);
	$userNumRows = mysqli_num_rows($userResult);


	if($userNumRows > 0){
		while($userRecord = mysqli_fetch_array($userResult)){
			$filename = $userRecord['pic'];
		}
	}else{
		$sql_member = 'INSERT INTO `cocacola_cny24_member` (`uid`, `pic`, `pic_fc`, `costume`,`date_create`) VALUES (\''.$_SESSION[$sessionName].'\', \''.$filename.'\', \''.$filename_fc.'\', \''.$_POST['costume'].'\', \''.date("Y-m-d H:i:s").'\')';
		$memberResult = mysqli_query($linkUsers, $sql_member);
	}


	echo($filename);
}

?>