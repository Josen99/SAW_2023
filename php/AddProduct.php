<?php 
    session_start(); 
    include("db.php");

    foreach ($_POST as $var) {
        if (!isset($var) || empty($var)) {
            echo json_encode(array('success' => false, 'message' => 'Compilare tutti i campi richiesti'));
            exit(); 
        }
    }

    $descrizione = trim($_POST['descrizione']);
    $marca = trim($_POST['marca']);
    $sesso = trim($_POST['sesso']); 
    $tipologia = trim($_POST['tipologia']);
    $prezzo = trim($_POST['prezzo']);
   
    $stmt = mysqli_prepare($con, "INSERT INTO prodotti (descrizione, marca, sesso, tipologia, prezzo) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssssi', $descrizione, $marca, $sesso, $tipologia, $prezzo);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) === 1) { 
        echo json_encode(array('success' => true, 'message' => 'Prodotto aggiunto con successo'));
    } else { 
        echo json_encode(array('success' => false, 'message' => 'Errore durante l\'aggiunta del prodotto'));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>
