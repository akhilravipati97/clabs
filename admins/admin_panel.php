<?php
	session_start();
	if(isset($_SESSION["login_username"]))
	{
		if($_SESSION["login_username"]!="clabs_admin")
		{
			header("location:index.php");
		}
	}
	else
		header("location:index.php");
?>

<html>
	<body>
		Welcome Admin!<br />
		Please be aware that any change done here, reflects on the live website!<br />
		<ul>
			<li><a href="view_projects.php">View Projects</a></li>
			<li><a href="add_projects.php">Add projects</a></li>
			<li><a href="check_contact_messages.php">Check 'contact us' messages</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</body>
</html>