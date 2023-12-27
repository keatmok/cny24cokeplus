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

<link rel="stylesheet" type="text/css" href="../css/main.css?v=5" >
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
<?php if($isRoom[0] == 1){ ?><script>roomID = "<?php echo($_GET['rid']); ?>"; pname = "<?php echo($isRoom[6]); ?>"; </script><?php } ?>	
<?php if($isRoom[2] == 1 && $isRoom[3] >= 6){?><script>shareTxt = '【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！我地已經完成盆菜！'</script><?php }?>		
<title>【可口可樂®「知咩料」最夾盆菜】- 最夾賀年獎賞</title>
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
	
<div class="page-container rewards">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="page-title-container txt-cjngai txt-gold txt-large">免費贏走可口可樂<sup>®</sup><br/>「知咩料」最夾盆菜！</div>
		<!--<div class="how-title-container grand-prize"><div class="txt-cjngai txt-gold txt-huge">終極獎賞</div></div>-->
		<div class="img-div txt-cjngai txt-gold">
			<div class="txt-big">如果你揀嘅6款食材同193嘅<br/>6款精選食材完全相同，<br/>即有機會贏得<br/>可口可樂<sup>®</sup>「知咩料」最夾盆菜！<br/>數量有限，先到先得。</div>
			<div style="margin-top:.5em">請留意可口可樂<sup>®</sup>社交媒體得獎公布</div>
		</div>
		<div class="home-prizes-container">
			<div class="home-prize-container"></div> 
			<div class="clear"></div>
		</div>
		
		
		<div class="how-title-container promo"><div class="txt-cjngai txt-gold txt-huge">最夾賀年獎賞</div></div> 
		<div class="rewards-container txt-cjngai">
			<a href="#" target="_blank">	
				<div class="reward-container">
				<div><div></div></div>
				<div><div class="txt-red">GULU 預訂<br/>盆菜宴8折優惠</div><div>GULU 預訂<br/>盆菜宴8折優惠</div></div>
				<div class="txt-gold">（100名）</div>
			</div>
			</a>	
			<a href="#" target="_blank">
				<div class="reward-container">
					<div><div></div></div>
					<div><div class="txt-red">PNS網購滋味組合</div><div>PNS網購滋味組合</div></div>
					<div class="txt-gold"></div>
				</div>
			</a>	
			<a href="#" target="_blank">
			<div class="reward-container">
				<div><div></div></div>
				<div><div class="txt-red">Pandamart特選優惠</div><div>Pandamart特選優惠</div></div>
				<div class="txt-gold"></div>
			</div>
			</a>	
			<a href="#" target="_blank">	
			<div class="reward-container">
				<div><div></div></div>
				<div><div class="txt-red">HKTVmall網購優惠</div><div>HKTVmall網購優惠</div></div>
				<div class="txt-gold"></div>
			</div>
			</a>	
			<a href="#" target="_blank">	
			<div class="reward-container">
				<div><div></div></div>
				<div><div class="txt-red">太古eShop網店優惠</div><div>太古eShop網店優惠</div></div>
				<div class="txt-gold"></div>
			</div>
			</a>	
		</div>
		
		<div class="how-title-container sticker"><div class="txt-cjngai txt-gold txt-huge">下載造型角色<br/>製作Sticker</div></div> 
		<div class="stickers-container">
			<?php
			include('../php/config.php');
			$picList = array();
			foreach($isRoom[7] as $key => $value){ 
				$memberSql = "SELECT `uid`,`pic_fc` FROM `cocacola_cny24_member` where `uid` = '".$key."'";
				$memberResult = mysqli_query($linkUsers,$memberSql);
				while($memberRecord = mysqli_fetch_array($memberResult)){  $picList[$key] = $memberRecord['pic_fc']; }
			}
			?>
			<?php foreach($picList as $pics){  ?>
			<div class="sticker-container"><img src="../uploads/<?php echo($pics);?>" width="auto" height="105%" /></div>
			<?php } ?>
		</div>
		
		<button class="general-button share"><div><div class="txt-cjngai txt-button txt-red">分享結果</div><div class="txt-cjngai txt-button">分享結果</div></div></button>
		<a href="../create/" target="_self"><button class="general-button create last-one"><div><div class="txt-cjngai txt-button txt-red">製作新盆菜</div><div class="txt-cjngai txt-button">製作新盆菜</div></div></button></a>
		<div style="text-align:center; margin-top:1em" class="txt-cjngai txt-gold txt-small">*有關推廣受條款及細則約束</div>
	</div>
</div>
	
<div class="cover-container"></div>
<?php include('../php/menu.php'); ?>
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
	