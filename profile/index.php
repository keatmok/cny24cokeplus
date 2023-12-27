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

if($_SESSION[$sessionName]){
	if($isRoom[0] == 0){
		header("Location: " . $home.'/create', true, 301);
	}else{
		if($isRoom[1] > 0 ){
			header("Location: " . $home.'/room/?rid='.$_GET['rid'], true, 301);
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
<script type="text/javascript" src="../js/crypt.js"></script>	
<script type="text/javascript" src="../js/qr.js"></script>	
<script type="text/javascript" src="../js/main.js?v=13"></script>

<?php if($isRoom[0] == 1){ ?><script>roomID = "<?php echo($_GET['rid']); ?>";</script><?php } ?>	
<title>【可口可樂®「知咩料」最夾盆菜】- 創建你的角色</title>
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
	
<div class="page-container profile">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="page-title-container txt-cjngai txt-gold txt-large" style="margin-bottom:0">創建你的角色</div>
		<div class="costume-preview-container" id="drag-container">
			<div class="ruler-container"><div class="ruler-container-inner"></div></div>
			
			<div class="slideshow-container hammer-head" id="hammer-upper">
                <div class="slideshow-container-inner">
                    <div class="slideshow-ele active" nickname="Costume A"></div>
                    <div class="slideshow-ele" nickname="Costume B"></div>
                    <div class="slideshow-ele" nickname="Costume C"></div>
                    <div class="slideshow-ele" nickname="Costume D"></div>
                    <div class="slideshow-ele" nickname="Costume E"></div>
					<div class="slideshow-ele" nickname="Costume F"></div>
                    <div class="slideshow-ele" nickname="Costume G"></div>
                    <div class="slideshow-ele" nickname="Costume H"></div>
                    <div class="slideshow-ele" nickname="Costume I"></div>
					<div class="slideshow-ele" nickname="Costume J"></div>
                    <div class="slideshow-ele" nickname="Costume K"></div>
                    <div class="slideshow-ele" nickname="Costume L"></div>
                    <div class="slideshow-ele" nickname="Costume M"></div>
					<div class="slideshow-ele" nickname="Costume N"></div>
                    <div class="slideshow-ele" nickname="Costume O"></div>
                    <div class="slideshow-ele" nickname="Costume P"></div>
                    <div class="slideshow-ele" nickname="Costume Q"></div>
					<div class="slideshow-ele" nickname="Costume R"></div>
                    <div class="slideshow-ele" nickname="Costume S"></div>
                    <div class="slideshow-ele" nickname="Costume T"></div>
                </div>
				<button class="arrow prev"><div></div></button><button class="arrow next"><div></div></button>
            </div>
			<div class="profile-picture-container">
				<div class="profile-picture-container-inner">
					<div><canvas id="canvas-upload"></canvas></div>
				</div>
			</div>
		</div>
		
		<div class="upload-button-container">
			<div><div class="txt-cjngai txt-button txt-red">上載頭像</div><div class="txt-cjngai txt-button">上載頭像</div></div>
			<button><!--<img src="img/label-upload.svg" width="60%" height="auto" alt="上載你的照片" />--></button>
			<input accept="image/*" type="file" id="input-image" capture />
		</div>			
		
		<div class="options-container" current="0" id="hammer-accessories">
            <div class="options-container-inner">
                <div class="options-container-cycle">
                    <div class="option-container-ele fake"></div>
                    <div class="option-container-ele fake"></div>
                    <div class="option-container-ele active"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
					<div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
					<div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
					<div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
					<div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele"></div>
                    <div class="option-container-ele fake"></div>
                    <div class="option-container-ele fake"></div>
                </div>
            </div>
            <button class="arrow prev"><div></div></button><button class="arrow next"><div></div></button>
        </div>
		<div class="options-label-container">
			<div class="active"></div><div></div><div></div><div></div><div></div>
			<div></div><div></div><div></div><div></div><div></div>
			<div></div><div></div><div></div><div></div><div></div>
			<div></div><div></div><div></div><div></div><div></div>
		</div>
		<div class="label-char-container txt-cjngai txt-gold">請選擇你的角色造型</div>
		<!--<div class="page-container-inner-inner">
			<button class="general-button avatar last-one"><div></div></button>
		</div>-->	
	</div>
</div>
	
<div class="cover-container"></div>	
<div class="cover-container bottom"></div>
	
<div class="fix-button-container home">	
	<button class="general-button avatar last-one"><div><div class="txt-cjngai txt-button txt-red">繼續</div><div class="txt-cjngai txt-button">繼續</div></div></button>
</div>			
<?php include('../php/menu.php'); ?>	
	
</div>
<div class="overlay-container invalid-image">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">未能使用該照片，<br/>請重新上載。</div>
			</div>
			<div class="txt-cjngai txt-body txt-bold error-txt"></div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>
	
<div class="overlay-container loader ">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">上載中，請稍候。</div>
			</div>
		</div>	
	</div>	
</div>	
	
<canvas id="canvas-temp-char" width="1000" height="1350"></canvas>
<canvas id="canvas-temp-char-fc" width="1000" height="1350"></canvas>
</body>
<?php } ?>		
</html>
	