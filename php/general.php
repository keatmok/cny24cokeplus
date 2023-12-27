<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
	//header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //exit;
} 

session_start();
$actualURL = "https://" . $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
if(isset($_GET['logout'])){
	$actualURL = str_replace('/?logout=true', '', $actualURL);
}

$targetPath = '/home/jazzup1/public_html/client/coca-cola/20231218/';
$home = "https://" . $_SERVER["HTTP_HOST"] . '/client/coca-cola/20231218'; 
$createURL = $home.'/create/?id='.('vyb28jFBh9JtvFKI79xaFPnZ+r/J0o0AYb+nrdLl7In6JyBpjaskQ5xkb5++7PpCGQI+BXGBEd3quUsZ/ensHmNm5wdw+BXV83Xe/97uYkex8YCqh3p5FnqnEfIpenJZKgPp2GfsTMTa8muJzXzTu6ycFQOFfVJCeiiPxlsTXNM=');

if($_SERVER["HTTP_HOST"] == 'cny24.cokeplus.hk'){
	$targetPath = '/var/app/current/';
	$home = "https://" . $_SERVER["HTTP_HOST"];
	$createURL = 'https://test.cokeplus.hk/register?redirect='.urlencode($actualURL);
}
//$createURL = 'https://test.cokeplus.hk/register?redirect='.urlencode($actualURL);
$sessionName = 'cctestkk';
$og = $home.'/img/og-image.jpg';




$isDesktop = 1;

if(isset($detect)){
	if ($detect->isMobile() ) { //|| $detect->isTablet() 
		$isDesktop = 1;
	}else{
		$isDesktop = 0;
	}
}

date_default_timezone_set('Asia/Hong_Kong');
$usersTimezone = 'Asia/Hong_Kong';

$ip= '-';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
}

if (isset($_SERVER['HTTP_REFERER'])) {
	$ref_url = $_SERVER['HTTP_REFERER'];
}else{
	$ref_url = '-';
}


if(isset($_GET['id'])){
	/*$response = explode('.', $_GET['id']); 
	$response = base64_decode($response[1]);
	$response = json_decode($response);
	if(array_key_exists('sub', $response)){
		$_SESSION[$sessionName] = $response->sub;
	}*/
	
	set_include_path($targetPath.'phpseclib/');
	include('../phpseclib/Crypt/RSA.php');

	$rsa = new Crypt_RSA();
	$rsa->loadKey('-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDAikLQcj8jcwxzK65/x234ubJxhtHHw1I6Xky5U3VfKnuM9hsn
7IdSdXlqEoZV3OpLgJRgAlKg9NObYAY0w8uCgiL01OARFNv8gyU6/eTsLyM63Dpg
ywFeaEcSQ0A1fFRH03krzJceNjzKVscdYIKauDj1ogNmxeLsqlTaMPdegQIDAQAB
AoGBAImyF2hlXBwpCi1PfwMpB8/KVgB0r5BScnsFt48OTbFae3NrCi66LGjfVI50
YxgC3phSg0pKPveXP8ItoSKZJ++WZymHGC/IgoCGTkMrGL5wIk9m3XsqV0UFN+fM
TzkwqfYX1jhIuvoTdXDy/h+od1uJV8Af/KiUL/iAyCn9C1wBAkEA7sWijneqvaoE
lVf0acc4xRQN0LC0Ttf0d1wM9dJgZ+iCgGd6D/70jtMrm4rbQHiPHiO4wduNyDFc
kRx5Hh8DoQJBAM5urLVgQxLsdsOJrjJjysxEm6wP5chfAsK4eDH0c8vO0hRWAdwJ
spRK6m1lQ4D6s9QjKHAoaZ75NywqFLJmbuECQGj6f8P/nRQSgj1fFFjFfJI5hPFy
H3RiwlsQH6qcukI1Gdt2o1YRFFkPQyb53/fyiYoIzpx8+VNBUJ+EU0QJAsECQQCA
jvBD7HUZHeZAlEfF3dv4JmoEV8o0ZOclORixk5lhvaWbQIzb6bYrIBSqmDvX4UmI
vXR7lM9iT7YKbRKCn8RBAkBsFW1hn/7ggEUDq2JaZxxZenOo5BeQv8aOV8OW6PRy
B4LuufysvoTRDtvqzUzLByLtN3ZXOkRr4JPR+2upzmT7
-----END RSA PRIVATE KEY-----');

	$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);

	$sample = 'OuLQSYa81mcgft258sH2CII6hZNCwDzCE+vXtSWFAM403awPssThIUq5I2V9P1sS7KjFX+iul9oHvALpcmKl2owiw7tcA6VVmjJ/pH1g1A34fVmUwxreKyGm6pwxfXgRGZ2pBYd7Jgx2nl8nKxD3nglL/vuhzZbbH01ihgvl9OM=';
	
	$sample = $_GET['id'];
	$sample = str_replace( " ", "+", $_GET['id']);
	
	$decoded = $rsa->decrypt(base64_decode($sample));
	//echo($sample);
	//sample = vyb28jFBh9JtvFKI79xaFPnZ+r/J0o0AYb+nrdLl7In6JyBpjaskQ5xkb5++7PpCGQI+BXGBEd3quUsZ/ensHmNm5wdw+BXV83Xe/97uYkex8YCqh3p5FnqnEfIpenJZKgPp2GfsTMTa8muJzXzTu6ycFQOFfVJCeiiPxlsTXNM=
	
	// create/?id=vyb28jFBh9JtvFKI79xaFPnZ%2Br%2FJ0o0AYb%2BnrdLl7In6JyBpjaskQ5xkb5%2B%2B7PpCGQI%2BBXGBEd3quUsZ%2FensHmNm5wdw%2BBXV83Xe%2F97uYkex8YCqh3p5FnqnEfIpenJZKgPp2GfsTMTa8muJzXzTu6ycFQOFfVJCeiiPxlsTXNM%3D
	
	if(strlen($decoded) > 0){
		$_SESSION[$sessionName] = $decoded;//urlencode($_GET['id']);
		// valid id
	}else{
		/*if(session_destroy()){
			$_SESSION = [];
		}*/
		// invalid id
	}
	
	// for testing //b377b87b-07f8-4043-939e-e8a2a18748a1
	//$_SESSION[$sessionName] = urlencode($_GET['id']);
}
if(isset($_GET['logout'])){
	if(session_destroy()){
		$_SESSION[$sessionName] = [];
		$_SESSION[$sessionName] = NULL;
		//$_SESSION = [];
		//header("Location: index.php");
	}
}

if(isset($_SESSION[$sessionName])){	
	if($_SERVER["HTTP_HOST"] == 'cny24.cokeplus.hk'){
		$createURL = $_SERVER["HTTP_HOST"].'/create';
	}else{
		$createURL = $home.'/create';
	}
	//echo($_SESSION[$sessionName]);
}else if($isSessionNeeded == 1){
	/* check if login, NO >> go to coke+ login */
	header("Location: " . $createURL.'%3Fact%3Dcreate', true, 301);
	//echo($createURL);
}
//rid=f3bf844c67ab4ce7vyb28jFBh9Jt008bc9754f510192
?>