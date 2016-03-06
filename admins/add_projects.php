<?php
	session_start();
	if(isset($_SESSION["login_username"]))
	{
		if($_SESSION["login_username"]!="clabs_admin")
		{
			header("location:index.php");
		}
		else if(isset($_POST['submit']))
		{
			require("../connect_db.php");
			
			$title=$conn->real_escape_string($_POST["title"]);
			$members=$conn->real_escape_string($_POST["members"]);
			$description=$conn->real_escape_string($_POST["description"]);
			$date_of_start=$conn->real_escape_string($_POST["date_of_start"]);
			$date_of_end=$conn->real_escape_string($_POST["date_of_end"]);
			$awards=$conn->real_escape_string($_POST["awards"]);
			
			$links=array("","","","","","");
			for($i=0;$i<sizeof($_FILES);$i=$i+1)
			if(file_exists($_FILES['poster']['tmp_name'][$i]) || is_uploaded_file($_FILES['poster']['tmp_name'][$i])) {
				$info = pathinfo($_FILES['poster']['name'][$i]);
                $ext = $info['extension'];
                $newname = $title.".".$ext;
                $target2 = 'img/'.$newname;
                $tempTarget2 = '../' . $target2;
                move_uploaded_file( $_FILES['poster']['tmp_name'][$i], $tempTarget2);
				$links[$i]=$tempTarget2;
            }			
			
			if($conn->query("INSERT INTO projects(title,members,description,date_of_start,date_of_end,awards,link1,link2,link3,link4,link5) VALUES('$title','$members','$description','$date_of_start','$date_of_end','$awards','$links[0]','$links[1]','$links[2]','$links[3]','$links[4]')"))
			{
				echo "Project added successfully.";
				echo "<a href='admin_panel.php'>Back to Panel</a>";
			}
			else
				echo "Some error: ".$conn->error;
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
			<li><a href="add_projects.php">Add projects</a></li>
			<li><a href="view_projects.php">View Projects</a></li>
			<li><a href="check_contact_messages.php">Check 'contact us' messages</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<br />
		<h1>Add projects</h1>
		<form method="post" action=""  enctype="multipart/form-data">
			Title of the project: <input type="text" name="title"></input><br/>
			Project description: <textarea name="description"></textarea><br /><br />
			P.S: Enter members as a comma seperated list if there are more than one.<br />
			Project members: <input type="text" name="members"></input><br /><br />
			P.S: Leave the Awards field empty if there are none; enter as a comma seperated list if there are more that one.<br />
			Awards and Recognition: <textarea name="awards"></textarea><br /><br />
			Project start date: <input type="date" name="date_of_start"></input><br /><br />
			P.S: Don't enter end date at all, if the project is still ongoing.<br />
			Project end date: <input type="date" name="date_of_end"></input><br /><br />
			P.S: Please don't upload more than 5 images.<br />
			Project images: <input type="file" name="poster[]" multiple=""></input><br />
			<input type="submit" name="submit"></input>
	    </form>
	</body>
</html>