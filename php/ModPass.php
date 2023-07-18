
<?php
        session_start();

        include("db.php");

        if(!isset($_SESSION['email'])){
            echo json_encode(array('message' => 'Error! Dati non ricevuti'));
            exit();
        }

        if(empty($_POST)) {
            echo json_encode(array('message' => 'Error! Dati non ricevuti'));
            mysqli_close(($con));
            exit();
        }

        foreach($_POST as $val){
            if(!isset($val)){
                echo json_encode(array('message' => 'Error! Dati non ricevuti'));
                mysqli_close($con);
                exit();
            }

            if(empty($val)){
                echo json_encode(array('message' => 'Error! Compilare tutti i dati richiesti'));
                mysqli_close($con);
                exit();
            }
        }

        $VecPass= trim($_POST['VecPass']);
        $pass= trim($_POST['pass']);
        $ConfPass= trim($_POST['ConfPass']);

        if(strcmp($pass, $ConfPass) != 0){
            echo json_encode(array('message' => 'Error! Le password inserite per le nuova password non coincidono'));
            mysqli_close($con);
            exit();
        }

        if(strcmp($VecPass, $pass) == 0){
            echo json_encode(array('message' => 'Error! La nuova password coincide con la vecchia password'));
            mysqli_close($con);
            exit();
        }
        
        $stmt= mysqli_prepare($con, "SELECT * FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
        mysqli_stmt_execute($stmt);
        $res= mysqli_stmt_get_result($stmt);
        $row= mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);

        if(mysqli_num_rows($res) != 1){
            echo json_encode(array('message' => 'Error! Restituiti più account associati a una mail'));
            mysqli_close($con);
            exit();
        }

        if(!password_verify($VecPass, $row['pass'])){
            echo json_encode(array('message' => 'Error! La vecchia password inserita non coincide'));
            mysqli_close($con);
            exit();
        }

        $hash= password_hash($pass, PASSWORD_DEFAULT);

        $stmt= mysqli_prepare($con, "UPDATE users SET pass=? WHERE email=?");
        mysqli_stmt_bind_param($stmt, "ss", $hash, $_SESSION['email']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if(mysqli_affected_rows($con) == 0){
            echo json_encode(array('message' => 'Error! La password non è stata modifica'));
            mysqli_close($con);
            exit();
        }

        mysqli_close($con);
        echo json_encode(array('message' => 'modificated'));
        exit();
    ?>
