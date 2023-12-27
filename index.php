<?php 
$isSessionNeeded = 0;
include('php/Mobile_Detect.php');
$detect = new Mobile_Detect;
include('php/general.php');


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

<link rel="stylesheet" type="text/css" href="css/main.css?v=2" >
<link rel="stylesheet" type="text/css" href="css/fonts.css" >
	
<!-- Apple Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple/144x144.jpg">

<meta name="keywords" content="可口可樂,盆菜">
<meta name="description" content="今個龍年想一家人連更近❤️？快啲撳入嚟COKE+「夾」下口味，仲有機會得到屬於你屋企嘅「知咩料」最夾盆菜同埋可口可樂®賀年獎賞！">
<meta name="author" content="可口可樂®">

<meta property="og:title" content="【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！" /> 
<meta property="og:site_name" content="【可口可樂®「知咩料」最夾盆菜】" />
<meta property="og:url" content="<?php echo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>" />
<meta property="og:image" content="<?php echo($og); ?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="今個龍年想一家人連更近❤️？快啲撳入嚟COKE+「夾」下口味，仲有機會得到屬於你屋企嘅「知咩料」最夾盆菜同埋可口可樂®賀年獎賞！" />

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="js/hammer.min.js"></script>
<script type="text/javascript" src="js/device.js"></script>
<script type="text/javascript" src="js/qr.js"></script>
<script type="text/javascript" src="js/main.js?v=13"></script>
<title>【可口可樂®「知咩料」最夾盆菜】</title>
</head> 
<?php if($isDesktop == 0){ ?>
<?php include('php/desktop.php'); ?>
<?php }else{ ?>	
<body onResize="resizeH()" onload="checkLoaderH()">	
<div class="all-container">
<div class="header-container">
	<a href="https://www.swirecocacolahk.com/" target="_blank"><div class="logo-container"></div></a>
	<div class="menu-icon-container">
		<div></div><div></div><div></div>
	</div>
</div>	
	
<div class="page-container home">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="bubble-tagline-container">
			<img src="img/bubble-gold-filled.svg" alt="可口可樂" width="100%" height="auto" />
			<div class="txt-cjngai txt-red txt-big">可口可樂<sup>®</sup></div>
		</div>
		<div class="bubble-tagline-container">
			<img src="img/bubble-gold.svg" alt="知咩料最夾盆菜" width="100%" height="auto" />
			<div class="txt-cjngai txt-gold txt-huge">知咩料最夾盆菜</div>
		</div>
		<div class="home-prizes-container txt-cjngai txt-gold ">
			<div class="home-prize-container"><div><div class="txt-huge">龍年<br/>限定</div><div class="txt-huge">龍年<br/>限定</div></div></div>
			<div class="home-prize-container"><div><div class="txt-title">GULU 盆菜<br/>預約折扣</div><div class="txt-title">GULU 盆菜<br/>預約折扣</div></div></div>
			<div class="home-prize-container"><div><div class="txt-title">商戶<br/>新春優惠</div><div class="txt-title">商戶<br/>新春優惠</div></div></div>
			<div class="clear"></div>
		</div>	
		<div class="intro-container">
			<div class="txt-cjngai txt-gold txt-big">想了解更多屋企人嘅口味？</div>
			<div class="txt-cjngai txt-gold">一齊嚟揀心水食材，<br/>兼隨時免費贏走屬於你屋企嘅盆菜！</div>
		</div>
		
		<div class="recommend-icon txt-cjngai txt-gold">
			<img src="img/icon-recommend.svg"  width="100%" height="auto" alt="建議人數2-6" />
			<div class="txt-mini">建議人數</div>
			<div class="txt-title">2-6</div>
		</div>	
	</div>
</div>
	
<div class="cover-container"></div>	
<div class="cover-container bottom home"></div>
<!--	
TBC
//http://test.cokeplus.hk/register?redirect=https%3A%2F%2Fcny24.cokeplus.hk%2Fcreate%3Frid%3DroomId	
-->	
<div class="fix-button-container multi home">	
	<?php if($_SERVER["HTTP_HOST"] == 'cny24.cokeplus.hk'){ ?>
	<?php if(isset($_SESSION[$sessionName])){ ?>
	<a href="/create" target="_self"><button class="general-button create"><div><div class="txt-cjngai txt-button txt-red">開始「夾」盆菜</div><div class="txt-cjngai txt-button">開始「夾」盆菜</div></div></button></a>
	<?php }else{ ?>
	<a href="<?php echo($createURL.'create%2F%3Fact%3Dcreate'); ?>" target="_self"><button class="general-button create"><div><div class="txt-cjngai txt-button txt-red">開始「夾」盆菜</div><div class="txt-cjngai txt-button">開始「夾」盆菜</div></div></button></a>
	<?php } ?>
	<?php }else{ ?>
	<a href="<?php echo($createURL); ?>" target="_self"><button class="general-button create"><div><div class="txt-cjngai txt-button txt-red">開始「夾」盆菜</div><div class="txt-cjngai txt-button">開始「夾」盆菜</div></div></button></a>
	<?php } ?>
	<a href="how/" target="_self"><button class="general-button how last-one"><div><div class="txt-cjngai txt-button txt-red">遊戲玩法</div><div class="txt-cjngai txt-button">遊戲玩法</div></div></button></a>
</div>	
	
<div class="menu-container">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<a href="/" target="_self"><button class="general-button home"><div><div class="txt-cjngai txt-button txt-red">主頁</div><div class="txt-cjngai txt-button">主頁</div></div></button></a>
		<a href="how/" target="_self"><button class="general-button how"><div><div class="txt-cjngai txt-button txt-red">遊戲玩法</div><div class="txt-cjngai txt-button">遊戲玩法</div></div></button></a>
		<a href="tnc/" target="_self"><button class="general-button tnc"><div><div class="txt-cjngai txt-button txt-red">條款及細則</div><div class="txt-cjngai txt-button">條款及細則</div></div></button></a>
		<?php if(isset($_SESSION[$sessionName])){ ?>
		<a href="/?logout=true" target="_self"><button class="general-button logout"><div><div class="txt-cjngai txt-button txt-red">登出</div><div class="txt-cjngai txt-button">登出</div></div></button></a>
		<?php } ?>
	</div>
</div>	
	
</div>

	
	
</body>
<?php } ?>		
</html>
	