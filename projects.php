<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	require("connect_db.php");
	$check=0;
	if($results=$conn->query("SELECT * FROM projects;"))
	{
		$check=1;
	}
	else
		echo "Some error: ".$conn->error;
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creation Labs | Projects</title>
    <link rel="icon" href="img/favicon.png">
    <!-----------------------------Stylesheets---------------------------->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-------------------------------------------------------------------->
    <script src="js/init.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script><style> 
#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color:#F7F7F7;
    border: solid 1px #c3c3c3;
}

#panel {
    padding: 20px;
    display: none;
}
th,td{
	padding:10px;
	text-align: left;
}
table {
    border-spacing: 15px;
}

</style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="img/logos/clabs.png" alt="Creation Labs Logo">
                <p class="logo-title-1">Creation</p>
                <p class="logo-title-2">Labs</p>
            </div>
            <div class="menu">
                <div class="left">
                    <a href="index.html" class="menu-item">
                        <img src="img/icons/home.png" alt="Home">
                        <p>Home</p>
                    </a>
                    <a href="#" class="menu-item">
                        <img src="img/icons/about.png" alt="About">
                        <p>About</p>
                    </a>
                    <a href="admissions.html" class="menu-item">
                        <img src="img/icons/admissions.png" alt="Admissions">
                        <p>Admissions</p>
                    </a>
                    <a href="#" class="menu-item active">
                        <img src="img/icons/projects.png" alt="Projects">
                        <p>Projects</p>
                    </a>
                    <a href="#" class="menu-item">
                        <img src="img/icons/people.png" alt="People">
                        <p>People</p>
                    </a>
                </div>
                <div class="right">
                    <a href="#" class="menu-item">
                        <img src="img/icons/news.png" alt="News">
                        <p>News</p>
                    </a>
                    <a href="#" class="menu-item">
                        <img src="img/icons/events.png" alt="Events">
                        <p>Events</p>
                    </a>
                    <a href="contact.html" class="menu-item">
                        <img src="img/icons/contact.png" alt="Contact">
                        <p>Contact</p>
                    </a>
                    <a href="#" class="menu-item login">
                        <img src="img/icons/login.png" alt="Login">
                        <p>Login</p>
                    </a>
                </div>
            </div>
        </header>
 <main>
            <div class="welcome">
                <img src="img/icons/admissions-large.png" alt="Admissions">
                <div class="text-container">
                    <p class="title">Welcome to the Projects portal.</p>
                    <p>We are commited to hire anyone no matter where you come from, what your branch is or any other characteristics, all we really want is to hire the best and most talented people for the right projects &amp; positions. So if this makes you feel welcome, put forward your idea and we will get back to you. Or see our openings in new &amp; upcoming projects.</p>
                </div>
            </div>
<div class="offer">
                <h2>What we have done so far</h2>
				
<?php
	while($row=$results->fetch_assoc())
	{
		echo '<div id="flip">
			<table align=center  border=5px style="color:orange">
				<tr>
					<td  colspan=3 height=50 align=center style="color:gray; font-size:30px; font-weight:bold; font-family:"Roboto";></td>
				</tr>
				<tr><div id="flag">
					<td align=left><img name="roverx"  WIDTH=100 HEIGHT=100 src="img/icons/admissions.png">
					</td></div>
					<td align=right>          
				Project name: '.$row["title"].'<br>
Description: '.$row["description"].'<br>
Date of Start: '.$row["date_of_start"].'<br>
Members: '.$row["members"].'<br>';
		
		if($row["date_of_end"]!="0000-00-00")
			echo 'Date of Completion: '.$row["date_of_end"].'<br>';
		echo'
		</td>
					<td >
					</td>
				</tr>
		</table>
		</div>';
echo '
<div id="panel">
	<table align=center  border=5px style="color:orange">
		<tr>
		<td align=left  height=50 align=center style="color:orange; font-size:20px; font-family:"Roboto";>';

				if($row["awards"]!="")
					echo $row["awards"];
		echo '
		</td>
        <td><img name="slider1" width="300" height="300" src="img/favicon.png" id="wall3" align="right"  padding="30px" ></td></tr>


<script>
var i=0;var arr=["'.str_replace('../','',$row["link1"]).'","'.str_replace('../','',$row["link2"]).'","'.str_replace('../','',$row["link3"]).'","'.str_replace('../','',$row["link4"]).'","'.str_replace('../','',$row["link5"]).'"'; echo '];
function tp()
{
	 move();
	
}
function move()
{
 	if(i==5)
		i=0;
	else if(arr[i]=="")
	{
		i++;
	}
	else
	{
		document.getElementById("wall3").src=arr[i];
		i++;
	}
}
setInterval(move,2000);
</script>
	</table></div>';
	}
?>

</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-66132973-1', 'auto');
      ga('send', 'pageview');

    </script>
</main>
</html>