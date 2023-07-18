<?php
session_start();
include("db.php");

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$mail = isset($_POST['email']) ? $_POST['email'] : "";
$dataDiNascita = isset($_POST['DataDiNascita']) ? $_POST['DataDiNascita'] : NULL;
$telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : "";
$sesso = isset($_POST['Sesso']) ? $_POST['Sesso'] : "";
$Stato = isset($_POST['Stato']) ? $_POST['Stato'] : "";
$Provincia = isset($_POST['Provincia']) ? $_POST['Provincia'] : "";
$Citta = isset($_POST['Citta']) ? $_POST['Citta'] : "";
$Indirizzo = isset($_POST['Indirizzo']) ? $_POST['Indirizzo'] : "";
$Cap = isset($_POST['Cap']) ? $_POST['Cap'] : "";
$NewsLetter = isset($_POST['Newsletter']) ? $_POST['Newsletter'] : "";

$stmt = mysqli_prepare($con, "UPDATE users SET firstname=?, lastname=?, sesso=?, DataDiNascita=?, Telefono=?, Stato=?, Provincia=?, Citta=?, Indirizzo=?, Cap=?, Newsletter=? WHERE email=?");
mysqli_stmt_bind_param($stmt, 'ssssissssiis', $firstname, $lastname, $sesso, $dataDiNascita, $telefono, $Stato, $Provincia, $Citta, $Indirizzo, $Cap, $NewsLetter, $mail);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) != 1) {
    echo json_encode(array('message' => '--ACCOUNT-- Error! L\'update non è andato a buon termine'));
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($con);
echo json_encode(array('message' => 'updated'));
?>
