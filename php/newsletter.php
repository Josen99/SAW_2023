<?php
    include ("db.php"); //db connection script -se ho delle modifiche basta che modifico solo un file
    
    foreach ($_POST as $var){
        if(!isset($var))   //Funzione che ritorna true se $var esiste e non è null
            echo json_encode(array('message' => 'dati non ricevuti'));
        if(empty($var))  //Funzione che ritorna true se $var non esiste oppure il suo valore è falso
            echo json_encode(array('message' => 'compilare tutti i campi richiesti'));
    }

    $newsletter= 1;
    $oggetto= test_Input($_GET['oggetto']);
    $mess= test_Input($_GET['mail']);

    $stmt= mysqli_prepare($con, "SELECT email FROM users WHERE newsletter LIKE ?");
    mysqli_stmt_bind_param($stmt, 'i', $newsletter);
    mysqli_stmt_execute($stmt);
    $res= mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    include ("Exception.php");
    include ("PHPMailer.php");
    include ("SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    while ($row= mysqli_fetch_assoc($res)){
        $mail= new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host= 'smtp.gmail.com';
        $mail->SMTPAuth= true;
        $mail->Username= 'sportsunlimitedsaw@gmail.com';
        $mail->Password = 'xcsgpdeefgdkyhvn';
        $mail->SMTPSecure= 'tls';
        $mail->Port= 587;

        $mail->setFrom('sportsunlimitedsaw@gmail.com');
        $mail->addAddress($row['email']);
        $mail->isHTML(true);

        $mail->Subject= $oggetto;
        $mail->Body= $mess;
        $mail->AltBody= $mess;
        
        try{
            $mail->send();
            echo "Email inviata con successo!";
            header("Location: index.php");
            mysqli_close($con);
        }
        catch(Exception $e){
            echo "Email error: ". $mail->ErrorInfo;
            mysqli_close($con);
        }
    }

    function test_Input($var){
        $var= trim($var);
        $var= htmlspecialchars($var);
        $var= stripslashes($var);
        return $var;
    }
?>