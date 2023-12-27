<?php 
include('../php/Mobile_Detect.php');
$detect = new Mobile_Detect;
$isSessionNeeded = 1;

include('../php/general.php');
include('../php/global.php');

//echo(urlencode($_GET['id']));
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

<link rel="stylesheet" type="text/css" href="../css/main.css?v=3" >
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
<script type="text/javascript" src="../js/main.js?v=13"></script>
<title>【可口可樂®「知咩料」最夾盆菜】- 製作新盆菜</title>
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
	
<div class="page-container create">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="page-title-container txt-cjngai txt-gold txt-large">製作新盆菜</div>
		<div class="create-kv-container">
			<div class="create-kv-container-inner">
				<div class="create-kv-bottom"></div>
				<div class="create-kv-top"></div>
			</div>
		</div>
		<div class="general-input-field with-bg">
			<div class="general-input-field-inner txt-gold"><input type="text" class="txt-cjngai" placeholder="輸入你的家庭盆菜名稱" id="input-room-name" maxlength="11" /></div>
		</div>	
		<button class="general-button next "><div><div class="txt-cjngai txt-button txt-red">繼續</div><div class="txt-cjngai txt-button">繼續</div></div></button>
		
		<label class="checkbox-container txt-mini txt-cjngai">
			<input id="checkbox" type="checkbox">
			<span>*必須同意可口可樂<sup>®</sup>有關<a href="../tnc/" target="_blank">條款及細則</a>。</span>
		</label>
	</div>
</div>
	
<div class="cover-container"></div>	
	
<?php include('../php/menu.php'); ?>
	
</div>
<div class="overlay-container invalid-text">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">未能使用該名稱，<br/>請重新輸入。</div>
			</div>
			<div class="txt-cjngai txt-body error-txt">*你所輸入的字元含有敏感或不當用語</div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>
<div class="overlay-container long-text">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">未能使用該名稱，<br/>請重新輸入。</div>
			</div>
			<div class="txt-cjngai txt-body error-txt">*盆菜名稱必需為十個字或以下</div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>	
<div class="overlay-container invalid-tnc">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">請同意有關條款及細則。</div>
			</div>
			<div class="txt-cjngai txt-body error-txt"></div>
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
	