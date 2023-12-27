<?php
$targetPath = '/home/jazzup1/public_html/client/coca-cola/20231218/';
set_include_path($targetPath.'phpseclib/');
include('../phpseclib/Crypt/RSA.php');

$rsa = new Crypt_RSA();
//$rsa->setPassword('abc123');
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
//$sample = $_GET['id'];
$decoded = $rsa->decrypt(base64_decode($sample ));
echo(($decoded));
if(strlen($decoded) > 0){
	echo('a');
}else{
	echo('b');
}
?>