<?php 
    session_start();
    include ("db.php"); //db connection script -se ho delle modifiche basta che modifico solo un file
    
    if(empty($_POST)) {
        echo json_encode(array('message' => 'Error! 1Dati non ricevuti'));
        mysqli_close(($con));
        exit();
    }

    foreach($_POST as $var){
        if(!isset($var)){
            echo json_encode(array('message' => 'Error! 2Dati non ricevuti'));
            mysqli_close(($con));
            exit(); 
        }

        if(empty($var)){
            echo json_encode(array('message' => 'Error! Compilare tutti i dati richiesti'));
            mysqli_close(($con));
            exit();
        }
    }
    
    $mail= test_Input($_POST['fInput']);
    
    $stmt= mysqli_prepare($con, "UPDATE users SET Newsletter=1 WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $mail);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) != 1){
        error_log("--NewLetter-- Error! L'update relativo alla newsletter non è andato a buon fine");
        echo json_encode(array('message' => 'Error! Qualcosa è andato storto'));
        header("Location: index.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close(($con));
    echo json_encode(array('message' => 'Error! OK'));
    header("Location: index.php");
    exit();

    function test_Input($var){
        $var= trim($var);
        $var= htmlspecialchars($var);
        $var= stripslashes($var);
        return $var;
    }
?>