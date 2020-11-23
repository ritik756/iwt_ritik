<?php 

require_once ("db.php");
$db_handle = new DBController();

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['first']) && !empty($_POST['last']))
{
	$query = "INSERT INTO profile(First, Last, Email, Password) VALUES ('".$_POST['first']."', '".$_POST['last']."', '".$_POST['email']."', '".$_POST['password']."');";
	$results = $db_handle->insertQuery($query);
	
	if($results)
	{
		header("Location: /index.html");
	}
	else
	{
		header("Location: /error.php?error=Internal Error Occurred");
	}
}

?>