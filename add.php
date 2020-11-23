<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();

$userid = $_SESSION["id"];

$query = "INSERT INTO todo(user_id, task) VALUES ('".$userid."', '".$_POST['task']."');";
$result = $db_handle->insertQuery($query);

header("Location: /dashboard.php");

?>
