<?php 
include('../php/Mobile_Detect.php');
$detect = new Mobile_Detect;
$isSessionNeeded = 1;

include('../php/general.php');
include('../php/global.php');

$isRoom = array(0,0,0,0);
if(isset($_GET['rid'])){
	$isRoom = checkRoomExistH($_GET['rid']);
}
if(isset($_SESSION[$sessionName])){	
if($isRoom[0] == 0){
	header("Location: " . $home.'create', true, 301);
}else{
	if($isRoom[1] == 0 ){
		header("Location: " . $home.'profile/?rid='.$_GET['rid'], true, 301);
	}else{
		
		if($isRoom[2] == 1){ // member
			
			include('../php/config.php');
			$pic = '';
			$picSql = "SELECT `token`,`pic` FROM `cocacola_cny24_room` where `token` = '".$_GET['rid']."'";
			$picResult = mysqli_query($linkUsers,$picSql);
			while($picRecord = mysqli_fetch_array($picResult)){  $pic = $picRecord['pic']; }
		}else{ // non member
			header("Location: " . $home, true, 301); 
		}
	}
}
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9C89RX7JFJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9C89RX7JFJ');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" >

<link rel="stylesheet" type="text/css" href="../css/main.css?v=2" >
<link rel="stylesheet" type="text/css" href="../css/fonts.css" >
	
<!-- Apple Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/apple/144x144.jpg">
<meta name="keywords" content="可口可樂,盆菜">
<meta name="description" content="今個龍年想一家人連更近❤️？快啲撳入嚟COKE+「夾」下口味，仲有機會得到屬於你屋企嘅「知咩料」最夾盆菜同埋可口可樂®賀年獎賞！">
<meta name="author" content="可口可樂®">

<meta property="og:title" content="【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！" /> 
<meta property="og:site_name" content="【可口可樂®「知咩料」最夾盆菜】" />
<meta property="og:url" content="<?php echo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>" />
<meta property="og:image" content="<?php echo($og); ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="今個龍年想一家人連更近❤️？快啲撳入嚟COKE+「夾」下口味，仲有機會得到屬於你屋企嘅「知咩料」最夾盆菜同埋可口可樂®賀年獎賞！" />

<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="../js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="../js/hammer.min.js"></script>
<script type="text/javascript" src="../js/device.js"></script>		
<script type="text/javascript" src="../js/qr.js"></script>	
<script type="text/javascript" src="../js/main.js?v=11"></script>
<?php if($isRoom[0] == 1){ ?><script>roomID = "<?php echo($_GET['rid']); ?>"; pname = "<?php echo($isRoom[6]); ?>"; ppic = "<?php echo($pic);?>"; </script><?php } ?>	
<?php if($isRoom[2] == 1 && $isRoom[3] >= 6){?><script>shareTxt = '【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！我地已經完成盆菜！'</script><?php }?>	
<title>【可口可樂®「知咩料」最夾盆菜】- 分享</title>
</head>
<?php if($isDesktop == 0){ ?>
<?php include('../php/desktop.php'); ?>
<?php }else{ ?>	
<body onResize="resizeH()" onload="checkLoaderH()">	
<div class="all-container">
<div class="header-container">
	<a href="https://www.swirecocacolahk.com/" target="_blank"><div class="logo-container"></div></a>
	<div class="menu-icon-container">
		<div></div><div></div><div></div>
	</div>
</div>	
	
	
<div class="page-container share">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="shareB"> 
			<div class="txt-cjngai txt-gold txt-huge" style="line-height:1.2">分享至社交媒體及<br/>贏取賀年禮品</div>
			<div><img src="<?php echo($og); ?>" width="100%" height="auto" /></div>
			<button class="general-button share visual"><div><div class="txt-cjngai txt-button txt-red">分享盆菜成果</div><div class="txt-cjngai txt-button">分享盆菜成果</div></div></button>
			<button class="general-button share"><div><div class="txt-cjngai txt-button txt-red">邀請屋企人一齊玩</div><div class="txt-cjngai txt-button">邀請屋企人一齊玩</div></div></button>
			<button class="general-button copy"><div><div class="txt-cjngai txt-button txt-red">複製連結</div><div class="txt-cjngai txt-button">複製連結</div></div></button>
		</div>	
		
		<div style="margin:1em auto .5em auto"><img src="../img/icon-gift.svg" width="33%" height="auto" alt="領取新春優惠" /></div>
		<a href="../rewards/?rid=<?php echo($_GET['rid']); ?>" target="_self"<button class="general-button rewards last-one"><div><div class="txt-cjngai txt-button txt-red">領取新春優惠</div><div class="txt-cjngai txt-button">領取新春優惠</div></div></button></a>
	</div>
</div>	
	
	
<div class="cover-container"></div>
		
<?php include('../php/menu.php'); ?>
</div>
	
<div class="overlay-container copied">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">已成功複制連結</div>
			</div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>	
<div class="overlay-container loader">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">上載中，請稍候。</div>
			</div>
		</div>	
	</div>	
</div>
	
	
</body>
<?php } ?>		
</html>
	