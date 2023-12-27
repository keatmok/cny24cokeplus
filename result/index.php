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
		header("Location: " . $home.'create', true, 301);
	}else{

		if($isRoom[1] == 0 ){
			header("Location: " . $home.'profile/?rid='.$_GET['rid'], true, 301);
		}else{
			if($isRoom[2] == 1){
				if($isRoom[3] >= 6){
					//add Open class
				}else{
					//show invite reminder
				}
			}else{
				header("Location: " . $home, true, 301);
			}

		}
	}
}
?>
<!-- check if member in this room, YES >> check if room finished -->
<!-- check if member in this room, NO  >> go to home -->

<!-- if room finished  >> add Open class -->
<!-- if room NOT finished  >> show invite reminder -->

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
<script type="text/javascript" src="../js/main.js?v=11"></script>
<?php if($isRoom[0] == 1){ ?><script>roomID = "<?php echo($_GET['rid']); ?>";</script><?php } ?>		
<title>【可口可樂®「知咩料」最夾盆菜】-【<?php echo($isRoom[6]);?>】</title>
</head>
<?php if($isDesktop == 0){ ?>
<?php include('../php/desktop.php'); ?>
<?php }else{ ?>	
<body onResize="resizeH()" onload="checkLoaderH()">	
<div class="all-container<?php if($isRoom[2] == 1 && $isRoom[3] >= 6){ echo(' ani'); }?>">
<div class="header-container">
	<a href="https://www.coca-cola.com.hk" target="_blank"><div class="logo-container"></div></a>
	<div class="menu-icon-container">
		<div></div><div></div><div></div>
	</div>
</div>	
	
<div class="page-container result">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="create-kv-container<?php if($isRoom[2] == 1 && $isRoom[3] >= 6){ echo(' open'); }?>">
			<div class="create-kv-container-inner">
				<div class="create-kv-middle"></div>
				<div class="create-kv-bottom"></div>
				<div class="create-kv-top"></div>
			</div>
			<div class="create-processing"></div>
			<?php
			include('../php/config.php');
			$picList = array();
			foreach($isRoom[7] as $key => $value){ 
				$memberSql = "SELECT `uid`,`pic` FROM `cocacola_cny24_member` where `uid` = '".$key."'";
				$memberResult = mysqli_query($linkUsers,$memberSql);
				while($memberRecord = mysqli_fetch_array($memberResult)){  $memberPic = $memberRecord['pic']; $picList[$key] = $memberRecord['pic']; }
			?>
			<div class="char-container"><div class="char-container-inner" style="background-image:url(../uploads/<?php echo($memberPic); ?>)"></div></div>
			<?php } ?>
		</div>
		<div class="general-input-field with-bg">
			<div class="general-input-field-inner txt-gold"><input type="text" placeholder="<?php echo($isRoom[6]);?>" id="input-room-name" class="txt-cjngai" disabled /></div>
		</div>
		
		<div class="dishes-container">
			<?php foreach ($isRoom[5] as  $key => $value) { ?>
			<div class="dish-container dish<?php echo($key);?>">
				<div class="dish-container-inner"></div>
				<?php foreach($isRoom[7] as $keyB => $valueB){ ?>
				<?php $tempData = explode(',', $valueB); ?>
				<?php if(in_array($key, $tempData)){ ?>
				<div class="char-container"><div class="char-container-inner" style="background-image:url(../uploads/<?php echo($picList[$keyB]);?>)"></div></div>
				<?php } ?>
				<?php } ?>
				<div class="dish-label-container"><div></div></div>
				<div class="dish-count-container"><?php echo($value);?></div>
			</div>
			<?php } ?>
		</div>	
		<?php if($isRoom[2] == 1 && $isRoom[3] < 6){  ?>
		<div class="txt-cjngai txt-gold txt-big" style="margin-bottom:1em; line-height:1.2">快啲叫齊你嘅屋企人<br/>完成呢個盆菜啦！</div>
		<?php } ?>
		<a href="../share/?rid=<?php echo($_GET['rid']); ?>" target="_self"><button class="general-button invite"><div><div class="txt-cjngai txt-button txt-red">邀請親朋好友一齊玩</div><div class="txt-cjngai txt-button">邀請親朋好友一齊玩</div></div></button></a>
		<a href="../rewards/?rid=<?php echo($_GET['rid']); ?>" target="_self"><button class="general-button rewards last-one"><div><div class="txt-cjngai txt-button txt-red">領取最夾賀年獎賞</div><div class="txt-cjngai txt-button">領取最夾賀年獎賞</div></div></button></a>
		
		
	</div>
</div>
<?php if($isRoom[2] == 1 && $isRoom[3] >= 6){ ?>	
<div class="page-container finish">	
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<div class="pot-container">
			<div class="pot-body-container">
				
				<div class="ingredients-container">
					<?php foreach ($isRoom[5] as  $key => $value) { ?>
					<div class="ingredient-container dish<?php echo($key);?>"><div></div></div>
					<?php } ?>
				</div>
				<div class="members-container">
					<?php foreach($picList as $pics){  ?>
					<div class="member-container"><div style="background-image:url(../uploads/<?php echo($pics);?>)"></div></div>
					<?php } ?>
				</div>
				<div class="bubbles-container">
					<div class="bubble-container"></div><div class="bubble-container"></div>
					<div class="bubble-container"></div><div class="bubble-container"></div>
					<div class="bubble-container"></div>
				</div>
				<div class="bubbles-container">
					<div class="bubble-container"></div><div class="bubble-container"></div>
					<div class="bubble-container"></div><div class="bubble-container"></div>
					<div class="bubble-container"></div>
				</div>
			</div>
			<div class="pot-head-container"></div>
		</div>
		<div class="general-input-field with-bg">
			<div class="general-input-field-inner txt-gold txt-bold"><input type="text" placeholder="<?php echo($isRoom[6]);?>" id="" class="" disabled /></div>
		</div>
	</div>	
</div>	
<?php } ?>	
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
	