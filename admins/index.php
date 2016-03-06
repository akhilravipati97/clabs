<?php
	session_start();
	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		require("../connect_db.php");
		$username=$conn->real_escape_string($_POST["username"]);
		if($result=$conn->query("SELECT * FROM admins WHERE username='$username';"))
		{
			$row=$result->fetch_assoc();
			if(password_verify($conn->real_escape_string($_POST["password"]),$row["password"]))
			{
				$_SESSION["login_username"]="clabs_admin";
				header("location:admin_panel.php");
			}
			else
			{
				echo "Wrong credentials. PLease try again.";
				header("location:index.php");
			}
		}
		else
		{
			echo "error: ".$conn->error;
			exit();
		}
		$conn->close();
	}
?>

<html>
	<body>
		<form method="post" action="">
		Username: <input type="text" name="username"></input><br />
		Password: <input type="password" name="password"></input><br />
		<input type="submit" value="submit">
	</body>
</html>