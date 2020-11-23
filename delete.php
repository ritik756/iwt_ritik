<?php 
session_start();
require_once ("db.php");
$db_handle = new DBController();


$userid = $_SESSION["id"];

$query = "DELETE FROM todo WHERE user_id = '".$userid."' and id = '".$_GET['id']."';";
$result = $db_handle->deleteQuery($query);

header("Location: /dashboard.php");

?>
