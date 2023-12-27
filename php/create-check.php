<?php
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

include('general.php');

if(isset($_POST["nickname"])){
	//include('config.php');
	$isBad = 0;

	$_POST["nickname"] = preg_replace("/\s+/", "", $_POST["nickname"]);

	$filter = array("屌", "𨳒", "𨳊", "鳩","撚樣","𨶙","柒","閪","𨳍","杘","屄","㞗",
	"仆街","fuck","shit","冚家剷","冚加剷","冚+剷","冚嘉剷","亻卜彳圭亍","仆彳圭亍","亻卜街","閪","仆徍亍","亻卜徍亍","食屎","屌你","屌那星","屌那媽","屌老母","屌你老母","屌妳老母","屌您老母","撚樣","屌9你","食撚屎","呆9","呆撚9","呆撚狗","柒樣","撚柒","春袋", "呆狗","dumn","屌鳩星","呆鳩","呆撚鳩","戇DOG","戇鳩","戇9","on鳩","屎窟鬼","乜撚野","柑蕉桔梨碌柚","雁鷲鵰狸獅狒","鵰狗豹狸","金錳碘鈮鈹鈷","小你老母","撚屌鳩","含能","臭西","凸你","收皮","sub9","chilansin","bitch","b!tch","diu","asshole","suck","挑那星","POP街","陷家剷","卜街","能樣","on9","on.9","凸_凸","含撚","冚家祥","f u c k","sh!t","碌9","凸凸","d!u","吹蕭","大波","大胸","含撚","大枝野","大枝o野","大枝嘢","打車輪","口交","肛交","性交","手淫","姦","打茄輪","震蛋","淫蕩","淫慾","性愛","觀音坐蓮","老漢推車","狗仔式","猴子偷桃","顏射","汁男","童顏","陽具","乳溝","乳頭","龜頭","性愛","性慾","性奴","性經","愛撫","賤格","淫婦","淫娃","蕩婦","做雞","幼齒","冚家铲","冚加铲","冚+铲","冚嘉铲","杏加橙","屌那妈","捻样","食捻屎","呆捻9","呆捻狗","柒样","捻柒","屌鸠星","呆鸠","呆捻鸠","戆DOG","戆鸠","戆9","on鸠","乜捻野","捻屌鸠","条捻","陷家铲","能样","含捻","吹萧","含捻","打车轮","打茄轮","淫荡","淫欲","性爱","观音坐莲","老汉推车","颜射","童颜","阳具","乳沟","乳头","龟头","內射","中出","性欲","性经","爱抚","贱格","淫妇","荡妇","做鸡","幼齿","]]>","不舉","不举","凌辱","S.M","汁男","167","169","69","ｆuck","fｕck","fuｃk","fucｋ","ｆｕck","ｆuｃk","ｆucｋ","fｕｃk","fｕcｋ","fuｃｋ","ｆｕｃk","fｕｃｋ","ｆｕｃｋ","ｓhit","sｈit","shｉt","shiｔ","ｓｈit","ｓhｉt","ｓhiｔ","sｈｉt","sｈiｔ","shｉｔ","ｓｈｉt","sｈｉｔ","ｓｈｉｔ","ｓh!t","sｈ!t","sh！t","sh!ｔ","ｓｈ!t","ｓh！t","ｓh!ｔ","sｈ！t","sｈ!ｔ","sh！ｔ","ｓｈ！t","sｈ！ｔ","ｓｈ！ｔ","DKLM","WTF","W T F","WT F","W TF","D K L M","DK L M","DKL M","D KL M","D KLM","DK LM","國安法", "逃犯條例", "李家超", "林鄭", "反送中", "黑暴", "暴動", "天滅中共", "下台", "黑警", "pk");

	$fp = fopen('filter.txt', 'r'); 
	if ($fp) {
   		$filter = explode(",", fread($fp, filesize('filter.txt')));
	}
	
	foreach($filter as $bad){
		if (str_contains(strtolower($_POST["nickname"]), strtolower($bad))) {
	$isBad = 1;
		}
	}

	$filterB = array("!","@","#","$","%","^","&","*","(",")","-","+","/","]","[","|","\/","'","£","{","}","~","?","<",">","=",":",";",",",".","_","`","0","1","2","3","4","5","6","7","8","9");
	foreach($filterB as $bad){
		if (str_contains(strtolower($_POST["nickname"]), strtolower($bad))) {
	$isBad = 2;
		}
	}

	if($isBad == 2){
		echo('sign');
	}else if($isBad == 1){
		echo('bad');
	}else{
		//echo('good');
		//date finish
		include('config.php');
		
		$token = bin2hex(openssl_random_pseudo_bytes(8)).substr($_SESSION[$sessionName], 0, 12).bin2hex(openssl_random_pseudo_bytes(8));
		
		$sql_create = 'INSERT INTO `cocacola_cny24_room` (`token`, `admin`, `name`, `pic`, `ingredients`, `members`, `date_create`, `ip`, `agent`) VALUES (\''.$token.'\', \''.$_SESSION[$sessionName].'\', \''.$_POST["nickname"].'\', \''.'og-image.jpg'.'\', \''.'{}'.'\', \''."".'\', \''.date("Y-m-d H:i:s").'\', \''.$ip.'\', \''.$_SERVER['HTTP_USER_AGENT'].'\')';
		$createResult = mysqli_query($linkUsers, $sql_create);
		//echo($_SESSION[$sessionName]);
		echo($token);
		//echo($linkUsers->insert_id);
	}
}
?>