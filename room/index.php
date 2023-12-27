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

		if($isRoom[1] == 0 ){
			header("Location: " . $home.'/profile/?rid='.$_GET['rid'], true, 301);
		}else{

			if($isRoom[3] >= 6){
				if($isRoom[2] == 1){ // member and room fin
					//header("Location: " . $home.'result/?rid='.$_GET['rid'], true, 301);
				}else{ // non member and room fin
					header("Location: " . $home, true, 301); 
				}
			}else{
				if($isRoom[2] == 1){ // member and room open
					header("Location: " . $home.'/result/?rid='.$_GET['rid'], true, 301);
				}else{  // non member and room open
					//print_r($isRoom[4]);
				}
			}
			//echo($isRoom[3]);
			//print_r($isRoom[5]);
		}
	}
}else{
	
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
<script type="text/javascript" src="../js/crypt.js"></script>	
<script type="text/javascript" src="../js/qr.js"></script>	
<script type="text/javascript" src="../js/main.js?v=13"></script>
<?php if($isRoom[0] == 1){ ?><script>roomID = "<?php echo($_GET['rid']); ?>";</script><?php } ?>	
<title>【可口可樂®「知咩料」最夾盆菜】- 選取食材</title>
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
	
<div class="page-container room">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="dishes-container">
			<?php 
			include('../php/config.php');
			$picList = array();
			foreach($isRoom[7] as $key => $value){ 
				$memberSql = "SELECT `uid`,`pic` FROM `cocacola_cny24_member` where `uid` = '".$key."'";
				$memberResult = mysqli_query($linkUsers,$memberSql);
				while($memberRecord = mysqli_fetch_array($memberResult)){ $picList[$key] = $memberRecord['pic']; }
			}
			
			
			for($d=0; $d<20; $d++){ 
				$count = 0;
				foreach ($isRoom[5] as  $key => $value) {
					if ($d == $key ){
						$count = $value;
					}
				}
				if($count == 0){
			?>
			<div class="dish-container">
				<div class="dish-container-inner"></div>
				<div class="dish-label-container"><div></div></div><div class="dish-count-container">0</div>
			</div>
			<?php
				}else{
			?>
			<div class="dish-container">
				<div class="dish-container-inner"></div>
				
				<?php foreach($isRoom[7] as $keyB => $valueB){ ?>
				<?php $tempData = explode(',', $valueB); ?>
				<?php if(in_array($d, $tempData)){ ?>
				<div class="char-container"><div class="char-container-inner" style="background-image:url(../uploads/<?php echo($picList[$keyB]);?>)"></div></div>
				<?php } ?>
				<?php } ?>
				<div class="dish-label-container"><div></div></div><div class="dish-count-container default"><?php echo($count); ?></div>
			</div>
			<?php
				}
			}
			?>
			
		</div>
	</div>
</div>
	
<div class="cover-container"></div>
<div class="cover-container bottom room">
	<div class="txt-cjngai txt-gold txt-mini">*圖片只供參考</div>	
</div>
	
<div class="fix-button-container">
	<div class="room-misc-container txt-cjngai">
		<div class="counter txt-gold"><?php echo($isRoom[3]);?>/6 已選取食材</div>
		<div class="txt-gold txt-mini">*每人限選3款食材</div>
		
		<div class="recommend-icon txt-cjngai txt-gold fixed txt-small">
			<img src="../img/icon-recommend.svg"  width="100%" height="auto" alt="建議人數2-6" />
			<div class="txt-mini">建議人數</div>
			<div class="txt-title">2-6</div>
		</div>
		
	</div>	
	<div class="room-name-container txt-gold txt-cjngai"><?php echo($isRoom[6]);?></div>
	<button class="general-button submit last-one"><div><div class="txt-cjngai txt-button txt-red">「夾」好晒！</div><div class="txt-cjngai txt-button">「夾」好晒！</div></div></button>
</div>	
	
<?php include('../php/menu.php'); ?>	
</div>
	
<div class="overlay-container reconfirm">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">確認遞交？</div>
			</div>
			<div class="txt-small txt-bold error-txt"></div>
			<button class="general-button reconfirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
			<button class="text-button back txt-gold txt-big txt-cjngai">返回</button>
		</div>	
	</div>	
</div>	
<div class="overlay-container invalid-select">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">請選取<br/>至少一款食材</div>
			</div>
			<div class="txt-small txt-bold error-txt"></div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>
<div class="overlay-container max-three">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">每人限選3款食材</div>
			</div>
			<div class="txt-small txt-bold error-txt"></div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>
<div class="overlay-container max-six">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-huge">每個盆菜<br/>最多可選6款食材</div>
			</div>
			<div class="txt-small txt-bold error-txt"></div>
			<button class="general-button confirm"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button>
		</div>	
	</div>	
</div>	
<div class="overlay-container done<?php if($isRoom[3] >= 6 && $isRoom[2] == 1){ echo(' active'); }?>">
	<div class="overlay-container-inner">
		<div class="overlay-box-container">
			<div class="overlay-header-container">
				<img src="../img/icon-alert.svg" width="22%" height="auto" alt="" />
				<div class="txt-cjngai txt-gold txt-big">盆菜已經「夾」好咗喇～<br/>即睇佢哋揀咗咩食材，<br/>了解下大家嘅口味，<br/>仲可以再開多一個新盆菜<br/>分享俾更多人玩！</div>
			</div>
			<div class="txt-small txt-bold error-txt"></div>
			<a href="../result/?rid=<?php echo($_GET['rid']); ?>" target="_self"><button class="general-button confirm disable"><div><div class="txt-cjngai txt-button txt-red">確認</div><div class="txt-cjngai txt-button">確認</div></div></button></a>
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
	