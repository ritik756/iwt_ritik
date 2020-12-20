<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();


$userid = $_GET["id"];

$query = "DELETE FROM profile WHERE id = '".$userid."';";
$result = $db_handle->deleteQuery($query);
$query = "DELETE FROM todo WHERE user_id = '".$userid."';";
$result = $db_handle->deleteQuery($query);

header("Location: /admin.php");

?>
