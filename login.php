<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();

if(!empty($_POST['email']) && !empty($_POST['password']))
{
	$query = "SELECT * from profile WHERE Email = '".$_POST['email']."';";
	$results = $db_handle->runQuery($query);
	
	$invalid = true;
	
	foreach ($results as $user) {
		if ($user["Password"] == $_POST['password']) {
			
			$_SESSION["id"] = $user["id"];
			header("Location: /dashboard.php");
		}
		else
		{
			header("Location: /error.php?error=Wrong%20Password");
		}
		
		$invalid = false;
	}
	
	if($invalid)
	{
		header("Location: /error.php?error=Wrong%20Email");
	}
	
}

?>