<div class="menu-container">
	<div class="backdrop-container"><div></div><div></div><div></div></div>
	<div class="page-container-inner">
		<a href="../" target="_self"><button class="general-button home"><div><div class="txt-cjngai txt-button txt-red">主頁</div><div class="txt-cjngai txt-button">主頁</div></div></button></a>
		<a href="../how/" target="_self"><button class="general-button how"><div><div class="txt-cjngai txt-button txt-red">遊戲玩法</div><div class="txt-cjngai txt-button">遊戲玩法</div></div></button></a>
		<a href="../tnc" target="_self"><button class="general-button tnc"><div><div class="txt-cjngai txt-button txt-red">條款及細則</div><div class="txt-cjngai txt-button">條款及細則</div></div></button></a>
		<?php if(isset($_SESSION[$sessionName])){ ?>
		<a href="../?logout=true" target="_self"><button class="general-button logout"><div><div class="txt-cjngai txt-button txt-red">登出</div><div class="txt-cjngai txt-button">登出</div></div></button></a>
		<?php } ?>
	</div>
</div>	