<?php
	session_start();
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
<?php
	if(isset($_SESSION["login_username"]))
	{
		if($_SESSION["login_username"]!="clabs_admin")
		{
			header("location:index.php");
		}
		else if($_SESSION["login_username"]=="clabs_admin")
		{
			require("../connect_db.php");
			
			$results=$conn->query("SELECT * FROM projects;");
			while($row=$results->fetch_assoc())
			{
				echo "Project ".($row["id"]);
				echo "<p>Title: ".$row["title"]."</p>";
				echo "<p>Description: ".$row["description"]."</p>";
				echo "<p>Members: ".$row["members"]."</p>";
				echo "<p>Date of Start: ".$row["date_of_start"]."</p>";
				if($row["date_of_end"]!="0000-00-00")
					echo "<p>Date of End: ".$row["date_of_end"]."</p>";
				if($row["awards"]!=NULL)
					echo "<p>Awards: ".$row["awards"]."</p>";
				for($i=0;$i<5;$i+=1)
				{
					if($row["link".($i+1)]!=NULL)
						echo "<p><img src='".$row["link".($i+1)]."' height=\"100px\" width=\"100px\"></p>";
				}
				echo "<br /><br />";
			}
		}
	}
	else
		header("location:index.php");	
?>