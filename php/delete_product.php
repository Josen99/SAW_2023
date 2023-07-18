<?php
session_start();
include("db.php");

if (!isset($_POST['Productid'])) {
    echo json_encode(array('message' => 'Error! Dati non ricevuti'));
            exit();         
    }
$UserId = trim($_POST['Productid']);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  
  $stmt = mysqli_prepare($con, "DELETE FROM prodotti WHERE id = ?");
  mysqli_stmt_bind_param($stmt, 'i', $UserId);
  mysqli_stmt_execute($stmt);
  
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo json_encode(array('message' => 'deleted'));     
  } else {
    echo json_encode(array('message' => 'Not modificated')); 
  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);
  ?>