<?php
session_start();
if(session_destroy()){
$_SESSION = [];
header("Location: index.php");
}
?>
