<?php

function check_login($con)
{
	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "select * from pm where user_id = '$id' limit 1";
		
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	
	//redirect to login
	header("location: purchase manager login.php");
	die;
}

function random_num($lenght)
{
	$text = "";
	if($lenght < 5)
	{
		$lenght = 5;
	}
	
	$len = rand(4,$lenght);
	
	for ($i=0; $i < $len; $i++) {
		# code...
		
		$text .= rand(0,9);
	}
	
	return $text;
}
