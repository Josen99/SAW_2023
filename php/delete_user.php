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
  
  $stmt = mysqli_prepare($con, "DELETE FROM users WHERE iduser = ?");
  mysqli_stmt_bind_param($stmt, 'i', $UserId);
  mysqli_stmt_execute($stmt);
  
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo json_encode(array('message' => 'modificated'));     
  } else {
    echo json_encode(array('message' => 'Not modificated')); 
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
  ?>