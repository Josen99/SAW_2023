<?php session_start(); 
    include ("db.php"); //db connection script -se ho delle modifiche basta che modifico solo un file

    if(empty($_POST)) {
        echo json_encode(array('message' => 'Error! Dati non ricevuti'));
        mysqli_close(($con));
        exit();
    }
    foreach($_POST as $var){
        if(!isset($var)){
            echo json_encode(array('message' => 'Error! Dati non ricevuti'));
            mysqli_close(($con));
            exit(); 
        }

        if(empty($var)){
            echo json_encode(array('message' => 'Error! Compilare tutti i dati richiesti'));
            mysqli_close(($con));
            exit();
        }
    }

    $mail= trim($_POST['email']);
    $pass= trim($_POST['pass']);

    $stmt = mysqli_prepare($con, "SELECT iduser, firstname, lastname, email, ban , pass FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $mail);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    if(mysqli_num_rows($res)==0){
        echo json_encode(array('message' => 'Error! La tua email non è presente nel nostro sistema!'));
        mysqli_close(($con));
        exit();
    }

    if(mysqli_num_rows($res)>1){
        echo json_encode(array('message' => 'Error! La query ha restituito più righe'));
        mysqli_close(($con));
        exit();
    }

    if(!password_verify($pass, $row['pass'])){
        echo json_encode(array('message' => 'Error! Email o Password errate'));
        mysqli_close(($con));
        exit();
    }
    //verifica che l'utente non sia stato bannato
    if ($row["ban"] == '0') {
        echo json_encode(array('message' => 'Il tuo account è temporaneamente bloccato'));
        mysqli_close($con);
        exit();
    }
    
    $_SESSION["iduser"]= $row["iduser"];
    $_SESSION["nome"]= $row["firstname"];
    $_SESSION["cognome"]=$row["lastname"];
    $_SESSION["email"]=$row["email"];
    if (strcmp($row["email"], "sportsunlimitedsaw@gmail.com") == 0 && password_verify($pass, $row['pass'])) {
        $_SESSION["send"] = "TRUE";
    }
    echo json_encode(array('message' => 'logged'));
    mysqli_close($con);
/*
    function test_Input($var){
        $var= trim($var);
        $var= htmlspecialchars($var);
        $var= stripslashes($var);
        return $var;
    }*/
?>