<?php
	$id = $_GET['id'];

	// Create connection
	$conn = new mysqli("localhost", "root", "", "wpemrdlivedb");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	// $sql = "DELETE FROM friend";
	// $result = $conn->query($sql);

	/* $sql = "SELECT id FROM auth_users WHERE status = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// echo $row["id"]."<br>";
			$friend_id = $row["id"];
			$sql = "INSERT INTO friend (user_id,friend_user_id) VALUES ($id, $friend_id)";
			if ($conn->query($sql) === TRUE) {
				// echo "User $id added to friend $friend_id<br>";
			} else {
				// echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	} else {
		echo "0 results";
	} */

	$sql = "SELECT id FROM auth_users WHERE status = 1 GROUP BY id ORDER BY id ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["id"]." | ";
		}
	} else {
		echo "0 results";
	}
	echo "<br><br>";

	$sql = "SELECT user_id FROM friend GROUP BY user_id ORDER BY user_id ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["user_id"]." | ";
		}
	} else {
		echo "0 results";
	}


	$conn->close();
?>