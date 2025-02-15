<?php
session_start(); 
require_once "../login/db_conn.php";
$user_id=$_SESSION['user_id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

if(isset($user_id))
{
$statement = $conn->prepare('INSERT INTO tbl_events (user_id,title,start,end) VALUES (?,?,?,?)');
$statement->bind_param('ssss', $user_id ,$title, $start, $end);
$rowResult = $statement->execute();
if (! $rowResult) {
    $result = mysqli_error($conn);
}
}
?>
