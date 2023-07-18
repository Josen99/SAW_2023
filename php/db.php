<?php
    /*con= mysqli_connect('localhost', 'root', 'Alessandro1.', 'startsaw');*/
   // $con= mysqli_connect('localhost', 'S5025307', 'Vincenzo60!', 'S5025307');
   $con= mysqli_connect('localhost', 'root', "", 's4979416');
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
        exit;
    }
?>