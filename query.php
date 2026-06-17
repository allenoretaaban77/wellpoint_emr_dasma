<?php

	$tid = $_GET['uid'];

	$connect = mysql_connect("localhost","root","");
	$db = mysql_select_db("wpemrdlivedb");
	// mysql_query('TRUNCATE TABLE friend;');
	
	$qry = mysql_query("SELECT id FROM auth_users WHERE status = 1 ORDER BY id asc");
	while($row = mysql_fetch_assoc($qry)){
		$usrdt[] = $row;
	}
	$count = count($usrdt);

	foreach($usrdt as $rows){

		$qryf = mysql_query("SELECT * FROM friend WHERE user_id = ".$rows['id']);
		$fdt = array();
		while($frow = mysql_fetch_object($qryf)) { 
			$fdt[] = $frw; 
		}
		if (count($fdt) == 0) {
			echo $rows['id']."<br>";
			if ($tid == $rows['id']) {
				for($i = 0; $i < $count; $i++){
					$query = "INSERT INTO friend(user_id, friend_user_id) VALUES(".$rows['id'].",".$usrdt[$i]['id'] .")";
					$query = mysql_query($query);
				}				
			}
		} 

	}

?>
