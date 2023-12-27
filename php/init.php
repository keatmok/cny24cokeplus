<?php
if(isset($_GET['request'])){
	include('config.php');
	
	$req = $_GET['request'];
	
	if($req == 'empty-members'){
		$sql = 'TRUNCATE TABLE `cocacola_cny24_members`';
	}else if($req == 'empty-rooms'){
		$sql = 'TRUNCATE TABLE `cocacola_cny24_room`';
		
	}else if($req == 'remove-member'){
		
		$sql = "DELETE FROM `cocacola_cny24_member` WHERE `uid` = '".$_GET['data']."'";
		
	}else if($req == 'remove-room'){	
		
		$sql = "DELETE FROM `cocacola_cny24_room` WHERE `token` = '".$_GET['data']."'";
		
	}else if($req == 'get-member'){	
		
		$sql = "SELECT * FROM `cocacola_cny24_member` where `uid` = '".$_GET['data']."'";
		
	}else if($req == 'get-room'){	
		
		$sql = "SELECT * FROM `cocacola_cny24_room` where `token` = '".$_GET['data']."'";
	
	}else if($req == 'all-members'){	
		
		$sql = "SELECT * FROM `cocacola_cny24_member`";
		
	}else if($req == 'all-rooms'){		
		$sql = "SELECT * FROM `cocacola_cny24_room`";
	}
	
	$sqlResult = mysqli_query($linkUsers, $sql);
	
	if($req == 'get-member' || $req == 'all-members'){	
		echo('<table>');
		echo('<tr><td>ID</td><td>PIC A</td><td>PIC B</td><td>Since</td></tr>');
		
		while($userRecord = mysqli_fetch_array($sqlResult)){
			echo('<tr><td>'.$userRecord['uid'].'</td><td>'.$userRecord['pic'].'</td><td>'.$userRecord['pic_fc'].'</td><td>'.$userRecord['date_create'].'</td></tr>');
		}
		echo('</table>');
		
	}else if($req == 'get-room' || $req == 'all-rooms'){	
		echo('<table>');
		echo('<tr><td>Room</td><td>Admin</td><td>Name</td><td>PIC</td><td>Ingredients</td><td>Members</td><td>Since</td><td>Fin</td></tr>');
		
		while($userRecord = mysqli_fetch_array($sqlResult)){
			echo('<tr><td>'.$userRecord['token'].'</td><td>'.$userRecord['admin'].'</td><td>'.$userRecord['name'].'</td><td>'.$userRecord['pic'].'</td><td>'.$userRecord['ingredients'].'</td><td>'.$userRecord['members'].'</td><td>'.$userRecord['date_create'].'</td><td>'.$userRecord['date_finish'].'</td></tr>');
		}
		echo('</table>');
	}
	
}
?>