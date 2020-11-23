<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();


$userid = $_SESSION["id"];

$query = "SELECT * FROM profile WHERE id = '".$userid."';";
$userinfo = $db_handle->runQuery($query);

$first = "";
$last = "";

foreach ($userinfo as $info) 
{
	$first = $info["First"];
	$last = $info["Last"];
}

$query = "SELECT * FROM todo WHERE user_id = '".$userid."';";
$count = $db_handle->numRows($query);
$todolist = $db_handle->runQuery($query);

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
			<h2 align="center" style="padding: 20px;">ToDo List - '.$first.' '.$last.'</h2>'; 
			if ($count > 0)
			{
				foreach ($todolist as $task) 
				{
					echo '<p>';
					echo $counter.'. '.$task["task"];
					echo '&nbsp;<a href="/delete.php?id='.$task["id"].'">Delete</a>';
					echo '</p>';
					
					$counter = $counter + 1;
				}
			}
		echo '<form method="POST" action="add.php">
				<input type="text" class="text-input" name="task" placeholder="New Task" maxlength="512"/>
				<button class="button" type="submit">Add New</button>
			</form>
		</div>
		<script src="js/main.js"></script>
	</body>
</html>';
?>
