<body onResize="resizeH()" onload="checkLoaderH()" class="desktop">	
<div class="all-container">
	
<div class="page-container qrcode">
	<div class="page-container-inner">
		<div>
			<img src="img/desktop-cnt.png" width="100%" height="auto" alt="" />
			<div id="qrcode"></div>
			<script type="text/javascript"> 
			var qrcode = new QRCode(document.getElementById("qrcode"), {
				text: "<?php echo("https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);?>",
				width: 128,
				height: 128,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});
			</script>
		</div>
	</div>
</div>

</div>
<div class="logo-container qrcode"></div>	
</body>	