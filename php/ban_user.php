<?php
session_start();
include("db.php");

if (!isset($_POST['userId'])) {
  echo json_encode(array('message' => 'Error! Dati non ricevuti'));
  exit();
}

$UserId = trim($_POST['userId']);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Update the 'ban' column value to '0'
$stmt = mysqli_prepare($con, "UPDATE users SET ban = '0' WHERE iduser = ?");
mysqli_stmt_bind_param($stmt, 's', $UserId);
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(array('message' => 'banned'));
} else {
    echo json_encode(array('message' => 'Error updating ban status'));
}

mysqli_stmt_close($stmt);
?>
