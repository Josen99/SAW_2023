<?php 
    session_start(); 
    include ("db.php"); //db connection script -se ho delle modifiche basta che modifico solo un file

    //Controllo se sono popolati tutti i campi e iniziali zzo le variabili
    foreach ($_POST as $var){
        if(!isset($var)) {  //Funzione che ritorna true se $var esiste e non è null
            echo json_encode(array('message' => 'dati non ricevuti'));
            exit();
        }
        if(empty($var)) { //Funzione che ritorna true se $var non esiste oppure il suo valore è falso
            echo json_encode(array('message' => 'compilare tutti i campi richiesti'));
            exit();
        }
    }

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']); 
    $Pass = mysqli_real_escape_string($con, trim($_POST['pass']));
    $ConfPass = mysqli_real_escape_string($con, trim($_POST['confirm']));

    //Controllo se l'email è valida
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //La funzione filter_var($str [, int $filter= FILTER_TYPE]) Valida la stringa in input con un filtro 
        echo json_encode(array('message' => 'Il formato della mail non è valido'));
        mysqli_close($con);
        exit();
    }    
    //Controllo se le password coincidono
    if (strcmp($Pass, $ConfPass) != 0) { //strcmp è una funzione che controllo se le due stringhe passate in input sono corrispondenti (==).
        echo json_encode(array('message' => 'Le password inserite non coincidono'));
        mysqli_close($con);
        exit();
    }    

    //Verifico se l'email è già presente nella tabella
    $stmt = mysqli_prepare($con, "SELECT iduser FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($rows > 0) {
        echo json_encode(array('message' => 'Email presente in db, prova con un alta mail o effettua il login'));
        mysqli_close($con);
        exit();
    }

    $hash = password_hash($Pass, PASSWORD_DEFAULT);  //Cripto la password 

    //Preparo ed eseguo la query
    $stmt = mysqli_prepare($con, "INSERT INTO users (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $hash);
    mysqli_stmt_execute($stmt);

    //Controllo il risultato
    if (mysqli_affected_rows($con) != 1) { 
        echo json_encode(array('message' => 'Errore durante la registrazione'));
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        exit();
    }    
    else { 
        $_SESSION["iduser"] = mysqli_insert_id($con);
        $_SESSION["nome"] = $firstname;
        $_SESSION["cognome"] = $lastname;
        $_SESSION["email"] = $email;

        if (strcmp($email, "sportsunlimitedsaw@gmail.com") == 0) {
            $_SESSION["send"] = "TRUE";
        }

        echo json_encode(array('message' => 'registered'));
    }

    //Chiudo la connessione
    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>
