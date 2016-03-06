<?php
    require("../connect_db.php");
	$pass_hash=password_hash("creativity4lab",PASSWORD_DEFAULT);
	
	$sql="INSERT INTO admins(username,password) VALUES('clabs_admin','$pass_hash');";
	$conn->query($sql);
	?>
	