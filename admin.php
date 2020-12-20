<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();

$query = "SELECT * FROM profile;";
$userinfo = $db_handle->runQuery($query);
$count = $db_handle->numRows($query);

$counter = 1;

echo '<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>ToDo List</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="form" style="margin: auto; margin-top: 200px;">
			<h2 align="center" style="padding: 20px;">Users List</h2>'; 
			if ($count > 0)
			{
				foreach ($userinfo as $info) 
				{
					echo '<p>';
					echo $counter.'. '.$info["First"].' '.$info["Last"].' - '.$info["Email"];
					echo '&nbsp;<a href="/deleteuser.php?id='.$info["id"].'">Delete</a>';
					echo '</p>';
					
					$counter = $counter + 1;
				}
			}
		echo '
		</div>
		<script src="js/main.js"></script>
	</body>
</html>';
?>
