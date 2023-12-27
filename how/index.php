<?php 
$isSessionNeeded = 0;
include('../php/Mobile_Detect.php');
$detect = new Mobile_Detect;
include('../php/general.php');

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
<title>【可口可樂®「知咩料」最夾盆菜】- 遊戲玩法</title>
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
		<div class="page-title-container txt-cjngai txt-gold txt-large">遊戲玩法</div>
		<div class="how-title-container intro"><div class="txt-cjngai txt-gold txt-huge">遊戲簡介</div></div>
		<p class="txt-cjngai txt-gold">自訂特色食材造型角色，<br/>邀請親朋好友一同製作「知咩料」最夾盆菜！</p>
		
		<div class="recommend-icon txt-cjngai txt-gold txt-huge" style="margin:.5em auto 0 auto">
			<img src="../img/icon-recommend.svg"  width="100%" height="auto" alt="建議人數2-6" />
			<div class="txt-mini">建議人數</div>
			<div class="txt-title">2-6</div>
		</div>
		 
		<div class="how-title-container how"><div class="txt-cjngai txt-gold txt-huge">遊戲玩法</div></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">1</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-01.png) "></div></div>
		</div>
		<p class="txt-cjngai txt-gold">登入COKE+賬戶，在遊戲主頁上按<br/>【開始「夾」盆菜】以進行遊戲。</p>
		<div class="steps-arrow"></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">2</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-02.png) "></div></div>
		</div>
		<p class="txt-cjngai txt-gold">按屏幕指示輸入自訂盆菜名稱，<br/>以創建你的盆菜。</p>
		<div class="steps-arrow"></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">3</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-03.png) "></div></div>
		</div>
		<p class="txt-cjngai txt-gold">選擇你的特色食材造型角色，<br/>並上載你的頭像完成角色創建。</p>
		<div class="steps-arrow"></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">4</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-04.png) "></div></div>
		</div>
		<p class="txt-cjngai txt-gold">揀選你喜愛的食材後，<br/>分享連結及邀請親朋好友一起製作。<br/>每人最多可選3款食材，<br/>每個盆菜最多可選6款不同食材。</p>
		<div class="steps-arrow"></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">5</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-05.png) "></div></div>
		</div>
		<p class="txt-cjngai txt-gold">按【「夾」好晒！】遞交食材選擇。<br/>集齊6款不同食材的盆菜將自動參與<br/>「193最夾盆菜」競猜遊戲。</p>
		<div class="steps-arrow"></div>
		
		<div class="step-container">
			<div class="txt-bold txt-steps">6</div>
			<div class="step-visual"><div style="background-image:url(../img/steps-06.png) "></div></div>
		</div>	
		<p class="txt-cjngai txt-gold">完成後，你的造型角色將會出現在你所選擇的食材旁邊，<br/>你可透過其他玩家的角色與食材對應的位置，<br/>了解其他玩家的口味選擇，<br/>並分享屬於你的「最夾」盆菜至社交媒體。</p>
		
		<div class="txt-cjngai txt-gold txt-mini" style="text-align:left">
			<br/><br/>注意：
			<ol class="txt-cjngai txt-gold txt-small">
				<li>尚未選齊6款不同食材的盆菜只會紀錄玩家已揀選的食材選擇，你須邀請其他玩家一同完成盆菜。</li>
				<li>不同玩家可重複揀選同一食材。</li>
				<li>每人創建盆菜的次數並無上限，而每個盆菜均擁有其獨特的連結。</li>
			</ol>		
		</div>
		
		
		<div class="how-title-container prize"><div class="txt-cjngai txt-gold txt-huge">「193最夾盆菜」<br/>競猜遊戲</div></div>
		<div class="home-prizes-container">
			<div class="home-prize-container"></div> 
			<div class="clear"></div>
		</div>	
		
		<p class="txt-cjngai txt-gold">玩家們需要在本遊戲內20款食材中挑選6款不同食材並<br/>成功遞交，當玩家所選擇的6款食材與193選擇的6款<br/>食材完全相同時，即有機會贏得可口可樂<sup>®</sup>「知咩料」<br/>最夾盆菜乙個。數量有限，先到先得。得獎者名單將在<br/>可口可樂<sup>®</sup>社交媒體帖文公布，並有專人聯絡，敬請<br/>留意。可口可樂<sup>®</sup>將保留得獎名單的最終決定權，<br/>不得異議。</p>

		
		<div class="how-title-container coke"><div class="txt-cjngai txt-gold txt-huge">可口可樂<sup>®</sup><br/>最夾賀年獎賞</div></div>
		
		<div class="how-prizes-container txt-gold first">
			<div></div>
			<div class="txt-cjngai txt-gold">免費獲贈可口可樂®<br/>「知咩料」最夾盆菜乙個<br/>（30名）</div>
		</div>
		<div class="how-prizes-container txt-gold">
			<div></div>
			<div class="txt-cjngai txt-gold">GULU盆菜優先預訂8折優惠<br/>（100名）</div>
		</div>
		<div class="how-prizes-container txt-gold">
			<div></div>
			<div class="txt-cjngai txt-gold">PNS網購滋味組合</div>
		</div>
		<div class="how-prizes-container txt-gold">
			<div></div>
			<div class="txt-cjngai txt-gold">Pandamart特選優惠</div>
		</div>
		<div class="how-prizes-container txt-gold">
			<div></div>
			<div class="txt-cjngai txt-gold">HKTVmall網購優惠</div>
		</div>
		<div class="how-prizes-container txt-gold">
			<div></div>
			<div class="txt-cjngai txt-gold">太古e-shop電子優惠券</div>
		</div>
		
		<p class="txt-gold txt-bold" style="text-align:left; font-size:1em; margin-top:1.5em">條款及細則：</p>
		<ul class="txt-bold txt-gold">
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
<div class="cover-container bottom"></div>	
<div class="fix-button-container">	
	<?php if(isset($_SESSION[$sessionName])){ ?>
	<a href="/create" target="_self"><button class="general-button create"><div><div class="txt-cjngai txt-button txt-red">開始「夾」盆菜</div><div class="txt-cjngai txt-button">開始「夾」盆菜</div></div></button></a>
	<?php }else{ ?>
	<a href="<?php echo(str_replace('%2Fhow', '%2Fcreate%2F%3Fact%3Dcreate', $createURL)); ?>" target="_self"><button class="general-button create"><div><div class="txt-cjngai txt-button txt-red">開始「夾」盆菜</div><div class="txt-cjngai txt-button">開始「夾」盆菜</div></div></button></a>
	<?php } ?>
</div>		
<?php include('../php/menu.php'); ?>
</div>	
</body>
<?php } ?>		
</html>
	