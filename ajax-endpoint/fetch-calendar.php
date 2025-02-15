<?php
session_start();
require_once "../login/db_conn.php";

// Foydalanuvchi identifikatorini sessiyadan olish
$user_id = $_SESSION['user_id'];

$json = array();
// Foydalanuvchining tadbirlarini olish so'rovi
$sql = "SELECT * FROM tbl_events WHERE user_id = $user_id  ORDER BY id";
$statement = $conn->prepare($sql);
$statement->execute();
$dbResult = $statement->get_result();

$eventArray = array();
while ($row = mysqli_fetch_assoc($dbResult)) {
    array_push($eventArray, $row);
}
mysqli_free_result($dbResult);

$statement->close();
mysqli_close($conn);

echo json_encode($eventArray);
?>
