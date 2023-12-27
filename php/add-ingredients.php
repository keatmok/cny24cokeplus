<?php
//echo getcwd();
// /home/jazzup1/public_html/client/coca-cola/20231127/php
/*$_POST["uid"] = 'K1234';
$_POST["rid"] = 'e774f8f18df1538bK123e0112f7a366ff002';
$_POST["ing"] = "2,5,6";
*/
/*$_POST["uid"] = 'b377b87b-07f8-4043-939e-e8a2a18748a1';
$_POST["rid"] = '9f06f6bdYjM3N2I4N2ItMDdmOC00MDQzLTkzOWUtZThhMmExODc0OGExd9a1f260';
$_POST["ing"] = '0,1';
$_SESSION['cctest'] = $_POST["uid"];
*/							   
if(isset($_POST["rid"])){ 
	include('config.php');
	include('general.php');
	
	$userSql = "SELECT `uid`,`pic` FROM `cocacola_cny24_member` where `uid` = '".$_SESSION[$sessionName]."'";
	$userResult = mysqli_query($linkUsers,$userSql);
	$userNumRows = mysqli_num_rows($userResult);
	while($userRecord = mysqli_fetch_array($userResult)){ 
		$userPic = $userRecord['pic'];
	}
	
	if($userNumRows){
		$roomSql = "SELECT `members`,`admin`,`ingredients`,`token`,`pic`,`name` FROM `cocacola_cny24_room` where `token` = '".$_POST['rid']."'";
		$roomResult = mysqli_query($linkUsers,$roomSql);
		$roomNumRows = mysqli_num_rows($roomResult);
		$admin = '';
		
		if($roomNumRows > 0){
			while($roomRecord = mysqli_fetch_array($roomResult)){ 
				//$dest = imagecreatefromjpeg($targetPath.$roomRecord['pic']);
				
				//header('Content-Type: image/png');
				if($roomRecord['pic'] == 'og-image.jpg'){
					$img1 = $targetPath.'img/og-playing.jpg';
					$img3 = $targetPath.'img/og-generic.jpg';
				}else{
					$img1 = $targetPath.'uploads/'.$roomRecord['pic'];
					$img3 = $targetPath.'uploads/'.$_POST["rid"].'-done.png';
					
				}
				//echo($img1);
				$first = imagecreatefromjpeg($img1);
				$third = imagecreatefromjpeg($img3);
				
				$img4 = $targetPath.'img/gold-circle.png';
				$forth = imagecreatefrompng($img4);
				
				$img2 = $targetPath.'uploads/'.$userPic;
				
				
				
				$ingredientsNum = 0;
				$ingredients = $roomRecord['ingredients'];
				$ingredientsList = json_decode($ingredients);
				$ingredientsSelectedList = array();
				
				$memberCount = 0;
				$memberAdded = 0;
				$admin = $roomRecord['admin'];
				
				
				foreach ($ingredientsList as $key => $value) {
					$ings = explode(',', $value); 
					foreach ($ings as $ing) {
						if (!in_array($ing, $ingredientsSelectedList)) {
							array_push($ingredientsSelectedList, $ing);
						}
					}
					
					
					if($key == $_SESSION[$sessionName]){
						$memberAdded = 1;
					}
					$memberCount++;
				}
				 
				$ingredientsNum = count($ingredientsSelectedList);
				
				
				
				$tempList = explode(',', $_POST["ing"]);
				foreach ($tempList as $tempIng) {
					if (!in_array($tempIng, $ingredientsSelectedList)) {
						array_push($ingredientsSelectedList, $tempIng);
					}
				}
				$ingredientsNumNew = count($ingredientsSelectedList);
				
				
				//echo($memberCount);
				$filename = $roomRecord['token'].'-feed'.'.png';
				$filenameB = $roomRecord['token'].'-done'.'.png';
                if($memberCount < 6){
                    $outputImage = imagecreatetruecolor(1200, 630);
					$outputImageB = imagecreatetruecolor(1200, 630);

                    $second = imagecreatefrompng($img2);
					
                    imagecopyresized($outputImage,$first, 0,0,0,0, 1200, 630, 1200, 630);
					imagecopyresized($outputImageB,$third, 0,0,0,0, 1200, 630, 1200, 630);

                    if($memberCount == 0){
                        imagecopyresized($outputImage, $forth, 785,215,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 785,215,0,0, 200, 200, 200, 200);
						
						imagecopyresized($outputImage,$second, 785,180,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,785,180,0,0, 200, 270, 1000, 1350);
                    }else if($memberCount == 1){
						imagecopyresized($outputImage, $forth, 240,100,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 240,100,0,0, 200, 200, 200, 200);
					
                        imagecopyresized($outputImage,$second, 240,65,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,240,65,0,0, 200, 270, 1000, 1350);
                    }else if($memberCount == 2){
						imagecopyresized($outputImage, $forth, 150,375,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 150,375,0,0, 200, 200, 200, 200);
					
                        imagecopyresized($outputImage,$second, 150,340,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,150,340,0,0, 200, 270, 1000, 1350);
                    }else if($memberCount == 3){
						imagecopyresized($outputImage, $forth, 980,85,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 980,85,0,0, 200, 200, 200, 200);
					
                        imagecopyresized($outputImage,$second, 980,50,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,980,50,0,0, 200, 270, 1000, 1350);
                    }else if($memberCount == 4){
						imagecopyresized($outputImage, $forth, 10,135,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 10,135,0,0, 200, 200, 200, 200);
					
                        imagecopyresized($outputImage,$second, 10,100,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,10,100,0,0, 200, 270, 1000, 1350);
                    }else if($memberCount == 5){
						imagecopyresized($outputImage, $forth, 920,385,0,0, 200, 200, 200, 200);
						imagecopyresized($outputImageB,$forth, 920,385,0,0, 200, 200, 200, 200);
					
                        imagecopyresized($outputImage,$second, 920,350,0,0, 200, 270, 1000, 1350);
						imagecopyresized($outputImageB,$second,920,350,0,0, 200, 270, 1000, 1350);
                    }
                    
                }
				
				if($roomRecord['pic'] == 'og-image.jpg'){
					$font = $targetPath.'fonts/cjngai.ttf';
					$whiteColor = imagecolorallocate($outputImage, 237, 210, 130);
					
					$dimensions = imagettfbbox(25, 0, $font, $roomRecord['name']);
					$textWidth = abs($dimensions[4] - $dimensions[0])+2;
					$offsetX = 600 - $textWidth*0.5;
					imagettftext($outputImage, 25, 0, $offsetX, 550, $whiteColor, $font, $roomRecord['name']);
					
					imagettftext($outputImageB, 25, 0, $offsetX, 550, $whiteColor, $font, $roomRecord['name']);
				}
				imagepng($outputImage, $targetPath.'uploads/'.$filename);
                imagedestroy($outputImage);
				//echo('uploads/'.$filename);
				imagepng($outputImageB, $targetPath.'uploads/'.$filenameB);
                imagedestroy($outputImageB);
				
				//echo($ingredientsNum);
				$members = explode(',',$roomRecord['members']);
				
				if (in_array($_SESSION[$sessionName], $members)) {
					if($ingredientsNum >= 6){
						echo('already');
					}else{
						
						if($memberAdded == 1){
							echo('wait');
						}else{
							
							
							if($ingredients == '{}'){
								$ingredients = str_replace('}', '"'.$_SESSION[$sessionName].'":"'.$_POST["ing"].'"}', $ingredients);
							}else{
								$ingredients = str_replace('}', ',"'.$_SESSION[$sessionName].'":"'.$_POST["ing"].'"}', $ingredients);
							}
							
							if($ingredientsNumNew >= 6){
								$addSql = "UPDATE `cocacola_cny24_room` SET `ingredients` = '".$ingredients."',`pic` = '".$filenameB."',`date_finish` = '".date("Y-m-d H:i:s")."' WHERE `token` = '".$_POST['rid']."'";
							}else{
								$addSql = "UPDATE `cocacola_cny24_room` SET `ingredients` = '".$ingredients."',`pic` = '".$filename."' WHERE `token` = '".$_POST['rid']."'";
							}
							
							$addResult = mysqli_query($linkUsers,$addSql);
							
							if($ingredientsNumNew >= 6){
								echo('done');
							}else{
								if($admin == $_SESSION[$sessionName]){
									echo('invite');
								}else{
									echo('wait');
								}
								
							}
						}
					}
				}else{
					/* non member */
					
					if($ingredientsNumNew <= 6){
						if($ingredients == '{}'){
							$ingredients = str_replace('}', '"'.$_SESSION[$sessionName].'":"'.$_POST["ing"].'"}', $ingredients);
						}else{
							$ingredients = str_replace('}', ',"'.$_SESSION[$sessionName].'":"'.$_POST["ing"].'"}', $ingredients);
						}
						if($ingredientsNumNew >= 6){
							$addSql = "UPDATE `cocacola_cny24_room` SET `ingredients` = '".$ingredients."',`pic` = '".$filenameB."', `date_finish` = '".date("Y-m-d H:i:s")."', `members` = '".$roomRecord['members'].','.$_SESSION[$sessionName]."' WHERE `token` = '".$_POST['rid']."'";
						}else{
							$addSql = "UPDATE `cocacola_cny24_room` SET `ingredients` = '".$ingredients."',`pic` = '".$filename."' ,`members` = '".$roomRecord['members'].','.$_SESSION[$sessionName]."' WHERE `token` = '".$_POST['rid']."'";
						}
						$addResult = mysqli_query($linkUsers,$addSql);
						if($ingredientsNumNew >= 6){
							echo('done');
						}else{
							echo('wait');
						}
					}else{
						echo('toomuch');
					}
					/* check if fin, if not fin, add to member and goahead */
					/* check if fin, if fin, add to member and goahead */
				}
			}
		}else{
			echo('nonroom');
		}
		
	}else{
		echo('nonuser');
	}
	   
}


?>