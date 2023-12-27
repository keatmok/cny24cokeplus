<?php 
$isSessionNeeded = 0;
include('../php/Mobile_Detect.php');
$detect = new Mobile_Detect;
include('../php/general.php');

if(isset($_GET['logout'])){
	if(session_destroy()){
		$_SESSION = [];
		//header("Location: index.php");
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
<title>【可口可樂®「知咩料」最夾盆菜】- 條款及細則</title>
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
	
<div class="page-container how">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<p class="txt-gold txt-bold" style="text-align:left; font-size:1em">條款及細則：</p>
		<ul class="txt-gold txt-bold" style="padding-bottom:2em">
			<li>【可口可樂<sup>®</sup>「知咩料」最夾盆菜】及「193最夾盆菜」 遊戲（「此活動」）由可口可樂<sup>®</sup>主辦。</li>
			<li>此活動時間為：2024年1月15日00:00:00至2024年2月29日23:59:59。(此活動時間以GMT+8香港時間為準。)</li>
			<li>「193最夾盆菜」 遊戲將於2024年1月31日23:59:59 截止，首30位COKE+ 用戶成功提交與193選擇相同的6款不同食材可獲得可口可樂<sup>®</sup>「知咩料」最夾盆菜乙個，得獎名單將於2024年2月1日於可口可樂<sup>®</sup>社交媒體公布，並有專人聯絡。</li>
			<li>參加本遊戲之人士，已視為同意及接受本條款及細則，及香港法律所約束。請在參與遊戲前細閱此等條款。</li>
			<li>參加本遊戲之人士明白並確認其分享內容真確並不包含侵犯或違反他人權利或法律、鼓吹暴力、色情或種族主義的資料;也沒有任何猥褻、粗俗、不敬、威脅或憎恨的言詞。如果可口可樂<sup>®</sup>認為該等分享內容違反了上述要求，可口可樂<sup>®</sup>不會上載並/或刪除該等分享。可口可樂<sup>®</sup>對此保留一切法律權利。</li>
			<li>參加本遊戲之人士知悉可口可樂<sup>®</sup>保留隨時移除內容的權利。</li>
			<li>可口可樂<sup>®</sup>就此活動的參加資格、得獎資格等保留最終決定權。如有任何爭議，可口可樂<sup>®</sup>保留最終決定權，包括隨時暫停、更改或終止活動及其條款及細則，而毋須另行通知。可口可樂<sup>®</sup>有權取消參加者的得獎資格。</li>
			<li>所有獎品不得轉讓、不得兌換現金及不得退換，並受有關條款及細則約束。</li>
			<li>如有任何因網路、電話、技術或不可歸責於活動主辦單位之事由，而使參加者的獎品有遲延、遺失、錯誤、無法辨識之情況，可口可樂<sup>®</sup>不負任何法律責任。</li>
			<li>於本遊戲結束後，一旦得獎者領取禮品後，若有錯誤、遺失，活動主辦單位不會發給任何證明或補償。</li>
		</ul>	
	</div>

</div>
	
<div class="cover-container"></div>	
<?php include('../php/menu.php'); ?>
	
</div>	
</body>
<?php } ?>		
</html>
	