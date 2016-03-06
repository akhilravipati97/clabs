<?php
    $server="localhost";
	$username="root";
	$password="";
	$db="clabs";
	
	if(!$conn=new mysqli($server,$username,$password,$db))
	{
		include('error.html');
		//echo $conn->connect_error;
		exit();
	}
?>