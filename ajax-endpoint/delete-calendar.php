<?php
session_start(); 
require_once "../login/db_conn.php";
$user_id=$_SESSION['user_id'];

$id = $_POST['id'];
$statement = $conn->prepare('DELETE from tbl_events WHERE id= ?');
$statement->bind_param('i', $id);
$rowResult = $statement->execute();
echo mysqli_affected_rows($conn);
mysqli_close($conn);
?>