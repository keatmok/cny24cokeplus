<?php



function checkRoomExistH($rid){
	global $sessionName;
	global $home;
	include('config.php');
	$returnArray = array(0,0,0,0); // room exist, member exist, member in room, num of ingredients, ing list, ing selected, name, member list
	
	$roomSql = "SELECT `token`,`members`,`ingredients`,`name`,`pic` FROM `cocacola_cny24_room` where `token` = '".$rid."'";
	$roomResult = mysqli_query($linkUsers,$roomSql);
	$returnArray[0] = mysqli_num_rows($roomResult);
	
	$memberSql = "SELECT `uid` FROM `cocacola_cny24_member` where `uid` = '".$_SESSION[$sessionName]."'";
	$memberResult = mysqli_query($linkUsers,$memberSql);
	$returnArray[1] = mysqli_num_rows($memberResult);
	
	while($roomRecord = mysqli_fetch_array($roomResult)){ 
		if($roomRecord['pic'] != 'og-image.jpg'){
			global $og;
			$og = $home.'/uploads/'.$roomRecord['pic'];
		}
		
		$members = explode(',', $roomRecord['members']);
		if (in_array($_SESSION[$sessionName], $members)) {
			$returnArray[2] = 1;
		}
		
		$ingredientsList = json_decode($roomRecord['ingredients']);
		$ingredientsSelectedList = array();
		foreach ($ingredientsList as $key => $value) {
			$ings = explode(',', $value);
			foreach ($ings as $ing) {
				/*if (!in_array($ing, $ingredientsSelectedList)) {
					array_push($ingredientsSelectedList, $ing);
				}*/
				if(isset($ingredientsSelectedList[$ing])){
					$ingredientsSelectedList[$ing]++;
				}else{
					$ingredientsSelectedList[$ing] = 1;
				}
				
			}
		}
		
		ksort($ingredientsSelectedList);
		
		$returnArray[3] = count($ingredientsSelectedList);
		array_push($returnArray, $ingredientsList);
		array_push($returnArray, $ingredientsSelectedList);
		array_push($returnArray, $roomRecord['name']);
		array_push($returnArray, json_decode($roomRecord['ingredients']));
	}
	
	
	return($returnArray);
}



?>